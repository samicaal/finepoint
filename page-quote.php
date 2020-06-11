<?php
  /**
   * Template Name: Quote Page
   *
   */

  if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
  }


  function add_inline_lead_generation_script() {

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



      var icaalLeadGenerationFormValues = {};

      jQuery(document).ready(function($) {

         jQuery('.icaal__lead-generation-form .previous-button').on('click', function(e) {
          e.preventDefault();

        var \$formH = jQuery('.icaal__lead-generation-form');
        
        var \$active = \$formH.find('.pane.active');

        \$firstPanel = \$formH.find('.pane').eq(0);
        
          icaalLeadGenerationFormValues = {};
         \$active.removeClass('active');
         \$firstPanel.addClass('active');
         \$firstPanel.addClass('animated fadeIn slower');
          });



        \$progress = $('.icaal__lead-generation-form-progress .progress-bar');

        $('.icaal__lead-generation-form .pane-submit').click(function() {

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
            url: 'https://api.clients.icaal.co.uk/forms/form_pk_yYuBNg8n0ox95L3MZ7RneiCm',
            method: 'post',
            data: icaalLeadGenerationFormValues,
          }).done(function (response) {
            nextPane();
            \$progress.addClass('bg-success').removeClass('progress-bar-animated bg-primary');
            
            ga('send', 'event', 'Quoting Engine', 'Complete Quote', 'Lead Generation Form')
          }).fail(function (response) {
            \$response.addAlert('danger', 'Validation errors occurred:', response.responseJSON.errors);
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
            if( typeof ga == 'function' ) { ga('send', 'event', 'Quoting Engine', 'Enter Postcode', 'Lead Generation Form'); }
            nextPane();
            setTimeout(function() {
              nextPane();
            }, 3000);
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
          increment = pane - \$active.index();
        }

        \$active.removeClass('active');
        \$active.addClass('animated fadeOut slower');
        \$next.addClass('active animated fadeIn slower');
        \$form.find('.response').empty();

        var currentStep = parseInt(\$progress.data('valuenow')) + increment;
        var steps = parseInt(\$progress.data('valuemax'));

        \$progress.data('valuenow', currentStep);
        \$progress.css('width', currentStep / steps * 100 + '%');

        // jQuery('html, body').animate({
        //   scrollTop: jQuery('.icaal__lead-generation-form').offset().top - 200
        // }, 500);


       
      }


    </script>";


  }
  add_action( 'wp_head', 'add_inline_lead_generation_script', PHP_INT_MAX );

  get_header();

?>

		<section>
     <div class="container">
       <div class="row">
         <div class="col-xs-12 col-md-7 quote-head">
           <h1>Start Your Enquiry For A Free Design Consultation with Finepoint Glass<span class="dot">.</span></h1>
          
         </div>
         <div class="col-xs-12 col-md-5 quote-head">
            <p>Architectural Glazing Specialists in London</p>
         </div>
       </div>
     </div>   
      </section>

			
				<?php do_shortcode('[lead_generation_form]') ?>
			

		<style>
      .quote-head h1 {
        font-size: 25px;
      }

      .quote-head p {
        font-size: 18px;
        text-align: right;
        margin-top: 2rem;
      }


      @media (max-width: 400px) {
        .quote-head h1 {
        font-size: 17px;
        margin-bottom: 8px;
      }

       .quote-head p {
        font-size: 14px;
        margin-bottom: 0px;
        text-align: center;
        margin-top: 0;
      }

      }
      
    </style>



<?php get_footer();

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
