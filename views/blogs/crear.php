<main class="contenedor seccion">
    <h1>Escribir Un Blog</h1>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <a href="/blogs" class="boton boton-verde">Volver</a>

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php'; ?>

        <input type="submit" value="Publicar Blog" class="boton boton-magenta">
    </form>
</main>