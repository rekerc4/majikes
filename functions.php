<?php


  function load_scripts()  {

  	wp_enqueue_style('style.css', get_stylesheet_directory_uri() . '/style.css');


  }

  function load_jquery() {

    wp_enqueue_script('jquery');

   }

add_action( 'wp_enqueue_scripts', 'load_scripts');
add_action('wp_enqueue_scripts', 'load_jquery');


?>


