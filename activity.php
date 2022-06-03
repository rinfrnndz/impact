<?php include 'server.php';
    error_reporting(0);
    session_start();
        
    $pcode = $_POST['pcodes'];
    $atitle = $_POST['atitle'];
    $adate = $_POST['adate'];
    if(isset($_POST['submit'])) {
        $sqlduplicate = mysqli_query($connect,"SELECT `activity_title`, `activity_date` FROM `activities` WHERE activity_title='$atitle' ");
        if(mysqli_num_rows($sqlduplicate) > 0 ) {
            echo "<div class='alert alert-danger' style='width:80%; margin-left:10%; margin-right:10%;'><strong>Warning!</strong>&nbsp;Activity Title already exists.</div>";
        } else {
            $insert = "INSERT INTO activities (projects_id, activity_title, activity_date) VALUES ('$pcode', '$atitle','$adate')";
            $querytitle = mysqli_query($connect, $insert);
            
            echo "<div class='alert alert-success' style='width:80%; margin-left:10%; margin-right:10%;'><strong>Warning!</strong>&nbsp;Activity Title added.</div>";
        }
    }

    
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
    <title>IAG Impact-Activity</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/styleforlogin.css">

    <!-- For alert message -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
</head>
<body>

    <div class="main">
    
        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <script type="text/javascript">var submitted=false;</script>
                    
                    <a href="regreport.php"><u>Back</u></a>
                    <form action="" target="hidden_iframe" method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">Add Activity Title</h2>
                        <div class="form-group">
                            <label><b>Select  Your Project Code</label>
                            <select class="form-input" name="pcodes" id="pcodes" >
                                <option disabled='disabled' selected='selected'>--Select--</option>
                                <?php
                                    include 'server.php';
                                    $select = mysqli_query($connect, "SELECT projects_id, project_code FROM projectcode"); 
                                    while ($row=mysqli_fetch_array($select)) {
                                ?>
                                <option value="<?php echo $row['projects_id'];?>"><?php echo $row['project_code'];?></option>
                                <?php } ?>
                            </select>
                            
                        </div>
                        <div class="form-group">
                            <label><b>Title of Activity</label>
                            <input type="text" class="form-input" name="atitle" id="atitle" placeholder="Enter Activity Title here" required/>
                        </div>
                        <div class="form-group">
                            <label><b>Date of Activity</label>
                            <input type="date" class="form-input" name="adate" id="adate" placeholder="Enter Activity Title here" required/>
                        </div>                      
                   
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Add Title"/>&nbsp;
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