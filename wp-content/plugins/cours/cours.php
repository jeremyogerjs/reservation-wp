<?php

/**
 * @package cours
 * @version 0.1
 */
/*
Plugin Name: panel sport courses
Plugin URI: https://akismet.com/
Description: Permet de gerer les séances de sports
Version: 0.1
Author: Jeremy Oger
License: GPLv2 or later
Text Domain: local
*/

define('cours__plugin__meta', plugin_dir_path(__FILE__) . 'meta/');
define('cours__plugin__classes', plugin_dir_path(__FILE__) . 'classes/');
define('cours__plugin__helpers', plugin_dir_path(__FILE__) . 'helpers/');


/**
 * 
 * init custom type post
 * 
 */
function cours_init()
{
    // CPT Portfolio
    $labels = array(
        'name' => __('cours', 'uep'),
        'all_items' => __('Tous les cours', 'uep'),  // affiché dans le sous menu
        'singular_name' => __('cours', 'uep'),
        'add_new_item' => __('Ajouter un cours', 'uep'),
        'new_item' => __('Ajouter cours', 'uep'),
        'view_item' => __('voir cours', 'uep'),
        'edit_item' => __('Modifier cours', 'uep'),
        'menu_name' => __('cours', 'uep')
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'rewrite' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-customizer',
        'capability_type' => 'post'
    );
    register_taxonomy(
        'type',
        'cours',
        array(
            'label' => 'Type',
            'labels' => array(
                'name' => 'Cours',
                'singular_name' => 'Cours',
                'all_items' => 'Tous les Cours',
                'edit_item' => 'Éditer le Cours',
                'view_item' => 'Voir le Cours',
                'update_item' => 'Mettre à jour le Cours',
                'add_new_item' => 'Ajouter un Cours',
                'new_item_name' => 'Nouveau Cours',
                'search_items' => 'Rechercher parmi les Cours',
                'popular_items' => 'Cours les plus utilisés'
            ),
            'hierarchical' => true
        )
    );
    register_post_type('cours', $args);
    register_taxonomy_for_object_type('type', 'cours');
}
add_action('init', 'cours_init');

require_once(cours__plugin__helpers . 'admin.php');
require_once(cours__plugin__helpers . 'database.php');
require_once(cours__plugin__helpers . 'forms.php');
require_once(cours__plugin__meta . 'metaboxes.php');
