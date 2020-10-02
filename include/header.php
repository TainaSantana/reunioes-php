<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon2.ico">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Agendamento de Reunião</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="assets/icones/css/all.css" rel="stylesheet">
    </head>
    <body class="d-flex flex-column h-100">
    <!--Menu-->
    <header>
    <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="/index.php">
        <img src="assets/img/home.png" width="30" class="d-inline-block align-top" loading="lazy">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="../lds-reuniao/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cadastrar.php">Agendamento de Reunião</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="ata.php">Atas</a>
          </li>
      </ul>
      
    </div>
  </nav>
    </header>