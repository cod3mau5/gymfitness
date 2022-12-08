<?
/*
* Template Name: Contenido Centrado (No sidebars)
*/
?>
<script>
    console.log('###########___ESTE ES EL PAGE-NO-SIDEBARS.PHP___###########')
</script>
<?php get_header();?>

    <main class="contenedor pagina seccion no-sidebar">

        <div class="contenido-principal">
            <?php get_template_part('template-parts/loop-paginas'); ?>
        </div>
        
    </main>



<?php get_footer();?> 