<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Producto</title>
    <!-- Incluye los archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <style>
        .btn{
          background-color:black;
        }
        body{
    margin-right:12px;
    color:black;
  }
  .btn{
    background-color: black;
    border:white;
    color:white;
  }
  .btn:hover{
    background-color: grey;
    border:white;
  }
.detalle-descripcion{
  display: flex;
  flex-wrap: wrap;
}
    </style>
</head>
<body class="text-center">
<div>
<nav class="navbar bg-transparent fixed-top">
        <div class="container-fluid">
          <a class="text-black link-secondary " href="index.php"><img width=150px src="kevin/kevin/sn.png" alt="" srcset=""></a>
          <div>
          <a class="navbar-toggler white bg-hea-tr border border-3 border-black" href="carrito.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16"><path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/></svg></a>
          <button class="navbar-toggler white bg-hea-tr border border-3 border-black" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
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
        </div>
          </div>
          
        </div>
        
      </nav>
      </div>

    <div class="container mt-5 row justify-content-around align-items-center">
        <?php
        // Obtén el ID del producto de la URL
        $id = $_GET['id'];

        // Carga los datos del archivo JSON
        $json = file_get_contents('productos.json');
        $productos = json_decode($json, true);

        // Busca el producto por ID
        $productoSeleccionado = null;
        foreach ($productos as $producto) {
            if ($producto['id'] == $id) {
                $productoSeleccionado = $producto;
                break;
            }
        }

        if ($productoSeleccionado !== null) {
            

            // Verifica si el producto tiene imágenes
            if (!empty($productoSeleccionado['imagenes'])) {
                echo '<div id="carouselExampleControls" class="col-md-4 carousel slide" data-ride="carousel">';
                echo '<div class="carousel-inner">';
                
                // Itera a través de las imágenes del producto
                foreach ($productoSeleccionado['imagenes'] as $index => $imagen) {
                    $activeClass = ($index === 0) ? 'active' : '';
                    echo '<div class="carousel-item ' . $activeClass . '">';
                    echo '<img src="' . $imagen . '" class="d-block w-100" alt="Imagen ' . ($index + 1) . '">';
                    echo '</div>';
                }
                
                echo '</div>';
                echo '<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">';
                echo '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
                echo '<span class="sr-only">Previous</span>';
                echo '</a>';
                echo '<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">';
                echo '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
                echo '<span class="sr-only">Next</span>';
                echo '</a>';
                echo '</div>';
            }
            echo '<div class="col-md-4">';
            echo '<h2>' . $productoSeleccionado['nombre'] . '</h2>';
            echo '<p>' . $productoSeleccionado['descripcion'] . '</p>';
            echo '<p> Gs. ' . $productoSeleccionado['precio'] . '</p>';
            echo '<a class="btn btn-success me-2 mt-1" href="https://api.whatsapp.com/send?phone=595984213977">Contactar al WhatsApp</a>';
            echo '<button class="btn btn-secondary agregar-al-carrito" data-id="' . $producto['id'] . '"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16"><path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/></svg></button>';
            echo '</div>';
            // Puedes agregar más detalles aquí
        } else {
            echo '<p>Producto no encontrado.</p>';
        }
        ?>
    </div>

    <?php
$categoriaActual = $productoSeleccionado['categoria'];

echo '<h3>Productos relacionados</h3>';
echo '<div class="container">';
echo '<div class="row">';

foreach ($productos as $producto) {
    // Verifica si el producto tiene la misma categoría que el actual
    if ($producto['categoria'] === $categoriaActual && $producto['id'] !== $id) {
        echo '<div class="col-md-3 mb-4">';
        echo '<div class="card">';
        echo '<img src="' . $producto['imagenes'][0] . '" class="card-img-top" alt="' . $producto['nombre'] . '">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $producto['nombre'] . '</h5>';
        echo '<p class="card-text">Gs. ' . $producto['precio'] . '</p>';
        echo '<a href="descripcion_producto.php?id=' . $producto['id'] . '" class="btn btn-primary btn-block me-2">Ver Producto</a>';
        echo '<button class="btn btn-primary btn-block agregar-al-carrito" data-id="' . $producto['id'] . '"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16"><path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/></svg></button>';
        echo '</div></div></div>';
    }
}

echo '</div> </div>';
?>


<footer class="bg-dark text-light">
        <div class="container">
            <div class="row justify-content-around align-items-center  pt-4 pb-2">
                <div class="col-md-2 me-5">
                <a class="text-black link-secondary " href="index.php"><img width=120px src="kevin/kevin/logo1.png" alt="" srcset=""></a>
                </div>
                <div class="col-md-3 ml-5">
                <ul class="list-unstyled">
                        <li><a class="nav-link btn m-2 p-1" href="#">Inicio</a></li>
                        <li><a class="nav-link btn m-2 p-1" href="#">Tienda</a></li>
                        <li><a class="nav-link btn m-2 p-1" href="#">Contáctanos</a></li>
                        <li><a class="nav-link btn m-2 p-1" href="#">Sobre Nosotros</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mr-5">
               <ul class="list-unstyled">
               <li>
                  <a class="btn  mb-2 mt-1" href="https://api.whatsapp.com/send?phone=595984213977">Visitanos en Facebook</a>
                </li>
               <li>
                  <a class="btn  mb-2 mt-1" href="https://api.whatsapp.com/send?phone=595984213977">Contactar al WhatsApp</a>
                </li>
                <li>
                  <a class="btn  mb-2 mt-1" href="https://api.whatsapp.com/send?phone=595984213977">Visitanos en Instagram</a>
                </li>
               </ul>
                </div>
          
            </div>
        </div>
    </footer>
    <div class="bg-dark bg-gradient text-white">
    &copy; 2023 DROP SNEACKERS.<br>
      Desarrollada por: <a class="link-secondary" href="">MauriWebs</a>
    </div>
    <!-- Incluye los archivos JavaScript de Bootstrap -->
    <script src="productos.json"></script>
    <script src="bootstrap-5.3.2-dist\node_modules\jquery\dist\jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/488435a96f.js" crossorigin="anonymous"></script>
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <script>
document.addEventListener('DOMContentLoaded', function () {
    const botonesAgregar = document.querySelectorAll('.agregar-al-carrito');
    botonesAgregar.forEach(function (boton) {
        boton.addEventListener('click', function (event) {
            event.preventDefault();
            const productoId = boton.getAttribute('data-id');
            const cantidad = 1; // Puedes cambiar esto para permitir que el usuario seleccione la cantidad
            agregarProductoAlCarrito(productoId, cantidad);
        });
    });

    function agregarProductoAlCarrito(productoId, cantidad) {
        fetch('carrito.php', {
            method: 'POST',
            body: new URLSearchParams({
                agregar: true,
                producto_id: productoId,
                cantidad: cantidad,
            }),
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
        })
        .then(function (response) {
            if (response.ok) {
                // Producto agregado al carrito con éxito
                alert('Producto agregado al carrito.');
            } else {
                // Error al agregar el producto al carrito
                alert('Hubo un error al agregar el producto al carrito.');
            }
        })
        .catch(function (error) {
            console.error('Error:', error);
        });
    }
});
</script>
</body>
</html>