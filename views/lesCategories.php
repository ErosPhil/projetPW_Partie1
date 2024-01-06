<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Liste des Catégories</title>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <h1>Liste des Catégories</h1>
        <a href="AddCategorieController.php">Ajouter une catégorie</a>

        <?php if (count($categories) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Libellé</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $categorie): ?>
                        <tr>
                            <td><?php echo $categorie->getCode_categorie(); ?></td>
                            <td><?php echo $categorie->getNom(); ?></td>
                            <td>
                                <a href="EditCategorieController.php?id=<?php echo $categorie->getId(); ?>">Modifier</a>
                                <a href="DeleteCategorieController.php?id=<?php echo $categorie->getId(); ?>">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Aucune catégorie trouvée.</p>
        <?php endif; ?>
    </body>
<html>