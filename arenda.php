<?php
    include "temp/db.php";

    session_start();

    $id_user = $_SESSION['id_user'];
    $id_car = $_POST['id_car'];
    $date = date('Y-m-d');
    $days = $_POST['days'];

    $sql = "select car.stoimost_day from car where id_car = '$id_car'";
    $result = $mysqli->query($sql);
    $avto = mysqli_fetch_assoc($result);
    $summ = $avto['stoimost_day'] * $days;

    $sql = "INSERT INTO `arenda`(`id_user`, `id_car`, `date`, `days`, `summ`) VALUES ('$id_user','$id_car','$date','$days','$summ')";
    $mysqli->query($sql);

    header("Location: lichcab.php");
?>