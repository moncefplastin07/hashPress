<?php
get_header();
?>
<!--Main-->
<div class="body-warp container">
	<div class="posts-warp row">
		<!--main-->
		<div class="post-main col-sm-7">
			<?php
			if (have_posts()) {
				get_template_part('template-parts/content/content');
			}
			?>
		</div>
		<!--/main-->

		<!--sidebar-->
		<div class="col-sm-1"></div>
		<div class="sidebar col-sm-4">
			<?php get_sidebar()?>
		</div>
		<!--/sidebar-->
	</div>
</div>

<!--/Main-->
<?php
get_footer();
?>
