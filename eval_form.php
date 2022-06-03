<?php include 'server.php';

/*if(isset($_POST['submit'])) {
    $actvtytitle = $_POST['activitytitle'];
    $firstname = $_POST['f_name'];
    $lastname = $_POST['l_name'];
    $dob = $_POST['birthdate'];
    $agerange = $_POST['age'];
    $sgender = $_POST['sgender'];
    $ethncty = $_POST['ethnicity'];
    $c_m = $_POST['c_m'];
    $province = $_POST['province'];
    $ques1 = $_POST['ques1'];
    $ques2 = $_POST['ques2'];
    $ques3 = $_POST['ques3'];
    $ques4 = $_POST['ques4'];
    $ques5 = $_POST['ques5'];
    $ques6 = $_POST['ques6'];
    $ques7 = $_POST['ques7'];
    $ques8 = $_POST['ques8'];
    $ques9 = $_POST['ques9'];
    $ques10 = $_POST['ques10'];
    $ques11 = $_POST['ques11'];
    $ques12 = $_POST['ques12'];
    $ques13 = $_POST['ques13'];
    $ques14 = $_POST['ques14'];
    $ques15 = $_POST['ques15'];

    $sqlforeval = "INSERT INTO evaluation (acty_id, first_name, last_name, birthday, age_range, gender, ethnicity, ct_municipality, provnce, q1, q2, q3, q4, q5, q6, q7, q8, q9, q10, q11, q12, q13, q14, q15) 
                  VALUES ('$actvtytitle', '$firstname', '$lastname', '$dob', '$agerange', '$sgender', '$ethncty', '$c_m', '$province', '$ques1', '$ques2', '$ques3', '$ques4', '$ques5', '$ques6', '$ques7', '$ques8', '$ques9', '$ques10', '$ques11', '$ques12', '$ques13', '$ques14', '$ques15')";
    $qryforeval = mysqli_query($connect, $sqlforeval);
}*/
?>

<!DOCTYPE html>
<html>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IAG Online Evaluation Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/styleforevalform.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
* {
  box-sizing: border-box;
}

body {
  /*background-color: #f1f1f1;*/
  
}

#regForm {
  background-color: #fff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 760px;
  display: flex;
  display: inherit;
  min-width: 300px;
  border-radius: 10px;
}


h1 {
  text-align: center;  
}

