<?php
// register.php : Page d'inscription
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include('../includes/config.php');
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash du mot de passe

    // Vérifier si l'email est déjà utilisé
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        $error = "Cet email est déjà utilisé.";
    } else {
        // Enregistrer l'utilisateur dans la base de données
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $password]);
        header("Location: login.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>S'inscrire</title>
</head>
<body>
    <h1>Inscription</h1>
    <?php if (isset($error)): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST">
        <label>Nom:</label><br>
        <input type="text" name="name" required><br><br>
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>
        <label>Mot de passe:</label><br>
        <input type="password" name="password" required><br><br>
        <button type="submit">S'inscrire</button>
    </form>
</body>
</html>
