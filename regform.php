<?php include 'server.php';
    
    
    if(isset($_POST['submit'])) {
        $acttitle = $_POST['activity_name'];
        $namef = $_POST['fname'];
        $namel = $_POST['lname'];
        $birthday = $_POST['dob'];
        $age = $_POST['age_range'];
        $sex = $_POST['sgender'];
        $ethnici = $_POST['ethnic'];
        $ct = $_POST['city'];
        $prvince = $_POST['prov'];
        $mobile = $_POST['cpnumber'];
        $emailad = $_POST['email_ad'];
        $attainment = $_POST['educ'];
        $othereducation = $_POST['othereducation'];
        $org = $_POST['org_name'];
        $postion = $_POST['post'];
        $orgmobile = $_POST['org_cpnumber'];
        $orgemail = $_POST['org_emailad'];

        $sql1 = "INSERT INTO participants (act_id, firstname, lastname, birthdate, agerange, gender, ethnicity, city_municipality, province, mobileno, email, education, othereduc, org_office, position, org_no, org_email)
                    VALUES ('$acttitle','$namef','$namel','$birthday','$age','$sex','$ethnici','$ct','$prvince','$mobile','$emailad','$attainment','$othereducation','$org','$postion','$orgmobile','$orgemail')";
        $query1 = mysqli_query($connect, $sql1);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>IAG Online Registraion Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
       
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    
                    <script type="text/javascript">var submitted=false;</script>
                    <iframe name="hidden_iframe" id="hidden_iframe" style="display: none" onload="if(submitted) {
                        window.location='../impact/tymsg/tymsg.html';}">
                    </iframe>
                    <form action="" method="POST" target="hidden_iframe" onsubmit="submitted=true" id="signup-form" class="signup-form">
                        <h2 class="form-title">Participant's Online Registration Form</h2>
                        
                        <div class="form-group">
                            <label><b>Activity Title</label>
                            <select class="form-input" name="activity_name" id="activity_name" >
                                <option disabled='disabled' selected='selected'>--Select--</option>
                                <?php
                                    $select = mysqli_query($connect, "SELECT * FROM activities ORDER BY `timestamp` DESC"); 
                                    while ($row=mysqli_fetch_array($select)) {
                                ?>
                                <option value="<?php echo $row['id'];?>"><?php echo $row['activity_title'];?></option>
                                <?php } ?>
                            </select>                
                        </div>
                        
                        <br/>
                        <h3>Basic Background Information</h3>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-input" name="fname" id="fname" placeholder="Enter your Given Name" required/>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-input" name="lname" id="lname" placeholder="Enter your Surname" required/>
                        </div>
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" class="form-input" name="dob" id="dob"/>
                        </div>
                        <div class="form-group">
                            <label>Age Range</label>
                            <select class="form-input" name="age_range" id="age_range" >
                                <option disabled="disabled" selected="selected">--Choose Option--</option>
                                <option>15 - 25</option>
                                <option>26 - 35</option>
                                <option>36 - 45</option>
                                <option>46 - 55</option>
                                <option>56 - 65</option>
                                <option>Over 65</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select class="form-input" name="sgender" id="gender" required>
                                <option disabled="disabled" selected="selected">Choose option</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Ethnicity</label>
                            <input type="text" class="form-input" name="ethnic" id="ethnicity" placeholder="Enter your Ethnicity" required/>
                        </div>
                        <div class="form-group">
                            <label>City/Municipality</label>
                            <input type="text" class="form-input" name="city" id="city" placeholder="Enter City/Municipality" required/>
                        </div>
                        <div class="form-group">
                            <label>Province</label>
                            <input type="text" class="form-input" name="prov" id="province" placeholder="Enter Province" required/>
                        </div>
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="tel" class="form-input" name="cpnumber" id="cpnumber" placeholder="09xxxxxxxxx" required/>
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" class="form-input" name="email_ad" id="email_ad" placeholder="example@email.com" required/>
                        </div>
                        <div class="form-group">
                            <label>Educational Attainment</label>
                            <select class="form-input" name="educ" id="educ" onchange='CheckColors(this.value);' required>
                                <option disabled="disabled" selected="selected">--Choose Option--</option>
                                <option>Bachelors/Baccalaureate Degree</option>
                                <option>Graduate Degree (Masters Degree)</option>
                                <option>Post Graduate (PhD, EdD)</option>
                                <option value="OtherEducation">Others</option>
                                <input type="text" class="form-input" name="othereducation" id="othereducation" style='display:none;'/>
                                <!--script code for other option in Educational Attainment-->
                                <script type="text/javascript">
                                    function CheckColors(val){
                                    var element=document.getElementById('othereducation');
                                        if(val=='OtherEducation')
                                         element.style.display='block';
                                     else  
                                         element.style.display='none';
                                     }
                                    
                                </script>
                            </select>
                            
                        </div>
                        <br/>
                        <h3>Organizational Affiliation</h3>
                        <div class="form-group">
                            <label>Name of Organization/Office</label>
                            <input type="text" class="form-input" name="org_name" id="org_name" placeholder="Enter Organization/Office" />
                        </div>
                        <div class="form-group">
                            <label>Position in Organization/Office</label>
                            <input type="text" class="form-input" name="post" id="position" placeholder="Enter your Position" />
                        </div>
                        <div class="form-group">
                            <label>Contact Number of Organization/Office</label>
                            <input type="text" class="form-input" name="org_cpnumber" id="org_cpnumber" placeholder="Enter Organization/Office No., if None simply put NA" />
                        </div>
                        <div class="form-group">
                            <label>Email Address of Organization/Office</label>
                            <input type="text" class="form-input" name="org_emailad" id="org_emailad" placeholder="Enter Organization/Office Email Add, if None simply put NA" />
                        </div>
                        <div class="form-group">
                            <!--<input type="checkbox" name="agree-term" id="agree-term" class="agree-term" required/>
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>-->
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Register"/>&nbsp;
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