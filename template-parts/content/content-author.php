
<?php dynamic_sidebar('mainbar-first-widget-area-1') ?>
<div class="posts-author-card row">
                <div class="col-sm-5 author-pic text-center">

                    <?php echo get_avatar(get_the_author_meta( 'ID' ),160)?><br>
                    <span class="author-nickname">
                        <a href="<?php echo get_author_posts_url(get_the_author_id()) ?>" style="color: #00a696">
                            <?php echo get_the_author_meta( 'display_name' ) ?>
                        </a>
                    </span>
                    <br>
                    <span class="s-media-icons">
                        <b>
                            <a href="https://www.facebook.com/<?php echo get_user_meta( 1, 'facebook', true );  ?>" class="fa fa-facebook"></a>
                        </b>
                        <b>
                            <a href="https://www.twitter.com/<?php echo get_user_meta( 1, 'twitter', true );  ?>" class="fa fa-twitter"></a>
                        </b>
                        <b>
                            <a href="https://www.instagram.com/<?php echo get_user_meta( 1, 'instagram', true );  ?>" class="fa fa-instagram"></a>
                        </b>
                    </span>    
                </div>
                <div class="col-sm-7">
                    <p class="text-justify">
                        <?php 
                        if (get_the_author_meta( 'user_description' )) {
                            echo strip_tags(get_the_author_meta( 'user_description' ));
                        }else{
                            ?>
                            لا يوجد وصف
                            <?php
                        }
                        ?>
                            
                        </p>
                </div>
            </div>
<h3>منشورات بواسطة <?php echo strip_tags(get_the_author_meta( 'first_name' ));?></h3>
<?php
while (have_posts()) : the_post() ;
    
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
