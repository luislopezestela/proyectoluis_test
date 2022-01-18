<?php 
header("Content-type: text/css");
include("../../../datos/controlador/BaseDatos.php");
class dataisd{
	public static function doit($sql){
		$con = BaseDatos::getCon();
		return array($con->query($sql),$con->insert_id);
	}
	public static function menc(){
		$sql = "select * from temas where estado=1";
		$query = dataisd::doit($sql);
		$found = null;
		$data = new dataisd();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->color_page = $r['color_page'];
			$found = $data;
			break;
		}
		return $found;
	}

	public static function mencdos($id){
		$sql = "select * from colores where id=\"$id\"";
		$query = dataisd::doit($sql);
		$found = null;
		$data = new dataisd();
		while($r = $query[0]->fetch_array()){
			$data->color_segundario = $r['color_segundario'];
			$data->color_primario = $r['color_primario'];
			$data->color = $r['color'];
			$found = $data;
			break;
		}
		return $found;
	}

	public static function menctres($id){
		$sql = "select * from pagina where nombre=\"$id\"";
		$query = dataisd::doit($sql);
		$found = null;
		$data = new dataisd();
		while($r = $query[0]->fetch_array()){
			$data->font_family_style = $r['font_family_style'];
			$found = $data;
			break;
		}
		return $found;
	}
}
$das_cols = dataisd::menc()->color_page;
$col = dataisd::mencdos($das_cols);
$fSd = dataisd::menctres("header")->font_family_style;
if($fSd==""){$fS="Roboto";}else{$fS=$fSd;}

print(":root{");
print("--color_primario:".$col->color_primario.";");
print("--color_segundario:".$col->color_segundario.";");
print("--color_a:".$col->color.";");
print("--color_b:".$col->color.";");
print("--font_family:".$fS.";");
print("}");