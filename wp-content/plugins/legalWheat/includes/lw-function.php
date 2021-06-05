<?php

function lw_Add_Admin_Link(){
    add_menu_page(
        'Main page',
        'Plugin',
        'manage options',
        'includes/lw-page.php'

    );
}
add_action( 'admin_menu', 'lw_Add_Admin_Link');
 
?>