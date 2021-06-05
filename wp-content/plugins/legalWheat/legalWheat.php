<?php
/*
Plugin Name: legalWheat Handler
Plugin URI: https://github.com/kokorirko/
Description: Plug-in pour gérer les différentes options de legalWheat et garder son nez hors de la farine
Version: 0.0.1
Author: SuperGreggo
Author URI: https://github.com/kokorirko/
Text Domain: Legal Wheeeat


*/ 
require_once plugin_dir_path(__FILE__) . 'includes/lw-function.php';
if(!defined('ABSPATH')){
    die;
}

function what_a_week_huh(){ // captain it's wednesday !!
    if(date("l") === "Wednesday"){
        echo "<p style = 'color : black;'>What a week, huh?</p>";
        echo "<p style = 'color : black;'>- Captain it's Wednesday !</p>";
    }
}

function mfp_Add_Text(){
    echo "<div style='width:100%; background-color:#211F20; margin:0 auto; text-align:center;' >";
    echo "<p style = 'color : #FDFCF9;'>Attention ! Certaines farines sont... spéciales. Serez vous les repérer?</p>";
    echo "</div>";
}

function prevent_db_space($the_Post){
    $the_New_Post = str_replace("  ", " ",$the_Post);
    return $the_New_Post;
}
add_action("wp_footer","mfp_Add_Text");
add_action("wp_footer", "what_a_week_huh");
add_action("the_content", "prevent_db_space");

?>