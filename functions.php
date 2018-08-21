<?php


add_action( 'wp_default_scripts', 'move_jquery_into_footer' );

function move_jquery_into_footer( $wp_scripts ) {

    if( is_admin() ) {
        return;
    }

    $wp_scripts->add_data( 'jquery', 'group', 1 );
    $wp_scripts->add_data( 'jquery-core', 'group', 1 );
    $wp_scripts->add_data( 'jquery-migrate', 'group', 1 );
}


function load_scripts()  {


  wp_enqueue_style('style.css', get_stylesheet_directory_uri() . '/style.css');


}

function load_jquery() {

  wp_enqueue_script('jquery', true);

 }

add_action( 'wp_enqueue_scripts', 'load_scripts');
add_action('wp_enqueue_scripts', 'load_jquery');


function color_customize_resgister( $wp_customize){

	$wp_customize->add_setting('matt_card_color', array(
		'default' => 'rgba(91, 122, 189, 0.54)',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('linda_card_color', array(
		'default' => 'rgba(91, 122, 189, 0.54)',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('john_card_color', array(
		'default' => 'rgba(91, 122, 189, 0.54)',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('matt_button_color', array(
		'default' => '#000',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('linda_button_color', array(
		'default' => '#000',
		'transport' => 'refresh',
    ));
    
	$wp_customize->add_setting('john_button_color', array(
		'default' => '#000',
		'transport' => 'refresh',
    ));

	$wp_customize->add_section('colors', array(
		'title' => __('Color Picker', 'Fraser Using Bones Three columns'),
		'priority' => 30,
	));

	$wp_customize->add_control( new WP_Customize_Color_Control ($wp_customize, 'matt_card_color_contorl', array(
		'label' => __('Matt Card Color', 'Fraser Using Bones Three columns'),
		'section' => 'colors',
		'settings' => 'matt_card_color',
	)));

	$wp_customize->add_control( new WP_Customize_Color_Control ($wp_customize, 'sidebar_item1_color_control', array(
		'label' => __('Sidebar Menu Item 1 Color', 'Fraser Using Bones Three columns'),
		'section' => 'colors',
		'settings' => 'linda_card_color',
	)));

	$wp_customize->add_control( new WP_Customize_Color_Control ($wp_customize, 'sidebar_item2_color_control', array(
		'label' => __('Sidebar Menu Item 2 Color', 'Fraser Using Bones Three columns'),
		'section' => 'colors',
		'settings' => 'john_card_color',
	)));

	$wp_customize->add_control( new WP_Customize_Color_Control ($wp_customize, 'sidebar_item3_color_control', array(
		'label' => __('Sidebar Menu Item 3 Color', 'Fraser Using Bones Three columns'),
		'section' => 'colors',
		'settings' => 'matt_button_color',
	)));

	$wp_customize->add_control( new WP_Customize_Color_Control ($wp_customize, 'sidebar_item4_color_control', array(
		'label' => __('Sidebar Menu Item 4 Color', 'Fraser Using Bones Three columns'),
		'section' => 'colors',
		'settings' => 'linda_button_color',
	)));

	$wp_customize->add_control( new WP_Customize_Color_Control ($wp_customize, 'sidebar_item5_color_control', array(
		'label' => __('Sidebar Menu Item 5 Color', 'Fraser Using Bones Three columns'),
		'section' => 'colors',
		'settings' => 'john_button_color',
	)));



}

//add color picker for nav menu

add_action('customize_register', 'color_customize_resgister');

//function to add CSS to nav menu that changes color to color selected by color picker

function to_rbga($input){
    $input = str_replace("#", "", $input);
    if(strlen($input) == 3){
        $r = hexdec(substr($input,0,1).substr($input,0,1));
        $g = hexdec(substr($input,1,1).substr($input,1,1));
        $b = hexdec(substr($input,2,1).substr($input,2,1));
    }
    else{
        $r = hexdec(substr($input,0,2));
        $g = hexdec(substr($input,2,2));
        $b = hexdec(substr($input,4,2));
    }
    $rgba = 'rgba( ' . $r . ', ' . $g . ', ' . $b . ', 0.54)'; 
    
    echo $rgba; 
}

function hover_rgba($input){
    $input = str_replace("#", "", $input);
    if(strlen($input) == 3){
        $r = hexdec(substr($input,0,1).substr($input,0,1));
        $g = hexdec(substr($input,1,1).substr($input,1,1));
        $b = hexdec(substr($input,2,1).substr($input,2,1));
    }
    else{
        $r = hexdec(substr($input,0,2));
        $g = hexdec(substr($input,2,2));
        $b = hexdec(substr($input,4,2));
    }
    $r = $r + 47;
    $b = $b + 19;
    $g = $g + 40; 
    $rgba = 'rgba( ' . $r . ', ' . $g . ', ' . $b . ', 0.54)'; 
    
    echo $rgba; 
}

function nav_menu_color_customizer_CSS() {?>
	<style type="text/css">

	.row div:nth-child(1) .card{
	  background-color: <?php echo to_rbga(get_theme_mod('matt_card_color')); ?>;
	}
	.row div:nth-child(1) .card:hover{
	  background-color: <?php echo hover_rgba(get_theme_mod('matt_card_color')); ?>;
	}
	.row div:nth-child(2) .card{
		background-color: <?php echo to_rbga(get_theme_mod('linda_card_color')); ?>;
	}
	.row div:nth-child(2) .card:hover{
		background-color: <?php echo hover_rgba(get_theme_mod('linda_card_color')); ?>;
	}
	.row div div:nth-child(3) .card{
		background-color: <?php echo to_rbga(get_theme_mod('john_card_color')); ?>;
    }
	.row div div:nth-child(3) .card:hover{
		background-color: <?php echo hover_rgba(get_theme_mod('john_card_color')); ?>;
    }
    #matt-button {
		  background-color: <?php get_theme_mod('matt_button_color'); ?>;
	}
 	#linda-button {
			  background-color: <?php echo get_theme_mod('linda_button_color'); ?>;
	}
	#john-button {
				  background-color: <?php echo get_theme_mod('john_button_color'); ?>;
	}
	</style>

<?php }



//add css output to color picker for nav menu

add_action('wp_head', 'nav_menu_color_customizer_CSS');

