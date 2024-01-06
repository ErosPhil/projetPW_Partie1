<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Supprimer un Licencié</title>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <h1>Supprimer un Licencié</h1>
        <a href="LesLicenciesController.php">Retour à la liste des licenciés</a>

        <?php if ($licencie): ?>
            <p>Voulez-vous vraiment supprimer le licencié "<?php echo $licencie->getPrenom(); ?> <?php echo $licencie->getNom(); ?>" ?</p>
            <form action="DeleteLicencieController.php?id=<?php echo $licencie->getId(); ?>" method="post">
                <input type="submit" value="Oui, Supprimer">
            </form>
        <?php else: ?>
            <p>Le licencié n'a pas été trouvé.</p>
        <?php endif; ?>
    </body>
</html>