<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


		<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NVKRN4Q');</script>
<!-- End Google Tag Manager -->

<!-- Facebook Pixel Code -->
<!-- <script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '935335666667352');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=935335666667352&ev=PageView&noscript=1"
/></noscript> -->
<!-- End Facebook Pixel Code -->

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<link rel="profile" href="http://gmpg.org/xfn/11" />

<?php
if( get_field( 'favicon_icon', 'option' ) ) {
	echo '<link rel="icon" href="'. get_field( 'favicon_icon', 'option' ) .'" />';
}
?>
<?php wp_head(); ?>


<meta name="google-site-verification" content="XAvy9xlhA3x_v1e7qGhUld0Gv1op0NQlAe971bccG5c" />


	<meta name="ahrefs-site-verification" content="8df576a4fff7cc4f4384f7d6972a76c8d4d175376fe34577943b8e3a607aff65">

	<script type="application/ld+json">
  <?php
    $customSchemaLogoUrl = "https://www.finepoint.glass/wp-content/uploads/2018/03/Logo-1.jpg";
    $customSchemaRatingValue = "4.6/5";
    $customSchemaReviewCount = "9";
  ?>
  {
    "@context": "https://schema.org",
    "@type": "NewsArticle",
    "mainEntityOfPage": {
       "@type": "WebPage",
       "@id": "<?php echo get_site_url(); ?>"
    },
    "headline": "<?php echo get_bloginfo( 'name' ); ?>",
    "datePublished": "<?php echo current_time('c') ?>",
    "dateModified": "<?php echo current_time('c') ?>",
    "author": {
      "@type": "Person",
      "name": "<?php echo get_bloginfo( 'name' ); ?>"
    },
    "publisher": {
      "@type": "Organization",
      "name": "<?php echo get_bloginfo( 'name' ); ?>",
      "logo": {
        "@type": "ImageObject",
        "url": "<?php echo ( has_post_thumbnail($post->ID) ? get_the_post_thumbnail_url($post) : $customSchemaLogoUrl ); ?>",
        "width": 600
      }
    },
        "image": {
          "@type": "ImageObject",
          "url": "<?php echo $customSchemaLogoUrl; ?>",
          "width": "600",
          "height": "auto"
        },
    "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "<?php echo $customSchemaRatingValue; ?>",
    "reviewCount": "<?php echo $customSchemaReviewCount; ?>"
    }
  }
</script>

<script type="application/ld+json">
    {
      "@context": [
        "http://schema.org",
        { "@language": "en-ca" }
      ],
      "@type": "HomeAndConstructionBusiness",
      "image": "https://www.finepoint.glass/wp-content/uploads/2017/06/Logo-1.svg",
      "address":  {
        "@id": "_:office",
        "@type": "PostalAddress",
        "addressCountry": "United Kingdom",
        "addressLocality": "Watford",
        "addressRegion": "Hertfordshire",
        "contactType": "Mailing address",
        "postalCode": "WD18 8UF",
        "streetAddress": "36 - 38 Caxton Way, Watford Business Park"
      },
      "priceRange": "£",
      "telephone": "tel:01923 229949",
      "email":  "mailto:hello@finepoint.glass",
      "location": { "@id": "_:office" },
      "name":  "Showroom",
      "parentOrganization": "https://www.finepoint.glass/",
      "openingHoursSpecification": [
        {
          "@type": "OpeningHoursSpecification",
          "closes": "17:30:00",
          "dayOfWeek": "http://schema.org/Monday",
          "opens": "09:00:00"
        },
        {
          "@type": "OpeningHoursSpecification",
          "closes": "17:30:00",
          "dayOfWeek": "http://schema.org/Tuesday",
          "opens": "09:00:00"
        },
        {
          "@type": "OpeningHoursSpecification",
          "closes": "17:30:00",
          "dayOfWeek":  "http://schema.org/Wednesday",
          "opens": "09:00:00"
        },
        {
          "@type": "OpeningHoursSpecification",
          "closes":  "17:30:00",
          "dayOfWeek": "http://schema.org/Thursday",
          "opens": "09:00:00"
        },
        {
          "@type": "OpeningHoursSpecification",
          "closes": "17:30:00",
          "dayOfWeek":  "http://schema.org/Friday",
          "opens": "09:00:00"
        },
        {
          "@type": "OpeningHoursSpecification",
          "closes":  "00:00:00",
          "dayOfWeek": "http://schema.org/Saturday",
          "opens":  "00:00:00"
        },
        {
          "@type": "OpeningHoursSpecification",
          "closes": "00:00:00" ,
          "dayOfWeek": "http://schema.org/Sunday",
          "opens": "00:00:00"
        }
      ]
    }
    </script>

