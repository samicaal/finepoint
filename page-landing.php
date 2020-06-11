<?php
  /**
   * Template Name: Landing Page
   *
   */

  if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
  }

  get_header();
  ?>
  

<?php  if (is_page_template( 'page-landing.php' )) {
    echo "<script>

    jQuery(document).ready(function() {

    jQuery('#menu-main-menu.nav li > .sub-menu').parent().hover(function() {

    console.log('hovered');
    var submenu = jQuery(this).children('.sub-menu');

    if ( jQuery(submenu).is(':hidden') ) {

    jQuery(submenu).show();

    } else {

    jQuery(submenu).hide();

    }

    });

    });



      (function($) {
      var icaalLeadGenerationFormValues = {};

      jQuery(document).ready(function($) {

        \$progress = $('.icaal__lead-generation-form-progress .progress-bar');

        $('.icaal__lead-generation-form .pane-submit').click(function() {
          console.log('panel clicked');
          var name = $(this).data('name');
          var value = $(this).data('value');
          var pane = null;
          if( $(this).data('pane') ) {
            pane = $(this).data('pane');
          }
          if( $(this).data('image') ) {
            icaalLeadGenerationFormValues['image'] = $(this).data('image');
          }
          icaalLeadGenerationFormValues[name] = value;
          nextPane(pane);


        });

        $('.icaal__lead-generation-form .form-control').on('change keyup', function() {
          var name = $(this).attr('name');
          var value = $(this).val();
          icaalLeadGenerationFormValues[name] = value;
        });

        $('.icaal__lead-generation-form').submit(function() {

          var \$form = $(this);
          var \$submit = \$form.find('.submit');
          var \$response = \$form.find('#response');
          icaalLeadGenerationFormValues['screen_width'] = screen.width;
          icaalLeadGenerationFormValues['screen_height'] = screen.height;
          icaalLeadGenerationFormValues['nonce'] = '" . wp_create_nonce('icaal-lead-generation-form') . "';
          icaalLeadGenerationFormValues['action'] = 'lead_generation_form';

          \$form.find('.form-checkbox').each(function (index, value) {
            icaalLeadGenerationFormValues[$(this).attr('name')] = $(this).prop('checked');
          })

          \$submit.addClass('btn-loading').prop('disabled', true);
          \$response.empty();

          $.ajax({
            url: 'https://api.clients.icaal.co.uk/forms/form_pk_voNaAKCatryFIviJE4tIRf0C',
            method: 'post',
            data: icaalLeadGenerationFormValues
          }).done(function (response) {
            nextPane();
            \$progress.addClass('bg-success').removeClass('progress-bar-animated bg-primary');
            
            ga('send', 'event', 'PPC Quote', 'Finish PPC Quote', 'Lead Generation Form');
          }).fail(function (response) {
            \$response.addAlert('danger', '<p style=\"font-size:18px; margin-bottom: .5em;\">Validation errors occurred:', response.responseJSON.errors);
          });

          return false;
        });


        $('#validate-postcode').click(function() {

          var \$this = $(this);
          var \$response = \$this.prev();
          var \$parent = \$this.parents('.pane');
          var postcode = $('#postcode').val();

          \$this.prop('disabled', true);
          \$response.empty();
          $.ajax({
            url: 'https://api.postcodes.io/postcodes/' + postcode,
            method: 'get'
          }).done(function(response) {
            postcode = response.result.postcode;
            icaalLeadGenerationFormValues['postcode'] = postcode;
            
            nextPane();
            setTimeout(function() {
              nextPane();
            }, 1000);
          }).fail(function(response) {
            \$response.addAlert('danger', 'Please enter a valid UK postcode.');
            \$this.prop('disabled', false);
          });


        });

      });

      function nextPane(pane) {

        console.log('s')

        var \$form = jQuery('.icaal__lead-generation-form ');
        var \$active = \$form.find('.pane.active');
        var \$next = \$active.next('.pane');
        var increment = 1;

        if( pane != null ) {
          \$next = \$form.find('.pane').eq(pane);
          console.log(\$next + 'next');
          increment = pane - \$active.index();
          console.log(\$active.index() + 'index of active panel');
        }

        console.log(increment + 'increment');

        \$active.removeClass('active');
        \$active.addClass('animated fadeOut slower delay-1s');
        \$next.addClass('active');
        \$next.addClass('animated fadeIn slower');

        \$form.find('.response').empty();

        var currentStep = parseInt(\$progress.data('valuenow')) + increment;
        console.log(currentStep + 'Current Step');

        var stepCounter = $('#step-counter');


        stepCounter.text(currentStep);

        var steps = parseInt(\$progress.data('valuemax'));
        console.log(steps + 'steps');

        \$progress.data('valuenow', currentStep);
        \$progress.css('width', currentStep / steps * 100 + '%');

        jQuery('html, body').animate({
          scrollTop: jQuery('.icaal__lead-generation-form').offset().top - 200
        }, 500);

      }
    })( jQuery );
    </script>";

  } ?>


