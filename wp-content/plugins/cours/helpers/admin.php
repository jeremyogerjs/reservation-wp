<?php

function add_plugin_to_admin()
{
    function cours_content()
    {
        echo "<h1>Liste des participants</h1>";
        echo "<div style='margin-right:20px'>";

        if (class_exists('WP_List_Table')) {
            require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
            require_once(cours__plugin__classes . 'cours-list-table.php');
            $contactListTable = new CoursListTable();
            $contactListTable->prepare_items();
            $contactListTable->display();
        } else {
            echo "WP_List_Table n'est pas disponible.";
        }

        echo "</div>";
    }
    function contact_content()
    {
        echo "<h1>Liste des messages recus</h1>";
        echo "<div style='margin-right:20px'>";

        if (class_exists('WP_List_Table')) {
            require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
            require_once(cours__plugin__classes . 'contact-list-table.php');
            $contactListTable = new ContactListTable();
            $contactListTable->prepare_items();
            $contactListTable->display();
        } else {
            echo "WP_List_Table n'est pas disponible.";
        }

        echo "</div>";
    }

    add_menu_page('Cours', 'Cours', 'manage_options', 'cours-plugin', 'cours_content','dashicons-list-view');
    add_menu_page('Contacts', 'Contacts', 'manage_options', 'cours-contact-plugin', 'contact_content','dashicons-format-status');
}
add_action('admin_menu', 'add_plugin_to_admin');

/**
 * 
 * display custom field date for panel admin
 * 
 */
function custom_col_date_admin($defaults)
{
    $defaults['dateCours'] = __("Date du cours", 'uep');
    return $defaults;
}
add_filter('manage_edit-cours_columns', 'custom_col_date_admin', 10);

/**
 * 
 * display custom field price for panel admin
 * 
 */
function custom_col_price_admin($defaults)
{
    $defaults['priceCours'] = __("Prix du cours (CFP)", 'uep');
    return $defaults;
}
add_filter('manage_edit-cours_columns', 'custom_col_price_admin', 10);
/**
 * 
 * insert content into custom column
 * 
 */
function custom_columns_content($column_name, $post_id)
{
    if ('dateCours' === $column_name) {
        $coursDate = get_post_meta($post_id, 'dateCours', true);
        echo $coursDate;
    }
    if ('priceCours' === $column_name) {
        $coursPrice = get_post_meta($post_id, 'priceCours', true);
        echo $coursPrice;
    }
}
add_action('manage_cours_posts_custom_column', 'custom_columns_content', 10, 2);