</head>

<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NVKRN4Q"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

	<div id="wrapper" class="homePage">



        <header id="header">

      <!-- Test -->

      <div class="container header-hide-on-mobile">
        <div class="row" style="display:flex; align-items:center;">
          <div class="col-md-3">
          <?php
          if( get_field( 'header_logo', 'option' ) ) {
            $header_logo = get_field( 'header_logo', 'option' );
            echo '<a href="'. home_url() .'" class="logo" title="'. get_bloginfo( 'name' ) .'"><img src="'. $header_logo['url'] .'" title="'. $header_logo['title'] .'" alt="'. $header_logo['alt'] .'" width="183" height="70" /></a>';
          }
        ?>
          </div>
          <div class="col-md-9">
            <div class="row">
              <div class="col-xs-12" style="padding-top:.5rem; padding-bottom: .5rem;">
                <div class="top-bar-icons" style="float:right">
                 <i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:hello@finepoint.glass">hello@finepoint.glass</a>
                 <i class="fa fa-phone" aria-hidden="true"></i><a href="tel:01923229949">01923 229 949</a>
               </div>
              </div>
              <div class="col-xs-12">
                 <div class="new_regular_navigation">
                  <nav>
                    <?php
                        $main_menu = array(
                          'menu'        => '',
                          'container'     => false,
                          'container_class'   => '',
                          'container_id'    => '',
                          'menu_class'    => 'nav navbar-nav',
                          'menu_id'       => '',
                          'echo'        => true,
                          'fallback_cb'     => 'wp_page_menu',
                          'before'      => '',
                          'after'       => '',
                          'link_before'   => '',
                          'link_after'    => '',
                          'items_wrap'    => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                          'item_spacing'    => 'preserve',
                          'depth'       => 0,
                          'theme_location'  => 'main-menu'
                        );
                        wp_nav_menu( $main_menu );

                                  ?>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


        
        


      <!-- Test End -->

      


        <div class="row mobile-nav-header">
          <div class="col-xs-4 mob-col">
               <div class="mobile_navigation_menu">
                  <button type="button" role="button" aria-label="Toggle Navigation" class="navbar-toggle">
                    <span class="lines"></span>
                  </button>
                  <div class="navigation-wrapper">
                    <div class="navigation">
                      <nav>
                          <?php
                          $main_menu = array(
                            'menu'        => '',
                            'container'     => false,
                            'container_class'   => '',
                            'container_id'    => '',
                            'menu_class'    => 'nav navbar-nav',
                            'menu_id'       => '',
                            'echo'        => true,
                            'fallback_cb'     => 'wp_page_menu',
                            'before'      => '',
                            'after'       => '',
                            'link_before'   => '',
                            'link_after'    => '',
                            'items_wrap'    => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'item_spacing'    => 'preserve',
                            'depth'       => 0,
                            'walker'      => new Finepoint_Walker_Nav_Menu(),
                            'theme_location'  => 'main-menu'
                          );
                          wp_nav_menu( $main_menu ); ?>
                    </nav>
                  </div>
                  </div>
              </div>
            </div>
          <div class="col-xs-4 mob-col">
              <a href="/"><img src="/wp-content/uploads/2019/08/fpoint-logo.png" alt="fpoint logo" width="40px" height="auto"></a>
          </div>
          <div class="col-xs-4 mob-col">
            <a href="tel:01923229949"><i style="font-size:3.2rem; margin-top: 1rem;" class="fa fa-phone" aria-hidden="true"></i></a>
          </div>
        </div>

<!-- 
				<?php
								if( get_field( 'social_links', 'option' ) ) {
									echo '<ul class="list-inline social-links">';
										while( has_sub_field( 'social_links', 'option' ) ) {
											echo '<li><a href="'. get_sub_field( 'social_link' ) .'" target="_blank" title="'. substr( get_sub_field( 'social_icon' ), 3 )  .'"><i class="fa '. get_sub_field( 'social_icon' ) .'" aria-hidden="true"></i></a></li>';
										}
									echo '</ul>';
								}
        ?> -->
	                   

        </header>