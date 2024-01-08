<body>
    <div style='margin-top: 100px'>
        <div class='text-center'>    
            <?php if(!isset($_SESSION['userId'])){ ?>
                <h3>Bienvenue !</h3><br>
                <p>Pour continuer, veuillez vous connecter.</p>
                <form action="HomeController.php" method="post">
                    <label for="email">Email :</label>
                    <input type="text" id="email" name="email" required><br>

                    <label for="mdp">Mot de passe :</label>
                    <input type="password" id="mdp" name="mdp" required><br>

                    <input type="submit" name="seConnecter" value="Se connecter">
                </form>
            <?php }else{ ?>
                <h3>Bonjour <?php echo $_SESSION['name']; ?></h3><br>
                <form action="HomeController.php" method="post">
                    <input type="submit" name="seDeconnecter" value="Se déconnecter">
                </form>
            <?php } ?>
        </div>
    </div>
</body>