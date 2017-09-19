<?php
include '../db/dbconnect.php';

if(isset($_POST['id'])) {
  include('details.php');
}
else {
  //$display_cards = $bdd->query('SELECT * FROM vehicules') or die(print_r($bdd->errorInfo()));
  $display_cards = $bdd->query('SELECT * FROM vehicules INNER JOIN images ON vehicules.id_v = images.id_v');
  $voitures = $display_cards->fetchAll();
  foreach($voitures as $voiture) {
      include('carte.php');
  }
  $display_cards->closeCursor();
}
?>
