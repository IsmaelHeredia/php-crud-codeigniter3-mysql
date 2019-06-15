<div class="card card-primary contenedor">
    <div class="card-header bg-primary">Cambiar usuario</div>
    <div class="card-body">
        <div class="card-block">
            <form method="POST" action="<?php echo base_url('cuenta/actualizarUsuario/'.$usuario->id) ?>"  role="form">
                <fieldset>
                    <legend class="text-center">Datos</legend>
                    <div class="form-group row" name="form-group-nombre">
                        <label>Usuario</label>
                        <input name="usuario" type="text" class="form-control" placeholder="Ingrese usuario" value="<?php echo $usuario->nombre; ?>" readonly="readonly"/>
                        <div class="invalid-feedback">
                            El usuario es requerido
                        </div>
                    </div>
                    <div class="form-group row" name="form-group-nuevo-usuario">
                        <label>Nuevo usuario</label>
                        <input name="nuevo_usuario" type="text" class="form-control" placeholder="Ingrese nuevo usuario"/>
                        <div class="invalid-feedback">
                            El nuevo usuario es requerido
                        </div>
                    </div>
                    <div class="form-group row" name="form-group-clave">
                        <label>Clave</label>
                        <input name="clave" type="password" class="form-control" placeholder="Ingrese clave"/>
                    </div>
                    <div class="text-center">
                        <p class="lead">
                            <input type="submit"  value="Guardar" class="btn btn-success">
                        </p>
                    </div>
                </fieldset>
            </form> 
        </div>
    </div>
</div>