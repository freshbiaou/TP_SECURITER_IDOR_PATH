<?php 
require_once('controllers/AutoController.php');

$users = new AuthController();

$context = $users->update($current_user['id']);

$data = $current_user;

$message = $context;

$erreur = $message['erreur']; $success = $message['success'];

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile User</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="bar-menu">
    <div class="d-flex justify-content-between">
    <h3> <a href="index.php" class="text-decoration-none">Platforme de Test</a></h3>
      <h3> <?php if ($current_user) {
              echo 'Bienvenue ' . '  ' . $current_user['last_name'] . ' ' . $current_user['first_name'];
            } ?></h3>
      <h3>
        <?php if ($current_user) {
          echo "<a class=\"btn bg-danger\" href=\"logout.php\">Logout</a>";
        } else {
          echo "<a class=\"btn bg-danger\" href=\"index.php\">logout</a>";
        }
        ?>
      </h3>
    </div>
  </div>
    <div class="formulaire">
        <h2>Vos information personnel</h2>
        <?php if(isset($success) || isset($erreur)): ?>
        <div  style="padding: 2%;margin-bottom: 2%" class="p-2 mx-2 bg-<?= isset($success)? 'success': 'danger' ?>">
            <?= $success ?? $erreur?>
        </div>
    <?php endif ?>

        <div class="justify-content-between">
            <form action="" method="POST">
                <input type="text" name="first_name" placeholder="Nom prénom *" value="<?= $data['first_name'] ?>">
                <input type="text" name="last_name" placeholder="Votre nom *" value="<?= $data['last_name'] ?>" >
                <input type="email" name="email" placeholder="Votre mail *" value="<?= $data['email'] ?>" >
                <button class="btn bg-success" type="submit" name="send" style="text-align: center;">Modifier</button>
        </div>
        </form>
    </div>
    </div>
    <footer class="footer-update">
        <h4>Test de Sécurité Web || Référence directe non sécurisée à un objet || limit 2023-2024</h4>
    </footer>

</body>

</html>