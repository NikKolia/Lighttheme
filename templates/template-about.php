<?php
/* Template Name: About page */
get_header();
?>

    <main>
        <section class="hero">
            <div class="wrapper">
                <h1><?php the_title() ?></h1>
            </div>
            <?php the_post_thumbnail( 'full', 'class=hero-slider__img' ) ?>
        </section>

        <section class="texting">
            <div class="wrapper">
                <div class="text-wrap">
                    <?php the_content() ?>
                </div>
            </div>
        </section>

        <section class="our-production">
            <div class="wrapper">
                <h2 class="title blue"><?php the_field('block_title') ?></h2>

                <?php
                    $network = get_field('network_grid');

                    foreach ($network as $grid) {
                        echo '<h3>'. $grid['grid_items_title']['title'] .'</h3>';

                        echo '<div class="our-production__cont">';

                            foreach ($grid['grid_items'] as $item) { 
                                $content = $item['grid_item'];
                                $image = $content['image']['sizes']['medium_large'];
                            ?>
                                <a href="<?php echo $item['grid_item_link'] ?>" class="our-production__block" target="_blank">
                                    <img src="<?php echo $image ?>" alt="" class="our-production__img">
                                    <span class="our-production__title"><?php echo $content['location'] ?></span>
                                </a>
                            <?php }

                        echo '</div>';
                    }
                ?>

            </div>
        </section>
    </main>

<?php get_footer(); ?>