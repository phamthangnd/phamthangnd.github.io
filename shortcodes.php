<?php 
	
/***********************************************************************************************/
/* Shortcodes */
/***********************************************************************************************/
/* Shorcode row (Template structure)
============================================*/
function section($atts, $content = null) {
	extract(shortcode_atts(array(
		'addclass' => '',
		'background' => ''
	), $atts));
	$background = $background ? 'background-image: url('.$background.');' : '';
	return '<section class="section '.$addclass.'" style="'.$background.'">'. do_shortcode(shortcode_unautop($content)) .'</section>';
}
add_shortcode('section', 'section');

function container($atts, $content = null) {
	extract(shortcode_atts(array(
		'addclass' => ''
	), $atts));
	
	return '<div class="container '.$addclass.'">'. do_shortcode(shortcode_unautop($content)) .'</div>';
}
add_shortcode('container', 'container');


function row($atts, $content = null) {
	extract(shortcode_atts(array(
		'addclass' => ''
	), $atts));
	
	return '<div class="row '.$addclass.'">'. shortcode_unautop(do_shortcode($content)) .'</div>';
}
add_shortcode('row', 'row');

/* Shorcode column (Template structure)
============================================*/


function column($atts, $content = null) {
	extract(shortcode_atts(array(
		'size' => '12',
		'addclass' => ''
	), $atts));
	
	return '<div class="col-md-'.$size.' '.$addclass.'">'. do_shortcode(shortcode_unautop($content)) .'</div>';
}
add_shortcode('column', 'column');


function listing($atts, $content = null) {
	extract(shortcode_atts(array(
		'addclass' => ''
	), $atts));
	
	return '<div class="list '.$addclass.'">'. do_shortcode($content) .'</div>';
}

add_shortcode('listing', 'listing');



function quote($atts, $content = null) {
	extract(shortcode_atts(array(
		'addclass' => ''
	), $atts));
	
	return '<blockquote class=" '.$addclass.'">'. do_shortcode($content) .'</blockquote>';
}

add_shortcode('quote', 'quote');

function recent_posts ($atts, $content = null) {
	extract(shortcode_atts(array(
				'title' => '',
				'description' => '',
				'number' => 3
				), $atts));

	$args = array(            
			//Type & Status Parameters
			'post_type'   => 'post',
			'post_status' => 'publish',
			'showposts'  =>  $number,
			'ignore_sticky_posts' => 1,
			'order'               => 'DESC',
			'orderby'             => 'date',
			
		);
	
	$recent  = new WP_Query( $args );

	
	if( $recent->have_posts() ):

		ob_start(); ?>

		<?php if( $title || $description): ?>
			<header class="entry-header aligncenter">
         		<?php echo $title ? '<div class="entry-wrapper inline relative"><h2 class="entry-title margin-top-80">'.$title.'</h2><hr></div>' : ''; ?>
                <?php echo $description ? '<h3 class="entry-title-desc">'.$description.'</h3>' : ''; ?>
            </header>
        <?php endif; ?>

		<div class="relative margin-double-top">
            <div id="simple_slider" class="blog-slider">
                <ul class="clean-list">
                	<?php while ($recent->have_posts()) : $recent->the_post(); ?>
                		<li class="slide">
	                        <div>
	                        	<?php if(has_post_thumbnail()): 
            	                    $post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                    				$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
	                        	?>
		                            <figure>
		                                <a>
		                                    <img src="<?php echo $post_thumbnail_url; ?>" alt="<?php the_title(); ?>" />
		                                </a>
		                                <figcaption><a href="<?php the_permalink();?>" class=""></a></figcaption>
		                            </figure>
	                        <?php endif; ?>

                          	<?php if(get_the_title()): ?>
	                            <h2 class="entry-title "><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <?php endif; ?>
                        	<?php the_excerpt(); ?>
                            	
                            	<a href="<?php the_permalink(); ?>" class="alignleft read-more"><?php _e('View Blog Post', 'cuisinier'); ?></a>
	                            <time datetime="<?php the_time('Y-m-d') ?>" class="date "><?php the_time('d F Y') ?></time>
	                        </div>
	                    </li>
            		<?php endwhile; ?>
                </ul>
            </div>
        </div>

    <?php endif;

    wp_reset_postdata();
	return ob_get_clean();
}

