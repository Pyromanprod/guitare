<?php

verif();

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
                    $nom = filter_var($_POST['nom'], FILTER_SANITIZE_STRING);
                    $nationalite = filter_var($_POST['nationalite'], FILTER_SANITIZE_STRING);
                    $date = $_POST['date_create']->date_format("Y-m-d");

                    include_once("../part/connexion.php");
                    $requete = "INSERT INTO `fabricant`(`nom_fabricant`, `nationalite`,   `date_creation`) VALUES ('[value-2]','[value-3]','[value-4]')";

                    echo "$date";
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
