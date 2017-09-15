<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?php include('tableau.php');
    echo $tableau['titre'];
  ?></title>
  <meta name="author" content="<?php $tableau['author']; ?>">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="<?php echo $tableau['favicon']?>">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.2/css/mdb.min.css" />
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
</head>

<body>
  <header class="">
    <div class="row" id="block-logo">
      <img class="col-lg-3 col-md-3 rounded mx-auto d-block " src="img/may-bach-logo.png" alt="logo">

    </div>

    <ul class="nav nav-tabs bg-inverse">

    <li class="nav-item">
      <a class="nav-link" href="../index.php">ACCUEIL</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">NOS VEHICULES</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">FINANCEMENT</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">CONTACT</a>
    </li>
    <li class="nav-item">
      <a href='include/sign.php' class="nav-link" href="#">CONNECTER</a>
    </li>

  </ul>


</header>
