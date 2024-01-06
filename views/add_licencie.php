<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Ajouter un Licencié</title>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <h1>Ajouter un Licencié</h1>
        <a href="LesLicenciesController.php">Retour à la liste des licenciés</a>

        <form action="AddLicencieController.php" method="post">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required><br>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required><br>

            <label for="categorie">Catégorie :</label>
            <select id="categorie" name="categorie">
                <?php
                    foreach($lesCategories as $categorie){
                ?>
                    <option value="<?php echo $categorie->getId(); ?>"><?php echo $categorie->getCode_categorie().' '.$categorie->getNom();?></option>
                <?php
                    }
                ?>
            </select><br>

            <label for="contact">Contact :</label>
            <select id="contact" name="contact">
                <?php
                    foreach($lesContacts as $contact){
                ?>
                    <option value="<?php echo $contact->getId(); ?>"><?php echo $contact->getNom().' '.$contact->getPrenom();?></option>
                <?php
                    }
                ?>
            </select><br>

            <input type="submit" name="action" value="Ajouter">
        </form>
    </body>
</html>