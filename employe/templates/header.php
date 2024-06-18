<?php
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../lib/pdo.php';
require_once __DIR__ . '/../../lib/session.php';

employeOnly();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Option 1: Include in HTML -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/styles2.css">
    <title>Interface Employé</title>
</head>
<body>

<div class=" d-flex parrot-color">


<div class="d-flex flex-column flex-shrink-0 p-3 header_footer">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <span class="fs-4 btn btn-primary">Tableau de Bord</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="/employe/index.php" class="nav-link parrotbtn  m-1" >
          <i class="bi-speedometer2 bi pe-none me-2"></i>
          Accueil
        </a>
      </li>
      <li >
        <a href="commentaires.php" class="nav-link text-white parrotbtn m-1">
        <i class="bi bi-person-circle"></i>
          Commentaires
        </a>
      </li>

    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
      data-bs-toggle="dropdown" aria-expanded="false">
        <img src="<?=ICON_LOG_INTERFACE?>" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>LogOut</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
        <li><a class="dropdown-item parrotbtn" href="/deconnexion.php">Déconnexion</a></li>
      </ul>
    </div>
  </div>

  <main class="d-flex flex-column px-4">
