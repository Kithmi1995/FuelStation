<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");

if (isset($_POST['submit'])){
    $id = $_POST["delete_id"];

    $where = "id = '$id'";

    $fuel_data = delete("fuelprice", $where);

    if (isset($_SERVER['HTTP_REFERER'])){
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
}

