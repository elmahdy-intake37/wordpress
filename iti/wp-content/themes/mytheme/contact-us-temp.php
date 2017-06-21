<?php
//Template Name: Contact Us

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
    <?php dynamic_sidebar('1'); ?>
    </div>
    <div class="Main-content">
        <div class="Conatct-us">
            <div class="title-a"><h2>إتصل بنا</h2></div>
            <div class="text-block">

                <ul class="list-a">
                    <?php if($address = esc_attr(get_option('address'))): ?>
                    <li>
                        <h2>العنوان</h2>
                        <p><?= $address ?></p>
                    </li>
                    <?php endif; ?>
                    <?php if(($phone1 = esc_attr(get_option('phone1'))) || ($phone2 = esc_attr(get_option('phone2')))): ?>
                    <li>
                        <h2>الهاتف</h2>
                        <p><?= $phone1 ?><br/><?= $phone2 ?></p>
                    </li>
                    <?php endif; ?>
                    <?php if(($email1 = esc_attr(get_option('email1'))) || ($email2 = esc_attr(get_option('email2')))): ?>
                    <li>
                        <h2>البريد الإلكتروني</h2>
                        <p><?= $email1 ?><br/><?= $email2 ?></p>
                    </li>
                    <?php endif; ?>
                </ul>
                <hr/>

                <div class="form-box"> 
                    <?php the_content(); ?>

                </div>

            </div>
        </div>
    </div>
</div>


<div class="clearfix"></div>

<?php get_footer(); ?>
