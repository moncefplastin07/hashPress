<?php
get_header();
?>
<!--Main-->
<div class="body-warp container">
	<div class="posts-warp row">
		<!--main-->
		<div class="post-main col-lg-7 row">
			<?php
			if (have_posts()) {
				get_template_part('template-parts/content/content','author');
			}else{
				?>
				<center>
					<h2>لا يوجد محتوى لعرضه</h2>
				</center>
				<?php
			}
			?>
		</div>
		<!--/main-->

		<!--sidebar-->
		<div class="col-lg-1"></div>
		<div class="sidebar col-lg-4 row">
			<?php get_sidebar()?>
		</div>
		<!--/sidebar-->
	</div>
</div>

<!--/Main-->
<?php
get_footer();
?>
