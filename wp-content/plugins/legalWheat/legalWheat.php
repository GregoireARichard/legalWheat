<?php
/*
Plugin Name: legalWheat Handler
Plugin URI: https://github.com/kokorirko/
Description: Plug-in pour gérer les différentes options de legalWheat et garder son nez hors de la farine
Version: 0.0.1
Author : SuperGreggo
Author URI: https://github.com/kokorirko/
Text Domain: Legal Wheeeat


*/ 
if(!defined('ABSPATH')){
    die;
}

function change_admin_footer($text){
    $text = "Merci de contribuer à l'agrandissement de legalWheat";
    return $text;

}
add_filter('admin_footer_text', 'change_admin_footer');
?>