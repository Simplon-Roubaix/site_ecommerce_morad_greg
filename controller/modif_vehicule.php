<?php
  require_once '../model/data.php';
  include '../vue/template/header.php';
?>


<?php

  if(isset($_GET['id'])) {
    // cleans the id
    $id_v = trim($_GET['id']);
    $id_v = strip_tags($id_v);
    $id_v = htmlspecialchars($id_v);

    // gets the product from the sent id
    $reqv = req_select('vehicules', $id_v);

    $resultat = $reqv->fetchAll();

    // if product exists fills the inputs depending on the table entry
    if(count($resultat)) {
      include '../vue/modif_veh_vue.php';
    }
    // if product doesn't exist returns to admin.php
    else {
      header('Location: admin.php');
    }
  }
?>

<?php
  include ('../vue/template/footer.php');
?>
