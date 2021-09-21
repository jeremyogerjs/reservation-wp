<?php

/**
 * 
 * return form html for courses
 * 
 */
function cours_form()
{
    ob_start();
    if (isset($_POST['attendee'])) {
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
            echo "Vous êtes inscrit !";
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
        echo "<input class='btn btn-success' type='submit' name='attendee' value='Je participe'>";
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
        $email = sanitize_email($_POST['email']);
        $comment = esc_textarea($_POST["comment"]);

        if ($first_name != '' && $last_name != '' && $phone  != '' && $comment  != '' && $email != '') {
            global $wpdb;

            $table_name = $wpdb->prefix . 'contacts';

            $wpdb->insert(
                $table_name,
                array(
                    'firstname' => $first_name,
                    'lastname' => $last_name,
                    'phone' => $phone,
                    'email' => $email,
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

function abonnement_form() {
    ob_start();

    if (isset($_POST['abonner'])) {
        $first_name = sanitize_text_field($_POST["first_name"]);
        $last_name = sanitize_text_field($_POST["last_name"]);
        $phone = sanitize_text_field($_POST["phone"]);
        $abonnement = esc_textarea($_POST["abonnement"]);

        if ($first_name != '' && $last_name != '' && $phone  != '' && $abonnement  != '') {
            global $wpdb;

            $table_name = $wpdb->prefix . 'abonnements';

            $wpdb->insert(
                $table_name,
                array(
                    'firstname' => $first_name,
                    'lastname' => $last_name,
                    'phone' => $phone,
                    'abonnement' => $abonnement,
                )
            );
            echo "<h4>Merci de vous être abonné ! A bientot !.</h4>";
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
        echo "<div class='form-check form-check-inline'>";
            echo "<input class='form-check-input' type='radio' name='abonnement' id='mensuel' value='mensuel' checked>";
            echo "<label class='form-check-label' for='mensuel'>";
                echo "Mensuel";
            echo "</label>";
        echo "</div>";
        echo "<div class='form-check form-check-inline'>";
            echo "<input class='form-check-input' type='radio' name='abonnement' id='annuel' value='annuel'>";
            echo "<label class='form-check-label' for='annuel'>";
                echo "Annuel";
            echo "</label>";
        echo "</div>";
        echo "<input class='btn btn-success' type='submit' name='abonner' value= 'Abonner' >";
    echo "</form>";

return ob_get_clean();
}
add_shortcode('abonnement','abonnement_form');