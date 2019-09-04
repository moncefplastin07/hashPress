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
 # Add Home Small Thumbnails Size
add_image_size('home-small-thumb',275,200);

add_action('after_theme_setup','hashPress_setup');
# Include Widgets File
include_once 'inc/components/widgets.php';
# Include Menus File
include_once 'inc/components/menus.php';
# Include Widgets File
include_once 'inc/components/custom-fields.php';

# Posts Pagination
$posts_pagination = get_the_posts_pagination(
    array(
        'mid_size' => 5,
        'next_text' => __('التالي','textdomain'),
        'prev_text' => __('السابق','textdomain'),
        'screen_reader_text' => __(' ','textdomain')
    )
);

# Create New Sidebar Widget Area
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

if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Main bar First Widget Area',
    'id' => 'mainbar-first-widget-area-1',
    'before_widget' => '<div class="widget-item-Area">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  )
);

# Create New Sidebar Widget Area
if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Footer Blocks',
    'id' => 'footer-block',
    'before_widget' => '<div class="footer-block text-right col-sm-12 col-md-6 col-lg-4">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="footer-block-title">',
    'after_title' => '</h3>',
  )
);


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
  # Return Category Info
  return $data;
}


# Random Css Color For List 
function get_random_css_color(){
  $colors  = array(
    '#00a696',
    '#eeb828',
    '#08b2e3',
    '#f33258',
    '#000'
  );
  return $colors[rand(0,4)];
}

function time_Ago($timestamp) { 
  // Calculate difference between current 
  // time and given timestamp in seconds 
  $diff  = current_time('timestamp') - $timestamp; 
  
  // Time difference in seconds 
  $sec   = $diff; 
  
  // Convert time difference in minutes 
  $min   = round($diff / 60 ); 
  
  // Convert time difference in hours 
  $hrs   = round($diff / 3600); 
  
  // Convert time difference in days 
  $days  = round($diff / 86400 ); 
  
  // Convert time difference in weeks 
  $weeks   = round($diff / 604800); 
  
  // Convert time difference in months 
  $mnths   = round($diff / 2600640 ); 
  
  // Convert time difference in years 
  $yrs   = round($diff / 31207680 ); 
  
  // Check for seconds 
  if($sec <= 60) { 
    return "منذ لحظات"; 
  } 
  
  // Check for minutes 
  else if($min <= 60) { 
    if($min==1) { 
      return "منذ دقيقة"; 
    }
    elseif($min==2){
      return "منذ دقيقتين";
    }
    elseif($min < 11){
      return "منذ $min دقائق";
    }
    else { 
      return "منذ $min دقيقة"; 
    } 
  } 
  
  // Check for hours 
  else if($hrs <= 24) { 
    if($hrs == 1) { 
      return "منذ ساعة"; 
    }
    elseif($hrs==2){
      return "منذ ساعتين";
    }
    elseif($hrs < 11){
      return "منذ $hrs ساعات";
    }
    else { 
      return "منذ $hrs ساعة"; 
    } 
  } 
  
  // Check for days 
  else if($days <= 7) { 
    if($days == 1) { 
      return "منذ يوم"; 
    }
    elseif($days==2){
      return "منذ يومين";
    }
    elseif($days < 11){
      return "منذ $days ايام"; 
    }
    else { 
      return "منذ $days يوم"; 
    } 
  } 
  
  // Check for weeks 
  else if($weeks <= 4.3) { 
    if($weeks == 1) { 
      return "منذ اسبوع"; 
    }
    elseif($weeks==2){
      return "منذ اسبوعين";
    }
    else { 
      return "منذ $weeks اسابيع"; 
    } 
  } 
  
  // Check for months 
  else if($mnths <= 12) { 
    if($mnths == 1) { 
      return "منذ شهر"; 
    }
    elseif($mnths==2){
      return "منذ شهرين";
    }
    elseif($months < 11){
      return "منذ $mnths اشهر"; 
    }
    else { 
      return "منذ $mnths شهر"; 
    } 
  } 
  
  // Check for years 
  else { 
    if($yrs == 1) { 
      return "منذ عام"; 
    }
    elseif($yrs==2){
      return "منذ عامين";
    }
    elseif($yrs < 11){
      return "منذ $yrs اعوام"; 
    }
    else { 
      return "منذ $yrs عام"; 
    } 
  } 
} 


