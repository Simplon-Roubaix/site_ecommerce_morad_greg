<?php
session_start();
include '../db/dbconnect.php';

//verif
if (isset($_POST['login'] ) AND isset($_POST['pass'])
AND !empty($_POST['login'] ) AND !empty($_POST['pass'])) {
  echo 'champs respectés';
  //securise
  $login = htmlspecialchars($_POST['login']);
  $pass = sha1(htmlspecialchars($_POST['pass']));

  //apel bdd utilisateur?
  $query=$bdd->prepare('SELECT *
    FROM table_utilisateurs WHERE login = :login AND password = :pass');

  $query->bindValue(':login',$login, PDO::PARAM_STR);
  $query->bindValue(':pass',$pass, PDO::PARAM_STR);
  $query->execute();

  $data=$query->fetch();
  if($data) {
    //redirige

     header("Location: admin.php");
  } else {
    //genere message erreur user mdp non compatible


    // creer une variable error dans session

$_SESSION['erreur']= '<div class="alert alert-danger" role="alert"><p>Une erreur s\'est produite
    pendant votre identification.<br /> Le mot de passe ou le pseudo
          entré n\'est pas correct.</p><p>Cliquez <a href="Sign.php">ici</a>
    pour revenir à la page précédente
    <br /><br />Cliquez <a href="../index.php">ici</a>
    pour revenir à la page d accueil</p></div>';
    header("Location: sign.php");
  }

} else {

  //genere message erreur champs vide
  $_SESSION['erreur'] = '<p>une erreur s\'est produite pendant votre identification.
Vous devez remplir tous les champs</p>
<p>Cliquez <a href="../index.php">ici</a> pour revenir</p>';
header("Location: sign.php");

}





?>
