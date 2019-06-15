<script type="text/javascript">
	$(function () {
	    $('#grafico1').highcharts({
	        chart: {
	            type: 'bar'
	        },
	        title: {
	            text: 'Reporte de productos y sus precios'
	        },
	        xAxis: {
	            categories: <?php echo $textos_grafico1; ?>,
	            title: {
	            text: 'Productos'
	            }
	        },
	                
	        yAxis: {
	            min: 0,
	            title: {
	                text: 'Precios',
	                align: 'high'
	            },
	            labels: {
	                overflow: 'justify'
	            }
	        },
	        tooltip: {
	        useHTML: true,
	        formatter: function() {
	            return '<b>Precio : </b>$'+this.point.y;
	        }},
	        plotOptions: {
	        
	        series: {
	            dataLabels:{
	                //enabled:true,
	            },events: {
	                legendItemClick: function () {
	                        return false; 
	                }
	            }
	        }
	          },
	        legend: {
	            reversed: true
	        },
	        credits: {
	            enabled: false
	        },
	        series: [{
	        name:'Precios',
	        data: <?php echo $series_grafico1; ?>
			}]
	    });
	    $('#grafico2').highcharts({
	        chart: {
	            type: 'bar'
	        },
	        title: {
	            text: 'Reporte de cantidad de productos por proveedores'
	        },
	        xAxis: {
	            categories: <?php echo $textos_grafico2; ?>,
	            title: {
	            text: 'Empresas'
	            }
	        },
	                
	        yAxis: {
	            min: 0,
	            title: {
	                text: 'Productos',
	                align: 'high'
	            },
	            labels: {
	                overflow: 'justify'
	            }
	        },
	        tooltip: {
	        useHTML: true,
	        formatter: function() {
	            return '<b>Cantidad de productos : </b>'+this.point.y;
	        }},
	        plotOptions: {
	        
	        series: {
	            dataLabels:{
	                //enabled:true,
	            },events: {
	                legendItemClick: function () {
	                        return false; 
	                }
	            }
	        }
	          },
	        legend: {
	            reversed: true
	        },
	        credits: {
	            enabled: false
	        },
	        series: [{
	        name:'Productos',
	        data: <?php echo $series_grafico2; ?>
	    	}]
	    });
	});
</script> 

<h1 class="text-center">Estadísticas</h1>

<div class="doble-espacio"></div>

<div class="card card-primary contenedor">
	  <div class="card-header bg-primary">Productos encontrados : <?php echo $cantidad_productos; ?></div>
	  <div class="card-body">
	  	<div class="card-block">
		<?php if($productos): ?>
			<table class="table table-striped table-hover ">
			  <thead>
				<tr>
		            <th class="fila_listado_productos">Nombre</th>
		            <th class="fila_listado_productos">Descripción</th>
		            <th class="fila_listado_productos">Precio</th>
		            <th class="fila_listado_productos">Proveedor</th>
		            <th class="fila_listado_productos">Registro</th>
				</tr>
			  </thead>
			  <tbody>
		        
		        <?php foreach($productos as $producto): ?>
		        <tr>
		           <td><?php echo $producto->nombre; ?></td>
		           <td><?php echo $producto->descripcion; ?></td>
		           <td><?php echo $producto->precio; ?></td>
		           <td><?php echo $producto->proveedor; ?></td>
		           <td><?php echo $producto->fecha_registro; ?></td>
		        </tr>
		        <?php endforeach; ?>
			  </tbody>
			</table>					
		<?php else: ?>
			<center><b>No se encontraron productos</b></center>
		<?php endif; ?>	    
	    </div>
	  </div>
</div>

<div class="doble-espacio"></div>

<div class="card card-primary contenedor">
    <div class="card-header bg-primary">Gráfico 1</div>
    <div class="card-body">
		<div id="grafico1" style="width: 800px; height: 400px;"></div>
	</div>
</div>

<div class="doble-espacio"></div>

<div class="card card-primary contenedor">
    <div class="card-header bg-primary">Gráfico 2</div>
    <div class="card-body">
		<div id="grafico2" style="width: 800px; height: 400px;"></div>
	</div>
</div>