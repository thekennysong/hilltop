<?php get_header(); while (have_posts()) : the_post();
 ?>


<section id="call-to-action" style="background-image: url('<?php echo get_field('background_image'); ?>');">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 contents">
                <div class="wrapper">
                     <h1 class="mainTitle">
                        <span class="huge">
                            <?php if (get_field('title')) : ?>
                                <?php echo get_field('title'); ?>
                            <?php endif; ?>
                        </span>
                    </h1>
                    <p class="blurb">
                        <?php echo get_field('sub_title'); ?>
                    </p>

                    <a class="btn-hollow-blueTop" href="#our-services">
                        <?php echo get_field('button_text'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="our-services">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h2 class="title">
                    <?php if (get_field('service_section_title')) : ?>
                        <?php echo get_field('service_section_title'); ?>
                    <?php endif; ?>
                </h2>
            <hr>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <p class="services-blurb">
                            <?php if (get_field('service_section_body')) : ?>
                                <?php echo get_field('service_section_body'); ?>
                            <?php endif; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>
<div class="arrow-down-grey"></div>

<section class="services-two">
    <div class="container">
        <div class="row">
            <div class="col-md-12 fixerleft">
                <div class="alignShift">

                    <div class="col-md-12">
                    <?php
                    $loop = new WP_Query(array('posts_per_page' => -1, 'post_type' => 'services'));
                    while ( $loop->have_posts() ) : $loop->the_post(); ?>
                        <a href="/services#<?php echo url_slug(get_the_title()); ?>" class="btn-big-action1">
                        <?php if (get_field('preview')) :
                            $preview = get_field('preview');
                            $tags = array("<p>", "</p>");
                            $preview = str_replace($tags, "", $preview);
                            ?>
                                <span class="wrap serviceD fadeIn">
                                    <?php echo $preview  ?>
                                    <br></br>
                                    <div>Learn More <i class="fa fa-angle-right"></i></div>
                                </span>
                        <?php endif; ?>

                            <span class="wrap icon"><?php echo get_field('icon'); ?></span>
                            <p class="serviceName"><?php echo get_the_title() ?></p>
                        </a>

                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                    </div>
                </div>
            </div>

            <a class="btn-hollow-blue" href="<?php echo get_field('service_button_url'); ?>">
                <?php echo get_field('service_button_text'); ?>
            </a>

        </div>
    </div>

</section>

<section id="test">

    <h2 class="text"><?php echo get_field('testimonial_title'); ?></h2>
    <hr>
    <ul class="bxslider bxslider-1">
    <?php foreach(get_field('testimonials') as $testimonials) : ?>
        <li>
            <div class="link slide" data-effect="parallax" data-speed="5" data-opacity-rate="1.15">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 fade-in-down">
                            <p class="testBod"><?php echo $testimonials['testimonial_body']  ?></p>
                            </br>
                            <?php if ($testimonials['person']): ?>
                                <p class="personName">- <?php echo $testimonials['person']  ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    <?php endforeach; ?>

    </ul>

</section>


<div class="overlayGradient">

<section id="team">
<div class="arrow-down-blue"></div>
    <div class="no-container clearfix">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h2 class="title">
                    <?php if (get_field('our_team_title')) : ?>
                        <?php echo get_field('our_team_title'); ?>
                    <?php endif; ?>
                </h2>
            <hr>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">

                        <?php if (get_field('our_team_body')) :
                        $teamBody = get_field('our_team_body');
                        $tags = array("<p>", "</p>");
                        $teamBody = str_replace($tags, "", $teamBody);
                        ?>
                        <p class="team-blurb">
                            <?php echo $teamBody; ?>
                        </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    <div class="no-row clearfix">
        <ul class="grid">
            <?php foreach(get_field('cities') as $cities) : ?>
            <li class="<?php echo $cities['city_name'] ?>">
                <a href="/our-team#<?php echo url_slug($cities['city_full_name_link']); ?>" class="front">
                    <span class="cityPic" style="background-image: url('<?php echo $cities['city_image'] ?>');">
                    </span>
                        <span class="cityText">
                            <span class="hugefinal">
                                <?php echo $cities['city_name'] ?>
                            </span>
                        </span>

                </a>
            </li>
            <?php endforeach; ?>
            <li class="contact">
                <div class="cityPic">

                </div>

                <a href="/contact-us" class="btn-hollow-gold2 front">Contact Us</a>

            </li>
        </ul>
        </div>
    </div>
</section>
</div>

<?php endwhile; get_footer(); ?>