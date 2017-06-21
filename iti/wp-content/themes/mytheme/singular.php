<?php
get_header();
the_post();
?>
<div class="container">
    <div class="breadcrumb">
        <a href="<?php echo home_url(); ?>"> الرئيسية</a> / <?php the_title(); ?>
    </div>
</div>


<div class="container">
    <div class="Left-col">
<!--        //side bar-->
    <?php dynamic_sidebar('1'); ?>
    </div>
    <div class="Main-content">
        <div class="about-company">
            <div class="title-a"><h2><?php the_title(); ?></h2></div>
            <div class="text-block">

                <div class="img-box2">
                    <?php
                    if(has_post_thumbnail()):
                        $img_id = get_post_thumbnail_id();
                        $img_url = wp_get_attachment_image_src($img_id, 'full')[0];
                    ?>
                    <a><img src="<?= $img_url ?>" width="680" height="350"></a>
                    <?php endif; ?>
                </div><!--img-box-->
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</div>


<div class="clearfix"></div>


<?php get_footer() ?>

