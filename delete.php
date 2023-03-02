<?php
    require 'config.php';

    //Delete

    $id = $_GET['id'];

    $result = mysqli_query($con,"delete from teachar_registration where id='$id'");

    echo "<script>window.location.href='display.php';</script>";
?>