<main class="contenedor seccion">
        <h1>Administrador de Articulos</h1>
        
        <?php 
            if($resultado) {
                $mensaje = mostrarNotificacion( intval($resultado) );
                if($mensaje) { ?>
                    <p class="alerta exito"><?php echo s($mensaje) ?></p>
                <?php } 
                } 
        ?>

        <a href="/articulos/crear" class="boton boton-verde">Nuevo Articulo</a>
        <a href="/vendedores/crear" class="boton boton-amarillo">Nuevo Vendedor</a>    

        <h2>Articulos</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!-- Mostrar los resultados-->
                <?php foreach ( $articulos as $articulo ) : ?>
                <tr>
                    <td><?php echo $articulo->id; ?> </td>
                    <td><?php echo $articulo->titulo; ?></td>
                    <td><img src="/imagenes/<?php echo $articulo->imagen; ?>" alt="" class="imagen-tabla"> </td>
                    <td>s/. <?php echo $articulo->precio; ?></td>
                    <td>
                        <form method="POST" class="w-100" action="/articulos/eliminar">
                            <input type="hidden" name="id" value="<?php echo $articulo->id; ?> ">
                            <input type="hidden" name="tipo" value="articulo">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        
                        <a href="/articulos/actualizar?id=<?php echo $articulo->id; ?>" 
                        class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Vendedores</h2>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Tefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!-- Mostrar los resultados-->
                <?php foreach ( $vendedores as $vendedor ) : ?>
                <tr>
                    <td><?php echo $vendedor->id; ?> </td>
                    <td><?php echo $vendedor->nombre . " " . $vendedor->apellido; ?></td>
                    <td><?php echo $vendedor->telefono; ?></td>
                    <td>
                        <form method="POST" class="w-100" action="/vendedores/eliminar">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id; ?> ">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="vendedores/actualizar?id=<?php echo $vendedor->id; ?>" 
                        class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</main>