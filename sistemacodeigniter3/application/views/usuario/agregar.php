<div class="card card-primary contenedor">
    <div class="card-header bg-primary">Agregar usuario</div>
    <div class="card-body">
        <div class="card-block">
            <form method="POST" action="<?php echo base_url('usuarios/guardar') ?>"  role="form">
                <fieldset>
                    <legend class="text-center">Datos</legend>
                    <div class="form-group row" name="form-group-nombre">
                        <label>Nombre</label>
                        <input name="nombre" type="text" class="form-control" placeholder="Ingrese nombre" required="required"/>
                        <div class="invalid-feedback">
                            El nombre es requerido
                        </div>
                    </div>
                    <div class="form-group row" name="form-group-clave">
                        <label>Clave</label>
                        <input name="clave" type="password" class="form-control" placeholder="Ingrese clave" required="required"/>
                        <div class="invalid-feedback">
                            La clave es requerida
                        </div>
                    </div>
                    <div class="form-group row" name="form-group-tipo">
                        <label>Tipo</label>
                        <select name="id_tipo" class="form-control" placeholder="Ingrese tipo" required="required">
                            <?php foreach($tipos_usuario as $tipo): ?>
                                <option value="<?php echo $tipo->id ?>"><?php echo $tipo->nombre ?></option>
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