<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="icon" href="../assets/images/logo.png">
    <title>Connexion</title>
</head>
<body>
<header class="header"><div class="head"><h3>Mingo</h3></div></header>
    <div class="signin-container">
        <h1>Sign In</h1>

        <form action="traitement2Hashe.php" method="post">
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" placeholder="example@xyz" name="Email" id="email" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="Mot_de_passe" placeholder="Mot de passe" id="password"  required>
            </div>

            <button type="submit" class="btn">Se Connecter</button>
        </form>

        <div class="signup-link">
            Tu n'as pas encore de compte? <a href="inscription.php">S'inscrire</a>
        </div>
           
    </div>

    <?php include("../inc/footer.php");?>
    
</body>
</html>