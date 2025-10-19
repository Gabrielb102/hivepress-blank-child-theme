<?php
/* Template Name: Blank Canvas
 * Template Post Type: page
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class('app-blank'); ?>>
	<?php
	while ( have_posts() ) : the_post();
	    the_content();
	endwhile;
	?>
<?php wp_footer(); ?>
</body>
</html>
