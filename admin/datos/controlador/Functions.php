<?php
/**
 * Luis lopez estela funcrions
 */
class Functions{

    public static function cuenta_regresiva($year, $month, $day, $hour, $minute, $second){
    	global $return;
    	global $countdown_date;
    	$countdown_date = mktime($hour, $minute, $second, $month, $day, $year);
    	$today = time();
    	$diff = $countdown_date - $today;
    	if ($diff < 0)$diff = 0;
    	$dl = floor($diff/60/60/24);
    	$hl = floor(($diff - $dl*60*60*24)/60/60);
    	$ml = floor(($diff - $dl*60*60*24 - $hl*60*60)/60);
    	$sl = floor(($diff - $dl*60*60*24 - $hl*60*60 - $ml*60));
    	// OUTPUT
    	$resultado = "\n<br>Today's date ".date("F j, Y, g:i:s A")."<br/>";
    	$resultado .=  "Countdown date ".date("F j, Y, g:i:s A",$countdown_date)."<br/>";
    	$resultado .=  "\n<br>";
    	$return = array($dl, $hl, $ml, $sl);
    	return $return;
    }


    public static function horasdeminutos($time, $format = '%g:%02d') {
    	if($time < 1){
    		return;
    	}
    	$hours = floor($time / 60);
    	$minutes = ($time % 60);
    	return sprintf($format, $hours, $minutes);
    }

    public static function sacarhoras($m){
    	$d = (int)($m/1440);
    	$hp = (int)($m/60);
    	$m -= $d*1440;
    	$h = (int)($m/60);
    	$m -= $h*60;
    	return array("horas" => $hp, "minutos" => $m);
    }

    public static function sacarhorasdos($m){
    	$d = (int)($m/1440);
    	$m -= $d*1440;
    	$h = (int)($m/60);
    	$m -= $h*60;
    	return array("dias" => $d, "horas" => $h, "minutos" => $m);
    }

    public static function toHours($min,$type){
    	$sec = $min * 60;
    	$dias=floor($sec/86400);
    	$mod_hora=$sec%86400;
    	$horas=floor($mod_hora/3600); 
    	$mod_minuto=$mod_hora%3600;
    	$minutos=floor($mod_minuto/60);
    	if($horas<=0){
    		$text = $minutos.' min';
    	}elseif($dias<=0){
    		if($type=='round'){
    			$text = $horas.' hrs';
    		}else{
    			$text = $horas.":".$minutos;
    		}
    	}else{
    		if($type=='round'){
    			$text = $dias.' dias';
    		}else{
    			$text = $dias." dias ".$horas." hrs ".$minutos." min";
    		}
    	}
    	return $text; 
    }

    public static function horasdeminutosdos($time, $format = '%G:%02d:%s'){
    	if($time < 1){
    		return;
    	}
    	$hours = floor($time / 60);
    	$minutes = ($time % 60);
    	$segundos = 00;
    	return sprintf($format, $hours, $minutes, $segundos);
    }

    public static function _hace($tm,$rcs = 0){
    	$cur_tm = time(); $dif = $cur_tm-$tm;
    	$pds = array('segundo','minuto','hora','dia','semana','mes','año','decada');
        $lngh = array(1,60,3600,86400,604800,2630880,31570560,315705600);
        for($v = sizeof($lngh)-1; ($v >= 0)&&(($no = $dif/$lngh[$v])<=1); $v--);if($v < 0) $v = 0; $_tm = $cur_tm-($dif%$lngh[$v]);
        $no = floor($no); if($no <> 1) $pds[$v] .='s'; $x=sprintf("%d %s ",$no,$pds[$v]);
        if(($rcs == 1)&&($v >= 1)&&(($cur_tm-$_tm) > 0)) $x .= time_ago($_tm);
        return $x;
    }

