<?php
$usuario = DatosUsuario::porId($_SESSION["admin_id"]);
$cartas_sucursal = DatosCarta::Contar_items_de_sucursal($usuario->sucursal,$usuario->id)->c;
?>
<div class="contenido">
	<h3 class="titulospanel">Tablero</h3>
	<div class="datos_pag">
	<div class="cubos productos_total_un">
		<div class="admin_titulo_tablero_index">Cartas</div>
		<b><?=$cartas_sucursal;?></b>
	</div>
	<div class="cubos productos_total_un">
		<div class="admin_titulo_tablero_index">Ingredientes</div>
		<b>0</b>
	</div>
	<div class="cubos productos_total_un">
		<div class="admin_titulo_tablero_index">Clientes</div>
		<b>0</b>
	</div>
	</div>
	<br>
	<h3 class="titulospanel">Acciones</h3>
	<div class="datos_pag">
	<div class="cubos cubs_to">
		<a class="fotercubo" href="admin/tiendas">
		<div class="admin_titulo_tablero_index">Sucursales</div>
		<b>0</b>
		</a>
	</div>
	<div class="cubos cubs_to">
		<a class="fotercubo">
		<div class="admin_titulo_tablero_index">Repartidores</div>
		<b>0</b>
		</a>
	</div>
	<div class="cubos cubs_to">
	<a class="fotercubo" href="admin/usuarios">
		<div class="admin_titulo_tablero_index">Cajeros</div>
		<b>0</b>
	</a>
	</div>
	</div>
	<br>
	<h3 class="titulospanel">Accesos directos</h3>
  <div class="datos_pag">
    	<a class="botonfunciones" href="<?="admin/slider";?>">Agregar carta</a>
    	<a class="botonfunciones" href="<?="admin/slider";?>">Agregar ingrediente</a>
    	<a class="botonfunciones" href="<?="admin/slider";?>">Agregar usuario</a>
    	<a class="botonfunciones" href="<?="admin/slider";?>">Agregar repartidor</a>
  </div>
  <br>
    <h3 class="titulospanel">Funciones</h3>
  <div class="datos_pag">
    	<a class="botonfunciones" href="admin/personalizar_pagina">Personalizar pagina</a>
    	<a class="botonfunciones" href="admin/configuracion">Configuracion</a>
    </div>
    <br>
</div>