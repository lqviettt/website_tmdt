<?php
require_once "session.php";
require_once "database.php";

Session::checkSession();

if (!Session::get('is_admin')) {
    header("Location: index.php");
    exit();
}

include "header.php";
include "slider.php";

?>