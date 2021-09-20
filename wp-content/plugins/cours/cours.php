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


function cours_database()
{
    global $wpdb;

    $table_name = $wpdb->prefix . 'cours';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id int NOT NULL AUTO_INCREMENT,
        firstname varchar(255) not null,
        lastname varchar(255) not null,
        phone varchar(20) not null,
        email varchar(100) not null,
        cours_id int not null,
        primary key(id)
    )$charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'cours_database');

function contact_database()
{
    global $wpdb;

    $table_name = $wpdb->prefix . 'contacts';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id int NOT NULL AUTO_INCREMENT,
        firstname varchar(255) not null,
        lastname varchar(255) not null,
        phone varchar(20) not null,
        comment text not null,
        primary key(id)
    )$charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'contact_database');

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
    register_taxonomy_for_object_type( 'type', 'cours' );
    register_post_type('cours', $args);
}
add_action('init', 'cours_init');


/**
 * 
 * return form html for courses
 * 
 */
function cours_form()
{
    ob_start();
    if (isset($_POST['cours'])) {
        $lastname = sanitize_text_field($_POST["nom"]);
        $firstname = sanitize_text_field($_POST["prenom"]);
        $email = sanitize_text_field($_POST["email"]);
        $phone = sanitize_text_field($_POST["phone"]);
        $post = intval(get_the_ID());

        if ($lastname != '' && $firstname != '') {
            global $wpdb;

            $table_name = $wpdb->prefix . 'cours';

            $wpdb->insert(
                $table_name,
                array(
                    'lastname' => $lastname,
                    'firstname' => $firstname,
                    'phone' => $phone,
                    'email' => $email,
                    'cours_id' => $post,
                )
            );
            var_dump($_POST);
            die();
            echo "vous ete inscrit !";
        }
    }
    echo "<form method='POST'>";
        echo "<div class='d-flex mb-3'>";
            echo "<div class='mr-3'>";
                echo "<label class='form-label' for='nom' > Votre nom</label>";
                echo "<input class='form-control' type='text' name='nom' placeholder='Votre nom' style='width:100%' required>";
            echo "</div>";
            echo "<div>";
                echo "<label class='form-label' for='prenom' > Votre prenom</label>";
                echo "<input class='form-control' type='text' name='prenom' placeholder='Votre Prenom' style='width:100%' required>";
            echo "</div>";
        echo "</div>";
        echo "<div class='d-flex mb-3'>";
            echo "<div class='mr-3'>";
                echo "<label class='form-label' for='phone' > Votre telephone</label>";
                echo "<input class='form-control' type='text' name='phone' placeholder='Votre téléphone' style='width:100%' required>";
            echo "</div>";
            echo "<div>";
                echo "<label class='form-label' for='email'>Votre email</label>";
                echo "<input class='form-control' type='email' name='email' placeholder='Votre email' style='width:100%' required>";
            echo "</div>";
        echo "</div>";
        echo "<input class='btn btn-success' type='submit' name='cours' value='Je participe'>";
    echo "</form>";

    return ob_get_clean();
}
add_shortcode('subscribeCours', 'cours_form');

function contact_form()
{
    ob_start();
    if (isset($_POST['contact'])) {
        $first_name = sanitize_text_field($_POST["first_name"]);
        $last_name = sanitize_text_field($_POST["last_name"]);
        $phone = sanitize_text_field($_POST["phone"]);
        $comment = esc_textarea($_POST["comment"]);

        if ($first_name != '' && $last_name != '' && $phone  != '' && $comment  != '') {
            global $wpdb;

            $table_name = $wpdb->prefix . 'contacts';

            $wpdb->insert(
                $table_name,
                array(
                    'firstname' => $first_name,
                    'lastname' => $last_name,
                    'phone' => $phone,
                    'comment' => $comment,
                )
            );

            echo "<h4>Merci! Nous vous re-contacterons dès que possible.</h4>";
        }
    }
    echo "<form method='POST'>";
        echo "<div class='d-flex mb-3'>";
            echo "<div class='mr-3'>";
                echo "<input class='form-control' type='text' name='first_name' placeholder='Prénom' style='width:100%' required>";
            echo "</div>";
            echo "<div>";
                echo "<input class='form-control' type='text' name='last_name' placeholder='Nom de famille' style='width:100%' required>";
            echo "</div>";
        echo "</div>";
        
        echo "<div class='d-flex mb-3'>";
            echo "<div class='mr-3'>";
                echo "<input class='form-control' type='tel' name='phone' placeholder='Numéro de téléphone' style='width:100%' required>";
            echo "</div>";
            echo "<div>";
                echo "<input class='form-control' type='email' name='email' placeholder='Votre email' style='width:100%' required>";
            echo "</div>";
        echo "</div>";
        echo "<div class='mb-3'>";
            echo "<textarea class='form-control' name='comment' placeholder='Votre message...' style='width:100%' required></textarea>";
        echo "</div>";
        echo "<input class='btn btn-success' type='submit' name='contact' value='Envoyez'>";
    echo "</form>";

    return ob_get_clean();
}
add_shortcode('contact', 'contact_form');


/**
 * 
 * metabox
 * 
 * 
 */
function initialisation_metaboxes()
{

    add_meta_box('cours_date', 'Date du cours', 'addCoursDateMeta', 'cours', 'side', 'core');
    add_meta_box('cours_price', 'Prix du cours', 'addCoursPriceMeta', 'cours', 'side', 'core');
}
add_action('add_meta_boxes', 'initialisation_metaboxes');


/**
 * 
 * render metaboxe date cours html
 * 
 */
function addCoursDateMeta($post) {

    $val = get_post_meta($post->ID, 'dateCours', true);
    echo '<label for="cours_date">Date du cours : </label>';
    echo "<input type='date' name='cours_date' placeholder='Date du cours' value='.$val.' required>";
}

/**
 * 
 * render metaboxe price cours html
 * 
 */
function addCoursPriceMeta($post) {

    $val = get_post_meta($post->ID, 'priceCours', true);
    echo '<label for="price_cours">prix du cours : </label>';
    echo "<input type='text' name='price_cours' placeholder='Prix du cours' value='$val' required>";
}

/**
 * 
 * sauvegarde en base de donnee la valeur du champ dans la table postmeta
 * 
 */
function save_metaboxes($post_ID)
{
    if (isset($_POST['cours_date'])) {
        update_post_meta($post_ID, 'dateCours', strtotime($_POST['cours_date']));
    }
    if (isset($_POST['price_cours'])) {
        update_post_meta($post_ID, 'priceCours', $_POST['price_cours']);
    }
}
add_action('save_post', 'save_metaboxes');



