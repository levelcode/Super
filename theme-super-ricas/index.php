<?php get_header(); ?>
<!--Index file-->
<div class="widget">
	<!--Get video widget-->
	<?php get_template_part('includes/video-widget')?>
	<!--Get prompts-->
	<?php get_template_part('includes/prompts')?>
	<!--Get video List-->
	<?php get_template_part('loops/list-videos')?>
</div>
<?php get_footer();?>