<div class="big-slider">
	<div class="slide-item" style="	background-image: url(<?php
        if (has_post_thumbnail()) {
            the_post_thumbnail_url();
        }else{
            echo get_template_directory_uri()."/screenshot.png";
        }
     ?>);">
		<div class="silde-content">

			<div class="header-block">
				<span class="post-category" style="background: <?php echo get_random_css_color(); ?>">
                    <a href="<?php echo get_category_link(get_cat(get_the_ID(),0,'cat_ID')) ?>">
                        <b><?php echo get_cat(get_the_ID(),0,'cat_name');?></b>
                    </a>
                </span>
            </div>
			<div class="footer-block">
				<h3 class="post-title">
                     <a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php the_title()?></a>
                </h3>
                <div>
                    <span class="post-time-ago">
                    	تم النشر: <?php echo time_Ago(get_the_time('U')) ?>	
                    </span>
                    <span style="color:#fff;">, بواسطة</span>
                    <b>
                    	<a href="<?php echo get_author_posts_url(get_the_author_id()) ?>" style="color: #00a696">
                    	<?php echo get_the_author_nickname() ?>
                        </a>
                    </b>
                </div>
			</div>
		</div>
	</div>
</div>