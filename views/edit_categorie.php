<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Modifier une Catégorie</title>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <h1>Modifier une Catégorie</h1>
        <a href="LesCategoriesController.php">Retour à la liste des catégories</a>

        <?php if ($categorie): ?>
            <form action="EditCategorieController.php?id=<?php echo $categorie->getId(); ?>" method="post">
                <label for="code">Code :</label>
                <input type="text" id="code" name="code" value="<?php echo $categorie->getCode_categorie(); ?>" required><br>

                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" value="<?php echo $categorie->getNom(); ?>" required><br>

                <input type="submit" value="Modifier">
            </form>
        <?php else: ?>
            <p>La catégorie n'a pas été trouvée.</p>
        <?php endif; ?>

    </body>
</html>

