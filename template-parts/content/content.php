<?php
while (have_posts()) : the_post() ;
?>

<div class="post-item row ">
    <span class="post-category" style="background: <?php echo get_random_css_color(); ?>">
        <a href="<?php echo get_category_link(get_cat(get_the_ID(),0,'cat_ID')) ?>">
            <b><?php echo get_cat(get_the_ID(),0,'cat_name');?></b>
        </a>
    </span>
                <div class="post-thumbnail col-sm-5">
                    
                    <img src="<?php the_post_thumbnail_url()?>" class="post-thumbnail-img">
                </div>
                <div class="col-sm-7 post-details">
                    <div class="post-header-block">
                        <h2 class="post-title">
                            <a href="<?php the_permalink()?>" title="<?php the_title()?>"><?php the_title()?></a>
                        </h2>
                        <div class="post-description">
                            <?php echo substr(get_the_excerpt(),0,230)?>...
                        </div>
                    </div>
                    <div class="footer-block"></div>
                        <div class="post-time-ago">
                            تم النشر: 
                        </div>
                </div>
            </div>
<?php
endwhile;

