<?php

    //Start Function Import File CSV

    function importcsv(){
        $arrFileName = explode('.','/Applications/XAMPP/xamppfiles/htdocs/wepick/scripts/csv_marque.csv');
        if($arrFileName[1] == 'csv'){
            $handle = fopen('/Applications/XAMPP/xamppfiles/htdocs/wepick/scripts/csv_marque.csv', "r");
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
          
                $cat_defaults = array(
                    'cat_name' => $data[0],
                    'category_description' => '',
                    'category_parent' => get_cat_ID( 'Marques auto' ),
                    'taxonomy' => 'category'
                );

                $souscat_defaults = array(
                    'cat_name' => $data[1],
                    'category_description' => '',
                    'category_parent' => get_cat_ID( $cat_defaults['cat_name'] ),
                    'taxonomy' => 'category'
                );
                wp_insert_category($cat_defaults);
                wp_insert_category($souscat_defaults);

                }
            
                fclose($handle);
        }
    }

    //importcsv();
    add_action ( 'after_setup_theme', 'importcsv' );

    
    //Start Function Import File CSV




    