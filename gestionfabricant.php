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
    <title>Gestion fabricant</title>
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

        <h1>GESTION FABRICANT</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Nationalité</th>
                    <th scope="col">Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $fabricant = "SELECT fabricant.nom, fabricant.nationalite, fabricant.date_creation 
                        AS 'date'
                            FROM `fabricant` 
                                WHERE 1";
                $fabricant = $bdd->prepare($fabricant);
                $fabricant->execute();
                $fabricant = $fabricant->fetchAll();
                // echo '<pre>';
                // var_dump($fabricant);
                foreach ($fabricant as $key => $value) {
                ?>
                    <tr>
                        <td><?php echo $value['nom'] ?></td>
                        <td><?php echo $value['nationalite'] ?></td>
                        <td><?php echo $value['date'] ?></td>
                        <td>
                            <a href="updatefabricant.php?nom=<?php echo $value['nom']; ?>" title="Modifier fabricant"><i class="far fa-edit me-3"></i></a>

                            <a href="traitement/deletefabricant.php" title="Supprimer fabricant"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>


                <?php
                }

                ?>
            </tbody>
        </table>


    </div>

    <!--JQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--Bootstrap-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
    <script src="js/app.js"></script>
</body>

</html>