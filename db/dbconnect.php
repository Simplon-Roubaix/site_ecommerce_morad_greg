<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=ecommerce_binome;charset=utf8', 'testuser', 'iLA9UwtpNWXnIv2F', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

?>
