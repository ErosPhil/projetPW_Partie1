<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Ajouter un Éducateur</title>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <h1>Ajouter un Éducateur</h1>
        <a href="LesEducateursController.php">Retour à la liste des éducateurs</a>

        <form action="AddEducateurController.php" method="post">
            <label for="email">Email :</label>
            <input type="text" id="email" name="email" required><br>

            <label for="mdp">Mot de passe :</label>
            <input type="text" id="mdp" name="mdp" required><br>

            <label for="estAdmin">Est admin :</label>
            <select id="estAdmin" name="estAdmin">
                    <option selected value="0">Non</option>
                    <option value="1">Oui</option>
            </select><br>

            <label for="licence">Licence :</label>
            <select id="licence" name="licence">
                <?php
                    foreach($lesLicencies as $licencie){
                ?>
                    <option value="<?php echo $licencie->getId(); ?>"><?php echo $licencie->getNom().' '.$licencie->getPrenom();?></option>
                <?php
                    }
                ?>
            </select><br>

            <input type="submit" name="action" value="Ajouter">
        </form>
    </body>
</html>