<?php if (is_page_template( 'page-landing.php' )): ?>
<style>


/*Progress Bar*/
  @-webkit-keyframes progress-bar-stripes {
  from {
    background-position: 40px 0;
  }
  to {
    background-position: 0 0;
  }
}
@-o-keyframes progress-bar-stripes {
  from {
    background-position: 40px 0;
  }
  to {
    background-position: 0 0;
  }
}
@keyframes progress-bar-stripes {
  from {
    background-position: 40px 0;
  }
  to {
    background-position: 0 0;
  }
}
.progress {
  height: 20px;
  margin-bottom: 15px;
  margin-top:10px;
  overflow: hidden;
  background-color: #f5f5f5;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
  box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
}
.progress-bar {
  float: left;
  width: 0%;
  height: 100%;
  font-size: 12px;
  line-height: 20px;
  color: #ffffff;
  text-align: center;
  background-color: #0eb1ab;
  -webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15);
  box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15);
  -webkit-transition: width 0.6s ease;
  -o-transition: width 0.6s ease;
  transition: width 0.6s ease;
  animation: progress-bar-stripes 1s linear infinite;
}
.progress-striped .progress-bar,
.progress-bar-striped {
  background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  -webkit-background-size: 40px 40px;
  background-size: 40px 40px;
}
.progress.active .progress-bar,
.progress-bar.active {
  -webkit-animation: progress-bar-stripes 2s linear infinite;
  -o-animation: progress-bar-stripes 2s linear infinite;
  animation: progress-bar-stripes 2s linear infinite;
}
.progress-bar-success {
  background-color: #5cb85c;
}
.progress-striped .progress-bar-success {
  background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
}
.progress-bar-info {
  background-color: #5bc0de;
}
.progress-striped .progress-bar-info {
  background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
}
.progress-bar-warning {
  background-color: #f0ad4e;
}
.progress-striped .progress-bar-warning {
  background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
}
.progress-bar-danger {
  background-color: #d9534f;
}
.progress-striped .progress-bar-danger {
  background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
}
.clearfix:before,
.clearfix:after {
  display: table;
  content: " ";
}
.clearfix:after {
  clear: both;
}
.center-block {
  display: block;
  margin-right: auto;
  margin-left: auto;
}
.pull-right {
  float: right !important;
}
.pull-left {
  float: left !important;
}
.hide {
  display: none !important;
}
.show {
  display: block !important;
}
.invisible {
  visibility: hidden;
}
.text-hide {
  font: 0/0 a;
  color: transparent;
  text-shadow: none;
  background-color: transparent;
  border: 0;
}
.hidden {
  display: none !important;
}
.affix {
  position: fixed;
}

/*End Progress Bar code*/




/*Landing page preset*/


#landing-wrapper .p-y-1{
   padding-top: 1rem;
    padding-bottom: 1rem;
}


#landing-wrapper .p-y-2{
   padding-top: 2rem;
    padding-bottom: 2rem;
}

#landing-wrapper .p-y-3{
    padding-top: 3rem;
    padding-bottom: 3rem;
}

