<?php
get_header();
?>
<!--Main-->
<div class="body-warp container">
	<div class="posts-warp row">
		<!--main-->
		<div class="post-main col-lg-7">
			<?php
			if (have_posts()) {
				get_template_part('template-parts/content/content','search');
			}else{
				?>
				<h2 class="text-center">لا توجد نتائج "<?php the_search_query()?>"</h2>

				<?php
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
