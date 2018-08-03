<?php
 function create_my_post(){

	$args = array(
		'child_of'            => 0,
		'current_category'    => 0,
		'depth'               => 0,
		'echo'                => 1,
		'hide_empty'          => 0,
		'hide_title_if_empty' => false,
		'order'               => 'ASC',
		'orderby'             => 'name',
		'show_option_none'    => __( 'No categories' ),
		'taxonomy'            => 'category',
	);


	//show category post.
	$categories = get_categories($args);
	
	foreach ($categories as $cat) {
		$parent = $cat->category_parent;
		if ($parent != 0 ){
			$sub_cat_ID = $cat->cat_ID;
			$sub_cat_name = $cat->cat_name;
			$sub_cat_url = get_category_link($sub_cat_ID);
		
		}	
		if($sub_cat_name == NULL)
			$sub_cat_name = 'TEST';

		$tabs = array();
		$tabs[id] = $cat->cat_ID;

		/*******************************************************
		 ** POST VARIABLES
		*******************************************************/
		
		$postType = 'post'; 
		$userID = 1; 
		$categoryID = $cat->cat_ID; 
		$postStatus = 'future'; 
		
		$leadTitle = get_cat_name($parent).'-'.$sub_cat_name;  
		
		$leadContent = '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>';
		$leadContent .= ' <!--more--> <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>';
		
		/*******************************************************
		 ** TIME VARIABLES / CALCULATIONS
		*******************************************************/
		// VARIABLES
		$timeStamp = $minuteCounter = 0;  
		$iCounter = 1; 
		$minuteIncrement = 1; 
		$adjustClockMinutes = 0; 
		
		// CALCULATIONS
		$minuteCounter = $iCounter * $minuteIncrement; 
		$minuteCounter = $minuteCounter + $adjustClockMinutes; 
		
		$timeStamp = date('Y-m-d H:i:s', strtotime("+$minuteCounter min")); 
		
		/*******************************************************
		 ** WordPress Array and Variables for posting
		*******************************************************/
		
		$new_post = array(
		'post_title' => $leadTitle,
		'post_content' => $leadContent,
		'post_status' => $postStatus,
		'post_date' => $timeStamp,
		'post_author' => $userID,
		'post_type' => $postType,
		'post_category' => array($cat->cat_ID)
		);
		
		/*******************************************************
		 ** WordPress Post Function
		*******************************************************/
		
		$post_id = wp_insert_post($new_post);
		
	}
}
add_action ( 'after_setup_theme', 'create_my_post' );