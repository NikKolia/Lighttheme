<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <?php wp_head() ?>

</head>

<body>
<!-- header
================================================== -->
<header>
    <div class="wrapper">
        <div class="logo">
            <?php if( has_custom_logo() ):  ?>
                <?php
                // Get Custom Logo URL
                $custom_logo_id = get_theme_mod( 'custom_logo' );
                $custom_logo_data = wp_get_attachment_image_src( $custom_logo_id , array( 33, 30 ) );
                $custom_logo_url = $custom_logo_data[0];
                ?>

                <a href="<?php echo esc_url( home_url( '/', 'https' ) ); ?>"
                   title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"
                   rel="home">

                    <img src="<?php echo esc_url( $custom_logo_url ); ?>"
                         alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"/>

                </a>
            <?php else: ?>
                <div class="site-name"><?php bloginfo( 'name' ); ?></div>
            <?php endif; ?>
        </div>
        <div id="navi-wrap">
            <nav id="mainnav" class="clearfix" role="navigation">
                <?php
                // Display Main Navigation
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_id' => 'mainnav-menu',
                    'menu_class' => 'main-navigation-menu',
                    'echo' => true,
                    'fallback_cb' => 'courage_default_menu',
                ) );
                ?>
            </nav>
        </div>
    </div>
</header>