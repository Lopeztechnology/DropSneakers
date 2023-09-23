<?php
session_start();

if (isset($_SESSION['user_id'])) {
    // Si el usuario ya está logueado, redirige a la página principal
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registro'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Leer el archivo JSON de usuarios
    $users = json_decode(file_get_contents('users.json'), true);

    // Verificar si el nombre de usuario o correo electrónico ya existen
    foreach ($users['users'] as $user) {
        if ($user['username'] === $username) {
            $error = "El nombre de usuario ya está en uso.";
            break;
        }
        if ($user['email'] === $email) {
            $error = "El correo electrónico ya está en uso.";
            break;
        }
    }

    // Si no hay errores, guardar al nuevo usuario en el archivo JSON
    if (!isset($error)) {
        $newUser = [
            'id' => count($users['users']) + 1,
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT),
        ];
        $users['users'][] = $newUser;
        file_put_contents('users.json', json_encode($users));

        // Redirigir al usuario a la página de inicio de sesión
        header("Location: login.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrarse</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: grey;
            height:100%;
        }
        .body{
            display:flex;
            justify-content:center;
            align-items:center;
        }
        h2 {
            text-align: center;
            color: #333;
        }

        .login-container {
            min-width: 300px;
            margin: 0 auto;
            background-color: #fff;
            padding: 50px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .error-message {
            color: #ff0000;
            text-align: center;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

         input[type="submit"] {
            width: 100%;
            background-color: #333;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #555;
        }
        a {
            text-align:center;
            width: 100%;
            background-color: #333;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            
        }
        a:hover {
            background-color: #555;
        }
        @media (max-width: 772px) { 
            .login-container {
            width: 300px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
}
    </style>
</head>
<body>
<div class="login-container">
    <h2>Registrarse</h2>
    <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
    <form method="post">
        <input type="text" name="username" placeholder="Nombre de usuario" required><br>
        <input type="email" name="email" placeholder="Correo electrónico" required><br>
        <input type="password" name="password" placeholder="Contraseña" required><br>
        <input type="submit" name="registro" value="Registrarse">
    </form>
    </div>
    <a class="btn" href="index.php">Volver a la página</a>
    <a class="btn" href="login.php">Iniciar sesion</a>
</body>
</html>
