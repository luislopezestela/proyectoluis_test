<?php
$valortotaldecompra=0;
$menu=Luis::menu();
if(isset($_SESSION["usuarioid"])){
    $usuario=DatosPagina::persona($_SESSION["usuarioid"]);
}
if(isset($_GET["paginas"])) {
    $urb=explode("/", $_GET["paginas"]);
    if(isset($urb[1])){$urbp=$urb[1];}else{$urbp=false;}
}
if(isset($usuario->foto)==null){
    $imagenper=DatosPagina::confver("base")."admin/datos/imagenes/perfil.png";
}else{
    if($usuario->tipo==1){
        $imagenper=DatosPagina::confver("base")."datos/sourse/personas/tiendas/".$usuario->id."/".$usuario->foto;
    }else{
        $imagenper=DatosPagina::confver("base")."datos/sourse/personas/clientes/".$usuario->id."/".$usuario->foto;
    }
}
$header_logotipo=false;
$logotipclass = Luis::dato("luis_logo")->valor;

if($logotipclass){
    $image_logo="admin/datos/imagenes/pagina/".$logotipclass;
    if(is_file($image_logo)){
        $header_logotipo="<img height=\"80\" src='".DatosPagina::confver("base")."/admin/datos/imagenes/pagina/".$logotipclass."'>";
    }else{
        $header_logotipo="<img height=\"80\" src='".DatosPagina::confver("base")."/admin/datos/imagenes/icons/foto.png'>";
    }
}