add_shortcode('recent_posts', 'recent_posts');


function recipe_callback($atts, $content = null) {
	extract(shortcode_atts(array(
		'title'        =>  ''
	), $atts));

	return '<div class="recipe-list">'.do_shortcode(shortcode_unautop($content)).'</div>';
}

add_shortcode('recipe', 'recipe_callback');

function header_callback($atts, $content = null) {
	extract(shortcode_atts(array(
		'title'        =>  '',
		'description'  =>  ''
	), $atts));

	$title = $title ? '<h2 class="entry-title">'.$title.'</h2>' : '';
		
	return '<header class="margin-top-100">'.$title.apply_filters('the_content', $description).'</header>'.do_shortcode(shortcode_unautop($content));
}

add_shortcode('header', 'header_callback');



function list_callback($atts, $content = null) {
	extract(shortcode_atts(array(
		'title'        =>  '',
		'class'        =>  ''
	), $atts));
	
	return '<ul class="clean-list recipe '.$class.'">'.do_shortcode(shortcode_unautop($content)).'</ul>';
}

add_shortcode('list', 'list_callback');



function step_callback($atts, $content = null) {
	extract(shortcode_atts(array(
		'title'        =>  '',
		'image'  =>  ''
	), $atts));
	$the_title = $title ? '<h2 class="entry-title i-cube">'.$title.'</h2>' : '';
	$image = $image ? '<figure><img src="'.$image.'" alt="'.$title.'"></figure>' : '';

	

	return '<li>'.$the_title.$image.do_shortcode(shortcode_unautop(apply_filters('the_content', $content))).'</li>';
}

add_shortcode('step', 'step_callback');

/* lets  */

function ingredients_callback($atts, $content = null) {
	extract(shortcode_atts(array(
		'title'        =>  ''
	), $atts));

	$title = $title ? '<h2 class="entry-title aligncenter ingredients-title">'.$title.'</h2>' : '';
	return '<div class="ingredients-block">'.$title.'<div class="clean-list ingredients-list">'.do_shortcode(shortcode_unautop($content)).'</div></div>';
}

add_shortcode('ingredients', 'ingredients_callback');

function cooktime_callback($atts, $content = null) {
	extract(shortcode_atts(array(
		'title'     =>  '',
		'image'		=>  ''
	), $atts));

	$image = $image ? '<img class="margin-top" src="'.$image.'" alt="'.$title.'" />' : '';

	return '<div class="icon-block duration background-orange border-radius-16">'.$image.'				
					<span>'.$title.'<br />'.$content.'</span></div>';
}

add_shortcode('cooktime', 'cooktime_callback');

function serves_callback($atts, $content = null) {
	extract(shortcode_atts(array(
		'title'     =>  '',
		'image'		=>  ''
	), $atts));

	$image = $image ? '<img class="margin-top" src="'.$image.'" alt="'.$title.'" />' : '';

	return '<div class="icon-block serve background-orange border-radius-16">'.$image.'				
					<span>'.$title.'<br />'.$content.'</span></div>';
}

add_shortcode('serves', 'serves_callback');


function difficulty_callback($atts, $content = null) {
	extract(shortcode_atts(array(
		'title'     =>  '',
		'image'		=>  ''
	), $atts));

	$image = $image ? '<img class="margin-top" src="'.$image.'" alt="'.$title.'" />' : '';

	return '<div class="icon-block serve background-orange border-radius-16">'.$image.'				
					<span>'.$title.'<br />'.$content.'</span></div>';
}

add_shortcode('difficulty', 'difficulty_callback');

