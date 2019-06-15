<div class="jumbotron">
    <form method="post" role="form" id="proveedorForm" action="<?php echo base_url('proveedores/confirmar_borrar/'.$proveedor->id) ?>">
        <fieldset>
            <div class="text-center">
                <h1 class="display-3">Eliminacíon</h1>
                <p class="lead">¿Estás seguro que deseas eliminar al proveedor <?php echo $proveedor->nombre ?> ?</p>
                <p class="lead">
                    <button type="submit" name="borrar_proveedor" class="btn btn-danger boton-largo">Borrar</button>
                    <a href="<?php echo base_url('proveedores') ?>" class="btn btn-info boton-largo">Atrás</a>
                </p>
            </div>
        </fieldset>
    </form>
</div>