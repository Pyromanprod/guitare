<?php include_once("part/connexion.php");
?>
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
    <title>Des Guitares</title>
    <link rel="icon" href="favicon.ico">
    <!--POLLYFILL-->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->
</head>
<?php include_once("part/navbar.php"); ?>

<body>
    <div class="container">

        <div class="row">

            <h1>Guitare shop</h1>
            <p class="text-dark bg-danger">
                <?php
                if (isset($_GET['error'])) {

                    switch ($_GET['error']) {
                        case '0':
                            echo "Le modéle de guitare existe déja !!!!!";
                            break;

                        default:
                            # code...
                            break;
                    }
                }

                ?>
            </p>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Année de production</th>
                        <th scope="col">prix</th>
                        <th scope="col">Nombre de corde</th>
                        <th scope="col">Nom de la catégorie</th>
                        <th scope="col">Nom du fabricant</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $guitare = "SELECT guitare.nom_model, guitare.annee_prod, guitare.prix, guitare.nb_corde, fabricant.nom_fabricant, categorie.nom_categorie, guitare.image
                            FROM `guitare`
                            JOIN categorie
                                ON guitare.categorie_id = categorie.id_categorie
                            JOIN fabricant
                                ON guitare.fabricant_id = fabricant.id 
                                WHERE 1 
                                ORDER BY guitare.prix DESC";
                    //ORDER BY tri les données par prix (guitare.prix) decroissant (DESC)
                    $guitare = $bdd->prepare($guitare);
                    $guitare->execute();
                    $guitare = $guitare->fetchAll();
                    // echo '<pre>';
                    // var_dump($categorie);
                    foreach ($guitare as $key => $value) {
                        $src_img = $value['image'];
                        if ($src_img == NULL) {
                            $src_img = "imageDeClefDeSol.png";
                        }
                    ?>
                        <tr>
                            <div class="row">
                                <td class="col-2 px-0 mx-0"><img src="image/<?php echo $src_img ?>" class="w-100"></td>
                            </div>
                            <td><?php echo $value['nom_model'] ?></td>
                            <td><?php echo $value['annee_prod'] ?></td>
                            <td><?php echo $value['prix'] ?></td>
                            <td><?php echo $value['nb_corde'] ?></td>
                            <td><?php echo $value['nom_categorie'] ?></td>
                            <td><?php echo $value['nom_fabricant'] ?></td>

                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!--JQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--Bootstrap-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
    <!--Mon JS-->
    <script src="js/app.js"></script>
</body>

</html>