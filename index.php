<?php
    include "temp/header.php";
    include "temp/db.php";

    session_start();

    if (!empty($_SESSION['id_user'])){
        include "temp/navclient.php";
    }
    else {
        include "temp/navguest.php";
    }

    $sql = "select count(*) from marka";
    $result = $mysqli->query($sql);

    $sql1 = "SELECT car.*, marka.name AS marka_name FROM car, marka WHERE car.id_marka = marka.id_marka AND marka.id_marka = 1 AND status = 1";
    $result1 = $mysqli->query($sql1);

    $sql2 = "SELECT car.*, marka.name AS marka_name FROM car, marka WHERE car.id_marka = marka.id_marka AND marka.id_marka = 2 AND status = 1";
    $result2 = $mysqli->query($sql2);

    $sql3 = "SELECT car.*, marka.name AS marka_name FROM car, marka WHERE car.id_marka = marka.id_marka AND marka.id_marka = 3 AND status = 1";
    $result3 = $mysqli->query($sql3);
?>

<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col text-center"><h1>Добро пожаловать!</h1></div>
        <div class="col"></div>
    </div>

    <div class="row mt-5">
        <div class="col"></div>
        <div class="col text-center"><h2>Лада</h2></div>
        <div class="col"></div>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
            foreach ($result1 as $row1) {
                echo '
                <div class="col">
                    <div class="card h-100">
                    <img src="..." class="card-img-top" alt="'.$row1['marka_name'].' '.$row1['model'].'">
                    <div class="card-body">
                        <h5 class="card-title">'.$row1['marka_name'].' '.$row1['model'].'</h5>
                        <p class="card-text">'.$row1['stoimost_day'].'р в сутки. Залог: '.$row1['zalog'].'</p>
                        ';
                        if (!empty($_SESSION['id_user'])){
                            echo '<form action="arendafinish.php" method="POST">
                            <input type="hidden" name="id_car" value="'.$row1['id_car'].'">

                            <button type="submit" class="btn btn-primary">Арендовать</button>
                            </form>';
                        }
                        else {
                            echo '<a href="auth.php" class="btn btn-primary">Арендовать</a>';
                        }
                        echo '
                    </div>
                    </div>
                </div>
                ';
            }
        ?>
        
    </div>

    <div class="row mt-5">
        <div class="col"></div>
        <div class="col text-center"><h2>Москвич</h2></div>
        <div class="col"></div>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
            foreach ($result2 as $row2) {
                echo '
                <div class="col">
                    <div class="card h-100">
                    <img src="..." class="card-img-top" alt="'.$row2['marka_name'].' '.$row2['model'].'">
                    <div class="card-body">
                        <h5 class="card-title">'.$row2['marka_name'].' '.$row2['model'].'</h5>
                        <p class="card-text">'.$row2['stoimost_day'].'р в сутки. Залог: '.$row2['zalog'].'</p>
                        ';
                        if (!empty($_SESSION['id_user'])){
                            echo '<form action="arendafinish.php" method="POST">
                            <input type="hidden" name="id_car" value="'.$row2['id_car'].'">

                            <button type="submit" class="btn btn-primary">Арендовать</button>
                            </form>';
                        }
                        else {
                            echo '<a href="auth.php" class="btn btn-primary">Арендовать</a>';
                        }
                        echo '
                    </div>
                    </div>
                </div>
                ';
            }
        ?>
        
    </div>

    <div class="row mt-5">
        <div class="col"></div>
        <div class="col text-center"><h2>КамАЗ</h2></div>
        <div class="col"></div>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
            foreach ($result3 as $row3) {
                echo '
                <div class="col">
                    <div class="card h-100">
                    <img src="..." class="card-img-top" alt="'.$row3['marka_name'].' '.$row3['model'].'">
                    <div class="card-body">
                        <h5 class="card-title">'.$row3['marka_name'].' '.$row3['model'].'</h5>
                        <p class="card-text">'.$row3['stoimost_day'].'р в сутки. Залог: '.$row3['zalog'].'</p>
                        ';
                        if (!empty($_SESSION['id_user'])){
                            echo '<form action="arendafinish.php" method="POST">
                            <input type="hidden" name="id_car" value="'.$row3['id_car'].'">

                            <button type="submit" class="btn btn-primary">Арендовать</button>
                            </form>';
                        }
                        else {
                            echo '<a href="auth.php" class="btn btn-primary">Арендовать</a>';
                        }
                        echo '
                    </div>
                    </div>
                </div>
                ';
            }
        ?>
        
    </div>
</div>

<?php
    include "temp/footer.php";
?>
