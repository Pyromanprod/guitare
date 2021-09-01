<?php
include_once("../part/function.php");
//on ce co a la bdd
include_once("../part/connexion.php");




if (verif()) {
    //si tout est ok on récupère les donnée envoyé
    $nom = filter_var($_POST['nom'], FILTER_SANITIZE_STRING);
    $nationalite = filter_var($_POST['nationalite'], FILTER_SANITIZE_STRING);


    $date = strtotime($_POST['date_create']);
    $date_create = strftime("%Y-%m-%d", $date);
    try {
        $requete = "INSERT INTO `fabricant`(`nom_fabricant`, `nationalite`, `date_creation`)
                        VALUES (:nom,:nationalite,:date_create)";
        $requete = $bdd->prepare($requete);

        $requete->bindValue(':nom', $nom);
        $requete->bindValue(':nationalite', $nationalite);
        $requete->bindValue(':date_create', $date_create);
        $requete->execute();
        header('location:../gestionfabricant.php');
    } catch (\Throwable $th) {
        echo $th->getMessage();
    }
}

function verif()
{

    // si on a bien cliqué le bouton
    if (isset($_POST['envoyer'])) {
        //si on a bien rempli le nom
        if (isset($_POST['nom']) && !empty($_POST['nom'])) {
            //si on a bien rempli le date
            if (isset($_POST['date_create']) && !empty($_POST['date_create'])) {
                // si on a bien rempli la nationalite
                if (isset($_POST['nationalite']) && !empty($_POST['nationalite'])) {

                    // on vérifie que la date soit bien une date valide
                    if (isValidDate($_POST['date_create'])) {

                        return true;
                    } else {
                        header('location:../gestionfabricant.php?erreur=4');
                    }






                    include_once("../part/connexion.php");
                    $requete = "INSERT INTO `fabricant`(`nom_fabricant`, `nationalite`,   `date_creation`) VALUES ('[value-2]','[value-3]','[value-4]')";
                } else {
                    header('location:../gestionfabricant.php?erreur=3');

                    return false;
                }
            } else {
                header('location:../gestionfabricant.php?erreur=2');


                return false;
            }
        } else {
            header('location:../gestionfabricant.php?erreur=1');

            return false;
        }
    } else {
        header('location:../gestionfabricant.php?erreur=0');

        return false;
    }
}
