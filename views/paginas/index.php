<!-- <?php //include '../../includes/templates/header.php; '; ?> -->

<main class="contenedor seccion">
    <h1>Más Sobre Nosotros</h1>

    <?php include 'iconos.php'; ?>
</main>

<section class="seccion contenedor">
    <h2>Articulos</h2>

    <?php
    include 'listado.php';
    ?>


    <div class="alinear-derecha">
        <a href="/articulos" class="boton-magenta">Ver Más Articulos</a>
    </div>
</section>

<section class="imagen-contacto">
    <h2>No esperes más para dormir comodamente</h2>
    <p>Dá click en el siguiente Botón para obtener más información</p>
    <a href="/contacto" class="boton-verde">Contactar por WhatsApp</a>
</section>

<!---  Inicio de la parte inferior -->
<div class="contenedor seccion seccion-inferior">
    <section class="blog">
        <h3>Nuestro Blog</h3>
        <?php
        include 'listado-blog.php';
        ?>
    </section>

    <section class="testimoniales">
        <h3>Testimoniales</h3>

        <div class="testimonial">
            <blockquote>El personal se comportó a la altura de su profesionalismo, muy buena atención. El producto llego antes de lo pensado y en buen estado 100% recomendable.</blockquote>
            <p>- Jimena Olimpia Veracruz</p>
        </div>
    </section>
</div>
<!---  Fin de la parte inferior -->