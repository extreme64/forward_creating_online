<?php
/*
Plugin Name: Register Custom Post Types
Plugin URI: /
Description: Plugin to register the book post type
Version: 1.0
Author: Rachel McCollin
Author URI:https://forwardcreating.com
Textdomain: tools
License: GPL
*/



/* ----------------------------- taxonomy ---------------------------- */

/* fosstools */
//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_fosstools_hierarchical_taxonomy', 0 );
//create a custom taxonomy name it topics for your posts
function create_fosstools_hierarchical_taxonomy() {
    
    // Add new taxonomy, make it hierarchical like categories
    //first do the translations part for GUI

    $labels = array(
        'name' => __( 'FOSS Tools', 'taxonomy general name' ),
        'singular_name' => __( 'FOSS Tool', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search FOSS Tools' ),
        'all_items' => __( 'All FOSS Tools' ),
        'parent_item' => __( 'Parent FOSS Tool' ),
        'parent_item_colon' => __( 'Parent FOSS Tool:' ),
        'edit_item' => __( 'Edit FOSS Tool' ), 
        'update_item' => __( 'Update FOSS Tool' ),
        'add_new_item' => __( 'Add New FOSS Tool' ),
        'new_item_name' => __( 'New FOSS Tool Name' ),
        'menu_name' => __( 'FOSS Tools' )
    );    
 
 
    register_taxonomy('fosstools',array('post'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'fosstool' )
    ));
 
}


add_action( 'init', 'create_license_hierarchical_taxonomy', 0 );
function create_license_hierarchical_taxonomy() {

    $labels_license = array(
        'name' => __( 'License', 'taxonomy general name' ),
        'singular_name' => __( 'License', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Licenses' ),
        'all_items' => __( 'All License' ),
        'parent_item' => __( 'Parent Licenc' ),
        'parent_item_colon' => __( 'Parent License:' ),
        'edit_item' => __( 'Edit License' ), 
        'update_item' => __( 'Update License' ),
        'add_new_item' => __( 'Add New License' ),
        'new_item_name' => __( 'New License Name' ),
        'menu_name' => __( 'Licenses' )
    );    
 
 
    register_taxonomy('license',array('post'), array(
        'hierarchical' => false,
        'labels' => $labels_license,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'license' )
    ));
 
}












/*  ----------------- post_type --------------------- */

/* fosstools */
add_action( 'init', 'softwaretool_register_post_type' );
function softwaretool_register_post_type() {
    
    $labels_tool = array(
     'name' => __( 'Tool', 'softwaretool' ),
     'singular_name' => __( 'Tool', 'softwaretool' ),
     'add_new' => __( 'New Tool', 'softwaretool' ),
     'add_new_item' => __( 'Add New Tool', 'softwaretool' ),
     'edit_item' => __( 'Edit Tool', 'softwaretool' ),
     'new_item' => __( 'New Tool', 'softwaretool' ),
     'view_item' => __( 'View Tool', 'softwaretool' ), 
     'search_items' => __( 'Search Tools', 'softwaretool' ),
     'not_found' =>  __( 'No Tools Found', 'softwaretool' ),
     'not_found_in_trash' => __( 'No Tools found in Trash', 'softwaretool' ),
    );
    
    $args_tool = array(
     'labels' => $labels_tool,
     'has_archive' => true,
     'public' => true,
     'hierarchical' => true,
     'supports' => array(
      'title',
      'editor',
      'excerpt',
      'custom-fields',
      'thumbnail',
      'page-attributes'
     ),
     'taxonomies' => array('fosstools'),
     'rewrite'   => array( 'slug' => 'tool' ),
     'show_in_rest' => true
    );
    
    
    register_post_type('softwaretool', $args_tool);

}

 /* licence */
add_action( 'init', 'license_register_post_type' );
function license_register_post_type() {
    
    $labels_license_cpt = array(
     'name' => __( 'License', 'license' ),
     'singular_name' => __( 'License', 'license' ),
     'add_new' => __( 'New License', 'license' ),
     'add_new_item' => __( 'Add New License', 'license' ),
     'edit_item' => __( 'Edit License', 'license' ),
     'new_item' => __( 'New License', 'license' ),
     'view_item' => __( 'View License', 'license' ), 
     'search_items' => __( 'Search License', 'license' ),
     'not_found' =>  __( 'No Licenses Found', 'license' ),
     'not_found_in_trash' => __( 'No Licenses found in Trash', 'license' ),
    );
    
    $args_license = array(
     'labels' => $labels_license_cpt,
     'has_archive' => true,
     'public' => true,
     'hierarchical' => true,
     'supports' => array(
      'title',
      'editor',
      'excerpt',
      'custom-fields',
      'thumbnail',
      'page-attributes'
     ),
     'taxonomies' => array('licenses'),
     'rewrite'   => array( 'slug' => 'license' ),
     'show_in_rest' => true
    );
    
    
    register_post_type('license', $args_license);

}

 





?>