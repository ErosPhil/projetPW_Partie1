<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Détails du Contact</title>
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body>
        <h1>Détails du Contact</h1>
        <a href="LesLicenciesController.php">Retour à la liste des licenciés</a>

        <?php if ($contact): ?>
            <p><strong>Nom :</strong> <?php echo $contact->getNom(); ?></p>
            <p><strong>Prénom :</strong> <?php echo $contact->getPrenom(); ?></p>
            <p><strong>Email :</strong> <?php echo $contact->getEmail(); ?></p>
            <p><strong>Téléphone :</strong> <?php echo $contact->getTel(); ?></p>
            <a class="btn btn-primary" href="EditContactController.php?id=<?php echo $contact->getId(); ?>">Modifier</a>
        <?php else: ?>
            <p>Le contact n'a pas été trouvé.</p>
        <?php endif; ?>
    </body>
</html>
