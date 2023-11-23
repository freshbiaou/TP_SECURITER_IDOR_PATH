<?php

require_once('controllers/ProduitController.php');


$id = $_GET['id'];

$produits = new ProduitController();
$erreur = $produits->destroy($id, $current_user['id']);

?>