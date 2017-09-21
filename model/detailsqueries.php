<?php

function req_inner_vehicules_img($id = NULL)
{
    $bdd = connectdb();

    if ($id !== NULL) {
      $id = ' WHERE vehicules.id_v = \'' . $id . '\'';
    }
    // selects content of vehicules and images tables depending on sent id
    $display_result = $bdd->query('SELECT * FROM vehicules INNER JOIN images ON vehicules.id_v = images.id_v'.$id);

    return $display_result;
}
?>
