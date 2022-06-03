<?php include 'server.php';
    session_start();
    error_reporting(0);
    
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>IAG Impact-Login</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/styleforlogin.css">
       
</head>
<body>

    <div class="main">
    
        <section class="signup">
            
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container" style="margin-left: 35%; margin-right: 65%;">
            <?php
                if (isset($_POST['login'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $qry = "SELECT * FROM projectcode WHERE project_code='$username' and password='$password' ";
                    $login = mysqli_query($connect, $qry);
            
                    if($login->num_rows > 0) {
                      $account = mysqli_fetch_assoc($login);
                      $_SESSION['username'] = $account['project_code'];
                      header("location: regreport.php");
                    } else {
                      echo "<div class='alert alert-warning' style='width:80%; margin-left:10%; margin-right:10%;'><strong>Warning!</strong>&nbsp;Username and Password doesn't exist!</div>";
                    }
                }
                
            ?>
                <div class="signup-content">
                    
                    <script type="text/javascript">var submitted=false;</script>
                    
                    <form action="" method="POST" id="signup-form" class="signup-form" style="zoom:96%">
                        <h2 class="form-title">Login</h2>
                        <div class="form-group">
                            <label><b>Username</label>
                            <input type="text" class="form-input" name="username" id="username" placeholder="Enter Username" value="<?php echo $username;?>" required/>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-input" name="password" id="password" placeholder="Enter Password"  value="<?php echo $password;?>" required/>
                        </div>
                        <br/>
                        
                   
                        <div class="form-group">
                            <input type="submit" name="login" id="login" class="form-submit" value="Login"/>&nbsp;
                            <input type="reset" name="reset" id="reset" class="form-reset" value="Clear All"/>
                        </div>
                    </form>
                    
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>