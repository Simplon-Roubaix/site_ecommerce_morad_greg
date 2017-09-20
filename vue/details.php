<?php

// selects content of vehicules and images tables depending on sent id
// goes in model
require '../model/queries.php';
$display_details = $bdd->query('SELECT * FROM vehicules INNER JOIN images ON vehicules.id_v = images.id_v WHERE vehicules.id_v = \'' . $_POST['id'][0] . '\'');
$voiture = $display_details->fetch();
$voiture = req_inner_vehicules_img($_POST['id'][0]);
?>
  <div class="display_details">
    <h2><?php echo $voiture['marque']; ?></h2>
    <h3><?php echo $voiture['model']; ?></h3>
    <img src="<?php echo $voiture['source']; ?>" alt="<?php echo $voiture['alt']; ?>" class="col-12 mx-auto">
    <p class="text-justify"><?php echo $voiture['descriptif']; ?></p>
<?php
  $display_details->closeCursor();
 ?>
    <form method="post">
        <input type="submit" name="submit" value="Retour" class="btn" id="btn_details">
    </form>

  </div>
