<?php $nombre_pagina = Luis::dato("luis_nombre")->valor;$base=Luis::basepage("base_page"); ?>
<footer class="footer_">
	<div class="der_pagina_footer">
		<span><?=$nombre_pagina;?></span>
	</div>
	<div class="cor_page_luis"><small>&copy;<?=date("Y"); ?> <?=html_entity_decode($nombre_pagina);?></small> </div>
	<div class="system_curl_v_box_conten_lui">
		<a class="subs_conten_luis_menu_system menupagecurrent" aria-label="inicio" role="link" href="<?=$base;?>">
			<svg id="inicio" viewBox="0 0 24 24" width="40" height="40">
				<path d="M23.121,9.069,15.536,1.483a5.008,5.008,0,0,0-7.072,0L.879,9.069A2.978,2.978,0,0,0,0,11.19v9.817a3,3,0,0,0,3,3H21a3,3,0,0,0,3-3V11.19A2.978,2.978,0,0,0,23.121,9.069ZM15,22.007H9V18.073a3,3,0,0,1,6,0Zm7-1a1,1,0,0,1-1,1H17V18.073a5,5,0,0,0-10,0v3.934H3a1,1,0,0,1-1-1V11.19a1.008,1.008,0,0,1,.293-.707L9.878,2.9a3.008,3.008,0,0,1,4.244,0l7.585,7.586A1.008,1.008,0,0,1,22,11.19Z"/>
			</svg>
		</a>
		<a class="subs_conten_luis_menu_system menupagecurrent" aria-label="perfil" role="link" href="<?=$base."perfil";?>">
			<svg id="usuario" viewBox="0 0 24 24" width="40" height="40">
				<path d="M12,12A6,6,0,1,0,6,6,6.006,6.006,0,0,0,12,12ZM12,2A4,4,0,1,1,8,6,4,4,0,0,1,12,2Z"/>
				<path d="M12,14a9.01,9.01,0,0,0-9,9,1,1,0,0,0,2,0,7,7,0,0,1,14,0,1,1,0,0,0,2,0A9.01,9.01,0,0,0,12,14Z"/>
			</svg>
		</a>

		<a class="subs_conten_luis_menu_system menupagecurrent" aria-label="carrito" role="link" href="<?=$base."carrito";?>">
			<svg id="carrito" viewBox="0 0 24 24" width="40" height="40">
				<path d="M21,6H18A6,6,0,0,0,6,6H3A3,3,0,0,0,0,9V19a5.006,5.006,0,0,0,5,5H19a5.006,5.006,0,0,0,5-5V9A3,3,0,0,0,21,6ZM12,2a4,4,0,0,1,4,4H8A4,4,0,0,1,12,2ZM22,19a3,3,0,0,1-3,3H5a3,3,0,0,1-3-3V9A1,1,0,0,1,3,8H6v2a1,1,0,0,0,2,0V8h8v2a1,1,0,0,0,2,0V8h3a1,1,0,0,1,1,1Z"/>
			</svg>
		</a>

		<a class="subs_conten_luis_menu_system menupagecurrent" aria-label="menulk" role="link" href="<?=$base."menulk";?>">
			<svg id="contenido_menus_data_mov" viewBox="0 0 512 512" width="40" height="40">
				<path d="M480,224H32c-17.673,0-32,14.327-32,32s14.327,32,32,32h448c17.673,0,32-14.327,32-32S497.673,224,480,224z"/>
				<path d="M32,138.667h448c17.673,0,32-14.327,32-32s-14.327-32-32-32H32c-17.673,0-32,14.327-32,32S14.327,138.667,32,138.667z"/>
				<path d="M480,373.333H32c-17.673,0-32,14.327-32,32s14.327,32,32,32h448c17.673,0,32-14.327,32-32S497.673,373.333,480,373.333z"/>
			</svg>
		</a>
	</div>
</footer>