<?php include 'server.php';
    
    error_reporting (0);
    session_start ();

    if(!isset($_SESSION['username'])) {
        header ("location: login.php");
    }
    $progamadmin = $_SESSION['username'];
    $q = intval($_GET['q']);
       
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style> 
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: white;
  
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.table-responsive-lg {
  padding: 16px;
  background-image: url("../images/iag.jpg");
}


/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}


/* Add a blue text color to links */
a {
  color: dodgerblue;
}

</style>

<script type="text/javasript" src="jquery-3.6.0.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

  <!-- for pagination-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  
<style>
  th, td {
    text-align: center;
    vertical-align: middle;
    font-size: 14px;
    font-family: Verdana;
  }
  
</style>

</head>
<body>
<title>IAG-Evaluation Report</title>
  
    <table id="evaluation_data" class="table table-striped table-bordered" style="overflow-x: auto; display: flex; display: inherit;">
        <thead >
            <tr>
                <th class="th-sm" colspan=""></th>
                <th class="th-sm" colspan="8">Basic Information</th>
                <th class="th-sm" colspan="6">Activity Proper</th>
                <th class="th-sm" colspan="4">Sustainability</th>
                <th class="th-sm"></th>
                <th class="th-sm" colspan="3">Other comments</th>
                
            </tr>
        </thead>
        <tbody>
        <tr>
            
            <th scope="col">#</th>
            <th scope="col" colspan="2">Name</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">Age Range</th>
            <th scope="col">Gender</th>
            <th scope="col">Ethnicity</th>
            <th scope="col">City or Municipality</th>
            <th scope="col">Province</th>
            <th scope="col">Question 1</th>
            <th scope="col">Question 2</th>
            <th scope="col">Question 3</th>
            <th scope="col">Question 4</th>
            <th scope="col">Question 5</th>
            <th scope="col">Question 6</th>
            <th scope="col">Question 7</th>
            <th scope="col">Question 8</th>
            <th scope="col">Question 9</th>
            <th scope="col">Question 10</th>
            <th scope="col">Question 11</th>
            <th scope="col">Question 12</th>
            <th scope="col">Question 13</th>
            <th scope="col">Question 14</th>
            <th scope="col">Question 15</th>
            
        </tr>
        
        <?php
            $evaluationsql = "SELECT * FROM projectcode projects, activities activity, evaluation eval WHERE activity.id=eval.acty_id AND eval.acty_id='$q' AND projects.projects_id=activity.projects_id AND projects.project_code = '$progamadmin' ORDER BY `timestamp` DESC";
            $evaluationresult = mysqli_query($connect, $evaluationsql);
            while($evaluationrow=mysqli_fetch_array($evaluationresult)) {
            $no = 1;
        ?>
        <tr>
            <td><?php echo $no;?></td>
            <td><?php echo ucfirst($evaluationrow['first_name']);?></td>
            <td><?php echo ucfirst($evaluationrow['last_name']);?></td>
            <td><?php echo ($evaluationrow['birthday']);?></td>
            <td><?php echo ($evaluationrow['age_range']);?></td>
            <td><?php echo ($evaluationrow['gender']);?></td>
            <td><?php echo ucfirst($evaluationrow['ethnicity']);?></td>
            <td><?php echo ucfirst($evaluationrow['ct_municipality']);?></td>
            <td><?php echo ucfirst($evaluationrow['provnce']);?></td>
            <td><?php echo ($evaluationrow['q1']);?></td>
            <td><?php echo ($evaluationrow['q2']);?></td>
            <td><?php echo ($evaluationrow['q3']);?></td>
            <td><?php echo ($evaluationrow['q4']);?></td>
            <td><?php echo ($evaluationrow['q5']);?></td>
            <td><?php echo ($evaluationrow['q6']);?></td>
            <td><?php echo ($evaluationrow['q7']);?></td>
            <td><?php echo ($evaluationrow['q8']);?></td>
            <td><?php echo ($evaluationrow['q9']);?></td>
            <td><?php echo ($evaluationrow['q10']);?></td>
            <td><?php echo ($evaluationrow['q11']);?></td>
            <td style="text-transform: inherit;"><?php echo ($evaluationrow['q12']);?></td>
            <td style="text-transform: inherit;"><?php echo ($evaluationrow['q13']);?></td>
            <td style="text-transform: inherit;"><?php echo ($evaluationrow['q14']);?></td>
            <td><?php echo ($evaluationrow['q15']);?></td>
           
        </tr>
        </tbody>
        <?php
            $no++;
        } 
          
          
        ?>
        <tfoot>
        <tr>
            <th scope="col" colspan="3" style="text-align: right;">Total:</th>
            <!--<th scope="col" colspan="" style="text-align: right;"></th>-->
        </tr>
        <tr><th scope="col" colspan="3" style="text-align: right;">Average:</th></tr>
        </tfoot>
        
      </table>
    </div>
</div>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    
</body> <!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>