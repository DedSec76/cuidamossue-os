<fieldset>
            <legend>Informacion General</legend>

            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" name="articulo[titulo]" placeholder="Titulo Articulo" value="<?php echo s( $articulo->titulo ); ?>">

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="articulo[precio]" placeholder="Precio del Articulo" value="<?php echo s ( $articulo->precio ); ?>">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png" name="articulo[imagen]">

            <?php if($articulo->imagen){ ?>
                <img src="/imagenes/<?php echo $articulo->imagen; ?>" class="imagen-small">
            <?php } ?>

            <label for="descripcion">Descripcion:</label>
            <textarea id="descripcion" name="articulo[descripcion]"><?php echo s( $articulo->descripcion ); ?></textarea>
        </fieldset>

    <!---    <fieldset>
            <legend>Informacion Propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" name="propiedad[habitaciones]" placeholder="Ej: 3" min="1" max="9" value="<?php //echo s( $propiedad->habitaciones ); ?>">

            <label for="wc">Baños:</label>
            <input type="number" id="wc" name="propiedad[wc]" placeholder="Ej: 3" min="1" max="9" value="<?php //echo s($propiedad->wc); ?>">

            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" id="estacionamiento" name="propiedad[estacionamiento]" placeholder="Ej: 3" min="1" max="9" value="<?php //echo s($propiedad->estacionamiento); ?>">
        </fieldset> --->

        <fieldset>
            <legend>Vendedor</legend>
            
            <label for="vendedor">Vendedor</label>
            <select name="articulo[vendedores_id]" id="vendedor">
                <option selected value="">-- Seleccione --</option>
                <?php foreach($vendedores as $vendedor){ ?>
                    <option 
                    <?php echo $articulo->vendedores_id === $vendedor->id ? 'selected' : ''; ?>
                    value="<?php echo s($vendedor->id); ?>">
                    <?php echo s($vendedor->nombre) . " " .s($vendedor->apellido); ?>
                    </option>
                <?php } ?>
            </select>
        </fieldset>

       