<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>


    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/stylelog.css">
    <link rel="icon" href="../assets/images/logo.png">

</head>
<body>

<header class="bg-primary py-3 mb-4">
    <div class="container">
        <h3 class="text-white m-0">TakeUmprunt</h3>
    </div>
</header>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h1 class="card-title text-center mb-4">Inscription</h1>
                    <form action="traitementInscription.php" method="post">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" placeholder="Nom" name="nom" id="nom" required>
                        </div>
                        <div class="mb-3">
                            <label for="genre" class="form-label">Genre</label>
                            <select name="genre" id="genre" class="form-select" required>
                                <option value="H">Homme</option>
                                <option value="F">Femme</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" placeholder="example@xyz" name="email" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" placeholder="Mot de passe" name="mot_de_passe" id="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="birthdate" class="form-label">Date de naissance</label>
                            <input type="date" class="form-control" name="date_naissance" id="birthdate" required>
                        </div>
                        <div class="mb-3">
                            <label for="ville" class="form-label">Ville</label>
                            <input type="text" class="form-control" name="ville" id="ville" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">S'inscrire</button>
                        </div>
                    </form>
                    <div class="text-center mt-3">
                        <span>Tu as déjà un compte ? <a href="login.php">Se connecter</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>