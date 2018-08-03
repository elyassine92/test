<?php
   

    /*******************************************************
    ** Start Function Create Categorie
    *******************************************************/

    function create_my_cat () {
        if (file_exists (ABSPATH.'/../wp-admin/includes/taxonomy.php')) {
            require_once (ABSPATH.'/../wp-admin/includes/taxonomy.php'); 
            if ( ! get_cat_ID( 'Marquess auto' ) ) {
                wp_create_category( 'Marquess auto' );
            }
            
        }
    }
    create_my_cat ();
    //add_action ( 'admin_init', 'create_my_cat' );

    /*******************************************************
    ** End Function Create Categorie
    *******************************************************/



