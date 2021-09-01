<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once("part/connexion.php");
$_SESSION['updateguitare'] = $_GET['modele'];


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
            <form action="traitement/updateguitare.php" method="post">

                <fieldset class="border p-2 form-group bg-light needs-validation">
                    <legend class="w-auto float-none fs-5 mx-auto">Modifier <?php echo $_GET['modele']; ?>

                    </legend>
                    <label for="nom_model">Nom du modèle</label>
                    <input type="text" name="nom_model">

                    <label for="annee_prod">Année</label>
                    <input type="text" name="annee_prod">

                    <label for="prix">prix</label>
                    <input type="text" name="prix">

                    <label for="nb_corde">Nombre de cordes</label>
                    <input type="text" name="nb_corde">

                    <label for="image">Modèle de guitare</label>
                    <input type="file" name="image">

                    <input type="submit">

                    <div class="row">



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