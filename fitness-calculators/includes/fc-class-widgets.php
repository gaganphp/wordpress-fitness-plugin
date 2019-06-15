<?php
// Register and load the widget
function Fcpwater_load_widget() {
        register_widget( 'Fcpwater_widget' );
}
add_action( 'widgets_init', 'Fcpwater_load_widget' );
 
// Creating the widget 
class Fcpwater_widget extends WP_Widget {
 
    function __construct() {
        parent::__construct(        
        'Fcpwater_widget',         
        __('Water intake calculator', 'Fcpwater_widget_domain'),         
        array( 'description' => __( 'Water intake calculator', 'Fcpwater_widget_domain' ), ) 
        );
    }
 
    // Creating widget front-end
    
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        echo $args['before_widget'];
        if ( ! empty( $title ) )
        echo $args['before_title'] . $title . $args['after_title'];        
        echo do_shortcode('[fcp-water-intake-calculator]');
        echo $args['after_widget'];
    }
         
    // Widget Backend 
    public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
            }
            else {
            $title = __( 'Water intake calculator', 'wpb_widget_domain' );
            }
            ?>
            <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
    <?php 
    }
     
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
} 


?>