<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//connexion base de donnée
include_once("../part/connexion.php");

if (isset($_GET['nom_categorie'])) {
    try {
        $requete = "DELETE FROM guitare
                WHERE guitare.categorie_id = (SELECT categorie.id_categorie FROM categorie WHERE categorie.nom_categorie=:nom_categorie)";
        $requete = $bdd->prepare($requete);
        $requete->bindValue(':nom_categorie', $_GET['nom_categorie']);
        $requete->execute();

        try {
            $requete = "DELETE FROM `categorie` WHERE categorie.nom_categorie = :nom_categorie";
            $requete = $bdd->prepare($requete);
            $requete->bindValue(':nom_categorie', $_GET['nom_categorie']);
            $requete->execute();
            header('location:../gestioncategorie.php');
        } catch (\Throwable $th) {
            echo $th;
        }
    } catch (\Throwable $th) {
        echo $th;
    }



    echo $_GET['nom_categorie'];
} else {
}
