<?php include 'server.php';
    
    error_reporting (0);
    session_start ();

    if(!isset($_SESSION['username'])) {
        header ("location: login.php");
    }
    $progamadmin = $_SESSION['username'];
    //$evaluationsql = "SELECT * FROM projectcode projects, activities activity, evaluation eval WHERE activity.id=eval.acty_id AND projects.projects_id=activity.projects_id AND projects.project_code = '$progamadmin' ORDER BY `timestamp` DESC";
    //$evaluationresult = mysqli_query($connect, $evaluationsql);
    
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

<div class="table-responsive-lg" style="margin-left: 10%; margin-right:10%;">
    <br/><br/>
    <a href="regreport.php" class="btn btn-danger">Back to Main</a>
    <br/><br/>
    <?php echo "<h1><center>" .$_SESSION['username']. " Evaluation Report</center></h1>"; ?>
    <hr>

    <div>
      <!--<a href="" onclick="window.print();">Print</a>-->
      <script>
        function showUser(str) {
        if (str=="") {
            document.getElementById("evaluation_data").innerHTML="";
            return;
        }
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (this.readyState==4 && this.status==200) {
            document.getElementById("evaluation_data").innerHTML=this.responseText;
            }
        }
        xmlhttp.open("GET","eval-action.php?q="+str,true);
        xmlhttp.send();
        }
      </script>
      <form action="" method="POST">
        <select class="" name="evaluation_list" id="evaluation_list" onchange="showUser(this.value)" style="margin-left:75%;padding:10px; max-width:auto; width:25%; margin-bottom:1%;">
          <option disabled='disabled' selected='selected'>--Select--</option>
          <?php
            $select = mysqli_query($connect, "SELECT * FROM projectcode projects, activities activity, evaluation eval WHERE activity.id=eval.acty_id AND projects.projects_id=activity.projects_id AND projects.project_code = '$progamadmin' GROUP BY eval.acty_id ORDER BY `timestamp` DESC "); 
              while ($evaluation_row=mysqli_fetch_array($select)) {
          ?>
            <option value="<?php echo $evaluation_row['acty_id'];?>"><?php echo $evaluation_row['activity_title'];?></option>
          <?php } ?>
        </select>
       
      </form>
      <div id="evaluation_data"><b>Person info will be listed here.</b></div>
    </div>
</div>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    
</body> <!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>