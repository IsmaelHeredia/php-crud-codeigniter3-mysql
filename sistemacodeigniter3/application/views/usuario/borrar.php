<div class="jumbotron">
    <form method="post" role="form" id="usuarioForm" action="<?php echo base_url('usuarios/confirmar_borrar/'.$usuario->id) ?>">
        <fieldset>
            <div class="text-center">
                <h1 class="display-3">Eliminacíon</h1>
                <p class="lead">¿Estás seguro que deseas eliminar el usuario <?php echo $usuario->nombre ?> ?</p>
                <p class="lead">
                    <button type="submit" name="borrar_usuario" class="btn btn-danger boton-largo">Borrar</button>
                    <a href="<?php echo base_url('usuarios') ?>" class="btn btn-info boton-largo">Atrás</a>
                </p>
            </div>
        </fieldset>
    </form>
</div>