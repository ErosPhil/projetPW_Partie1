<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Modifier un Éducateur</title>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <h1>Modifier un Éducateur</h1>
        <a href="LesEducateursController.php">Retour à la liste des éducateurs</a>

        <?php if ($educateur): ?>
            <form action="EditEducateurController.php?id=<?php echo $educateur->getId(); ?>" method="post">
                <label for="email">Email :</label>
                <input type="text" id="email" name="email" value="<?php echo $educateur->getEmail(); ?>" required><br>

                <label for="licence">Licence :</label>
                <select id="licence" name="licence">
                    <?php
                        foreach($lesLicencies as $licencie){
                            if($licencie->getId() == $educateur->getId_licence()){
                    ?>
                        <option selected value="<?php echo $licencie->getId(); ?>"><?php echo $licencie->getNom().' '.$licencie->getPrenom();?></option>
                        <?php
                            }else{
                        ?>
                        <option value="<?php echo $licencie->getId(); ?>"><?php echo $licencie->getNom().' '.$licencie->getPrenom();?></option>
                    <?php
                            }
                        }
                    ?>
                </select><br>
                
                <input type="submit" value="Modifier">
            </form>
        <?php else: ?>
            <p>L'éducateur n'a pas été trouvé.</p>
        <?php endif; ?>

    </body>
</html>

