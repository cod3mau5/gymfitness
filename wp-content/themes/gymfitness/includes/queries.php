<?php 
function gymfitness_lista_clases($cantidad= 10){  
?>

    <ul class="lista-clases">
        
<?php 
        $args = [
            'post_type' =>  'clases',
            'posts_per_page' => $cantidad
        ];
        $clases= new WP_Query($args);
        while($clases->have_posts()): $clases->the_post();
?>

            <li class="clase card gradient">
                <?php the_post_thumbnail('mediano'); ?>
                <div class="contenido">
                    <a href="<?php the_permalink(); ?>">
                        <h3><?php the_title(); ?></h3>
                    </a>
                    <?php 
                        $horario=get_field('hora_inicio') . ' a ' . get_field('hora_fin');
                    ?>
                    <p><?php the_field('dias_clase') ?> - <?php echo $horario ?></p>

                </div>
            </li>

<?php
        endwhile; wp_reset_postdata();   
?>
    </ul>
    
<?php
}
?>
