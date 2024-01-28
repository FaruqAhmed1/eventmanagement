<?php 

function event_manage_setup_theme(){
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
    register_nav_menus( [
    'primary-menu' => 'Primary Menu', 
   ] );

   /** automatic feed link*/
   add_theme_support( 'automatic-feed-links' );

   /** tag-title **/
   add_theme_support( 'title-tag' );

   /** post formats */
   $post_formats = array('aside','image','gallery','video','audio','link','quote','status');
   add_theme_support( 'post-formats', $post_formats);

   /** post thumbnail **/
   add_theme_support( 'post-thumbnails' );

   /** HTML5 support **/
   add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

   /** refresh widgest **/
   add_theme_support( 'customize-selective-refresh-widgets' );

}
add_action( 'after_setup_theme','event_manage_setup_theme' );

//Enqueue File
function event_manage_enqueue_file(){
    wp_enqueue_style('event_manage_style',get_stylesheet_uri( ));
    wp_enqueue_script('tailwincss','https://cdn.tailwindcss.com',[],'3.3.3',false);
}
add_action('wp_enqueue_scripts','event_manage_enqueue_file');

function event_manage_post_type(){

    register_post_type('sponsor',[
        'labels'=> [
            'name'=> 'Sponsors',
            'singular_name'=> 'Sponsor',
            'add_new_item' => 'Add New Sponsor',

        ],
        'public'=> false,
        'show_ui'=> true,
        'supports' => array( 'title', 'editor','page-attributes','thumbnail' ),
    ]);

    register_post_type('person',[
        'labels'=> [
            'name'=> 'Persons',
            'singular_name'=> 'person',
            'add_new_item' => 'Add New Person',

        ],
        'public'=> false,
        'show_ui' => true,
        'supports' => array( 'title', 'editor','page-attributes','thumbnail' ),
    ]);
    register_post_type('speaker',[
        'labels'=> [
            'name'=> 'Speakers',
            'singular_name'=> 'Speaker',
            'add_new_item' => 'Add New Speaker',

        ],
        'public'=> true,
        'supports' => array( 'title', 'editor','page-attributes','thumbnail','comments' ),
    ]);
    register_post_type('schedule',[
        'labels'=> [
            'name'=> 'Schedules',
            'singular_name'=> 'schedule',
            'add_new_item' => 'Add New Schedule',

        ],
        'public'=> false,
        'show_ui' => true,
        'supports' => array( 'title', 'editor','page-attributes','thumbnail','comments' ),
    ]);


    register_taxonomy('sponsor-cat','sponsor',[
        'hierarchical' => true,
        'label'            => 'Sponsor Category',
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => [
            'slug' => 'sponsor-category',
            'with_front'=> true
        ],

    ]);
    
}
add_action('init','event_manage_post_type');

include_once('inc/metabox-and-option.php');


