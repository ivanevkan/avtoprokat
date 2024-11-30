<?php
    include "temp/header.php";
    include "temp/db.php";

    if (!empty($_SESSION('id_user'))){
        include "temp/navclient.php";
    }
    else {
        include "temp/navguest.php";
    }
?>