<?php

add_action('wp_enqueue_scripts', 'theme_styles');
add_action('wp_enqueue_scripts', 'theme_js');

function theme_styles() {
    wp_enqueue_style( 'fonts', get_template_directory_uri() . '/assets/css/fonts.css' );
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css', array('fonts') );
    wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.css', array('fonts', 'slick') );

}

function theme_js() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('nav', get_template_directory_uri() . '/assets/js/nav.js', array('jquery'), null, true);
    wp_enqueue_script('slick', get_template_directory_uri() . '/assets/js/slick.js', array('jquery'), null, true);
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);
}

add_action( 'after_setup_theme', 'fixer_styles' );
function fixer_styles(){
    add_theme_support( 'editor-styles' ); // обязательно!
    add_editor_style( '/assets/css/editor.css' );
}

add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support( 'widgets' );
add_filter('widget_text', 'do_shortcode');

// Support custom logo
add_theme_support( 'custom-logo' );
function fixer_custom_logo_setup() {
    $defaults = array(
        'height'      => 30,
        'width'       => 33,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => true,
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'fixer_custom_logo_setup' );

// Image crop-size for logo
if (function_exists('add_image_size')) {
    add_image_size('logo-image', 33, 30, true);
}

// Register menu
register_nav_menus( array(
    'primary'  => __( 'Header menu', 'fe_starter' ),
) );

// Adding standart menu function
function courage_default_menu() {
    echo '<ul id="mainnav-menu" class="menu">'. wp_list_pages('title_li=&echo=0') .'</ul>';
}

// Adding shortcode usage
do_shortcode( $content, $ignore_html );

function my_register_sidebars() {
    register_sidebar( array(
        'name' => esc_html__( 'Footer center', 'nd_dosth' ),
        'id' => 'footer-center',
        'description'   => esc_html__( 'Widgets added here would appear inside the left section of the footer', 'nd_dosth' ),
        'before_widget' => '<aside id="%1$s" class="selfWidget1">', // то что стоит пред блоком виджета
        'after_widget' => '</aside>', // то что стоит после блока виджета
        'before_title' => '<p class="widget-title">', // стоит перед тайтлом
        'after_title' => '</p>', // после тайтла.
    ));
}
add_action( 'widgets_init', 'my_register_sidebars' );



// Register and load the copyright widget
function copyright_load_widget() {
    register_widget( 'copyright_widget' );
}
add_action( 'widgets_init', 'copyright_load_widget' );

// Creating the widget
class copyright_widget extends WP_Widget {

    function __construct() {
        parent::__construct(

// Base ID of widget
            'copyright_widget',

// Widget name will appear in UI
            __('COPYRIGHT'),

// Widget description
            array( 'description' => __( 'Edit your copyright' ), )
        );
    }

// Creating widget front-end
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );

// before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];

    }

// Widget Backend
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'Copyright &copy; 2019 Строительная компания' );
        }
// Widget admin form
        ?>


        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Text:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />


        <?php
    }

// Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
} // Class copyright_widget ends here
