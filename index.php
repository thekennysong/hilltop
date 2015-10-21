<?php get_header(); ?>

<section id="standard">
    <div class="topper-back">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mainTitle">
                        <span class="huge2">
                            <?php echo grab_title() ?>
                        </span>
                    </h1>
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


<?php get_footer(); ?>