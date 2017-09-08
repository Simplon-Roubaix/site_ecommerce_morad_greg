

<div class="col-lg-4 ">
  <div class="card-deck mx-auto m-4" style="width:350px">

      <!--Card image-->
      <img class="card-img-top mx-auto mt-1" style="width: 20rem;" src="<?php echo $voiture['image']; ?>" alt="<?php echo $voiture['modele']; ?>">

      <!--Card content-->
      <div class="card-block">
          <!--Title-->
          <h4 class="card-title"><?php echo $voiture['modele']; ?></h4>
          <!--Text-->
          <p class="card-text"><?php echo $voiture['type']; ?></p>
          <form method="post" style="width: 20rem;">
            <input type="hidden" name="id[]" value="<?php echo $id_voiture ?>">
            <input id="buttoncard" type="submit" name="submit" value="details" class="btn btn">
          </form>
      </div>
  </div>
</div>
