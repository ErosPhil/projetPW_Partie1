<?php 
//Vérifie si l'utilisaeur est bien connecté, sinon redirige vers la page d'accueil
if(!isset($_SESSION['userId'])){ 
    header("Location:HomeController.php");
}    
?>
