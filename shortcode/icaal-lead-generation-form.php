<?php

  function icaal_lead_generation_form( $atts , $content = null ) {

    // Attributes
    $atts = shortcode_atts(
      array(
        'start' => 0,
        'products' => 'windows, doors, conservatories',
        'materials' => 'upvc, aluminium',
        'supply' => 'supply-only, supply-and-fit',
      ),
      $atts,
      'lead_generation_form'
    );

    return include( locate_template('template-parts/lead-generation-form.php') );

  }
  add_shortcode( 'lead_generation_form', 'icaal_lead_generation_form' );
