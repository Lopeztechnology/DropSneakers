<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="kevin/Kevin/Logo1.png" type="image/x-icon">
    <title>Drop Sneakers</title>
    <!-- Incluye los archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <?php
    session_start();
    ?>
<style>
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
  .btn-success{
    background-color: green;
  }
  .btn-ig{
    background-color: #8827a0;
  }
  .btn-fb{
    background-color: #373fb6;
  }
  .bg-img-pe{
    background-image: url("Diseño sin título (13).png") ;
    border-radius:8px;
  }
  .bg-img-tr{
    background-color: rgba(19, 19, 19, 0.4) ;
  }
  .bg-hea-tr{
    background-color: rgba(200, 200, 200, 1);
  }
  .bg-hea-tr:hover{
    background-color: rgba(100, 100, 100, 1);
  }
  .carrr{
    border-radius:28px;
  }
  @media (min-width: 772px) { 
            .cel{
              display:none;
            }
}
@media (max-width: 772px) { 
            .pc{
              display:none;
            }
}
</style>

</head>
<body class="text-center">
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
          <div class="navbar-fixed-bottom mb-1">
          <?php
// Verificar si el usuario ya ha iniciado sesión
if (isset($_SESSION['user_id'])) {
    // Si el usuario está logueado, mostrar el botón de cerrar sesión
    echo '<a class="btn text-white" href="cerrar_sesion.php">Cerrar Sesión</a>';
} else {
    // Si el usuario no está logueado, mostrar los botones de inicio de sesión y registro
    echo '<a class="btn text-white" href="login.php">Iniciar Sesión</a><br>';
    echo '<a class="btn text-white mt-2" href="registro.php">Registrarse</a>';
}
?>
        </div>
          </div>
        </div>
      </nav>
      </div>

      <img src="Diseño sin título (20).png" class=" pc w-100 " height="550" alt="...">      
      <img src="Diseño sin título (21).png" class=" cel w-100 " height="550" alt="...">
  

                <div class="container mt-5">
                    <h2 class="mb-4">Productos Destacados</h2>
                    <div class="row">
                        <?php
                  // Carga los datos del archivo JSON
                  $json = file_get_contents('productos.json');
                  $productos = json_decode($json, true);

                  // Itera a través de los productos y genera el HTML
                  foreach ($productos as $producto) {
                      if ($producto['categoria'] === 'productos-destacados') {
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
                  ?>

                    </div>
                </div>
    

                <!-- Sección de Calzado Deportivo -->
              <div class="container mt-5">
                  <h2>Calzado Deportivo</h2>
                  <div class="row">
                      <?php
                      foreach ($productos as $producto) {
                          if ($producto['categoria'] === 'calzado-deportivo') {
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
                      ?>
                  </div>
              </div>

  <!-- Sección de Calzado-vestir -->
  <div class="container mt-5">
                  <h2>Calzado de Vestir</h2>
                  <div class="row">
                      <?php
                      foreach ($productos as $producto) {
                          if ($producto['categoria'] === 'calzado-vestir') {
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
                      ?>
                  </div>
              </div>


              <div class="row justify-content-center">
  <div class="col-md-5 ">
  <section>
        <div id="carouselExampleControlss" class="carousel slide " data-bs-ride="carousel">
            <div class="carousel-inner carrr">
              <div class="carousel-item active">
                <img src="Diseño sin título (15).png" class="d-block w-100" height="300"  alt="...">
              </div>
              <div class="carousel-item">
                <img src="Diseño sin título (16).png" class="d-block w-100" height="300" alt="...">
              </div>
              <div class="carousel-item">
                <img src="Diseño sin título (17).png" class="d-block w-100" height="300" alt="...">
              </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlss" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlss" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </section>  
  </div>
  <div class="col-md-5">
  <section>
        <div id="carouselExampleControlsss" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner carrr">
              <div class="carousel-item active">
                <img src="Diseño sin título (12).png" class="d-block w-100" height="300"  alt="...">
              </div>
              <div class="carousel-item">
                <img src="Diseño sin título (13).png" class="d-block w-100" height="300" alt="...">
              </div>
              <div class="carousel-item">
                <img src="Diseño sin título (14).png" class="d-block w-100" height="300" alt="...">
              </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsss" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsss" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </section>  
  </div>
</div>
<!-- Formulario de contacto mejorado y centrado -->
<div class="container mt-5 mb-4 bg-img-pe p-5">
    <div class="row justify-content-between align-items-center p-2">
        <div class="col-md-6 ">
            <h2 class="mb-4 text-white">¡Contáctanos!</h2>
            <form>
                <div class="form-group m-3">
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                </div>
                <div class="form-group m-3">
                    <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo Electrónico" required>
                </div>
                <div class="form-group m-3">
                    <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Número de Teléfono">
                </div>
                <div class="form-group m-3">
                    <textarea class="form-control" id="mensaje" name="mensaje" rows="4" placeholder="Mensaje" required></textarea>
                </div>
                <button type="submit" class="btn btn-dark border btn-block mb-1">Enviar Mensaje</button>
            </form>
        </div>
    
        <div class="col-md-6 text-center bg-img-tr text-white pt-4 pb-4">
            <h4 class="mb-3">Información de Contacto</h4>
            <ul class="list-unstyled">
                <li><strong>Correo Electrónico:</strong></li>
                <li>info@mitienda.com</li>
                <li><strong>Teléfono:</strong></li>
                <li>+123-456-7890</li>
            </ul>
            <h4 class="mb-3 d-block">Síguenos</h4>
            <div class="row">
            <a href="#" class=" mr-3 nav-link"><i class="fab fa-facebook-f fa-lg"></i> Drop Sneakers</a>
            <a href="#" class="mt-2 mr-3 nav-link"><i class="fab fa-whatsapp fa-lg"></i> 0988 888 888</a>
            <a href="#" class="mt-2 mr-3 nav-link"><i class="fab fa-instagram fa-lg"></i> drop_sneakers</a>
        </div></div>
    </div>
</div>




        <!-- Footer con Bootstrap -->
        <footer class="bg-dark text-light">
        <div class="container">
            <div class="row justify-content-around align-items-center  pt-5 pb-4">
                <div class="col-md-2 ">
                <a class="text-black link-secondary " href="index.php"><img width=120px src="kevin/kevin/logo1.png" alt="" srcset=""></a>
                </div>
                <div class="col-md-3 mr-5">
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
                <div class="col-md-3">
                    
                    <ul class="list-unstyled">
                    
                    <?php
// Verificar si el usuario ya ha iniciado sesión
if (isset($_SESSION['user_id'])) {
    // Si el usuario está logueado, mostrar el botón de cerrar sesión
    echo '<a class="btn text-white" href="cerrar_sesion.php">Cerrar Sesión</a>';
} else {
    // Si el usuario no está logueado, mostrar los botones de inicio de sesión y registro
    echo '<a class="btn text-white" href="login.php">Iniciar Sesión</a><br>';
    echo '<a class="btn text-white mt-2" href="registro.php">Registrarse</a>';
}
?>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Incluye los archivos JavaScript de Bootstrap -->
    <script src="productos.json"></script>
    <script src="bootstrap-5.3.2-dist\node_modules\jquery\dist\jquery.min.js"></script>
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
