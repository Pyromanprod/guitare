<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once("part/connexion.php");



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
    <title>Modifier fabricant</title>
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

        <div class="row mt-5">
            <form action="traitement/updatefabricant.php" method="post">

                <fieldset class="border p-2 form-group bg-light needs-validation">
                    <legend class="w-auto float-none fs-5 mx-auto">Modifier
                        <?php echo $_GET['nom']; ?>
                    </legend>

                    <div class="row">

                        <?php
                        try {
                            $nom = $_GET['nom'];
                            $_SESSION['updatefab'] = $nom;
                            $fabricant = "SELECT fabricant.nationalite, fabricant.date_creation 
                            AS 'date'
                                FROM `fabricant` 
                                    WHERE fabricant.nom_fabricant = :nom";
                            $fabricant = $bdd->prepare($fabricant);
                            $fabricant->bindValue(':nom', "$nom");
                            $fabricant->execute();
                            if ($fabricant = $fabricant->fetch()) {
                                $nationalite = $fabricant['nationalite'];
                                $date = $fabricant['date'];

                        ?>
                                <div class="mb-3 col-4">
                                    <label for="nom" class="form-label">Nom :</label>
                                    <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $nom ?>">
                                </div>
                                <div class="mb-3 col-4">
                                    <label for="nationalite" class="form-label">Nationalité :</label>
                                    <input type="text" class="form-control" id="nationalite" name="nationalite" value="<?php echo $nationalite ?>">
                                </div>
                                <div class="mb-3 col-4">
                                    <label for="date_creation" class="form-label">Date de création :</label>
                                    <input type="date" class="form-control" id="date_creation" name="date_creation" value="<?php echo $date ?>">
                                </div>

                                <button type="submit" class="btn btn-primary col-4 mx-auto">Envoyer</button>



                        <?php
                            }
                        } catch (\Throwable $th) {
                            echo "Le FAbricant n'existe pas " . $th;
                        }
                        ?>

                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    <!--JQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--Bootstrap-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
    <script src="js/app.js"></script>
</body>

</html>