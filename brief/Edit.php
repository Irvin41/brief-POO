<?php
require_once 'Auteur.php';

$auteurObj = new Auteur();

$id = $_GET['id'];

if (!$id) {
    header('Location: index.php');
    exit;
}

$auteur = $auteurObj->getAuteurById($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $date_naissance = trim($_POST['date_naissance']);

    $auteurObj->modifierAuteur($id, $nom, $prenom, $date_naissance);

    header('Location: index.php');
    exit;
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un auteur</title>
</head>
<body>
<h2>Modifier l'auteur</h2>

<form method="POST" action="Edit.php?id=<?= $auteur['id_auteur'] ?>">
    <label>Nom :
        <input type="text" name="nom" value="<?= htmlspecialchars($auteur['nom']) ?>" required>
    </label>
    <label>Prénom :
        <input type="text" name="prenom" value="<?= htmlspecialchars($auteur['prenom']) ?>" required>
    </label>
    <label>Date de naissance :
        <input type="text" name="date_naissance" value="<?= htmlspecialchars($auteur['date_naissance']) ?>" required>
    </label>
    <button type="submit">Modifier</button>
</form>
</body>
</html>