<?php
//Charger les fichiers nécessaire
require_once(__DIR__ . './Menus/PrimaryMenuWalker.php'); // __DIR__ constance magique représente une constante qui dit ou l'on est
require_once(__DIR__ . './Menus/PrimaryMenuItem.php'); // __DIR__ constance magique représente une constante qui dit ou l'on est
//Désactiver l'éditeur Gutenberg de Wordpress
add_filter('use_block_editor_for_post', '__return_false');
//Activer les images sur les articles
add_theme_support('post-thumbnails');
//Enregistrer un seul custom post-type pour nos voyages
register_post_type('trip', [
    'label' => 'Voyages',
    'description' => 'Tout les articles qui décrivent les voyages',
    'menu_position' => 5,
    'menu_icon' => 'dashicons-airplane',
    'public' => true,
    'labels' => [
        'name' => 'Voyages',
        'singular_name' => 'Voyage',
    ],
    'map_meta_cap'=> true,
    'supports' => [
        'title',
        'editor',
        'thumbnail',
    ],
    'rewrite' => [
        'slug' => 'voyages',
    ],
]);
//Enregistrer un custom post-type pour les message de contact
// Récupérer les trips via une requête Wordpress
register_post_type('message', [
    'label' => 'Messages de contact',
    'description' => 'Les messages envoyer par le formulaire de contact',
    'menu_position' => 15,
    'menu_icon' => 'dashicons-buddicons-pm',
    'public' => false,
    'show_ui' => true,
    'capabilities' =>[
        'create_posts' => false,
        'edit_posts' => true,
        'read_post' => true,
        'read_private_posts' => true,
    ],
    'labels' => [
        'name' => 'Messages de contact',
        'singular_name' => 'Message de contact',
    ],
]);
function dw_get_trips($count = 20)
{
    //1. on instancie l'objet WP_Query
    $trips = new WP_Query([
        //arguments
        'post_type' => 'trip',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => $count,
    ]);
    //2. on retourne l'objet WP_Query
    return $trips;
}

//enregistrer les zones de menu

register_nav_menu('primary', 'Navigation principale (haut de page)');
register_nav_menu('footer', 'Navigation de pied de page (bas de page)');

//fonction pour récupérer les éléments d'un menu sous forme d'un tableau d'objets

function dw_get_menu_items($location)
{
    $items = [];
    //Récupérer le menu Wordpress pour $location
    $locations = get_nav_menu_locations();
    if ($locations[$location] ?? false) { //locations est un tableau, location représente la clé si clé n'existe pas, pour éviter error ??-> non-null coalescing operator -> si existe pas passe à la valeur qui suit
        $menu = $locations[$location];
        // Récupérer tout les éléments du menu récupérer
        $posts = wp_get_nav_menu_items($menu);
        //Formater chaque élément dans une instance de classe personnalisée
        //Boucler sur chaque $posts
        foreach ($posts as $post) {
            //Transformer le wp_post en une instance de notre classe personnalisée
            $item = new PrimaryMenuItem($post);
            //Ajouter cette instnce à $items OU à l'item parent si sous-menu
            if ($item->isSubItem()) {
                //Ajouter $item comme enfant de l'item parent.
                foreach ($items as $parent) {
                    if ($parent->isParentFor($item)) {
                        $parent->addSubItem($item);
                    }
                }
            } else {
                //Ajouter au tableau d'élémnt de niveau 0.
            }
            $items[] = $item;
        }
    }
    //Retourner un tableau d'éléments du menu formater
    return $items;
}

//Gerer l'envoi de formulaire personnalisé

add_action('admin_post_submit_contact_form', 'dw_handle_submit_contact_form');

function dw_handle_submit_contact_form()
{
    $nonce = $_POST['_wpnonce'];
    if (wp_verify_nonce($nonce, 'nonce_submit_contact')) {
        $firstname = sanitize_text_field($_POST['firstname']);
        $lastname = sanitize_text_field($_POST['lastname']);
        $email = sanitize_email($_POST['email']);
        $phone = sanitize_text_field($_POST['phone']);
        $message = sanitize_text_field($_POST['message']);
        $rules = sanitize_text_field($_POST['rules'] ?? '');

        if ($firstname && $lastname && $email && $message) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if ($rules === '1') {
                    $id = wp_insert_post( array(
                        'post_title' => 'Message de...' . $firstname . ' ' .$lastname,
                        'post_type' => 'message',
                        'post_content' => $message,
                    ) );

                    //Generer un email contenant l'URL vers le post en question
                    $feedback = 'Bonjour, vous avez un nouveau message';
                    $feedback .= 'Y accéder : ' . get_edit_post_link($id);
                    //Envoyer l'email à l'admin
                    wp_mail(get_bloginfo('admin_email'), 'Nouveau message', $feedback);
                } else {
                    var_dump('probleme');
                    //TODO: retourner uen erreur de validation "règle non acceptée"
                }
            } else {

                //TODO: retourner uen erreur de validation "email non valide"
            }
        } else {

            //TODO: retourner une erreur de validation "champs requis"
        }
    }
    //TODO : retourner un message d'erreur "not authorized".
}