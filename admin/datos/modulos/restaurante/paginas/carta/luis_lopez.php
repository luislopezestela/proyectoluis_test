<?php
$base=Luis::basepage("base_page_admin");
$base_b=Luis::basepage("base_page");
$urb = explode("/", $_GET["paginas"]);
if(isset($_SESSION["admin_id"])):
  $usuario=DatosUsuario::porId($_SESSION["admin_id"]);
  if($usuario->tipo==1):
  $items=DatosCarta::Mostrar_por_sucursal($usuario->sucursal,$usuario->id);
  $countbo=DatosCarta::Contar_items_de_sucursal($usuario->sucursal,$usuario->id)->c;
  ?>
  <div class="contenido">
    <?php if (isset($_SESSION["puhdr"])): ?>
      <script>alertexito("Publicacion con exito.");</script>
      <?php unset($_SESSION["puhdr"]); else: ?>
    <?php endif ?>

  <?php if (count($urb)>4): ?>
  <?php header('location:'.$base.'carta/'.$urb[1]);?>
    <?php else: ?>
  <?php if(isset($urb[3])): ?>
    <?php $carta_in=DatosCarta::porUkr($urb[2]); ?>
    <?php if($urb[1]==="editar_item"): ?>
      <!-- Editar item lista -->
      <?php if($carta_in): ?>
        <?php $carta_opcion_in=DatosCarta::porUkr($urb[2]); ?>
        <?php if($carta_opcion_in): ?>
          <?php $carta_items_in=DatosCarta::porUkr_items($urb[3]); ?>
          <?php if($carta_items_in): 
            $opcionescarta_list = DatosCarta::porId_opcion_all($carta_opcion_in->id);
            $imagenes_item=DatosImagenes::Mostrarimageneditar_items($carta_items_in->id);
            $imgescount_item=DatosImagenes::cantidad_image_item($carta_items_in->id)->c;
            if($imgescount_item>=6){$infboxfail="dihs";}else{$infboxfail=false;}
            if($imgescount_item>=5){
              $infboxmaxsize="disabled";
              $infboxmaxclass="afyfdg5";
              $infboxmaxclass1="adsgdg5";
            }else{
              $infboxmaxclass="afsfdg5";
              $infboxmaxclass1="adsfdg5";
              $infboxmaxsize=false;
            }
          ?>
            <!-- htm view page item -->
            <div class="contentboxbuttons">
              <a href="<?=$base."carta/view/".$carta_opcion_in->ukr.'/all';?>"><div class="boxdatabuttompublic">❮  Carta </div></a>
            </div>
          <div id="list_carts_view"></div>
          <div class="contentboxitemslistcread">
            <center><label>Carta</label><hr><h4><?=html_entity_decode($carta_opcion_in->nombre);?></h4></center>
          </div>

          <div class="contenidoboxplasstcread">
            <div class="untmsd4ss4listticread">Nuevo item</div>
            <div class="contentboxitemslistcread">
              <form id="form800goodlive_item_cart_update_list" role="form" method="POST" enctype="multipart/form-data">
                <input class="hipboxmp" type="text" name="intlinear" value="<?=$carta_items_in->id;?>">
                <div>
                  <span class="infmaximgs">Fotos <span id="coukbox200" class="coukbox">0</span>/5 <span>Puedes agregar maximo 5 fotos</span></span>
                </div>

                <div class="litimgecurrrentbox">
                  <?php foreach ($imagenes_item as $im): ?>
                    <span class="addnewimageluisboxud">
                      <span class="addnewimageluisboxudremoves rols_int_disp" data-null="<?=$im->id;?>">
                        <img src="<?=$base."datos/source/csacdjkclos.png";?>">
                      </span>
                      <img class="addnewimageluisboxudimage" src="<?=$base_b."datos/modulos/".Luis::temass()."/source/imagenes/items/".$carta_items_in->id."/thumb/".$im->imagen;?>" title="Foto">
                    </span>
                  <?php endforeach ?>
                  <div id="litimgecurrrent"></div>
                  <span class="addnewimageluis addnewimageluisboxus <?=$infboxmaxclass;?>" role="button" tabindex="1">
                    <img class="addnewimageluisimf" src="<?=$base."datos/source/nuevaimagenluislopez.png" ?>" alt="" height="16" width="16">
                    <span class="contentaddimgs">Agrega una foto</span>
                    <input  class="addnewimageluisbotsccc <?=$infboxmaxclass1;?>" data-got="<?=$base;?>" type="file" id="files" name="files[]" title="Selecciona una foto" multiple="multiple" accept="image/*" <?=$infboxmaxsize;?>>
                  </span>
                </div>

                <div class="contentboxfunst">
                  <div class="boxinputlists">
                    <input id="ifgooda" class="inptexboslistspublic" data="<?=$carta_opcion_in->id;?>" type="text" name="titulo" value="<?=html_entity_decode($carta_items_in->nombre);?>" autocomplete="off" required>
                    <label class="labelboxinptext">Nombre</label>
                  </div>

                  <div class="boxinputlists">
                    <input id="ifgoodb" class="inptexboslistspublic" type="text" name="precio" value="<?=$carta_items_in->precio;?>" autocomplete="off" required>
                    <label class="labelboxinptext">Precio sol peruano</label>
                  </div>

                  <div class="boxinputlists">
                    <select id="ifgoodc" class="inptexboslistspublic" name="listone">
                      <option value=""></option>
                      <?php foreach($opcionescarta_list as $t):?>
                        <?php if($carta_items_in->categoria==$t->id){$selec_opcio="selected";}else{$selec_opcio=false;}?>
                        <option value="">Sin opciones</option>
                        <option <?=$selec_opcio;?> value="<?=$t->id;?>"><?=html_entity_decode($t->nombre);?></option>
                      <?php endforeach; ?>
                    </select>
                    <label class="labelboxinptext">Opciones</label>
                  </div>
                </div>

                <div class="aphlistbuttonnextopenbox">
                  <span class="button_view_sty btn_update_item_list_cart_option">Publicar</span>
                  <input id="update_item_list_cart_option" class="null_view" type="submit">
                </div>
              </form>
            </div>
          </div>
            <!-- htm end -->
          <?php else: ?>
            <?php header('location:'.$base.'carta/view/'.$urb[2]."/all");?>
          <?php endif ?>
        <?php else: ?>
          <?php header('location:'.$base.'carta/view/'.$urb[2]."/all");?>
        <?php endif ?>
      <?php else: ?>
        <?php header('location:'.$base.'carta/view/'.$urb[2]."/all");?>
      <?php endif ?>
      <!-- End editar item lista -->
    <?php elseif($urb[1]==="publicar"): ?>
      <!-- publicar items -->
      <?php if($carta_in): ?>
        <?php $carta_opcion_in=DatosCarta::porUkr_opcion($urb[3]); ?>
        <?php if($carta_opcion_in): ?>
        <?php elseif($urb[3]==="all"): ?>
          <?php $prod=DatosCarta::porUkr($urb[2]);
          $opcionescarta_list = DatosCarta::porId_opcion_all($prod->id);?>
          <div class="contentboxbuttons">
            <a href="<?=$base."carta/view/".$prod->ukr.'/all';?>"><div class="boxdatabuttompublic pcol pcolh co0">❮  Carta </div></a>
          </div>
          <div id="list_carts_view"></div>
          <div class="contentboxitemslistcread">
            <center><label>Carta</label><hr><h4><?=html_entity_decode($prod->nombre);?></h4></center>
          </div>

          <div class="contenidoboxplasstcread">
            <div class="untmsd4ss4listticread">Nuevo item</div>
            <div class="contentboxitemslistcread">
              <form id="form800goodlive_item_cart" role="form" method="POST" enctype="multipart/form-data">
                <div>
                  <span class="infmaximgs">Fotos <span id="coukbox200" class="coukbox">0</span>/5 <span>Puedes agregar maximo 5 fotos</span></span>
                </div>

                <div class="litimgecurrrentbox">
                  <div id="litimgecurrrent"></div>
                  <span class="addnewimageluis addnewimageluisboxus afsfdg5" role="button" tabindex="1">
                    <img class="addnewimageluisimf" src="<?=$base."datos/source/nuevaimagenluislopez.png" ?>" alt="" height="16" width="16">
                    <span class="contentaddimgs">Agrega una foto</span>
                    <input  class="addnewimageluisbotsccc adsfdg5" data-got="<?=$base;?>" type="file" id="files" name="files[]" title="Selecciona una foto" required multiple="multiple" accept="image/*">
                  </span>
                </div>

                <div class="contentboxfunst">
                  <div class="boxinputlists">
                    <input id="ifgooda" class="inptexboslistspublic" data="<?=$prod->id;?>" type="text" name="titulo" autocomplete="off" required>
                    <label class="labelboxinptext">Nombre</label>
                  </div>

                  <div class="boxinputlists">
                    <input id="ifgoodb" class="inptexboslistspublic" type="text" name="precio" autocomplete="off" required>
                    <label class="labelboxinptext">Precio sol peruano</label>
                  </div>

                  <div class="boxinputlists">
                    <select id="ifgoodc" class="inptexboslistspublic" name="listone">
                      <option value=""></option>
                      <?php foreach($opcionescarta_list as $t):?>
                        <option value=""> Sin opciones</option>
                        <option value="<?=$t->id;?>"><?=html_entity_decode($t->nombre);?></option>
                      <?php endforeach; ?>
                    </select>
                    <label class="labelboxinptext">Opciones</label>
                  </div>
                  <div class="boxinputlists"><br>
                    <label>Caracteristicas.</label>
                    <span role="button" class="button_add_caract add_caracteristica_items" data-modal-trigger="add_new_carateristica_in_item_place">Agregar</span>
                    <div class="modal" data-modal-name="add_new_carateristica_in_item_place" data-modal-dismiss>
                      <div class="modal__dialog">
                        <header class="modal__header">
                          <h3 class="modal__title">Agregar caracteristica.</h3>
                          <i class="modal__close" data-modal-dismiss>X</i>
                        </header>
                        <div class="modal__content">
                          <input class="input_update_modal class_name_ini_add_caracteristic" type="text" placeholder="Nombre" value="">
                          <span role="button" class="button_update_modal class_btn_ini_add_caracteristic">Agregar</span>
                        </div>
                      </div>
                    </div>

                    <div class="list_items_view_content_caracteristics"></div>
                  </div>
                </div>
                <div class="aphlistbuttonnextopenbox">
                  <span class="aphlistbuttonnextopembox">Publicar</span>
                  <input id="blocknullfom12" class="blocknullfom12_items_cart" type="submit">
                </div>
              </form>
            </div>
          </div>

        <?php else: ?>
        <?php header('location:'.$base.'carta/view/'.$urb[2]);?>
        <?php endif ?>
      <?php else: ?>
        <?php header('location:'.$base.'carta/view/'.$urb[2]);?>
      <?php endif ?>
      <!--end publicar items -->
    <?php elseif($urb[1]==="view"): ?>
      <?php if($carta_in): ?>
        <?php $carta_opcion_in=DatosCarta::porUkr_opcion($urb[3]); ?>
        <?php if($carta_opcion_in): ?>
          <?php $prod=DatosCarta::porUkr($urb[2]);
          $opcionescarta_list_two = DatosCarta::porId_opcion_all($prod->id);
          $mostrar_los_items_list = DatosCarta::MostrarItems_items_opciones($carta_opcion_in->id);
          $cantidad_de_items=DatosCarta::Contar_items_carta_opciones($carta_opcion_in->id)->c;?>
          <div class="contentboxbuttons">
            <a href="<?=$base."carta/view/".$prod->ukr;?>"><div class="boxdatabuttompublic">❮  Carta </div></a>
          </div>
          <div id="list_carts_view"></div>
          <center><h4><?=html_entity_decode($prod->nombre);?></h4></center>
          <div class="contentboxitemslistcread">
            <input class="list_carts_view" list="list_carts" placeholder="Seleccionar otra opcion.">
            <datalist class="view_pages_list_timeline_options" id="list_carts">
              <?php foreach ($opcionescarta_list_two as $k):?>
                <option value="all">all</option>
                <option value="<?=$k->nombre;?>"><?=$k->nombre;?></option>
              <?php endforeach ?>
            </datalist>
          </div>
          <div class="untmsd4ss4listticread">
              <label>Mostrar</label>
              <span class="name_option_list_option_page"><?=$carta_opcion_in->nombre;?></span>
              <span class="mount_option_list_items"><?=$cantidad_de_items;?></span>
          </div>
          <div class="contenidoboxplasstcread">
              <a href="<?=$base."carta/publicar/".$prod->ukr."/all";?>" class="add_option_carta_list"><span>Agregar item</span></a>
          </div>
          <hr>
          <div class="items_carta_in_options_list">
          <?php foreach ($mostrar_los_items_list as $mps):
            $imgsb_item=DatosImagenes::mostrar_imagen_items_carta($mps->id);?>
            <!-- view items  page list -->
            <div class="contentboxitemslist <?="view_carta_option_".$mps->id?>">
              <div class="boxpicturelistst">
                <?php $dirimage="../datos/modulos/".Luis::temass()."/source/imagenes/items/".$mps->id;?>
                <?php if(is_dir($dirimage)): 
                   $fileimage="../datos/modulos/".Luis::temass()."/source/imagenes/items/".$mps->id."/thumb/".$imgsb_item->imagen;?>
                  <?php if (file_exists($fileimage)): ?>
                    <?php if($imgsb_item==null): ?>
                      <picture><img class="boxpictureliststimg" src="<?=$base."datos/modulos/".Luis::temass()."/source/imagenes/page/noimagen.png";?>"></picture>
                    <?php else: ?>
                      <picture><img class="boxpictureliststimg" src="<?=$base_b."datos/modulos/".Luis::temass()."/source/imagenes/items/".$mps->id."/thumb/".$imgsb_item->imagen;?>"></picture>
                    <?php endif ?>
                  <?php else: ?>
                    <picture><img class="boxpictureliststimg" src="<?=$base."datos/modulos/".Luis::temass()."/source/imagenes/page/noimagen.png";?>"></picture>
                  <?php endif ?>
                <?php else: ?>
                  <picture><img class="boxpictureliststimg" src="<?=$base."datos/modulos/".Luis::temass()."/source/imagenes/page/noimagen.png";?>"></picture>
                <?php endif ?>
              </div>
              <div class="detaillsboxlists">
                <div class="tluisboxunli <?="name_list_option".$mps->id?>"><?=html_entity_decode($mps->nombre);?></div>
                <?php if($mps->estado): ?>
                  <div class="tluisboxunlipubl">Publicado</div>
                <?php else: ?>
                  <div class="tluisboxunlipubl">Sin publicar</div>
                <?php endif ?>
              </div>

              <div class="opcionesblocklist opcionesblocklist1000boxlist">
                <a class="opcionesblocklist100 opcionesblocklist1000" href="javascript:void(0)">
                  <span class="opcionesblocklistoption opcionesblocklistoption100">
                    <i class="opcionesblocklistoption200 opcionesblocklistoption300">•••</i>
                  </span>
                </a>
                <div class="boxoptionslistlines">
                  <div class="makposdind"></div>
                  <a href="<?=$base."carta/editar_item/".$prod->ukr."/".$mps->ukr;?>"><div class="boxoptionslistitems">Editar publicacion</div></a>
                  <div class="boxoptionslistitems option_carta_functions" data="<?=$mps->id;?>" data-modal-trigger="<?="option_carta_".$mps->id;?>">Eliminar</div>
                  <div class="modal" data-modal-name="<?="option_carta_".$mps->id;?>" data-modal-dismiss>
                    <div class="modal__dialog">
                      <header class="modal__header">
                        <h3 class="modal__title">Eliminar</h3>
                        <i class="modal__close" data-modal-dismiss>X</i>
                      </header>
                      <div class="modal__content">
                        <div class="case_delete_view">
                          <span class="option_delete_views option_confirm confirm_delete_opcion_item_carta" data="<?=$mps->id;?>" data-x="<?=$prod->id;?>">Eliminar</span>
                          <span class="option_delete_views option_cancel cancel_delete_carta" data-modal-dismiss>Cancelar</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- end view page itens -->
          <?php endforeach ?>
          </div>
        <?php elseif($urb[3]==="all"): ?>
          <?php $prod=DatosCarta::porUkr($urb[2]);
          $opcionescarta_list_two = DatosCarta::porId_opcion_all($prod->id);
          $mostrar_los_items_list = DatosCarta::MostrarItems_cartas_opciones($prod->id);
          $cantidad_de_items = DatosCarta::Contar_items_carta_all($prod->id)->c;
          ?>
          <div class="contentboxbuttons">
            <a href="<?=$base."carta/view/".$prod->ukr;?>"><div class="boxdatabuttompublic">❮  Carta </div></a>
          </div>
          <div id="list_carts_view"></div>
          <center><h4><?=html_entity_decode($prod->nombre);?></h4></center>
          <div class="contentboxitemslistcread">
            <input class="list_carts_view" list="list_carts" placeholder="Seleccionar otra opcion.">
            <datalist class="view_pages_list_timeline_options" id="list_carts">
              <?php foreach ($opcionescarta_list_two as $k):?>
                <option value="all">all</option>
                <option value="<?=$k->nombre;?>"><?=$k->nombre;?></option>
              <?php endforeach ?>
            </datalist>
          </div>
            <div class="untmsd4ss4listticread">
              <label>Mostrar</label>
              <span class="name_option_list_option_page">Todo</span>
              <span class="mount_option_list_items"><?=$cantidad_de_items;?></span>
            </div>
          <div class="contenidoboxplasstcread">
              <a href="<?=$base."carta/publicar/".$prod->ukr."/all";?>" class="add_option_carta_list"><span>Agregar item</span></a>
          </div>
          <hr>
          <div class="items_carta_in_options_list">
          <?php foreach ($mostrar_los_items_list as $mps):
            $imgsb_item=DatosImagenes::mostrar_imagen_items_carta($mps->id);?>
            <!-- view items  page list -->
            <div class="contentboxitemslist <?="view_carta_option_".$mps->id?>">
              <div class="boxpicturelistst">
                <?php $dirimage="../datos/modulos/".Luis::temass()."/source/imagenes/items/".$mps->id;?>
                <?php if(is_dir($dirimage)): 
                   $fileimage="../datos/modulos/".Luis::temass()."/source/imagenes/items/".$mps->id."/thumb/".$imgsb_item->imagen;?>
                  <?php if (file_exists($fileimage)): ?>
                    <?php if($imgsb_item==null): ?>
                      <picture><img class="boxpictureliststimg" src="<?=$base."datos/modulos/".Luis::temass()."/source/imagenes/page/noimagen.png";?>"></picture>
                    <?php else: ?>
                      <picture><img class="boxpictureliststimg" src="<?=$base_b."datos/modulos/".Luis::temass()."/source/imagenes/items/".$mps->id."/thumb/".$imgsb_item->imagen;?>"></picture>
                    <?php endif ?>
                  <?php else: ?>
                    <picture><img class="boxpictureliststimg" src="<?=$base."datos/modulos/".Luis::temass()."/source/imagenes/page/noimagen.png";?>"></picture>
                  <?php endif ?>
                <?php else: ?>
                  <picture><img class="boxpictureliststimg" src="<?=$base."datos/modulos/".Luis::temass()."/source/imagenes/page/noimagen.png";?>"></picture>
                <?php endif ?>
              </div>
              <div class="detaillsboxlists">
                <div class="tluisboxunli <?="name_list_option".$mps->id?>"><?=html_entity_decode($mps->nombre);?></div>
                <?php if($mps->estado): ?>
                  <div class="tluisboxunlipubl">Publicado</div>
                <?php else: ?>
                  <div class="tluisboxunlipubl">Sin publicar</div>
                <?php endif ?>
              </div>

              <div class="opcionesblocklist opcionesblocklist1000boxlist">
                <a class="opcionesblocklist100 opcionesblocklist1000" href="javascript:void(0)">
                  <span class="opcionesblocklistoption opcionesblocklistoption100">
                    <i class="opcionesblocklistoption200 opcionesblocklistoption300">•••</i>
                  </span>
                </a>
                <div class="boxoptionslistlines">
                  <div class="makposdind"></div>
                  <a href="<?=$base."carta/editar_item/".$prod->ukr."/".$mps->ukr;?>"><div class="boxoptionslistitems">Editar publicacion</div></a>
                  <div class="boxoptionslistitems option_carta_functions" data="<?=$mps->id;?>" data-modal-trigger="<?="option_carta_".$mps->id;?>">Eliminar</div>
                  <div class="modal" data-modal-name="<?="option_carta_".$mps->id;?>" data-modal-dismiss>
                    <div class="modal__dialog">
                      <header class="modal__header">
                        <h3 class="modal__title">Eliminar</h3>
                        <i class="modal__close" data-modal-dismiss>X</i>
                      </header>
                      <div class="modal__content">
                        <div class="case_delete_view">
                          <span class="option_delete_views option_confirm confirm_delete_opcion_item_carta" data="<?=$mps->id;?>" data-x="<?=$prod->id;?>">Eliminar</span>
                          <span class="option_delete_views option_cancel cancel_delete_carta" data-modal-dismiss>Cancelar</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- end view page itens -->
          <?php endforeach ?>
          </div>
        <?php else: ?>
          <?php header('location:'.$base.'carta/view/'.$urb[2]);?>
        <?php endif ?>
      <?php else: ?>
        <?php header('location:'.$base.'carta/'.$urb[1]);?>
      <?php endif ?>
    <?php else: ?>
      <?php header('location:'.$base.'carta/'.$urb[1]);?>
    <?php endif ?>

  <?php elseif(isset($urb[2])): ?>
    <?php if(isset($urb[1])): ?>
      <?php if($urb[1]==="view"): 
        $prod=DatosCarta::porUkr($urb[2]);
        if(isset($prod)):
        $countbo_opt=DatosCarta::Contar_opciones_carta($prod->id)->c;
          $imagenes=DatosImagenes::mostrar_imagen_carta($prod->id);
          $imgescount=DatosImagenes::cantidadImage_carta($prod->id)->c;
          $cantidad_items_carta_all=DatosCarta::Contar_items_carta_all($prod->id)->c;?>
          <div class="contentboxbuttons">
            <a href="<?=$base.'carta';?>"><div class="boxdatabuttompublic pcol pcolh co0">❮  Cartas </div></a>
          </div>
          <div id="list_carts_view"></div>
          <div class="contentboxitemslistcread">
            <input class="list_carts_view" list="list_carts" placeholder="Seleccionar otra carta">
            <datalist id="list_carts">
              <?php foreach ($items as $k):?>
                <option value="<?=$k->nombre;?>"><?=$k->nombre;?></option>
              <?php endforeach ?>
            </datalist>
          </div>

          <div class="contenidoboxplasstcread">
            <div class="untmsd4ss4listticread">Carta</div>
            <div class="contentboxitemslistcread">
              <span class="date_view_item"><?=Functions::fechasluislopes($prod->fecha);?></span>
              <a href="<?=$base."carta/editar/".$prod->ukr;?>" class="button_update_cart">
                  <span class="update_cart_view_item">Editar</span>
                </a>
              <span class="view_image_prev">
                  <img src="<?=$base_b."datos/modulos/".Luis::temass()."/source/imagenes/carta/".$prod->id."/thumb/".$imagenes->imagen;?>" title="<?=html_entity_decode($prod->nombre);?>">
                </span>
                <label class="name_view_item"><?=html_entity_decode($prod->nombre);?></label>
                <div class="items_list_view_all">
                <a class="button_list_items_all view_all_items_in_carta_url" href="<?=$base."carta/view/".$prod->ukr."/all";?>">Ver items <span class="cantidad_all_items_in_carta"><?=$cantidad_items_carta_all;?></span></a>
              </div>
            </div>
            <hr>

            <div class="contentboxitemslistcread">
              
              <span class="add_option_carta_list" data-modal-trigger="<?="option_carta_one";?>">Agregar opcion</span>
              <div class="modal" data-modal-name="<?="option_carta_one";?>" data-modal-dismiss>
                <div class="modal__dialog">
                  <header class="modal__header">
                    <h3 class="modal__title">Agregar opcion</h3>
                    <i class="modal__close" data-modal-dismiss>X</i>
                  </header>
                  <div class="modal__content">
                    <input class="name_option_carta" type="text" placeholder="Nombre">
                    <span class="button_option_carta_list" data="<?=$prod->id;?>">Agregar</span>
                  </div>
                </div>
              </div>
              
              <div><span class="untmsd4ss4listti_opciones"><?=$countbo_opt." Opciones";?></span></div>
              <br>
              <div class="categorias_view_carta">
                <?php $opciones_carta = DatosCarta::Mostrar_opciones_carta($prod->id); ?>
                <?php foreach($opciones_carta as $oc): 
                  $contaritems=DatosCarta::Contar_items_opciones_carta($oc->id)->c;?>
                <div class="contentboxitemslist <?="view_carta_option_".$oc->id?>">
                  <div class="detaillsboxlists">
                    <div class="tluisboxunli <?="name_list_option".$oc->id?>"><?=html_entity_decode($oc->nombre);?></div>
                    <?php if($oc->estado): ?>
                      <div class="tluisboxunlipubl">Publicado</div>
                    <?php else: ?>
                      <div class="tluisboxunlipubl">Sin publicar</div>
                    <?php endif ?>

                    <?php if($contaritems==null):?>
                      <span class="tluisboxunlipubl cant_opions">0 Items</span>
                    <?php elseif($contaritems==1): ?>
                      <span class="tluisboxunlipubl cant_opions">Un Item</span>
                    <?php elseif($contaritems>=2): ?>
                      <span class="tluisboxunlipubl cant_opions"><?=$contaritems;?> Items</span>
                    <?php else: ?>
                      <span class="tluisboxunlipubl cant_opions"><?=$contaritems;?> Items</span>
                    <?php endif ?>

                  </div>
                  <div class="opcionesblocklist opcionesblocklist1000boxlist">
                    <a class="opcionesblocklist100 opcionesblocklist1000" href="javascript:void(0)">
                      <span class="opcionesblocklistoption opcionesblocklistoption100">
                        <i class="opcionesblocklistoption200 opcionesblocklistoption300">•••</i>
                      </span>
                    </a>
                    <div class="boxoptionslistlines">
                      <div class="makposdind"></div>
                      <a href="<?=$base."carta/view/".$prod->ukr."/".$oc->ukr;?>"><div class="boxoptionslistitems">Ver publicacion</div></a>
                      <div class="boxoptionslistitems option_carta_functions_update" data="<?=$oc->id;?>" data-modal-trigger="<?="option_carta_update_".$oc->id;?>">Editar publicacion</div>

                      <div class="modal closet_modal_listems" data="<?=$oc->id;?>" data-modal-name="<?="option_carta_update_".$oc->id;?>" data-modal-dismiss closet_modal="<?=$oc->id;?>">
                        <div class="modal__dialog">
                          <header class="modal__header">
                            <h3 class="modal__title">Editar opcion.</h3>
                            <i class="modal__close" data-modal-dismiss>X</i>
                          </header>
                          <div class="modal__content">
                            <input class="input_update_modal <?="name_option_carta_update_".$oc->id;?>" type="text" placeholder="Nombre" value="<?=html_entity_decode($oc->nombre);?>">
                            <span class="button_update_modal button_option_carta_list_update" data="<?=$oc->id;?>" data-x="<?=$prod->id;?>">Editar</span>
                          </div>
                        </div>
                      </div>

                      <div class="boxoptionslistitems option_carta_functions" data="<?=$oc->id;?>" data-modal-trigger="<?="option_carta_".$oc->id;?>">Eliminar</div>
                      <div class="modal" data-modal-name="<?="option_carta_".$oc->id;?>" data-modal-dismiss>
                        <div class="modal__dialog">
                          <header class="modal__header">
                            <h3 class="modal__title">Eliminar</h3>
                            <i class="modal__close" data-modal-dismiss>X</i>
                          </header>
                          <div class="modal__content">
                            <div class="case_delete_view">
                              <span class="option_delete_views option_confirm confirm_delete_opcion_carta" data="<?=$oc->id;?>" data-x="<?=$prod->id;?>">Eliminar</span>
                              <span class="option_delete_views option_cancel cancel_delete_carta" data-modal-dismiss>Cancelar</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endforeach ?>

              </div>
            </div>

          </div>
            <br><br>
            
            <?php else: ?>
          <?php header('location:'.$base.'carta');?>
          <?php endif ?>
      <?php elseif($urb[1]==="editar"): ?>
        <?php if(isset($urb[2])==$urb[2]): ?>
          <?php $prod=DatosCarta::porUkr($urb[2]);
          if(isset($prod)):
          $imagenes=DatosImagenes::mostrar_imagen_carta($prod->id);
          $imgescount=DatosImagenes::cantidadImage_carta($prod->id)->c;
          if($imgescount>=2){$infboxfail="dihs";}else{$infboxfail=false;}
          if($imgescount>=0){
            $infboxmaxsize="disabled";
            $infboxmaxclass="afyfdg5";
            $infboxmaxclass1="adsgdg5";
          }else{
            $infboxmaxclass="afsfdg5";
            $infboxmaxclass1="adsfdg5";
            $infboxmaxsize=false;
          }?>

          <!-- crear publicacion  -->
          <div class="contentboxbuttons">
            <a href="<?=$base.'carta';?>"><div class="boxdatabuttompublic pcol pcolh co0">❮  Carta </div></a>
          </div>
          <div class="contenidoboxplasstcread">
        <div class="untmsd4ss4listticread">Editar publicacion</div>
        <div class="contentboxitemslistcread">
        <form action="#" id="form800goodlive100" role="form" method="POST" enctype="multipart/form-data">
          <input class="hipboxmp" type="text" name="intlinear" value="<?=$prod->id;?>">
          <div>
            <span class="infmaximgs <?=$infboxfail;?>">Fotos <span id="coukbox200" class="coukbox"><?=$imgescount;?></span>/1 <span>Puedes agregar maximo 1 fotos</span></span>
          </div>

          <div class="litimgecurrrentbox">
            <!-- imagenes lista -->
                <span class="addnewimageluisboxud">
                  <span class="addnewimageluisboxudremoves rols_int_disp" data-null="<?=$imagenes->id;?>">
                    <img src="<?=$base."datos/source/csacdjkclos.png";?>">
                  </span>
                  <img class="addnewimageluisboxudimage" src="<?=$base_b."datos/modulos/".Luis::temass()."/source/imagenes/carta/".$prod->id."/thumb/".$imagenes->imagen;?>" title="Foto">

                </span>
            <!-- imagenes lista end -->
          <div id="litimgecurrrent"></div>
          <span class="addnewimageluis addnewimageluisboxus <?=$infboxmaxclass;?>" role="button" tabindex="1">
            <img class="addnewimageluisimf" src="<?=$base."datos/source/nuevaimagenluislopez.png";?>" alt="" height="16" width="16">
            <span class="contentaddimgs">Agrega una foto</span>
            <input  class="addnewimageluisbotsccc <?=$infboxmaxclass1;?>" data-got="<?=$base;?>" type="file" id="files" title="Selecciona una foto" multiple="multiple" accept="image/*" <?=$infboxmaxsize;?>>
          </span>
        </div>

        <div class="contentboxfunst">
          <div class="boxinputlists">
          <input id="ifgooda" class="inptexboslistspublic" type="text" name="nombre" autocomplete="off" value="<?=$prod->nombre;?>" required>
          <label class="labelboxinptext">Titulo</label>
          </div>
          </div>

          <div class="aphlistbuttonnextopenbox">
            <span class="aphlistbuttonnextopemboxlist100">Editar publicacion</span>
            <input id="blocknullfom1300" type="submit">
          </div>
        </form>
        </div>
        </div>
        <?php else: ?>
          <?php header('location:'.$base.'carta');?>
          <?php endif ?>
        <?php else: ?>
         <?php header('location:'.$base.'carta');?>
        <?php endif ?>
        <?php elseif($urb[1]==="crear"): ?>
         <?php header('location:'.$base.'carta');?>
         <?php else: ?>
         <?php header('location:'.$base.'carta');?>
      <?php endif ?>
    <?php endif ?>
    <?php elseif(isset($urb[1])): 
      if (isset($urb[1])==$urb[1]):
        if ($urb[1]==="crear"): ?>
        <!-- crear publicacion  -->
        <div class="contentboxbuttons">
         <a href="<?=$base.'carta';?>"><div class="boxdatabuttompublic pcol pcolh co0">❮  Carta </div></a>
       </div>

       <div class="contenidoboxplasstcread">
        <div class="untmsd4ss4listticread">Nueva publicacion</div>
        <div class="contentboxitemslistcread">
        <form id="form800goodlive" role="form" method="POST" enctype="multipart/form-data">
          <div>
            <span class="infmaximgs">Fotos <span id="coukbox200" class="coukbox">0</span>/1 <span>Puedes agregar maximo 1 fotos</span></span>
          </div>

          <div class="litimgecurrrentbox">
          <div id="litimgecurrrent"></div>
          <span class="addnewimageluis addnewimageluisboxus afsfdg5" role="button" tabindex="1">
            <img class="addnewimageluisimf" src="<?=$base."datos/source/nuevaimagenluislopez.png" ?>" alt="" height="16" width="16">
            <span class="contentaddimgs">Agrega una foto</span>
            <input  class="addnewimageluisbotsccc adsfdg5" data-got="<?=$base;?>" type="file" id="files" name="files[]" title="Selecciona una foto" required multiple="multiple" accept="image/*">
          </span>
        </div>

        <div class="contentboxfunst">
          <div class="boxinputlists">
          <input id="ifgooda" class="inptexboslistspublic" type="text" name="titulo" autocomplete="off" required>
          <label class="labelboxinptext">Nombre</label>
          </div>
          </div>

          <div class="aphlistbuttonnextopenbox">
            <span class="aphlistbuttonnextopembox co0 pcol pcolh">Publicar</span>
            <input id="blocknullfom12" type="submit">
          </div>
        </form>
        </div>
        </div>
        <?php else: ?>
         <?php header('location:'.$base.'carta');?>
          <?php endif;?>
        <?php else: ?>
          <?php header('location:'.$base.'carta');?>
        <?php endif;?>
       <!-- end crear publicacion -->
    <?php else: ?>
       <!-- Publicaciones -->
    <div class="contentboxbuttons">
      <a href="<?=$base.'carta/crear';?>"><div class="boxdatabuttompublic"> + Publicar</div></a>
    </div>

    <div class="contenidoboxplasst">
       <div class="untmsd4ss4listti"><?=$countbo." Publicaciones";?></div>
       <?php foreach ($items as $t): 
       $imgsb=DatosImagenes::mostrar_imagen_carta($t->id);
       $ab=strtotime($t->fecha);$exp_date=$ab + (168)*3600;$actual=strtotime(date("Y-m-d H:i:s"));
       $countbooptions=DatosCarta::Contar_opciones_carta($t->id)->c;?>
       <div class="contentboxitemslist <?="view_carta_".$t->id?>">
        <div class="boxpicturelistst">
          <?php $dirimage="../datos/modulos/".Luis::temass()."/source/imagenes/carta/".$t->id;
          $fileimage="../datos/modulos/".Luis::temass()."/source/imagenes/carta/".$t->id."/thumb/".$imgsb->imagen;?>
          <?php if(is_dir($dirimage)): ?>
            <?php if (file_exists($fileimage)): ?>
              <?php if($imgsb==null): ?>
                <picture><img class="boxpictureliststimg" src="<?=$base."datos/modulos/".Luis::temass()."/source/imagenes/page/noimagen.png";?>"></picture>
              <?php else: ?>
                <picture><img class="boxpictureliststimg" src="<?=$base_b."datos/modulos/".Luis::temass()."/source/imagenes/carta/".$t->id."/thumb/".$imgsb->imagen;?>"></picture>
              <?php endif ?>
            <?php else: ?>
              <picture><img class="boxpictureliststimg" src="<?=$base."datos/modulos/".Luis::temass()."/source/imagenes/page/noimagen.png";?>"></picture>
            <?php endif ?>
          <?php else: ?>
            <picture><img class="boxpictureliststimg" src="<?=$base."datos/modulos/".Luis::temass()."/source/imagenes/page/noimagen.png";?>"></picture>
          <?php endif ?>
       </div>
       <div class="detaillsboxlists">
         <div class="tluisboxunli"><?=html_entity_decode($t->nombre);?></div>
         <?php if ($t->estado): ?>
         <div class="tluisboxunlipubl">Publicado</div>
           <?php else: ?>
         <div class="tluisboxunlipubl">Sin publicar</div>
         <?php endif ?>
         <?php if($countbooptions==null):?>
          <?php elseif($countbooptions==1): ?>
            <span class="tluisboxunlipubl cant_opions">Una opcion</span>
          <?php elseif($countbooptions>=2): ?>
            <span class="tluisboxunlipubl cant_opions"><?=$countbooptions;?> Opciones</span>
         <?php endif ?>
       </div>
       <div class="opcionesblocklist opcionesblocklist1000boxlist">
        <a class="opcionesblocklist100 opcionesblocklist1000" href="javascript:void(0)">
          <span class="opcionesblocklistoption opcionesblocklistoption100">
            <i class="opcionesblocklistoption200 opcionesblocklistoption300">•••</i>
          </span>
          </a>
         <div class="boxoptionslistlines">
          <div class="makposdind"></div>
          <a href="<?=$base."carta/view/".$t->ukr;?>"><div class="boxoptionslistitems">Administrar</div></a>
           <a href="<?=$base."carta/editar/".$t->ukr;?>"><div class="boxoptionslistitems">Editar publicacion</div></a>
           <div class="boxoptionslistitems" data-modal-trigger="<?="option_carta_".$t->id?>">Eliminar</div>
         </div>
         <div class="modal" data-modal-name="<?="option_carta_".$t->id?>" data-modal-dismiss>
           <div class="modal__dialog">
            <header class="modal__header">
              <h3 class="modal__title">Editar</h3>
              <i class="modal__close" data-modal-dismiss>X</i>
            </header>
            <div class="modal__content">
              <p>¿Seguro que quieres eliminarlo?. Tambien se eliminara las <?=$countbooptions;?> opciones y los items de la carta. y no se podra recuperarlo en el futuro.</p>
              <div class="case_delete_view">
              <span class="option_delete_views option_confirm confirm_delete_carta" data="<?=$t->id;?>">Eliminar</span>
              <span class="option_delete_views option_cancel cancel_delete_carta" data-modal-dismiss>Cancelar</span>
              </div>
            </div>
          </div>
        </div>
       </div>
       </div>
       <?php endforeach ?>
       <div class="optlistnulldop" data-nullb="<?=$base;?>"></div>
    </div>
    <!-- end publicaciones -->
    <?php endif;?>
    <?php endif ?>
  </div>
  <?php else: ?>
    <?php header('location:'.$base.'panel');?>
<?php endif;?>
<?php else: ?>
  <?php header('location:'.$base.'acceder');?>
<?php endif;?>