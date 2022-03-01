<?php $base = Luis::basepage("base_page_admin"); ?>
<div class="contenido_dark">
  <div class="message_comp">
  <p class="message_comp_text"><?=Luis::lang("seleccione_un_modelo_y_completa_los_datos");?></p>
</div>
<div class="contiene_temas_d">
  <div class="sub_contec_data">
    <div class="hs__header">
      <div class="hs__arrows"><a class="arrow disabled arrow-prev"></a><a class="arrow arrow-next"></a></div>
    </div>
    <ul class="hs">
      <?php $temas_list=Luis::listartemas(); ?>
      <?php foreach ($temas_list as $s): ?>
        <li class="view_item_temas">
        <input type="radio" id="<?=$s->id."tmalabel".$s->nombre;?>" name="tema_skin_data"> 
          <div class="view_item_temas_image_conten">
            <div class="it_title_tem">
              <label for="<?=$s->id."tmalabel".$s->nombre;?>"><?=Luis::lang($s->nombre_label);?></label>
            </div>
            <img class="hs__item__image" src="<?=$base."datos/modulos/".$s->nombre."/icon.png";?>"/>
          </div>
          <div class="hs__item__description"><span class="it_title_tem_sub"><?="v".$s->version;?></span></div>
        </li>
      <?php endforeach ?>
    </ul>
  </div>
</div>
  <div class="text"><?=Luis::lang("bienvenido");?></div>
  <br><br>
  <label class="label_nom_hud">Nombre de pagina.</label>
  <input id="pag_name" class="input_data_new_user" type="text">
  <br><br>
  <label class="label_nom_hud">Titulo pagina.</label>
  <input id="pag_title" class="input_data_new_user" type="text">
  <br><br>
  <label class="label_nom_hud">Descripcion de pagina.</label>
  <textarea id="pad_description" class="input_data_new_user" rows="6"></textarea>
  <br><br>
  <label class="label_nom_hud">Eslogan.</label>
  <input id="pag_slogan" class="input_data_new_user" type="text">
  <br><br>
  <span class="btn_sty btn btn__secondary tb_btn_next">Siguiente</span>
  <br><br>
</div>