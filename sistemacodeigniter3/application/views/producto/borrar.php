<div class="jumbotron">
    <form method="post" role="form" id="productoForm" action="<?php echo base_url('productos/confirmar_borrar/'.$producto->id) ?>">
        <fieldset>
            <div class="text-center">
                <h1 class="display-3">Eliminacíon</h1>
                <p class="lead">¿Estás seguro que deseas eliminar el producto <?php echo $producto->nombre ?> ?</p>
                <p class="lead">
                    <button type="submit" name="borrar_producto" class="btn btn-danger boton-largo">Borrar</button>
                    <a href="<?php echo base_url('productos') ?>" class="btn btn-info boton-largo">Atrás</a>
                </p>
            </div>
        </fieldset>
    </form>
</div>