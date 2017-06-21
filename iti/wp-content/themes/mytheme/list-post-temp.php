<?php
//Template Name: List Posts

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
        	 	<div class="Blog">
                <div class="title-a"><h2>مدونة</h2></div>
                <?php
                $paged = ( get_query_var('paged') )? get_query_var('paged') : 1 ;
				$posts = new WP_Query(array(
					'post_type' => 'post',
					'paged' => $paged,
                                        'posts_per_page' => 2
					)
				);

				if ($posts->have_posts()) :
				?>
                	<div class="text-block">
                
               			<ul>
               			<?php while ($posts->have_posts()): $posts->the_post(); ?>
                        	<li>
                            	<div class="img-box pull-left">
                            	<?php
						        if(has_post_thumbnail()):
						            $img_id = get_post_thumbnail_id();
						            $img_url = wp_get_attachment_image_src($img_id, 'full')[0];
						            //$img_url = $img_url[0];
						        ?>
						        <img src="<?= $img_url ?>" width="230" height="118">
						        <?php endif; ?>
                            	</div>	
                                <a href=""><?php the_title(); ?></a>
                            
                            </li>
                            <?php endwhile; wp_reset_query();?>
                        </ul>
                        
                     </div>
                     <div class="Foot-blog">
                     <?php
                     wp_pagenavi(array(
                     	'query' => $posts
                     ));
                     ?>
                    </div>
                    
					<?php 
					endif; 
					?>
                </div>
        </div>
     </div>
     
    <div class="clearfix"></div>

<?php get_footer(); ?>
