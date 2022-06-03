<?php include 'server.php';
    error_reporting(0);
    session_start();
    
    if(!isset($_SESSION['username'])) {
        header ("location: login.php");
    }

    $progamadmin = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IAG-Program Report</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/styleforlogin.css">

    <!-- for table design -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <script type="text/javasript" src="jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
<style>
    th, td {
        text-align: center;
        vertical-align: middle;
    }
</style>
</head>
<body>
    <div class="main" style="display: flex; display: inherit;" >
    
        <div class="container" style="display: flex; display: inherit; margin-left:22%; margin-right:10%;" >
        
            <div style='background-color:white; padding: 30px;'>
                <a href="logout.php" class="btn btn-danger">Logout</a>
                <a href="activity.php" class="btn btn-primary">Add Title of Your Activity</a>
                <?php
                        $evaluationsql = "SELECT * FROM `evaluation`";
                            $evaluationACTIVITYID = $_GET['acty_id'];
                    
                    ?>
                <a href="evalreport.php " class="btn btn-warning">Evaluation Report</a>
                <br/><br/>
                <?php echo "<h1><center>" .$_SESSION['username']. " Activity Report</center></h1>"; ?>
                <hr>
                <br/>
                <h3>Lists of Activities Conducted</h3><br/>
                
                    <table class="table table-bordered" style="background-color:white;" style="display: flex; display: inherit;">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Activity Title</th>
                        <th scope="col">Activity Date</th>
                        <th scope="col" colspan="1">Option</th>
                        
                        </tr>
                    </thead>
                        <?php 
                            $no = 1;
                            //$progamadmin = $_SESSION['username'];
                            /*$evaluationACTIVITYID = $_GET['acty_id'];
                            $evaluationsql = "SELECT * FROM `evaluation` WHERE acty_id='$evaluationACTIVITYID' ";*/
                            
                            $program = "SELECT * FROM projectcode projects, activities activity WHERE projects.projects_id=activity.projects_id AND projects.project_code = '$progamadmin' ORDER BY `timestamp` DESC";
                            $progresult = mysqli_query($connect,$program);
                            while($progrow=mysqli_fetch_array($progresult)) {
                                //$actvtyID = $progrow['acty_id'];
                                    
                        ?>
                          
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo ucfirst($progrow['activity_title']);?></td>
                                <td><?php echo $progrow['activity_date'];?></td>
                                <td><a href="datalist.php?id=<?php echo $progrow['id'];?>" class="btn btn-info">View Participants</a></td>
                                <!--<td><a href="#?id=<?php echo $progrow['id']; ?>" class="btn btn-primary">See Evaluation</a></td>
                                <td><button type="button" id="displaydetailsbtn" class="btn btn-primary">View Participants</button></td>-->
                                            
                            </tr>
                                
                        <?php
                                $no++;
                            } 
                        ?>
                    </table><br/>
                
            </div>  
        </div>
        
    </div>       
       <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>