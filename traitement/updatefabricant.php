<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once("../part/connexion.php");

if (isset($_POST['nom']) && !empty($_POST['nom'])) {

    try {
        $nouveaunom = filter_var($_POST['nom'], FILTER_SANITIZE_STRING);
        $anciennom = $_SESSION['updatefab'];
        $requete = "UPDATE `fabricant` SET `nom_fabricant`=:nouveaunom WHERE fabricant.nom_fabricant = '$anciennom'";

        $requete = $bdd->prepare($requete);
        $requete->bindValue(':nouveaunom', $nouveaunom);
        $requete->execute();
        $_SESSION['updatefab'] = $nouveaunom;
        header('location:../gestionfabricant.php');
    } catch (\Throwable $th) {
        echo $th;
    }
}

if (isset($_POST['nationalite']) && !empty($_POST['nationalite'])) {

    try {
        $nouvellenationalite = filter_var($_POST['nationalite'], FILTER_SANITIZE_STRING);
        $anciennom = $_SESSION['updatefab'];
        $requete = "UPDATE `fabricant` SET `nationalite`=:nationalite WHERE fabricant.nom_fabricant = '$anciennom'";

        $requete = $bdd->prepare($requete);
        $requete->bindValue(':nationalite', $nouvellenationalite);
        $requete->execute();
        header('location:../gestionfabricant.php');
    } catch (\Throwable $th) {
        echo $th;
    }
}

if (isset($_POST['date_creation']) && !empty($_POST['date_creation'])) {

    try {
        $nouvelledate = filter_var($_POST['date_creation'], FILTER_SANITIZE_STRING);
        $anciennom = $_SESSION['updatefab'];
        $requete = "UPDATE `fabricant` SET `date_creation`=:nouvelledate WHERE fabricant.nom_fabricant = '$anciennom'";

        $requete = $bdd->prepare($requete);
        $requete->bindValue(':nouvelledate', $nouvelledate);
        $requete->execute();
        header('location:../gestionfabricant.php');
    } catch (\Throwable $th) {
        echo $th;
    }
}
