<form action="admin_disconnect_post.php" method="post">
  <input type="submit" value="Disconnect">
</form>

<h1 class="adminh">Ajouter un véhicule</h1>
<form action="admin_post.php" method="post" enctype="multipart/form-data" class="adminform">

<div class="form-group row">
  <label for="marque" class="col-2 col-form-label">Marque</label>
  <div class="col-10">
    <input class="form-control" type="text" name="marque_v" placeholder="Marque" id="marque" required>
  </div>
</div>

<div class="form-group row">
  <label for="modele" class="col-2 col-form-label">Modele</label>
  <div class="col-10">
    <input class="form-control" type="text" name="modele_v" placeholder="Modele" id="modele" required>
  </div>
</div>

<div class="form-group row">
  <label for="descriptif" class="col-2 col-form-label">Descriptifs</label>
  <div class="col-10">
    <input class="form-control" type="text" name="descriptif_v" placeholder="Descriptif" id="descriptif" required>
  </div>
</div>

<div class="form-group row">
  <label for="datev" class="col-2 col-form-label">Date</label>
  <div class="col-10">
    <input class="form-control" type="date" name="date_v" placeholder="24/07/2015" id="datev">
  </div>
</div>

<div class="form-group row">
  <label for="prixv" class="col-2 col-form-label">Prix</label>
  <div class="col-10">
    <input class="form-control" type="text" name="prix_v" placeholder="18000€" id="prixv">
  </div>
</div>

<div class="form-group row">
  <label for="imgfile" class="col-2 col-form-label">Image</label>
  <div class="col-10">
    <input class="form-control" type="file" name="imgfile" id="imgfile" required>
  </div>
</div>

<input type="hidden" name="operation" value="1">
<button class="btn btn-lg btn-primary btn-block" type="submit">Enregistrer</button>

</form>

<div class="list-group d-flex justify-content-end">
 <a href="#" class="list-group-item active">
 Liste vehicule en vente
 </a>
