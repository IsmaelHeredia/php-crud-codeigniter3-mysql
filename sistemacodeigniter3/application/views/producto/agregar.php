<div class="card card-primary contenedor">
    <div class="card-header bg-primary">Agregar producto</div>
    <div class="card-body">
        <div class="card-block">
            <form method="POST" action="<?php echo base_url('productos/guardar') ?>"  role="form">
                <fieldset>
                    <legend class="text-center">Datos</legend>
                    <div class="form-group row" name="form-group-nombre">
                        <label>Nombre</label>
                        <input name="nombre" type="text" class="form-control" placeholder="Ingrese nombre" required="required"/>
                        <div class="invalid-feedback">
                            El nombre es requerido
                        </div>
                    </div>
                    <div class="form-group row" name="form-group-descripcion">
                        <label>Descripción</label>
                        <input name="descripcion" type="text" class="form-control" placeholder="Ingrese descripción" required="required"/>
                        <div class="invalid-feedback">
                            La descripción es requerida
                        </div>
                    </div>
                    <div class="form-group row" name="form-group-precio">
                        <label>Precio</label>
                        <input name="precio" type="text" class="form-control" placeholder="Ingrese precio" required="required"/>
                        <div class="invalid-feedback">
                            El precio es requerido
                        </div>
                    </div>
                    <div class="form-group row" name="form-group-proveedor">
                        <label>Proveedor</label>
                        <select name="id_proveedor" class="form-control" placeholder="Ingrese proveedor" required="required">
                            <?php foreach($proveedores as $proveedor): ?>
                                <option value="<?php echo $proveedor->id ?>"><?php echo $proveedor->nombre ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="text-center">
                        <p class="lead">
                            <input type="submit"  value="Guardar" class="btn btn-success">
                            <a href="<?php echo base_url('productos') ?>" class="btn btn-info">Atrás</a>
                        </p>
                    </div>
                </fieldset>
            </form> 
        </div>
    </div>
</div>