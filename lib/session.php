<?php
session_start();

function adminOnly()
{
    if (!$_SESSION["user"]) {
        header("location: ../login.php");
    } elseif ($_SESSION["user"]["role"] != "admin") {
        header("location: ../index.php");
    }
}

function employeOnly()
{
    if (!$_SESSION["user"]) {
        header("location: ../login.php");
    } elseif ($_SESSION["user"]["role"] != "employe") {
        header("location: ../index.php");
    }
}
