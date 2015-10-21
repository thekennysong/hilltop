<?php get_header(); while (have_posts()) : the_post();

$id = get_field('location'); //grabs metadata, returns id of post object
?>


<section id="bio">
    <div class="topper-back">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="name">
                        <?php echo get_the_title(); ?>
                    </h2>

                    <hr>
                    <p class="partners">
	                    <?php if (get_field('position')) : ?>
						<?php echo get_field('position'); ?> -
						<?php endif; ?>
                            <?php echo get_the_title($id); ?>
                    </p>

                    <div class="row contact-info">
                        <div class="col-xs-6 lefter">
                            <p>
                                <?php if (get_field('email')) : ?>
                                    <a href="mailto:<?php echo get_field('email'); ?>"><?php echo get_field('email'); ?></a>
                                <?php endif; ?>
                            </p>



                            <p>
                                <?php if (get_field('phone',$id)) : ?>
                                    Ph: <a href="tel:<?php echo get_field('phone',$id); ?>"><?php echo get_field('phone',$id); ?></a>
                                <?php endif; ?>
                            </p>
                            <p>
                                <?php if (get_field('fax',$id)) : ?>
                                   Fax: <a href="tel:<?php echo get_field('fax',$id); ?>"><?php echo get_field('phone',$id); ?></a>
                                <?php endif; ?>
                            </p>
                        </div>

                        <div class="col-xs-6 righter">
                             <p>
                                <?php if (get_field('address',$id)) : ?>
                                    <?php echo get_field('address',$id); ?>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="arrow-down-dark-blue"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="description">
                            <?php echo the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php posts_nav_link('sep','previous ','next '); ?>



</section>

 <?php
    $next_post = get_next_post();
    $previous_post = get_previous_post();

?>


    <div class="no-container bottom-bio-top">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="fixer-height">
                        <a href="/our-team#<?php echo url_slug(get_the_title($id)); ?>">
                            <h3 class="partners-bottom">Meet the Team</h3>
                            <hr>
                            <h2><div class="bottom-name"><?php echo get_the_title($id); ?> <i class="fa fa-chevron-right"></i></div></h2>
                        </a>
                </div>
            </div>
        </div>
    </div>




<?php endwhile; get_footer(); ?>