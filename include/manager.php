<?php
include 'db/dbconnect.php';

if(isset($_POST['id'])) {
  include('include/details.php');
}
else {
  $display_cards = $bdd->query('SELECT * FROM vehicules') or die(print_r($bdd->errorInfo()));
  $voitures = $display_cards->fetchAll();
  foreach($voitures as $voiture) {
      include('include/carte.php');
  }
}
?>
