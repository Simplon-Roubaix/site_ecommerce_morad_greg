<?php

function deleteproduct($id_v) {

    global $bdd;

if (exists($id_v)) {
    $id_v = exists($id_v);
    $req_del = $bdd->prepare('DELETE FROM vehicules WHERE id_v = :id_v');
    $req_del->execute(array('id_v' => $id_v));

    $reqimg = $bdd->query('SELECT * FROM images WHERE id_v = \'' . $id_v . '\'');
    $img = $reqimg->fetch();
    // also removes the file from img folder
    unlink($img['source']);

    $req_del = $bdd->prepare('DELETE FROM images WHERE id_v = :id_v');
    $req_del->execute(array('id_v' => $id_v));
}
}


?>
