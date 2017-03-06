<?php 
return array(
	'metaboxes'	=>	array(
			array(
			    'id'             => 'metabox_options',            // meta box id, unique per meta box
			    'title'          => 'Page Options',   // meta box title
			    'post_type'      => array('page'),		// post types, accept custom post types as well, default is array('post'); optional
			    'taxonomy'       => array(),    // taxonomy name, accept categories, post_tag and custom taxonomies
			    'context'		 => 'normal',						// where the meta box appear: normal (default), advanced, side; optional
			    'priority'		 => 'low',						// order of meta box: high (default), low; optional
			    'input_fields'   => array(            			// list of meta fields 
			    	'rev_slider'=>array(
			    		'name'=>'Slides Category Slug / Revolution Slider alias',
			    		'type'=>'text'
		    		),
			    	'header_back'=>array(
			    		'name'=>'Upload Photo / Set Background For Page Header',
			    		'type'=>'image'
		    		),
		    		'footer_back'=>array(
			    		'name'=>'Upload Photo / Set Background For Page Footer',
			    		'type'=>'image'
		    		)
		    	)
			
			)

		)
	);