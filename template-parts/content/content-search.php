<br>
<h2 class="text-center">نتائج البحث عن"<b><?php the_search_query()?></b>"</h2>
<br>
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
                    <?php the_post_thumbnail('home-small-thumb')?>
                </div>
                <div class="col-sm-7 post-details">
                    <div class="post-header-block">
                        <h2 class="post-title">
                            <a href="<?php the_permalink()?>" title="<?php the_title()?>">
                                <?php echo wp_strip_all_tags(_strcut(get_the_title(),92,'...'))?>
                            </a>
                        </h2>
                        <div class="post-description">
                            <?php echo wp_strip_all_tags(_strcut(get_the_excerpt(),160,'...')) ?>
                        </div>
                    </div>
                    <div class="footer-block">
                        <div class="post-time-ago">
                            تم النشر: <?php echo time_Ago(get_the_time('U')) ?>
                        </div>
                        <div class="share-post">
                            <b class="fa fa-share-alt"></b>
                            <b class="share-btns fadebtn fa fa-facebook"></b>
                            <b class="share-btns fadebtn fa fa-twitter"></b>
                        </div>
                    </div>
                </div>
            </div>
<?php
endwhile;

