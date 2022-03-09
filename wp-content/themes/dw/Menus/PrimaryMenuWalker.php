<?php
class PrimaryMenuWalker extends Walker_Nav_Menu{
    function start_el(&$output, $item, $depth=0, $args=null, $id=0) {
        //$output = chaine de caractere qui represente de HTML gégérer jusqu'ici
        //$item objet viens de le base de données
        //$depth profondeur de ce lien (imbrication)
        //$args
        //-> ne sont pas censé retourné quelque chose car -> & indicateur de référence
        $icon = get_field('icon', $item);
        $containerClasses = [];

        if ($icon){
            $containerClasses[] = $icon;
        }
        if ($item -> current){
            $containerClasses[] ='current';
        }
        if (in_array('menu-item-type-custom', $item->classes)){
            $containerClasses[] ='custom';
        }
        if ($depth){
            $containerClasses[] = 'subitem';
        }
        $output .= '<li class="' .$this->generateBemClasses('nav__item', $containerClasses) .'" >';

        $output .= '<a href="'. $item->url . '" class="nav__link"'
            .($item->attr_title ? 'title = "' . $item->attr_title . '"': '')
            . '>' . $item->title . '</a>';
    }
    function end_el(&$output, $item, $depth=0, $args=null) {
        $output .= '</li>';
    }
    function generateBemClasses($base, array $modifiers =[]){
        $value = $base;
        foreach ($modifiers as $modifier){
            $value .= ' '. $base . '--' . $modifier;
        }
        return $value;
    }
}