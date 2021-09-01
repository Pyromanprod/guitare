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
                    $requete = "UPDATE `guitare` SET `nom_model`=:nom_model,`annee_prod`=:annee,`prix`=:prix,`nb_corde`=:nb_corde, `image`=:img WHERE guitare.nom_model = :anciennom";
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

                    //envoyer l'image au serveur dans le dossier "image"addcategorie.php
                    // récupérer les infos de l'image
                    $image = $_FILES['image'];
                    // contrôle de l'image "Renaud le plus beau"
                    if ((($image['type'] === "image/jpeg") || ($image['type'] === "image/png") || ($image['type'] === "image/gif")) && ($image['size'] < 5242880)) {
                        $nouveau_nom = time() . '.' . pathinfo($image['name'])['extension'];
                        $requete->bindValue(':img', $nouveau_nom);

                        // enregistrement de l'image dans le dossier de sauvegarde
                        if (move_uploaded_file($image['tmp_name'], '../image/' . $nouveau_nom)) {

                            $requete->execute();

                            header('location:../gestionguitare.php');
                        } else {
                            echo ('Echec de l\'upload');
                        }
                    } else {
                        echo "erreur";
                    }
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
// if (isset($_GET['recherche']) && !empty($_GET['recherche'])) {

//     // le champ pseudo est renseigné
//     if (isset($_GET['nom_model']) && !empty($_GET['nom_model'])) {

//         $pseudo = $_GET['nom_model'];
//         //  Le pseudo est inconnu
//         if (file_exists('profil/' . $pseudo . '.txt')) {

//             // Lire dans le bon fichier (correspondant au pseudo) le nom de l'image
//             $nom_image = file_get_contents('profil/' . $pseudo . '.txt');

//             // Affichage les infos (pseudo, image) avec l'image
//             echo ('<p>Votre pseudo : ' . $pseudo . '</p>');
//             echo ('<p>Votre fichier : ' . $nom_image . '</p>');
//             echo ('<img width="400px" src="upload/' . $nom_image . '">');
//         } else {
//             echo ('Ce pseudo n\'existe pas');
//         }
//     } else {
//         echo ('Le Pseudo est obligatoire');
//     }
// }

// Bouton de retour
// echo '<p><a href="index.php">RETOUR</a></p>';
