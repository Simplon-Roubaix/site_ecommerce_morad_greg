<?php

$display_details = req_inner_vehicules_img($_POST['id'][0]);
$voiture = $display_details->fetch();
?>
  <div class="display_details">
    <h2><?php echo $voiture['marque']; ?></h2>
    <h3><?php echo $voiture['model']; ?></h3>
    <img src="<?php echo $voiture['source']; ?>" alt="<?php echo $voiture['alt']; ?>" class="col-12 mx-auto">
    <p class="text-justify"><?php echo $voiture['descriptif']; ?></p>
    <form method="post">
        <input type="submit" name="submit" value="Retour" class="btn" id="btn_details">
    </form>

  </div>
