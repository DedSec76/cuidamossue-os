<main class="contenedor seccion">
        <h1>Contacto</h1>

        <?php if($mensaje) { ?>
                <p class='alerta exito'> <?php echo $mensaje; ?></p>;
        <?php } ?>

        <picture>
            <source srcset="build/img/contacto2.webp" type="image/webp"> 
            <source srcset="build/img/contacto2.jpg" type="image/jpeg">
            <img src="build/img/contacto2.jpg" alt="Imagen Contacto"> 
        </picture>

        <h2>Llene el formulario de Contacto</h2>

        <form class="formulario" action="/contacto" method="POST">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]">
                
                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="contacto[mensaje]" ></textarea>
            </fieldset>
            
            <fieldset>
                <legend>Contacto</legend>

                <p>Como desea ser Contactado:</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" >

                    <label for="contactar-email">E-mail</label>
                    <input type="radio" value="email" id="contactar-email" name="contacto[contacto]" >
                </div>
                <div id="contacto"></div>
            </fieldset>

            <input type="submit" value="enviar" class="boton-verde">
        </form>
    </main>