<div class="card card-primary contenedor">
    <div class="card-header bg-primary">Editando el producto <?php echo $producto->nombre ?></div>
    <div class="card-body">
        <div class="card-block">
            <form method="POST" action="<?php echo base_url('productos/actualizar/'.$producto->id) ?>"  role="form">
                <fieldset>
                    <legend class="text-center">Datos</legend>
                    <div class="form-group row" name="form-group-nombre">
                        <label>Nombre</label>
                        <input name="nombre" type="text" class="form-control" placeholder="Ingrese nombre" value="<?php echo $producto->nombre; ?>" required="required"/>
                        <div class="invalid-feedback">
                            El nombre es requerido
                        </div>
                    </div>
                    <div class="form-group row" name="form-group-descripcion">
                        <label>Descripción</label>
                        <input name="descripcion" type="text" class="form-control" placeholder="Ingrese descripción" value="<?php echo $producto->descripcion; ?>" required="required"/>
                        <div class="invalid-feedback">
                            La descripción es requerida
                        </div>
                    </div>
                    <div class="form-group row" name="form-group-precio">
                        <label>Precio</label>
                        <input name="precio" type="text" class="form-control" placeholder="Ingrese precio" value="<?php echo $producto->precio; ?>" required="required"/>
                        <div class="invalid-feedback">
                            El precio es requerido
                        </div>
                    </div>
                    <div class="form-group row" name="form-group-proveedor">
                        <label>Proveedor</label>
                        <select name="id_proveedor" type="text" class="form-control" placeholder="Ingrese proveedor" required="required">
                            <?php foreach($proveedores as $proveedor): ?>
                                <?php if ($proveedor->id == $producto->id_proveedor) { ?>
                                    <option value="<?php echo $proveedor->id ?>" selected="selected"><?php echo $proveedor->nombre ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $proveedor->id ?>"><?php echo $proveedor->nombre ?></option>                         
                                <?php } ?>
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