<?php

function theme_styles_scripts_including(){
  # Include Bootstarp Css Library
  wp_enqueue_style('theme-bootstrap-lib', get_template_directory_uri() . '/inc/css/bootstrap.min.css');

  # Include Font Awesome Library
  wp_enqueue_style('font-awesome-lib', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

	# Include Css Theme Styles
	wp_enqueue_style('theme-style', get_template_directory_uri() . '/style.css');
	
	# Include Bootstrap Js Libraries
	wp_enqueue_script('theme-bootstrap-lib', get_template_directory_uri() . '/inc/js/bootstrap.min.js');
	wp_enqueue_script('theme-jquery-lib', get_template_directory_uri() . '/inc/js/jquery.min.js');
	wp_enqueue_script('theme-popper', get_template_directory_uri() . '/inc/js/popper.min.js');

	# Script Js File
	wp_enqueue_script('theme-script', get_template_directory_uri() . '/inc/js/js_functions.js');
}

// Resources Including Action
add_action( 'wp_enqueue_scripts', 'theme_styles_scripts_including');

function hashPress_setup(){

	# Enable support for Post Thumbnails on posts and pages.
  add_theme_support('post-thumbnails');

}
  add_theme_support('post-thumbnails');

add_action('after_theme_setup','hashPress_setup');

if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Sidebar First Widget Area',
    'id' => 'sidebar-first-widget-area',
    'before_widget' => '<div class = "widget-item-Area">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  )
);


# Hash Press Custom Widgets

// register hashPress_slider_widget
add_action( 'widgets_init', function(){
	register_widget( 'hashPress_slider_widget' );
});

# Category Info From Post ID

function get_cat($post_ID,$cat_index=NULL,$filed=NULL){
  # Get Categories List Of Current Post
  $cats_list = get_the_category($post_ID);

  #
  if ($cat_index === 'NULL') {
    $data = $cats_list;
  }else{
    if ($filed === 'NULL') {
      $data = $cats_list[$cat_index];
    }else{
      $data = $cats_list[$cat_index]->$filed;
    }
  }

  return $data;
}

/**
 * hashPress_slider_widget Class
 */
class hashPress_slider_widget extends WP_Widget
{
	
	public function __construct()
	{
		$widget_options = array(
			'classname' => 'hp-slider-widget',
		  'description' => 'test'
		);
		parent::__construct('hashPress_slider_widget','News Slider', $widget_options);
	}
  public function widget($args, $instance){
    $wdgt_title = apply_filters( 'widget_title', $instance[ 'title' ] );
    echo $args['before_widget'] . $args['before_title'] . $wdgt_title . $args['after_title'];
    echo $instance['checked_cat'];
    ?>

    <?php echo $args['after_widget'];
  }
  public function form($instance){
    $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
    $checked_cat = ! empty( $instance['checked_cat'] ) ? $instance['checked_cat'] : '';
    $cats_list = get_categories();
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
      <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
      <datalist id="cats-list" >
        <?php
        foreach ($cats_list as $cat) {
          ?>
          <option value="<?php echo $cat->cat_ID?>"><?php echo $cat->name?></option>
          <?php
        }
        ?>
      </datalist><br>
      <label for="<?php echo $this->get_field_id( 'checked_cat' ); ?>">Categories:</label>
      <input type="text" list="cats-list" name="<?php echo $this->get_field_name( 'checked_cat' ); ?>" id="<?php echo $this->get_field_id( 'checked_cat' ); ?>" value="<?php echo esc_attr( $checked_cat ); ?>">
    </p>
    <?php
    
  }
  public function update($new_instance, $old_instance){
      $instance = $old_instance;
      $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
      $instance[ 'checked_cat' ] = strip_tags( $new_instance[ 'checked_cat' ] );
      return $instance;
    }
	
}
#Random Css Color For List 
function get_random_css_color(){
  $colors  = array(
    '#00a696',
    '#eeb828',
    '#08b2e3',
    '#f33258',
    '#9a41b1'

  );
  return $colors[rand(0,5)];
}