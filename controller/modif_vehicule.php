<?php
  require_once '../model/data.php';

  $req_general = req_select('infos_site');
  $general = $req_general->fetch();
  $img_gen = get_general_img($general);

  include '../vue/template/header.php';
?>


<?php
if (isset($_SESSION['user']) && isset($_SESSION['droits']) && $_SESSION['droits'] == 1) {
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
}
else {
  header('Location: admin.php');
}
?>

<?php
  include ('../vue/template/footer.php');
?>
