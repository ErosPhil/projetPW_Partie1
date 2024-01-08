<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <title>Club de sport</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="HomeController.php">Club de sport</a>
                <?php if(isset($_SESSION['userId'])){ ?>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="LesCategoriesController.php">Catégories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="LesLicenciesController.php">Licenciés</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Contacts</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="AddContactController.php">Ajouter</a>
                            <a class="dropdown-item" href="DeleteContactController.php">Supprimer</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="LesEducateursController.php">Éducateurs</a>
                    </li>
                </ul>
                <?php } ?>
            </div>
        </nav>
    </body>
</html> 