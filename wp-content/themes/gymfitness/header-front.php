<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo wp_get_document_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="site-header">
        <div class="contenedor">
            <div class="barra-navegacion">
                <div class="logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="logo sitio">
                </div>

                <?php
                    wp_nav_menu([
                        'theme_location' => 'menu-principal',
                        'container' => 'nav',
                        'container_class' => 'menu-principal'
                    ]);
                ?>
            </div>
            <!-- ./barra-navegacion -->
            <div class="tagline text-center">
                <h1><?php the_field('encabezado_hero'); ?></h1>
                <p><?php the_field('contenido_hero') ?></p>
            </div>
        </div>
    </header>