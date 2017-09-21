<?php

function deleteproduct($id_v)
{
    $bdd = connectdb();

    $reqimg = req_select('images', $id_v);
    $img = $reqimg->fetch();
// var_dump($img);
    // also removes the file from img folder
    unlink($img['source']);

    $req_del = $bdd->prepare('DELETE FROM images WHERE id_v = :id_v');
    $req_del->execute(array('id_v' => $id_v));

    $req_del = $bdd->prepare('DELETE FROM vehicules WHERE id_v = :id_v');
    $req_del->execute(array('id_v' => $id_v));

}
