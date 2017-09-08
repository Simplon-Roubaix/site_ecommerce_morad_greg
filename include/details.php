<?php
  $id_voiture = $_POST['id'][0];
?>
  <div class="display_details">
    <h2><?php echo $voitures[$id_voiture]['modele']; ?></h2>
    <h3><?php echo $voitures[$id_voiture]['type']; ?></h3>
    <img src="<?php echo $voitures[$id_voiture]['image']; ?>" alt="<?php echo $voitures[$id_voiture]['modele']; ?>" class="col-12 mx-auto">
    <p class="text-justify"><?php echo $voitures[$id_voiture]['details']; ?></p>

    <form method="post">
        <input type="submit" name="submit" value="Retour" class="btn" id="btn_details">
    </form>

  </div>
