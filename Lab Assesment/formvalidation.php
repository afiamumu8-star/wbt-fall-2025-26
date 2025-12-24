<?php
// ---------- Helper function to sanitize input ----------
function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}
 
// ---------- Initialize error & value variables ----------
$nameErr = $emailErr = $dateErr = $genderErr = $degreeErr = $bloodErr = "";
$name = $email = $dd = $mm = $yyyy = $gender = $blood = "";
$degree = [];
 
// ---------- FORM SUBMISSION ----------
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    // ----------- 1. NAME VALIDATION -----------
    if (isset($_POST['name_submit'])) {
        $name = test_input($_POST["name"]);
 
        if (empty($name)) {
            $nameErr = "Name cannot be empty";
        } elseif (!preg_match("/^[a-zA-Z][a-zA-Z.\- ]+$/", $name)) {
            $nameErr = "Must start with a letter and contain a-z, A-Z, period, dash only";
        } else {
            // Check at least two words
            if (str_word_count($name) < 2) {
                $nameErr = "Must contain at least two words";
            }
        }
    }
 
    // ----------- 2. EMAIL VALIDATION -----------
    if (isset($_POST['email_submit'])) {
        $email = test_input($_POST["email"]);
 
        if (empty($email)) {
            $emailErr = "Email cannot be empty";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }
 
    // ----------- 3. DATE VALIDATION -----------
    if (isset($_POST['date_submit'])) {
        $dd = test_input($_POST["dd"]);
        $mm = test_input($_POST["mm"]);
        $yyyy = test_input($_POST["yyyy"]);
 
        if (empty($dd) || empty($mm) || empty($yyyy)) {
            $dateErr = "Date fields cannot be empty";
        } elseif (!is_numeric($dd) || $dd < 1 || $dd > 31) {
            $dateErr = "Day must be between 1-31";
        } elseif (!is_numeric($mm) || $mm < 1 || $mm > 12) {
            $dateErr = "Month must be between 1-12";
        } elseif (!is_numeric($yyyy) || $yyyy < 1953 || $yyyy > 1998) {
            $dateErr = "Year must be between 1953-1998";
        }
    }
 
    // ----------- 4. GENDER VALIDATION -----------
    if (isset($_POST['gender_submit'])) {
        if (empty($_POST["gender"])) {
            $genderErr = "At least one option must be selected";
        } else {
            $gender = $_POST["gender"];
        }
    }
 
    // ----------- 5. DEGREE VALIDATION -----------
    if (isset($_POST['degree_submit'])) {
        if (empty($_POST["degree"])) {
            $degreeErr = "At least two must be selected";
        } elseif (count($_POST["degree"]) < 2) {
            $degreeErr = "Please select at least two";
        } else {
            $degree = $_POST["degree"];
        }
    }
 
    // ----------- 6. BLOOD GROUP VALIDATION -----------
    if (isset($_POST['blood_submit'])) {
        if (empty($_POST["blood"])) {
            $bloodErr = "Must be selected";
        } else {
            $blood = $_POST["blood"];
        }
    }
}
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>PHP Form Validation - LAB 3.2</title>
    <style>
        .error { color:red; }
        form { margin-bottom: 40px; padding:10px; border:1px solid #ccc; width:350px; }
    </style>
</head>
<body>
 
<!-- 1. NAME FORM -->
<form method="post">
    <h3>Name Form</h3>
    Name: <input type="text" name="name" value="<?php echo $name; ?>">
    <span class="error"> <?php echo $nameErr; ?> </span><br><br>
    <input type="submit" name="name_submit" value="Submit">
</form>
 
<!-- 2. EMAIL FORM -->
<form method="post">
    <h3>Email Form</h3>
    Email: <input type="text" name="email" value="<?php echo $email; ?>">
    <span class="error"> <?php echo $emailErr; ?> </span><br><br>
    <input type="submit" name="email_submit" value="Submit">
</form>
 
<!-- 3. DATE FORM -->
<form method="post">
    <h3>Date of Birth</h3>
    DD: <input type="text" name="dd" size="2" value="<?php echo $dd; ?>">
    MM: <input type="text" name="mm" size="2" value="<?php echo $mm; ?>">
    YYYY: <input type="text" name="yyyy" size="4" value="<?php echo $yyyy; ?>">
    <span class="error"> <?php echo $dateErr; ?> </span><br><br>
    <input type="submit" name="date_submit" value="Submit">
</form>
 
<!-- 4. GENDER FORM -->
<form method="post">
    <h3>Gender</h3>
    <input type="radio" name="gender" value="Male" <?php if($gender=="Male") echo "checked"; ?>> Male
    <input type="radio" name="gender" value="Female" <?php if($gender=="Female") echo "checked"; ?>> Female
    <input type="radio" name="gender" value="Other" <?php if($gender=="Other") echo "checked"; ?>> Other
    <br>
    <span class="error"> <?php echo $genderErr; ?> </span><br><br>
    <input type="submit" name="gender_submit" value="Submit">
</form>
 
<!-- 5. DEGREE FORM -->
<form method="post">
    <h3>Degree</h3>
    <input type="checkbox" name="degree[]" value="SSC" <?php if(in_array("SSC", $degree)) echo "checked"; ?>> SSC  
    <input type="checkbox" name="degree[]" value="HSC" <?php if(in_array("HSC", $degree)) echo "checked"; ?>> HSC  
    <input type="checkbox" name="degree[]" value="BSc" <?php if(in_array("BSc", $degree)) echo "checked"; ?>> BSc  
    <input type="checkbox" name="degree[]" value="MSc" <?php if(in_array("MSc", $degree)) echo "checked"; ?>> MSc  
    <br>
    <span class="error"> <?php echo $degreeErr; ?> </span><br><br>
    <input type="submit" name="degree_submit" value="Submit">
</form>
 
<!-- 6. BLOOD GROUP FORM -->
<form method="post">
    <h3>Blood Group</h3>
    <select name="blood">
        <option value="">Select</option>
        <?php
        $groups = ["A+", "A-", "B+", "B-", "O+", "O-", "AB+", "AB-"];
        foreach ($groups as $g) {
            echo "<option value='$g' ".($blood==$g?"selected":"").">$g</option>";
        }
        ?>
    </select>
    <span class="error"> <?php echo $bloodErr; ?> </span><br><br>
    <input type="submit" name="blood_submit" value="Submit">
</form>
 
</body>
</html>
 