<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="../assets/css/stylelog.css">
    <link rel="icon" href="../assets/images/logo.png">

</head>
<body>
<header class="header">
<div class="head"><h3>Mingo</h3></div>
</header>
    <div class="signup-container">
        <h1>Sign Up</h1>
        
        <form action="traitement.php" method="post">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" placeholder="Nom" name="Nom" id="nom" required>
            </div>

            <div class="form-group">
                <label for="genre">Genre</label>

                <select name="genre" id="genre">
                    <option value="H">Homme</option>
                    <option value="F">Femme</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" placeholder="example@xyz" name="Email" id="email" required>
            </div>
            
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" placeholder="Mot de passe" name="Mot_de_passe" id="password" required>
            </div>
            
            <div class="form-group">
                <label for="birthdate">Date de naissance</label>
                <input type="date" name="Date_naissance" id="birthdate" required>
            </div>

            <div class="form-group">
                <label for="ville">Ville</label>
                <input type="text" name="ville" id="ville">
            </div>

            
    
    <button type="submit" class="btn">S'inscrire</button>
            
            
        </form>
        
        <div class="login-link">
            Tu as deja un compte? <a href="login.php">Se connecter</a>
        </div>
    </div>

</body>
</html>