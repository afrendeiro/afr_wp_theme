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
		'menu_name'          => 'Lab Notebook entries'
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
        'experiment',
        'labnotebook',
        array(
            'labels' => array(
                'name' => 'Experiment',
                'add_new_item' => 'Add New Experiment',
                'new_item_name' => "New Experiment"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );
}
add_action( 'init', 'taxonomies', 0 );
?>