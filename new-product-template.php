<?php
/*
Template Name: New Product Page
 */

get_header(); ?>

<div class="top-heading">
    <div class="container">
        <div class="clearfix">
            <h1><?php the_title(); ?><span class="dot">.</span></h1>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h2><?php the_field('product_title'); ?><span class="dot">.</span></h2>
            <div>
                <?php the_field('product_text'); ?>
            </div>
        </div>
    </div>
</div>

<?php if( have_rows('product_page') ) : ?>
<div id="content">
    <section class="">
        <div class="container">
        	
			<div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 42px; margin-top: 32px;">
                    <div class="slider-nav">
                    	<?php while( have_rows('product_page') ) : the_row(); ?>
                        <div class="sld-nav-ctn">
                            <button><?php the_sub_field('title'); ?><span class="dot">.</span></button>
                        </div>
                        <?php endwhile; ?>
                    </div>      
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="slider-for">
						<?php while( have_rows('product_page') ) : the_row(); ?>
                        <div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="text-block">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <h2><?php the_sub_field('title'); ?><span class="dot">.</span></h2>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <h3><?php the_sub_field('sub_title'); ?><span class="dot">.</span></h3>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 text-right">
                                            <p class="large-text">
                                                <?php the_sub_field('text'); ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>


                                <div class="img-wrapper">
                                    <div class="gsWrapper" style="position: relative; display: inline-block;">
                                    <?php $image = get_sub_field('first_image'); ?>
                                        <a href="#"><img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>" class="greyScale" style="display: inline;opacity: 1;"/></a>
                                        <canvas width="710" height="376" class="gsCanvas" style="left: 0px;position: absolute;top: 0px;opacity: 1;display: block;"></canvas>
                                    </div>
                                </div>




							</div>

							<div class="col-xs-12 col-sm-12 col-md-12 product-detail">
                                <div class="product-desc">
                                    <div class="download-link text-right" style="padding: 20px; top:-50px"><a href="<?php the_sub_field('brochure_link') ?>" class="more-link" download="">DOWNLOAD BROCHURE</a></div>
                                    <div class="section-block product-info">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h2>Size limits</h2>
                                                <?php the_sub_field('first_table'); ?>
                                            </div>
                                            <div class="col-sm-6">
                                                <h2>Performance</h2>
                                                <?php the_sub_field('second_table'); ?>
                                            </div>
                                        </div>
                                    </div>
                                         <div class="center-block">
                                        <?php if( have_rows('half_image_text') ) : while( have_rows('half_image_text') ) : the_row(); ?>
                                             <?php $image2 = get_sub_field('image');  ?>


                                            
                                            <div class="gsWrapper" style="position: relative; display: inline-block;">
                                            <div class="img-wrapper" style="margin-bottom: 40px;">
                                                <div style="position: relative;">
                                                   



                                                    <img src="<?php echo $image2['url'] ?>" alt="<?php echo $image2['alt'] ?>" style="display: inline; opacity: 1;"  class="greyScale">

                                                   


                                                    <canvas width="710" height="376" class="gsCanvas" style="left: 0px;position: absolute;top: 0px;opacity: 1;display: block;"></canvas>
                                                </div>

                                                 <div class="img-text-prod">
                                                    <div class="row">
                                                        <div class="col-sm-12 hide-show" style="display: flex;">
                                                            <div class="float-up" style="z-index: 1;">
                                                                <div class="left-line-wrap">
                                                                    <div class="left-line"></div>
                                                                </div>
                                                                <div class="right-div">
                                                                    <span class="read-more">Read More</span>


                                                              <?php the_sub_field('text');  ?>
                                                        

                                                        </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    
                                        <?php endwhile; endif; ?>
                                    </div>


                                    <section id="half-text-image-block" style="padding-top: 55px;">

                                    <div class="row">

                                        <?php $image_split = get_sub_field('split_content_image'); ?>


                                        <div class="col-xs-12 col-sm-6">
                                            
                                            <?php the_sub_field('split_content_text'); ?>

                                        </div>

                                        
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="gsWrapper" style="position: relative; display: inline-block;">
                                            <div class="img-wrapper" style="margin-bottom: 40px;">
                                                <div style="position: relative;">
                                                   

                                                    <img src="<?php echo $image_split; ?>" alt="<?php echo $image2['alt'] ?>" style="display: inline; opacity: 1;"  class="greyScale">


                                                    <canvas width="710" height="376" class="gsCanvas" style="left: 0px;position: absolute;top: 0px;opacity: 1;display: block;"></canvas>
                                                </div>


                                             </div>
                                             </div>
                                             </div>

                                            </div>
                                            </section>




                                    <div class="center-block">
                                        <?php if( have_rows('brochure') ) : while( have_rows('brochure') ) : the_row(); ?>
                                        <div>
                                            <h3><?php the_sub_field('title');  ?></h3>
                                            <div><?php the_sub_field('content');  ?></div>
                                        </div>
                                        <?php endwhile; endif; ?>
                                    </div>
<!--                                     <div class="center-block">
                                        <div class="img-wrapper">
                                            <div class="gsWrapper" style="position: relative;">
                                                <?php $image3 = get_sub_field('big_image'); ?>
                                                    <img src="<?php echo $image3['url'] ?>" alt="<?php echo $image3['alt'] ?>" style="display: inline; opacity: 1;">
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <?php endwhile;?>
                    </div>
                </div>
            </div>
            
        </div>
	</section>
</div>
<?php endif; ?>


<?php get_footer(); ?>