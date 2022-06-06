<?php 
    session_start();
    if(!isset($_SESSION['username']) && !isset($_SESSION['id']))
    {?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>multi user login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
     rel="stylesheet"
     integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
     crossorigin="anonymous">
</head>
<body>
        <div class="container d-flex justify-content-center
         align-items-center"
         style="min-height: 100vh;">
        <form class="boeder shadow p-3 rounded"
        action="php/check-login.php"
        method="post"
        style="width:450px;">
        <h1 class="text-center p-3">LOGIN</h1>
        <?php if(isset($_GET['error'])) { ?>

        <div class="alert alert-danger" role="alert">
           <?= $_GET['error'] ?>
        </div>
        <?php } ?>
            <div class="mb-3">
                <label for="username"
                 class="form-label">User name</label>
                <input type="text"
                       name="username" 
                       class="form-control"
                       id="username" />
            </div>
            <div class="mb-3">
                <label for="password"
                 class="form-label">Password</label>
                <input type="password"
                       name="password"
                       class="form-control"
                       id="password" />
            </div>
            <div class="mb-1">
                <label for="password"
                 class="form-label">Select User Type:</label>
            </div>
            <select class="form-select mb-3"
                    name="role"
                    aria-label="Default select example">
                <option selected value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <button type="submit" class="btn btn-primary">Login</button>
         </form>
        </div>
</body>
</html> 
<?php } else {
    header("location: home.php");
} ?>



<?
/*
         if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['type'])) 
         { 
                    
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            } 
            $username = test_input($_POST['username']);
            $password = test_input($_POST['password']);
            $type = test_input($_POST['type']);
            if(empty($username)) 
            {
              header('location:main-login.php?error=User Name is Required');
            }elseif(empty($password))
            {
              header('location:main-login.php?error=User Name is Required');
            }else 
                {
                $password = md5($password);
                $stmt = $con->prepare("SELECT * FROM users WHERE name = '$username' AND password = '$password'");
                $stmt ->execute(array($username,$password));
                $row = $stmt->fetchAll();
                $count  = $stmt->rowCount();
                if($count == 1 ){
                   if($row['type'] == 1) {

                        if($row['password'] === $password && $row['type'] === $type){
                            $_SESSION['UserName'] = $row['name'];
                            $_SESSION['Userid'] = $row['id'];
                            $_SESSION['type'] = $row['type'];
                            header('location: mainpage.php');
                            
                        }else
                        {
                            header('location: main-login.php?error=hamza');
                        }
                    }elseif($row['type'] == 2){
                        if($row['password'] === $password && $row['type'] === $type){
                            $_SESSION['CustomName'] = $row['name'];
                            $_SESSION['CustomId'] = $row['id'];
                            $_SESSION['type'] = $row['type'];
                            header('location: mainpage.php');
                            
                        }else
                        {
                            header('location: main-login.php?error=Incorect User name or password');
                        }
                    }
               }else
                    {
                    header('location: main-login.php?error=Incorect User name or password');
                    }
                

                }
            }*/
            ?>