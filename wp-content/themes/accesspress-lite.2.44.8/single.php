<?php
/**
 * The Template for displaying all single posts.
 *
 * @package AccesspressLite
 */

get_header();
global $accesspresslite_options, $post;
$accesspresslite_settings = get_option( 'accesspresslite_options', $accesspresslite_options );
$post_class = get_post_meta( $post -> ID, 'accesspresslite_sidebar_layout', true );
?>

<style>
#primary{
float:left !important;

width:68% !important;
}

.new-nav{
background:#65900a !important;
color:white;
}
</style>


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

			<?php get_template_part( 'content', 'single' ); ?>

			<?php // accesspresslite_post_nav(); ?>

            <?php
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || '0' != get_comments_number() ) :
				comments_template();
			endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	
	<?php 
	get_sidebar('left'); 

		if ($post_class=='both-sidebar') { ?>
			</div> 
		<?php }

	get_sidebar('right'); ?>
</div>

<?php get_footer(); ?>