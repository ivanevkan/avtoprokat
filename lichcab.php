<?php
    include "temp/header.php";
    include "temp/db.php";
    include "temp/navclient.php";

    session_start();

    $id_user = $_SESSION['id_user'];
    $user_name = $_SESSION['name'];
    
    $sql = "select arenda.*, car.model as car_model, marka.name as car_marka from arenda, car, marka where id_user = '$id_user' and arenda.id_car = car.id_car and marka.id_marka = car.id_marka";
    $result = $mysqli->query($sql);
?>

<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col text-center"><h1>Добро пожаловать в личный кабинет, <?php echo $user_name;?>!</h1></div>
        <div class="col-2"></div>
    </div>

    <div class="row mt-5">
        <div class="col"></div>
        <div class="col text-center"><h2>Ваши арендованные автомобили:</h2></div>
        <div class="col"></div>
    </div>

    <div class="row mt-5">
        <div class="col-2"></div>
        <div class="col">


        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Автомобиль</th>
                <th scope="col">Дата аренды</th>
                <th scope="col">Количество дней</th>
                <th scope="col">Сумма аренды</th>
                </tr>
            </thead>
            <tbody>

            <?php
                foreach ($result as $row){
                    echo '
                    
                    <tr>
                        <th scope="row">'.$row['id_arenda'].'</th>
                        <td>'.$row['car_marka'].' '.$row['car_model'].'</td>
                        <td>'.$row['date'].'</td>
                        <td>'.$row['days'].'</td>
                        <td>'.$row['summ'].'</td>
                    </tr>
                    ';
                }
            ?>

            </tbody>
        </table>
        </div>
        <div class="col-2"></div>
    </div>
</div>