#landing-wrapper .p-y-4{
      padding-top: 4rem;
    padding-bottom: 4rem;
}


#landing-wrapper .p-a-1 {
    padding: 1rem;
}

#landing-wrapper .text-white {
  color: white;
}

#header {
	position: fixed;
	bottom: unset;
}

.btn-primary-o { background-color: transparent; }

  .btn-sm {
    font-size: 0.875rem;
    padding: 0.5rem 1rem;
  }

  .btn-block { display: block; width: 100%; }

  .text-xs-center { text-align: center; }

  h5.m-b-1 { margin-top: 0; }

  @media (max-width: 992px) {
    h5.m-b-1 { margin-bottom: 0 !important; }
  }

  .m-b-1 { margin-bottom: 1rem; }

  @media (max-width: 991px) {
	.m-b-sm-2 { margin-bottom: 2rem; }
  }

  .m-b-0 { margin-bottom: 0; }

  .m-x-auto { margin-left: auto; margin-right: auto; }

  .p-a-1 { padding: 1rem; }

  .pos-bottom {
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    text-align: center;
    background: rgba(0,0,0,0.4);
  }

  .pos-bottom h5 {
    color: #fff;
  }

/*End Landing page preset*/


/*Landing page styles*/

/*Header checklist*/
#landing-header .landing-check {
list-style-type: none;
padding-inline-start: 0px;
margin-block-start: 0;
margin-block-end: 0em;
}

#landing-header .landing-check li {
	display: flex;
	align-items: center;
	margin: .5em 0em;
}

#landing-header .landing-check li span {
	margin-left: .5em;
	font-size: 1.5em;
}

@media (max-width: 991px) {
  .margin-top-on-mobile {
  margin-top: 2em;
}

.landing-features {
  margin-top: 2em;
}
}


/*Header checklist*/

/*Header Row*/
.landing-head-row {
	display: flex;
    display: -webkit-flex;
    flex-wrap: wrap;
}
/*Header Row*/

/*Text img section*/
.landing-text-img-col {
justify-content: center;
 display: flex;
  flex-direction: column;
}

/*Text img section*/

/*Features section*/
.landing-features {
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
}

.landing-features p {
	margin: 0;
}

/*Features section*/


/*Slick reviews*/
.landing-prev,
.landing-next {
	display: none;
}


.reviews-slider .slick-dots li button {
    height: 10px;
    width: 10px;
    background: #000;
    padding: 0;
}

.reviews-slider .slick-dots li.slick-active button {
  background: #0eb1ab;
}

.star-hover {
  color: black;
  transition: color .5s ease;
}

.star-hover:hover i {
  color: #FCB515;
}


@media (min-width: 900px ) {
.landing-prev {
    font-size: 2rem;
    position: absolute;
    top: 50%;
    left: -3%;
    display: block;
}

.landing-next {
    font-size: 2rem;
    position: absolute;
    top: 50%;
    right: -3%;
    display: block;
}
}

/*Slick reviews*/
@media(min-width: 992px) {

.landing-head-row .no-padding-col {
	padding-right: 0px;
}
.landing-head-row .no-padding-col-left {
	padding-left: 0px;
}
}

/*Leadgen contact form styles*/
  .container {
    max-width: 100%;
  }
  .panel-header { padding: 1rem; text-align: center; display: flex; justify-content: center; margin: 0em .5em; border-bottom: 2px solid black; }
  
