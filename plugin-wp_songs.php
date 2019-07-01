<?php
/**
 * Plugin Name: Songs plugin
 * Author: Killiann H
 */

// Activation hook
function wp_songs_setup_post_type() {
	// register the "book" custom post type
	register_post_type( 'book', ['public' => 'true'] );
}
add_action( 'init', 'wp_songs_setup_post_type' );

function wp_songs_install() {
	// trigger our function that registers the custom post type
	wp_songs_setup_post_type();

	// clear the permalinks after the post type has been registered
	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'wp_songs_install' );


// Deactivation hook
function wp_songs_deactivation() {
	// unregister the post type, so the rules are no longer in memory
	unregister_post_type( 'book' );
	// clear the permalinks to remove our post type's rules from the database
	flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'wp_songs_deactivation' );

