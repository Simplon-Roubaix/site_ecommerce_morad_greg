<?php
require_once '../model/data.php';

$req_general = req_select('infos_site');
$general = $req_general->fetch();
$img_gen = get_general_img($general);

include '../vue/template/header.php';
?>
<div class="container">
  <div class="row">
    <?php
    // displays details or all cards depending on what is sent or not
    if (isset($_POST['id'])) {
        include('../vue/details.php');
    } else {
        $display_cards = req_inner_vehicules_img();
        $voitures = $display_cards->fetchAll();
        foreach ($voitures as $voiture) {
            include('../vue/carte.php');
        }
    }
    ?>
  </div>
</div>
<?php
  include '../vue/template/footer.php';
  ?>
