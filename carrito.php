<!DOCTYPE html>
<html lang="es">
<html>
  <head>
  <?php
    session_start();
    ?>
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
  </head>

<body class="text-center me-3">
    <div>
    <nav class="navbar bg-transparent fixed-top">
        <div class="container-fluid">
          <a class="text-black link-secondary " href="index.php"><img width=150px src="kevin/kevin/sn-rem.png" alt="" srcset=""></a>
          <div>
          <a class="navbar-toggler white" href="carrito.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16"><path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/></svg></a>
          <button class="navbar-toggler white" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><img width=170px src="kevin/kevin/sn-rem.png" alt="" srcset=""></h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Productos</a>
                </li>
                
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Categorias
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item" href="#">Calzados deportivos</a></li>
                    <li><a class="dropdown-item" href="#">Calzados de vestir</a></li>
                    <li><a class="dropdown-item" href="#">Remeras deportivas</a></li>
                    <li><a class="dropdown-item" href="#">Remeras basicas</a></li>
                    <li><a class="dropdown-item" href="#">Kepis</a></li>
                    <li><a class="dropdown-item" href="#">Medias</a></li>
                  </ul>
                </li>
                </ul>
            </div>
            <div class="navbar-fixed-bottom mb-0">
                  <a class="btn btn-success mb-2 mt-1" href="https://api.whatsapp.com/send?phone=595984213977">Contactar al WhatsApp</a>
                  </div><div class="navbar-fixed-bottom mb-1"> <?php
// Verificar si el usuario ya ha iniciado sesión
if (isset($_SESSION['user_id'])) {
    // Si el usuario está logueado, mostrar el botón de cerrar sesión
    echo '<a class="btn text-white" href="cerrar_sesion.php">Cerrar Sesión</a>';
} else {
    // Si el usuario no está logueado, mostrar los botones de inicio de sesión y registro
    echo '<a class="btn btn-dark text-white" href="login.php">Iniciar Sesión</a><br>';
    echo '<a class="btn btn-dark text-white mt-2" href="registro.php">Registrarse</a>';
}
?></div>
                </div>
          </div>
        </div>
      </nav>
      </div>
<?php


if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

if (isset($_POST['agregar']) && isset($_POST['producto_id'])) {
    $producto_id = $_POST['producto_id'];

    // Asegúrate de que $producto_id sea un valor válido y carga los productos desde productos.json
    $json = file_get_contents('productos.json');
    $productos = json_decode($json, true);

    foreach ($productos as $producto) {
        if ($producto['id'] == $producto_id) {
            $_SESSION['carrito'][] = $producto;
            break;
        }
    }
}

if (isset($_POST['eliminar']) && isset($_POST['producto_id'])) {
    $producto_id = $_POST['producto_id'];

    // Encuentra el índice del producto en el carrito y elimínalo
    foreach ($_SESSION['carrito'] as $key => $producto) {
        if (isset($producto['id']) && $producto['id'] == $producto_id) {
            unset($_SESSION['carrito'][$key]);
            break;
        }
    }
}

// Muestra los productos en el carrito y calcula el precio total
echo '<h2 style="margin-top:100px">Carrito de Compras</h2>';
$total = 0;

if (empty($_SESSION['carrito'])) {
    echo 'El carrito de compras está vacío.';
} else {
    
    echo '<ul>';
    foreach ($_SESSION['carrito'] as $item) {
        $total += $item['precio'];

        echo '<hr>';
        echo '<div class="d-flex justify-content-around align-items-center"><img src="' . $item['imagenes'][0] . '" class="card-img-top " style="width: 100px" alt="' . $item['nombre'] . '"><h5> ' . $item['nombre'] . '</h5> Precio: Gs. ' . $item['precio'] . '<form method="post" action="carrito.php"><input type="hidden" name="eliminar" value="1"><input type="hidden" name="producto_id" value="' . $item['id'] . '"><input type="submit" value="Eliminar"></form>' . '</div> ';
        echo '<hr>';
    }
    echo '</ul>';
    
    echo '<div class="row justify-content-around"><h4 class="col-md-6">Total a pagar: Gs. ' . $total . '</h4> <div class="col-md-4"><a class="btn btn-success me-2" href="#">Contactar al WhatsApp</a><a class="btn btn-dark" href="index.php">Volver a la pagina</a></div></div>';
}
?>
        <script src="bootstrap-5.3.2-dist\node_modules\jquery\dist\jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/488435a96f.js" crossorigin="anonymous"></script>
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>