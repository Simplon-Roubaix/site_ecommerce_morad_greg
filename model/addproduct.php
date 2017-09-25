<?php

function addproduct($arr_post)
{
    $bdd = connectdb();
    global $erreurs;
    $err_count == 0;
    // adding image to img folder if doesn't exist
    if (isset($_FILES['imgfile']) && $_FILES['imgfile']['error'] == 0) {
        if ($_FILES['imgfile']['size'] <= 12800000) {
            $infosfichier = pathinfo($_FILES['imgfile']['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
            if (in_array($extension_upload, $extensions_autorisees)) {
                $imgsource = '../img/'.basename($_FILES['imgfile']['name']);
                move_uploaded_file($_FILES['imgfile']['tmp_name'], $imgsource);
            }
        } else {
            $err_count++;
            $erreurs = "Image trop grande (max: 1 280 000 o)";
        }
    } else {
        $err_count++;
        $erreurs = "Erreur d'image";
    }

    if ($err_count == 0) {
        try {
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $bdd->beginTransaction();


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

            $bdd->commit();
        } catch (Exception $e) {
            $bdd->rollBack();
            unlink($imgsource);
            $erreurs = $e->getMessage();
        }
    }
    return $erreurs;
}
