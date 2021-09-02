<?php include_once("part/connexion.php"); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Renaud Kieffer">
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
    <!--FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <!--NORMALIZE-->
    <link rel="stylesheet" href="css/normalize.css">
    <!--MON CSS-->
    <link rel="stylesheet" href="css/style.css">
    <title>Ajout guitare</title>
    <link rel="icon" href="favicon.ico">
    <!--POLLYFILL-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->
</head>
<?php include_once("part/navbar.php"); ?>

<body>

    <form action="traitement/addguitare.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nom_model" class="form-label">Nom du model</label>
            <input type="text" class="form-control" id="nom_model" name="nom_model">

        </div>
        <div class="mb-3">
            <label for="annee_prod" class="form-label">Année de production</label>
            <input type="number" min="1700" max="2021" class="form-control" id="annee_prod" name="annee_prod">

        </div>
        <div class="mb-3">
            <label for="prix" class="form-label">Prix</label>
            <input type="number" step="0.01" class="form-control" id="prix" name="prix">

        </div>
        <div class="mb-3">
            <label for="nb_corde" class="form-label">Nombre de cordes</label>
            <input type="number" class="form-control" id="nb_corde" name="nb_corde">
        </div>

        <div class="mb-3">
            <label for="id_categorie" class="form-label">Catégorie</label>

            <select name="id_categorie" size="1">
                <option value="">Sélectionner...</option>


                <?php

                $requete = "SELECT * FROM `categorie` WHERE 1";
                $requete = $bdd->prepare($requete);
                $requete->execute();
                $requete = $requete->fetchAll();
                foreach ($requete as $key => $value) {

                    echo "<option value=" . $value['id_categorie'] . ">" . $value['nom_categorie'] . '</option>';
                }
                ?>

            </select>
        </div>

        <div class="mb-3">
            <label for="nom_fabricant" class="form-label">Fabricant</label>

            <SELECT name="id_fabricant" size="1">
                <OPTION value="">Sélectionner...
                    <?php

                    $requete = "SELECT * FROM `fabricant` WHERE 1";
                    $requete = $bdd->prepare($requete);
                    $requete->execute();
                    $requete = $requete->fetchAll();
                    foreach ($requete as $key => $value) {

                        echo "<OPTION value=" . $value['id'] . ">" . $value['nom_fabricant'];
                    }
                    ?>

            </SELECT>

            <input type="file" name="image">
        </div>




        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>

    <!--JQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--Bootstrap-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
    <script src="js/app.js"></script>
</body>

</html>