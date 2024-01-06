<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Liste des Éducateurs</title>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <h1>Liste des Éducateurs</h1>
        <a href="AddEducateurController.php">Ajouter un éducateur</a>

        <?php if (count($educateurs) > 0): 
            $i = 0;?>
            <table>
                <thead>
                    <tr>
                        <th>N° licence</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Est admin</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($educateurs as $educateur): ?>
                        <tr>
                            <td><?php echo $educateur->getId_licence(); ?></td>
                            <td><?php echo $infoEducateurs[$i]->getNom(); ?></td>
                            <td><?php echo $infoEducateurs[$i]->getPrenom(); ?></td>
                            <td><?php echo $educateur->getEmail(); ?></td>
                            <td>
                            <?php
                                if($educateur->getIs_admin() == 1){
                                    echo "Oui";
                                }else{
                                    echo "Non";
                                }
                            ?>
                            </td>
                            <td>
                                <a href="EditEducateurController.php?id=<?php echo $educateur->getId(); ?>">Modifier</a>
                                <a href="DeleteEducateurController.php?id=<?php echo $educateur->getId(); ?>">Supprimer</a>
                            </td>
                        </tr>
                    <?php $i++; 
                        endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Aucun éducateur trouvé.</p>
        <?php endif; ?>
    </body>
<html>