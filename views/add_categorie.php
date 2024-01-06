<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Ajouter une Catégorie</title>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <h1>Ajouter une Catégorie</h1>
        <a href="LesCategoriesController.php">Retour à la liste des catégories</a>

        <form action="AddCategorieController.php" method="post">
            <label for="code">Code :</label>
            <input type="text" id="code" name="code" required><br>

            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required><br>

            <input type="submit" name="action" value="Ajouter">
        </form>
    </body>
</html>