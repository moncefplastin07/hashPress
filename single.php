<?php
get_header();
?>
<!--Main-->
<div class="body-warp container">
	<div class="posts-warp row">
		<!--main-->
		<div class="post-main single-post col-lg-7">
			<?php
			if (have_posts()) {
				the_post();
				get_template_part('template-parts/content/content','single');
				
			}
			?>
		</div>
		<!--/main-->

		<!--sidebar-->
		<div class="col-lg-1"></div>
		<div class="sidebar col-lg-4">
			<?php get_sidebar()?>
		</div>
		<!--/sidebar-->
	</div>
</div>

<!--/Main-->
<?php
get_footer();
?>
