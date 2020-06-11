<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>
	<footer id="footer">
		<div class="container">
			<?php
				echo '<a href="'. home_url() .'" class="footer-logo" title="'. __('Finepoint', 'finepoint') .'">'. __('Finepoint', 'finepoint') .'</a>';
				$footer_menu = array(
									'menu' 				=> '',
									'container' 		=> false,
									'container_class' 	=> '',
									'container_id' 		=> '',
									'menu_class' 		=> 'list-inline',
									'menu_id' 			=> '',
									'echo' 				=> true,
									'fallback_cb' 		=> 'wp_page_menu',
									'before' 			=> '',
									'after' 			=> '',
									'link_before'		=> '',
									'link_after' 		=> '',
									'items_wrap' 		=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
									'item_spacing' 		=> 'preserve',
									'depth' 			=> 0,
									'walker' 			=> '',
									'theme_location' 	=> 'footer-menu'
								);
				wp_nav_menu( $footer_menu );
				if( get_field( 'copyright_text', 'option' ) ) {
					echo '<span class="copyright">'. get_field( 'copyright_text', 'option' ) .'</span>';
				}
			?>
		</div>
		<div class="col-xs-12">
			<div class="" style="display: flex; justify-content: center; margin: 15px 0 0 0;">
				<a href="https://www.houzz.co.uk/professionals/windows-and-glazing/finepoint-glass-pfvwgb-pf~471550677" rel="noopener" target="_blank"><i class="fa fa-houzz footer-social"></i></a>
			 	<a href="https://www.facebook.com/finepoint.glass/" rel="noopener" target="_blank"><i class="fa fa-facebook-f footer-social"></i></a>
				<a href="https://www.linkedin.com/company/finepoint-glass/" rel="noopener" target="_blank"><i class="fa fa-linkedin footer-social"></i></a>
				<a href="https://twitter.com/Glass_Finepoint/" rel="noopener" target="_blank"><i class="fa fa-twitter footer-social"></i></a>
				<a href="https://www.instagram.com/finepointglass/" rel="noopener" target="_blank"><i class="fa fa-instagram footer-social"></i></a>
			</div>
		</div>
		<div class="col-sm-12" style="text-align: center; padding: 2rem 0">
			<a href="/cookie-policy" style="padding: 0 1rem;">Cookie Policy</a>
			<a href="/privacy-policy" style="padding: 0 1rem;">Privacy Policy</a>
		</div>
		<!-- Start of LiveChat (www.livechatinc.com) code -->
<script type="text/javascript">
window.__lc = window.__lc || {};
window.__lc.license = 9458335;
(function() {
  var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
  lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
})();
</script>
<!-- End of LiveChat code -->


<style media="screen">
	.footer-social {
		padding: 0.7em;
		font-size: 1.3em;
		color: #0eb1ab;
		transition: ease-in-out 250ms all;
	}
	.footer-social:hover {
		color: #09807b
	}
	.fa-houzz:before {
	  content: "\f27c"; }
</style>

	</footer>
</div>
<?php wp_footer(); ?>
<!-- Google Code for Remarketing Tag -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 968713582;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>
<noscript>
<div style="display:inline;">
	<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/968713582/?guid=ON&amp;script=0"/>
</div>
</noscript>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-24247557-24', 'auto');
  ga('send', 'pageview');
</script>


<script>
  (function($) {

    $(document).ready( function() {
      if ( $(window).width() < 767) {
     $('.new-banner-home-img').removeClass('greyScale');
    }
    });

  window.onresize = function() {
    if (window.innerWidth <= 767) {
      $('.new-banner-home-img').removeClass('greyScale');
     } else {
      $('.new-banner-home-img').addClass('greyScale');
     }
  }
  })( jQuery );
</script>


