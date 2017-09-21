<?php

function req_select($table, $idv = NULL) {

  $bdd = connectdb();

  if($idv !== NULL) {
    $idv = ' WHERE id_v = '.$idv;
  }
  $req = $bdd->query('SELECT * FROM '.$table.$idv);
  return $req;
}

function get_general_img($general) {
  $bdd = connectdb();
  $reqimg = $bdd->query('SELECT source FROM images WHERE id_i = \''. $general['favicon'] .'\' OR id_i = \''. $general['logo'] .'\'');
  $img_gen = $reqimg->fetchAll();
  return $img_gen;
}

?>
