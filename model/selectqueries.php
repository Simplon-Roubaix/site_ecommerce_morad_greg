<?php

function req_select($table) {
  global $bdd;
  $req = $bdd->prepare('SELECT * FROM :table');
  $req->execute(array('table' => $table));
  return $req;
}

function get_general_img($general) {
  global $bdd;
  $reqimg = $bdd->query('SELECT source FROM images WHERE id_i = \''. $general['favicon'] .'\' OR id_i = \''. $general['logo'] .'\'');
  $img_gen = $reqimg->fetchAll();
  return $img_gen;
}

?>
