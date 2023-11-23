<?php 
require_once('controllers/ProduitController.php');
$produits = new ProduitController();
$erreur = $produits->store();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comannde Produit</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="bar-menu">
    <div class="d-flex justify-content-between">
      <h3> <a href="index.php" class="text-decoration-none">Platforme de Test</a></h3>
      <h3> <a href="profile.php" class="text-decoration-none">Profile </a></h3>
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
        <?php if ($erreur) : ?>
        <div style="padding: 2%;margin-bottom: 2%" class="p-2 mx-2 bg-danger">
            <?= $erreur ?>
        </div>
        <?php endif ?>

        <div class="justify-content-between">
            <form action="" method="POST">
                <input type="text" name="name" placeholder="Nom du Produit *" autocomplete="off">
                <input type="text" name="full_name" placeholder="Votre nom *" autocomplete="off">
                <input type="email" name="email" placeholder="Votre mail *" autocomplete="off">
                <select name="choix" class="custom-select">
                    <option selected disabled>--Departements--</option>
                    <option value="Clavier">Clavier</option>
                    <option value="Souris">Souris</option>
                    <option value="Disque dur">Disque dur</option>
                </select>
                <input type="text" name="message" placeholder="Décrivez-nous les caractérisque souhaitez ....">
                <button class="btn bg-success" type="submit" name="envoyer" style="text-align: center;">Créer</button>
        </div>
        </form>
    </div>
    </div>
    <footer class="footer-update d-flex">
        <h4>Test de Sécurité Web || Référence directe non sécurisée à un objet || limit 2023-2024 </h4>
    </footer>
</body>

</html>