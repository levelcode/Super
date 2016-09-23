<?php get_header(); ?>
<!--Index file-->
<div class="widget">
	<!--Get video widget-->
	<?php get_template_part('includes/video-widget')?>
	<!--Get video widget-->
	<?php get_template_part('loops/list-videos')?>
</div>
<?php get_footer();?>