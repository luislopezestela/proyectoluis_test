var header = document.getElementById("header");
if($('#header').length){
	var alto = header.offsetTop;
}else{
	var alto = 0;
}
window.addEventListener('scroll', function(){
if (window.pageYOffset+5 > alto){
header.classList.add("fixed");
header.classList.add("somb_f");
document.getElementById("contenidopage").style.padding = header.clientHeight+"px 0 0 0";
}else{
document.getElementById("contenidopage").style.padding = "0 0 0 0";
header.classList.remove("fixed");
header.classList.remove("somb_f");
} 
});