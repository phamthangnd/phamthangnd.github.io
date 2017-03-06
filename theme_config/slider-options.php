<?php

return array(
	'dishes' => array(
		'name' => 'Food And Drinks',
		'term' => 'Food And Drinks Item',
		'term_plural' => 'Items',
		'order' => 'ASC',
		'url'	=> 'example',
		'has_single' => true,
		'post_options' => array('supports'=>array('title', 'editor', 'excerpt', 'thumbnail', 'comments'), 'taxonomies' => array('post_tag'), 'has_archive'=>true),
		'taxonomy_options' => array('show_ui'=>true),
		'icon' => 'icons/portfolio.png',
		'options' => array(
			'rating' => array(
				'type' => 'select',
				'label' => array('default' => 'Rate Recipe', 'excellent' => 'Excellent', 'verygood' => 'Very Good', 'good' => 'Good', 'fair' => 'Fair', 'poor' => 'Poor',),
				'title' => 'Rate Recipe'
			),
			'icon' => array(
				'type' => 'image',
				'description' => 'Cook Time Icon',
				'title' => 'Cook Time Icon',
				'default' => 'holder.js/240x240/auto'
			),
			'background' => array(
				'type' => 'image',
				'title' => 'Header Background',
				'default' => 'holder.js/840x240/auto'
			),
			'duration' => array(
				'type' => 'line',
				'title' => 'Cooking Time',
				'description' => ''	
			)
		),
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'shortcode' => 'food_and_drinks',
				'view' => 'views/dishes-view',
				'shortcode_defaults' => array(
					'title' => '',
					'nr'=> '6',
					'all_button'=> '',
					'all_icon'=> '',
				)
			),
			'single' => array(
				'shortcode' => 'recipe',
				'view' => 'views/dishes-single-view',
				'shortcode_defaults' => array(
					'title' => '',
					'nr'=> '6'
				)
			)
		)
	),
	'gallery' => array(
		'name' => 'Gallery',
		'term' => 'Gallery Image',
		'term_plural' => 'Gallery Images',
		'order' => 'ASC',
		'has_single' => false,
		'post_options' => array('supports'=>array('title')),
		'taxonomy_options' => array('show_ui'=>true),
		'icon' => 'icons/portfolio.png',
		'options' => array(
			'photo' => array(
				'type' => 'image',
				'description' => 'Gallery photo.',
				'title' => 'Gallery photo',
				'default' => 'holder.js/940x799/auto'
			),
			'size' => array(
				'type' => 'select',
				'label' => array('default' => 'Select Size', 'original' => 'Full Width', 'half' => 'A Half From Full Width', 'third' => 'A Third From Full Width'),
				'title' => 'Select Width Of Column'
			)
		),
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'shortcode' => 'cuisinier_gallery',
				'view' => 'views/gallery-view',
				'shortcode_defaults' => array(
					'title' => '',
					'all_button' => 'All'
				)
			)
		)
	),
	'offers' => array(
		'name' => 'Offers Slider',
		'term' => 'Offers Slide',
		'term_plural' => 'Offers Slide',
		'order' => 'ASC',
		'has_single' => false,
		'post_options' => array('supports'=>array('title', 'thumbnail')),
		'taxonomy_options' => array('show_ui'=>false),
		'icon' => 'icons/portfolio.png',
		'options' => array(
			'label' => array(
				'type' => 'image',
				'title' => 'Place Your Label',
				'default' => 'holder.js/200x80/auto'
			),
			'image_url' => array(
				'type' => 'line',
				'title' => 'Offer image URL',
				'description' => ''	
			),
		),
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'shortcode' => 'offer_slider',
				'view' => 'views/offer-view',
				'shortcode_defaults' => array(
					'title' => '',
					'description' => '',
					'link' => '#',
					'addclass' => ''
				)
			)
		)
	),
	'recipe_gallery' => array(
		'name' => 'Recipe Gallery',
		'term' => 'Gallery Slide',
		'term_plural' => 'Gallery Slide',
		'order' => 'ASC',
		'has_single' => false,
		'post_options' => array('supports'=>array('title', 'thumbnail')),
		'taxonomy_options' => array('show_ui'=>false),
		'icon' => 'icons/portfolio.png',
		'options' => array(
			'link' => array(
				'type' => 'line',
				'title' => 'Place Your Link To Recipe or Gallery',
				'default' => 'holder.js/200x80/auto'
			)
		),
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'shortcode' => 'recipe_gallery',
				'view' => 'views/recipe-gallery-view',
				'shortcode_defaults' => array(
					'title' => '',
					'description' => '',
					'addclass' => ''
				)
			)
		)
	)
);