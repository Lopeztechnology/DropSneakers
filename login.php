<?php
session_start();

if (isset($_SESSION['user_id'])) {
    // Si el usuario ya está logueado, redirige a la página principal
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $input = $_POST['input']; // Cambia 'input' al nombre de tu campo de entrada (nombre de usuario o correo electrónico)
    $password = $_POST['password'];

    // Leer el archivo JSON de usuarios
    $users = json_decode(file_get_contents('users.json'), true);

    // Verificar las credenciales
    foreach ($users['users'] as $user) {
        if (($user['username'] === $input || $user['email'] === $input) && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: index.php");
            exit;
        }
    }

    // Si no se encuentra al usuario, mostrar un mensaje de error
    $error = "Nombre de usuario o contraseña incorrectos.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: grey;
            height:100%;
        }
        h2 {
            text-align: center;
            color: #333;
        }

        .login-container {
            min-width: 300px;
            
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .error-message {
            color: #ff0000;
            text-align: center;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"] {
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
        <h2>Iniciar Sesión</h2>
        <?php if (isset($error)) { echo "<p class='error-message'>$error</p>"; } ?>
        <form method="post">
            <input type="text" name="input" placeholder="Nombre de usuario o Correo Electrónico" required><br>
            <input type="password" name="password" placeholder="Contraseña" required><br>
            <input type="submit" name="login" value="Iniciar Sesión">  
        </form>
        </div>  
    </div>
    <a class="btn" href="index.php">Volver a la página</a>
    <a class="btn" href="registro.php">Registrarse</a>
</body>
</html>
