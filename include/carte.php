
<div class="col-lg-4 ">
  <div class="card-deck mx-auto m-4" style="width:350px">
      <?php
        $req_img = $bdd->query('SELECT source, alt FROM images WHERE idvehicule = \'' . $voiture['id_v'] . '\'');
        $img = $req_img->fetch();
      ?>
      <!--Card image-->
      <img class="card-img-top mx-auto mt-1" style="width: 20rem;" src="<?php echo substr($img['source'], 3); ?>" alt="<?php echo $img['alt']; ?>">
      <?php
        $req_img->closeCursor();
      ?>
      <!--Card content-->
      <div class="card-block">
          <!--Title-->
          <h4 class="card-title"><?php echo $voiture['marque']; ?></h4>
          <!--Text-->
          <p class="card-text"><?php echo $voiture['model']; ?></p>
          <form method="post" style="width: 20rem;">
            <input type="hidden" name="id[]" value="<?php echo $voiture['id_v'] ?>">

            <input id="buttoncard" type="submit" name="submit" value="Détails" class="btn btn">
          </form>
      </div>
  </div>
</div>
