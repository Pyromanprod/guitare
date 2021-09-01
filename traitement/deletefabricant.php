<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//connexion base de donnée
include_once("../part/connexion.php");

if (isset($_GET['nom'])) {
    try {
        $requete = "DELETE FROM guitare
                WHERE guitare.fabricant_id = (SELECT fabricant.id FROM fabricant WHERE fabricant.nom_fabricant=:nom)";
        $requete = $bdd->prepare($requete);
        $requete->bindValue(':nom', $_GET['nom']);
        $requete->execute();

        try {
            $requete = "DELETE FROM `fabricant` WHERE fabricant.nom_fabricant = :nom";
            $requete = $bdd->prepare($requete);
            $requete->bindValue(':nom', $_GET['nom']);
            $requete->execute();
        } catch (\Throwable $th) {
            echo $th;
        }
    } catch (\Throwable $th) {
        echo $th;
    }



    echo $_GET['nom'];
} else {
}
