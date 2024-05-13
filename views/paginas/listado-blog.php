<article class="entrada-blog">
    <?php foreach($blogs as $blog) { ?>
    <div class="imagen">
        <picture>
            <source srcset="/imagenes/<?php echo $blog->imagen; ?>" type="image/webp">
            <source srcset="/imagenes/<?php echo $blog->imagen; ?>" type="image/jpeg">
            <img loading="lazy" src="/imagenes/<?php echo $blog->imagen; ?>" alt="Texto Entrada Blog">
        </picture>
    </div>

    <div class="texto-entrada">
        <a href="/blog?id=<?php echo $blog->id; ?>">
            <h4><?php echo $blog->titulo; ?></h4>
            <p>Escrito el:  <span><?php echo $blog->fecha; ?></span>  Por: <span><?php echo $blog->escritor; ?></span></p>

            <p><?php echo $blog->descripcion; ?></p>
        </a>
        <a href="/blog?id=<?php echo $blog->id; ?>" class="boton-amarillo-block">
            Más Información
        </a>
    </div>
    <?php } ?>
</article>