input {
  padding: 15px;
  width: 100%;
  font-size: 15px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    -o-border-radius: 5px;
    -ms-border-radius: 5px;
    padding: 17px 20px;
    box-sizing: border-box;
    font-size: 14px;
    font-weight: 700;
    color: #fff;
    text-transform: uppercase;
    border: none;
    background-image: -moz-linear-gradient(to left, #74ebd5, #9face6);
    background-image: -ms-linear-gradient(to left, #74ebd5, #9face6);
    background-image: -o-linear-gradient(to left, #74ebd5, #9face6);
    background-image: -webkit-linear-gradient(to left, #74ebd5, #9face6);
    background-image: linear-gradient(to left, #74ebd5, #9face6); 
    cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
    background-color: #bbbbbb;
  border-radius: 5px;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  -o-border-radius: 5px;
  -ms-border-radius: 5px;
  padding: 17px 20px;
  box-sizing: border-box;
  font-size: 14px;
  font-weight: 700;
  color: #fff;
  text-transform: uppercase;
  border: none;
  background-image: -moz-linear-gradient(to left, #bbbbbb);
  background-image: -ms-linear-gradient(to left, #bbbbbb);
  background-image: -o-linear-gradient(to left, #bbbbbb);
  background-image: -webkit-linear-gradient(to left, #bbbbbb);
  background-image: linear-gradient(to left, #bbbbbb); 
  cursor: pointer;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #04AA6D;
}


</style>
<body>
<div class="main">
    <div class="container">
        
        <form id="regForm" action="" action="POST">
        <h2 class="form-title">Participant's Online Evaluation Form</h2>
        <hr><br/>
        <!-- One "tab" for each step in the form: -->
        <div class="tab"><b>Activity Title:</b>
            <p>
                <select class="form-input" name="activitytitle" id="activitytitle" oninput="this.className = ''" required>
                    <option disabled='disabled' selected='selected'>--Select Activity Title--</option>
                    <?php
                        $select = mysqli_query($connect, "SELECT * FROM activities ORDER BY `timestamp` DESC"); 
                        while ($row=mysqli_fetch_array($select)) {
                    ?>
                        <ption value="<?php echo $row['id'];?>"><?php echo $row['activity_title'];?></option>
                    <?php } ?>
                </select>
            </p>
        </div>
        
        <div class="tab">
        <h3>Basic Profile</h3><hr style="background: linear-gradient(135deg, #0f2027, #203a43, #2c5364); height: 2px; width: 70px; position: absolute;"><br/>    
            <p><b>Name:</b><input placeholder="First name..."  oninput="this.className = ''" name="fname"></p>
            <p><input placeholder="Last name..." oninput="this.className = ''" name="lname"></p>
            <p><b>Date of Birth:</b><input type="date" name="birthdate" id="birthdate" oninput="this.className = ''" /></p>
            <p><b>Age Range:</b>
                <select class="form-input" name="age" id="age" required>
                    <option disabled="disabled" selected="selected">Choose option</option>
                    <option>15 - 25</option>
                    <option>26 - 35</option>
                    <option>36 - 45</option>
                    <option>46 - 55</option>
                    <option>56 - 65</option>
                    <option>Over 65</option>
                </select>
            </p>
            <p><b>Gender:</b>
            
                <select class="form-input" name="sgender" id="sgender" required>
                    <option disabled="disabled" selected="selected">Choose option</option>
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </p>
            <p><b>Ethnicity</b><input placeholder="Ethnicity..." oninput="this.className = ''" name="ethnicity" id="ethnicity" required/></p>
            <p><b>City/Municipality</b><input placeholder="City/Municipality..." oninput="this.className = ''" name="c_m" id="c_m" required></p>
            <p><b>Province</b><input placeholder="Province..." oninput="this.className = ''" name="c_m" id="c_m" required></p>
        </div>
        <div class="tab">
        <p><center>The statements below are answerable by Strongly Disagree (1), Disagree (2), Undecided (3), Agree (4), or Strongly Agree (5).</center></p>
        <hr style="background: linear-gradient(135deg, #0f2027, #203a43, #2c5364); height: 2px; width: 100px; position: absolute; margin-left: 40%; "><br/>
        <h3>Activity Proper</h3><hr style="background: linear-gradient(135deg, #0f2027, #203a43, #2c5364); height: 2px; width: 70px; position: absolute;"><br/>
            <p><table class="table" style="display: flex; display: inherit;">
                    <tr>
                        <td></td>
                        <th>Strongly Disagree (1)</th>
                        <th>Disagree (2)</th>
                        <th>Undecided (3)</th>
                        <th>Agree (4)</th>
                        <th>Strongly Agree<br/> (5)</th>
                    </tr>
                    <tr>
                        <td>1. The topics discussed are relevant to my role as a member of civil society/as elected official/member of other sectors/etc.</td>
                        <th><input type="radio" oninput="this.className = ''" class="form-input" name="ques1" id="ques1" value="1"></th>
                        <th><input type="radio" oninput="this.className = ''" class="form-input" name="ques1" id="ques1" value="2"></th>
                        <th><input type="radio" oninput="this.className = ''" class="form-input" name="ques1" id="ques1" value="3"></th>
                        <th><input type="radio" oninput="this.className = ''" class="form-input" name="ques1" id="ques1" value="4"></th>
                        <th><input type="radio" oninput="this.className = ''" class="form-input" name="ques1" id="ques1" value="5"></th>
                    </tr>
                    <tr>
                        <td>2. The topics discussed are relevant to the current socio-political realities in the Bangsamoro (ongoing transition, new political framework, etc.)</td>
                        <th><input type="radio" oninput="this.className = ''" class="form-input" name="ques2" id="ques2" value="1"></th>
                        <th><input type="radio" oninput="this.className = ''" class="form-input" name="ques2" id="ques2" value="2"></th>
                        <th><input type="radio" oninput="this.className = ''" class="form-input" name="ques2" id="ques2" value="3"></th>
                        <th><input type="radio" oninput="this.className = ''" class="form-input" name="ques2" id="ques2" value="4"></th>
                        <th><input type="radio" oninput="this.className = ''" class="form-input" name="ques2" id="ques2" value="5"></th>
                    </tr>
                    <tr>
                        <td>3. The activity contributed to improving my skills & competence as a member of civil society, a leader in my community/etc.</td>
                        <th><input type="radio" oninput="this.className = ''" class="form-input" name="ques3" id="ques3" value="1"></th>
                        <th><input type="radio" oninput="this.className = ''" class="form-input" name="ques3" id="ques3" value="2"></th>
                        <th><input type="radio" oninput="this.className = ''" class="form-input" name="qques33" id="ques3" value="3"></th>
                        <th><input type="radio" oninput="this.className = ''"class="form-input" name="ques3" id="ques3" value="4"></th>
                        <th><input type="radio" oninput="this.className = ''" class="form-input" name="ques3" id="ques3" value="5"></th>
                    </tr>
                    <tr>
                        <td>4. The activity contributed to enhancing my knowledge and awareness of current social and political developments in the Bangsamoro.</td>
                        <th><input type="radio" oninput="this.className = ''" class="form-input" name="ques4" id="ques4" value="1"></th>
                        <th><input type="radio" oninput="this.className = ''"class="form-input" name="ques4" id="ques4" value="2"></th>
                        <th><input type="radio" oninput="this.className = ''" class="form-input" name="ques4" id="ques4" value="3"></th>
                        <th><input type="radio" oninput="this.className = ''" class="form-input" name="ques4" id="ques4" value="4"></th>
                        <th><input type="radio" oninput="this.className = ''" class="form-input" name="ques4" id="ques4" value="5"></th>
                    </tr>
                                <tr>
                                    <td>5. The activity taught me the importance of dialogue between civil society and government leaders.</td>
                                    <th><input type="radio" class="form-input" name="ques5" id="ques5" value="1"></th>
                                    <th><input type="radio" class="form-input" name="ques5" id="qques55" value="2"></th>
                                    <th><input type="radio" class="form-input" name="ques5" id="ques5" value="3"></th>
                                    <th><input type="radio" class="form-input" name="ques5" id="ques5" value="4"></th>
                                    <th><input type="radio" class="form-input" name="ques5" id="ques5" value="5"></th>
                                </tr>
                                <tr>
                                    <td>6. The activity underscored the important concepts behind the new Bangsamoro government as well as the need for continued political and civic education.</td>
                                    <th><input type="radio" class="form-input" name="ques6" id="ques6" value="1"></th>
                                    <th><input type="radio" class="form-input" name="ques6" id="ques6" value="2"></th>
                                    <th><input type="radio" class="form-input" name="ques6" id="ques6" value="3"></th>
                                    <th><input type="radio" class="form-input" name="ques6" id="ques6" value="4"></th>
                                    <th><input type="radio" class="form-input" name="ques6" id="ques6" value="5"></th>
                                </tr>
                            </table></p>
            <p></p>
        </div>
        

        <div style="overflow:auto;">
            <div style="float:right;">
            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
            <button type="button" id="nextBtn" name="submit" onclick="nextPrev(1)">Next</button>
            </div>
        </div>
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
            <!--<span class="step"></span>
            <span class="step"></span>-->
        </div>
        </form>
        
    </div>
</div>

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>

</body>
</html>
