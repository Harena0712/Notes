<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des produits</title>
</head>
<body>

<h1>Liste des produits</h1>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prix</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($produits as $produit): ?>
            <tr>
                <td><?= esc($produit['id']) ?></td>
                <td><?= esc($produit['nom']) ?></td>
                <td><?= esc($produit['prix']) ?> Ar</td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>