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
    <title>Gestion catégories</title>
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

        <h1>GESTION CATEGORIE</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $categorie = "SELECT categorie.nom_categorie
                            FROM `categorie`
                                WHERE 1";
                $categorie = $bdd->prepare($categorie);
                $categorie->execute();
                $categorie = $categorie->fetchAll();
                // echo '<pre>';
                // var_dump($categorie);
                foreach ($categorie as $key => $value) {
                ?>
                    <tr>
                        <td><?php echo $value['nom_categorie'] ?></td>

                        <td>
                            <a href="updatecategorie.php?nom_categorie=<?php echo $value['nom_categorie']; ?>" title="Modifier catégorie"><i class="far fa-edit me-3"></i></a>

                            <a href="traitement/deletecategorie.php?nom_categorie=<?php echo $value['nom_categorie']; ?>" title="Supprimer catégorie"><i class="fas fa-trash-alt"></i></a>
                        </td>

                    </tr>


                <?php
                }

                ?>
            </tbody>
        </table>

        <!!-- Formulaire gestion des catégories -->

            <form action="traitement/addcategorie.php" method="POST">
                <fieldset class="border p-2 form-group bg-light needs-validation">
                    <legend class="w-auto float-none fs-5 mx-auto">Ajouter une catégorie</legend>
                    <div class="row">

                        <div class="mb-3 col-5 mx-auto">
                            <label for="nom_categorie" class="form-label">Ajouter catégorie :</label>
                            <input type="text" class="form-control" id="nom_categorie" name="nom_categorie">
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-5 mx-auto text-center">
                            <button type="submit" class="btn btn-secondary" class="col-4">Envoyer</button>

                        </div>

                    </div>
                    <div class="row">
                        <p>
                            <?php
                            if (isset($_GET['message'])) {
                                switch ($_GET['message']) {
                                    case '1':
                                        echo ('Remplir le champ !');
                                        break;
                                    case '2':
                                        echo ('36 caractères maximum !');
                                        break;
                                    case '3':
                                        echo ('La catégorie existe déjà !');
                                        break;
                                    case '4':
                                        echo ('Nouvelle catégorie créée');
                                        break;
                                    default:
                                        break;
                                }
                            }
                            ?>
                        </p>
                    </div>
                </fieldset>
            </form>

    </div>






    <!--JQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--Bootstrap-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
    <script src="js/app.js"></script>
</body>

</html>