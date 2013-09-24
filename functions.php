<?php
/*
  Custom functions designed specifically for Bare Responsive theme.
  Feel free to add your own dynamic functions, or clear out this file entirely.
  
*/

register_nav_menus( array( 'header-menu' => 'Header Menu' ) );

/**
 * Setting up custom sidebars
 *
 */
if(function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Main Sidebar',
		'id' => 'main',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="wtitle">',
		'after_title' => '</h3>'
	));
	
	register_sidebar(array(
		'name' => 'Responsive Sidebar',
		'id' => 'responsive',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="wtitle">',
		'after_title' => '</h3>'
	));

	register_sidebar(array(
		'name' => 'Research Sidebar',
		'id' => 'research',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="wtitle">',
		'after_title' => '</h3>'
	));

	register_sidebar(array(
		'name' => 'Research Responsive Sidebar',
		'id' => 'research_responsive',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="wtitle">',
		'after_title' => '</h3>'
	));

	register_sidebar(array(
		'name' => 'About Sidebar',
		'id' => 'about',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="wtitle">',
		'after_title' => '</h3>'
	));

	register_sidebar(array(
		'name' => 'About Responsive Sidebar',
		'id' => 'about_responsive',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="wtitle">',
		'after_title' => '</h3>'
	));

	register_sidebar(array(
		'name' => 'Lab Notebook Sidebar',
		'id' => 'labnotebook',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="wtitle">',
		'after_title' => '</h3>'
	));

	register_sidebar(array(
		'name' => 'Lab Notebook Responsive Sidebar',
		'id' => 'labnotebook_responsive',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="wtitle">',
		'after_title' => '</h3>'
	));
}

/**
 * Customize the 'Read More' link text
 *
 */
function custom_more_link( $link, $link_text ) {
     return str_replace( $link_text, 'Read More...', $link);
}
add_filter( 'the_content_more_link', 'custom_more_link', 10, 2 );


/**
 * Remove the hash(#) from all 'Read More' links
 *
 */
function remove_more_jump($link) {
	$offset = strpos($link, '#more-');
	if ($offset) {
		$end = strpos($link, '"',$offset);
	}
	if ($end) {
		$link = substr_replace($link, '', $offset, $end-$offset);
	}
	return $link;
}
add_filter('the_content_more_link', 'remove_more_jump');


function labnotebook() {
	$labels = array(
		'name'               => _x( 'Lab Notebook', 'post type general name' ),
		'singular_name'      => _x( 'Lab Notebook', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Entry' ),
		'add_new_item'       => __( 'Add New Entry' ),
		'edit_item'          => __( 'Edit Entry' ),
		'new_item'           => __( 'New Entry' ),
		'all_items'          => __( 'All Entries' ),
		'view_item'          => __( 'View Entry' ),
		'search_items'       => __( 'Search Entries' ),
		'not_found'          => __( 'No entries found' ),
		'not_found_in_trash' => __( 'No entries found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Lab Notebook'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds the Lab Notebook\'s specific data',
		'public'        => true,
		'taxonomies'    => array('category'),
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'page-attributes' ),
		'hierarchical'  => true,
		'has_archive'   => true,
		'has_archive' => 'labnotebook'
	);
	register_post_type( 'labnotebook', $args );	
}
add_action( 'init', 'labnotebook' );

function taxonomies() {
    register_taxonomy(
        'protocol',
        'labnotebook',
        array(
            'labels' => array(
                'name' => 'Protocols',
                'add_new_item' => 'Add New Protocol',
                'new_item_name' => "New Protocol"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );
    register_taxonomy(
        'experiment',
        'labnotebook',
        array(
            'labels' => array(
                'name' => 'Experiments',
                'add_new_item' => 'Add New Experiment',
                'new_item_name' => "New Experiment"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );
    register_taxonomy(
        'analysis',
        'labnotebook',
        array(
            'labels' => array(
                'name' => 'Analysis',
                'add_new_item' => 'Add New Analysis',
                'new_item_name' => "New Analysis"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );
}
add_action( 'init', 'taxonomies', 0 );

/**
 * Apply styles to the visual editor
 */  
function tuts_mcekit_editor_style($url) {

    if ( !empty($url) )
        $url .= ',';

    // Retrieves the plugin directory URL and adds editor stylesheet
    // Change the path here if using different directories
    $url .= trailingslashit( plugin_dir_url(__FILE__) ) . '/editor-styles.css';

    return $url;
}
add_filter('mce_css', 'tuts_mcekit_editor_style');
/**
 * Add "Styles" drop-down
 */  
function tuts_mcekit_editor_buttons($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}

add_filter('mce_buttons_2', 'tuts_mcekit_editor_buttons');

/**
 * Add "Styles" drop-down content or classes
 */  
function tuts_mcekit_editor_settings($settings) {
    if (!empty($settings['theme_advanced_styles']))
        $settings['theme_advanced_styles'] .= ';';    
    else
        $settings['theme_advanced_styles'] = '';

    /**
     * Add styles in $classes array.
     * The format for this setting is "Name to display=class-name;".
     * More info: http://wiki.moxiecode.com/index.php/TinyMCE:Configuration/theme_advanced_styles
     *
     * To be allow translation of the class names, these can be set in a PHP array (to keep them
     * readable) and then converted to TinyMCE's format. You will need to replace 'textdomain' with
     * your theme's textdomain.
     */
    $classes = array(
        __('Citation','textdomain') => 'citation',
        __('Highlight','textdomain') => 'highlight'
    );

    $class_settings = '';
    foreach ( $classes as $name => $value )
        $class_settings .= "{$name}={$value};";

    $settings['theme_advanced_styles'] .= trim($class_settings, '; ');
    return $settings;
} 
add_filter('tiny_mce_before_init', 'tuts_mcekit_editor_settings');

/*
 * Add custom stylesheet to the website front-end with hook 'wp_enqueue_scripts'
 * Enqueue the custom stylesheet in the front-end
 */

function tuts_mcekit_editor_enqueue() {
  $StyleUrl = plugin_dir_url(__FILE__).'css/style.css';
  wp_enqueue_style( 'myCustomStyles', $StyleUrl );
}
add_action('wp_enqueue_scripts', 'tuts_mcekit_editor_enqueue');

function namespace_add_custom_types( $query ) {
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'post', 'labnotebook'
		));
	  return $query;
	}
}
add_filter( 'pre_get_posts', 'namespace_add_custom_types' );

function which_taxonomy_is_post() {
    global $post, $post_id;
    error_reporting(E_ERROR | E_PARSE);
    // get post by post id
    $post = &get_post($post->ID);
    // get post type by post
    $post_type = $post->post_type;

    // get post type taxonomies
    $taxonomies = get_object_taxonomies($post_type);

    foreach ($taxonomies as $taxonomy) {
    	$terms = get_the_terms( $post->ID, $taxonomy );
    	foreach ( $terms as $term ){
	        if ($term->name = 'experiment'){
	        	$tax = ucwords(str_replace('category','',$taxonomy));
	        	echo $tax;
	        }
	    }
	}
}


function setup_theme_admin_menus() {
	add_submenu_page('labnotebook.php',   
        'Front Page Elements', 'Front Page', 'manage_options',   
        'front-page-elements', 'options-general.php', 'theme_front_page_settings');   
}

add_action("admin_menu", "setup_theme_admin_menus");
?>
