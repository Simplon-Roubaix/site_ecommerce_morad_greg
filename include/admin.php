<?php
include('header.php');

 ?>
 
 <form class="" action="index.html" method="post">

 <div class="form-group row">
   <label for="example-text-input" class="col-2 col-form-label">Marque</label>
   <div class="col-10">
     <input class="form-control" type="text" value="" placeholder="MERCEDES" id="example-text-input">
   </div>
 </div>
 <div class="form-group row">
   <label for="example-search-input" class="col-2 col-form-label">modele</label>
   <div class="col-10">
     <input class="form-control" type="search" value="" placeholder="C220 CDI" id="example-search-input">
   </div>
 </div>
 <div class="form-group row">
   <label for="example-email-input" class="col-2 col-form-label">descriptifs</label>
   <div class="col-10">
     <input class="form-control" type="email" value="" placeholder="OPTIONS" id="example-email-input">
   </div>
 </div>

 <div class="form-group row">
   <label for="example-date-input" class="col-2 col-form-label">Date</label>
   <div class="col-10">
     <input class="form-control" type="date" value="" placeholder="24/07/2015" id="example-date-input">
   </div>
 </div>
 <div class="form-group row">
   <label for="example-price-input" class="col-2 col-form-label">Prix</label>
   <div class="col-10">
     <input class="form-control" type="text" value="" placeholder="18000€" id="example-price-input">
   </div>
 </div>
 <button class="btn btn-lg btn-primary btn-block" type="submit">
 Enregistrer</button>

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
