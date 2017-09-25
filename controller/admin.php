<?php
require_once '../model/data.php';

$req_general = req_select('infos_site');
$general = $req_general->fetch();
$img_gen = get_general_img($general);

include '../vue/template/header.php';

if (isset($_SESSION['user']) && isset($_SESSION['droits']) && $_SESSION['droits'] == 1) {
    // var_dump($erreurs);
    if(isset($erreurs) && count($erreurs) > 0) {
      foreach ($erreurs as $value) {
        echo 'Erreurs : ' . $value;
      }
      $erreurs = [];
    }

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
} else {
    include '../vue/adminconnect.php';
}

include('../vue/template/footer.php');
 ?>
