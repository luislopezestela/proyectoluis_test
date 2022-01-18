
///botonsiguientecarrito st_car_button_page next_date_order_process next_date_order_process_two
$('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');

$(".quantity").each(function(){
	var luislopezestelanumbermove = $(this),
	input = luislopezestelanumbermove.find('input[type="number"]'),
	btnUp = luislopezestelanumbermove.find('.quantity-up'),
	btnDown = luislopezestelanumbermove.find('.quantity-down'),
	min = input.attr('min'),
	max = input.attr('max'),
	ide = input.attr('data_code');
	btnUp.click(function() {
		var oldValue = parseFloat(input.val());
		if(oldValue >= max){
			var newVal = oldValue;
		}else{
			var newVal = oldValue + 1;
		}
		luislopezestelanumbermove.find("input").val(newVal);
		$.ajax({
			type:'POST',
			url:list_urls()+list_action()+"editarcarrito_t",
			dataType:"json",
			data:{identbox:ide,btls:newVal},
			cache:false,
			success: function(data){
				luislopezestelanumbermove.find("input").val(data.cantidad_item);
				$(".shop_store_box").html(data.cantidad);
				$(".count_items_in_car_styls_dt").html(data.cantidad);
				$(".pricetotalboxcarts").html(data.totalpriceorderslist);
			}
		})
	});

	btnDown.click(function() {
		var oldValue = parseFloat(input.val());
		if (oldValue <= min) {
			var newVal = oldValue;
		}else{
			var newVal = oldValue - 1;
		}
		luislopezestelanumbermove.find("input").val(newVal);
		$.ajax({
			type:'POST',
			url:list_urls()+list_action()+"editarcarrito",
			dataType:"json",
			data:{identbox:ide,btls:newVal},
			cache:false,
			success: function(data){
				$(".shop_store_box").html(data.cantidad);
				$(".count_items_in_car_styls_dt").html(data.cantidad);
				$(".pricetotalboxcarts").html(data.totalpriceorderslist);
			}
		})
	});
});


///

