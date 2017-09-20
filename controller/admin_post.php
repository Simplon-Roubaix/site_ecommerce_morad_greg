<?php
require '../model/db/dbconnect.php';
include '../model/exists.php';
include '../model/addproduct.php';
include '../model/deleteproduct.php';
include '../model/modifyproduct.php';

  $err_count = 0;

// checks if operation is adding a new product
  if (isset($_POST['operation']) and $_POST['operation'] == 1) {
    addproduct($_POST, $_FILES);
    header('Location: admin.php');
  }

// checks if operation is modification of a product
  elseif (isset($_POST['operation']) and $_POST['operation'] == 2) {
    $id_v = modifyproduct($_POST);
    header('Location: modif_vehicule.php?id='.$id_v);
  }
  // checks if operation is deletion of product
  elseif (isset($_POST['operation']) and $_POST['operation'] == 3) {
      deleteproduct($_POST['idv']);
      header('Location: admin.php');
  }
