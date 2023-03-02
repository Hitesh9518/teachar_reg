<?php
require 'config.php';

// insert
$fnameErr = $mnameErr = $lnameErr = $dobErr = $genderErr = $hobbiesErr = $addressErr = $graduationErr = $mobileErr = $emailErr = $cityErr = $stateErr = $pincodeErr = "";
$fname = $mname = $lname = $dob = $gender = $hobbies = $address = $graduation = $mobile = $email = $city = $state = $pincode = "";

if (isset($_POST['insert'])) {

    // fname
    if (empty($_POST['fname'])) {

        $fnameErr = "First Name is Required";
    } else {
        $fname = $_POST['fname'];

        if (!preg_match("/^[a-zA-z]*$/", $fname)) {
            $fnameErr = "Only alphabets and whitespace are allowed.";
        } else {
            $fname = $_POST['fname'];
        }
    }

    // mname
    if (empty($_POST['mname'])) {

        $mnameErr = "Middle Name is Required";
    } else {
        $mname = $_POST['mname'];

        if (!preg_match("/^[a-zA-z]*$/", $mname)) {
            $mnameErr = "Only alphabets and whitespace are allowed.";
        } else {
            $mname = $_POST['mname'];
        }
    }

    // lname
    if (empty($_POST['lname'])) {

        $lnameErr = "Last Name is Required";
    } else {
        $lname = $_POST['lname'];

        if (!preg_match("/^[a-zA-z]*$/", $lname)) {
            $lnameErr = "Only alphabets and whitespace are allowed.";
        } else {
            $lname = $_POST['lname'];
        }
    }

    // dob
    if (empty($_POST['dob'])) {
        $dobErr = "DOB is Required";
    } else {
        $dob = $_POST['dob'];
    }

    // gender
    if (empty($_POST['gender'])) {
        $genderErr = "Gender is Required";
    } else {
        $gender = $_POST['gender'];
    }

    // hobbies
    if (empty($_POST['hobbies'])) {
        $hobbiesErr = "Hobbies is Required";
    } else {
        $hobbies = implode(",", $_POST['hobbies']);
    }

    // graduation
    if (empty($_POST['graduation'])) {
        $graduationErr = "Graduation is Required";
    } else {
        $graduation = $_POST['graduation'];
    }

    // address
    if (empty($_POST['address'])) {
        $addressErr = "Address is Required";
    } else {
        $address = $_POST['address'];
    }

    // mobile
    if (empty($_POST['mobile'])) {
        $mobileErr = "Mobile No is Required";
    } else {
        $mobile = $_POST['mobile'];

        if (!preg_match("/^[0-9]*$/", $mobile)) {
            $mobileErr = "Only Numeric Value Allowed";
        }
        if (strlen($mobile) != 10) {
            $mobileErr = "Mobile no must contain 10 digits";
        }
    }

    // email
    if (empty($_POST['email'])) {
        $emailErr = "Email is Required";
    } else {
        $email = $_POST['email'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid Email Format";
        }
    }

    // city
    if (empty($_POST['city'])) {
        $cityErr = "City is Required";
    } else {
        $city = $_POST['city'];
    }

    // state
    if (empty($_POST['state'])) {
        $stateErr = "State is Required";
    } else {
        $state = $_POST['state'];
    }

    // pincode
    if (empty($_POST['pincode'])) {
        $pincodeErr = "Pincode No is Required";
    } else {
        $pincode = $_POST['pincode'];

        if (!preg_match("/^[0-9]*$/", $pincode)) {
            $pincodeErr = "Only Numeric Value Allowed";
        }
        if (strlen($pincode) != 6) {
            $pincodeErr = "Pincode no must contain 6 digits";
        }
    }
    // $fname = $_POST['fname'];
    // $mname = $_POST['mname'];
    // $lname = $_POST['lname'];
    // $dob = $_POST['dob'];
    // $gender = $_POST['gender'];
    // $hobbies = implode(",",$_POST['hobbies']);
    // $address = $_POST['address'];
    // $graduation = $_POST['graduation'];
    // $mobile = $_POST['mobile'];
    // $email = $_POST['email'];
    // $city = $_POST['city'];
    // $state = $_POST['state'];
    // $pincode = $_POST['pincode'];

    if ($fname !== "" && $mname !== "" && $lname !== "" && $dob !== "" && $gender !== "" && $hobbies !== "" && $address !== "" && $graduation !== "" && $mobile !== "" && $email !== "" && $city !== "" && $state !== "" && $pincode !== "") {

        $insert = "insert into teachar_registration values (NULL,'$fname','$mname','$lname','$dob','$gender','$hobbies','$address','$graduation','$mobile','$email','$city','$state','$pincode',1);";

        $result = mysqli_query($con, $insert);

        // echo "<script>window.location.href='display.php';</script>";
        echo "<center>Done...!</center>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>

<body>
    <center>
        <br><br>
        <h2>Add Teachar Data</h2>
        <form method="POST" autocomplete="off">
            <table border="2">
                <tr>
                    <td>First Name :</td>
                    <td><input type="text" name="fname">
                        <span class="error"><?php echo $fnameErr; ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Middle Name :</td>
                    <td><input type="text" name="mname">
                        <span class="error"><?php echo $mnameErr; ?>
                    </td>
                </tr>
                <tr>
                    <td>Last Name :</td>
                    <td><input type="text" name="lname">
                        <span class="error"><?php echo $lnameErr; ?>
                    </td>
                </tr>
                <tr>
                    <td>DOB :</td>
                    <td><input type="date" name="dob">
                        <span class="error"><?php echo $dobErr; ?>
                    </td>
                </tr>
                <tr>
                    <td>Gender :</td>
                    <td><input type="radio" name="gender" value="Male">MALE
                        <input type="radio" name="gender" value="Female">FEMALE
                        <span class="error"><?php echo $genderErr; ?>
                    </td>
                </tr>
                <tr>
                    <td>Hobbies :</td>
                    <td><input type="checkbox" name="hobbies[]" value="Reading">Reading
                        <input type="checkbox" name="hobbies[]" value="Cycling">Cycling
                        <input type="checkbox" name="hobbies[]" value="Travelling">Travelling
                        <span class="error"><?php echo $hobbiesErr; ?>
                    </td>
                </tr>
                <tr>
                    <td>Graduation :</td>
                    <td><input type="radio" name="graduation" value="Bca">BCA
                        <input type="radio" name="graduation" value="Bcom">BCOM
                        <input type="radio" name="graduation" value="Bba">BBA
                        <span class="error"><?php echo $graduationErr; ?>
                    </td>
                </tr>
                <tr>
                    <td>Address :</td>
                    <td><textarea cols="21" rows="3" name="address"></textarea>
                        <span class="error"><?php echo $addressErr; ?>
                    </td>
                </tr>
                <tr>
                    <td>Mobile No :</td>
                    <td><input type="text" name="mobile">
                        <span class="error"><?php echo $mobileErr; ?>
                    </td>
                </tr>
                <tr>
                    <td>Email :</td>
                    <td><input type="text" name="email">
                        <span class="error"><?php echo $emailErr; ?>
                    </td>
                </tr>
                <tr>
                    <td>City :</td>
                    <td><select name="city">

                            <option disabled selected>--- Select City ---
                            <option>
                            <option value="Surat">Surat</option>
                            <option value="Vadodara">Vadodara</option>
                            <option value="Mumbai">Mumbai</option>
                            <option value="Palghar">Palghar</option>
                            <option value="Patna">Patna</option>
                            <option value="Jamalpur">Jamalpur</option>
                            <option value="Jaipur">Jaipur</option>
                            <option value="Ajmer">Ajmer</option>
                        </select>
                        <span class="error"><?php echo $cityErr; ?>
                    </td>
                </tr>
                <tr>
                    <td>State :</td>
                    <td><select name="state">
                            <option disabled selected>--- Select State ---
                            <option>
                            <option value="Gujarat">Gujarat</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Bihar">Bihar</option>
                            <option value="Rajasthan">Rajasthan</option>
                        </select>
                        <span class="error"><?php echo $stateErr; ?>
                    </td>
                </tr>
                <tr>
                    <td>Pincode</td>
                    <td><input type="text" name="pincode">
                        <span class="error"><?php echo $pincodeErr; ?>
                    </td>
                </tr>
            </table><br>
            <input type="submit" name="insert" value="Submit">
            <a href="display.php"><input type="button" name="display" value="Display"></a>
        </form>
    </center>
</body>

</html>