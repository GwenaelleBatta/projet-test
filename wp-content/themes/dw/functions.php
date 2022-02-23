<?php
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
        'singular_name'=>'Voyage'
    ],
    'supports' => [
        'title',
        'editor',
        'thumbnail',
    ]
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