<fieldset>
            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" name="blog[titulo]" placeholder="Añade un Titulo" value="<?php echo s( $blog->titulo ); ?>">

            <label for="descripcion">Descripcion:</label>
            <textarea id="descripcion" name="blog[descripcion]"><?php echo s( $blog->descripcion ); ?></textarea>

            <label for="escritor">Tu Nombre:</label>
            <input type="text" id="escritor" name="blog[escritor]" placeholder="Escribe tu Nombre" value="<?php echo s( $blog->escritor ); ?>">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png" name="blog[imagen]">

            <?php if($blog->imagen){ ?>
                <img src="/imagenes/<?php echo $articulo->imagen; ?>" class="imagen-small">
            <?php } ?>
</fieldset>
