<?php
require '../model/db/dbconnect.php';
// goes in model
  $req_general = $bdd->query('SELECT * FROM infos_site');
  $general = $req_general->fetch();
  $reqimg = $bdd->query('SELECT source FROM images WHERE id_i = \''. $general['favicon'] .'\' OR id_i = \''. $general['logo'] .'\'');
  $img_gen = $reqimg->fetchAll();
?>

<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?php echo $general['titre']; ?></title>
  <meta name="author" content="<?php $general['auteur']; ?>">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="<?php echo $img_gen[1]['source']; ?>">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.2/css/mdb.min.css" />
  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="../css/main.css">
</head>

<body>
  <header class="">
    <div class="row" id="block-logo">
      <img class="col-lg-3 col-md-3 rounded mx-auto d-block " src="<?php echo $img_gen[0]['source']; ?>" alt="logo">
<?php $reqimg->closeCursor(); ?>
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
      <a href='sign.php' class="nav-link" href="#">CONNECTER</a>
    </li>

  </ul>


</header>
