<?php

  if(isset($_FILES['imgfile']) AND $_FILES['imgfile']['error'] == 0) {
    if ($_FILES['imgfile']['size'] <= 12800000)
        {
                $infosfichier = pathinfo($_FILES['imgfile']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                  move_uploaded_file($_FILES['imgfile']['tmp_name'], '../img/'.basename($_FILES['imgfile']['name']));
                  echo "ok!";
                }
        }
  }




//header('Location: admin.php');
?>
