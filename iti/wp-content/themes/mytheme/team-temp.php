<?php
//Template Name: Team
get_header();
the_post();
?>
<div class="container">
    <div class="breadcrumb">
        <a href="<?php echo home_url(); ?>"> الرئيسية</a>  / <?php echo the_title(); ?>
    </div>
</div>

<div class="container">

    <div class="Main-content">
        <div class="about-company">
            <div class="title-a"><h2>فريق العمل</h2></div>
            <?php
            $team = new WP_Query(array(
                'post_type' => 'team',
                    )
            );

            if ($team->have_posts()) :
                ?>
                <ul id="teamList">
                    <?php while ($team->have_posts()): $team->the_post(); ?>

                        <li>
                            <?php
                            if (has_post_thumbnail()):
                                $img_id = get_post_thumbnail_id();
                                $img_url = wp_get_attachment_image_src($img_id, 'full')[0];
                                //$img_url = $img_url[0];
                                ?>
                                <img src="<?= $img_url ?>" width="105" height="100">
                            <?php endif; ?>
                            <aside>
                                <p><?php the_title(); ?></p>
                                <p><?php echo get_post_meta(get_the_ID(), 'partner_position', true); ?></p>

                            </aside>
                        </li>
                    <?php endwhile;
                    wp_reset_query(); ?>

                </ul>
                <?php
            endif;
            ?>
        </div>
    </div>
</div>


<div class="clearfix"></div>

<?php get_footer(); ?>
