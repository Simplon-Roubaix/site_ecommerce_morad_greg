<?php
require_once '../model/data.php';

  $err_count = 0;
  
// checks if operation is adding a new product
  if (isset($_POST['operation']) and $_POST['operation'] == 1) {
      if (isset($_POST['marque_v']) and isset($_POST['modele_v']) and isset($_POST['descriptif_v'])) {
          $arr_post[] = $_POST['marque_v'];
          $arr_post[] = $_POST['modele_v'];
          $arr_post[] = $_POST['descriptif_v'];
          $arr_post[] = $_POST['date_v'];
          $arr_post[] = $_POST['prix_v'];
          $arr_post[] = $arr_post[0].' '.$arr_post[1];

          $arr_post = sanitize($arr_post);
      } else {
          $err_count++;
      }

            // if no errors where encountered add entries in vehicules and images tables
      if ($err_count == 0) {
          addproduct($arr_post, $imgsource);
      }

      header('Location: admin.php');
  }

// checks if operation is modification of a product
  elseif (isset($_POST['operation']) and $_POST['operation'] == 2) {
      if (isset($_POST['marque_v']) and isset($_POST['modele_v']) and isset($_POST['descriptif_v'])) {
          $arr_post[] = $_POST['marque_v'];
          $arr_post[] = $_POST['modele_v'];
          $arr_post[] = $_POST['descriptif_v'];
          $arr_post[] = $_POST['date_v'];
          $arr_post[] = $_POST['prix_v'];
          // cleaning of posted entries
          $arr_post = sanitize($arr_post);
      } else {
          $err_count++;
      }

      // if no errors, modifies the product
      if ($err_count == 0 and exists($_POST['idv'])) {
          $id_v = exists($_POST['idv']);
          $id_v = modifyproduct($arr_post, $id_v);
      }
      header('Location: modif_vehicule.php?id='.$id_v);
  }
  // checks if operation is deletion of product
  elseif (isset($_POST['operation']) and $_POST['operation'] == 3) {
      if (exists($_POST['idv'])) {
          $id_v = exists($_POST['idv']);

          deleteproduct($_POST['idv']);
      }
      header('Location: admin.php');
  }
