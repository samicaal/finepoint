<?php
/**
 * Template Name: Contact Page
 * 
 */
get_header(); ?>
<?php
if(	get_field( 'contact_form_title' ) ) {
	echo '<section class="banner">';
		echo '<div class="banner-slider">';
			echo '<div>';
				echo '<div class="container">';
					echo '<div class="info">';
						echo '<div class="row">';
							echo '<div class="col-sm-6">';
								echo '<h1>'. get_field( 'contact_form_title' ) .'<span class="dot">.</span></h1>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</section>';
}
echo '<div id="content">';
	if ( function_exists( 'display_page_breadcrumb' ) ) {
		echo display_page_breadcrumb();
	}
	echo '<section class="contact-form">';
		echo '<div class="container">';
			echo '<div class="form-content">';
				echo '<div class="row">';
					if( get_field( 'contact_form_description' ) ) {
						echo '<div class="col-xs-12 col-md-6">'. get_field( 'contact_form_description' );
					}		
					if( get_field( 'contact_form_shortcode' ) ) {
						$contact_form = get_field( 'contact_form_shortcode' );
						echo '<div>'. do_shortcode("$contact_form") .'</div>';
					}
					echo '</div>';
					echo '<div class="col-xs-12 col-md-6 contact-details">';
					while( has_sub_field( 'map_locations' ) ){
						echo '<div class="detail-group">';
							echo '<div class="row">';
								if( get_sub_field( 'location_name' ) ){
									echo '<div class="col-sm-6">';
										echo '<h2><a href="javascript:void(0);" id="'. str_replace( ' ', '', strtolower(get_sub_field( 'location_name' )) ) .'" title="'. get_sub_field( 'location_name' ) .'">'. get_sub_field( 'location_name' ) .'</a></h2>';
									echo '</div>';
								}
								if( get_sub_field( 'location_address' ) ){
									echo '<div class="col-sm-6">';
										echo '<address>';
											echo '<p><label>A</label>'. get_sub_field( 'location_address' ) .'</p>';
											if( get_sub_field( 'location_telephone' ) ){
												echo '<p><label>T</label>'. get_sub_field( 'location_telephone' ) .'</p>';
											}
											if( get_sub_field( 'location_email' ) ){
												echo '<p><label>E</label><a href="mailto:'. get_sub_field( 'location_email' ) .'" title="'. get_sub_field( 'location_email' ) .'">'. get_sub_field( 'location_email' ) .'</a>';
											}
										echo '</address>';
									echo '</div>';
								}
							echo '</div>';
						echo '</div>';
					}
					echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</section>';
	
	if( get_field( 'map_locations' ) ){
		echo '<section class="contact-details" style="margin-top: 3rem;">';
			echo '<div class="container-fluid">';
				echo '<div class="row">';
					echo '<div class="col-xs-12">';
						echo '<div class="img-wrapper map" id="googleMap" style="width:100%; height:450px;"></div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '</section>';
	}


	
//	if( get_field( 'display_contact_image' ) ) {
//		if( get_field( 'contact_form_image' ) ){
//		$contact_form_image = get_field( 'contact_form_image' );
//		echo '<section class="img-wrapper">';
//		echo '<img src="'. $contact_form_image['url'] .'" alt="'. $contact_form_image['alt'] .'" title="'. $contact_form_image['title'] .'" class="greyScale" />';
//		echo '</section>';
//		}
//	}
	
echo '</div>';
$locations =  get_field('map_locations');
?>
<script>
var map;
function initMap() {

var latitude 			= <?php echo $locations[0]['location_latitude']; ?>;
var longitude 			= <?php echo $locations[0]['location_longitude']; ?>;
var myCenter 			= new google.maps.LatLng(latitude,longitude);
var zoom_level 			= <?php echo get_field('initial_zoom_level', 'option'); ?>;
var mouse_scroll1		= <?php if(get_field('enable_mouse_scroll_wheel', 'option')) { echo get_field('enable_mouse_scroll_wheel', 'option'); } else { echo 0; }; ?>;
var zoom_control1		= <?php if(get_field('display_zoom_control', 'option')) { echo get_field('display_zoom_control', 'option'); } else { echo 0; }; ?>;
if( mouse_scroll1 == 1 ) {
	var mouse_scroll = true;
} else {
	var mouse_scroll = false;
}

if( zoom_control1 == 1 ) {
	var zoom_control = true;
} else {
	var zoom_control = false;
}


var map = new google.maps.Map(document.getElementById('googleMap'), {
  center: {lat: latitude, lng: longitude},
  zoom: zoom_level,
  scrollwheel: mouse_scroll,
  zoomControl: zoom_control,
  disableDefaultUI: true,
  styles: [
    {
        "featureType": "administrative",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#444444"
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
        "featureType": "poi",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
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
                "color": "#46bcec"
            },
            {
                "visibility": "on"
            }
        ]
    }
]
});

var image = '<?php echo get_field('map_marker', 'option'); ?>';
<?php
if( get_field('map_locations') ) {
	$i = 1;
	while( has_sub_field('map_locations') ) {
		$lat  = get_sub_field('location_latitude');
		$lng  = get_sub_field('location_longitude');
		$id	  = str_replace( ' ', '', strtolower(get_sub_field( 'location_name' )) );
?>
		
	var marker<?php echo $i; ?> = new google.maps.Marker({
		position: {lat: <?php echo $lat; ?>, lng: <?php echo $lng; ?>},
		map: map,
		icon: image
	});
	
	var contentString = 'Finepoint Glass';
	
	google.maps.event.addListener(marker<?php echo $i; ?>, 'click', function() {
	  var infowindow = new google.maps.InfoWindow();
		infowindow.setContent(contentString);
		infowindow.open(map, marker<?php echo $i; ?>);

	});
	
	document.getElementById('<?php echo $id; ?>').addEventListener('click', function() {
		map.setCenter(new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lng; ?>));
	});
		
<?php
	$i++;
	}
}
?>

}
</script>
<?php get_footer();
