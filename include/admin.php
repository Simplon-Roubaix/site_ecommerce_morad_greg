<?php
include('header.php');

 ?>

 <h1>Ajouter un véhicule</h1>
 <form action="admin_post.php" method="post" enctype="multipart/form-data">
 <div class="form-group row">
   <label for="marque" class="col-2 col-form-label">Marque</label>
   <div class="col-10">
     <input class="form-control" type="text" name="marque_v" placeholder="Marque" id="marque">
   </div>
 </div>

 <div class="form-group row">
   <label for="modele" class="col-2 col-form-label">Modele</label>
   <div class="col-10">
     <input class="form-control" type="text" name="modele_v" placeholder="Modele" id="modele">
   </div>
 </div>

 <div class="form-group row">
   <label for="descriptif" class="col-2 col-form-label">Descriptifs</label>
   <div class="col-10">
     <input class="form-control" type="text" name="descriptif_v" placeholder="Descriptif" id="descriptif">
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
     <input class="form-control" type="text" value="" placeholder="18000€" id="prixv">
   </div>
 </div>

 <div class="form-group row">
   <label for="imgfile" class="col-2 col-form-label">Image</label>
   <div class="col-10">
     <input class="form-control" type="file" name="imgfile" id="imgfile">
   </div>
 </div>

 <div class="form-group row">
   <label for="descimg" class="col-2 col-form-label">Image Alt</label>
   <div class="col-10">
     <input class="form-control" type="text" name="altimg" placeholder="Alt" id="descimg">
   </div>
 </div>

 <button class="btn btn-lg btn-primary btn-block" type="submit">Enregistrer</button>

</form>
<div class="list-group d-flex justify-content-end">
  <a href="#" class="list-group-item active">
  Liste vehicule en vente
  </a>
  <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
  <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
  <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
  <a href="#" class="list-group-item list-group-item-action disabled">Vestibulum at eros</a>
</div>

<?php
include ('footer.php');
 ?>