if (isset($_SESSION["carrito"])=='0'){
    $header_carrito_ct=0;
}else{
    foreach($_SESSION['carrito']as$cantidadtotalcarrito) {
        $valortotaldecompra += $cantidadtotalcarrito["q"];
    }
    $header_carrito_ct=$valortotaldecompra;
}
$menupage_ons="";
if(!$menu==null){
    foreach($menu as $m){
        $urlmenu=false;
        if($m->nombre!='soporte'){
            if(isset($m->nombre)){
                $urlmenu=$m->nombre;
            }
            $menupage_ons.="<li class=\"".$m->ukr."_page li_menu ".Luis::currentpagemenu($m->ukr,$m->home)."\">
                <a class=\"menu menupagecurrent\" aria-label=\"".$m->ukr."\" role=\"link\" href=\"".DatosPagina::confver("base").$urlmenu."\">".$m->label_menu."</a>
                </li>\n";
        }
    }
}
$menupage_onp="";
if(!$menu==null){
    foreach($menu as $m){
        $urlmenutwo=false;
        if($m->nombre=='soporte'){
            if(isset($m->nombre)){$urlmenutwo=$m->nombre;}
            $menupage_onp.="<li class=\"".$m->ukr."_page li_menu ".Luis::currentpagemenu($m->ukr,$m->home)."\">";
                $menupage_onp.="<a class=\"menu menupagecurrent\" aria-label=\"".$m->nombre."\" role=\"link\" href=\"".DatosPagina::confver("base").$urlmenutwo."\">".$m->label_menu."</a>";
            $menupage_onp.="</li>\n";
        }
    }
}
?>
<header class="header">
    <div class="contenedor_header_top">
        <div class="contenedor_header_top_contenido">
            <div class="contenedor_header_top_box">
                <div class="contenedor_header_top_b2">
                    <a class="contenedor_header_top_logo"><?=$header_logotipo;?></a>
                </div>
                <div class="contenedor_header_top_b9">
                    <div class="contenedor_header_top_cart">
                        <div class="top_header_top_buscar">
                            <input autocomplete="off" type="search" id="searchlist" placeholder="Buscar.">
                        </div>
                        <div class="top_header_top_cart">
                            <!-- # imagen de perfil usuario -->
                            <div class="<?="mens_perf_nots09 ".Luis::currentpagemenu("perfil",false)." perfil_page";?>">
                                <a class="usernoneviewcartbox menupagecurrent" href="<?=DatosPagina::confver("base")."perfil";?>" aria-label="perfil" role="link">
                                    <div class="cdfdperflcontblius">
                                        <div class="csdperflcont qfrr9uorilb" role="button" tabindex="0">
                                            <div class="qfrr9uorilb">
                                                <svg class="perf767fildobs" data-vc-ignore-dynamic="1" role="none">
                                                    <mask id="jsc_c_9">
                                                        <circle cx="24" cy="24"  fill="white" r="24"></circle>
                                                    </mask>
                                                    <g mask="url(#jsc_c_9)">
                                                        <image id="imagopedperfds" x="0" y="0" height="100%" preserveAspectRatio="xMidYMid slice" width="100%" xlink:href="<?=$imagenper;?>" style="height:49px;width:49px;"></image>
                                                        <circle class="mlqo0dh0gtd " cx="24" cy="24" r="24"></circle>
                                                    </g>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- # imagen de perfil usuario -->
                        </div>
                        <div class="top_header_top_cart">
                            <div class="<?="mens_perf_nots09 ".Luis::currentpagemenu("carrito",false)." carrito_page mens_perf_nots09200"; ?>">
                                <a href="<?=DatosPagina::confver("base")."carrito";?>" class="menupagecurrent" aria-label="carrito" role="link" id="open_opder_list">
                                    <div class="cdfdperflcontbliustwo">
                                        <div class="csdperflcont qfrr9uorilb" role="button" tabindex="0">
                                            <div class="qfrr9uorilb">
                                                <span class="shop_store_box"><?=$header_carrito_ct;?></span>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="perf767fildobs cart_body_up" style="height:41px;width:41px;" viewBox="0 0 512.001 512.001" xml:space="preserve">
                                                    <path d="M503.142,79.784c-7.303-8.857-18.128-13.933-29.696-13.933H176.37c-6.085,0-11.023,4.938-11.023,11.023c0,6.085,4.938,11.023,11.023,11.023h297.07c5.032,0,9.541,2.1,12.688,5.914c3.197,3.88,4.475,8.995,3.511,13.972l-44.054,220.282c-1.709,7.871-8.383,13.366-16.232,13.366H184.323L83.158,36.854C77.69,21.234,62.886,10.74,45.932,10.74c-0.005,0-0.011,0-0.017,0c-14.38,0.496-28.963,0.491-32.535,0.248c-3.555-0.772-7.397,0.22-10.152,2.976c-4.305,4.305-4.305,11.282,0,15.587c3.412,3.412,4.564,4.564,43.068,3.23c7.22,0,13.674,4.564,15.995,11.188l103.618,311.962c1.499,4.503,5.71,7.545,10.461,7.545h252.982c18.31,0,33.841-12.638,37.815-30.909l44.109-220.525C513.503,100.513,510.544,88.757,503.142,79.784z"></path>
                                                    <path d="M424.392,424.11H223.77c-6.785,0-13.162-4.674-15.46-11.233l-21.495-63.935c-1.94-5.771-8.207-8.885-13.961-6.934c-5.771,1.935-8.874,8.19-6.934,13.961l21.539,64.061c5.473,15.625,20.062,26.119,36.31,26.119h200.622c6.085,0,11.023-4.933,11.023-11.018S430.477,424.11,424.392,424.11z"></path>
                                                    <path d="M231.486,424.104c-21.275,0-38.581,17.312-38.581,38.581s17.306,38.581,38.581,38.581s38.581-17.312,38.581-38.581S252.761,424.104,231.486,424.104z M231.486,479.22c-9.116,0-16.535-7.419-16.535-16.535c0-9.116,7.419-16.535,16.535-16.535c9.116,0,16.535,7.419,16.535,16.535C248.021,471.802,240.602,479.22,231.486,479.22z"></path>
                                                    <path d="M424.392,424.104c-21.269,0-38.581,17.312-38.581,38.581s17.312,38.581,38.581,38.581c21.269,0,38.581-17.312,38.581-38.581S445.661,424.104,424.392,424.104z M424.392,479.22c-9.116,0-16.535-7.419-16.535-16.535c0-9.116,7.419-16.535,16.535-16.535c9.116,0,16.535,7.419,16.535,16.535C440.927,471.802,433.508,479.22,424.392,479.22z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contenedor_header_menu">
        <nav id="header">
            <ul class="on_displ_menu_line">
                <div class="perf_mens_subs_pl900 clperflleft">
                    <?=html_entity_decode($menupage_ons);?>
                </div>
                <div class="perf_mens_subs_pl900 clperfllrih">
                    <?=$menupage_onp;?>
                </div>
            </ul>
        </nav>
    </div>
</header>