/*  .panel-header:after {
    content: "";
    width: 40px;
    height: 3px;
    background: #0eb1ab;
    position: absolute;
    top: 40px;
  }*/

  .panel-header h4 {
    color: black;
  }
  .panel-body { padding: 1rem; display: flex; justify-content: center; flex-direction: column; }
  .icaal__lead-generation-form .pane:not(.active) { display: none; }
  .icaal__lead-generation-form-check-list { padding-left: 0.5rem; list-style: none }
  .icaal__lead-generation-form-check-list li::before { content: '✓'; margin-right: 0.5rem; color:#5cb85c; }
  .pane-submit {
    cursor: pointer;
    transition: all ease 200ms;
    position: relative;
    background-size: cover !important;
    background-position: center center !important;
    background-repeat: no-repeat !important;
    border-radius: 2px;
    overflow: hidden;
  }

  .icaal__lead-generation-form .panel {
    box-shadow: none;
    -webkit-box-shadow: none;
    margin-bottom: 0px;
  }
  
.icaal__lead-generation-form h4 {
font-size: 1.7em;
letter-spacing: 1px;
margin-top: 0;
}

.icaal__lead-generation-form h5 {
margin-bottom: 0;
}

.icaal__lead-generation-form .item-card-landing {
/*background-color: #0EB1AB;*/
border: 2px solid #0EB1AB;
}

.icaal__lead-generation-form .item-card-landing:hover h5{
color: #0EB1AB;
}


.icaal__lead-generation-form .item-card-landing h5 {
color: black;
}

 #step-counter {
	display: inline-block;
  font-size: 2em;
  padding: .3em .8em;
  /*background-color: #0eb1ab;*/
  color: black;
  border: 2px solid black;
}


#landing-header {
	padding-bottom: 4em; padding-top: 4em;
}

.step-text-holder {
	color: black;
	display: inline-block;
	padding: .6em;
}


.icaal__lead-generation-form input[type=text],
 .icaal__lead-generation-form input[type=email] {
border: 1px solid black;
border-radius: 0;
color: black;
outline: none;
}

.icaal__lead-generation-form .btn.btn-secondary {
	  border: 2px solid #0eb1ab;
    color: black;
    background-color: #0eb1ab;
    margin-bottom: 0;
    border-radius: 0;
}

.icaal__lead-generation-form .btn.btn-secondary:hover {
    background-color: white;
    outline: none;
}

.icaal__lead-generation-form .btn.btn-secondary:focus {
    outline: none;
}

.icaal__lead-generation-form .alert {
	float: none;
}

.icaal__lead-generation-form .alert p {
	font-size: 18px;
}

.icaal__lead-generation-form #validate-postcode {
  display: block;
}

.icaal__lead-generation-form span.input-group-btn {
  display: block;
}

.icaal__lead-generation-form #postcode {
  margin-bottom: 5px;
}

.icaal__lead-generation-form .alert ul {
	list-style-type: none;
	margin-block-start: 0em;
    margin-block-end: 0em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    padding-inline-start: 0px;
}

.icaal__lead-generation-form .alert ul li {
font-size: 18px;
}

.icaal__lead-generation-form .form-control:focus {
box-shadow: none !important;
}

.icaal__lead-generation-form .text-success {
  color: black;
}


.landing-head-row .embed-responsive {
      position: relative;
      display: block;
      height: 0;
      padding: 0;
      overflow: hidden;
    }
    .landing-head-row .embed-responsive .embed-responsive-item {
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 100%;
      border: 0;
    }
    
    .landing-head-row .embed-responsive-21by9 {
      padding-bottom: 42.85714286%;
    }
    
   .landing-head-row .embed-responsive-16by9 {
      padding-bottom: 56.25%;
    }
    
    .landing-head-row .embed-responsive-3by2 {
      padding-bottom: 66.66666667%;
    }
    
    .landing-head-row .embed-responsive-4by3 {
      padding-bottom: 75%;
    }
    
    .landing-head-row .embed-responsive-1by1 {
      padding-bottom: 100%;
    }



/*End of Leadgen contact form styles*/

</style>
<?php endif; ?>

<div id="landing-wrapper">