function current_page_title(){
  $blog_title = get_bloginfo('title');
  if (is_home()) {
    $page_title = '';
  }
  elseif (is_single() || is_page()) {
    $page_title = the_title()." | ";
  }elseif(is_404()){
    $page_title = '404 - الصفحة غير موجودة | ';
  }

  return $page_title . $blog_title;

}


add_action('wp_ajax_hP_ajaxify_get_post_comments','hashPress_ajaxify_get_post_comments');
add_action('wp_ajax_nopriv_hP_ajaxify_get_post_comments','hashPress_ajaxify_get_post_comments');

function hashPress_ajaxify_get_post_comments(){
  $args = array(
    'post_id' => $_POST['post_id'],
    'status' => 'approve',
    'parent' => '0'
  );
  $comments = get_comments($args);
  $commnets_result = array();
  $commnets_count = 0;
  foreach ($comments as $comment) {
    $commnets_result['comments'][] = array(
      'ID' => $comment->comment_ID,
      'author' => array('name' => $comment->comment_author, 'url' =>$comment->comment_author_url),
      'content' => $comment->comment_content,
      'timeAgo' => time_Ago($comment->comment_date)
    );
    $commnets_count++;
  }
  $commnets_result['count'] = $commnets_count;
  echo json_encode($commnets_result);
  die();
}

add_action('wp_head',function (){
  ?>
  <script type="text/javascript">
    var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' )?>";
  </script>
  <?php
});

function setPostViews($post_ID){
  # Post Meta Key
  $meta_key = 'post_views_count';

  # Get Post Views From Meta
  $post_views = get_post_meta( $post_ID, $meta_key, true );

  if ($post_views == '') {
    # Delete Post Meta
    delete_post_meta($post_ID, $meta_key);

    # Add New Post Meta
    add_post_meta($post_ID, $meta_key, '1');

  }else{
    # Add View To Past Views Count
    $post_views++;

    # Update Post Views Count Meta Value
    update_post_meta( $post_ID, $meta_key, $post_views );

  }

}
function getPostViews($post_ID){
  # Post Meta Key
  $meta_key = 'post_views_count';

  # Get Post Views From Meta
  $post_views = get_post_meta( $post_ID, $meta_key, true );

  # Return Post Views From Post Meta
  return $post_views;
  

  
}

add_action('wp_head', 'hp_updaet_post_views');

function hp_updaet_post_views(){
  if (is_single()) {
    setPostViews(get_the_id());
  }
}
// Sosial media fields
$extra_fields =  array( 
  array( 'facebook', __( 'Facebook Username', 'rc_cucm' ), true ),
  array( 'twitter', __( 'Twitter Username', 'rc_cucm' ), true ),
  array( 'instagram', __( 'Instagram Username', 'rc_cucm' ), true )
);
  


// Use the user_contactmethods to add new fields
add_filter( 'user_contactmethods', 'rc_add_user_contactmethods' );

function rc_add_user_contactmethods( $user_contactmethods ) {

  // Get fields
  global $extra_fields;
  
  // Display each fields
  foreach( $extra_fields as $field ) {
    if ( !isset( $contactmethods[ $field[0] ] ) )
        $user_contactmethods[ $field[0] ] = $field[1];
  }

    // Returns the contact methods
    return $user_contactmethods;
}

// Add Post View Column In Dashboard

add_filter('manage_posts_columns', 'add_post_views_column_head');
add_action('manage_posts_custom_column', 'add_post_views_column_content', 10, 2);
function add_post_views_column_head($defaults){
  $defaults['post_views'] = 'Views';
  return $defaults;
}
function add_post_views_column_content($column_name, $post_ID){
  if ($column_name === 'post_views') {
    echo getPostViews($post_ID);
  }
}

//add_action('wp_head','add_google_adsense');
function add_google_adsense(){?>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-9940004360191218",
    enable_page_level_ads: true
  });
</script>
<?php
}


function _strcut($str,$max_len,$and_str=''){
  if (strlen($str) > $max_len) {
    return mb_strcut($str,0,$max_len,'UTF-8').$and_str;
  }
  return $str;
}



add_filter('post_thumbnail_html','change_post_thumb_html');

function change_post_thumb_html($html_post_thumb_template){
  if (has_post_thumbnail()) {
    return $html_post_thumb_template;
  }else{
    return "<img src='".get_template_directory_uri()."/screenshot.png' title='لا تتوفر صورة مصغرة'>";
  }
}