function skill_callback($atts, $content = null) {
	extract(shortcode_atts(array(
		'addclass'  =>  '',
		'title' => '',
		'percentage' => '100'
	), $atts));

	ob_start(); ?>

	<div class="bar-main-container">
        <div class="wrap">
            <h3 class="entry-title aligncenter"><?php echo $title; ?></h3>
            <div class="bar-container">
                <div class="bar"></div>
                <div data-percentage="<?php echo $percentage; ?>" class="bar-percentage"><?php echo $percentage; ?>%</div>
            </div>
        </div>
    </div>

	<?php 
	return ob_get_clean();
}

add_shortcode('skill', 'skill_callback');


function skills_callback($atts, $content = null) {
	extract(shortcode_atts(array(
		'addclass'  =>  '',
		'title' => ''
	), $atts));
	
	ob_start(); 
	?>

	<div class="container margin-double-top percentage-it">
	    <header class="entry-header bar-container-header aligncenter">
	        <h2 class="entry-title margin-double-top"><?php echo $title; ?> </h2><hr />
	    </header>

	    <div class="bar-container-wrap ovh">
			<?php echo do_shortcode(shortcode_unautop($content)); ?>
	    </div>
	</div>

	<?php
	return ob_get_clean();
}

add_shortcode('skills', 'skills_callback');


function about_callback($atts, $content = null) {
	extract(shortcode_atts(array(
		'title' => '',
		'addclass'  =>  ''
	), $atts));

	ob_start(); ?>
		<div class="container">
	        <div class="row">
	            <div class="col-md-4">
	            	<?php if( has_post_thumbnail() ): ?>
		                <figure class="padding margin-top">
		                    <a class="shape-round orange-border" href="#">
			                	<?php the_post_thumbnail('full', array('alt'   => $title) ); ?>
		                    </a>
		                </figure>
	            	<?php endif; ?>
	            	<div class="share-links clearfix margin-double-top center-me">
	          			<?php if ( _go('share_this') ){ tt_share(); } ?>
          			</div>

	            </div>
	            <div class="col-md-8">
	                <header>
	                    <h2 class="entry-title"><?php echo $title; ?></h2>
	                </header>
	                <?php echo do_shortcode(shortcode_unautop(apply_filters('the_content', $content))); ?>
	            </div>
	        </div>
	    </div>

	<?php
	return ob_get_clean();
}

add_shortcode('about', 'about_callback');


function about_box_callback($atts, $content = null) {
	extract(shortcode_atts(array(
		'title'  =>  ''
	), $atts));	

	$the_title = $title ? '<header class="entry-header aligncenter"><h2 class="entry-title margin-top-120">'.$title.'</h2></header>' : '';

	return $the_title.'<div class="aligncenter">'.do_shortcode(shortcode_unautop(apply_filters('the_content', $content))).'</div>';
}

add_shortcode('about_box', 'about_box_callback');


function about_parallax_callback($atts, $content = null) {
	extract(shortcode_atts(array(
		'author' => '',
		'image' => '',
		'ratio'  =>  '0.8'
	), $atts));

	ob_start();
	?>
	
	<div data-stellar-background-ratio="<?php echo $ratio; ?>" class="parallax-block margin-top-60" style="background-image: url('<?php echo $image; ?>')">
            <div class="container">
                <blockquote class="aligncenter no-border margin-top-60">
                    <?php echo do_shortcode($content); ?><br /><br />
                    <?php echo $author; ?>
                </blockquote>
            </div>
        </div>		
    <?php
	return ob_get_clean();	
}

add_shortcode('about_parallax', 'about_parallax_callback');


function contacts_callback($atts, $content = null) {
	extract(shortcode_atts(array(
		'title' => '',
		'description' => '',	
		'addclass'  =>  ''
	), $atts));

	ob_start(); ?>
	<?php if ($title || $description): ?>
		<header class="entry-header aligncenter">
            <?php echo $title ? '<div class="entry-wrapper inline relative"><h2 class="entry-title margin-top-80">'.$title.'</h2><hr></div>' : ''; ?>
            <?php echo $description ? '<h3 class="entry-title-desc">'.$description.'</h3>' : ''; ?>
        </header>
	<?php endif; ?>

   <?php if(tt_form_location('footer')) : ?>
        <?php echo tt_form_location('footer'); ?>
    <?php endif; ?>

	<?php
	return ob_get_clean();
}

