<?php include 'server.php';
    
    error_reporting (0);
    session_start ();
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
.container {
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
<script type="text/javasript" src="jquery-3.6.0.js"></script>

<style>
  th, td {
    text-align: center;
    vertical-align: middle;
    font-size: 15px;
    font-family: Verdana;
  }
  
</style>
</head>
<body>
<title>Account Page</title>

<div class="container">
        <br/>
        <a href="regreport.php" class="btn btn-danger">Back</a><br/><br/>
        <h2><center>List of Participants</center></h2>
        <hr/>
    <br/>
  <table class="table table-bordered" style="overflow-x: auto; display: flex; display: inherit;">
    <thead class="thead-dark" >
      <tr>
        <th scope="col">#</th>
        <th scope="col" colspan="2">Full Name</th>
        <th scope="col">Date of Birth</th>
        <th scope="col">Age Range</th>
        <th scope="col">Gender</th>
        <th scope="col">Ethnicity</th>
        <th scope="col">City/Municipality</th>
        <th scope="col">Province</th>
        <th scope="col">Mobile Number</th>
        <th scope="col">Email Address</th>
        <th scope="col" colspan="2">Education</th>
        <th scope="col">Organization/Office</th>
        <th scope="col">Position</th>
        <th scope="col">Organization/Office No.</th>
        <th scope="col">Organization's Email</th>
      </tr>
    </thead>
    <tbody>
    <?php
        $no = 1;
        $programadmin = $_SESSION['username'];
        $actvtyID = $_GET['id'];
        $qryforthreetables = "SELECT * FROM projectcode projcode, activities acty, participants p WHERE p.act_id='$actvtyID' AND projcode.projects_id=acty.projects_id AND projcode.project_code='$programadmin' GROUP BY p.id ";
        $qrytoshowparticipants = mysqli_query($connect, $qryforthreetables);
        while ($participants = mysqli_fetch_array($qrytoshowparticipants)) {
          
      ?>
        <tr>
          <td scope="row"><?php echo $no;?></td>
          <td><?php echo ucfirst($participants['firstname']);?></td>
          <td><?php echo ucfirst($participants['lastname']);?></td>
          <td><?php echo $participants['birthdate'];?></td>
          <td><?php echo $participants['agerange'];?></td>
          <td><?php echo $participants['gender'];?></td>
          <td><?php echo ucfirst($participants['ethnicity']);?></td>
          <td><?php echo ucfirst($participants['city_municipality']);?></td>
          <td><?php echo ucfirst($participants['province']);?></td>
          <td><?php echo $participants['mobileno'];?></td>
          <td><?php echo $participants['email'];?></td>
          <td><?php echo ucfirst($participants['education']);?></td>
          <td><?php echo ucfirst($participants['othereduc']);?></td>
          <td><?php echo ucfirst($participants['org_office']);?></td>
          <td><?php echo ucfirst($participants['position']);?></td>
          <td><?php echo $participants['org_no'];?></td>
          <td><?php echo $participants['org_email'];?></td>
        </tr>
      <?php
          $no++;
        }
      ?>
      
    </tbody>
  </table>
</div>
     <!-- JS -->
     <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>