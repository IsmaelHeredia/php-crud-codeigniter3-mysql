<div class="card card-primary contenedor">
    <div class="card-header bg-primary">Editando el usuario <?php echo $usuario->nombre ?></div>
    <div class="card-body">
        <div class="card-block">
            <form method="POST" action="<?php echo base_url('usuarios/actualizar/'.$usuario->id) ?>"  role="form">
                <fieldset>
                    <legend class="text-center">Datos</legend>
                    <div class="form-group row" name="form-group-nombre">
                        <label>Nombre</label>
                        <input name="nombre" type="text" class="form-control" placeholder="Ingrese nombre" value="<?php echo $usuario->nombre; ?>" readonly="readonly"/>
                        <div class="invalid-feedback">
                            El nombre es requerido
                        </div>
                    </div>
                    <div class="form-group row" name="form-group-clave">
                        <label>Clave</label>
                        <input name="precio" type="text" class="form-control" placeholder="Ingrese clave" readonly="readonly"/>
                    </div>
                    <div class="form-group row" name="form-group-tipo">
                        <label>Tipo</label>
                        <select name="id_tipo" type="text" class="form-control" placeholder="Ingrese tipo" required="required">
                            <?php foreach($tipos_usuario as $tipo): ?>
                                <?php if ($tipo->id == $usuario->id_tipo) { ?>
                                    <option value="<?php echo $tipo->id ?>" selected="selected"><?php echo $tipo->nombre ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $tipo->id ?>"><?php echo $tipo->nombre ?></option>                         
                                <?php } ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="text-center">
                        <p class="lead">
                            <input type="submit"  value="Guardar" class="btn btn-success">
                            <a href="<?php echo base_url('usuarios') ?>" class="btn btn-info">Atrás</a>
                        </p>
                    </div>
                </fieldset>
            </form> 
        </div>
    </div>
</div>