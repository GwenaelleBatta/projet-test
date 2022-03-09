<?php
//Charger les fichiers nécessaire
require_once(__DIR__ . './Menus/PrimaryMenuWalker.php'); // __DIR__ constance magique représente une constante qui dit ou l'on est
require_once(__DIR__ . './Menus/PrimaryMenuItem.php'); // __DIR__ constance magique représente une constante qui dit ou l'on est
//Désactiver l'éditeur Gutenberg de Wordpress
add_filter('use_block_editor_for_post', '__return_false');
//Activer les images sur les articles
add_theme_support('post-thumbnails');
//Enregistrer un seul custom post-type pour nos voyages
register_post_type('trip',[
    'label'=>'Voyages',
    'description'=>'Tout les articles qui décrivent les voyages',
    'menu_position'=>5,
    'menu_icon'=>'dashicons-airplane',
    'public' =>true,
    'labels'=>[
        'name'=>'Voyages',
        'singular_name'=>'Voyage',
    ],
    'supports' => [
        'title',
        'editor',
        'thumbnail',
    ],
    'rewrite' => [
        'slug' => 'voyages',
    ],
]);
// Récupérer les trips via une requête Wordpress

function dw_get_trips($count = 20){
    //1. on instancie l'objet WP_Query
    $trips = new WP_Query([
        //arguments
        'post_type' => 'trip',
        'orderby' =>'date',
        'order'=>'DESC',
        'posts_per_page' => $count,
    ]);
    //2. on retourne l'objet WP_Query
    return $trips;
}

//enregistrer les zones de menu

register_nav_menu('primary','Navigation principale (haut de page)');
register_nav_menu('footer','Navigation de pied de page (bas de page)');

//fonction pour récupérer les éléments d'un menu sous forme d'un tableau d'objets

function dw_get_menu_items($location){
    $item = [];
    //Récupérer le menu Wordpress pour $location
    $locations = get_nav_menu_locations();
    if ($locations[$location]?? false) { //locations est un tableau, location représente la clé si clé n'existe pas, pour éviter error ??-> non-null coalescing operator -> si existe pas passe à la valeur qui suit
        $menu = $locations[$location];
    // Récupérer tout les éléments du menu récupérer
        $posts = wp_get_nav_menu_items($menu);
    //Formater chaque élément dans une instance de classe personnalisée
        //Boucler sur chaque $posts
        foreach ($posts as $post){
            //Transformer le wp_post en une instance de notre classe personnalisée
            $item = new PrimaryMenuItem($post);
            //Ajouter cette instnce à $items OU à l'item parent si sous-menu
            if ($item->isSubItem()){
                //Ajouter $item comme enfant de l'item parent.
                foreach ($items as $parent){
                    if($parent -> isParentFor($item)){
                        $parent-> addSubItem($item);
                    }
                }
            }else{
                //Ajouter au tableau d'élémnt de niveau 0.
            }
            $items[] =$item;
        }
    }
    //Retourner un tableau d'éléments du menu formater
    return $item;
}
