<?php
include '../model/data.php';
include '../vue/template/header.php';
include '../vue/adminvue.php';

  $req_list = req_select('vehicules');
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
include('../vue/template/footer.php');
 ?>
