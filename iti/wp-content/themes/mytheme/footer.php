<!--<html>
    <body>-->
        <?php 
        $partners = new WP_Query(array(
            'post_type' => 'partners',
            'posts_per_page' => -1
            )
        );

        if ($partners->have_posts()) :
        ?>
        <section class="partner">
            <h2>شركاء النجاح</h2>
            <div class="container">
                <ul class="list-b">
                    <?php while ($partners->have_posts()): $partners->the_post(); ?>
                    <li>
                        <?php
                        if(has_post_thumbnail()):
                            $img_id = get_post_thumbnail_id();
                            $img_url = wp_get_attachment_image_src($img_id, 'full')[0];
                        ?>
                        <a href="<?php the_permalink() ?>"><img src="<?= $img_url ?>" width="192" height="62"></a>
                        <?php endif; ?>
                    </li>
                    <?php endwhile; wp_reset_query();?>
                </ul>
            </div>
        </section>
        <?php endif; ?>
        <footer class="Footer">
            <div class="container">
                <a href="" class="scroll-up"></a>

<!--                <ul class="menu-footer list-c">
                    <li><a href="">الرئيسية</a></li>
                    <li><a href="">عن الشركة</a></li>
                    <li><a href="">خدماتنا</a></li>
                    <li><a href="">شركاء النجاح</a></li>
                    <li><a href="">مدونة</a></li>
                    <li><a href="">اتصل بنا</a></li>
                </ul>-->
                <?php
                wp_nav_menu( 
                    array( 
                        'theme_location' => 'footer-menu',
                        'container' => '',
                        'menu_class' => 'menu-footer list-c' 
                    ) 
                );
                ?>
                <?php if($copyrights = get_option('copyrights')) : ?>
                <p><?= $copyrights ?></p>
                <?php endif; ?>
                <ul class="social-icons pull-right  unstyled">
                    <?php if($facebook_url = get_option('facebook_url')) : ?>
                    <li><a href="<?= $facebook_url ?>" class="Facebook"></a></li>
                    <?php endif; ?>
                    <?php if($twitter_url = get_option('twitter_url')) : ?>
                    <li><a href="<?= $twitter_url ?>" class="Twitter"></a></li>                    
                    <?php endif; ?>
                </ul>
            </div>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>
