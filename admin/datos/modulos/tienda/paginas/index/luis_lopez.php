<?php
$base = Luis::basepage("base_page_admin");
$usuario = DatosUsuario::porId($_SESSION["admin_id"]);
$cantidad_de_ventas_hoy=DatosAdmin::contar_cantidad_de_ventas_en_el_dia_actual($usuario->sucursal);
$cantidad_de_gastos_hoy=DatosAdmin::contar_cantidad_de_gastos_en_el_dia_actual($usuario->sucursal);
$cantidad_de_cajas_open=DatosAdmin::cantidad_de_cajas_abiertos($usuario->sucursal);
$cantidad_de_categorias=DatosAdmin::cantidad_de_categorias();
$cantidad_de_productos_stock=DatosAdmin::cantidad_de_productos_stock($usuario->sucursal);
$cantidad_de_sucursales=DatosAdmin::cantidad_de_sucursales();
$cantidad_de_usuarios=DatosAdmin::cantidad_de_usuarios_r();
$cantidad_de_clientes=DatosAdmin::cantidad_de_clientes_r();
$cantidad_de_proveedores=DatosAdmin::cantidad_de_proveedores_r();
$cantidad_total_de_ventas=DatosAdmin::contar_cantidad_de_ventas_en_total($usuario->sucursal);
?>
<style type="text/css">
	.venta_pendiente_view_alert_box{display:block;margin:10px auto;padding:10px;background-color:rgba(243, 156, 18,0.40);color:rgba(230, 126, 34,1.0);border:2px solid rgba(243, 156, 18,1.0);}
	.button_venta_pendiente{border-radius:7px;cursor:pointer;padding:4px;display:inline-block;width:100%;max-width:150px;background:rgba(52, 152, 219,1.0);color:#fff;text-align:center;}
</style>
<div class="contenido">
	<?php $venta_pendiente = DatosAdmin::visualizar_venta_realtime($_SESSION['admin_id']);?>
	 <?php if(isset($venta_pendiente)): ?>
	 	<div class="venta_pendiente_view_alert_box">
		<span>Tienes una venta pendiente. <a class="button_venta_pendiente" href="<?=$base."ventas/vender";?>">Continuar venta.</a></span>
	</div>
	 <?php endif ?>
	<h3 class="titulospanel"><?=Luis::lang("inicio");?></h3>
	<div class="datos_pag">
		Welcome.
	</div>
	<h3 class="titulospanel">Funciones</h3>
	<div class="datos_pag">
	<div class="cubos cubs_tr">
		<a class="fotercubo_tr" href="<?=$base."ventas/vender";?>">
			<i class="icono__vender icon_respont"></i>
			<span class="realtime_update">Ventas hoy <?=$cantidad_de_ventas_hoy->c;?></span>
			<b>Vender</b>
		</a>
	</div>
	<div class="cubos cubs_tr">
		<a class="fotercubo_tr" href="<?=$base."gastos/add";?>">
			<i class="icono__gastos icon_respont"></i>
			<span class="realtime_update">Gastos hoy <?=$cantidad_de_gastos_hoy->c;?></span>
			<b>Gastos</b>
		</a>
	</div>
	<div class="cubos cubs_tr">
		<a class="fotercubo_tr" href="<?=$base."cajas/add";?>">
			<i class="icono__comision icon_respont"></i>
			<span class="realtime_update">Cajas abiertos <?=$cantidad_de_cajas_open->c;?></span>
			<b>Cajas</b>
		</a>
	</div>
	<div class="cubos cubs_tr">
		<a class="fotercubo_tr" href="<?=$base."devoluciones";?>">
			<i class="icono__devolucion icon_respont"></i>
			<span class="realtime_update">Devoluciones hoy 0</span>
			<b>Devolucion</b>
		</a>
	</div>
	<div class="cubos cubs_tr">
		<a class="fotercubo_tr" href="<?=$base."gastos/add";?>">
			<i class="icono__garantias icon_respont"></i>
			<span class="realtime_update">Garantias hoy 0</span>
			<b>Garantias</b>
		</a>
	</div>
	<div class="cubos cubs_tr">
		<a class="fotercubo_tr" href="<?=$base."gastos/add";?>">
			<i class="icono__malos icon_respont"></i>
			<span class="realtime_update">Malogrados hoy 0</span>
			<b>Malogrados</b>
		</a>
	</div>
	</div>
	<br>
	<h3 class="titulospanel">Tablero</h3>
	<div class="datos_pag">
	<div class="cubos productos_total_un">
		<div class="admin_titulo_tablero_index">Categorias</div>
		<b><?=$cantidad_de_categorias->c;?></b>
	</div>
	<div class="cubos productos_total_un">
		<div class="admin_titulo_tablero_index">Productos</div>
		<b><?=$cantidad_de_productos_stock->c;?></b>
	</div>
	<div class="cubos productos_total_un">
		<div class="admin_titulo_tablero_index">Sucursales</div>
		<b><?=$cantidad_de_sucursales->c;?></b>
	</div>
	<div class="cubos productos_total_un">
		<div class="admin_titulo_tablero_index">Usuarios</div>
		<b><?=$cantidad_de_usuarios->c;?></b>
	</div>
	<div class="cubos productos_total_un">
		<div class="admin_titulo_tablero_index">Clientes</div>
		<b><?=$cantidad_de_clientes->c;?></b>
	</div>
	<div class="cubos productos_total_un">
		<div class="admin_titulo_tablero_index">Proveedores</div>
		<b><?=$cantidad_de_proveedores->c;?></b>
	</div>
	</div>
	<br>
	<h3 class="titulospanel">Accesos directos</h3>
  <div class="datos_pag">
    	<a class="botonfunciones" href="<?=$base."productos/crear";?>">Agregar producto</a>
    	<a class="botonfunciones" href="<?=$base."usuarios/add";?>">Agregar usuario</a>
    	<a class="botonfunciones" href="<?=$base."sucursales/add";?>">Agregar sucursal</a>
    	<a class="botonfunciones" href="<?=$base."configurar_pagina";?>">Configuracion</a>
  </div>
    <br>
</div>