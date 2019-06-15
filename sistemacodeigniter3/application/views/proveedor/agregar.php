<div class="card card-primary contenedor">
    <div class="card-header bg-primary">Agregar proveedor</div>
    <div class="card-body">
        <div class="card-block">
            <form method="POST" action="<?php echo base_url('proveedores/guardar') ?>"  role="form">
                <fieldset>
                    <legend class="text-center">Datos</legend>
                    <div class="form-group row" name="form-group-nombre">
                        <label>Nombre</label>
                        <input name="nombre" type="text" class="form-control" placeholder="Ingrese nombre" required="required"/>
                        <div class="invalid-feedback">
                            El nombre es requerido
                        </div>
                    </div>
                    <div class="form-group row" name="form-group-direccion">
                        <label>Dirección</label>
                        <input name="direccion" type="text" class="form-control" placeholder="Ingrese dirección" required="required"/>
                        <div class="invalid-feedback">
                            La dirección es requerida
                        </div>
                    </div>
                    <div class="form-group row" name="form-group-telefono">
                        <label>Teléfono</label>
                        <input name="telefono" type="text" class="form-control" placeholder="Ingrese teléfono" required="required"/>
                        <div class="invalid-feedback">
                            El teléfono es requerido
                        </div>
                    </div>
                    <div class="text-center">
                        <p class="lead">
                            <input type="submit"  value="Guardar" class="btn btn-success">
                            <a href="<?php echo base_url('proveedores') ?>" class="btn btn-info">Atrás</a>
                        </p>
                    </div>
                </fieldset>
            </form> 
        </div>
    </div>
</div>