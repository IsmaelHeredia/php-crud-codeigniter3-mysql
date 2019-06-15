<h1 class="text-center">Lista de proveedores</h1>

<div class="espacio"></div>
 
<table class="table">
 <thead>
   <th scope="col">Nombre</th>
   <th scope="col">Dirección</th>
   <th scope="col">Teléfono</th>
   <th scope="col">Fecha registro</th>
   <th scope="col">Opción</th>
 </thead>
   <tbody>
        <?php if($proveedores): ?>
        <?php foreach($proveedores as $proveedor): ?>
        <tr>
           <td><?php echo $proveedor->nombre; ?></td>
           <td><?php echo $proveedor->direccion; ?></td>
           <td><?php echo $proveedor->telefono; ?></td>
           <td><?php echo $proveedor->fecha_registro; ?></td>
           <td><a href="<?php echo base_url('proveedores/editar/'.$proveedor->id) ?>" class="btn btn-primary">Editar</a></td>
               <td>
              <form action="<?php echo base_url('proveedores/borrar/'.$proveedor->id) ?>" method="post">
                <button class="btn btn-danger" type="submit">Borrar</button>
              </form>
          </td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
    
<div class="col text-center">
  <a href="<?php echo base_url('proveedores/agregar/') ?>" class="btn btn-primary">Agregar nuevo proveedor</a>
</div>