<section id="landing-header" style="background:url('/wp-content/uploads/2018/01/F7A9252-1.jpg'); background-position: center; background-size: cover; background-repeat: no-repeat; position: relative;">
  <div class="landing-head-overlay" style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; background-color: black; opacity: .2;"></div>

	<div class="container">
		<div class="row landing-head-row">





			<div class="col-xs-12 col-md-6 col-md-push-6">
				
				<!-- Leadgen form -->

				<?php


				  $start = isset($atts['start']) ? intval($atts['start']) : 0;

				?>

				<div style="padding: 1.5rem 0.5em 0 0.5em; box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16), 0 0 0 1px rgba(0,0,0,0.08); background-color: white;">
				  <div class="row">

            <div class="col-xs-12" style="padding: 0 1.5em;">
              <h2 class="text-center"><?php echo get_field('landing_form_header'); ?></h2>
            </div>

				  	
				     <div class="col-xs-12 col-lg-8">
				      <div class="icaal__lead-generation-form-progress progress m-b-1">
				        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" data-valuenow="1" data-valuemin="0" data-valuemax="5" style="width:20%"></div>
				      </div>
				    </div>
				    <div class="col-xs-12 col-lg-4 text-white"><div style="float: right;"><div class="step-text-holder"><span style="font-size: 2em;">Step</span></div><div id="step-counter">1</div></div></div>
					

				    <div class="col-xs-12">
				      <form class="icaal__lead-generation-form mb-3" method="post">
				        <div class="pane panel text-xs-center z-depth-1<?php echo $start == 0 ? ' active' : null ?>" style="background-color: white;">
				          <div class="card-header panel-header">
				            <h4 class="m-b-0">Choose Your Product</h4>
				          </div>
				          <div class="panel-body p-a-1" style="min-height: 288px;">
				            <div class="row">


							<?php if (get_field('products')): ?>


								<?php  
								$rows = get_field('products');
					            $row_count = count($rows);
					            
					            if( $row_count == 3 ) {
					              $columns = 'col-xs-12';
					            } elseif( $row_count == 4 ) {
					              $columns = 'col-xs-12 col-sm-6';
					            } elseif( $row_count == 5 ) {
					              $columns = 'col-xs-12';
					            } elseif( $row_count == 6 ) {
					              $columns = 'col-xs-12 col-sm-6';
					            } elseif( $row_count == 2 ) {
					              $columns = 'col-xs-12 col-sm-6';
					            } elseif( $row_count == 1 ) {
					              $columns = 'col-xs-12';
					            }
					            $i = 0;
					         ?>

								<?php if( have_rows('products') ):  ?>

								<?php  while ( have_rows('products') ) : the_row(); $i++; ?>
								
								<?php $landing_product = get_sub_field('landing_product'); ?>

							  <div class="<?php echo $columns; ?>">
				                <div class="pane-submit m-b-1" data-name="product" data-value="<?php echo $landing_product; ?>" data-pane="1" onclick="ga('send', 'event', 'PPC Quote', 'Start PPC Quote', 'Lead Generation Form');">
				                  <div class="p-y-4 item-card-landing">
				                    <h5 class="m-b-1"><?php echo $landing_product; ?></h5>
				                  </div>
				                </div>
				              </div>

				          <?php endwhile; endif; ?>


							<?php else: ?>


				              <div class="col-xs-12">
				                <div class="pane-submit m-b-1" data-name="product" data-value="Doors" data-pane="1" onclick="ga('send', 'event', 'PPC Quote', 'Start PPC Quote', 'Lead Generation Form');">
				                  <div class="p-y-4 item-card-landing">
				                    <h5 class="m-b-1">Doors</h5>
				                    
				                  </div>
				                </div>
				              </div>

				              <div class="col-xs-12">
				                <div class="pane-submit m-b-1" data-name="product" data-value="Windows" data-pane="1" onclick="ga('send', 'event', 'PPC Quote', 'Start PPC Quote', 'Lead Generation Form');">
				                  <div class="p-y-4 item-card-landing">
				                    <h5 class="m-b-1">Windows</h5>
				                   
				                  </div>
				                </div>
				              </div>

				              <div class="col-xs-12">
				                <div class="pane-submit" data-name="product" onclick="ga('send', 'event', 'PPC Quote', 'Start PPC Quote', 'Lead Generation Form');" data-value="Glass" data-pane="1">
				                  <div class="p-y-4 item-card-landing">
				                    <h5 class="m-b-1">Glass</h5>
				                   
				                  </div>
				                </div>
				              </div>

				          	<?php endif; ?>

				            </div>
				          </div>
				        </div>



				        <div class="pane panel text-xs-center z-depth-1">
				          <div class="card-header panel-header">
				            <h4 class="m-b-0">Enter Your Postcode</h4>
				          </div>
				          <div class="panel-body p-x-1 p-y-6" style="height: 288px; display: flex; flex-direction: column; align-items: center; justify-content: center; background-color: white;">
				            <p class="m-b-0">Enter your postcode below so we can check that we cover your area</p>
				            <hr style="border-color: #fff;">
				            <div class="input-group m-x-auto" style="max-width:250px;">
				              <input id="postcode" type="text" class="form-control" name="postcode" placeholder="Postcode">
				              <span class="input-group-btn">
				                <button id="validate-postcode" type="button" class="btn btn-secondary">Check Postcode</button>
				              </span>
				            </div>
				            <div class="response"></div>
				          </div>
				        </div>

				        <div class="pane panel text-xs-center z-depth-1">
				          <div class="card-header panel-header">
				            <h4 class="m-b-0">Checking Your Postcode</h4>
				          </div>
				          <div class="card-body p-a-1" style="height: 288px; display: flex; flex-direction: column; align-items: center; justify-content: center; background-color: white;">
				            <p class="card-text">Please wait whilst we check your postcode...</p>
				            <img width="50" height="50" src="<?php echo get_stylesheet_directory_uri() ?>/img/loader.gif">
				          </div>
				        </div>

				        <div class="pane panel text-xs-center z-depth-1">
				          <div class="card-header panel-header">
				            <h4 class="m-b-0"><span class="text-success">Success!</span> We Cover Your Area</h4>
				          </div>
				          <div class="panel-body p-x-1 p-y-3" style="min-height: 288px; display: flex; flex-direction: column; align-items: center; justify-content: center; background-color: white;">
							<div class="col-xs-12">
				            <div class="form-group">
				              <input type="text" class="form-control" name="first_name" placeholder="First Name" style="max-width: 480px; margin-bottom: 0.3em; padding: 0em .5em;">
				            </div>
				            <div class="form-group">
				              <input type="text" class="form-control" name="last_name" placeholder="Last Name" style="max-width: 480px; margin-bottom: 0.3em;  padding: 0em .5em;">
				            </div>
				            <div class="form-group">
				              <input type="email" class="form-control" name="email" placeholder="Email" style="max-width: 480px; margin-bottom: 0.3em; padding: 0em .5em;">
				            </div>
				            <div class="form-group">
				              <input type="text" class="form-control" name="phone" placeholder="Phone" style="max-width: 480px; margin-bottom: 0.3em; padding: 0em .5em;">
				            </div>

				            <div id="response" class="response" style="text-align:left; font-size: 14px; max-width: 480px; margin: 0 auto; margin-top: 0rem; padding:0em 2em 0em;"></div>
				            <input type="submit" class="btn btn-secondary" value="Get Quote" style="max-width: 480px; margin: 0 auto;display:block; padding-left: 2em; padding-right: 2em; margin-bottom: .5em;">
				            <a href="/privacy-policy/" target="_blank">Privacy Policy</a><br />
				            <small class="text-muted"><span class="fa fa-lock"></span> Your information is data protected.</small>
				       		 </div>
				          </div>

				        </div>

				        <div class="pane panel text-xs-center z-depth-1">
				          <div class="card-header panel-header">
				            <h4 class="m-b-0" style="font-size: 2.5rem;">Thank you for enquiring with Finepoint Glass</h4>
				          </div>
				          <div class="panel-body p-a-1 text-xs-left" style="min-height: 288px; display: flex; flex-direction: column; align-items: center; justify-content: center; background-color: white;">
				            <p>
				              The team at Finepoint Glass really appreciate you taking the time to contact us. One of our friendly and knowledgable advisors will be in touch with you as soon as possible to provide our very best quote.
				            </p>
				            <p>
				              We look forward to speaking to you soon,
				            </p>
				            <p>
				              The Finepoint Glass team.
				            </p>
				          </div>
				        </div>

				      </form>
				    </div>
				  </div>
				</div>


