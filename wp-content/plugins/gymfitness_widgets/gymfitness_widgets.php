<?php 
    /*
*   Plugin Name: Gym Fitness - Post Types
*   Plugin URI:
*   Description: Añade Widgets de post types clases al sitio Gym Fitness
*   Version: 1.0.0
*   Author: codemau5
*   Author URI: https://codemau5.com
*   Text Domain: gymfitness
*/
if(!defined('ABSPATH')) die();
/**
 * Adds GymFitness_Clases_widget widget.
 */
class GymFitness_Clases_widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'GymFitness_Clases_widget', // Base ID
			esc_html__( 'GymFitness Clases', 'text_domain' ), // Name
			[ 'description' => esc_html__( 'Agrega las calses como Widget', 'text_domain' ), ] // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
        $cantidad=$instance['cantidad'] == '' ? $cantidad=3 : $instance['cantidad'];
        // echo $instance['fecha'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		// echo esc_html__( 'Hello, World!', 'text_domain' );
        ?>

        <ul>
            <?php 
                $args=[
                    'post_type'     =>  'clases',
                    'posts_per_page' =>  (int)$cantidad,
                    'orderby'       =>  'rand'
                ];
                $clases= new WP_Query($args);
                while($clases->have_posts()): $clases->the_post(); ?>
                    <?php 
                        $horario= get_field('hora_inicio') . ' a ' . get_field('hora_fin');  
                        $dias_clases=get_field('dias_clase');
                    ?>
                    <li class="clase-sidebar">
                        <div class="imagen">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('thumbnail') ?>
                            </a>
                        </div>
                        <div class="contenido-clase">
                            <a href="<?php the_permalink(); ?>">
                                <h3><?php the_title(); ?></h3>
                            </a>
                            <p class="informacion-clase">
                                <small><?php echo $dias_clases ?> </small><br> 
                                <?php echo $horario ?>
                            </p>
                        </div>
                    </li>   
                <?php endwhile; wp_reset_postdata(); ?>
        </ul>

        <?php
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$cantidad = ! empty( $instance['cantidad'] ) ? $instance['cantidad'] : esc_html__( 'Cuantas clases deseas mostrar?', 'gymfitness' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'cantidad' ) ); ?>">
            <?php esc_attr_e( 'Cuantas clases deseas mostrar?', 'gymfitness' ); ?>
        </label> 
		<input class="widefat" 
                id="<?php echo esc_attr( $this->get_field_id( 'cantidad' ) ); ?>" 
                name="<?php echo esc_attr( $this->get_field_name( 'cantidad' ) ); ?>" 
                type="number" 
                <?php if(is_numeric( $instance['cantidad'] )){ ?>
                    value="<?php echo esc_attr( $cantidad ); ?>"
                <?php } ?>
        >
        <label for="<?php echo esc_attr( $this->get_field_id( 'fecha' ) ); ?>">
            <?php esc_attr_e( 'Selecciona la fecha', 'gymfitness' ); ?>
        </label> 
        <input type="date" name="<?php echo esc_attr( $this->get_field_name( 'fecha' ) ); ?>" 
                 id="<?php echo esc_attr( $this->get_field_id( 'fecha' ) ); ?>" 
                 value="<?php echo esc_attr( $instance['fecha'] ); ?>"  >

		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = [];
		$instance['cantidad'] = ( ! empty( $new_instance['cantidad'] ) ) ? sanitize_text_field( $new_instance['cantidad'] ) : '';
        $instance['fecha']= ( ! empty( $new_instance['fecha'] ) ) ? sanitize_text_field( $new_instance['fecha'] ) : '';
		return $instance;
	}

} // class GymFitness_Clases_widget

// register GymFitness_registrar_widget widget
function gymfitness_registrar_widget() {
    register_widget( 'GymFitness_Clases_widget' );
}
add_action( 'widgets_init', 'gymfitness_registrar_widget' );

?>