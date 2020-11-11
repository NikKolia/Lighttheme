<?php
/* Template Name: Home page */
get_header();
?>

    <main>
        <section class="hero-slider">
            <?php
            if( have_rows('slider') ):
                while ( have_rows('slider') ) : the_row();
                    if( get_row_layout() == 'slide' ):
                        if( have_rows('slide_image') ):

                            echo '<div class="hero-slider__block">';
                                while ( have_rows('slide_image') ) : the_row();
                                    $image = get_sub_field('image');
                                    echo '<img class="hero-slider__img" src="' . $image['url'] . '" alt="' . $image['alt'] . '" />';
                                endwhile;

                                echo '<div class="wrapper">';
                                    while ( have_rows('slide_text') ) : the_row();
                                        echo '<h2>';
                                            echo the_sub_field('first_text');
                                        echo '</h2>';
                                        echo '<h4 class="white">';
                                            echo the_sub_field('second_text');
                                        echo '</h4>';
                                    endwhile;
                                echo '</div>';
                            echo '</div>';

                        endif;
                    endif;
                endwhile;
            else :
                // макетов не найдено
            endif;
            ?>
        </section>

        <section class="about">
            <div class="wrapper">
                <div class="text-wrap">
                    <h2 class="title blue"><?php the_field('title_first_block') ?></h2>
                </div>
            </div>
        </section>

        <section class="texting">
            <div class="wrapper">
                <div class="text-wrap">
                    <?php the_field('text_first_block') ?>
                </div>
            </div>
        </section>

        <section class="features">
            <div class="wrapper">
                <h2 class="title blue"><?php the_field('title_second_block') ?></h2>

                <div class="features__cont">
                    <?php
                    if( have_rows('grid_second_block') ):
                        while ( have_rows('grid_second_block') ) : the_row();
                            if( get_row_layout() == 'grid_item' ):
                                if( have_rows('grid_image') ):

                                    echo '<div class="features__block">';
                                        while ( have_rows('grid_image') ) : the_row();
                                            $image = get_sub_field('image');
                                            echo '<img class="features__img" src="' . $image['url'] . '" alt="' . $image['alt'] . '" />';
                                        endwhile;

                                        while ( have_rows('grid_text') ) : the_row();
                                            echo '<h4 class="blue">';
                                            echo the_sub_field('title');
                                            echo '</h4>';
                                            echo '<span class="text--16">';
                                            echo the_sub_field('text');
                                            echo '</span>';
                                        endwhile;
                                    echo '</div>';

                                endif;
                            endif;
                        endwhile;
                    else :
                        // макетов не найдено
                    endif;
                    ?>
                </div>
            </div>
        </section>

        <section class="contactus">
            <div class="wrapper">
                <h2 class="title white">Get in Touch</h2>
                <div class="contactus__block">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/marker.png" alt="" class="contactus__img">
                    <div class="contactus__group">
                        <h4 class="white">Give us a shout</h4>
                        <a href="mailto:hello@fixersouthkorea.com " class="contactus__link"><?php the_field('e-mail') ?></a>
                        <span class="contactus__text"><?php the_field('address') ?></span>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>