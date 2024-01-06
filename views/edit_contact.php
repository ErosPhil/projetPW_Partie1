<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Modifier un Contact</title>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <h1>Modifier un Contact</h1>
        <a href="ViewContactController.php?id=<?php echo $contactId; ?>">Retour aux détails du contact</a>

        <?php if ($contact): ?>
            <form action="EditContactController.php?id=<?php echo $contact->getId(); ?>" method="post">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" value="<?php echo $contact->getNom(); ?>" required><br>

                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" value="<?php echo $contact->getPrenom(); ?>" required><br>

                <label for="email">Email :</label>
                <input type="text" id="email" name="email" value="<?php echo $contact->getEmail(); ?>" required><br>

                <label for="tel">Téléphone :</label>
                <input type="text" id="tel" name="tel" value="<?php echo $contact->getTel(); ?>" required><br>

                <input type="submit" value="Modifier">
            </form>
        <?php else: ?>
            <p>Le contact n'a pas été trouvé.</p>
        <?php endif; ?>

    </body>
</html>

