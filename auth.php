<?php
    include "temp/header.php";
    include "temp/db.php";
    include "temp/navguest.php";

    $message = '';

    if (!empty($_POST)){
        $login = $_POST['login'];
        $password = $_POST['password'];
        $sql = "select * from user where login = '$login' and password = '$password'";
        
        $result = $mysqli->query($sql);
        $user = mysqli_fetch_assoc($result);
        
        if (!empty($user)) {
            session_start();
            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['name'] = $user['name'];
            header("Location: lichcab.php");
        }
        else {
            $message = 'Неверно набран логин или пароль!';
        }
    }
?>

<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col text-center"><h1>Авторизуйтесь, чтобы войти в личный кабинет или арендовать авто</h1></div>
        <div class="col-2"></div>
    </div>

    <div class="row mt-5">
        <div class="col"></div>
        <div class="col">

            <form action="" method="POST">
                <div class="mb-3">
                    <label for="exampleInputLogin1" class="form-label">Логин</label>
                    <input type="text" name="login" class="form-control" id="exampleInputLogin1" aria-describedby="loginHelp" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Пароль</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                </div>
                <button type="submit" class="btn btn-primary">Войти</button>
            </form>

        </div>
        <div class="col"></div>
    </div>
    
    <div class="row mt-4">
        <div class="col"></div>
        <div class="col text-center">
            <?php
                echo $message;
            ?>
        </div>
        <div class="col"></div>
    </div>
</div>