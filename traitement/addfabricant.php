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


                    echo "salut";
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
