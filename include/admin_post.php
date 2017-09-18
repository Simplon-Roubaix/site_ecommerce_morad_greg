<?php
include '../db/dbconnect.php';
  $err_count = 0;

function exists($bdd) {

  if(isset($_POST['idv'])){
    $idv = trim($_POST['idv']);
    $idv = strip_tags($idv);
    $idv = htmlspecialchars($idv);
    $req_ex = $bdd->query('SELECT * FROM vehicules WHERE id_v = \'' . $idv . '\'');
    $res_exists = $req_ex->fetchAll();
    if(count($res_exists)) {
      return $idv;
    }
    else {
      return false;
    }
  }
  else {
    return false;
  }
}

  if (isset($_POST['operation']) AND $_POST['operation'] == 1) {
      if (isset($_POST['marque_v']) AND isset($_POST['modele_v']) AND isset($_POST['descriptif_v'])) {
          $arr_post[] = $_POST['marque_v'];
          $arr_post[] = $_POST['modele_v'];
          $arr_post[] = $_POST['descriptif_v'];
          $arr_post[] = $_POST['date_v'];
          $arr_post[] = $_POST['prix_v'];
          $arr_post[] = $arr_post[0].' '.$arr_post[1];

          foreach ($arr_post as $key => $value) {
              $value = trim($value);
              $value = strip_tags($value);
              $value = htmlspecialchars($value);
              $arr_post[$key] = $value;
          }
      } else {
          $err_count++;
      }

      if (isset($_FILES['imgfile']) AND $_FILES['imgfile']['error'] == 0) {
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
          }
      } else {
          $err_count++;
      }
      if ($err_count == 0) {
          $req_v = $bdd->prepare('INSERT INTO vehicules(marque, model, descriptif, annee, prix_de_vente)
                            VALUES(:marque, :model, :descriptif, :annee, :prixv)');
          $req_v->execute(array('marque' => $arr_post[0],
                          'model' => $arr_post[1],
                          'descriptif' => $arr_post[2],
                          'annee' => $arr_post[3],
                          'prixv' => intval($arr_post[4])));

          $req_idv = $bdd->query('SELECT MAX(id_v) FROM vehicules');
          $max_idv = $req_idv->fetch();

          $req_img = $bdd->prepare('INSERT INTO images(id_v, source, alt) VALUES(:idv, :source, :alt)');
          $req_img->execute(array('idv' => $max_idv[0],
                            'source' => $imgsource,
                            'alt' => $arr_post[5]));
      }
      header('Location: admin.php');
  }
  elseif (isset($_POST['operation']) AND $_POST['operation'] == 2) {
    if (isset($_POST['marque_v']) AND isset($_POST['modele_v']) AND isset($_POST['descriptif_v'])) {

        $arr_post[] = $_POST['marque_v'];
        $arr_post[] = $_POST['modele_v'];
        $arr_post[] = $_POST['descriptif_v'];
        $arr_post[] = $_POST['date_v'];
        $arr_post[] = $_POST['prix_v'];

        foreach ($arr_post as $key => $value) {
            $value = trim($value);
            $value = strip_tags($value);
            $value = htmlspecialchars($value);
            $arr_post[$key] = $value;
        }
    } else {
        $err_count++;
    }

    if($err_count == 0 AND exists($bdd)) {
      $id_v = exists($bdd);
      $req_up = $bdd->prepare('UPDATE vehicules SET marque = :marque, model = :model,
                              descriptif = :descriptif, annee = :annee, prix_de_vente = :prix_v
                              WHERE id_v = :id_v');
      $req_up->execute(array(
                      'id_v' => $id_v,
                      'marque' => $arr_post[0],
                      'model' => $arr_post[1],
                      'descriptif' => $arr_post[2],
                      'annee' => $arr_post[3],
                      'prix_v' => $arr_post[4]
      ));
    }
    header('Location: modif_vehicule.php?id='.$id_v);
  }
  elseif (isset($_POST['operation']) AND $_POST['operation'] == 3) {

    if(exists($bdd)) {
      $id_v = exists($bdd);
      $req_del = $bdd->prepare('DELETE FROM vehicules WHERE id_v = :id_v');
      $req_del->execute(array('id_v' => $id_v));

      $reqimg = $bdd->query('SELECT * FROM images WHERE id_v = \'' . $id_v . '\'');
      $img = $reqimg->fetch();
      unlink($img['source']);

      $req_del = $bdd->prepare('DELETE FROM images WHERE id_v = :id_v');
      $req_del->execute(array('id_v' => $id_v));
    }
    header('Location: admin.php');
  }
