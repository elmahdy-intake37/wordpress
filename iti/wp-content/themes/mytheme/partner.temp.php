<?php
//Template Name: Partners

get_header();
the_post();
?>
<div class="container">
    <div class="breadcrumb">
        <a href="<?php echo home_url(); ?>"> الرئيسية</a>  / <?php echo the_title(); ?>
    </div>
</div>

<div class="container">
            <div class="Left-col">
                <?php dynamic_sidebar("main-sidebar"); ?>
            </div>
            <div class="Main-content">
                <div class="partner-page">
                    <div class="title-a"><h2>شركاء النجاح</h2></div>
                    <div class="text-block">
                        <div class="img-box">
		                	<?php
				            if(has_post_thumbnail()):
				                $img_id = get_post_thumbnail_id();
				                $img_url = wp_get_attachment_image_src($img_id, 'full')[0];
				                //$img_url = $img_url[0];
				            ?>
				            <img src="<?= $img_url ?>" width="670" height="231">
				            <?php endif; ?>
                        </div>
						
						<?php
						$partners = new WP_Query(array(
							'post_type' => 'partners',
							'posts_per_page' => -1
							)
						);

						if ($partners->have_posts()) :
						?>
                        <ul>
                        <?php while ($partners->have_posts()): $partners->the_post(); ?>
                            <li>
                                <div class="img-box pull-left">
                                	<?php
								    if(has_post_thumbnail()):
								        $img_id = get_post_thumbnail_id();
								        $img_url = wp_get_attachment_image_src($img_id, 'full')[0];
								        //$img_url = $img_url[0];
								    ?>
								    <img src="<?= $img_url ?>">
								    <?php endif; ?>
                                </div>	
                                <h2><?php the_title(); ?></h2>
                                <p><?php the_content(); ?></p>

                            </li>
						<?php endwhile; wp_reset_query();?>
                        </ul>
						<?php 
						endif; 
						?>
                    </div>

                </div>
            </div>
        </div>


        <div class="clearfix"></div>


<?php get_footer(); ?>
