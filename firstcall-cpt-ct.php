<?php
/**
 * Plugin Name: FirstCall Custom Post Types and Taxonomies
 * Plugin URI: http://griccardi.com
 * Description: A custom plugin that adds custom post types and taxonomies
 * Version: 0.1
 * Author: Giorgio Riccardi
 * Author URI: http://griccardi.com
 * License: GPL2
 */

/*  Copyright 2015  Giorgio Riccardi  (email : giorgio@griccardi.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// CPT
function my_custom_post_types() {
    
    // Publications CPT
    $labels = array(
        'name'               => 'publications',
        'singular_name'      => 'publication',
        'menu_name'          => 'Publications',
        'name_admin_bar'     => 'Publications',
        'add_new'            => 'Add New Publication',
        'add_new_item'       => 'Add New Publication',
        'new_item'           => 'New Publication',
        'edit_item'          => 'Edit Publication',
        'view_item'          => 'View Publication',
        'all_items'          => 'All Publications',
        'search_items'       => 'Search Publications',
        'parent_item_colon'  => 'Parent Publications:',
        'not_found'          => 'No Publications found.',
        'not_found_in_trash' => 'No Publications found in Trash.',
    );
    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-id-alt',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'publications' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        //'taxonomies'         => array( 'category', 'post_tag' ),

        // test grc 09/2015
        //'taxonomies'         => array( 'publication-types', 'publication-topics' ),
    );
    register_post_type( 'publication', $args );

    //News CPT
    $labels = array(
        'name'               => 'news',
        'singular_name'      => 'news',
        'menu_name'          => 'News',
        'name_admin_bar'     => 'News',
        'add_new'            => 'Add New News',
        'add_new_item'       => 'Add New News',
        'new_item'           => 'New News',
        'edit_item'          => 'Edit News',
        'view_item'          => 'View News',
        'all_items'          => 'All News',
        'search_items'       => 'Search News',
        'parent_item_colon'  => 'Parent News:',
        'not_found'          => 'No News found.',
        'not_found_in_trash' => 'No News found in Trash.',
    );
    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'news' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-megaphone',
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        //'taxonomies'         => array( 'category', 'post_tag' )
    );
    register_post_type( 'news', $args );
}

add_action( 'init', 'my_custom_post_types' );




// Custom Taxonomies
function my_custom_taxonomies() {
    
    // News Category taxonomy
    $labels = array(
        'name'              => 'News Categories',
        'singular_name'     => 'News Category',
        'search_items'      => 'Search News Categories',
        'all_items'         => 'All News Categories',
        'parent_item'       => 'Parent News Category',
        'parent_item_colon' => 'Parent News Category:',
        'edit_item'         => 'Edit News Category',
        'update_item'       => 'Update News Category',
        'add_new_item'      => 'Add New News Category',
        'new_item_name'     => 'New News Category Name',
        'menu_name'         => 'News Categories',
    );

    $args = array(
        'hierarchical'      => true, //set to be like categories
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'news-categories' ),
    );

    register_taxonomy( 'news-categories', array( 'news' ), $args );


    // Publications Types taxonomy
    $labels = array(
        'name'              => 'Publications Types',
        'singular_name'     => 'Publication Type',
        'search_items'      => 'Search Publications Types',
        'all_items'         => 'All Publications Types',
        'parent_item'       => 'Parent Publications Type',
        'parent_item_colon' => 'Parent Publications Type:',
        'edit_item'         => 'Edit Publications Type',
        'update_item'       => 'Update Publications Type',
        'add_new_item'      => 'Add New Publications Type',
        'new_item_name'     => 'New Publications Type Name',
        'menu_name'         => 'Publication Types',
    );

    $args = array(
        'hierarchical'      => true, //set to be like categories
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'publication-types' ),
    );

    register_taxonomy( 'publication-types', array( 'publication' ), $args );


    // Topics taxonomy for Publications
    $labels = array(
        'name'              => 'Publication Topics',
        'singular_name'     => 'Publication Topics',
        'search_items'      => 'Search Publication Topics',
        'all_items'         => 'All Publication Topics',
        'parent_item'       => 'Parent Publication Topics',
        'parent_item_colon' => 'Parent Publication Topics:',
        'edit_item'         => 'Edit Publication Topics',
        'update_item'       => 'Update Publication Topics',
        'add_new_item'      => 'Add New Publication Topics',
        'new_item_name'     => 'New Publication Topics',
        'menu_name'         => 'Publication Topics',
    );

    $args = array(
        'hierarchical'      => true, //set to be like categories
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'publication-topics' ),
    );

    register_taxonomy( 'publication-topics', array( 'publication' ), $args );


        // Topics taxonomy for News
    $labels = array(
        'name'              => 'News Topics',
        'singular_name'     => 'News Topics',
        'search_items'      => 'Search News Topics',
        'all_items'         => 'All News Topics',
        'parent_item'       => 'Parent News Topics',
        'parent_item_colon' => 'Parent News Topics:',
        'edit_item'         => 'Edit News Topics',
        'update_item'       => 'Update News Topics',
        'add_new_item'      => 'Add New News Topics',
        'new_item_name'     => 'New News Topics',
        'menu_name'         => 'News Topics',
    );

    $args = array(
        'hierarchical'      => true, //set to be like categories
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'news-topics' ),
    );

    register_taxonomy( 'news-topics', array( 'news' ), $args );
}

add_action( 'init', 'my_custom_taxonomies' );




// Flush rewrite rules to add "news" as a permalink slug
function my_rewrite_flush() {
    my_custom_post_types();
    flush_rewrite_rules();
}

register_activation_hook( __FILE__, 'my_rewrite_flush' );




// Make Archives.php Include Custom Post Types

// this snippet can be paste within the custom plugin created to output the CPT,
// assuming we are creating a plugin instead of embedding the CPT into functions.php
function namespace_add_custom_types( $query ) {
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'post', 'nav_menu_item', 'publications', 'news'
        ));
      return $query;
    }
}

add_filter( 'pre_get_posts', 'namespace_add_custom_types' );
//http://css-tricks.com/snippets/wordpress/make-archives-php-include-custom-post-types/