add_shortcode('contacts', 'contacts_callback');


function photo_callback($atts, $content = null) {
	extract(shortcode_atts(array(
		'title' => '',
		'background' => '',
		'link' => '',
		'addclass'  =>  ''
	), $atts));

	$background = $background ? 'background-image: url('.$background.');' : '';

	return '<li><div style="'.$background.'"></div><a href="'.$link.'">'.$title.'</a></li>';
}

add_shortcode('photo', 'photo_callback');


function dishes_callback($atts, $content = null) {
	extract(shortcode_atts(array(
		'title' => '',
		'description' => ''

	), $atts));

	ob_start(); ?>

	<?php if($title || $description): ?>
        <header class="entry-header aligncenter">
	        <?php echo $title ? '<div class="entry-wrapper inline relative"><h2 class="entry-title margin-top-80">'.$title.'</h2><hr></div>' : ''; ?>
        	<?php echo $description ? '<h3 class="entry-title-desc">'.$description.'</h3>' : ''; ?>
        </header>
	<?php endif; ?>

	<ul class="clean-list filter-cats margin-double-top row">
		<?php echo do_shortcode($content); ?>
	</ul>

	<?php
	return ob_get_clean();

}

add_shortcode('dishes', 'dishes_callback');

function dish_callback($atts, $content = null) {
	extract(shortcode_atts(array(
		'title' => '',
		'addclass' => '',
		'cols' => '2',
		'link' => '#',
		'custom_icon' => ''

	), $atts));
	if($custom_icon)
	return $title ? '<li class="col-md-'.$cols.' col-sm-4 col-xs-6"><a class="custom-icon" href="'.$link.'"><img src="'.$custom_icon.'"><br>'.$title.'</a></li>' : '';
	else   
    return $title ? '<li class="col-md-'.$cols.' col-sm-4 col-xs-6"><a class="'.$addclass.'" href="'.$link.'">'.$title.'</a></li>' : '';
}

add_shortcode('dish', 'dish_callback');


function offer_callback($atts, $content = null) {
	extract(shortcode_atts(array(
		'title' => '',
		'addclass' => '',
		'description' => ''

	), $atts));

	ob_start(); ?>

	<?php if($title || $description): ?>
        <header class="entry-header aligncenter">
	        <?php echo $title ? '<div class="entry-wrapper inline relative"><h2 class="entry-title margin-top-80">'.$title.'</h2><hr></div>' : ''; ?>
        	<?php echo $description ? '<h3 class="entry-title-desc">'.$description.'</h3>' : ''; ?>
        </header>
	<?php endif; ?>

	<?php echo do_shortcode(shortcode_unautop(apply_filters('the_content', $content))) ?>

	<?php
	return ob_get_clean();
}

add_shortcode('offer', 'offer_callback');


function offer_content_callback($atts, $content = null) {
	extract(shortcode_atts(array(
		'title' => '',
		'addclass' => '',
		'custom_icon' => ''
	), $atts));

	ob_start(); ?>
	<div class="<?php echo $addclass; ?>">
		<?php if($title ): ?>
			<h3 class="entry-title offer-title relative padding-top-60"><?php echo $title; ?>
				<?php if(!$custom_icon): ?><i class="icon"></i></h3>
					<?php else : return '<img src="'.$custom_icon.'">'?>
				<?php endif; ?>
		<?php endif; ?>
		
		<?php echo do_shortcode(shortcode_unautop(apply_filters('the_content', $content))) ?>
	</div>

	<?php
	return ob_get_clean();
}

add_shortcode('offer_content', 'offer_content_callback');