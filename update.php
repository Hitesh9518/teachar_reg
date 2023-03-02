<?php
require 'config.php';

$fnameErr = $mnameErr = $lnameErr = $dobErr = $genderErr = $hobbiesErr = $addressErr = $graduationErr = $mobileErr = $emailErr = $cityErr = $stateErr = $pincodeErr = "";
$fname = $mname = $lname = $dob = $gender = $hobbies = $address = $graduation = $mobile = $email = $city = $state = $pincode = "";

?>

<?php

// Update 

if (isset($_POST['update'])) {

    $id = $_POST['id'];

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

    if ($fnameErr == "" && $mnameErr == "" && $lnameErr == "" && $dobErr == "" && $genderErr == "" && $hobbiesErr == "" && $addressErr == "" && $graduationErr == "" && $mobileErr == "" && $emailErr == "" && $cityErr == "" && $stateErr == "" && $pincodeErr == "") {

        $update = "update teachar_registration set fname = '$fname',mname = '$mname',lname = '$lname',dob = '$dob',gender = '$gender',hobbies = '$hobbies',address = '$address',graduation = '$graduation',mobile = '$mobile',email = '$email',city = '$city',state = '$state',pincode = '$pincode' where id='$id'";

        $result = mysqli_query($con, $update);

        // echo "<script>window.location.href='display.php';</script>";
        echo "<center>Done...!</center>";
    }
}
?>

<?php
// Data Fetch
$id = $_GET['id'];

$result = mysqli_query($con, "select * from teachar_registration where id='$id'");

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        $id = $row['id'];
        $fname = $row['fname'];
        $mname = $row['mname'];
        $lname = $row['lname'];
        $dob = $row['dob'];
        $gender = $row['gender'];
        $hobbies = explode(",", $row['hobbies']);
        $address = $row['address'];
        $graduation = $row['graduation'];
        $mobile = $row['mobile'];
        $email = $row['email'];
        $city = $row['city'];
        $state = $row['state'];
        $pincode = $row['pincode'];

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
                            <!-- <td>Id</td> -->
                            <td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
                        </tr>
                        <tr>
                            <td>First Name :</td>
                            <td><input type="text" name="fname" value="<?php echo $fname; ?>">
                                <span class="error"><?php echo $fnameErr; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Middle Name :</td>
                            <td><input type="text" name="mname" value="<?php echo $mname; ?>">
                                <span class="error"><?php echo $mnameErr; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Last Name :</td>
                            <td><input type="text" name="lname" value="<?php echo $lname; ?>">
                                <span class="error"><?php echo $lnameErr; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>DOB :</td>
                            <td><input type="date" name="dob" value="<?php echo $dob; ?>">
                                <span class="error"><?php echo $dobErr; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Gender :</td>
                            <td><input type="radio" name="gender" value="Male" <?php if ($gender == "Male") echo "checked"; ?>>MALE
                                <input type="radio" name="gender" value="Female" <?php if ($gender == "Female") echo "checked"; ?>>FEMALE
                                <span class="error"><?php echo $genderErr; ?>
                            </td>

                        </tr>
                        <tr>
                            <td>Hobbies :</td>
                            <td><input type="checkbox" name="hobbies[]" value="Reading" <?php if (in_array("Reading", $hobbies)) echo "checked"; ?>>Reading
                                <input type="checkbox" name="hobbies[]" value="Cycling" <?php if (in_array("Cycling", $hobbies)) echo "checked"; ?>>Cycling
                                <input type="checkbox" name="hobbies[]" value="Travelling" <?php if (in_array("Travelling", $hobbies)) echo "checked"; ?>>Travelling
                                <span class="error"><?php echo $hobbiesErr; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Graduation :</td>
                            <td><input type="radio" name="graduation" value="Bca" <?php if ($graduation == "Bca") echo "checked"; ?>>BCA
                                <input type="radio" name="graduation" value="Bcom" <?php if ($graduation == "Bcom") echo "checked"; ?>>BCOM
                                <input type="radio" name="graduation" value="Bba" <?php if ($graduation == "Bba") echo "checked"; ?>>BBA
                                <span class="error"><?php echo $graduationErr; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Address :</td>
                            <td><textarea cols="21" rows="3" name="address"><?php echo $address; ?></textarea>
                                <span class="error"><?php echo $addressErr; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Mobile No :</td>
                            <td><input type="text" name="mobile" value="<?php echo $mobile; ?>">
                                <span class="error"><?php echo $mobileErr; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Email :</td>
                            <td><input type="text" name="email" value="<?php echo $email; ?>">
                                <span class="error"><?php echo $emailErr; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>City :</td>
                            <td><select name="city">

                                    <option disabled selected>--- Select City ---
                                    <option>
                                    <option value="Surat" <?php if ($city == "Surat") echo "selected"; ?>>Surat</option>
                                    <option value="Vadodara" <?php if ($city == "Vadodara") echo "selected"; ?>>Vadodara</option>
                                    <option value="Mumbai" <?php if ($city == "Mumbai") echo "selected"; ?>>Mumbai</option>
                                    <option value="Palghar" <?php if ($city == "Palghar") echo "selected"; ?>>Palghar</option>
                                    <option value="Patna" <?php if ($city == "Patna") echo "selected"; ?>>Patna</option>
                                    <option value="Jamalpur" <?php if ($city == "Jamalpur") echo "selected"; ?>>Jamalpur</option>
                                    <option value="Jaipur" <?php if ($city == "Jaipur") echo "selected"; ?>>Jaipur</option>
                                    <option value="Ajmer" <?php if ($city == "Ajmer") echo "selected"; ?>>Ajmer</option>
                                </select>
                                <span class="error"><?php echo $cityErr; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>State :</td>
                            <td><select name="state">
                                    <option disabled selected>--- Select State ---
                                    <option>
                                    <option value="Gujarat" <?php if ($state == "Gujarat") echo "selected"; ?>>Gujarat</option>
                                    <option value="Maharashtra" <?php if ($state == "Maharashtra") echo "selected"; ?>>Maharashtra</option>
                                    <option value="Bihar" <?php if ($state == "Bihar") echo "selected"; ?>>Bihar</option>
                                    <option value="Rajasthan" <?php if ($state == "Rajasthan") echo "selected"; ?>>Rajasthan</option>
                                </select>
                                <span class="error"><?php echo $stateErr; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Pincode</td>
                            <td><input type="text" name="pincode" value="<?php echo $pincode; ?>">
                                <span class="error"><?php echo $pincodeErr; ?>
                            </td>
                        </tr>
                    </table><br>
                    <input type="submit" name="update" value="Update">
                </form>
            </center>

    <?php
    }
}
    ?>
        </body>

        </html>