<?php
include('../vue/header.php');
require '../model/db/dbconnect.php';
include '../vue/adminvue.php';

  //goes in model
  $req_list = $bdd->query('SELECT id_v, marque, model FROM vehicules');
  $vehicules = $req_list->fetchAll();
  // displays all existing products
  foreach ($vehicules as $vehicule) {
      ?>
  <a href="modif_vehicule.php?id=<?php echo $vehicule['id_v']?>" class="list-group-item list-group-item-action">
    <?php echo $vehicule['marque'].' '.$vehicule['model']; ?>
  </a>
  <?php
  } ?>
</div>

<?php
include('../vue/footer.php');
 ?>
