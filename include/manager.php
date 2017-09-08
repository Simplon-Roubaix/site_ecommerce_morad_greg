<?php
include 'include/voiture.php';

if(isset($_POST['id'])) {

  include('include/details.php');
}
else {

  foreach($voitures as $id_voiture => $voiture) {
      include('include/carte.php');
  }
}
?>
