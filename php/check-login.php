<?php 
session_start();
include ("../db_connect.php");
 if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])) 
 {
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      $username = test_input($_POST['username']);
      $password = test_input($_POST['password']);
      $role = test_input($_POST['role']);
      
      if(empty($username)) 
      {
        header('location: ../index.php?error=User Name is Required');
      }elseif(empty($password))
      {
        header('location: ../index.php?error=Password is Required');
      }else 
      {
          // Hashing the password
          $password = md5($password);
          
          $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
          $result = mysqli_query($conn,$sql);

          if(mysqli_num_rows($result) ===1)
          {
              $row = mysqli_fetch_assoc($result);
              if($row['password'] === $password && $row['role'] == $role)
              {
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['username'] = $row['username'];
                header('location: ../home.php');

              }else {
                header('location: ../index.php?error=Incorect User name or password');

              }
          }else  {
            header('location: ../index.php?error=Incorect User name or password');

          }
      }

 }else {
     header('location: ../index.php');
 }