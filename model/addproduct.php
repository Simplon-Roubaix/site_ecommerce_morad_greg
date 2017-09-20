<?php

function addproduct($formarray, $sentfile)
{
    global $bdd;
    global $err_count;

    // checks if NOT NULL elements are set
    if (isset($formarray['marque_v']) and isset($formarray['modele_v']) and isset($formarray['descriptif_v'])) {
        $arr_post[] = $formarray['marque_v'];
        $arr_post[] = $formarray['modele_v'];
        $arr_post[] = $formarray['descriptif_v'];
        $arr_post[] = $formarray['date_v'];
        $arr_post[] = $formarray['prix_v'];
        $arr_post[] = $arr_post[0].' '.$arr_post[1];
        // 'cleaning' of posted elements
        foreach ($arr_post as $key => $value) {
            $value = trim($value);
            $value = strip_tags($value);
            $value = htmlspecialchars($value);
            $arr_post[$key] = $value;
        }
    } else {
        $err_count++;
    }

    // adding image to img folder if doesn't exist
    if (isset($sentfile['imgfile']) and $sentfile['imgfile']['error'] == 0) {
        if ($sentfile['imgfile']['size'] <= 12800000) {
            $infosfichier = pathinfo($sentfile['imgfile']['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
            if (in_array($extension_upload, $extensions_autorisees)) {
                $imgsource = '../img/'.basename($sentfile['imgfile']['name']);
                move_uploaded_file($sentfile['imgfile']['tmp_name'], $imgsource);
            }
        } else {
            $err_count++;
        }
    } else {
        $err_count++;
    }
    // if no errors where encountered add entries in vehicules and images tables
    if ($err_count == 0) {
        //goes in model
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
        //goes in model
        $req_img = $bdd->prepare('INSERT INTO images(id_v, source, alt) VALUES(:idv, :source, :alt)');
        $req_img->execute(array('idv' => $max_idv[0],
                        'source' => $imgsource,
                        'alt' => $arr_post[5]));
    }
}
