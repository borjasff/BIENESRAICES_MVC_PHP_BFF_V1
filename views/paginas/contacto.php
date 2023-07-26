<main class="contenedor seccion">
<h1>Contacto</h1>

<?php 
if($mensaje){ ?>
    <p class='alerta exito'><?php echo $mensaje; ?></p>;

<?php } ?>

<picture>
    <source srcset="build/img/destacada3.webp" type="image/webp">
    <source srcset="build/img/destacada3.jpg" type="image/jpg">
    <img loading="lazy" src="build/img/destacada3.jpg" alt="imagen Contacto">
</picture>
<h2>Formulario de contacto</h2>
<form class="formulario" action="/contacto" method="POST">
    <fieldset>
        <legend>Información Personal</legend>
        <label for="nombre">Nombre</label>
        <input type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]" required>

        <label for="mensaje">Mensaje:</label>
        <textarea id="mensaje" name="contacto[mensaje]" require></textarea>
    </fieldset>
    <fieldset>
        <legend>Información sobre la propiedad</legend>
        <label for="opciones">Vender o comprar:</label>
        <select id="opciones" name="contacto[tipo]" required>
            <option disabled selected>--Seleccione--</option>
            <option value="compra">Comprar</option>
            <option value="vende">Vender</option>
        </select>
        <label for="presupuesto">Presupuesto</label>
        <input type="number" placeholder="Tu presupuesto" id="presupuesto" name="contacto[precio]" required>
    </fieldset>

    <fieldset>
        <legend>Información sobre la propiedad</legend>
        <p>Como desea ser contactado</p>
        <div class="forma-contacto">
            <label for="contactar-telefono">Teléfono</label>
            <input type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" required>
            <label for="contactar-email">E-mail</label>
            <input type="radio" value="email" id="contactar-email" name="contacto[contacto]" required>
        </div>

        <div id="contacto"></div>


    </fieldset>
    <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>