<?php

function req_inner_vehicules_img($id = NULL)
{
    global $bdd;
    if ($id !== NULL) {
      $id = ' WHERE vehicules.id_v = \'' . $id . '\'';
    }
    // selects content of vehicules and images tables depending on sent id
    $display_result = $bdd->query('SELECT * FROM vehicules INNER JOIN images ON vehicules.id_v = images.id_v'.$id);
    //$voiture = $display_details->fetch();
    return $display_result;
}
?>
