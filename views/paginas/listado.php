<div class="contenedor-anuncios">
    <?php foreach($articulos as $articulo) { ?>
    <div class="anuncio">
        
        <img loading="lazy" src="/imagenes/<?php echo $articulo->imagen; ?>" alt="anuncio">
        
        <div class="contenido-anuncio">
            <p class="precio">s/. <?php echo $articulo->precio; ?></p>
            <h3><?php echo $articulo->titulo; ?></h3>
            <p><?php echo $articulo->descripcion; ?></p>
            

           <!--- <ul class="iconos-caracteristicas"> -->
             <!---   <li> -->
                 <!---    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc"> -->
                    <!--- <p><?php //echo $propiedad->wc; ?></p> --->
               <!--- </li> --->
              <!---  <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <!-- <p><?php //echo $propiedad->estacionamiento; ?></p> -->
               <!---  </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <!---<p><?php //echo $propiedad->habitaciones; ?></p> -->
               <!-- </li>
           <!-- </ul> -->

            <a href="/articulo?id=<?php echo $articulo->id; ?>" class="boton-amarillo-block">
                Más Información
            </a>
        </div> <!--.contenido-anuncio-->
    </div> <!--anuncio-->
    <?php } ?>
</div><!-- .contenedor-anuncio-->