function initMap() {
		var centerCoordinates = new google.maps.LatLng(-12.0463731, -77.042754);
		var map = new google.maps.Map(document.getElementById('map'), {
			center : centerCoordinates,
			zoom : 4,
			mapTypeId: "roadmap",
		});
		var card = document.getElementById('pac-card');
		var input = document.getElementById('pac-input');
		var infowindowContent = document.getElementById('infowindow-content');

		map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

		var autocomplete = new google.maps.places.Autocomplete(input);
		var infowindow = new google.maps.InfoWindow();
		infowindow.setContent(infowindowContent);

		var marker = new google.maps.Marker({
			map : map
		});

		autocomplete.addListener('place_changed',function() {
			document.getElementById("location-error").style.display = 'none';
			infowindow.close();
			marker.setVisible(false);
			var place = autocomplete.getPlace();
			if (!place.geometry) {
				document.getElementById("location-error").style.display = 'inline-block';
				document.getElementById("location-error").innerHTML = "Cannot Locate '" + input.value + "' on map";
				return;
			}

			map.fitBounds(place.geometry.viewport);
			marker.setPosition(place.geometry.location);
			marker.setVisible(true);

			infowindowContent.children['place-icon'].src = place.icon;
			infowindowContent.children['place-name'].textContent = place.name;
			infowindowContent.children['place-address'].textContent = input.value;
			infowindow.open(map, marker);
			$("#lat_a").val(place.geometry.location.lat());
			$("#lon_a").val(place.geometry.location.lng());
		});


			
	}