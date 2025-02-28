<?php
require_once("Produit.php");

$produitObj = new Produit();

// Liste des produits
$produits = $produitObj->lister();

// Ajouter un produit
if (isset($_POST['ajouter'])) {
    $produitObj->Ajouter($_POST['nom'], $_POST['prix'], $_POST['stock']);
    $produits = $produitObj->lister();  // Recharger la liste après ajout
}

// Supprimer un produit
if (isset($_GET['supprimer'])) {
    $produitObj->Supprimer($_GET['id']);
    $produits = $produitObj->lister();  // Recharger la liste après suppression
}

// Modifier un produit
if (isset($_GET['modifier'])) {
    $produitObj->modifier($_GET['id'], $_POST['nom'], $_POST['prix'], $_POST['stock']);
    $produits = $produitObj->lister();  // Recharger la liste après modification
}

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="global.css">
    <title>Gestion des produits (POO)</title>
</head>
<body>
<h1>Liste des produits</h1>
<!-- Formulaire pour ajouter un produit -->
<h2>Ajouter un produit</h2>
<form method="post">
    <label for="nom">Nom:</label>
    <input type="text" name="nom" required>
    <label for="prix">Prix:</label>
    <input type="text" name="prix" required>
    <label for="stock">Stock:</label>
    <input type="text" name="stock" required>
    <button type="submit" name="ajouter">Ajouter</button>
</form>

<!-- Liste des produits -->
<table>
    <thead>
    <tr>
        <th>ID produit</th>
        <th>Nom</th>
        <th>Prix</th>
        <th>Stock</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($produits as $a): ?>
        <tr>
            <td><?= htmlspecialchars($a['id_produits']) ?></td>
            <td><?= htmlspecialchars($a['nom']) ?></td>
            <td><?= htmlspecialchars($a['prix']) ?></td>
            <td><?= htmlspecialchars($a['stock']) ?></td>
            <td><button><a href="update.php?id=<?= $a['id_produits']; ?>">Modifier</a></button></td>
            <td><button><a href="?supprimer=true&id=<?= $a['id_produits']; ?>">Supprimer</a></button></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="global.css">
    <title>Gestion des produits (POO)</title>
</head>
<body>
<h1>Liste des produits</h1>
<table>
    <thead>
    <tr>
        <th>ID produits</th>
        <th>Nom</th>
        <th>Prix</th>
        <th>Stock</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <!--PHP-->
    <?php foreach ($produits as $a): ?>
        <tr>
            <td><?= htmlspecialchars($a['id_produits']) ?></td>  <!--?= équivaut à un "echo"-->
            <td><?= htmlspecialchars($a['nom']) ?></td>
            <td><?= htmlspecialchars($a['prix']) ?></td>
            <td><?= htmlspecialchars($a['stock']) ?></td>
            <td><button><a href="update.php?id=<?= $a['id_produits']; ?>">Modifier</a></button></td>
            <td><button><a href="delete.php?id=<?= $a['id_produits']; ?>">Supprimer</a></button></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
