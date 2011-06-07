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