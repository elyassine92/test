<?php
   
    //Start Function Create Categorie

    function create_my_cat () {
        if (file_exists (ABSPATH.'/wp-admin/includes/taxonomy.php')) {
            require_once (ABSPATH.'/wp-admin/includes/taxonomy.php'); 
            if ( ! get_cat_ID( 'Marques autso' ) ) {
                wp_create_category( 'Marques autso' );
            }
            
        }
        
    }
    add_action ( 'admin_init', 'create_my_cat' );

    //End Function Create Categorie


    // include '/Applications/XAMPP/xamppfiles/htdocs/wepick/wp-admin/includes/taxonomy.php';
    // include '/Applications/XAMPP/xamppfiles/htdocs/wepick/wp-load.php';


