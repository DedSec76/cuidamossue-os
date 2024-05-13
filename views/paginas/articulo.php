<main class="contenedor seccion contenido-centrado">
        <h1><?php echo $articulo->titulo; ?></h1>
        
            <img loading="lazy" src="/imagenes/<?php echo $articulo->imagen; ?>" alt="imagen de la propiedad">
        
        <div class="resumen-propiedad">
            <p class="precio">s/. <?php echo $articulo->precio; ?></p>
            
            <p><?php echo $articulo->descripcion; ?></p>

            <a href="/contacto" class="boton-verde-block">Comprar Ahora</a>
        </div>
</main>