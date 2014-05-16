<?php get_header(); ?>

<!--Content-->
<div class="entry-content">
	<?php echo get_option('inn_temp_head'); ?>
		<?php echo do_shortcode('[wp-catalogue]'); ?>
	<div class="clear"></div>
	<?php echo get_option('inn_temp_foot'); ?>
</div><!--/Content-->

<?php get_footer(); ?>
