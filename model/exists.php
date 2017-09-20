<?php function exists($idv)
{
    //this function checks if the selected product exists in the database, else return false
    global $bdd;
    if (isset($idv)) {
        $idv = trim($idv);
        $idv = strip_tags($idv);
        $idv = htmlspecialchars($idv);

        $req_ex = $bdd->query('SELECT * FROM vehicules WHERE id_v = \'' . $idv . '\'');
        $res_exists = $req_ex->fetchAll();
        if (count($res_exists)) {
            return $idv;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
?>
