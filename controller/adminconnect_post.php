<?php
require_once '../model/data.php';


if (isset($_POST['admin_name']) && isset($_POST['admin_pwd'])) {
  $arr_post[] = $_POST['admin_name'];
  $arr_post[] = $_POST['admin_pwd'];

  foreach ($arr_post as $key => $value) {
      $value = trim($value);
      $value = strip_tags($value);
      $value = htmlspecialchars($value);
      $arr_post[$key] = $value;
  }
  $req = adminconnect($arr_post[0]);
  $res = $req->fetch();
  if ($res) {
    if ($res['droits'] == 1 && password_verify($arr_post[1], $res['password'])){
      $_SESSION['user'] = 'admin';
      $_SESSION['droits'] = 1;
    }
  }
}

header('Location: admin.php');


?>
