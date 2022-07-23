<?php $nombre_pagina = Luis::dato("luis_nombre")->valor; ?>
<footer class="footer_">
	<div class="der_pagina_footer">
		<span><?=$nombre_pagina;?>hello</span>
	</div>
	<div class="cor_page_luis"><small>&copy;<?=date("Y"); ?> <?=html_entity_decode($nombre_pagina);?></small> </div>
</footer>