<?php
//require_once 'db/dbconnect.php';
function addproduct($arr_post, $imgsource)
{
    $bdd = connectdb();

    $req_v = $bdd->prepare('INSERT INTO vehicules(marque, model, descriptif, annee, prix_de_vente)
                        VALUES(:marque, :model, :descriptif, :annee, :prixv)');
    $req_v->execute(array('marque' => $arr_post[0],
                      'model' => $arr_post[1],
                      'descriptif' => $arr_post[2],
                      'annee' => $arr_post[3],
                      'prixv' => intval($arr_post[4])));
    // gets the last id in vehicules table
    $req_idv = $bdd->query('SELECT MAX(id_v) FROM vehicules');
    $max_idv = $req_idv->fetch();

    $req_img = $bdd->prepare('INSERT INTO images(id_v, source, alt) VALUES(:idv, :source, :alt)');
    $req_img->execute(array('idv' => $max_idv[0],
                        'source' => $imgsource,
                        'alt' => $arr_post[5]));
}
