<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package AccesspressLite
 */

get_header(); 
global $post;
if(is_front_page()){
	$post_id = get_option('page_on_front');
}else{
	$post_id = $post->ID;
}
$post_class = get_post_meta( $post_id, 'accesspresslite_sidebar_layout', true );
?>
<style>

.new-nav{
background:#65900a !important;
color:white;
}
</style>
<?php if(empty($_SERVER['QUERY_STRING'])){?>
<style>
#primary{
float:left !important;

width:68% !important;
}
</style>
<?php }?>


<script>

 jQuery(document).ready(function() {
	jQuery("ul li ul li ul" ).addClass( "new-nav" );
 });

</script>
<div class="ak-container">

<?php 

	if ($post_class=='both-sidebar') { ?>
		<div id="primary-wrap" class="clearfix"> 
	<?php }
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php 
get_sidebar('left'); 

	if ($post_class=='both-sidebar') { ?>
		</div> 
	<?php }

if(is_front_page()) {
get_sidebar('right');
}
?>
</div>
<?php get_footer(); ?>

