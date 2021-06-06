<?php


function lw_Add_Admin_Link(){
      add_menu_page(
        'Legal Wheat Admin', 
        'Legal Wheat Handler', 
        'manage_options', 
        'lw-page.php',
        'dashicons-admin-network'
        
    );
}
add_action( 'admin_menu', 'lw_Add_Admin_Link');
 
?>