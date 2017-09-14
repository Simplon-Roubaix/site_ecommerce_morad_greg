<?php
$display_details = $bdd->query('SELECT * FROM vehicules WHERE id_v = \'' . $_POST['id'][0] . '\'') or die(print_r($bdd->errorInfo()));
$voiture = $display_details->fetch();
$details_img = $bdd->query('SELECT source, alt FROM images WHERE idvehicule = \'' . $_POST['id'][0] . '\'') or die(print_r($bdd->errorInfo()));
$image = $details_img->fetch();
?>
  <div class="display_details">
    <h2><?php echo $voiture['marque']; ?></h2>
    <h3><?php echo $voiture['model']; ?></h3>
    <img src="<?php echo substr($image['source'],3); ?>" alt="<?php echo substr($image['source'],3); ?>" class="col-12 mx-auto">
    <p class="text-justify"><?php echo $voiture['descriptif']; ?></p>

    <form method="post">
        <input type="submit" name="submit" value="Retour" class="btn" id="btn_details">
    </form>

  </div>
