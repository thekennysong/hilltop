<?php
/*
Template Name: services
*/
?>

<?php get_header(); while (have_posts()) : the_post(); ?>



<section id="services-top">
    <div class="topper-image" style="background-image: url('<?php echo get_field('image_overlay'); ?>');">
        <div class="container">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                     <h1 class="servicesTitle">
                        <span class="huge2">
                            <?php if (get_the_title()) : ?>
                                <?php echo get_the_title(); ?>
                            <?php endif; ?>
                        </span>
                    </h1>
                    <div class="middler">
                        <?php if(get_field('top_description')) : ?>
                            <?php echo get_field('top_description'); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="row grey-out">
            <div class="col-md-12">
                <div class="alignShift">


                    <?php
                    $loop = new WP_Query(array('posts_per_page' => -1, 'post_type' => 'services'));
                    while ( $loop->have_posts() ) : $loop->the_post(); ?>
                        <a href="#<?php echo url_slug(get_the_title()); ?>" class="btn-small-services slide-please">

                            <span class="wrap icon"><?php echo get_field('icon'); ?></span>
                            <p class="serviceName"><div class='easy'><?php echo get_the_title() ?></div></p>
                        </a>

                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>

                </div>
            </div>


        </div>
        <div class="arrow-down-grey"></div>



                    <?php
                    $loop = new WP_Query(array('posts_per_page' => -1, 'post_type' => 'services'));
                    while ( $loop->have_posts() ) : $loop->the_post(); ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <h4 class="title-services" id="<?php echo url_slug(get_the_title()); ?>"><?php echo get_the_title()  ?></h4>
                                    <hr>
                                    <div class="services-blurb"><?php echo the_content() ?></div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>





</section>





<!-- 	<?php the_title(); ?>
	<?php the_content(); ?> -->

<?php endwhile; get_footer(); ?>