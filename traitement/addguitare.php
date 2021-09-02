<?php include_once("../part/connexion.php");

$nom_model = $_POST['nom_model'];
$annee_prod = $_POST['annee_prod'];
$prix = $_POST['prix'];
$nb_corde = $_POST['nb_corde'];
$id_categorie = $_POST['id_categorie'];
$id_fabricant = $_POST['id_fabricant'];

if (isset($nom_model) && !empty($nom_model)) {
    if (isset($annee_prod) && !empty($annee_prod)) {
        if (isset($prix) && !empty($prix)) {
            if (isset($nb_corde) && !empty($nb_corde)) {
                if (isset($id_categorie) && !empty($id_categorie)) {
                    if (isset($id_fabricant) && !empty($id_fabricant)) {

                        $image_guitare = NULL;

                        // on récupére l'image envoyé
                        $image = $_FILES['image'];
                        // on vérifié que ça soit bien une image png ou jpg ou gif
                        //et qu'elle fait moins de 5M
                        if ((($image['type'] === "image/jpeg") || ($image['type'] === "image/png") || ($image['type'] === "image/gif")) && ($image['size'] < 5242880)) {

                            //créer un nouveau UNIQUE nom pour l'image
                            $nouveau_nom = time() . '.' . pathinfo($image['name'])['extension'];

                            // si tout a fonctionné on essaie de telecharger l'image
                            if (move_uploaded_file($image['tmp_name'], '../image/' . $nouveau_nom)) {
                                //si l'image et bien telechargé
                                //la variable $image_guitare sera = au nom de la guitare
                                $image_guitare = $nouveau_nom;
                            } else {
                                die("image non telecharger");
                            }
                        } else {
                            die("image non conforme");
                        }
                        try {

                            $requete = $bdd->prepare("INSERT IGNORE INTO `guitare`(`nom_model`, `annee_prod`, `prix`, `nb_corde`, `image`, `fabricant_id`, `categorie_id`) VALUES (:nom_model,:annee_prod,:prix,:nb_corde,:img,:id_fabricant,:id_categorie)");
                            $requete->bindValue(':nom_model', $nom_model);
                            $requete->bindValue(':annee_prod', $annee_prod);
                            $requete->bindValue(':prix', $prix);
                            $requete->bindValue(':nb_corde', $nb_corde);
                            $requete->bindValue(':img', $image_guitare);
                            $requete->bindValue(':id_fabricant', $id_fabricant);
                            $requete->bindValue(':id_categorie', $id_categorie);
                            $requete->execute();

                            if (
                                $requete->rowCount()
                            ) {
                                //ici tout s'est bien passé
                                header('location:../index.php');
                            } else {
                                header('location:../index.php?error=0');
                            }
                        } catch (\Throwable $th) {
                            echo $th;
                        }
                    } else {
                        echo "fabricant vide";
                    }
                } else {
                    echo "categori vide";
                }
            } else {
                echo "nombre de corde vide";
            }
        } else {
            echo "prix vide";
        }
    } else {
        echo "annee vide";
    }
} else {
    echo "nom vide";
}