<!-- End Leadgen form -->

			</div>


        <div class="col-xs-12 col-md-6 m-b-sm-2 text-white col-md-pull-6" style="margin-top: 2rem; justify-content: center; display: flex; flex-direction: column;">
        <div>
        <h1 style="font-size: 40px; line-height: 36px;"><?php echo get_field('landing_header_title'); ?><span class="dot">.</span></h1>
        <h4 style="font-size: 26px; font-weight: bold;"><?php echo get_field('landing_header_subtitle'); ?></h4>
        <?php if ( have_rows('landing_header_benefits') ): ?>
          <ul class="landing-check" style="margin-top: 1em;">
         <?php while( have_rows('landing_header_benefits') ) : the_row(); ?>
            <li><i style="color:#0EB1AB;" class="fa fa-check fa-2x"></i><span><?php echo get_sub_field('text'); ?></span></li>
          <?php endwhile; ?>
          </ul>
          <?php endif; ?>
        </div>
      </div>


		</div>
	</div>

</section>




<?php if( have_rows('features') ):  ?>


<section class="p-y-4">
	<div class="container">
	<div class="row landing-head-row">
	
    <?php  while ( have_rows('features') ) : the_row();  ?>
	<?php $image = get_sub_field('feature_image'); ?>

		<div class="col-xs-12 col-md-4 landing-features">
				<?php if ($image): ?>
				<img class="m-b-1" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" width="128px" height="128px">
				<?php endif; ?>
				<h3 style="margin-bottom: .5em;"><?php echo get_sub_field('feature_heading'); ?></h3>
				<p><?php echo get_sub_field('feature_content'); ?></p>

		</div>
	
	<?php endwhile; ?>	

	</div>
