<h1 class="text-center">Lista de usuarios</h1>

<div class="espacio"></div>
 
<table class="table">
 <thead>
   <th scope="col">Nombre</th>
   <th scope="col">Tipo</th>
   <th scope="col">Fecha registro</th>
   <th scope="col">Opción</th>
 </thead>
   <tbody>
        <?php if($usuarios): ?>
        <?php foreach($usuarios as $usuario): ?>
        <tr>
           <td><?php echo $usuario->nombre; ?></td>
           <td><?php echo $usuario->tipo; ?></td>
           <td><?php echo $usuario->fecha_registro; ?></td>
           <td><a href="<?php echo base_url('usuarios/editar/'.$usuario->id) ?>" class="btn btn-primary">Editar</a></td>
               <td>
              <form action="<?php echo base_url('usuarios/borrar/'.$usuario->id) ?>" method="post">
                <button class="btn btn-danger" type="submit">Borrar</button>
              </form>
          </td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
    
<div class="col text-center">
  <a href="<?php echo base_url('usuarios/agregar/') ?>" class="btn btn-primary">Agregar nuevo usuario</a>
</div>