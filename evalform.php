<?php include 'server.php';
    error_reporting(0);

  if(isset($_POST['submit'])) {

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

    echo "<div class='alert alert-warning' style='width:80%; margin-left:10%; margin-right:10%;'><strong>Thank you</strong>&nbsp;for your honest feedback!</div>";
  } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IAG Evaluation Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    
    <!-- Main css -->
    <link rel="stylesheet" href="css/styleforevalform.css">
    
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content" style="font-family:Verdana;">
                   <script type="text/javascript">var submitted=false;</script>
                    <iframe name="hidden_iframe" id="hidden_iframe" style="display: none" onload="if(submitted){
                        window.location='../tymsg/tymsgforeval.html';}">
                    </iframe>
                    <form action="" method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">Participant's Online Evaluation Form</h2>
                        <hr><br/>
                        <div class="form-group">
                            <label><b>Activity Title</label>
                            <select class="form-input" name="activitytitle" id="activitytitle" required>
                                <option disabled='disabled' selected='selected'>--Select--</option>
                                <?php
                                    $select = mysqli_query($connect, "SELECT * FROM activities ORDER BY `timestamp` DESC"); 
                                    while ($row=mysqli_fetch_array($select)) {
                                ?>
                                <option value="<?php echo $row['id'];?>"><?php echo $row['activity_title'];?></option>
                                <?php } ?>
                            </select>
                            <!--<input type="text" class="form-input" name="" id="activity_name"  required/>-->
                            <br/>
                        </div>
                                                
                        <div class="form-group">
                            <h3>Basic Profile</h3><hr style="background: linear-gradient(135deg, #0f2027, #203a43, #2c5364); height: 2px; width: 70px; position: absolute;"><br/>
                            <label>First Name</label>
                            <input type="text" class="form-input" name="f_name" id="f_name" required/>
                            
                            <br/><br/>
                            <label>Last Name</label>
                            <input type="text" class="form-input" name="l_name" id="l_name" required/>
                            
                            <br/><br/>
                            <label>Date of Birth</label>
                            <input type="date" class="form-input" name="birthdate" id="birthdate" />

                            <br/><br/>
                            <label>Age Range</label>
                            <select class="form-input" name="age" id="age" required>
                                <option disabled="disabled" selected="selected">Choose option</option>
                                <option>15 - 25</option>
                                <option>26 - 35</option>
                                <option>36 - 45</option>
                                <option>46 - 55</option>
                                <option>56 - 65</option>
                                <option>Over 65</option>
                            </select>
                            
                            <br/><br/>
                            <label>Gender</label>
                            <select class="form-input" name="sgender" id="sgender" required>
                                <option disabled="disabled" selected="selected">Choose option</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>

                            <br/><br/>
                            <label>Ethnicity</label>
                            <input type="text" class="form-input" name="ethnicity" id="ethnicity" required/>

                            <br/><br/>
                            <label>City/Municipality</label>
                            <input type="text" class="form-input" name="c_m" id="c_m" required/>

                            <br/><br/>
                            <label>Province</label>
                            <input type="text" class="form-input" name="province" id="province" required/>
                        </div>
                        
                        <div class="form-group">
                            <p style="text-align:center;">The statements below are answerable by Strongly Disagree (1), Disagree (2), Undecided (3), Agree (4), or Strongly Agree (5).</p><hr style="background-color:gray;opacity: 0.3;">                          
                            <h3>Activity Proper</h3><hr style="background: linear-gradient(135deg, #0f2027, #203a43, #2c5364); height: 2px; width: 70px; position: absolute;"><br/>
                            
                            <table class="table" style="display: flex; display: inherit; font-family: Verdana, sans serif;">
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
                                    <th><input type="radio" class="form-input" name="ques1" id="ques1" value="1"></th>
                                    <th><input type="radio" class="form-input" name="ques1" id="ques1" value="2"></th>
                                    <th><input type="radio" class="form-input" name="ques1" id="ques1" value="3"></th>
                                    <th><input type="radio" class="form-input" name="ques1" id="ques1" value="4"></th>
                                    <th><input type="radio" class="form-input" name="ques1" id="ques1" value="5"></th>
                                </tr>
                                <tr>
                                    <td>2. The topics discussed are relevant to the current socio-political realities in the Bangsamoro (ongoing transition, new political framework, etc.)</td>
                                    <th><input type="radio" class="form-input" name="ques2" id="ques2" value="1"></th>
                                    <th><input type="radio" class="form-input" name="ques2" id="ques2" value="2"></th>
                                    <th><input type="radio" class="form-input" name="ques2" id="ques2" value="3"></th>
                                    <th><input type="radio" class="form-input" name="ques2" id="ques2" value="4"></th>
                                    <th><input type="radio" class="form-input" name="ques2" id="ques2" value="5"></th>
                                </tr>
                                <tr>
                                    <td>3. The activity contributed to improving my skills & competence as a member of civil society, a leader in my community/etc.</td>
                                    <th><input type="radio" class="form-input" name="ques3" id="ques3" value="1"></th>
                                    <th><input type="radio" class="form-input" name="ques3" id="ques3" value="2"></th>
                                    <th><input type="radio" class="form-input" name="ques3" id="ques3" value="3"></th>
                                    <th><input type="radio" class="form-input" name="ques3" id="ques3" value="4"></th>
                                    <th><input type="radio" class="form-input" name="ques3" id="ques3" value="5"></th>
                                </tr>
                                <tr>
                                    <td>4. The activity contributed to enhancing my knowledge and awareness of current social and political developments in the Bangsamoro.</td>
                                    <th><input type="radio" class="form-input" name="ques4" id="ques4" value="1"></th>
                                    <th><input type="radio" class="form-input" name="ques4" id="ques4" value="2"></th>
                                    <th><input type="radio" class="form-input" name="ques4" id="ques4" value="3"></th>
                                    <th><input type="radio" class="form-input" name="ques4" id="ques4" value="4"></th>
                                    <th><input type="radio" class="form-input" name="ques4" id="ques4" value="5"></th>
                                </tr>
                                <tr>
                                    <td>5. The activity taught me the importance of dialogue between civil society and government leaders.</td>
                                    <th><input type="radio" class="form-input" name="ques5" id="ques5" value="1"></th>
                                    <th><input type="radio" class="form-input" name="ques5" id="ques5" value="2"></th>
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
                            </table>
                          </div>
                          
                          <div class="form-group">
                            <h3>Sustainability</h3><hr style="background: linear-gradient(135deg, #0f2027, #203a43, #2c5364); height: 2px; width: 70px; position: absolute;"><br/>
                            <table class="table" style="display: flex; display: inherit;">
                                <tr>
                                    <td></td>
                                    <th>Strongly Disagree (1)</th>
                                    <th>Disagree (2)</th>
                                    <th>Undecided (3)</th>
                                    <th>Agree (4)</th>
                                    <th>Strongly Agree<br/> (5)</th>
                                </tr>
                                <tr>
                                    <td>7. I will share my learnings from this activity with members of my community.</td>
                                    <th><input type="radio" class="form-input" name="ques7" id="ques7" value="1"></th>
                                    <th><input type="radio" class="form-input" name="ques7" id="ques7" value="2"></th>
                                    <th><input type="radio" class="form-input" name="ques7" id="ques7" value="3"></th>
                                    <th><input type="radio" class="form-input" name="ques7" id="ques7" value="4"></th>
                                    <th><input type="radio" class="form-input" name="ques7" id="ques7" value="5"></th>
                                </tr>
                                <tr>
                                    <td>8. I hope to be invited again to similar activities in the future.</td>
                                    <th><input type="radio" class="form-input" name="ques8" id="ques8" value="1"></th>
                                    <th><input type="radio" class="form-input" name="ques8" id="ques8" value="2"></th>
                                    <th><input type="radio" class="form-input" name="ques8" id="ques8" value="3"></th>
                                    <th><input type="radio" class="form-input" name="ques8" id="ques8" value="4"></th>
                                    <th><input type="radio" class="form-input" name="ques8" id="ques8" value="5"></th>
                                </tr>
                                <tr>
                                    <td>9. I will continue to work with civil society groups and other sectors within my area and seek future engagements with them.</td>
                                    <th><input type="radio" class="form-input" name="ques9" id="ques9" value="1"></th>
                                    <th><input type="radio" class="form-input" name="ques9" id="ques9" value="2"></th>
                                    <th><input type="radio" class="form-input" name="ques9" id="ques9" value="3"></th>
                                    <th><input type="radio" class="form-input" name="ques9" id="ques9" value="4"></th>
                                    <th><input type="radio" class="form-input" name="ques9" id="ques9" value="5"></th>
                                </tr>
                                <tr>
                                    <td>10. I will communicate and collaborate with other participants that I met during this activity.</td>
                                    <th><input type="radio" class="form-input" name="ques10" id="ques10" value="1"></th>
                                    <th><input type="radio" class="form-input" name="ques10" id="ques10" value="2"></th>
                                    <th><input type="radio" class="form-input" name="ques10" id="ques10" value="3"></th>
                                    <th><input type="radio" class="form-input" name="ques10" id="ques10" value="4"></th>
                                    <th><input type="radio" class="form-input" name="ques10" id="ques10" value="5"></th>
                            </table>
                        </div>

                        <div class="form-group">
                          <h3>Overall rating of the program, logistics, secretariat, resource person</h3><hr style="background: linear-gradient(135deg, #0f2027, #203a43, #2c5364); height: 2px; width: 70px; position: absolute;"><br/>
                          <label style="font-family: Verdana, sans-serif; font-size: 13px;">11. How would you rate the event overall?</label><br/>
                              <div class="rating">
                                <input id="star1" name="ques11" type="radio" value="1" class="radio-btn hide" />
                                <label for="star1">☆</label>
                                <input id="star2" name="ques11" type="radio" value="2" class="radio-btn hide" />
                                <label for="star2" >☆</label>
                                <input id="star3" name="ques11" type="radio" value="3" class="radio-btn hide" />
                                <label for="star3" >☆</label>
                                <input id="star4" name="ques11" type="radio" value="4" class="radio-btn hide" />
                                <label for="star4" >☆</label>
                                <input id="star5" name="ques11" type="radio" value="5" class="radio-btn hide" />
                                <label for="star5" >☆</label>
                                <div class="clear"></div>
                              </div>
                        </div>

                        <div class="form-group">
                          <h3>Other comments (Please type your answers below.)</h3><hr style="background: linear-gradient(135deg, #0f2027, #203a43, #2c5364); height: 2px; width: 70px; position: absolute;"><br/>
                          
                          <label style="font-family: Verdana, sans-serif; font-size: 13px;">12. Which topics or aspects of the seminar/activity did you find most interesting or useful?</label><br/>
                          <input type="text" class="form-input" name="ques12" id="ques12" /><br/><br/>

                          <label style="font-family: Verdana, sans-serif; font-size: 13px;">13. I intend to apply the knowledge gained in this training by doing the following:</label><br/>
                          <input type="text" class="form-input" name="ques13" id="ques13" /><br/><br/>

                          <label style="font-family: Verdana, sans-serif; font-size: 13px;">14. To be able to apply the knowledge gained from this training effectively, I would also need the following:</label><br/>
                          <input type="text" class="form-input" name="ques14" id="ques14" /><br/><br/>

                          <table class="table" style="display: flex; display: inherit;">
                            <tr>
                              <td></td>
                              <th>Not at all familiar</th>
                              <th>Slightly familiar</th>
                              <th>Moderately familiar</th>
                              <th>Very familiar</th>
                            </tr>

                            <tr>
                                <td>15. Rate your level of familiarity with IAGs' work</td>
                                <th><input type="radio" class="form-input" name="ques15" id="ques15" value="Not at all familiar"></th>
                                <th><input type="radio" class="form-input" name="ques15" id="ques15" value="Slightly familiar"></th>
                                <th><input type="radio" class="form-input" name="ques15" id="ques15" value="Moderately familiar"></th>
                                <th><input type="radio" class="form-input" name="ques15" id="ques15" value="Very familiar"></th>
                              </tr>
                          </table>
                        </div>
                        <br/>
                      <div class="form-group">
                        <input type="submit" name="submit" class="form-submit" style="width: 15%; margin-top: 25px;">
                        <input type="reset" name="reset" id="reset" class="form-submit" value="Clear All"/>
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