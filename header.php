<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title('-', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Responsive helper -->
     <!-- Pingbacks -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
  
    
	<!-- Favicon -->
	<?php if(_go('favicon')): ?>
		<link rel="shortcut icon" href="<?php _eo('favicon') ?>">
	<?php endif; ?>
    <?php if(_go('tracking_code')){_eo('tracking_code');} ?>
	<?php wp_head(); ?>
</head>




<body <?php body_class(); ?>>
    <div class="page-content show-content">

<?php   
    if (is_front_page() ){
        get_template_part('header', 'main');
    } else {
        get_template_part('header', 'page');
    }
?>


    <!-- ================================= START CONTENT === -->