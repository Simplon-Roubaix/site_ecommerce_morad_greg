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
      echo $err_count;
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
