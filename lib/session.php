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
