<?php get_header(); while (have_posts()) : the_post(); ?>

<section id="standard">
    <div class="topper-back">

        <?php if (get_field('image_overlay')) : ?>
        <span class="image-overlay" style="background-image: url('<?php echo get_field('image_overlay'); ?>');"></span>
        <?php endif; ?>

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
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="description">
                    <?php echo the_content() ?>
                </div>
            </div>
        </div>
    </div>
</section>


<?php endwhile; get_footer(); ?>