<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Supprimer une Catégorie</title>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <h1>Supprimer une Catégorie</h1>
        <a href="LesCategoriesController.php">Retour à la liste des catégories</a>

        <?php if ($categorie): ?>
            <p>Voulez-vous vraiment supprimer la catégorie "<?php echo $categorie->getCode_categorie(); ?> <?php echo $categorie->getNom(); ?>" ?</p>
            <form action="DeleteCategorieController.php?id=<?php echo $categorie->getId(); ?>" method="post">
                <input type="submit" value="Oui, Supprimer">
            </form>
        <?php else: ?>
            <p>La catégorie n'a pas été trouvée.</p>
        <?php endif; ?>
    </body>
</html>