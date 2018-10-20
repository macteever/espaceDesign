function initMap() {

				  // Specify features and elements to define styles.
				  var styleArray = [
			    {
			        "featureType": "administrative",
			        "elementType": "labels.text.fill",
			        "stylers": [
			            {
			                "color": "#6195a0"
			            }
			        ]
			    },
			    {
			        "featureType": "landscape",
			        "elementType": "all",
			        "stylers": [
			            {
			                "color": "#f2f2f2"
			            }
			        ]
			    },
			    {
			        "featureType": "landscape",
			        "elementType": "geometry.fill",
			        "stylers": [
			            {
			                "color": "#ffffff"
			            }
			        ]
			    },
			    {
			        "featureType": "poi",
			        "elementType": "all",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "poi.park",
			        "elementType": "geometry.fill",
			        "stylers": [
			            {
			                "color": "#e6f3d6"
			            },
			            {
			                "visibility": "on"
			            }
			        ]
			    },
			    {
			        "featureType": "road",
			        "elementType": "all",
			        "stylers": [
			            {
			                "saturation": -100
			            },
			            {
			                "lightness": 45
			            },
			            {
			                "visibility": "simplified"
			            }
			        ]
			    },
			    {
			        "featureType": "road.highway",
			        "elementType": "all",
			        "stylers": [
			            {
			                "visibility": "simplified"
			            }
			        ]
			    },
			    {
			        "featureType": "road.highway",
			        "elementType": "geometry.fill",
			        "stylers": [
			            {
			                "color": "#f4d2c5"
			            },
			            {
			                "visibility": "simplified"
			            }
			        ]
			    },
			    {
			        "featureType": "road.highway",
			        "elementType": "labels.text",
			        "stylers": [
			            {
			                "color": "#4e4e4e"
			            }
			        ]
			    },
			    {
			        "featureType": "road.arterial",
			        "elementType": "geometry.fill",
			        "stylers": [
			            {
			                "color": "#f4f4f4"
			            }
			        ]
			    },
			    {
			        "featureType": "road.arterial",
			        "elementType": "labels.text.fill",
			        "stylers": [
			            {
			                "color": "#787878"
			            }
			        ]
			    },
			    {
			        "featureType": "road.arterial",
			        "elementType": "labels.icon",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "transit",
			        "elementType": "all",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "water",
			        "elementType": "all",
			        "stylers": [
			            {
			                "color": "#eaf6f8"
			            },
			            {
			                "visibility": "on"
			            }
			        ]
			    },
			    {
			        "featureType": "water",
			        "elementType": "geometry.fill",
			        "stylers": [
			            {
			                "color": "#eaf6f8"
			            }
			        ]
			    }
			];

				  // Create a map object and specify the DOM element for display.
				  var map = new google.maps.Map(document.getElementById('map'), {
				    center: {lat: 44.853219, lng: -0.568271},
				    scrollwheel: false,
				    // Apply the map style array to the map.
				    styles: styleArray,
				    zoom: 15
				  });

				  var myLatLng = {lat: 44.853219, lng: -0.568271};

				  var marker = new google.maps.Marker({
				    map: map,
				    position: myLatLng,
						 icon :'../wp-content/themes/espaceDesign/assets/img/mapmarker.png'
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
