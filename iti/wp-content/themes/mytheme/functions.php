<?php
add_theme_support('post-thumbnails');
add_theme_support('title-tag');

function add_theme_scripts() {
    wp_enqueue_style('style-normalize', get_template_directory_uri() . '/css/normalize.css');
    wp_enqueue_style('style-fonts', get_template_directory_uri() . "/font/fonts.css");
    wp_enqueue_style('style-style2', get_template_directory_uri() . "/css/style2.css");
    wp_enqueue_style('style-main', get_template_directory_uri() . "/css/main.css");

    wp_enqueue_script('script-modernizr', get_template_directory_uri() . '/js/vendor/modernizr-2.6.2.min.js', array(), null, false);
    wp_enqueue_script('script-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), null, true);
    wp_enqueue_script('script-easing', get_template_directory_uri() . '/js/jquery.easing.js', array('jquery'), null, true);
    wp_enqueue_script('script-script', get_template_directory_uri() . '/js/script.js', array('jquery'), null, true);
    wp_enqueue_script('script-plugins', get_template_directory_uri() . '/js/plugins.js', array('jquery'), null, true);
    wp_enqueue_script('script-main', get_template_directory_uri() . '/js/main.js', array('jquery'), null, true);
    wp_enqueue_script('script-easing.1.3.min', get_template_directory_uri() . '/js/jquery.easing.1.3.min.js', array('jquery'), null, true);
    wp_enqueue_script('script-mousewheel.min', get_template_directory_uri() . '/js/jquery.mousewheel.min.js', array('jquery'), null, true);
    wp_enqueue_script('script-sliderkit.1.9.pack', get_template_directory_uri() . '/js/jquery.sliderkit.1.9.pack.js', array('jquery'), null, true);
    wp_enqueue_script('script-selectbox-0.1.3', get_template_directory_uri() . '/js/jquery.selectbox-0.1.3.js', array('jquery'), null, true);
}

add_action('wp_enqueue_scripts', 'add_theme_scripts');

register_nav_menus(
        array(
            'header-menu' => 'Header Menu',
            'footer-menu' => 'Footer Menu'
        )
);

//create sidebar
function sidebar_wid(){ register_sidebar(array(
    'id' => 'main-sidebar',
    'name' => 'Main Sidebar'
));
}
add_action('widgets_init', 'sidebar_wid');

// create custom plugin settings menu
add_action('admin_menu', 'my_cool_plugin_create_menu');

function my_cool_plugin_create_menu() {

    //create new top-level menu
    add_menu_page('My Theme Options', 'Theme Options', 'administrator', __FILE__, 'my_cool_plugin_settings_page');//, plugins_url('/images/icon.png', __FILE__));

    //call register settings function
    add_action('admin_init', 'register_my_cool_plugin_settings');
}

function register_my_cool_plugin_settings() {
    //register our settings
    register_setting('footer-options', 'facebook_url');
    register_setting('footer-options', 'twitter_url');
    register_setting('footer-options', 'copyrights');
    register_setting('footer-options', 'address');
    register_setting('footer-options', 'phone1');
    register_setting('footer-options', 'phone2');
    register_setting('footer-options', 'email1');
    register_setting('footer-options', 'email2');
}

function my_cool_plugin_settings_page() {
?>
<div class="wrap">
    <h1>My Theme Options</h1>

    <form method="post" action="options.php">
        <?php settings_fields('footer-options'); ?>
        <?php do_settings_sections('footer-options'); ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Facebook Url</th>
                <td><input type="text" name="facebook_url" value="<?php echo esc_attr(get_option('facebook_url')); ?>" /></td>
            </tr>

            <tr valign="top">
                <th scope="row">Twitter Url</th>
                <td><input type="text" name="twitter_url" value="<?php echo esc_attr(get_option('twitter_url')); ?>" /></td>
            </tr>

            <tr valign="top">
                <th scope="row">Copyrights</th>
                <td><input type="text" name="copyrights" value="<?php echo esc_attr(get_option('copyrights')); ?>" /></td>
            </tr>
            
            <tr valign="top">
                <th scope="row">Address</th>
                <td><input type="text" name="address" value="<?php echo esc_attr(get_option('address')); ?>" /></td>
            </tr>
            <tr valign="top">
                <th scope="row">Phone #1</th>
                <td><input type="text" name="phone1" value="<?php echo esc_attr(get_option('phone1')); ?>" /></td>
            </tr>
            <tr valign="top">
                <th scope="row">Phone #2</th>
                <td><input type="text" name="phone2" value="<?php echo esc_attr(get_option('phone2')); ?>" /></td>
            </tr>
            <tr valign="top">
                <th scope="row">Email #1</th>
                <td><input type="text" name="email1" value="<?php echo esc_attr(get_option('email1')); ?>" /></td>
            </tr>
            <tr valign="top">
                <th scope="row">Email #2</th>
                <td><input type="text" name="email2" value="<?php echo esc_attr(get_option('email2')); ?>" /></td>
            </tr>
            
        </table>
        <?php submit_button(); ?>
    </form>

</div>
<?php
}

// creating costume post type (cpt)
function create_cpt() {
    $args = array(
        'public' => true,
        'label' => 'Slider',
        'supports' => array('title', 'editor', 'thumbnail')
    );
    register_post_type('slider', $args);
    
    $args = array(
        'public' => true,
        'label' => 'News',
        'supports' => array('title', 'editor')
    );
    register_post_type('news', $args);
    
    $args = array(
        'public' => true,
        'label' => 'Partners',
        'supports' => array('title', 'editor', 'thumbnail')
    );
    register_post_type('partners', $args);
    
    $args = array(
        'public' => true,
        'label' => 'Services',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
    );
    register_post_type('services', $args);
    
    $args = array(
        'public' => true,
        'label' => 'Team',
        'supports' => array('title', 'thumbnail')
    );
    register_post_type('team', $args);
}

add_action('init', 'create_cpt');

add_shortcode('test_shortcode', 'test_shortcode_func');

function test_shortcode_func($attr=array()) {
    ob_start();
    echo "tessssssssssssst";
    return ob_get_clean();
}
// in post content throw dashboard: [test_shortcode]
// in php file: echo do_shortcode('[test_shortcode]');


//add custom field
function team_extra_field() {
    add_meta_box('team-fields', 'Position', 'team_extra_field_func', 'team');
}
add_action('add_meta_boxes', 'team_extra_field');

function team_extra_field_func() {
    global $post;
    echo "<input type='text' name='partner_position' value='". get_post_meta($post->ID, 'partner_position', true)."' />";
    echo "<input type='hidden' name='nonce' value='". wp_create_nonce(__FILE__)."' />";
}

//save custom field
add_action('save_post', 'save_team_data');

function save_team_data($post_id) {
    
    if(isset($_POST['nonce']) && !wp_verify_nonce($_POST['nonce'], __FILE__)){
        return;
    }
    if(isset($_POST['post_type']) && $_POST['post_type'] === 'team' ){
        if(isset($_POST['partner_position'])) {
            update_post_meta($post_id, 'partner_position',$_POST['partner_position'] );
        }
    }
}
