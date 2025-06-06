<?php

add_action( 'wp_enqueue_scripts', function(){
	wp_enqueue_style(
		'hivepress-child-blank',
		get_stylesheet_uri(),
		[],
		wp_get_theme()->get('Version') );
});

add_action( 'wp_enqueue_scripts', function () {

	if ( is_page_template( 'page-blank.php' ) ) {           // runs only on that page :contentReference[oaicite:4]{index=4}
		// 1. Remove HivePress & parent assets
		wp_dequeue_style( 'hivepress-theme' );                // adjust handle names as seen in View-Source
		wp_dequeue_style( 'hivepress-frontend' );             // example
		wp_dequeue_script( 'hivepress-theme' );               // example :contentReference[oaicite:5]{index=5}

		// 2. Load your own bundle
		wp_enqueue_style( 'app', get_stylesheet_directory_uri().'/assets/app.css',
			[], filemtime( get_stylesheet_directory().'/assets/app.css' ));
		wp_enqueue_script( 'app', get_stylesheet_directory_uri().'/assets/app.js',
			[ 'wp-element' ], filemtime( get_stylesheet_directory().'/assets/app.js' ), true );
	}
}, 20 );   // priority 20 ⇒ runs after HivePress enqueues

add_action( 'after_setup_theme', function () {
	// HivePress removes this; we add it back so the Template dropdown shows.
	add_post_type_support( 'page', 'page-attributes' );  //  ← requirement ② :contentReference[oaicite:2]{index=2}
} );