<?php
$base = Luis::basepage("base_page_admin");
$languages_data_files = DatosLang::luis_lang_bd_names();
$urb=explode("/", $_GET["paginas"]);
if(isset($urb[1])){$urbp=$urb[1];}else{$urbp=false;}
if(isset($urb[2])){$urbs=$urb[2];}else{$urbs=false;}
if(isset($urb[3])){$urb3=$urb[3];}else{$urb3=false;}
?>
<section class="vista_preb_page">
     <ol class="box_visw" id="dir_homs" data_linm="<?=$base;?>">
        <li><a href="<?=$base;?>">Inicio</a></li>
        <li><a href="<?=$base."tiendas";?>">Tienda</a></li>
        <?php if($urbs): ?>
          <?php if($urbp=="update"): ?>
          	<li class="active">Editar idioma</li>
          <?php elseif($urbp=="administrar"): ?>
            <li class="active">Administrar palabras</li>
          <?php endif ?>
        <?php else: ?>
          <li class="active">Idiomas</li>
        <?php endif ?>
     </ol>
</section>
<div class="message"></div>

<?php if ($urbs): ?>
  <?php if($urbp=="update"): ?>
  	<h4 class="titulo_paginas">Editar idioma</h4>
  <?php elseif($urbp=="administrar"): ?>
    <h4 class="titulo_paginas">Administrar palabras</h4>
  <?php endif ?>
<?php else: ?>
  <h4 class="titulo_paginas">Idiomas</h4>
  <a class="add_itembox" href="<?=$base."agregar_idioma"?>">
    <div class="butt_luis_one"><span>Nuevo idioma</span></div>
  </a>
<?php endif ?>
<div class="contentlists_items">
	<?php if($urbs): ?>
		<?php if($urbp=="update"): $sucursal = DatosAdmin::poridSucursal($urbs); ?>
			<a class="butt_back" href="<?=$base."administrar_idioma";?>">❮ Idiomas</a>
			<div class="contentboxfunst">
				<div class="contentboxitemslistcread">
					<div class="boxinputlists">
						<input class="inptexboslistspublic" type="text" value="<?=$urb[2];?>" id="lang_file_display" data="<?=$urb[2];?>" name="lang" autocomplete="off" required>
						<label class="labelboxinptext"><?=Luis::lang("nombre_del_idioma");?></label>
					</div>
				</div>
			</div>
			<input class="butt_luis_lwos update_laguage_file" type="submit" value="Guardar Cambios">
		<?php elseif($urbp=="administrar"): ?>
			<?php $langpl = DatosLang::luis_lang_alls(); ?>
			<a class="butt_back" href="<?=$base."administrar_idioma";?>">❮ Idiomas</a>

				<div class="contentboxfunst">
					<div class="contentboxitemslistcread">
						<?php foreach ($langpl as $k): ?>
							<?php $search_lang = DatosLang::seach_lang_file($urb[2],$k->lang_key); ?>
							<div class="boxinputlists">
								<input class="inptexboslistspublic laguage_file_word" type="text" value="<?=$search_lang->lg;?>" id="lang_file_display_<?=$k->lang_key;?>" data="<?=$k->lang_key;?>" data_ps="<?=$urb[2];?>" autocomplete="off" required>
								<label class="labelboxinptext"><?=Luis::lang($k->lang_key);?></label>
							</div>
							<br>
						<?php endforeach ?>
					</div>
				</div>
	

		<?php endif ?>
	<?php else: ?>
		<?php if(count($languages_data_files)>0): ?>
			<?php foreach ($languages_data_files as $d): ?>
				<div class="itemsviewslist languages_box_lists" id="<?="administrar_idioma_".$d;?>">
					<div class="contensviewsitstr">
						<h3 class="names_columns_languages"><?=ucwords($d);?></h3>
						<br>
					</div>
					<div class="opcionesblocklist opcionesblocklist1000boxlist">
						<a class="opcionesblocklist100 opcionesblocklist1000" href="javascript:void(0)">
							<span class="opcionesblocklistoption opcionesblocklistoption100">
								<i class="opcionesblocklistoption200 opcionesblocklistoption300">•••</i>
							</span>
						</a>
						<div class="boxoptionslistlines">
							<div class="makposdind"></div>
							<div class="tipbox" tipbox="<?=$base;?>"></div>
							<a href="<?=$base."administrar_idioma/administrar/".$d;?>"><div class="boxoptionslistitems">Administrar</div></a>
							<a href="<?=$base."administrar_idioma/update/".$d;?>"><div class="boxoptionslistitems">Editar</div></a>
							<div class="boxoptionslistitems language_file_eliminar" id="<?=$d;?>">Eliminar</div>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		<?php else: ?>
		<?php endif ?>
	<?php endif ?>
</div>
<style type="text/css">
	.names_columns_languages{font-size:20px;color:#333;}
	.languages_box_lists{border:1px solid #ddd;}
</style>