<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des étudiants</title>
</head>
<body>

<h1>Liste des étudiants</h1>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($etudiants as $etudiant): ?>
            <tr>
                <td><?= esc($etudiant['id']) ?></td>
                <td><?= esc($etudiant['nom']) ?></td>
                <td><?= esc($etudiant['prenom']) ?></td>
                <td><?= esc($etudiant['email']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>