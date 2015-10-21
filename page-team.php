<?php
/*
Template Name: team
*/
?>

<?php get_header(); while (have_posts()) : the_post(); ?>



<main id="team">

    <section class="topper-back">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mainTitle">
                        <span class="huge2">
                            <?php echo get_the_title() ?>
                        </span>
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="middle-please">
                        <?php if(get_field('top_description')) : ?>
                            <?php echo get_field('top_description'); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>

    </section>



    <section id="accordion">

        <?php
        $i = 0;
        $cities = array();
        $loop = new WP_Query(array('posts_per_page' => -1, 'post_type' => 'city'));
        while($loop->have_posts()) : $loop->the_post();

            $cities[$i]['id'] = get_the_ID();
            $cities[$i]['background_image'] = get_field('background_image');
            $cities[$i]['title'] = get_the_title();
            $cities[$i]['lead_text'] = get_field('lead_text');
            $cities[$i]['address'] = get_field('address');
            $cities[$i]['phone'] = get_field('phone');
            $cities[$i]['fax'] = get_field('fax');


        $i++;
        endwhile;
        wp_reset_postdata();
        ?>



        <?php foreach($cities as $city) : ?>
        <div class="city" id="<?php echo url_slug($city['title']); ?>">

            <a href="#" class="close-me"><i class="fa fa-times"></i></a>

            <span class="img" style="background-image: url('<?php echo $city['background_image']; ?>');"></span>

            <div class="inner title">
                <h2 class="mainTitle">
                    <span class="huge2"><?php echo $city['title']; ?></span>

                </h2>
            </div>

            <div class="inner contents">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 box">
                            <span class="lead-text"><?php echo $city['lead_text']; ?></span>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-xs-6 left">
                            <div class="shift">
                            <h4 class="partner-inside">Team Members
                            </h4>
                            <hr class="clearfix">
                            </div>
                            <div class="money">
                            <?php

                            $loop = new WP_Query(
                                array(
                                    'post_type' => array('team'),
                                    'orderby' => 'published',
									'order' => 'ASC',
                                    'posts_per_page' => -1,
                                    'meta_query' => array(
                                        array(
                                            'key' => 'location',
                                            'compare' => '=',
                                            'value' => $city['id']
                                        )
                                    )
                                )
                            );
                            while($loop->have_posts()) : $loop->the_post();
                            ?>
                            <div class="clearfix"></div>
                            <span><a class="name-right" href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></span>
	                        <?php
                            endwhile;
                            wp_reset_postdata();
                            ?>
                            </div>
                        </div>
                        <div class="col-xs-6 right">
                            <span class="style-please">
                                <address class="pad">
                                <?php echo $city['address']; ?>
                                </address>
                                <?php if ($city['phone']): ?>
                                <div class="clearfix"></div>
                                <span class="phone"><?php echo $city['phone']; ?> - Phone</span>
                                <?php endif; ?>
                               <?php if ($city['fax']): ?>
                                <div class="clearfix"></div>
                                <span class="fax"><?php echo $city['fax']; ?> - Fax</span>
                                <?php endif; ?>
                            </span>
                        </div>




                    </div>
                </div>
            </div>

        </div>
        <?php endforeach; ?>




    </section>



</main>




<?php endwhile; get_footer(); ?>