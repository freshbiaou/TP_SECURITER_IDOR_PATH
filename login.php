<?php

require_once('controllers/AutoController.php');
$auth = new AuthController();
$erreur = $auth->login();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> IDOR Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="bar-menu">
        <div class="d-flex justify-content-between">
            <h3>Platforme de Test</h3>
            <h3>IDOR</h3>
        </div>
    </div>
    <div class="formulaire">
        <h2>login</h2>
        <?php if($erreur): ?>
        <div  style="padding: 2%;margin-bottom: 2%" class="p-2 mx-2 bg-danger">
            <?= $erreur?>
        </div>
    <?php endif ?>
        <div class="justify-content-between">
            <form action="" method="POST">
                <input type="email" name="email" placeholder="E-mail *" required>
                <input type="password" name="pass" placeholder="password *" required>
                <button type="submit" name="send" class="btn bg-success"> Envoyer </button>
        </div>
        </form>
        <h6>Vous n'avez pas de Compte ? <a href="register.php">Créer un compte</a></h6>
    </div>
    </div>
    <footer class="footer-update d-flex">
        <h4>Test de Sécurité Web || Référence directe non sécurisée à un objet || limit 2023-2024 </h4>

    </footer>
</body>

</html>