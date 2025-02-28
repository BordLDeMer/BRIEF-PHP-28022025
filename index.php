<?php
require_once("Produit.php");

$produitObj = new Produit();

//liste des produits
$produits = $produitObj->lister();


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
