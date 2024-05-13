 <?php

    if (!isset($_SESSION)) {
        session_start();
    }

    $auth = $_SESSION['login'] ?? false;

    if (!isset($inicio)) {
        $inicio = false;
    }
    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Cuidamos tus Sueños</title>
     <link rel="stylesheet" href="../build/css/app.css">
 </head>

 <body>
     <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
         <div class="contenedor contenido-header">
             <div class="barra">
                 <a href="/">
                     ZerkaShop
                 </a>

                 <div class="mobile-menu">
                     <img src="/build/img/barras.svg" alt="icono menu responsive">
                 </div>

                 <div class="derecha">
                     <img class="dark-mode-boton" src="/build/img/dark-mode.svg">
                     <nav class="navegacion">
                         <a href="/nosotros">Nosotros</a>
                         <a href="/articulos">Novedades</a>
                         <a href="/blogs">Blogs</a>
                         <a href="/contacto">Contacto</a>
                         <?php if ($auth) : ?>
                             <a href="/logout">Cerrar Sesion</a>
                         <?php endif; ?>
                     </nav>
                 </div>

             </div> <!-- Barra -->

             <?php if ($inicio) { ?>
                 <div class="titulo">
                     <h1>Vendemos más que una Almohada Vendemos comodidad y Confort</h1>
                     <a href="/contacto" class="boton-verde">Contactar por WhatsApp</a>
                 </div>

             <?php } ?>
         </div>
     </header>

     <?php echo $contenido; ?>

     <footer class="footer seccion">
         <div class="contenedor contenedor-footer">
             <nav class="navegacion">
                 <a href="/nosotros">Nosotros</a>
                 <a href="/articulos">Novedades</a>
                 <a href="/blogs">Blogs</a>
                 <a href="/contacto">Contacto</a>
             </nav>
         </div>

         <p class="copyright">Todos los derechos Reservados <?php echo date('Y'); ?> &copy;</p>
     </footer>

     <script src="../build/js/bundle.min.js">
     </script>
 </body>

 </html>