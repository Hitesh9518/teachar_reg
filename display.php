<?php
require 'config.php';
?>

<?php
echo "<center>";

echo "<h2>Teachar's Data</h2>";
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
        <th>Operations</th>
    </tr>";

$result = mysqli_query($con, "select * from teachar_registration where status = 1");

while ($row = mysqli_fetch_assoc($result)) {

    $id = $row['id'];
    $fname = $row['fname'];
    $mname = $row['mname'];
    $lname = $row['lname'];
    $dob = $row['dob'];
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
                <td><a href='update.php?id=$row[id]'><input type='button' value='Edit'></a>
                <a href='update_2.php?id=$row[id]'><input type='button' value='Edit-2'></a>
                <a href='?id=$row[id]'><input type='button' value='Delete'></a>
                <a href='delete.php?id=$row[id]'><input type='button' value='Permanent Delete'></a></td>
            </tr>";
}
echo "</table>";
echo "<br>";
echo "<a href='insert.php'><input type='button' name='back' value='Back'></a>";

echo "</center>";
?>

<?php
// soft delete

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $id = $_GET['id'];

    $result = mysqli_query($con, "update teachar_registration set status = 0 where id = '$id'");

    echo "<script>window.location.href='display.php';</script>";
}
?>