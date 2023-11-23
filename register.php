<?php 

require_once('controllers/AutoController.php');
$auth = new AuthController();
$auth->register();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> IDOR Sign_up</title>
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
        <h2>Inscription</h2>
        <?php if(isset($success) || isset($erreur)): ?>
        <div class="p-2 mx-2 bg-<?= isset($success)? 'success': 'danger' ?>">
            <?= $success ?? $erreur?>
        </div>
    <?php endif ?>
        <div class="justify-content-between">
            <form action="" method="POST">
                <input type="text" name="first_name" placeholder="The First name *" required>
                <input type="text" name="last_name" placeholder="The Last name *" required>
                <input type="email" name="email" placeholder="E-mail *" required>
                <input type="password" name="pass" placeholder="The password *" required>
                <input type="password" name="conf" placeholder="Confirmation *" required>
                <button type="submit" name="send" class="btn bg-success"> S'inscrire </button>
        </div>
        </form>
    </div>
    </div>
    <footer class="footer-update">
        <h4>Test de Sécurité Web || Référence directe non sécurisée à un objet || limit 2023-2024 </h4>

    </footer>
</body>

</html>