<div style="display: none; " class="fixed-cta-hide-arrow"><i id="fixed-cta-arrow" class="fa fa-arrow-right"></i></div>
<div style="display: none; " class="fixed-cta-pos-bottom fixed-cta-pos-right fixed-cta bg-primary">
<!--     <a style="" class="fixed-cta-content" href="/double-glazing-prices-kent">
        <i class="fa fa-hand-o-up" aria-hidden="true"></i>
        <h4>Get Your Quote</h4>
    </a>
    <br style="" class="" /> -->
    <a style="" class="fixed-cta-content fixed-cta-hide" href="/architectural-glazing-prices-quotes-london/">
        <i class="fa fa-hand-o-up" aria-hidden="true"></i>
        <h4>Enquiries</h4>
    </a>
    <br style="" class=" fixed-cta-hide" />

    <a style="" class="fixed-cta-content fixed-cta-hide" href="/book-an-appointment">
        <i class="fa fa-home" aria-hidden="true"></i>
        <h4>Book An Appointment</h4>
    </a>
    <br style="" class=" fixed-cta-hide" />

    <a style="" class="fixed-cta-content fixed-cta-hide" href="/contact">
        <i class="fa fa-phone" aria-hidden="true"></i>
        <h4>Get In Touch</h4>
    </a>
    <br style="" class=" fixed-cta-hide" />

	<a style="" class="fixed-cta-content fixed-cta-hide" href="/showroom">
        <i class="fa fa-camera" aria-hidden="true"></i>
        <h4>Virtual Tour</h4>
    </a>
    <br style="" class=" fixed-cta-hide" />
</div>
 <div class="bot-menu">
        <a class="span50" href="/architectural-glazing-prices-quotes-london/"><i class="fa fa-hand-o-up"></i> Enquiries</a><a class="span50 live-chat-message" href="tel:01923229949"><i class="fa fa-phone"></i> Get In Touch</a>
    </div>
<style media="screen">
	.visible {
		display: block !important;
	}
	@media (max-width: 544px) {
		.fixed-cta-hide-arrow {
			display: none !important;
		}
	}
</style>
		<script>
		  (function($) {
		  $(window).scroll(function() {
		    if ($(document).scrollTop() > 400) {
		      $('.fixed-cta').addClass('visible');
					$('.fixed-cta-hide-arrow').addClass('visible');
		    }
		    else {
		      $('.fixed-cta').removeClass('visible');
					$('.fixed-cta-hide-arrow').removeClass('visible');
		    }
		  })
		  })(jQuery);
		</script>

<script type="text/javascript">
	(function($) {

		$('.fixed-cta-hide-arrow').click(function() {
			$(".fixed-cta").toggleClass("active-right");
			$(".fixed-cta-hide-arrow").toggleClass("fixed-cta-hide-arrow-slide");
			$("#fixed-cta-arrow").toggleClass('fa-arrow-right');
			$("#fixed-cta-arrow").toggleClass('fa-arrow-left');
		});

$('.icaal-contact-form.contact').on('success', function() {
	ga('send', 'event', 'Contact', 'submit');
});

$('.icaal-contact-form.appointment').on('success', function() {
	ga('send', 'event', 'Appointment', 'submit');
});



	})( jQuery );
</script>
<!-- End Fixed CTA -->



<!-- Landing page -->


<script>
(function($) {
$('.reviews-slider').slick({
    autoplay: true,
    speed: 2000,
    arrows: false,
    dots: true
});


})( jQuery );
</script>

<!-- New homepage slider -->
<script>
	(function($) {
$('.banner-slider-new').slick({
    autoplay: true,
    speed: 2000,
    arrows: false,
    dots: false,
    fade: true,
    autoplaySpeed: 3500
});

})( jQuery );

</script>

<!-- landing page End -->


<script>

(function($) {

$(document).ready(function() {

$('#menu-main-menu.nav li > .sub-menu').parent().hover(function() {

console.log("hovered");
var submenu = $(this).children('.sub-menu');

if ( $(submenu).is(':hidden') ) {

$(submenu).show();

} else {

$(submenu).hide();

}

});

});

})( jQuery );


</script>




<script type="text/javascript">

	(function($) {
$('.slider-for').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: '.slider-nav',
});

$('.slider-nav').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  asNavFor: '.slider-for',
  dots: false,
  focusOnSelect: true,
});

	})( jQuery );

</script>


</body>
</html>
