<?php 
require_once('controllers/ProduitController.php');
$produits = new ProduitController();

$id = $_GET['id'];

$context = $produits->edit($id, $current_user['id']);

$data = isset($context['produit'][0]) ? $context['produit'][0] : $context['produit'];

$message = $produits->update($id);

$erreur = $message['erreur']; $success = $message['success'];

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Produit</title>
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
        <h2>Commande Produit</h2>
        <?php if(isset($success) || isset($erreur)): ?>
        <div  style="padding: 2%;margin-bottom: 2%" class="p-2 mx-2 bg-<?= isset($success)? 'success': 'danger' ?>">
            <?= $success ?? $erreur?>
        </div>
    <?php endif ?>
    <?php if($data): ?>
        <div class="justify-content-between">
            <form action="" method="POST">
                <input type="text" name="name" placeholder="Nom du Produit *" value="<?= $data['name'] ?>">
                <input type="text" name="full_name" placeholder="Votre nom *" value="<?= $data['full_name'] ?>" >
                <input type="email" name="email" placeholder="Votre mail *" value="<?= $data['email'] ?>" >
                <select name="choix" class="custom-select">
                    <option selected disabled>--Departements--</option>
                    <option value="Clavier"  <?= $data['choix'] ? 'selected' : null ?>>Clavier</option>
                    <option value="Souris"  <?= $data['choix'] ? 'selected' : null ?> >Souris</option>
                    <option value="Disque dur"  <?= $data['choix'] ? 'selected' : null ?>>Disque dur</option>
                </select>
                <input type="text" name="message" placeholder="Décrivez-nous les caractérisque souhaitez ...." value="<?= $data['message'] ?>">
                <button class="btn bg-success" type="submit" name="send" style="text-align: center;">Modifier</button>
        </div>        
        <?php endif ?>
        <?php if(!$data): ?>
          <div  style="padding: 2%;margin-bottom: 2%" class="p-2 mx-2 bg-danger">
            Erreur, vous n'avez pas les droits d'edition sur ce produit
        </div>
          <?php endif ?>
        </form>
    </div>
    </div>
    <footer class="footer-update">
    <h4>Test de Sécurité Web || Référence directe non sécurisée à un objet || limit 2023-2024 </h4>
    </footer>

</body>

</html>