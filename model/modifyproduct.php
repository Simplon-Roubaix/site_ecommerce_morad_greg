<?php

function modifyproduct($arr_post, $id_v)
{
    $bdd = connectdb();

    $req_up = $bdd->prepare('UPDATE vehicules SET marque = :marque, model = :model,
                        descriptif = :descriptif, annee = :annee, prix_de_vente = :prix_v
                        WHERE id_v = :id_v');
    $req_up->execute(array(
                'id_v' => $id_v,
                'marque' => $arr_post[0],
                'model' => $arr_post[1],
                'descriptif' => $arr_post[2],
                'annee' => $arr_post[3],
                'prix_v' => intval($arr_post[4])));

    return $id_v;
}
