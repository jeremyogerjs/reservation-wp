<?php

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

function show_meta_date() {
    ob_start();
    $date = get_post_meta(get_the_ID(), 'dateCours', true);
    echo 'Séance prévue le ';
    echo $date;
    return ob_get_clean();
}

add_shortcode('show_date', 'show_meta_date');
/**
 * 
 * sauvegarde en base de donnee la valeur du champ dans la table postmeta
 * 
 */
function save_metaboxes($post_ID)
{
    if (isset($_POST['cours_date'])) {
        update_post_meta($post_ID, 'dateCours', $_POST['cours_date']);
    }
    if (isset($_POST['price_cours'])) {
        update_post_meta($post_ID, 'priceCours', $_POST['price_cours']);
    }
}
add_action('save_post', 'save_metaboxes');