</div>
</section>

<?php endif; ?>



<?php  if( have_rows('reviews') ) : ?>


<section class="p-y-4" style="background-color: #eee;">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="reviews-slider">
				<?php while( have_rows('reviews') ) : the_row();
				$name = get_sub_field('name');
				$testimonial = get_sub_field('review_text');
					?>
					<div class="text-center star-hover">
							<div class="rating-stars p-y-2">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
							</div>
							<strong style="font-size: 2rem;"><?php echo $name ?></strong>
							<p><span class="testimonial"><?php echo $testimonial ?></span></p>
					</div>
					<?php endwhile; ?>
				</div>
			</div>
		</div>

	</div>
</section>


<?php endif; ?>




<?php $image_one = get_field('image_one'); ?>
<?php $image_two = get_field('image_two'); ?>
<?php $content_one = get_field('content_one'); ?>
<?php $content_two = get_field('content_two'); ?>

<?php if ( $image_one ): ?>

<section class="p-y-3">
	<div class="container">
		<div class="row landing-head-row">
			<div class="col-xs-12 col-md-6 no-padding-col">
				<div class="embed-responsive embed-responsive-3by2">
				<img class="img-fluid embed-responsive-item" src="<?php echo $image_one['url']; ?>" alt="<?php echo $image_one['alt']; ?>">
				</div>
			</div>
			<div class="col-xs-12 col-md-6 landing-text-img-col">
				<p><?php echo $content_one; ?></p>
			</div>
		</div>
		<div class="row landing-head-row">

			<div class="col-xs-12 col-md-6 col-md-push-6 no-padding-col-left">
				<div class="embed-responsive embed-responsive-3by2">
				<img class="img-fluid embed-responsive-item" src="<?php echo $image_two['url']; ?>" alt="<?php $image_two['alt']; ?>">
				</div>
			</div>
			
			<div class="col-xs-12 col-md-6 col-md-pull-6 landing-text-img-col">
				<p><?php echo $content_two; ?></p>
			</div>

		</div>
	</div>
</section>

<?php endif; ?>

</div>

  <?php get_footer(); ?>


