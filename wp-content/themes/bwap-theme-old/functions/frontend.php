<?php
add_action('wp', function () {
    define('DISPLAY_FOOTER', is_front_page() || is_404() || is_page_template('template-contact.php'));
});

/**
 *  Enqueue files
 *  Your CSS and JS files goes here
 */
add_action('wp_enqueue_scripts', function(){
    wp_register_style('fonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,500,700,900|Roboto:300,400,400i,700', false, 1);
    wp_enqueue_style('fonts');

    wp_register_style('styles', THEME_URI.'/style.css', false, '1.1.4');
    wp_enqueue_style('styles');

    //wp_deregister_script('wp-embed');
    wp_dequeue_style( 'wpml-legacy-horizontal-list-0' );

    wp_register_script('scripts', THEME_URI.'/main.js', ['jquery'], '1.1.0', true );
    wp_enqueue_script('scripts');
});

/**
 *  Removing the admin bar
 */
add_filter('show_admin_bar', '__return_false');

/**
 *  Remove login logo
 */
add_action('login_enqueue_scripts', function () {
    echo '
    <style type="text/css">
        #login h1 a {
            background-image: none;
            width:100%;
            padding-bottom: 30px;
        }
    </style>';
});

add_filter( 'login_headerurl', 'get_home_url' );
add_filter( 'login_headertitle', '__return_empty_string' );

/**
 * Display flex contents
 */
add_action('display_flex_content', function ($flex_contents) {
    if (empty($flex_contents)) {
        return false;
    }

    $classes = 'section';
    if (is_front_page()) {
        $classes .= ' section--margin';
    }

    foreach ($flex_contents as $flex) {
        $isFullwidth = in_array($flex['acf_fc_layout'], FULL_WIDTH_LAYOUTS);
        ?>
        <div class="<?= $isFullwidth ? 'section section--fullwidth' : $classes ?>">
            <?php
            $block_title = $flex['block_title'];
            if ($block_title) {
                ?>
                <h3><?= $block_title ?></h3>
                <?php
            }
            ?>
            <div class="section__content">
                <?php
                set_query_var('fields', $flex);
                get_template_part('partials/flex', $flex['acf_fc_layout']);
                ?>
            </div>
        </div>
        <?php
    }
});

/**
 * Responsive video embed
 */
add_filter('embed_oembed_html', function ($html) {
    return '<div style="max-width:800px;margin:auto"><div class="embed-responsive embed-responsive-16by9">'.$html.'</div></div>';
});

/**
 * Wrap the content in a section
 */
add_action('the_content', function ($content) {
    if (empty($content)) {
        return $content;
    }
    return '<div class="section"><div class="section__content">'.$content.'</div></div>';
});

function trim_for_excerpt($text = '', $ellipsis = true) {
    $text = strip_shortcodes( $text );
    $text = apply_filters( 'the_content', $text );
    $text = str_replace(']]>', ']]&gt;', $text);
    $excerpt_length = apply_filters( 'excerpt_length', 55 );
    
    $excerpt_more = $ellipsis ? apply_filters( 'excerpt_more', ' ' . '[&hellip;]' ) : '';
    $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );

    return $text;
}

// change excerpt length 
add_filter( 'excerpt_length', function () {
    return 15;
}, 999 );

/**
 * Gravity forms, load scripts in footer
 */
add_filter( 'gform_init_scripts_footer', '__return_true' );

/**
 * Add the language selector to the menu
 */
add_filter('wp_nav_menu_items', function ($items, $args){
    // only header-menu and user-menu have this link
    if (!in_array($args->theme_location, ['header-menu'])) {
        return $items;
    }

    ob_start();
    get_template_part('partials/language_switcher');
    $language_switcher = ob_get_contents();
    ob_end_clean();

    $items .= '<li>'.$language_switcher.'</li>';
    
    return $items;
}, 99, 2);

