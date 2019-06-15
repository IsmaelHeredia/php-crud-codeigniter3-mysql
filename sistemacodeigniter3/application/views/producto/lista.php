<h1 class="text-center">Lista de productos</h1>

<div class="espacio"></div>
 
<table class="table">
 <thead>
   <th scope="col">Nombre</th>
   <th scope="col">Descripción</th>
   <th scope="col">Precio</th>
   <th scope="col">Proveedor</th>
   <th scope="col">Fecha registro</th>
   <th scope="col">Opción</th>
 </thead>
   <tbody>
        <?php if($productos): ?>
        <?php foreach($productos as $producto): ?>
        <tr>
           <td><?php echo $producto->nombre; ?></td>
           <td><?php echo $producto->descripcion; ?></td>
           <td>$<?php echo $producto->precio; ?></td>
           <td><?php echo $producto->proveedor; ?></td>
           <td><?php echo $producto->fecha_registro; ?></td>
           <td><a href="<?php echo base_url('productos/editar/'.$producto->id) ?>" class="btn btn-primary">Editar</a></td>
               <td>
              <form action="<?php echo base_url('productos/borrar/'.$producto->id) ?>" method="post">
                <button class="btn btn-danger" type="submit">Borrar</button>
              </form>
          </td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
    
<div class="col text-center">
  <a href="<?php echo base_url('productos/agregar/') ?>" class="btn btn-primary">Agregar nuevo producto</a>
</div>