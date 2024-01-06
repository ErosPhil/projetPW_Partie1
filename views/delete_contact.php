<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Supprimer un Contact</title>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <h1>Supprimer un Contact</h1>
        <a href="HomeController.php">Retour à la page d'accueil</a>
        <form action="DeleteContactController.php" method="post">
            <select id="contact" name="contact">
                <?php
                    foreach($lesContacts as $contact){
                ?>
                    <option value="<?php echo $contact->getId(); ?>"><?php echo $contact->getNom().' '.$contact->getPrenom();?> <?php echo $contact->getEmail(); ?> [<?php echo $contact->getTel(); ?>]</option>
                <?php
                    }
                ?>
            </select><br>
            <input type="submit" name="action" value="Oui, Supprimer">
        </form>
    </body>
</html>