<?php
$base = Luis::basepage("base_page_admin");
$urb = explode("/", $_GET["paginas"]);
if(isset($_SESSION["admin_id"])):
  $usuario=DatosUsuario::poriUsuario($_SESSION["admin_id"]);
  if($usuario->tipo==1):
    $productos=DatosAdmin::MostrarPublicacionesMarket($_SESSION["admin_id"],$usuario->categoria_prod_def);
    $categoria = DatosAdmin::mostrar_categorias();
    $marcas = DatosAdmin::mostrar_marcas();
    ?> 
    <div class="optlistnull" data-nullb="<?=$base;?>"></div>
    <section class="vista_preb_page">
      <ol class="box_visw">
        <li><a href="<?=$base;?>">Inicio</a></li>
        <li><a>Tienda</a></li>
        <li class="active">Productos</li>
      </ol>
    </section>
    <div class="contenido">
      <?php if (isset($_SESSION["puhdr"])): ?>
        <div class="mensaje100">
          <div id="rem10000" class="alerta_top exito_top">
            <p class="alerta_top100">Publicación con exito.</p>
            <span id="close_alert_10000" class="close_exito_100 close_alert_10000block">X</span>
          </div>
        </div>
        <?php unset($_SESSION["puhdr"]); else: ?>
      <?php endif ?>
      <div id="process456" class="lds-rippledef"><div></div><div></div> <div id="porsenrbozx"></div></div>
      <?php if(count($urb)>3): ?>
        <?php header('location:'.$base.'productos/'.$urb[1]);?>
      <?php else: ?>
        <?php if(isset($urb[2])): ?>
          <?php if(isset($urb[1])): ?>
            <?php if($urb[1]==="editar"): ?>
              <?php if(isset($urb[2])==$urb[2]): ?>
                <?php $idf=DatosAdmin::urlpersona_off($urb[2]);
                $prod=DatosAdmin::itemview_productos($idf);
                $imagenes=DatosAdmin::Mostrarimageneditar($prod->id);
                $imgescount=DatosAdmin::cantidad_imagenes($prod->id)->c;
                if($imgescount>=6){$infboxfail="dihs";}else{$infboxfail=false;}
                if($imgescount>=5){
                  $infboxmaxsize="disabled";
                  $infboxmaxclass="afyfdg5";
                  $infboxmaxclass1="adsgdg5";
                }else{
                  $infboxmaxclass="afsfdg5";
                  $infboxmaxclass1="adsfdg5";
                  $infboxmaxsize=false;
                }?>
                <script src="<?=$base."datos/source/ckeditor/ckeditor.js";?>"></script>
                <script src="<?=$base."datos/source/ckeditor/luchossedit.js";?>"></script>
                <!-- crear publicacion  -->
                <div class="contentboxbuttons">
                  <a href="<?=$base.'productos';?>">
                    <div class="boxdatabuttompublic pcol pcolh co0">❮  Publicaciones </div>
                  </a>
                </div>
                <div class="contenidoboxplasstcread">
                  <div class="untmsd4ss4listticread">Editar publicacion</div>
                  <div class="contentboxitemslistcread">
                    <form action="#" id="form800goodlive100" role="form" method="POST" enctype="multipart/form-data">
                      <input class="hipboxmp" type="text" name="intlinear" value="<?=DatosAdmin::urlpersona($prod->id);?>">
                      <div>
                        <span class="infmaximgs <?=$infboxfail;?>">
                          Fotos
                          <span id="coukbox200" class="coukbox"><?=DatosAdmin::cantidad_imagenes($prod->id)->c;?></span>/5 
                          <span>Puedes agregar maximo 5 fotos</span>
                        </span>
                      </div>

                      <div class="litimgecurrrentbox">
                        <!-- imagenes lista -->
                        <?php foreach ($imagenes as $ims): ?>
                          <span class="addnewimageluisboxud">
                            <span class="addnewimageluisboxudremoves rols_int_disp" data-null="<?=$ims->id;?>">
                              <img src="<?=$base."datos/imagenes/icons/csacdjkclos.png";?>">
                            </span>
                            <img class="addnewimageluisboxudimage" src="<?=$base."../datos/modulos/".Luis::temass()."/source/imagenes/items/".$prod->id."/thumb/".$ims->imagen;?>" title="Foto">
                          </span>
                        <?php endforeach ?>
                        <!-- imagenes lista end -->
                        <div id="litimgecurrrent"></div>
                        <span class="addnewimageluis addnewimageluisboxus <?=$infboxmaxclass;?>" role="button" tabindex="1">
                          <img class="addnewimageluisimf" src="<?=$base."datos/imagenes/icons/imge_add.png";?>" alt="" height="16" width="16">
                          <span class="contentaddimgs">Agrega una foto</span>
                          <input  class="addnewimageluisbotsccc <?=$infboxmaxclass1;?>" data-got="<?=$base;?>" type="file" id="files" title="Selecciona una foto" multiple="multiple" accept="image/*" <?=$infboxmaxsize;?>>
                        </span>
                      </div>

                      <div class="contentboxfunst">
                        <div class="boxinputlists">
                          <input id="ifgooda" class="inptexboslistspublic" type="text" name="titulo" autocomplete="off" value="<?=$prod->nombre;?>" required>
                          <label class="labelboxinptext">Titulo</label>
                        </div>
                        <hr>
                        <?php $mostrar_las_monedas_disponibles = DatosAdmin::Mostrar_las_monedas(); ?>
                        <div class="boxinputlists">
                          <select id="ifpmond_one" class="inptexboslistspublic" required>
                            <option value=""></option>
                            <?php foreach ($mostrar_las_monedas_disponibles as $mon): ?>
                              <?php if($prod->moneda_a==$mon->id): ?>
                                <?php $slected_moneda="selected"; ?>
                              <?php else: ?>
                                <?php $slected_moneda=false; ?>
                              <?php endif ?>
                              <option value="<?=$mon->id;?>" <?=$slected_moneda;?>><?=html_entity_decode($mon->nombre);?></option>
                            <?php endforeach ?>
                          </select>
                          <label class="labelboxinptext">Selecciona el tipo de moneda</label>
                        </div>

                        <div class="boxinputlists">
                          <input id="ifgoodb" class="inptexboslistspublic" type="text" name="precio" autocomplete="off" value="<?=$prod->precio;?>" required>
                          <label class="labelboxinptext">Precio venta por cantidad</label>
                        </div>
                        <hr>

                        <div class="boxinputlists">
                          <select id="ifpmond_two" class="inptexboslistspublic" required>
                            <option value=""></option>
                            <?php foreach ($mostrar_las_monedas_disponibles as $mon): ?>
                              <?php if($prod->moneda_b==$mon->id): ?>
                                <?php $slected_moneda="selected"; ?>
                              <?php else: ?>
                                <?php $slected_moneda=false; ?>
                              <?php endif ?>
                              <option value="<?=$mon->id;?>" <?=$slected_moneda;?>><?=html_entity_decode($mon->nombre);?></option>
                            <?php endforeach ?>
                          </select>
                          <label class="labelboxinptext">Selecciona el tipo de moneda</label>
                        </div>

                        <div class="boxinputlists">
                          <input id="ifgoodb_two" class="inptexboslistspublic" type="text" name="precio_final" autocomplete="off" value="<?=$prod->precio_final;?>" required>
                          <label class="labelboxinptext">Precio venta por unidad</label>
                        </div>
                        <hr>

                        <div class="boxinputlists">
                          <select id="ifodmarc" class="inptexboslistspublic" name="marca" required>
                            <option value=""></option>
                            <?php foreach($marcas as $m): if($m->id==$prod->marca){$seleboxin0="selected";}else{$seleboxin0=false;}?>
                              <option value="<?=$m->id;?>" <?=$seleboxin0;?>><?=html_entity_decode($m->nombre);?></option>
                            <?php endforeach; ?>
                          </select>
                          <label class="labelboxinptext">Marca</label>
                        </div>

                        <div class="boxinputlists">
                          <select id="ifgoodc" class="inptexboslistspublic" name="listone" required>
                            <option value=""></option>
                            <?php foreach($categoria as $t): if($t->id==$prod->categoria){$seleboxin="selected";}else{$seleboxin=false;}?>
                              <option value="<?=$t->id;?>" <?=$seleboxin;?>><?=html_entity_decode($t->nombre);?></option>
                            <?php endforeach; ?>
                          </select>
                          <label class="labelboxinptext">Categoria</label>
                        </div>

                        <?php if($prod->subcategoria==null): ?>
                          <div class="boxinputlists" style="display:none;">
                            <select id="ifgoodd" class="inptexboslistspublic" name="listtwo" required disabled>
                              <option value=""></option>
                            </select>
                            <label class="labelboxinptext">Sub categoria</label>
                          </div>
                        <?php else: ?>
                          <div class="boxinputlists">
                            <select id="ifgoodd" class="inptexboslistspublic" name="listtwo" required>
                              <?php $catsd=DatosAdmin::poridDesubCategorias($prod->categoria);
                              if(count($catsd)>0):?>
                                <option value=""></option>
                                <?php foreach($catsd as $c): if($c->id==$prod->subcategoria){$seleboxins="selected";}else{$seleboxins=false;}?>
                                  <option value="<?=$c->id;?>" <?=$seleboxins;?>><?=html_entity_decode($c->nombre);?></option>
                                <?php endforeach; ?>
                              <?php endif; ?>
                            </select>
                            <label class="labelboxinptext">Sub categoria</label>
                          </div>
                        <?php endif ?>

                        <div class="boxinputlists opcilinesviewbox">
                          <textarea cols="20" rows="2" data-editable="0" class="inptexboslistspublic hedboxhomeeditorsblok" name="listboxstrin" id="editor" required=""><?=html_entity_decode($prod->descripcion);?></textarea>
                          <label class="labelboxinptext">Caracteristicas</label>
   
                        </div>
                      </div>

                      <div class="aphlistbuttonnextopenbox">
                        <span class="aphlistbuttonnextopemboxlist100 co0 pcol pcolh ">Editar publicacion</span>
                        <input id="blocknullfom1300" type="submit">
                      </div>
                    </form>
                  </div>
                </div>
                <script>initSample();</script>
                <script src="<?=$base."datos/source/scripts/editor.js";?>"></script>
              <?php else: ?>
                <?php header('location:'.$base.'productos');?>
              <?php endif ?>
            <?php elseif($urb[1]==="completar"): ?>
              <?php if(isset($urb[2])==$urb[2]): ?>
                <?php $identifica_producto_en_page = DatosAdmin::urlpersona_off($urb[2]);?>
                <?php $prod_item=DatosAdmin::itemview_productos($identifica_producto_en_page); ?>
                <div class="contentboxbuttons">
                  <a href="<?=$base.'productos';?>">
                    <div class="boxdatabuttompublic pcol pcolh co0">❮  Publicaciones </div>
                  </a>
                </div>

                <div class="contenidoboxplasstcread">
                  <div class="add_details_items_box border_items_previews">
                    <?=html_entity_decode($prod_item->nombre);?>
                  </div>
                  <br>
                  <div class="fraces_precargadas">
                    <span class="ram_memory">MEMORIA RAM</span>
                    <span class="unidad_almacenamiento">UNIDAD DE ALMACENAMIENTO</span>
                    <span class="tarjeta_video">TARJETA DE VIDEO</span>
                  </div>
                  <div class="untmsd4ss4listticread">Agregar caracteristicas</div>
                  <div class="add_details_items_box">
                    <input class="add_details_items_input add_details_items_inputs" type="text">
                    <span class="add_details_items_button add_details_items_buttons_notes add_details_items_buttons" data="<?=$urb[2]; ?>">Agregar</span>
                  </div>
                </div>
                <div class="list_details_types_options_box">
                  <?php $view_type_list = DatosAdmin::ver_opciones_type($identifica_producto_en_page); ?>
                  <?php foreach ($view_type_list as $td): ?>
                    <?php $detalles_opciones = DatosAdmin::ver_detalles_opciones($td->id); ?>
                    <div class="contentboxitemslistcread <?="contentboxitemslistcreadertype".$td->id;?> contentboxitemslistcread_view_det" >
                      <span class="update_button_types <?="update_button_types".$td->id;?>" data="<?=$td->id;?>" data_two="<?=html_entity_decode($td->nombre);?>">Editar</span>
                      <span class="delete_button_types" data="<?=$td->id;?>">Eliminar</span>
                      <label class="label_opcopnes_page label_data_types_detalle <?="label_data_types_detalle".$td->id;?>"><?=html_entity_decode($td->nombre);?></label>
                      <div class="box_opciones_lista_detalles_box_list <?="box_opciones_lista_detalles_box_list".$td->id;?>">

                        <div class="funtion_box_detalle_types funtion_box_detalle_types<?=$td->id;?>">
                          <input class="input_add_detalle_de_options_box input_add_detalle_de_options_box<?=$td->id;?> input_add_detalle_de_options_boxs" placeholder="Nombre" type="text">
                          <?php if(count($detalles_opciones)>0): ?>
                            <input class="input_add_detalle_de_options_box_price input_add_detalle_de_options_box_price<?=$td->id;?> input_add_detalle_de_options_boxs" placeholder="Precio" type="text">
                          <?php else: ?>
                            <input class="input_add_detalle_de_options_box_price input_add_detalle_de_options_box_price<?=$td->id;?> input_add_detalle_de_options_boxs" placeholder="Precio" type="hidden" value="0">
                          <?php endif ?>
                          
                          <span class="button_add_detalle_de_options_box button_add_detalle_de_options_box<?=$td->id;?> button_add_detalle_de_options_boxs" data="<?=$td->id;?>">Agregar</span>
                        </div>
                      </div>

                      <div class="listar_opciones_de_tipo_box <?="listar_opciones_de_tipo_box".$td->id;?>">
                        <?php foreach ($detalles_opciones as $deop): ?>
                          <div class="box_options_inline <?="box_options_inline".$deop->id;?>">
                            <div class="box_type_inline_view">
                              <span class="button_display_opciones_update <?="button_display_opciones_update".$deop->id;?>" item_type="<?=$td->id;?>" data="<?=$deop->id?>" data_two="<?=$deop->nombre?>" data_three="<?=$deop->precio?>">Editar</span>
                              <span class="button_display_opciones_delete <?="button_display_opciones_delete".$deop->id;?>" data="<?=$deop->id?>" data_dels="<?=$td->id;?>">Eliminar</span>
                              <?php if($deop->principal==1): ?>
                                <span class="button_display_opciones_principal_active update_default_option <?="update_default_option".$td->id;?>" data_p="<?=$td->id;?>" data_s="<?=$deop->id;?>">Principal</span>
                              <?php else: ?>
                                <span class="button_display_opciones_principal_desactivado update_default_option <?="update_default_option".$td->id;?>" data_p="<?=$td->id;?>" data_s="<?=$deop->id;?>">Activar</span>
                              <?php endif ?>
                            </div>
                            <label class="<?="name_data_options_view".$deop->id;?>"><?=html_entity_decode($deop->nombre);?></label>
                          </div>
                        <?php endforeach ?>
                      </div>
                    </div>
                  <?php endforeach ?>
                </div>
              <?php else: ?>
                <?php header('location:'.$base.'productos');?>
              <?php endif ?>
            <?php elseif($urb[1]==="crear"): ?>
              <?php header('location:'.$base.'productos');?>
            <?php else: ?>
              <?php header('location:'.$base.'productos');?>
            <?php endif ?>
          <?php endif ?>
        <?php elseif(isset($urb[1])): 
          if(isset($urb[1])==$urb[1]):
            $items_veficar=DatosAdmin::porUkr_producto($urb[1]);
            if($urb[1]==="crear"): ?>
              <script src="<?=$base."datos/source/ckeditor/ckeditor.js";?>"></script>
                <script src="<?=$base."datos/source/ckeditor/luchossedit.js";?>"></script>
              <!-- crear publicacion  -->
              <div class="contentboxbuttons">
                <a href="<?=$base.'productos';?>">
                  <div class="boxdatabuttompublic pcol pcolh co0">❮  Publicaciones </div>
                </a>
              </div>

              <div class="contenidoboxplasstcread">
                <div class="untmsd4ss4listticread">Nueva publicacion</div>
                <div class="contentboxitemslistcread">
                  <form id="form800goodlive" role="form" method="POST" enctype="multipart/form-data">
                    <div class="boxinputlists">
                      <select id="sucursal_view" class="inptexboslistspublic" name="sucursal" required>
                        <option value=""></option>
                        <?php $sucursales=DatosAdmin::Mostrar_sucursales();
                        foreach($sucursales as $m): ?>
                          <option value="<?=$m->id;?>"><?=html_entity_decode($m->nombre);?></option>
                        <?php endforeach; ?>
                      </select>
                      <label class="labelboxinptext">Sucursal</label>
                    </div>

                    <div class="boxinputlists">
                      <select id="type_item_view" class="inptexboslistspublic type_item_view_pages" name="tipo" required>
                        <option value=""></option>
                        <?php $tipyitems=DatosAdmin::Mostrar_typeitems_list();
                        foreach($tipyitems as $ty): ?>
                          <option value="<?=$ty->id;?>"><?=html_entity_decode($ty->nombre);?></option>
                        <?php endforeach; ?>
                      </select>
                      <label class="labelboxinptext">Tipo de productos</label>
                    </div>

                    <div>
                      <span class="infmaximgs">Fotos <span id="coukbox200" class="coukbox">0</span>/5 <span>Puedes agregar maximo 5 fotos</span></span>
                    </div>

                    <div class="litimgecurrrentbox">
                      <div id="litimgecurrrent"></div>
                      <span class="addnewimageluis addnewimageluisboxus afsfdg5" role="button" tabindex="1">
                        <img class="addnewimageluisimf" src="<?=$base."datos/imagenes/icons/imge_add.png" ?>" alt="" height="16" width="16">
                        <span class="contentaddimgs">Agrega una foto</span>
                        <input  class="addnewimageluisbotsccc adsfdg5" data-got="<?=$base;?>" type="file" id="files" name="files[]" title="Selecciona una foto"  multiple="multiple" accept="image/*">
                      </span>
                    </div>

                    <div class="contentboxfunst">
                      <div class="boxinputlists">
                        <input id="ifgooda" class="inptexboslistspublic" type="text" name="titulo" autocomplete="off" required>
                        <label class="labelboxinptext">Titulo</label>
                      </div>
                      <hr>
                      <?php $mostrar_las_monedas_disponibles = DatosAdmin::Mostrar_las_monedas(); ?>
                      <div class="boxinputlists">
                        <select id="ifpmond_one" class="inptexboslistspublic" required>
                          <option value=""></option>
                          <?php foreach ($mostrar_las_monedas_disponibles as $mon): ?>
                            <option value="<?=$mon->id;?>"><?=html_entity_decode($mon->nombre);?></option>
                          <?php endforeach ?>
                        </select>
                        <label class="labelboxinptext">Selecciona el tipo de moneda</label>
                      </div>

                      <div class="boxinputlists">
                        <input id="ifgoodb" class="inptexboslistspublic" type="text" name="precio" autocomplete="off" required>
                        <label class="labelboxinptext">Precio por cantidad</label>
                      </div>
                      <hr>

                      <div class="boxinputlists">
                        <select id="ifpmond_two" class="inptexboslistspublic" required>
                          <option value=""></option>
                          <?php foreach ($mostrar_las_monedas_disponibles as $mon): ?>
                            <option value="<?=$mon->id;?>"><?=html_entity_decode($mon->nombre);?></option>
                          <?php endforeach ?>
                        </select>
                        <label class="labelboxinptext">Selecciona el tipo de moneda</label>
                      </div>

                      <div class="boxinputlists">
                        <input id="ifgoodb_two" class="inptexboslistspublic" type="text" name="precio_final" autocomplete="off" required>
                        <label class="labelboxinptext">Precio por unidad.</label>
                      </div>

                      <hr>
                      <div class="boxinputlists">
                        <select id="ifodmarc" class="inptexboslistspublic" name="marca" required>
                          <option value=""></option>
                          <?php foreach($marcas as $m): ?>
                            <option value="<?=$m->id;?>"><?=html_entity_decode($m->nombre);?></option>
                          <?php endforeach; ?>
                        </select>
                        <label class="labelboxinptext">Marca</label>
                      </div>

                      <div class="boxinputlists">
                        <select id="ifgoodc" class="inptexboslistspublic" name="listone" required>
                          <option value=""></option>
                          <?php foreach($categoria as $t):?>
                            <option value="<?=$t->id;?>"><?=html_entity_decode($t->nombre);?></option>
                          <?php endforeach; ?>
                        </select>
                        <label class="labelboxinptext">Categoria</label>
                      </div>

                      <div class="boxinputlists" style="display:none;">
                        <select id="ifgoodd" class="inptexboslistspublic" name="listtwo" disabled></select>
                        <label class="labelboxinptext">Sub categoria</label>
                      </div>

                      <div class="boxinputlists opcilinesviewbox">
                        <textarea cols="20" rows="2" data-editable="0" class="inptexboslistspublic hedboxhomeeditorsblok" name="listboxstrin" id="editor" style="resize:none;min-height:100px;max-height:500px;padding:5px;" required=""></textarea>
                        <label class="labelboxinptext">Caracteristicas</label>
                      </div>
                    </div>

                    <div class="aphlistbuttonnextopenbox">
                      <span class="aphlistbuttonnextopembox co0 pcol pcolh">Publicar</span>
                      <input id="blocknullfom12" type="submit">
                    </div>
                  </form>
                </div>
              </div>
              <script>initSample();</script>
                <script src="<?=$base."datos/source/scripts/editor.js";?>"></script>
            <?php elseif($urb[1]===$items_veficar->ukr): ?>
              <div class="container">
                <div class="contentboxbuttons">
                  <a href="<?=$base.'productos';?>"><div class="boxdatabuttompublic pcol pcolh co0">❮  Publicaciones </div></a>
                </div>
                <?php $irtm=DatosAdmin::porUkr_producto($urb[1]); ?>
                
                <div class="contenhead_products">
                  <span class="titulo_paginas_two_dettalles"><?=$irtm->nombre;?></span>

                  <?php if($usuario->es_administrador==1): ?>
                    <?php $stcok_item=DatosAdmin::cantidad_stock_de_producto_admin($irtm->id)->c;?>
                    <div class="box_head_products">
                      <label class="numbers_pag_head_products_label">Stock</label>
                      <?php if(!isset($stcok_item)): ?>
                        <span class="numbers_pag_head_products">0</span>
                      <?php else: ?>
                        <span class="numbers_pag_head_products"><?=$stcok_item;?></span>
                      <?php endif ?>
                    </div>
                  <?php else: ?>
                    <?php $stcok_item=DatosAdmin::cantidad_stock_de_producto($irtm->id,$_SESSION["admin_id"])->c;?>
                    <div class="box_head_products">
                      <label class="numbers_pag_head_products_label">Stock</label>
                      <?php if(!isset($stcok_item)): ?>
                        <span class="numbers_pag_head_products">0</span>
                      <?php else: ?>
                        <span class="numbers_pag_head_products"><?=$stcok_item;?></span>
                      <?php endif ?>
                    </div>
                  <?php endif ?>

                  <label class="numbers_pag_head_products_label">Acciones</label>
                  <?php if($usuario->es_administrador==1): ?>
                    <span data-modal-trigger="update_stock_data" class="button_acctions_datas_exel">Importar exel</span>
                    <div class="modal" data-modal-name="update_stock_data" data-modal-dismiss>
                      <div class="modal__dialog">
                        <header class="modal__header">
                          <h3 class="modal__title">Importar datos desde exel</h3>
                          <i class="modal__close" data-modal-dismiss>X</i>
                        </header>
                        <div class="modal__content">
                          <select class="select_document_view" id="proveedor_cpl<?=$irtm->id?>">
                            <?php $proveedores=DatosAdmin::mostar_proveedores(); ?>
                            <option>Selecciona un proveedor</option>
                            <?php foreach ($proveedores as $y): ?>
                              <option value="<?=$y->id;?>"><?=html_entity_decode($y->nombre);?></option>
                            <?php endforeach ?>
                          </select>

                          <select class="select_document_view" id="document<?=$irtm->id?>">
                            <?php $documents=DatosAdmin::view_documents(); ?>
                            <option>Selecciona documento</option>
                            <?php foreach ($documents as $y): ?>
                              <option value="<?=$y->id;?>"><?=html_entity_decode($y->nombre);?></option>
                            <?php endforeach ?>
                          </select>

                          <select class="select_document_view" id="sucursal<?=$irtm->id?>">
                            <?php $sucursales_b=DatosAdmin::Mostrar_sucursales(); ?>
                            <option>Selecciona sucursal</option>
                            <?php foreach ($sucursales_b as $s): ?>
                              <option value="<?=$s->id;?>"><?=html_entity_decode($s->nombre);?></option>
                            <?php endforeach ?>
                          </select>

                          <div>
                            <span class="addnewimageluis addnewimageluisboxus archive_process_datas_viewa" role="button" tabindex="1">
                              <img class="addnewimageluisimf addnewimageluisimftwos" src="<?=$base."datos/imagenes/icons/exel.png";?>" alt="" height="30" width="30">
                              <span class="contentaddimgs prev_names_acrchive">Importar datos</span>
                              <input class="addnewimageluisbotsccc actives_ac_archivos_data" type="file" id="imports_datas_archivos" name="exelpage" title="Selecciona un documento" required="" multiple="multiple" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                            </span>
                          </div>

                          <input type="button" class="butt_luis_two process_data_archivos process_data_archivos_acction" data-conf="<?=$irtm->id?>" value=" Procesar">
                        </div>
                      </div>
                    </div>
                    <?php $type_items_view_visual = DatosAdmin::Ver_tipo_deproducto_por_item($irtm->tipo);?>
                    <?php if($type_items_view_visual->model_exel): ?>
                      <a class="button_acctions_datas_exel" href="<?=$base."datos/source/".$type_items_view_visual->model_exel.".xlsx";?>" download>Base exel</a>
                    <?php endif ?>
                    
                  <?php endif ?>
                  <span class="button_acctions_datas_exel">Exportar exel</span>
                </div>
      
                <br>
                <?php $type_items_view = DatosAdmin::Ver_tipo_deproducto_por_item($irtm->tipo);?>
                <label><b><?=html_entity_decode($type_items_view->nombre);?></b></label><br>
                <div class="panel panel-default table_is_productos_lists_dos" id="table_is_productos_lists_dos">
                  <div class="panel-body panel_tabla">
                    <table class="table table_data_info_pages" id="table_is_productos_lists_tres">
                      <thead class="header_table_items_lists">
                        <?php $header_table_items_viewers=tables_in_pages_items::Mostrar_tabla_in_page_head_table($type_items_view->id_tabla);?>
                        <tr>
                          <td>Action</td>
                          <?php $contador=1; foreach ($header_table_items_viewers as $tbs => $ssf): ?>
                          <?php if ($tbs=="id"){
                          }elseif($ssf==null){
                          }else{
                            echo("<th>".$ssf."</th>");
                            $contador= $contador + 1;
                          }?>
                          <?php endforeach ?>
                        </tr>

                      </thead>
                      <tbody class="data_items_stock_controls">
                        <?php if($usuario->es_administrador==1): ?>
                          <?php $movstock=DatosAdmin::mostrar_productos_stock_lista_admin($irtm->id); ?>
                        <?php else: ?>
                          <?php $movstock=DatosAdmin::mostrar_productos_stock_lista($irtm->id,$_SESSION['admin_id']); ?>
                        <?php endif ?>
                        
                        <?php foreach ($movstock as $m): ?>
                          <?php $proveedor=DatosAdmin::poridproveedor($m->proveedor); ?>
                          <?php $docment=DatosAdmin::poriddocumento($m->documento); ?>
                          <tr>
                            <?php if($irtm->tipo==1): ?>
                              <td><span class="delete_button_in_stock_item" data="<?=$m->id;?>">Eliminar</span></td>
                              <td><?=$proveedor->nombre;?></td>
                              <td><?=$docment->nombre;?></td>
                              <td><?=$m->num_documento;?></td>
                              <td><?=$m->barcode;?></td>
                              <td><?=$m->make;?></td>
                              <td><?=$m->model;?></td>
                              <td><?=$m->series;?></td>
                              <td><?=$m->coa;?></td>
                              <td><?=$m->cpu;?></td>
                              <td><?=$m->cpu_speed;?></td>
                              <td><?=$m->ram;?></td>
                              <td><?=$m->hard_drive;?></td>
                              <td><?=$m->drivetype;?></td>
                              <td><?=$m->aditional_information;?></td>
                              <td><?=$m->other_information;?></td>
                              <td><?=$m->screen_size;?></td>
                              <td><?=$m->battery;?></td>
                              <td><?=$m->battery_test;?></td>
                              <td><?=$m->web_cam;?></td>
                            <?php elseif($irtm->tipo==2): ?>
                              <td><span class="delete_button_in_stock_item" data="<?=$m->id;?>">Eliminar</span></td>
                              <td><?=$proveedor->nombre;?></td>
                              <td><?=$docment->nombre;?></td>
                              <td><?=$m->num_documento;?></td>
                              <td><?=$m->barcode;?></td>
                              <td><?=$m->make;?></td>
                              <td><?=$m->model;?></td>
                              <td><?=$m->series;?></td>
                              <td><?=$m->form_factor;?></td>
                              <td><?=$m->coa;?></td>
                              <td><?=$m->cpu;?></td>
                              <td><?=$m->cpu_speed;?></td>
                              <td><?=$m->ram;?></td>
                              <td><?=$m->hard_drive;?></td>
                              <td><?=$m->drivetype;?></td>
                              <td><?=$m->aditional_information;?></td>
                              <td><?=$m->other_information;?></td>
                            <?php elseif($irtm->tipo==3): ?>
                              <td><span class="delete_button_in_stock_item" data="<?=$m->id;?>">Eliminar</span></td>
                              <td><?=$proveedor->nombre;?></td>
                              <td><?=$docment->nombre;?></td>
                              <td><?=$m->num_documento;?></td>
                              <td><?=$m->barcode;?></td>
                              <td><?=$m->make;?></td>
                              <td><?=$m->model;?></td>
                              <td><?=$m->series;?></td>
                              <td><?=$m->coa;?></td>
                              <td><?=$m->cpu;?></td>
                              <td><?=$m->cpu_speed;?></td>
                              <td><?=$m->ram;?></td>
                              <td><?=$m->hard_drive;?></td>
                              <td><?=$m->drivetype;?></td>
                              <td><?=$m->aditional_information;?></td>
                              <td><?=$m->other_information;?></td>
                              <td><?=$m->screen_size;?></td>
                              <td><?=$m->web_cam;?></td>
                              <td><?=$m->ac_adapter;?></td>
                            <?php elseif($irtm->tipo==4): ?>
                              <td><span class="delete_button_in_stock_item" data="<?=$m->id;?>">Eliminar</span></td>
                              <td><?=$proveedor->nombre;?></td>
                              <td><?=$docment->nombre;?></td>
                              <td><?=$m->num_documento;?></td>
                              <td><?=$m->barcode;?></td>
                              <td><?=$m->cpu;?></td>
                              <td><?=$m->cpu_speed;?></td>
                            <?php endif ?>
                          </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            <?php else: ?>
              <?php header('location:'.$base.'productos');?>
            <?php endif;?>
          <?php else: ?>
            <?php header('location:'.$base.'productos');?>
          <?php endif;?>
          <!-- end crear publicacion -->
        <?php else: ?>
          <!-- Publicaciones -->
          <div class="contenidoboxplasst">
            <div class="conten_controls_box_items">
              <h4 class="titulo_paginas">Productos</h4>
              <div class="caja_opcion_productos">
                <div class="box_select_categorias">
                  <label class="lb_box_categoria">Categorias</label>
                  <select class="input_text_foot input_text_category_seaching">
                    <?php foreach ($categoria as $k): ?>
                      <option <?php if($k->id==$usuario->categoria_prod_def){echo "selected";} ?> value="<?=$k->id;?>"><?=html_entity_decode($k->nombre);?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
              <!-- <div class="caja_opcion_productos">
                <input type="search" class="input_text_foot lista_filter_items_box_one" autocomplete="off" name="nombre" placeholder="Buscar." required="required">
                <label class="message_searching message_searching_list"></label>
              </div> -->
              <?php if($usuario->es_administrador==1): ?>
                <div class="contentboxbuttons">
                  <div class="butt_luis_one">
                    <a href="<?=$base.'productos/crear';?>">
                      <span class="add_producto_list">Agregar</span>
                    </a>
                  </div>
                </div>
              <?php endif ?>
            </div>

            
            <?php if($usuario->es_administrador==1): ?>
              <!-- admin publicaciones on -->
              <?php $total_productos=0;
              foreach($productos as $uss): ?>
                <?php $stcok_items=DatosAdmin::cantidad_stock_de_producto_admin($uss->id)->c; ?>
                <?php $total_productos +=$stcok_items; ?>
              <?php endforeach ?>

              <div class="box_search_in_page">
                <input type="text" class="burcador_en_listas_items" id="search" placeholder="Buscar item...">
              </div>
              <div class="result_seaching_pag" style="display:block;width:100%;">
                <div class="titulo_paginas"><?=$total_productos." Productos";?></div>
                <?php foreach($productos as $ite): 
                  $stcok_item=DatosAdmin::cantidad_stock_de_producto_admin($ite->id)->c;?>
                  <div class="contentboxitemslist">
                      <div class="boxdisplay_stock">
                        <span class="tluisboxunliprice stock_view_page_items stockviewers">
                          <label class="labelstockitem">STOCK</label>
                          <span class="stock_view_init<?=$ite->id?> "><?=$stcok_item;?></span>
                        </span>
                      </div>

                      <div class="detaillsboxlists">
                        <div class="tluisboxunli">
                          <?=html_entity_decode($ite->nombre);?>
                        </div>
                        <?php if (is_numeric($ite->precio)): ?>
                          
                          
                          <?php if ($ite->moneda_a): ?>
                            <?php $moneda_por_id_a=DatosAdmin::Mostrar_las_monedas_por_id($ite->moneda_a)->simbolo; ?>
                          <?php else: ?>
                            <?php $moneda_por_id_a=false; ?>
                          <?php endif ?>
                          <?php if ($ite->moneda_b): ?>
                            <?php $moneda_por_id_b=DatosAdmin::Mostrar_las_monedas_por_id($ite->moneda_b)->simbolo; ?>
                          <?php else: ?>
                            <?php $moneda_por_id_b=false; ?>
                          <?php endif ?>
                          <span class="tluisboxunliprice"><?="X.M. ".$moneda_por_id_a.". ".number_format($ite->precio,2,".",",");?></span>
                          <span class="tluisboxunliprice"><?="P.U. ".$moneda_por_id_b.". ".number_format($ite->precio_final,2,".",",");?></span>
                        <?php else: ?>
                        <?php endif ?>

                        <?php if ($ite->estado): ?>
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
                          <a href="<?=$base."productos/".$ite->ukr;?>"><div class="boxoptionslistitems">Ver publicacion</div></a>
                          <?php if($usuario->es_administrador==1): ?>
                            <div class="boxoptionslistitems" data-modal-trigger="detaisorder<?=$ite->id?>" data-config="<?=$ite->id;?>">
                              Actualizar stock
                            </div>

                            <a href="<?=$base."productos/editar/".DatosAdmin::urlpersona($ite->id);?>">
                              <div class="boxoptionslistitems">Editar publicacion</div>
                            </a>

                            <a href="<?=$base."productos/completar/".DatosAdmin::urlpersona($ite->id);?>">
                              <div class="boxoptionslistitems">Agregar caracteristicas</div>
                            </a>

                            <div class="boxoptionslistitems boxitem_cl" data-config="<?=$ite->id;?>">Eliminar</div>
                          <?php endif ?>
                        </div>

                        <?php if($usuario->es_administrador==1): ?>
                          <div class="modal" data-modal-name="detaisorder<?=$ite->id?>" data-modal-dismiss>
                            <div class="modal__dialog">
                              <header class="modal__header">
                                <h3 class="modal__title">STOCK ACTUAL ( <span class="stock_view_init<?=$ite->id?>"><?=$stcok_item;?></span> )</h3>
                                <i class="modal__close" data-modal-dismiss>X</i>
                                <?php $irtms=DatosAdmin::porUkr_producto($ite->ukr);?>
                                <p><?=html_entity_decode($ite->nombre);?></p>
                              </header>
                              <div class="modal__content">
                                <select class="select_document_view" id="sucursal<?=$ite->id?>">
                                  <?php $sucursales_b=DatosAdmin::Mostrar_sucursales(); ?>
                                  <option value="">Selecciona sucursal</option>
                                  <?php foreach ($sucursales_b as $s): ?>
                                    <option value="<?=$s->id;?>"><?=html_entity_decode($s->nombre);?></option>
                                  <?php endforeach ?>
                                </select>

                                <select class="select_document_view" id="proveedor_cpl<?=$ite->id?>">
                                  <?php $proveedores=DatosAdmin::mostar_proveedores(); ?>
                                  <option value="">Selecciona un proveedor</option>
                                  <?php foreach ($proveedores as $y): ?>
                                    <option value="<?=$y->id;?>"><?=html_entity_decode($y->nombre);?></option>
                                  <?php endforeach ?>
                                </select>

                                <select class="select_document_view" id="document<?=$ite->id?>">
                                  <?php $documents=DatosAdmin::view_documents(); ?>
                                  <option value="">Selecciona documento</option>
                                  <?php foreach ($documents as $y): ?>
                                    <option value="<?=$y->id;?>"><?=html_entity_decode($y->nombre);?></option>
                                  <?php endforeach ?>
                                </select>

                                <input type="number" placeholder="NUMERO DE DOCUMENTO" id="numdoc<?=$ite->id?>">
                                <?php if($irtms->tipo==4):?>
                                  <input type="text" placeholder="Serie" id="barcode<?=$ite->id?>">
                                <?php else: ?>
                                  <input type="text" placeholder="Codigo de barras" id="barcode<?=$ite->id?>">
                                <?php endif ?>

                                <?php if($irtms->tipo==4):?>
                                  <input type="text" placeholder="CPU" id="cpu<?=$ite->id?>">
                                  <input type="text" placeholder="CPU_SPEED" id="cpu_speed<?=$ite->id?>">
                                  <br>
                                  <input type="button" class="butt_luis_two select_stock_item_imventori" data-conf="<?=$ite->id?>" value="Actualizar stock">
                                <?php else: ?>
                                  <input type="button" class="butt_luis_two select_stock_item_imventori" data-conf="<?=$ite->id?>" value="Actualizar stock">
                                <?php endif ?>
                              </div>
                            </div>
                          </div>
                        <?php endif ?>
                        
                      </div>
                    </div>
                <?php endforeach ?>
              </div>
              <div class="optlistnulldop" data-nullb="<?=$base;?>"></div>
              <!-- admin publicaciones off -->
            <?php else: ?>
              <!-- User publicaciones on -->
              <?php $total_productos=0; foreach($productos as $us): ?>
                <?php $stcok_item=DatosAdmin::cantidad_stock_de_producto($us->id,$_SESSION["admin_id"])->c; ?>
                <?php $total_productos +=$stcok_item; ?>
              <?php endforeach ?>
              <div class="result_seaching_pag" style="display:block;width:100%;">
                <div class="titulo_paginas"><?=$total_productos." Productos";?></div>
                <?php foreach ($productos as $t): 
                  $stcok_item=DatosAdmin::cantidad_stock_de_producto($t->id,$_SESSION["admin_id"])->c;?>
                  <?php if($stcok_item>0): ?>
                    <div class="contentboxitemslist">
                      <div class="boxdisplay_stock">
                        <span class="tluisboxunliprice stock_view_page_items">
                          <label class="labelstockitem">STOCK</label>
                          <span class="stock_view_init<?=$t->id?>"><?=$stcok_item;?></span>
                        </span>
                      </div>

                      <div class="detaillsboxlists">
                        <div class="tluisboxunli">
                          <?=html_entity_decode($t->nombre);?>
                        </div>
                        <?php if (is_numeric($t->precio)): ?>
                          <span class="tluisboxunliprice"><?="$. ".number_format($t->precio,2,".",",");?></span>
                        <?php else: ?>
                        <?php endif ?>

                        <?php if ($t->estado): ?>
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
                          <a href="<?=$base."productos/".$t->ukr;?>"><div class="boxoptionslistitems">Ver publicacion</div></a>
                          <?php if($usuario->es_administrador==1): ?>
                            <div class="boxoptionslistitems" data-modal-trigger="detaisorder<?=$t->id?>" data-config="<?=$t->id;?>">
                              Actualizar stock
                            </div>

                            <a href="<?=$base."productos/editar/".DatosAdmin::urlpersona($t->id);?>">
                              <div class="boxoptionslistitems">Editar publicacion</div>
                            </a>

                            <div class="boxoptionslistitems boxitem_cl" data-config="<?=$t->id;?>">Eliminar</div>
                          <?php endif ?>
                        </div>

                        <?php if($usuario->es_administrador==1): ?>
                          <div class="modal" data-modal-name="detaisorder<?=$t->id?>" data-modal-dismiss>
                            <div class="modal__dialog">
                              <header class="modal__header">
                                <h3 class="modal__title">STOCK ACTUAL ( <span class="stock_view_init<?=$t->id?>"><?=$stcok_item;?></span> )</h3>
                                <i class="modal__close" data-modal-dismiss>X</i>
                                <?php $irtms=DatosAdmin::porUkr_producto($t->ukr);?>
                                <p><?=html_entity_decode($t->nombre);?></p>
                              </header>
                              <div class="modal__content">
                                <select class="select_document_view" id="sucursal<?=$t->id?>">
                                  <?php $sucursales_b=DatosAdmin::Mostrar_sucursales(); ?>
                                  <option value="">Selecciona sucursal</option>
                                  <?php foreach ($sucursales_b as $s): ?>
                                    <option value="<?=$s->id;?>"><?=html_entity_decode($s->nombre);?></option>
                                  <?php endforeach ?>
                                </select>

                                <select class="select_document_view" id="proveedor_cpl<?=$t->id?>">
                                  <?php $proveedores=DatosAdmin::mostar_proveedores(); ?>
                                  <option value="">Selecciona un proveedor</option>
                                  <?php foreach ($proveedores as $y): ?>
                                    <option value="<?=$y->id;?>"><?=html_entity_decode($y->nombre);?></option>
                                  <?php endforeach ?>
                                </select>

                                <select class="select_document_view" id="document<?=$t->id?>">
                                  <?php $documents=DatosAdmin::view_documents(); ?>
                                  <option value="">Selecciona documento</option>
                                  <?php foreach ($documents as $y): ?>
                                    <option value="<?=$y->id;?>"><?=html_entity_decode($y->nombre);?></option>
                                  <?php endforeach ?>
                                </select>

                                <input type="number" placeholder="NUMERO DE DOCUMENTO" id="numdoc<?=$t->id?>">
                                <?php if($irtms->tipo==4):?>
                                  <input type="text" placeholder="Serie" id="barcode<?=$t->id?>">
                                <?php else: ?>
                                  <input type="text" placeholder="Codigo de barras" id="barcode<?=$t->id?>">
                                <?php endif ?>

                                <?php if($irtms->tipo==4):?>
                                  <input type="text" placeholder="CPU" id="cpu<?=$t->id?>">
                                  <input type="text" placeholder="CPU_SPEED" id="cpu_speed<?=$t->id?>">
                                  <br>
                                <input type="button" class="butt_luis_two select_stock_item_imventori" data-conf="<?=$t->id?>" value="Actualizar stock">
                                <?php endif ?>
                              </div>
                            </div>
                          </div>
                        <?php endif ?>
                        
                      </div>
                    </div>
                  <?php endif ?>
                  <!-- fin de item -->
                <?php endforeach ?>
              </div>
              <div class="optlistnulldop" data-nullb="<?=$base;?>"></div>
              <!-- User publicaciones off -->
            <?php endif;?>
          </div>
          <!-- end publicaciones -->
        <?php endif;?>
      <?php endif ?>
    </div>
  <?php else: ?>
    <?php //header('location:'.$base.'panel');?>
  <?php endif;?>

<?php else: ?>
  <?php header('location:'.$base.'acceder');?>
  <?php endif;?>