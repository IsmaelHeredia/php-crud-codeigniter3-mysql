<div class="card card-primary ingreso">
    <div class="card-header bg-primary">Ingreso</div>
    <div class="card-body">
        <div class="card-block">
            <form method="POST" action="<?php echo base_url('ingreso/ingresar') ?>"  role="form">
                <legend>Datos</legend>
                <div class="form-group row" name="form-group-usuario">
                    <label>Usuario</label>
                    <input name="usuario" type="text" class="form-control" placeholder="Ingrese usuario" required="required"/>
                    <div class="invalid-feedback">
                        El usuario es requerido
                    </div>
                </div>
                <div class="form-group row" name="form-group-clave">
                    <label>Clave</label>
                    <input name="clave" type="password" class="form-control" placeholder="Ingrese clave" required="required"/>
                    <div class="invalid-feedback">
                        La clave es requerida
                    </div>
                </div>
                <div class="text-center">
                    <p class="lead">
                        <input type="submit"  value="Ingresar" class="btn btn-success">
                    </p>
                </div>             
            </form>
        </div>
    </div>
</div>