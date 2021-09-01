<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once("../part/connexion.php");




//si on a bien rempli le nom
if (isset($_POST['nom_model']) && !empty($_POST['nom_model'])) {
    //si on a bien rempli le champ de l'année de prodution
    if (isset($_POST['annee_prod']) && !empty($_POST['annee_prod'])) {
        // si on a bien rempli le champ prix
        if (isset($_POST['prix']) && !empty($_POST['prix'])) {
            // si on a bien rempli le champ nombre de cordes
            if (isset($_POST['nb_corde']) && !empty($_POST['nb_corde'])) {

                try {
                    // on prépare la requete SQL
                    $requete = "UPDATE `guitare` SET `nom_model`=:nom_model,`annee_prod`=:annee,`prix`=:prix,`nb_corde`=:nb_corde WHERE guitare.nom_model = :anciennom";
                    // On prépare les valeurs qui remplacent les marqueurs
                    $nom = $_POST['nom_model'];
                    $annee = $_POST['annee_prod'];
                    $prix = $_POST['prix'];
                    $nb_corde = $_POST['nb_corde'];
                    $anciennom = $_SESSION['updateguitare'];

                    $requete = $bdd->prepare($requete);
                    $requete->bindValue(':nom_model', $nom);
                    $requete->bindValue(':annee', $annee);
                    $requete->bindValue(':prix', $prix);
                    $requete->bindValue(':nb_corde', $nb_corde);
                    $requete->bindValue(':anciennom', $anciennom);
                    // on exécute la requete

                    $requete->execute();

                    header('location:../gestionguitare.php');
                } catch (\Throwable $th) {
                    echo $th;
                }
            } else {

                header('location:../gestionguitare.php?erreur=3');

                return false;
            }
        } else {
            header('location:../gestionguitare.php?erreur=3');

            return false;
        }
    } else {
        header('location:../gestionguitare.php?erreur=2');


        return false;
    }
} else {
    header('location:../gestionguitare.php?erreur=1');

    return false;
}
