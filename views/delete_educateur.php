<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Supprimer un Éducateur</title>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <h1>Supprimer un Éducateur</h1>
        <a href="LesEducateursController.php">Retour à la liste des éducateurs</a>

        <?php if ($educateur): ?>
            <p>Voulez-vous vraiment supprimer l'éducateur "<?php echo $infoEducateur->getPrenom(); ?> <?php echo $infoEducateur->getNom(); ?>" ? (il sera toujours présent dans la liste des licenciés)</p>
            <form action="DeleteEducateurController.php?id=<?php echo $educateur->getId(); ?>" method="post">
                <input type="submit" value="Oui, Supprimer">
            </form>
        <?php else: ?>
            <p>L'éducateur n'a pas été trouvé.</p>
        <?php endif; ?>
    </body>
</html>