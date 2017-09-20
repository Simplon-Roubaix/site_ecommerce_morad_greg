<?php

function get_general() {
  global $bdd;
  $req_general = $bdd->query('SELECT * FROM infos_site');
  $general = $req_general->fetch();
  return $general;
}

function get_general_img($general) {
  global $bdd;
  $reqimg = $bdd->query('SELECT source FROM images WHERE id_i = \''. $general['favicon'] .'\' OR id_i = \''. $general['logo'] .'\'');
  $img_gen = $reqimg->fetchAll();
  return $img_gen;
}

?>
