<?php

  // Template Name: Hub Page
get_header();
?>
<style>
	.subtitle{
		font-size: 18px;
		line-height: 25px;
	}
	.hub-item-image{
		width:100%;
		max-height: 25vh;
		filter:grayscale(100%);
		transition:.6s;
		object-fit: cover;
		height: 32vh;
	}
	.hub-item-text-field{
		position:absolute;
		background-color: rgba(255,255,255,0.8);
		text-align: justify;
		right:15px;
		width:75%;
		transition: 0.5s;
		visibility:hidden;
		padding: 10px;
	}
	.hub-item-text-field h2{
		text-align: right;
	
	}
	.text-hidden{
		bottom:-50%;
	}
	.text-visible{
		bottom:0;
	}
	.hub-item-text-field:hover{
		bottom:0 !important;
	}
	.hub-item-column{
		overflow: hidden;
		margin: 3em 0;
	}
	.left-line{
		height: 4px;
		width: 16%;
		background: #0eb1ab;
		position: absolute;
		top: 40%;
		left: -26%;
	}
	.end-of-hub-page{
		padding: 9em 0;
	}
</style>
<?php 
	$subtitle = get_field('main_subtitle');
 ?>
<div class="container">
	<div class="row">
		<div class="col-12 text-center">
			<h1><?php the_field('title'); ?><span class="dot">.</span></h1>	
			<div class="subtitle"><?php echo $subtitle; ?></div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row justify-content-center">
		
				<?php if ( have_rows( 'product_links' ) ) : while ( have_rows( 'product_links' ) ) : the_row(); ?>
					<a href="<?php the_sub_field( 'image_link_url' ); ?>">
					<div class="col-md-6 hub-item-column">
						<img class="hub-item-image" src='<?php echo get_sub_field( 'image' )['url']; ?>'>

						<div class="hub-item-text-field">
							<h2><?php the_sub_field( 'image_heading' ); ?></h2>
							<?php the_sub_field( 'image_caption' ); ?>
							<div class="left-line"></div>
						</div>
					</div>
					</a>
				<?php endwhile; ?>
		<?php endif; ?>
		
	</div>
</div>
<div class="container end-of-hub-page">
	<div class="row">
		<div class="col-md-12 text-center">
			<h2><?php the_field( 'after_links_text' ); ?></h2>
		</div>
	</div>
</div>
<script>
	document.addEventListener("DOMContentLoaded", setHubItems);
	document.addEventListener("DOMContentLoaded", fixMenu);
	window.addEventListener("resize", setHubItems);

	function fixMenu(){
		let subMenus = document.getElementsByClassName('sub-menu');
		Array.from(subMenus).forEach((menu) =>{
			menu.style.display = 'block';
		});
	}

	function setHubItems (){
		let captions = document.getElementsByClassName('hub-item-text-field');
   		Array.from(captions).forEach((caption) =>{
   			bottomDistance = caption.clientHeight-38;
   			console.log('bottomDistance: ',bottomDistance, '| caption.clientHeight: ',caption.clientHeight, '| typeof caption.clientHeight: ',typeof(caption.clientHeight), '| caption.style.fontSize: ',caption.style.fontSize);
   			caption.style.bottom = '-'+bottomDistance+'px';
   			caption.style.visibility = 'visible';
   		})
	}

	let images = document.getElementsByClassName('hub-item-image');

	Array.from(images).forEach((image) =>{
		image.addEventListener("mouseleave", function( event ) {   
   			event.target.style.filter = "grayscale(0)";
			});
		});



</script>
<?php get_footer() ?>