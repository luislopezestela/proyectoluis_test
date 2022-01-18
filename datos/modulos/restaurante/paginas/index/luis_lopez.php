<?php
$base=Luis::basepage("base_page");
$cartas=DatosCarta::MostrarCartas();
if(isset($_GET["paginas"])){
	$urb = explode("/", $_GET["paginas"]);
	if(isset($urb[0])){$urb0=$urb[0];}else{$urb0=false;}
}
?>

<div class="contenido100" id="contenido100">
	<?php if(isset($urb[1])): ?>
		<?php $items = DatosCarta::porUkr_items_page($urb[1]); ?>
		<?php if($items): ?>
			<?php echo $pages=Luis::viewpagelink("viewitems_item_view"); ?>
		<?php else: ?>
			<?php echo $pages=Luis::viewpagelink("404"); ?>
		<?php endif ?>
	<?php elseif(isset($urb[0])): ?>
		<?php $view = DatosCarta::carta_view_one($urb[0]); ?>
		<?php if($view==null): ?>
			<?php echo $pages=Luis::viewpagelink("404"); ?>
		<?php else: ?>
			<?php echo $pages=Luis::viewpagelink("viewitems"); ?>
		<?php endif ?>
	<?php else: ?>
		<?php echo $pages=Luis::viewpagelink("inicio"); ?>
	<?php endif ?>
</div>