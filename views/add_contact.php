<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Ajouter un Contact</title>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <h1>Ajouter un Contact</h1>
        <a href="HomeController.php">Retour à la page d'accueil</a>

        <form action="AddContactController.php" method="post">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required><br>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required><br>

            <label for="email">Email :</label>
            <input type="text" id="email" name="email" required><br>

            <label for="tel">Téléphone :</label>
            <input type="text" id="tel" name="tel" required><br>

            <input type="submit" name="action" value="Ajouter">
        </form>
    </body>
</html>