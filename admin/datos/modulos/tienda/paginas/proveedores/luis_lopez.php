
<?php
$usuarios = DatosAdmin::mostar_proveedores();
$base = Luis::basepage("base_page_admin");
$urb=explode("/", $_GET["paginas"]);
if(isset($urb[1])){$urbp=$urb[1];}else{$urbp=false;}
if(isset($urb[2])){$urbs=$urb[2];}else{$urbs=false;}
?>

<section class="vista_preb_page">
  <ol class="box_visw">
    <li><a href="<?=$base;?>">Inicio</a></li>
    <?php if($urbp==="add"): ?>
    <li><a href="<?=$base."proveedores";?>">Tiendas</a></li>
    <li class="active">Add</li>
    <?php elseif($urbp==="update"): ?>
    <li><a href="<?=$base."proveedores";?>">Proveedores</a></li>
    <li class="active">Update</li>
    <?php elseif($urbp==="userview"): ?>
    <li><a href="<?=$base."proveedores";?>">Proveedores</a></li>
    <li class="active"><?=DatosAdmin::poridproveedor($urb[2])->nombre;?></li>
    <?php else: ?>
    <li class="active">Proveedores</li>
    <?php endif ?>
  </ol>
</section>
<style type="text/css">
.selectboxs{display:block;}
.selectlist{display:inline-block;width:100%;max-width:150px;cursor:pointer;}
.selectlistcontent{cursor:pointer;text-align:center;border-radius:3px;box-shadow:0 2px 4px 0 rgba(219, 215, 215, 0);border:solid 2px transparent;background:#fff;max-width:150px;height:150px;padding:15px;display:grid;grid-gap:15px;place-content:center;transition:.3s ease-in-out all;}
.selectlistcontent img{width:100px;margin:0 auto;cursor:pointer;}
.selectlistcontent h4{font-size:16px;letter-spacing:-0.24px;text-align:center;color:#1f2949;}
.selectlistcontent h5{font-size:14px;line-height:1.4;text-align:center;color:#686d73;}
.selected-label{position:relative;}
.selected-label input{display:none;}
.selected-label .icon{width:20px;height:20px;border:solid 2px #e3e3e3;border-radius:50%;position:absolute;top:15px;left:15px;transition:.3s ease-in-out all;transform:scale(1);z-index:1;}
.selected-label input:checked + .icon{background:#3057d5;border-color:#3057d5;transform:scale(1.2);}
.selected-label input:checked ~ .selectlistcontent{box-shadow:0 2px 4px 0 rgba(219,215,215,0.5);border:solid 2px #3057d5;}
.none_sucursales{display:none;visibility:hidden;}
.view_sucursales{display:block;visibility:visible;}
</style>
<?php if(count($urb)>3): header('location:'.$base.'usuarios');?>
  <?php else: ?>
<?php if(isset($urb[1])): ?>

<?php if($urb[1]==="add"): ?>
  <div class="contentlists_items">
    <h4 class="titulo_paginas">Nuevo Proveedor</h4>
    <div class="message"></div>
    <a class="butt_back" href="<?=$base."proveedores/";?>">❮ atras</a>

    <input id="ruc" class="input_luis_two" type="text" placeholder="RUC" autocomplete="off">
    <input id="nombre" class="input_luis_two" type="text" placeholder="Nombres" autocomplete="off">
    <input id="celular" class="input_luis_two" type="text" placeholder="Celular" autocomplete="off">
    <input id="direccion" class="input_luis_two" type="text" placeholder="Direccion" autocomplete="off">
    <hr>
    <div class="butt_luis_one agregarproveedor"><span class="add_modal" id="btn-modal">Agregar</span></div>
  </div>
<?php elseif($urb[1]==="update"):
  $proveedors=DatosAdmin::poridproveedor($urb[2]);
?>
  <div class="contentlists_items">
    <h4 class="titulo_paginas">Actualizar Proveedor</h4>
    <div class="message" btr="<?=$base;?>"></div>
    <a class="butt_back" href="<?=$base."proveedores/";?>">❮ atras</a>

    <input id="ruc" class="input_luis_two" type="text" placeholder="RUC" autocomplete="off" value="<?=$proveedors->ruc;?>">
    <input id="nombre" class="input_luis_two" type="text" placeholder="Nombre" autocomplete="off" value="<?=html_entity_decode($proveedors->nombre);?>">
    <input id="celular" class="input_luis_two" type="text" placeholder="Celular" autocomplete="off" value="<?=$proveedors->celular;?>">
    <input id="direccion" class="input_luis_two" type="text" placeholder="Direccion" autocomplete="off" value="<?=html_entity_decode($proveedors->direccion);?>">
    <hr>
    <input id="id" type="hidden" name="id" value="<?=$proveedors->id?>">
    <div class="butt_luis_one acctualizarproveedor"><span>Actualizar</span></div>
  </div>
  <?php elseif($urb[1]==="userview"): $user=DatosAdmin::poridproveedor($urb[2]);?>
  <div class="contentlists_items">
    <h4 class="titulo_paginas"><?=html_entity_decode($user->nombre);?></h4>
    <div class="message" btr="<?=$base;?>"></div>
    <a class="butt_back" href="<?=$base."proveedores/";?>">❮ atras</a>
    <div class="viewuserlist">
      <div class="itemlist"><label>RUC:</label><?=$user->ruc;?></div>
      <div class="itemlist"><label>NOMBRES:</label><?=html_entity_decode($user->nombre);?></div>
      <div class="itemlist"><label>CONTACTO:</label><?=$user->celular;?></div>
      <div class="itemlist"><label>DIRECCION:</label><?=html_entity_decode($user->direccion);?></div>
    </div>
    <hr>
    <div class="butt_luis_one"><a href="<?=$base."proveedores/update/".$user->id;?>"><span>Actualizar datos</span></a></div>
  </div>

  <style type="text/css">
    .viewuserlist{padding:4px;border:2px solid #888;margin:10px 0;box-sizing:border-box;display:block;}
    .itemlist{padding:5px;border-bottom:2px solid #ddd;display:block;box-sizing:border-box;}
    .itemlist label{width:120px;display:inline-block;background:#ddd;padding:5px;margin-right:10px;box-sizing:border-box;}
    @media screen and (max-width: 200px){
      .viewuserlist{width:100%;}
      .itemlist{display:block;margin:auto;width:100%;padding:5px 0;word-wrap:break-word;}
    }
  </style>
  <?php else: header('location:'.$base.'proveedores');?>
 <?php endif ?>
<?php else: ?>
  <h4 class="titulo_paginas">Proveedores</h4>
  <div class="message"></div>
  <a class="add_itembox" href="<?=$base."proveedores/add"?>">
    <div class="butt_luis_one"><span>Agregar</span></div>
  </a>
  <hr>
  <div class="contentlists_items">
    <?php if(count($usuarios)): ?>
      <?php foreach ($usuarios as $user): ?>
        <div id="<?="provedorsdels".$user->id;?>" class="itemsviewslist">
         
          <div class="contensviewsitstr">
            <h4 class="nameshiff">
               <?php if(!$user->nombre==null){echo($user->nombre);}else{echo('-');}?>
            </h4>
            <span class="nameshiffs"><span>RUC: </span> <?=$user->ruc;?></span>
            <div class="namesdeskp"><span>Celular:  </span> <?=$user->celular;?></div>
            <div class="namesdeskp"><span>Direccion:  </span> <?=$user->direccion;?></div>
          </div>
          <div class="opcionesblocklist opcionesblocklist1000boxlist">
            <a class="opcionesblocklist100 opcionesblocklist1000" href="javascript:void(0)">
              <span class="opcionesblocklistoption opcionesblocklistoption100">
                <i class="opcionesblocklistoption200 opcionesblocklistoption300">•••</i>
              </span>
            </a>
            <div class="boxoptionslistlines">
              <div class="makposdind"></div>
              <a href="<?=$base."proveedores/userview/".$user->id;?>"><div class="boxoptionslistitems">Ver proveedor</div></a>
              <a href="<?=$base."proveedores/update/".$user->id;?>"><div class="boxoptionslistitems">Editar proveedor</div></a>
              <?php if(isset($user->codigo)):?>
                <?php if($user->esta_activado):?>
                  <a id="<?=$user->id;?>" class="usuariospt usuariospt<?=$user->id; ?>"><div class="boxoptionslistitems">Desactivar</div></a>
                <?php else:?>
                  <a id="<?=$user->id;?>" class="usuariospt usuariospt<?=$user->id; ?>"><div class="boxoptionslistitems">Activar</div></a>
                <?php endif;?>
              <?php endif;?>
              <div class="boxoptionslistitems proveedor_eliminar" id="<?=$user->id?>" data_rt="<?=$base;?>" data-config="<?=$user->id?>">Eliminar</div>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    <?php else: ?>
      <div class="noitemsnull"><h3>No hay usuarios</h3></div>
    <?php endif ?>
  </div>
<?php endif ?>
<?php endif ?>