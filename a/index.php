<?php
session_start();

// Verificar si el usuario ya ha iniciado sesión
if (isset($_SESSION['username'])) {
    header('Location: welcome.php');
    exit;
}

// Verificar si se envió el formulario de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar las credenciales (en este caso, usuario: admin, contraseña: password)
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'admin' && $password === 'password') {
        // Las credenciales son válidas, establecer variables de sesión
        $_SESSION['username'] = $username;
        header('Location: welcome.php');
        exit;
    } else {
        $error = 'Credenciales inválidas. Inténtalo de nuevo.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión</title>
</head>
<body>
    <h1>Iniciar sesión</h1>

    <?php if (isset($error)) : ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST" action="index.php">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>
