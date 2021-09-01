<?php

// connecteur PDO à la BDD
include_once ('../part/connexion.php');

// on vérifie que les champs obligatoires existent
if (isset($_POST['nom_categorie']) && !empty($_POST['nom_categorie']) ){
    // traitement du nom de la catégorie en nettoyant et en enlevant les espaces dans la chaîne
    $nom_categorie = filter_var($_POST['nom_categorie'], FILTER_SANITIZE_STRING);
    // contrôle de la longueur de la chaîne nom_categorie
    if(strlen($nom_categorie) <= 36) {
        // on prepare la requête SQL
        $new_categorie = $bdd->prepare('INSERT IGNORE INTO categorie(nom_categorie) VALUES (:nom_categorie)');
        // on prépare les valeurs qui remplacent les marqueurs
        $new_categorie->bindValue(':nom_categorie', $nom_categorie, PDO::PARAM_STR);
        // on exécute la requête et on inscrit la catégorie en BDD
        $new_categorie->execute();
        // vérifier que la catégorie n'existe pas encore (unicité de la catégorie), on compte le nombre de lignes affectées par la requête. S'il est égal à 0, elle ne s'est pas exécutée correctement à cause de la contrainte 'Unique' sur le champ nom_categorie
        if( $new_categorie->rowCount() ) {
            //ici tout s'est bien passé
            header('location:../gestioncategorie.php?message=4');
        } else {
            header('location:../gestioncategorie.php?message=3');
        }
    } else {
        header('location:../gestioncategorie.php?message=2');
    }
}
else {
    header('location:../gestioncategorie.php?message=1');
}


