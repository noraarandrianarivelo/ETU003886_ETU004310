<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="icon" href="../assets/images/logo.png">
    <title>Connexion</title>
</head>
<body>

<header class="bg-primary py-3 mb-4">
    <div class="container">
        <h3 class="text-white m-0">TakeEmprunt</h3>
    </div>
</header>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h1 class="card-title text-center mb-4">Connexion</h1>
                    <form action="traitementLogin.php" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" placeholder="example@xyz" name="email" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" name="mot_de_passe" placeholder="Mot de passe" id="password" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Se Connecter</button>
                        </div>
                    </form>
                    <div class="text-center mt-3">
                        <span>Tu n'as pas encore de compte ? <a href="inscription.php">S'inscrire</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
</body>
</html>