<?php
include '../db/dbconnect.php';

// displays details or all cards depending on what is sent or not
if(isset($_POST['id'])) {
  include('details.php');
}
else {
    $display_cards = $bdd->query('SELECT * FROM vehicules INNER JOIN images ON vehicules.id_v = images.id_v');
  $voitures = $display_cards->fetchAll();
  foreach($voitures as $voiture) {
      include('carte.php');
  }
  $display_cards->closeCursor();
}
?>
