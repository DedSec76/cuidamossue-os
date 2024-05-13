<main class="contenedor seccion contenido-centrado">
        <h1><?php echo $blog->titulo; ?></h1>
        
            <img loading="lazy" src="/imagenes/<?php echo $blog->imagen; ?>" alt="imagen de la propiedad">
        
        <div class="resumen-propiedad">
            <p class="informacion-meta">Escrito el: <span> <?php echo $blog->fecha; ?> </span> Por:<span> <?php echo $blog->escritor; ?></span></p> 
            

            <p><?php echo $blog->descripcion; ?></p>


        </div>
</main>