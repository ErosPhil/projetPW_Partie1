<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Modifier un Licencié</title>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <h1>Modifier un Licencié</h1>
        <a href="LesLicenciesController.php">Retour à la liste des licenciés</a>

        <?php if ($licencie): ?>
            <form action="EditLicencieController.php?id=<?php echo $licencie->getId(); ?>" method="post">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" value="<?php echo $licencie->getNom(); ?>" required><br>

                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" value="<?php echo $licencie->getPrenom(); ?>" required><br>

                <label for="categorie">Catégorie :</label>
                <select id="categorie" name="categorie">
                    <?php
                        foreach($lesCategories as $categorie){
                            if($categorie->getId() == $licencie->getId_categorie()){
                    ?>
                            <option selected value="<?php echo $categorie->getId(); ?>"><?php echo $categorie->getCode_categorie().' '.$categorie->getNom();?></option>
                        <?php
                            }else{
                        ?>
                            <option value="<?php echo $categorie->getId(); ?>"><?php echo $categorie->getCode_categorie().' '.$categorie->getNom();?></option>
                    <?php
                            }
                        }
                    ?>
                </select><br>

                <label for="contact">Contact :</label>
                <select id="contact" name="contact">
                    <?php
                        foreach($lesContacts as $contact){
                            if($contact->getId() == $licencie->getId_contact()){
                    ?>
                        <option selected value="<?php echo $contact->getId(); ?>"><?php echo $contact->getNom().' '.$contact->getPrenom();?> <?php echo $contact->getEmail(); ?> [<?php echo $contact->getTel(); ?>]</option>
                        <?php
                            }else{
                        ?>
                        <option value="<?php echo $contact->getId(); ?>"><?php echo $contact->getNom().' '.$contact->getPrenom();?> <?php echo $contact->getEmail(); ?> [<?php echo $contact->getTel(); ?>]</option>
                    <?php
                            }
                        }
                    ?>
                </select><br>
                
                <input type="submit" value="Modifier">
            </form>
        <?php else: ?>
            <p>Le licencié n'a pas été trouvé.</p>
        <?php endif; ?>

    </body>
</html>

