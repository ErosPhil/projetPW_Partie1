<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Liste des Licenciés</title>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <h1>Liste des Licenciés</h1>
        <a href="AddLicencieController.php">Ajouter un licencié</a>

        <?php if (count($licencies) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>N° licence</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Catégorie</th>
                        <th>Contact</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($licencies as $licencie): ?>
                        <tr>
                            <td><?php echo $licencie->getId(); ?></td>
                            <td><?php echo $licencie->getNom(); ?></td>
                            <td><?php echo $licencie->getPrenom(); ?></td>
                            <?php 
                                foreach($lesCategories as $categorie){
                                    if($categorie->getId() == $licencie->getId_categorie()){
                                        echo "<td>[". $categorie->getCode_categorie() ."] ". $categorie->getNom() ."</td>";
                                    }
                                }
                            ?>
                            <td><a href="ViewContactController.php?id=<?php echo $licencie->getId_contact(); ?>">Voir</a></td>
                            <td>
                                <a href="EditLicencieController.php?id=<?php echo $licencie->getId(); ?>">Modifier</a>
                                <a href="DeleteLicencieController.php?id=<?php echo $licencie->getId(); ?>">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Aucun licencié trouvé.</p>
        <?php endif; ?>
    </body>
<html>