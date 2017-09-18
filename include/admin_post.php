<?php
  $err_count = 0;

  if (isset($_POST['operation']) and $_POST['operation'] == 1) {
      if (isset($_POST['marque_v']) and isset($_POST['modele_v']) and isset($_POST['descriptif_v']) and isset($_POST['altimg'])) {
          $arr_post[] = $_POST['marque_v'];
          $arr_post[] = $_POST['modele_v'];
          $arr_post[] = $_POST['descriptif_v'];
          $arr_post[] = $_POST['date_v'];
          $arr_post[] = $_POST['prix_v'];
          $arr_post[] = $_POST['altimg'];

          foreach ($arr_post as $key => $value) {
              $value = trim($value);
              $value = strip_tags($value);
              $value = htmlspecialchars($value);
              $arr_post[$key] = $value;
          }
      } else {
          $err_count++;
      }

      if (isset($_FILES['imgfile']) and $_FILES['imgfile']['error'] == 0) {
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
                          'prixv' => $arr_post[4]));

          $req_idv = $bdd->query('SELECT MAX(id_v) FROM vehicules');
          $max_idv = $req_idv->fetch();

          $req_img = $bdd->prepare('INSERT INTO images(id_v, source, alt) VALUES(:idv, :source, :alt)');
          $req_img->execute(array('idv' => $max_idv[0],
                            'source' => $imgsource,
                            'alt' => $arr_post[5]));
      }
      header('Location: admin.php');
  }
