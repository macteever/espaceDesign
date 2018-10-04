function initMap() {

				  // Specify features and elements to define styles.
				  var styleArray = [
				    {
				      featureType: "all"
				    },{
				      featureType: "road.arterial",
				      elementType: "geometry",
				      stylers: [
				        { hue: "#00ffee" },
				        { saturation: 50 }
				      ]
				    },{
				      featureType: "poi.business",
				      elementType: "labels",
				      stylers: [
				        { visibility: "off" }
				      ]
				    }
				  ];

				  // Create a map object and specify the DOM element for display.
				  var map = new google.maps.Map(document.getElementById('map'), {
				    center: {lat: 46.702216, lng: 0.160131},
				    scrollwheel: false,
				    // Apply the map style array to the map.
				    styles: styleArray,
				    zoom: 10
				  });


				  var myLatLng = {lat: 46.702216, lng: 0.160131};

				  var marker = new google.maps.Marker({
				    map: map,
				    position: myLatLng
				  });

				  
				  var secretMessage = 'No place like home';

				
				  var infowindow = new google.maps.InfoWindow({
				      content: secretMessage
				    });

				    marker.addListener('click', function() {
				      infowindow.open(marker.get('map'), marker);
				      map.setZoom(16);
				      map.setCenter(marker.getPosition());
				    });

				}
				  


	
				


