<?php
// index.php : Page d'accueil du jeu
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Jeu de Football Virtuel</title>
</head>
<body>
    <h1>Bienvenue sur le jeu de football virtuel</h1>
    <?php if (isset($_SESSION['user_id'])): ?>
        <p>Bienvenue, <?php echo $_SESSION['user_name']; ?></p>
        <a href="dashboard.php">Accéder à votre tableau de bord</a>
    <?php else: ?>
        <a href="login.php">Se connecter</a> | <a href="register.php">S'inscrire</a>
    <?php endif; ?>
</body>
</html>
