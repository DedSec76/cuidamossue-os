<?php

if (!isset($_SESSION)) {
    session_start();
}

$auth = $_SESSION['login'] ?? false;

?>

<main class="contenedor seccion">
<?php if($auth) : ?>
    <a href="/blogs/crear" class="boton boton-verde">Crear Nuevo Blog</a>
<?php endif; ?>
        <h2>Nuestros Blogs más Populares</h2>
    
    <?php
        include 'listado-blog.php';
    ?>

</main>