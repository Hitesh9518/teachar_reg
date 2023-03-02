<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <center>
        <br><br>
        <form method="POST">
            <input type="date" name="search_dob">
            <input type="submit" name="submit" value="Search">
        </form>

        <?php
        if (isset($_POST['submit']) && $_POST['search_dob'] !== "") {
            $search_dob = $_POST['search_dob'];

            $sql = "select * from teachar_registration where dob = '$search_dob'";

            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo "<br><br>";


                echo "<table border='2'>

            <tr>
                <th>Id</th>
                <th>Fname</th>
                <th>Mname</th>
                <th>Lname</th>
                <th>Dob</th>
                <th>Gender</th>
                <th>Hobbies</th>
                <th>Address</th>
                <th>Graduation</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>City</th>
                <th>State</th>
                <th>Pincode</th>
            </tr>";

                while ($row = mysqli_fetch_assoc($result)) {

                    $id = $row['id'];
                    $fname = $row['fname'];
                    $mname = $row['mname'];
                    $lname = $row['lname'];
                    $dob = date("d-m-Y", strtotime($row['dob']));
                    $gender = $row['gender'];
                    $hobbies = $row['hobbies'];
                    $address = $row['address'];
                    $graduation = $row['graduation'];
                    $mobile = $row['mobile'];
                    $email = $row['email'];
                    $city = $row['city'];
                    $state = $row['state'];
                    $pincode = $row['pincode'];

                    echo "<tr>
                        <td>$id</td>
                        <td>$fname</td>
                        <td>$mname</td>
                        <td>$lname</td>
                        <td>$dob</td>
                        <td>$gender</td>
                        <td>$hobbies</td>
                        <td>$address</td>
                        <td>$graduation</td>
                        <td>$mobile</td>
                        <td>$email</td>
                        <td>$city</td>
                        <td>$state</td>
                        <td>$pincode</td>
                        </tr>";
                }
            } else {
                echo "No Records..!";
            }
        } else {
            echo "Please Enter Search Data..!";
        }
        ?>
    </center>
</body>

</html>