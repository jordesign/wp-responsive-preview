<?php
/**
 * @package WP-Reponsive-Wordpress
 * @version 1.0
 */
/*
	/*
	Plugin Name: WP Responsive Preview
	Plugin URI: http://www.jordesign.com/wp-responsive-preview
	Description: Preview your site at random page widths to test your Responsive design.
	Author: Jordan Gillman
	Version: 1.0
	Author URI: http://www.jordesign.com
	*/
	


// And now update the link
// function eg_customer_preview_link( $preview_post_link ) {
    // $responsive_preview_slug = plugins_url()."/wp-responsive-preview/";
	// if ( current_user_can( 'edit_pages' ) ) {
		// $preview_post_link = add_query_arg( 'url', urlencode( $preview_post_link ), $responsive_preview_slug );
	// }

	// return $preview_post_link;
// }
// add_filter( 'preview_post_link', 'eg_customer_preview_link', 10, 1 );
// add_filter( 'preview_page_link', 'eg_customer_preview_link', 10, 1 );


/* Fire our meta box setup function on the post editor screen. */
add_action( 'load-post.php', 'responsive_preview_meta_boxes_setup' );
add_action( 'load-post-new.php', 'responsive_preview_meta_boxes_setup' );

/* Meta box setup function. */
function responsive_preview_meta_boxes_setup() {

	/* Add meta boxes on the 'add_meta_boxes' hook. */
	add_action( 'add_meta_boxes', 'responsive_preview_add_post_meta_boxes' );
}

/* Create one or more meta boxes to be displayed on the post editor screen. */
function responsive_preview_add_post_meta_boxes($postType) {
    $types = array('post', 'page', 'podcast','event');
	if(in_array($postType, $types)){
		add_meta_box(
				'responsive-preview',
				esc_html__( 'Responsive Preview', 'Responsive Preview' ),
				'responsive_preview_class_meta_box',
				$postType,
				'side',
				'high'
		);
	}
};

/* Display the post meta box. */
function responsive_preview_class_meta_box( $post ) { 

	$post_type = $post->post_type;
	$post_type_object = get_post_type_object($post_type);
	$can_publish = current_user_can($post_type_object->cap->publish_posts);
	?>
	<div id="responsive-preview-action">
	<?php
	if ( 'publish' == $post->post_status ) {
		$preview_link = esc_url( get_permalink( $post->ID ) );
		$preview_link = esc_url( plugins_url()."/wp-responsive-preview/?url=".$preview_link  );
		$preview_button = __( 'Check Responsive Preview' );
	} else {
		$preview_link = get_permalink( $post->ID );
		if ( is_ssl() )
			$preview_link = str_replace( 'http://', 'https://', $preview_link );
		$preview_link = esc_url( apply_filters( 'preview_post_link', add_query_arg( 'preview', 'true', $preview_link ) ) );
		$preview_link = esc_url( plugins_url()."/wp-responsive-preview/?url=".$preview_link  );
		$preview_button = __( 'Check Responsive Preview' );
	}
	?>
	<a class="button responsive-preview" href="<?php echo $preview_link; ?>" target="wp-preview" id="responsive-post-preview"><?php echo $preview_button; ?></a>
	</div>
<?php }