    public static function fechasluislopes($fecha) {
        $fecha = substr($fecha, 0, 10);
        $numeroDia = date('d', strtotime($fecha));
        $dia = date('l', strtotime($fecha));
        $mes = date('F', strtotime($fecha));
        $anio = date('Y', strtotime($fecha));
        $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
        $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        $nombredia = str_replace($dias_EN, $dias_ES, $dia);
        $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
        return $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;
    }


    public static function fechafinalizacion ($fecha) {
        $fecha = substr($fecha, 0, 10);
        $numeroDia = date('d', strtotime($fecha));
        $dia = date('l', strtotime($fecha));
        $mes = date('F', strtotime($fecha));
        $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
        $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        $nombredia = str_replace($dias_EN, $dias_ES, $dia);
        $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
        return $nombredia." ".$numeroDia." de ".$nombreMes;
    }

    public static function fechasluislopesmeses ($fecha) {
        $fecha = substr($fecha, 0, 10);
        $mes = date('F', strtotime($fecha));
        $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
        return $nombreMes;
    }

     public static function fechasluislopesmesesdos($fecha) {
        $fecha = substr($fecha, 0, 10);
        $mes = date('F', strtotime($fecha));
        $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
        return $nombreMes;
    }

    public static function mostrarsemanas($mes,$anno){        
        $ultimo_dia = date("d",mktime(0,0,0,$mes+1,0,$anno));
        $semanas = array();
        $cantidad_semanas = 0;
        $inicio = 1;
        $fin = 0;
        $dia_semana = '';
        for($i = 1;$i<=$ultimo_dia;$i++){
            $fecha = mktime(0,0,0,$mes,$i,$anno);
            $dia_semana = date('w',($fecha));
            if($dia_semana == 0){
                $semanas[$cantidad_semanas] = array('inicio' => $inicio,'fin'=>$i);
                $inicio = $i+1;
                $cantidad_semanas++;
            }
        }
        $ultima_semana = end($semanas);
        if($ultima_semana['fin'] != $ultimo_dia){
            $semanas[$cantidad_semanas] = array('inicio' => $inicio,'fin' => $ultimo_dia);
        }
        return $semanas;
    }

    public static function fechasluislopesdiassds ($fecha) {
        $fecha = substr($fecha, 0, 10);
        $numeroDia = date('d', strtotime($fecha));
        $dia = date('l', strtotime($fecha));
        $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
        $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        $nombredia = str_replace($dias_EN, $dias_ES, $dia);
        return $nombredia;
    }

    public static function fechasluislopesdiass ($fecha) {
        $fecha = substr($fecha, 0, 10);
        $numeroDia = date('d', strtotime($fecha));
        $dia = date('l', strtotime($fecha));
        $mes = date('F', strtotime($fecha));
        $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
        $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        $nombredia = str_replace($dias_EN, $dias_ES, $dia);
        $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
        return $nombredia." ".$numeroDia." de ".$nombreMes;
    }

    public static function horasluislopes ($hora) {
        $numeroDia = date('g:i A', strtotime($hora));
        return $numeroDia;
    }

    public static function header_disp(){
        $sql = "select * from header_page where activo=1";
        $query = Ejecutor::doit($sql);
        return Modelo::one($query[0],new DatosPagina());
    }
    public static function footer_disp(){
        $sql = "select * from footer_page where activo=1";
        $query = Ejecutor::doit($sql);
        return Modelo::one($query[0],new DatosPagina());
    }

