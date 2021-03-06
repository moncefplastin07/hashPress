<h2 class="text-center d-block d-lg-none">آخر الاخبار</h2>
<?php dynamic_sidebar('mainbar-first-widget-area-1') ?>

<?php
$postsCount = 1;
while (have_posts()) : the_post() ;
    if ($postsCount > 2 and $postsCount < 5) {
        ?>
        <div class="big-post-item col-sm">
    <span class="post-category" style="background: <?php echo get_random_css_color(); ?>">
        <a href="<?php echo get_category_link(get_cat(get_the_ID(),0,'cat_ID')) ?>">
            <b><?php echo get_cat(get_the_ID(),0,'cat_name');?></b>
        </a>
    </span>
                <div class="post-thumbnail">
                    <a href="<?php the_permalink()?>">
                        <?php the_post_thumbnail('home-small-thumb')?>
                    </a>
                </div>
                <div class="post-details">
                    <div class="header-block">
                        <h2 class="post-title">
                            <a href="<?php the_permalink()?>" title="<?php the_title()?>">
                                <?php echo wp_strip_all_tags(_strcut(get_the_title(),92,'...'))?>
                            </a>
                        </h2>
                    </div>
                    <div class="footer-block">
                        <div class="post-time-ago">
                            تم النشر: <?php echo time_Ago(get_the_time('U')) ?>
                        </div>
                        <div class="share-post">
                            <b class="fa fa-share-alt"></b>
                            <b class="fadebtn share-btns fa fa-facebook"></b>
                            <b class="fadebtn share-btns fa fa-twitter"></b>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }else{
?>
<div class="post-item row">
    <span class="post-category" style="background: <?php echo get_random_css_color(); ?>">
        <a href="<?php echo get_category_link(get_cat(get_the_ID(),0,'cat_ID')) ?>">
            <b><?php echo get_cat(get_the_ID(),0,'cat_name');?></b>
        </a>
    </span>
                <div class="post-thumbnail col-sm-5">
                    <a href="<?php the_permalink()?>">
                        <?php the_post_thumbnail('home-small-thumb')?>
                    </a>
                </div>
                <div class="col-sm-7 post-details">
                    <div class="header-block">
                        <h2 class="post-title">
                            <a href="<?php the_permalink()?>" title="<?php the_title()?>">
                                <?php echo wp_strip_all_tags(_strcut(get_the_title(),92,'...'))?>
                            </a>
                        </h2>
                        <div class="post-description d-none d-md-block">

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
                <div style="height:100%; width: 5px; "></div>
            </div>
<?php
}
$postsCount++;
endwhile;
?>
<div class="divider-line"></div>
<div class="text-center posts-pagination">
<?php
the_posts_pagination(
    array(
        'mid_size' => 5,
        'next_text' => __('التالي','textdomain'),
        'prev_text' => __('السابق','textdomain'),
        'screen_reader_text' => __(' ','textdomain')
    )
);
?>
</div>
