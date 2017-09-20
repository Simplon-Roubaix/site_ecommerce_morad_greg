<?php

function modifyproduct($sentarr)
{
  global $bdd;
  global $err_count;

    if (isset($sentarr['marque_v']) and isset($sentarr['modele_v']) and isset($sentarr['descriptif_v'])) {
        $arr_post[] = $sentarr['marque_v'];
        $arr_post[] = $sentarr['modele_v'];
        $arr_post[] = $sentarr['descriptif_v'];
        $arr_post[] = $sentarr['date_v'];
        $arr_post[] = $sentarr['prix_v'];
        // cleaning of posted entries
        foreach ($arr_post as $key => $value) {
            $value = trim($value);
            $value = strip_tags($value);
            $value = htmlspecialchars($value);
            $arr_post[$key] = $value;
        }
    } else {
        $err_count++;
    }
    // if no errors, modifies the product
    if ($err_count == 0 and exists($sentarr['idv'])) {
        $id_v = exists($sentarr['idv']);


        $req_up = $bdd->prepare('UPDATE vehicules SET marque = :marque, model = :model,
                        descriptif = :descriptif, annee = :annee, prix_de_vente = :prix_v
                        WHERE id_v = :id_v');
        $req_up->execute(array(
                'id_v' => $id_v,
                'marque' => $arr_post[0],
                'model' => $arr_post[1],
                'descriptif' => $arr_post[2],
                'annee' => $arr_post[3],
                'prix_v' => $arr_post[4]));
    }
    return $id_v;
}
?>
