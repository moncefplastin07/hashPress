<div class="post-header">
<div class="post-info">
	 <span class="post-category post-tag" style="background: <?php echo get_random_css_color(); ?>">
        <a href="<?php echo get_category_link(get_cat(get_the_ID(),0,'cat_ID')) ?>">
            <b><?php echo get_cat(get_the_ID(),0,'cat_name');?></b>
        </a>
    </span>
<span class="post-author post-time-ago">
<b> , </b>
    بواسطة <a href="<?php echo get_author_posts_url(get_the_author_id()) ?>" style="color: #00a696">
    	<?php echo get_the_author_nickname() ?>
    		
    	</a>
</span>
<span class="post-time-ago">
    تم النشر: <?php echo time_Ago(get_the_time('U')) ?>
</span>
<h1 style="font-size:2rem" class="post-title"><?php the_title(); ?></h1>
</div>
<div class="post-thumbnail">
    <figure class="wp-block-image">
	<?php the_post_thumbnail()?>
        <figcaption><?php the_post_thumbnail_caption()?></figcaption>
    </figure>
</div>
</div>
<div class="post-content">
<?php

the_content();
?>
</div>
<div class="post-footer color-top-border">
	<?php

    if (get_the_tag_list()) {  

    ?>
    <div class="post-tags-list mt-3">
        <span class="post-tag">علامات</span>

    <?php
    echo get_the_tag_list('<span class="post-tag" style="background:'.get_random_css_color().'">#','</span><span class="post-tag" style="background:'.get_random_css_color().'">#','</span>');
    ?>
    </div>
    <?php

    }

    ?>
<h3 class="text-right">الكاتب</h3>
<div class="posts-author-card row">
    <div class="col-sm-5 author-pic text-center">
        <a href="<?php echo get_author_posts_url(get_the_author_id()) ?>" >
            <?php echo get_avatar(get_the_author_meta( 'ID' ),160)?>
        </a><br>
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
</div>
<!-- Similar Posts -->
<div class="text-right similar-posts color-top-border">

    <?php
    // new wp_query object to get similar post of the current post displayed
    $args = array(
		'posts_per_page' => 4,
        'cat' => get_cat(get_the_ID(),0,'cat_ID'),
        'post__not_in' => array(get_the_ID()
		)
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        ?>
            <h3 class="my-3">المزيد عن <?php echo strip_tags(get_cat(get_the_ID(),0,'cat_name'))?></h3>
        <?php
        while ($query->have_posts()) {
            $query->the_post();
            ?>
            <div class="big-post-item col-6">
                <div class="post-thumbnail">
                    <a href="<?php the_permalink()?>" title="<?php the_title()?>">
                        <?php the_post_thumbnail('home-small-thumb')?>
                    </a>
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
            </div>
            <?php

        }

        if ($query->found_posts > 4) {
            ?>

            <a href="<?php echo get_category_link(get_cat(get_the_ID(),0,'cat_ID')) ?>" class="btn btn-dark">
                تصفح اكثر
            </a>

            <?php
        }
    }
    ?>
</div>
