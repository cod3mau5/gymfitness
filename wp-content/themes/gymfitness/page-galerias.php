<?php 
/*
Template Name: Template para Galerias

*/
get_header();
?>

<main class="contenedor pagina seccion">
    
    <div class="contenido-principal">
    <?php while(have_posts()): the_post(); ?>

        <h1 class="text-center texto-primario"><?php the_title(); ?></h1>

        <?php 
            // otener la galeria de la pagina actual
            $galeria= get_post_gallery(get_the_ID(),false);
            // otener los ids
            $galeria_imagenes_ID=explode(',',$galeria['ids']);
        ?>
        <ul class="galeria-imagenes">
            <?php 
                $i=1;
                foreach($galeria_imagenes_ID as $id){
                    $size=( $i==4 || $i == 6 ) ? 'portrait' : 'square'; 
                    $imagenThumb=wp_get_attachment_image_src($id, $size);
                    $imagen=wp_get_attachment_image_src($id, 'full');
            ?>
            <li>
                <a href="<?php echo $imagen[0] ?>" data-lightbox="galeria">
                    <img src="<?php echo $imagenThumb[0] ?>" alt="imagen">
                </a>
            </li>
            <?php $i++; } ?>
        </ul>

        <!-- <p><?php the_content(); ?></p> -->

    <?php endwhile; ?>

    </div>

</main>

<?php get_footer();?> 