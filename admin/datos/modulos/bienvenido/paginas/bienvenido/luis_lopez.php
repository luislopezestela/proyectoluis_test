<style type="text/css">
  *{
    box-sizing: border-box;
  }
.input_data_new_user{
  outline:none;
  border:0;
  border-radius:5px;
  padding:10px;
  width:100%;
  background:#3a3b3c;
  color:#FAFAFA;
}
.label_nom_hud{
  color:#ccc;
  display:block;
  margin:2px auto;
}

.hs::-webkit-scrollbar {
  width: 0;
  height: 0;
}

.hs{
  display:flex;
  overflow-x:scroll;
  justify-content:space-between;
  scrollbar-width:none;
  /* Firefox */
  -ms-overflow-style: none;
  /* IE 10+ */
  -webkit-overflow-scrolling: touch;
  margin: 0 -5px;
}
.hs__header {
  display: flex;
  align-items: center;
  width: 100%;
}
.hs__arrows {
  align-self: center;
}
.hs__arrows .arrow:before {
  content: "";
  display: inline-block;
  vertical-align: middle;
  content: "";
  background: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNSIgaGVpZ2h0PSI5IiB2aWV3Qm94PSIwIDAgMTUgOSI+Cgk8cGF0aCBmaWxsPSIjMzMzMzMzIiBkPSJNNy44NjcgOC41NzRsLTcuMjItNy4yMi43MDctLjcwOEw3Ljg2NyA3LjE2IDE0LjA1Ljk4bC43MDYuNzA3Ii8+Cjwvc3ZnPgo=");
  background-size: contain;
  filter: brightness(5);
  width: 18px;
  height: 12px;
  cursor: pointer;
}
.hs__arrows .arrow.disabled:before {
  filter: brightness(2);
}
.hs__arrows .arrow.arrow-prev:before {
  transform: rotate(90deg);
  margin-right: 10px;
}
.hs__arrows .arrow.arrow-next:before {
  transform: rotate(-90deg);
}
.view_item_temas {
  flex-grow: 1;
  flex-shrink: 0;
  flex-basis: calc(100% / 4 - (10px * 2) - (20px / 4));
  margin:5px;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  position: relative;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}
@media only screen and (max-width: 990px) {
  .view_item_temas {
    flex-basis: calc(100% / 3 - (10px * 2) - (20px / 3));
  }
}
.view_item_temas:last-child:after {
  content: "";
  display: block;
  position: absolute;
  width: 10px;
  height: 1px;
}
.view_item_temas:first-child {
}
.hs__item__description {
  z-index: 1;
  align-self: flex-start;
  margin: 10px 0;
}
.it_title_tem_sub {
  color: #aaa;
  display: block;
}
.view_item_temas_image_conten{
  position:relative;
  width:calc(100% - 0px);
  height:0;
  border:4px solid #ddd;
  border-radius:10px;
  padding:5px;
  padding-bottom: 100%;
  box-sizing: border-box;
}
.hs__item__image {
  pointer-events: none;
  position:relative;
  display:block;
  width: 100%;
}
@media only screen and (min-width: 990px) {
  .sub_contec_data {
    overflow: hidden;
  }
}
@media (hover: none) and (pointer: coarse) {
  .sub_contec_data .hs__arrows {
    display: none;
  }
  .sub_contec_data .view_item_temas {
    flex: 1 0 calc(23% - 10px * 2);
  }
}
@media only screen and (hover: none) and (pointer: coarse) and (max-width: 990px) {
  .sub_contec_data .view_item_temas {
    flex: 1 0 calc(45% - 10px * 2);
  }
}

.contiene_temas_d {
  max-width: 100%;
  margin: 0 auto;
  background: transparent;
  mix-blend-mode: invert;
  position: relative;
}
.contiene_temas_d:after {
  content: "";
  width: 100%;
  height: 100%;
  background:transparent;
  position: absolute;
  left: 50%;
  top: 0;
  transform: translateX(-50%);
  z-index: -1;
}

.description {
  max-width: 990px;
  color: #212121;
  margin: 0 auto;
  padding: calc(10px * 4);
}

ul {
  padding: 0;
  margin: 0;
}
.message_comp{width:100%;padding:15px;color:#FAFAFA;text-align:center;margin-top:25px;}
.it_title_tem{color:#FAFAFA;background:#001D;width:100%;position:absolute;box-sizing:content-box;top:0;z-index:1;bottom:0;display:flex;justify-content:center;align-self: center;align-items:center;text-align: center;border-radius:10px;left:0;right:0;cursor:pointer;}
.it_title_tem label{cursor:pointer;background:transparent;width:100%;height:100%;display:flex;justify-content:center;align-self:center;align-items:center;}
.view_item_temas input{display:none;}
.view_item_temas input:checked + .view_item_temas_image_conten {
  background-color:rgba(46, 204, 113,0.53);
  border:4px solid rgba(39, 174, 96,1.0);
}
    </style>


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
        <input type="radio" id="<?=$s->id."tmalabel".$s->nombre;?>" name="tema"> 
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
  <input class="input_data_new_user" type="text" name="">
  <br><br>
  <label class="label_nom_hud">Titulo pagina.</label>
  <input class="input_data_new_user" type="text" name="">
  <br><br>
  <label class="label_nom_hud">Descripcion de pagina.</label>
  <textarea class="input_data_new_user" name="" rows="6"></textarea>
  <br><br>
  <label class="label_nom_hud">Eslogan.</label>
  <input class="input_data_new_user" type="text" name="">
  <br><br>
  <br><br>
</div>

<script type="text/javascript">
  // work in progress - needs some refactoring and will drop JQuery i promise :)
var instance = $(".sub_contec_data");
$.each( instance, function(key, value) {
    
  var arrows = $(instance[key]).find(".arrow"),
      prevArrow = arrows.filter('.arrow-prev'),
      nextArrow = arrows.filter('.arrow-next'),
      box = $(instance[key]).find(".hs"), 
      x = 0,
      mx = 0,
      maxScrollWidth = box[0].scrollWidth - (box[0].clientWidth / 2) - (box.width() / 2);

  $(arrows).on('click', function() {
      
    if ($(this).hasClass("arrow-next")) {
      x = ((box.width() / 2)) + box.scrollLeft() - 10;
      box.animate({
        scrollLeft: x,
      })
    } else {
      x = ((box.width() / 2)) - box.scrollLeft() -10;
      box.animate({
        scrollLeft: -x,
      })
    }
      
  });
    
  $(box).on({
    mousemove: function(e) {
      var mx2 = e.pageX - this.offsetLeft;
      if(mx) this.scrollLeft = this.sx + mx - mx2;
    },
    mousedown: function(e) {
      this.sx = this.scrollLeft;
      mx = e.pageX - this.offsetLeft;
    },
    scroll: function() {
      toggleArrows();
    }
  });

  $(document).on("mouseup", function(){
    mx = 0;
  });
  
  function toggleArrows() {
    if(box.scrollLeft() > maxScrollWidth - 10) {
        // disable next button when right end has reached 
        nextArrow.addClass('disabled');
      } else if(box.scrollLeft() < 10) {
        // disable prev button when left end has reached 
        prevArrow.addClass('disabled')
      } else{
        // both are enabled
        nextArrow.removeClass('disabled');
        prevArrow.removeClass('disabled');
      }
  }
  
});
</script>