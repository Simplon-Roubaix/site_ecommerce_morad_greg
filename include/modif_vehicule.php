<?php
  include('header.php');
  include '../db/dbconnect.php';
?>


<?php
  if(isset($_GET['id'])) {
    $id_v = trim($_GET['id']);
    $id_v = strip_tags($id_v);
    $id_v = htmlspecialchars($id_v);
    $reqv = $bdd->query('SELECT * FROM vehicules WHERE id_v = \'' . $id_v . '\'') or die(print_r($bdd->errorInfo()));
    $resultat = $reqv->fetchAll();

    if(count($resultat)) {
    ?>
      <h1>Modifier/supprimer un véhicule</h1>
      <form action="admin_post.php" method="post" enctype="multipart/form-data">

      <div class="form-group row">
        <label for="marque" class="col-2 col-form-label">Marque</label>
        <div class="col-10">
          <input class="form-control" type="text" name="marque_v" value="<?php echo $resultat[0]['marque']; ?>" placeholder="Marque" id="marque" required>
        </div>
      </div>

      <div class="form-group row">
        <label for="modele" class="col-2 col-form-label">Modele</label>
        <div class="col-10">
          <input class="form-control" type="text" name="modele_v" value="<?php echo $resultat[0]['model']; ?>" placeholder="Modele" id="modele" required>
        </div>
      </div>

      <div class="form-group row">
        <label for="descriptif" class="col-2 col-form-label">Descriptifs</label>
        <div class="col-10">
          <input class="form-control" type="text" name="descriptif_v" value="<?php echo $resultat[0]['descriptif']; ?>" placeholder="Descriptif" id="descriptif" required>
        </div>
      </div>

      <div class="form-group row">
        <label for="datev" class="col-2 col-form-label">Date</label>
        <div class="col-10">
          <input class="form-control" type="date" name="date_v" value="<?php echo $resultat[0]['annee']; ?>" placeholder="24/07/2015" id="datev">
        </div>
      </div>

      <div class="form-group row">
        <label for="prixv" class="col-2 col-form-label">Prix</label>
        <div class="col-10">
          <input class="form-control" type="text" name="prix_v"  value="<?php echo $resultat[0]['prix_de_vente']; ?>"placeholder="18000€" id="prixv">
        </div>
      </div>

      <?php
      /*$reqimg = $bdd->query('SELECT * FROM images WHERE WHERE id_v = \'' . $id_v . '\'') or die(print_r($bdd->errorInfo()));
      $imgres = $reqimg->fetchAll();
      $lastimg = $imgres[count($imgres)-1];*/
      ?>

      <!-- <div class="form-group row">
        <label for="imgfile" class="col-2 col-form-label">Image</label>
        <div class="col-10">
          <input class="form-control" type="file" name="imgfile" id="imgfile" required>
        </div>
      </div>

      <div class="form-group row">
        <label for="descimg" class="col-2 col-form-label">Image Alt</label>
        <div class="col-10">
          <input class="form-control" type="text" name="altimg" value="<?php //echo $lastimg['alt']; ?>" placeholder="Alt" id="descimg" required>
        </div>
      </div> -->

      <input type="hidden" name="operation" value="2">

      <button class="btn btn-lg btn-primary btn-block" type="submit">Modifier</button>

      </form>

      <form action="admin_post.php" method="post">
        <input type="hidden" name="operation" value="3">
        <input type="submit" name="suppr" value="Supprimer">
      </form>

    <?php
    }
    else {
      header('Location: admin.php');
    }
  }
?>

<?php
  include ('footer.php');
?>
