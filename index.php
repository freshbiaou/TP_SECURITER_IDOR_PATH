<?php

require_once('controllers/ProduitController.php');
$produits = new ProduitController();

$context = $produits->index($current_user['id']);

if (!isset($_SESSION['user'])) {
  header('Location:login.php');
}
?>



<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IDOR Dashboard </title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
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


  <div class="d-flex justify-content-between mx-3">
    <button class="btn bg-success"> <a href="produit.php" class="text-decoration-none">Commande Produit</a> </button>
    <div style="border: 3px outset; padding:3px; border-radius:8px; border-color : black;"><input type="search" id="search" placeholder="Rechercher" style="outline:none;border:none"> </div>
  </div>
  <div class="p-1 tab">
    <table>
      <thead>
        <tr>
          <th>S/N</th>
          <th>Produit</th>
          <th>Choix</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        
        if (!$context['produit']) : ?>
          <tr>
            <td colspan="8">
              Pas de Produit disponible pour le moment
            </td>
          </tr>
        <?php endif; ?>
        <?php 
        $i = 0;
        foreach ($context['produit'] as $dep => $value) : ?>
          <tr>
            <td> <?= ++$i ?></td>
            <td class="names"><?= $value['name'] ?></td>
            <td><?= $value['choix'] ?></td>
            <td style="width: 400px; padding: auto 1%;">
              <div class="d-flex justify-content-between">
                <a href="edit_produit.php?id=<?= $value['id'] ?>" class="d-flex btn bg-success " type="submit" name="env">Modifier</a>
                <a href="destroy_produit.php?id=<?= $value['id'] ?>" class="d-flex btn bg-danger color-white" href="password.php" style="padding:auto 10%;">Supprimer</a>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <footer class="footer-update d-flex">
    <h4>Test de Sécurité Web || Référence directe non sécurisée à un objet || limit 2023-2024 </h4>
  </footer>
  <script src="js/app.js"></script>
</body>

</html>