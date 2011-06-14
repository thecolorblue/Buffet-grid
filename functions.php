<?php
// Load jQuery
wp_enqueue_script('jquery');
add_theme_support( 'post-thumbnails' );
add_option('front_page_option','native-grid','','yes');
// Load theme localization
load_theme_textdomain('buffet');

$theme_data = get_theme( get_current_theme() );

add_action('init', 'buffet_custom_init');

function buffet_custom_init() {
    add_post_type_support( 'page', array('excerpt'));
}

// Define PHP file constants.
define( BF_DIR, TEMPLATEPATH );
define( BF_LIB, BF_DIR . '/includes' );
define( THEME_VERSION, $theme_data['Version'] );

// Not sure whether the filter will work.
define( THEME_ID, apply_filters('bf_theme_id', 'buffet') );

// Load library files.
require_once BF_LIB . '/core.php';
require_once BF_LIB . '/actions.php';
require_once BF_LIB . '/filters.php';
require_once BF_LIB . '/helpers.php';
require_once BF_LIB . '/template.php';
require_once BF_LIB . '/widgets.php';

// Load theme options.
require_once BF_LIB . '/options.php';
bf_flush_options();

// Load admin files.
if ( is_admin() ) require_once BF_LIB . '/admin.php';

// Load extensions.
require_once BF_LIB . '/extensions.php';
require_once BF_LIB . '/extensions/default-extensions.php';

// Finally, load the launcher.
require_once BF_LIB . '/launcher.php';

// Not sure if this action will be useful here.
// The extensions file is using this though.
do_action('bf_init');



function bf_get_post_content($postId) {
$post = get_post($postId);
$postOutput = preg_replace('/<img[^>]+./','', $post->post_content);
return $post;
}
function bf_get_post_thumbnail($postID){
$currentPost = $postID;
$args = array( 'post_type' => 'attachment', 
              'numberposts' => -1, 
              'post_status' => null, 
              'post_parent' => $postID 
); 
$attachments = get_posts($args);
  if ($attachments) {
	foreach ( $attachments as $attachment ) {
      if($attachment->post_parent == $currentPost){
        $toBeReturned = wp_get_attachment_image_src($attachment->ID, 'thumbnail');
        echo '<img src="';
        echo $toBeReturned[0];
        echo '">';
      }
    }
  } 
}

/* New action for Front Page layouts */

function native_grid($id){
    $postparts = get_post($id,ARRAY_A);
  if($postparts['post_type'] == 'page'){ 
    echo '<div class="page-grid page" id="';
    echo $id;
    echo '">';
    echo '<h5 class="entry-title">'; 
    echo '<a href="';
    echo the_permalink();
    echo '">';
    echo the_title();
    echo '</a>';
    echo '</h5>'; 
    echo '<div class="page-content">';
    echo $postparts['post_content'];
    echo '</div>';
    echo '<br/>';
    echo '<a class="more-link" href="';
    echo the_permalink();
    echo '">Read More</a>';
    echo '</div>';
  } else {
  echo '<div class="native-grid post" id="';
  echo $id;
  echo '">';
  echo '<h5 class="entry-title">';
  echo '<a href="';
  echo the_permalink();
  echo '">';
  echo the_title();
  echo '</a>';
  echo  '</h5>'; 
  echo	get_the_post_thumbnail($id);
  echo	'<a href="';
  echo get_permalink($id);
  echo '">';
  echo bf_get_post_thumbnail($id);
  echo '</a>';
  echo	'<br/>';
  echo '<a class="more-link" href="';
  echo the_permalink();
  echo '">More Info</a>';
  echo '</div>';
    }
}

add_action('front_page_layout','native_grid');

add_action('search_page_layout','native_grid');

/* End of file functions.php */
/* Location: ./functions.php */