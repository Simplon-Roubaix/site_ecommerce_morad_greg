<h1 class="adminh">Modifier/supprimer un véhicule</h1>
<form action="admin_post.php" method="post" enctype="multipart/form-data" class="adminform">

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

<input type="hidden" name="operation" value="2">
<input type="hidden" name="idv" value="<?php echo $id_v; ?>">
<button class="btn btn-lg btn-primary btn-block" type="submit">Modifier</button>

</form>

<form action="admin_post.php" method="post">
  <input type="hidden" name="operation" value="3">
  <input type="hidden" name="idv" value="<?php echo $id_v; ?>">
  <input class="btn btn-lg btn-primary btn-block" type="submit" name="suppr" value="Supprimer">
</form>
<a href="admin.php" class="btn btn-lg btn-primary btn-block">Retour</a>
