<?php

    // CONSULTAS REUTILIZABLES
    require get_template_directory() .'/includes/queries.php';
    require get_template_directory() .'/includes/shortcodes.php';

    
    // Cuando el tema es activado
    function gymfitness_setup() {

        // Habilitar imagenes destacadas
        add_theme_support('post-thumbnails');

        // Titulos SEO
        add_theme_support('title-tag');

        // Agregar imagenes de tamaño personalizado
        add_image_size('square', 350, 350, true);
        add_image_size('portrait', 350, 724, true);
        add_image_size('cajas', 400, 375, true);
        add_image_size('mediano', 700, 400, true);
        add_image_size('blog', 966, 644, true);
    }
    add_action('after_setup_theme', 'gymfitness_setup');

    // Menus de navegacion, agregar más utilizando el arreglo
    function gymfitness_menus(){
        register_nav_menus([
            'menu-principal' => __('Menu Principal', 'gymfitness'),
        ]);
    }

    add_action('init', 'gymfitness_menus');

    // Scripts y Styles
    function gymfitness_scripts_styles(){
        /** ### CSS ### */
        // normalize
        wp_enqueue_style('normalize',get_template_directory_uri(). '/css/normalize.css', [], '8.0.1');
        // slickNavCSS
        wp_enqueue_style('slicknavCSS',get_template_directory_uri(). '/css/slicknav.min.css', [], '1.0.0');
        // Google fonts
        wp_enqueue_style('googleFont', 'https://fonts.googleapis.com/css?family=Open+Sans|Raleway:400,700,900|Staatliches&display=swap', [], '1.0.0' );
        // Lightbox
        if(is_page('galeria')){
            wp_enqueue_style('lightboxCSS',get_template_directory_uri(). '/css/lightbox.min.css', [], '2.11.3');
        }
        // bxSliderCSS
        if(is_page('inicio')):
            wp_enqueue_style('bxSliderCSS', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css', array(), '4.2.12');
        endif;
        // custom CSS
        wp_enqueue_style('style',get_stylesheet_uri(), ['normalize','googleFont'], '1.0.0');
        

        /** ### JS ### */
        // slickNavJS
        wp_enqueue_script('slicknavJS', get_template_directory_uri() . '/js/jquery.slicknav.min.js', ['jquery'], '1.0.0', true);
        // LightboxJS
        if(is_page('galeria')){
            wp_enqueue_script('lightboxJS', get_template_directory_uri() . '/js/lightbox.min.js', ['jquery'], '2.11.3', true);
        }
        // bxSliderJS
        if(is_page('inicio')):
            wp_enqueue_script('bxSliderJS', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js', array('jquery'), '4.2.12', true);
        endif;

        // customJS
        wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', ['jquery','jquery-ui-core','jquery-effects-bounce'], '1.0.0', true);

    }
    add_action('wp_enqueue_scripts','gymfitness_scripts_styles');

    // Definir zona de wigdets
    function gymfitness_widgets(){
        register_sidebar([
            'name'          =>  'Sidebar 1',
            'id'            =>  'sidebar_1',
            'before_widget' =>  '<div class="widget">',
            'after_widget'  =>  '</div>',
            'before_title'  =>  '<h3 class="text-center texto-primario">',
            'after_title'   =>  '</h3>'  
        ]);
        register_sidebar([
            'name'          =>  'Sidebar 2',
            'id'            =>  'sidebar_2',
            'before_widget' =>  '<div class="widget">',
            'after_widget'  =>  '</div>',
            'before_title'  =>  '<h3 class="text-center texto-primario">',
            'after_title'   =>  '</h3>'  
        ]);
    }
    add_action('widgets_init','gymfitness_widgets');

    function my_acf_google_map_api( $api ){
    
        $api['key'] = 'AIzaSyDl3QdpavEMHbNxiU9AqmO577Hir0EZ_Ho';
        
        return $api;
        
    }
    
    add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');


    function gymfitness_hero_image(){
        // obtener id pagina home
        $front_page_id= get_option('page_on_front');
        $id_imagen= get_field('imagen_hero',$front_page_id);

        $imagen= wp_get_attachment_image_src($id_imagen,'full')[0];

        // Style CSS
        wp_register_style('custom',false);
        wp_enqueue_style('custom');

        $imagen_destacada_css="
            body.home .site-header {
                background-image: linear-gradient( rgba(0,0,0,0.75), rgba(0,0,0,0.75) ), url($imagen );
            }
        ";
        wp_add_inline_style('custom',$imagen_destacada_css);

    }
    add_action('init','gymfitness_hero_image');