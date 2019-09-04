<?php
/**
 * hashPress_slider_widget Class
 */
class hashPress_slider_widget extends WP_Widget
{

  public function __construct(){
    $widget_options = array(
      'classname' => 'hp-slider-widget',
      'description' => 'News Slider'
    );
    parent::__construct('hashPress_slider_widget','News Slider', $widget_options);
  }
  public function widget($args, $instance){
    $random_ID = rand();
    $wdgt_title = apply_filters( 'widget_title', $instance[ 'title' ] );
    echo $args['before_widget'] . $args['before_title'] . wp_strip_all_tags($wdgt_title) . $args['after_title'];
    $cat_id = $instance['checked_cat'];
    $posts_query = array(
      'cat' => explode(',', $cat_id),
      'posts_per_page' => 5,
      'meta_query' => array( 
        array(
            'key' => '_thumbnail_id'
        ) 
      )
    );
    query_posts($posts_query);
    $posts_count = 0;
    if(have_posts()) : echo '<div class="slideshow slideshow-'.$random_ID.'">';  while (have_posts()) : the_post() ;
      $salt = (!$posts_count == 0) ? 'display:none;' : 'display:block;';

    ?>

      <div class="slide-item fade2" style="<?php echo $salt?>background-image: url(<?php the_post_thumbnail_url('medium_large')?>);">
        <div class="after">
          <div class="slide-header">
          </div>
          <div class="slide-footer">
            <h4 class="post-title">
              <a href="<?php the_permalink()?>" title="<?php the_title()?>">
                <?php echo wp_strip_all_tags(_strcut(get_the_title(),100,'...'))?>
              </a>
            </h4>
            <div class="post-time-ago">
              تم النشر: <?php echo time_Ago(get_the_time('U')) ?>
            </div>
          </div>
        </div>
      </div>

    <?php 
    $posts_count++;
      endwhile;
      wp_reset_postdata();
      echo "<script>slideshow('.slideshow-$random_ID');</script></div>";
    endif;
    echo $args['after_widget'];
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
          <option value="<?php echo $cat->cat_ID?>"><?php echo strip_tags($cat->name) ?></option>
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

/**
 * hashPress_trend_widget Class
 */
class hashPress_trend_widget extends WP_Widget
{

  public function __construct(){
    $widget_options = array(
      'classname' => 'hp-trend-widget',
      'description' => 'News trend'
    );
    parent::__construct('hashPress_trend_widget','News trend', $widget_options);
  }
  public function widget($args, $instance){
    $random_ID = rand();
    $wdgt_title = apply_filters( 'widget_title', $instance[ 'title' ] );
    echo $args['before_widget'] . $args['before_title'] . wp_strip_all_tags($wdgt_title) . $args['after_title'];
    # posts time Period
    if ( $instance['current_date'] === 'day' ) {
      $timePeriod = 1;
    } elseif( $instance['current_date'] === 'week' ) {
      $timePeriod = 7;
    }else{
      $timePeriod = 30;
    }
    

    $date = date("Y-m-d");// current date
    $current_date = getdate(strtotime($date) - (( 60 * 60 * 24 ) * $timePeriod));
     

    $posts_query = array(
      'date_query' => array(
        array('after'=>  
          array(
              'year'  => $current_date['year'],
              'month' => $current_date['mon'],
              'day'   => $current_date['mday'],
          ),
        ),
      ),
      'meta_key' => 'post_views_count',
      'orderby' => 'meta_value_num',
      'order' => 'DESC',
      'posts_per_page' => 5
    );
    query_posts($posts_query);
    if (have_posts()) {
      
      while (have_posts()) {
        the_post();
        ?>
   <div class="post-item row" style="margin: 0">
    <span class="post-category" style="background: <?php echo get_random_css_color(); ?>">
        <a href="<?php echo get_category_link(get_cat(get_the_ID(),0,'cat_ID')) ?>">
            <b><?php echo get_cat(get_the_ID(),0,'cat_name');?></b>
        </a>
    </span>
                <div class="post-thumbnail col-5" style="height: 150px;">
                    <a href="<?php the_permalink()?>">
                        <?php the_post_thumbnail('thumbnail')?>
                    </a>
                </div>
                <div class="col-7 post-details">
                    <div class="header-block">
                        <h3 class="post-title">
                            <a href="<?php the_permalink()?>" title="<?php the_title()?>">
                              <?php
                                echo strip_tags(_strcut(get_the_title(),85,'...'));
                              ?>
                            </a>
                        </h3>
                    </div>
                    <div class="footer-block">
                        <div class="post-time-ago">
                            تم النشر: <?php echo time_Ago(get_the_time('U')) ?>
                        </div>
                        <div class="share-post">
                            <b class="fa fa-share-alt"></b>
                            <b class="share-btns fadebtn fa fa-facebook"></b>
                            <b class="share-btns fadebtn fa fa-twitter"></b>
                        </div>
                    </div>
                </div>
            </div>
        <?php
      }
    }else{
      echo "No Posts !";
    }
    
    echo $args['after_widget'];
  }
  public function form($instance){
    $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
    $current_date = ! empty( $instance['current_date'] ) ? $instance['current_date'] : '';
    $cats_list = get_categories();
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
      <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
      <select name="<?php echo $this->get_field_name( 'current_date' ); ?>" id="<?php echo $this->get_field_id( 'current_date' ); ?>">
        <option value="day" <?php echo ($current_date == 'day') ? "selected" : '' ;?>>1 Day</option>
        <option value="week" <?php echo ($current_date == 'week') ? "selected" : '' ;?>>7 Days</option>
        <option value="month" <?php echo ($current_date == 'month') ? "selected" : '' ;?>>30 Day</option>
      </select>
      
    </p>
    <?php
    
  }
  public function update($new_instance, $old_instance){
      $instance = $old_instance;
      $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
      $instance[ 'current_date' ] = strip_tags( $new_instance[ 'current_date' ] );
      return $instance;
    }
  
}

# Register hashPress_slider_widget
add_action( 'widgets_init', function(){
  register_widget( 'hashPress_trend_widget' );
  register_widget( 'hashPress_slider_widget' );
});