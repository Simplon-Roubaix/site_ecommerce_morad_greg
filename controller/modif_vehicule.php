<?php
  include('../vue/header.php');
?>


<?php
  // goes in controller
  if(isset($_GET['id'])) {
    // cleans the id
    $id_v = trim($_GET['id']);
    $id_v = strip_tags($id_v);
    $id_v = htmlspecialchars($id_v);

    // goes in model
    // gets the product from the sent id
    $reqv = $bdd->query('SELECT * FROM vehicules WHERE id_v = \'' . $id_v . '\'') or die(print_r($bdd->errorInfo()));
    $resultat = $reqv->fetchAll();

    // goes in controller
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
  include ('../vue/footer.php');
?>