    public static function header_view($header_l){
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

        $header="";
        if($header_l=="header_base"){
            $header.="<header class=\"header\">";
                $header.="<div class=\"contenedor_header_menu\">";
                    $header.="<nav id=\"header\">";
                        $header.="<ul class=\"on_displ_menu_line\">";
                            $header.="<div class=\"perf_mens_subs_pl900 clperflleft\">";
                                $logotipclass = Luis::dato("luis_logo")->valor;
                                if($logotipclass){
                                    $image_logo="admin/datos/imagenes/pagina/".$logotipclass;
                                    if(is_file($image_logo)){
                                        $header.="<img class='logo_principal' src='".DatosPagina::confver("base")."/admin/datos/imagenes/pagina/".$logotipclass."'>";
                                    }else{
                                        $header.="<img class='logo_principal' src='".DatosPagina::confver("base")."/admin/datos/imagenes/icons/foto.png'>";
                                    }
                                }

                                if(!$menu==null){
                                    foreach($menu as $m){
                                        $urlmenu=false;
                                        if($m->nombre!='acceder'){
                                            if(isset($m->nombre)){
                                                $urlmenu=$m->nombre;
                                            }
                                            $header.="<li class=\"".$m->ukr."_page li_menu ".Luis::currentpagemenu($m->ukr,$m->home)."\">";
                                                $header.="<a class=\"menu menupagecurrent\" aria-label=\"".$m->ukr."\" role=\"link\" href=\"".DatosPagina::confver("base").$urlmenu."\">".$m->label_menu."</a>";
                                            $header.="</li>";
                                        }
                                    }
                                }
                            $header.="</div>";

                            


                            if(isset($_SESSION['usuarioid'])){
                                $header.="<div class=\"perf_mens_subs_pl900 clperfllrih\">";
                                    # imagen de perfil usuario
                                    $header.="<div class=\"mens_perf_nots09 ".Luis::currentpagemenu("perfil",false)." perfil_page \">";
                                        $header.="<a class=\"usernoneviewcartbox menupagecurrent \" href=\"".DatosPagina::confver("base")."perfil\" aria-label=\"perfil\" role=\"link\">";
                                            $header.="<div class=\"cdfdperflcontblius\">";
                                                $header.="<div class=\"csdperflcont qfrr9uorilb\" role=\"button\" tabindex=\"0\">";
                                                    $header.="<div class=\"qfrr9uorilb\">";
                                                        $header.='<svg class="perf767fildobs" data-vc-ignore-dynamic="1" role="none"><mask id="jsc_c_9"><circle cx="20" cy="20" fill="white" r="20"></circle></mask><g mask="url(#jsc_c_9)"><image id="imagopedperfds" x="0" y="0" height="100%" preserveAspectRatio="xMidYMid slice" width="100%" xlink:href="'.$imagenper.'" style="height:41px;width:41px;"></image><circle class="mlqo0dh0gtd " cx="20" cy="20" r="20"></circle></g></svg>';
                                                    $header.="</div>";
                                                $header.="</div>";
                                            $header.="</div>";
                                        $header.="</a>";
                                    $header.="</div>";
                                    # ///imagen de perfil usuario
                                $header.="</div>";
                            }else{
                                $header.="<div class=\"perf_mens_subs_pl900 clperfllrih\">";
                                    if(!$menu==null){
                                        foreach($menu as $m){
                                            $urlmenutwo=false;
                                            if($m->nombre=='acceder'){
                                                if(isset($m->nombre)){$urlmenutwo=$m->nombre;}
                                                $header.="<li class=\"".$m->ukr."_page li_menu ".Luis::currentpagemenu($m->ukr,$m->home)."\">";
                                                    $header.="<a class=\"menu menupagecurrent\" aria-label=\"".$m->nombre."\" role=\"link\" href=\"".DatosPagina::confver("base").$urlmenutwo."\">";
                                                    $header.=$m->label_menu;
                                                    $header.="</a>";
                                                $header.="</li>";
                                            }
                                        }
                                        $header.="<div class=\"mens_perf_nots09 ".Luis::currentpagemenu("carrito",false)." carrito_page mens_perf_nots09200\">";
                                        $header.="<a href=\"".DatosPagina::confver("base")."carrito\" class=\"menupagecurrent\" aria-label=\"carrito\" role=\"link\" id=\"open_opder_list\">";
                                        $header.="<div class=\"cdfdperflcontbliustwo\">";
                                        $header.="<div class=\"csdperflcont qfrr9uorilb\" role=\"button\" tabindex=\"0\">";
                                        $header.="<div class=\"qfrr9uorilb\">";
                                        $header.="<span class=\"shop_store_box\">";
                                        if (isset($_SESSION["carrito"])=='0'){
                                            $header.="0";
                                        }else{
                                            foreach($_SESSION['carrito']as$cantidadtotalcarrito) {
                                                $valortotaldecompra += $cantidadtotalcarrito["q"];
                                            }
                                            $header.=$valortotaldecompra;
                                        }
                                        $header.="</span>";
                                        $header.='<svg class="perf767fildobs cart_body_up" style="height:41px;width:41px;" viewBox="0 0 512.001 512.001" xml:space="preserve">
                                                  <path d="M503.142,79.784c-7.303-8.857-18.128-13.933-29.696-13.933H176.37c-6.085,0-11.023,4.938-11.023,11.023c0,6.085,4.938,11.023,11.023,11.023h297.07c5.032,0,9.541,2.1,12.688,5.914c3.197,3.88,4.475,8.995,3.511,13.972l-44.054,220.282c-1.709,7.871-8.383,13.366-16.232,13.366H184.323L83.158,36.854C77.69,21.234,62.886,10.74,45.932,10.74c-0.005,0-0.011,0-0.017,0c-14.38,0.496-28.963,0.491-32.535,0.248c-3.555-0.772-7.397,0.22-10.152,2.976c-4.305,4.305-4.305,11.282,0,15.587c3.412,3.412,4.564,4.564,43.068,3.23c7.22,0,13.674,4.564,15.995,11.188l103.618,311.962c1.499,4.503,5.71,7.545,10.461,7.545h252.982c18.31,0,33.841-12.638,37.815-30.909l44.109-220.525C513.503,100.513,510.544,88.757,503.142,79.784z"/>
                                                  <path d="M424.392,424.11H223.77c-6.785,0-13.162-4.674-15.46-11.233l-21.495-63.935c-1.94-5.771-8.207-8.885-13.961-6.934c-5.771,1.935-8.874,8.19-6.934,13.961l21.539,64.061c5.473,15.625,20.062,26.119,36.31,26.119h200.622c6.085,0,11.023-4.933,11.023-11.018S430.477,424.11,424.392,424.11z"/>
                                                  <path d="M231.486,424.104c-21.275,0-38.581,17.312-38.581,38.581s17.306,38.581,38.581,38.581s38.581-17.312,38.581-38.581S252.761,424.104,231.486,424.104z M231.486,479.22c-9.116,0-16.535-7.419-16.535-16.535c0-9.116,7.419-16.535,16.535-16.535c9.116,0,16.535,7.419,16.535,16.535C248.021,471.802,240.602,479.22,231.486,479.22z"/>
                                                  <path d="M424.392,424.104c-21.269,0-38.581,17.312-38.581,38.581s17.312,38.581,38.581,38.581c21.269,0,38.581-17.312,38.581-38.581S445.661,424.104,424.392,424.104z M424.392,479.22c-9.116,0-16.535-7.419-16.535-16.535c0-9.116,7.419-16.535,16.535-16.535c9.116,0,16.535,7.419,16.535,16.535C440.927,471.802,433.508,479.22,424.392,479.22z"/>
                                                </svg>';
                                        $header.="</div>";
                                        $header.="</div>";
                                        $header.="</div>";
                                        $header.="</a>";
                                        $header.="</div>";

                                    }
                                    $header.="</div>";
                            }



                        $header.="</ul>";
                    $header.="</nav>";
                $header.="</div>";
            $header.="</header>";
        }elseif($header_l=="header_duc"){
            $header.="<header class=\"header\">";
                $logotipclass = Luis::dato("luis_logo")->valor;
                if($logotipclass){
                    $image_logo="admin/datos/imagenes/pagina/".$logotipclass;
                    if(is_file($image_logo)){
                        $header.="<img class='logo_menu' src='".DatosPagina::confver("base")."/admin/datos/imagenes/pagina/".$logotipclass."'>";
                    }else{
                        $header.="<img class='logo_menu' src='".DatosPagina::confver("base")."/admin/datos/imagenes/icons/foto.png'>";
                    }
                }
                $header.="<input class=\"menu-btn\" type=\"checkbox\" id=\"menu-btn\" />";
                $header.="<label class=\"menu-icon\" for=\"menu-btn\"><span class=\"navicon\"></span></label>";
                $header.="<ul class=\"menu\">";
                if(!$menu==null){
                    foreach($menu as $m){
                        $urlmenu=false;
                        if($m->nombre!='acceder'){
                            if(isset($m->nombre)){
                                $urlmenu=$m->nombre;
                            }
                            $header.="<li class=\"".$m->ukr."_page li_menu ".Luis::currentpagemenu($m->ukr,$m->home)."\">";
                                $header.="<a class=\"menu menupagecurrent\" aria-label=\"".$m->ukr."\" role=\"link\" href=\"".DatosPagina::confver("base").$urlmenu."\">".$m->label_menu."</a>";
                            $header.="</li>";
                        }
                    }
                }
                if(isset($_SESSION['usuarioid'])){
                    $header.="<a class=\"usernoneviewcartbox menupagecurrent \" href=\"".DatosPagina::confver("base")."perfil\" aria-label=\"perfil\" role=\"link\">";
                        $header.="<div class=\"cdfdperflcontblius\">";
                            $header.="<div class=\"csdperflcont qfrr9uorilb\" role=\"button\" tabindex=\"0\">";
                                $header.="<div class=\"qfrr9uorilb\">";
                                    $header.='<svg class="perf767fildobs" data-vc-ignore-dynamic="1" role="none"><mask id="jsc_c_9"><circle cx="20" cy="20" fill="white" r="20"></circle></mask><g mask="url(#jsc_c_9)"><image id="imagopedperfds" x="0" y="0" height="100%" preserveAspectRatio="xMidYMid slice" width="100%" xlink:href="'.$imagenper.'" style="height:41px;width:41px;"></image><circle class="mlqo0dh0gtd " cx="20" cy="20" r="20"></circle></g></svg>';
                                $header.="</div>";
                            $header.="</div>";
                        $header.="</div>";
                    $header.="</a>";
                }else{
                    if(!$menu==null){
                        foreach($menu as $m){
                            $urlmenutwo=false;
                            if($m->nombre=='acceder'){
                                if(isset($m->nombre)){$urlmenutwo=$m->nombre;}
                                    $header.="<li class=\"".$m->ukr."_page li_menu ".Luis::currentpagemenu($m->ukr,$m->home)."\">";
                                    $header.="<a class=\"menu menupagecurrent\" aria-label=\"".$m->nombre."\" role=\"link\" href=\"".DatosPagina::confver("base").$urlmenutwo."\">";
                                    $header.=$m->label_menu;
                                    $header.="</a>";
                                    $header.="</li>";
                                }
                            }
                    }

                    $header.="<li class=\" ".Luis::currentpagemenu("carrito",false)." carrito_page\">";
                                        $header.="<a href=\"".DatosPagina::confver("base")."carrito\" class=\"menupagecurrent carrito_display_view\" aria-label=\"carrito\" role=\"link\" id=\"open_opder_list\">";
                                        $header.="<div class=\"cdfdperflcontbliustwo\">";
                                        $header.="<div class=\"csdperflcont qfrr9uorilb\" role=\"button\" tabindex=\"0\">";
                                        $header.="<div class=\"qfrr9uorilb\">";
                                        $header.="<span class=\"shop_store_box\">";
                                        if (isset($_SESSION["carrito"])=='0'){
                                            $header.="0";
                                        }else{
                                            foreach($_SESSION['carrito']as$cantidadtotalcarrito) {
                                                $valortotaldecompra += $cantidadtotalcarrito["q"];
                                            }
                                            $header.=$valortotaldecompra;
                                        }
                                        $header.="</span>";
                                        $header.='<svg class="perf767fildobs cart_body_up" style="height:41px;width:41px;" viewBox="0 0 512.001 512.001" xml:space="preserve">
                                                  <path d="M503.142,79.784c-7.303-8.857-18.128-13.933-29.696-13.933H176.37c-6.085,0-11.023,4.938-11.023,11.023c0,6.085,4.938,11.023,11.023,11.023h297.07c5.032,0,9.541,2.1,12.688,5.914c3.197,3.88,4.475,8.995,3.511,13.972l-44.054,220.282c-1.709,7.871-8.383,13.366-16.232,13.366H184.323L83.158,36.854C77.69,21.234,62.886,10.74,45.932,10.74c-0.005,0-0.011,0-0.017,0c-14.38,0.496-28.963,0.491-32.535,0.248c-3.555-0.772-7.397,0.22-10.152,2.976c-4.305,4.305-4.305,11.282,0,15.587c3.412,3.412,4.564,4.564,43.068,3.23c7.22,0,13.674,4.564,15.995,11.188l103.618,311.962c1.499,4.503,5.71,7.545,10.461,7.545h252.982c18.31,0,33.841-12.638,37.815-30.909l44.109-220.525C513.503,100.513,510.544,88.757,503.142,79.784z"/>
                                                  <path d="M424.392,424.11H223.77c-6.785,0-13.162-4.674-15.46-11.233l-21.495-63.935c-1.94-5.771-8.207-8.885-13.961-6.934c-5.771,1.935-8.874,8.19-6.934,13.961l21.539,64.061c5.473,15.625,20.062,26.119,36.31,26.119h200.622c6.085,0,11.023-4.933,11.023-11.018S430.477,424.11,424.392,424.11z"/>
                                                  <path d="M231.486,424.104c-21.275,0-38.581,17.312-38.581,38.581s17.306,38.581,38.581,38.581s38.581-17.312,38.581-38.581S252.761,424.104,231.486,424.104z M231.486,479.22c-9.116,0-16.535-7.419-16.535-16.535c0-9.116,7.419-16.535,16.535-16.535c9.116,0,16.535,7.419,16.535,16.535C248.021,471.802,240.602,479.22,231.486,479.22z"/>
                                                  <path d="M424.392,424.104c-21.269,0-38.581,17.312-38.581,38.581s17.312,38.581,38.581,38.581c21.269,0,38.581-17.312,38.581-38.581S445.661,424.104,424.392,424.104z M424.392,479.22c-9.116,0-16.535-7.419-16.535-16.535c0-9.116,7.419-16.535,16.535-16.535c9.116,0,16.535,7.419,16.535,16.535C440.927,471.802,433.508,479.22,424.392,479.22z"/>
                                                </svg>';
                                        $header.="</div>";
                                        $header.="</div>";
                                        $header.="</div>";
                                        $header.="</a>";
                                        $header.="</li>";
                }
                $header.="</ul>";
            $header.="</header>";
        }elseif($header_l=="header_gog"){
            $header.="<header class=\"header\">";
                $header.="<div class=\"contenedor_header_top\">";
                    $header.="<div class=\"contenedor_header_top_contenido\">";
                        $header.="<div class=\"contenedor_header_top_box\">";
                            $header.="<div class=\"contenedor_header_top_b2\">";
                                $header.="<a class=\"contenedor_header_top_logo\">";
                                    $logotipclass = Luis::dato("luis_logo")->valor;
                                    if($logotipclass){
                                        $image_logo="admin/datos/imagenes/pagina/".$logotipclass;
                                        if(is_file($image_logo)){
                                            $header.="<img height=\"80\" src='".DatosPagina::confver("base")."/admin/datos/imagenes/pagina/".$logotipclass."'>";
                                        }else{
                                            $header.="<img height=\"80\" src='".DatosPagina::confver("base")."/admin/datos/imagenes/icons/foto.png'>";
                                        }
                                    }
                                $header.="</a>";
                            $header.="</div>";

                            $header.="<div class=\"contenedor_header_top_b9\">";
                                $header.="<div class=\"contenedor_header_top_cart\">";
                                    $header.="<div class=\"top_header_top_buscar\">";
                                    $header.="<input autocomplete=\"off\" type=\"search\" id=\"searchlist\" placeholder=\"Buscar.\">";
                                    $header.="</div>";
                                    $header.="<div class=\"top_header_top_cart\">";
                                            # imagen de perfil usuario
                                            $header.="<div class=\"mens_perf_nots09 ".Luis::currentpagemenu("perfil",false)." perfil_page \">";
                                                $header.="<a class=\"usernoneviewcartbox menupagecurrent \" href=\"".DatosPagina::confver("base")."perfil\" aria-label=\"perfil\" role=\"link\">";
                                                    $header.="<div class=\"cdfdperflcontblius\">";
                                                        $header.="<div class=\"csdperflcont qfrr9uorilb\" role=\"button\" tabindex=\"0\">";
                                                            $header.="<div class=\"qfrr9uorilb\">";
                                                                $header.='<svg class="perf767fildobs" data-vc-ignore-dynamic="1" role="none"><mask id="jsc_c_9"><circle cx="24" cy="24" fill="white" r="24"></circle></mask><g mask="url(#jsc_c_9)"><image id="imagopedperfds" x="0" y="0" height="100%" preserveAspectRatio="xMidYMid slice" width="100%" xlink:href="'.$imagenper.'" style="height:49px;width:49px;"></image><circle class="mlqo0dh0gtd " cx="24" cy="24" r="24"></circle></g></svg>';
                                                            $header.="</div>";
                                                        $header.="</div>";
                                                    $header.="</div>";
                                                $header.="</a>";
                                            $header.="</div>";
                                            # ///imagen de perfil usuario
                                    $header.="</div>";

                                    $header.="<div class=\"top_header_top_cart\">";
                                        $header.="<div class=\"mens_perf_nots09 ".Luis::currentpagemenu("carrito",false)." carrito_page mens_perf_nots09200\">";
                                            $header.="<a href=\"".DatosPagina::confver("base")."carrito\" class=\"menupagecurrent\" aria-label=\"carrito\" role=\"link\" id=\"open_opder_list\">";
                                                $header.="<div class=\"cdfdperflcontbliustwo\">";
                                                    $header.="<div class=\"csdperflcont qfrr9uorilb\" role=\"button\" tabindex=\"0\">";
                                                        $header.="<div class=\"qfrr9uorilb\">";
                                                            $header.="<span class=\"shop_store_box\">";
                                                            if (isset($_SESSION["carrito"])=='0'){
                                                                $header.="0";
                                                            }else{
                                                                foreach($_SESSION['carrito']as$cantidadtotalcarrito) {
                                                                    $valortotaldecompra += $cantidadtotalcarrito["q"];
                                                                }
                                                                $header.=$valortotaldecompra;
                                                            }
                                                            $header.="</span>";
                                                            $header.='<svg class="perf767fildobs cart_body_up" style="height:41px;width:41px;" viewBox="0 0 512.001 512.001" xml:space="preserve">
                                                                      <path d="M503.142,79.784c-7.303-8.857-18.128-13.933-29.696-13.933H176.37c-6.085,0-11.023,4.938-11.023,11.023c0,6.085,4.938,11.023,11.023,11.023h297.07c5.032,0,9.541,2.1,12.688,5.914c3.197,3.88,4.475,8.995,3.511,13.972l-44.054,220.282c-1.709,7.871-8.383,13.366-16.232,13.366H184.323L83.158,36.854C77.69,21.234,62.886,10.74,45.932,10.74c-0.005,0-0.011,0-0.017,0c-14.38,0.496-28.963,0.491-32.535,0.248c-3.555-0.772-7.397,0.22-10.152,2.976c-4.305,4.305-4.305,11.282,0,15.587c3.412,3.412,4.564,4.564,43.068,3.23c7.22,0,13.674,4.564,15.995,11.188l103.618,311.962c1.499,4.503,5.71,7.545,10.461,7.545h252.982c18.31,0,33.841-12.638,37.815-30.909l44.109-220.525C513.503,100.513,510.544,88.757,503.142,79.784z"/>
                                                                      <path d="M424.392,424.11H223.77c-6.785,0-13.162-4.674-15.46-11.233l-21.495-63.935c-1.94-5.771-8.207-8.885-13.961-6.934c-5.771,1.935-8.874,8.19-6.934,13.961l21.539,64.061c5.473,15.625,20.062,26.119,36.31,26.119h200.622c6.085,0,11.023-4.933,11.023-11.018S430.477,424.11,424.392,424.11z"/>
                                                                      <path d="M231.486,424.104c-21.275,0-38.581,17.312-38.581,38.581s17.306,38.581,38.581,38.581s38.581-17.312,38.581-38.581S252.761,424.104,231.486,424.104z M231.486,479.22c-9.116,0-16.535-7.419-16.535-16.535c0-9.116,7.419-16.535,16.535-16.535c9.116,0,16.535,7.419,16.535,16.535C248.021,471.802,240.602,479.22,231.486,479.22z"/>
                                                                      <path d="M424.392,424.104c-21.269,0-38.581,17.312-38.581,38.581s17.312,38.581,38.581,38.581c21.269,0,38.581-17.312,38.581-38.581S445.661,424.104,424.392,424.104z M424.392,479.22c-9.116,0-16.535-7.419-16.535-16.535c0-9.116,7.419-16.535,16.535-16.535c9.116,0,16.535,7.419,16.535,16.535C440.927,471.802,433.508,479.22,424.392,479.22z"/>
                                                                    </svg>';
                                                        $header.="</div>";
                                                    $header.="</div>";
                                                $header.="</div>";
                                            $header.="</a>";
                                        $header.="</div>";
                                    $header.="</div>";
                                $header.="</div>";
                            $header.="</div>";

                        $header.="</div>";
                    $header.="</div>";
                $header.="</div>";

                $header.="<div class=\"contenedor_header_menu\">";
                    $header.="<nav id=\"header\">";
                        $header.="<ul class=\"on_displ_menu_line\">";
                            $header.="<div class=\"perf_mens_subs_pl900 clperflleft\">";

                                if(!$menu==null){
                                    foreach($menu as $m){
                                        $urlmenu=false;
                                        if($m->nombre!='soporte'){
                                            if(isset($m->nombre)){
                                                $urlmenu=$m->nombre;
                                            }
                                            $header.="<li class=\"".$m->ukr."_page li_menu ".Luis::currentpagemenu($m->ukr,$m->home)."\">";
                                                $header.="<a class=\"menu menupagecurrent\" aria-label=\"".$m->ukr."\" role=\"link\" href=\"".DatosPagina::confver("base").$urlmenu."\">".$m->label_menu."</a>";
                                            $header.="</li>";
                                        }
                                    }
                                }
                            $header.="</div>";

                            $header.="<div class=\"perf_mens_subs_pl900 clperfllrih\">";
                                if(!$menu==null){
                                    foreach($menu as $m){
                                        $urlmenutwo=false;
                                        if($m->nombre=='soporte'){
                                            if(isset($m->nombre)){$urlmenutwo=$m->nombre;}
                                                $header.="<li class=\"".$m->ukr."_page li_menu ".Luis::currentpagemenu($m->ukr,$m->home)."\">";
                                                    $header.="<a class=\"menu menupagecurrent\" aria-label=\"".$m->nombre."\" role=\"link\" href=\"".DatosPagina::confver("base").$urlmenutwo."\">";
                                                    $header.=$m->label_menu;
                                                    $header.="</a>";
                                                $header.="</li>";
                                        }
                                    }
                                }
                                $header.="</div>";
                        $header.="</ul>";
                    $header.="</nav>";
                $header.="</div>";
            $header.="</header>";

            $header.="<div>";
            $header.="";
            $header.="";
            $header.="</div>";
        }
        
        return $header;
    }



}