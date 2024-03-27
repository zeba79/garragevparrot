<?php

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/lib/session.php';
session_destroy();
unset($_SESSION);
header("location: connexion.php");
