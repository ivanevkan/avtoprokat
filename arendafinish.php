<?php
    include "temp/header.php";
    include "temp/db.php";

    session_start();

    include "temp/navclient.php";

?>

<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col text-center"><h1>Давайте закончим оформление аренды!</h1></div>
        <div class="col"></div>
    </div>
    <div class="row">
        <div class="col"></div>
        <div class="col">

        <form action="arenda.php" method="POST">
            <input type="hidden" name="id_car" value="<?php echo $_POST['id_car'];?>">

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">На сколько дней хотите арендовать?</label>
                <input type="number" name="days" min="1" max="7" class="form-control" id="exampleInputPassword1">
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                <label class="form-check-label" for="exampleCheck1">Внести залог</label>
            </div>
            <button type="submit" class="btn btn-primary">Арендовать</button>
        </form>

        </div>
        <div class="col"></div>
    </div>
</div>