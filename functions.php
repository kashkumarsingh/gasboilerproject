<?php
// Function to check if a CDN resource is reachable
function is_cdn_reachable($url) {
    $response = wp_remote_get($url, array('timeout' => 2));
    if (is_wp_error($response) || wp_remote_retrieve_response_code($response) != 200) {
        error_log("CDN unreachable: $url");
        return false;
    }
    return true;
}


// Enqueue styles
function gasboiler_theme_setup() {
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Patua+One&family=Open+Sans:wght@400;600&display=swap', [], null);

    // Tailwind CSS
    $tailwind_cdn = 'https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css';
    $tailwind_local = get_template_directory_uri() . '/assets/css/tailwind.min.css';
    wp_enqueue_style('tailwind-css', is_cdn_reachable($tailwind_cdn) ? $tailwind_cdn : $tailwind_local, [], null);

    // Bootstrap CSS
    $bootstrap_cdn = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css';
    $bootstrap_local = get_template_directory_uri() . '/assets/css/bootstrap.min.css';
    wp_enqueue_style('bootstrap-css', is_cdn_reachable($bootstrap_cdn) ? $bootstrap_cdn : $bootstrap_local, [], null);

    // Font Awesome
    $font_awesome_cdn = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css';
    $font_awesome_local = get_template_directory_uri() . '/assets/css/font-awesome.min.css';
    wp_enqueue_style('font-awesome', is_cdn_reachable($font_awesome_cdn) ? $font_awesome_cdn : $font_awesome_local, [], null);

    // Main Style
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/main.css', [], filemtime(get_template_directory() . '/assets/css/main.css'));

    // Owl Carousel CSS (only on the front page)
    if (is_front_page()) {
        $owl_carousel_cdn = 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css';
        $owl_carousel_local = get_template_directory_uri() . '/assets/css/owl.carousel.min.css';
        wp_enqueue_style('owl-carousel-css', is_cdn_reachable($owl_carousel_cdn) ? $owl_carousel_cdn : $owl_carousel_local, [], null);

        $owl_theme_cdn = 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css';
        $owl_theme_local = get_template_directory_uri() . '/assets/css/owl.theme.default.min.css';
        wp_enqueue_style('owl-theme-css', is_cdn_reachable($owl_theme_cdn) ? $owl_theme_cdn : $owl_theme_local, [], null);
    }
}
add_action('wp_enqueue_scripts', 'gasboiler_theme_setup');


// Enqueue scripts
function gasboiler_enqueue_scripts() {
    // Deregister jQuery and use the CDN version
    wp_deregister_script('jquery');
    $jquery_cdn = 'https://code.jquery.com/jquery-3.6.0.min.js';
    $jquery_local = get_template_directory_uri() . '/assets/js/jquery-3.6.0.min.js';
    wp_enqueue_script('jquery', is_cdn_reachable($jquery_cdn) ? $jquery_cdn : $jquery_local, [], null, true);

    // Bootstrap JS
    $bootstrap_js_cdn = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js';
    $bootstrap_js_local = get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js';
    wp_enqueue_script('bootstrap-js', is_cdn_reachable($bootstrap_js_cdn) ? $bootstrap_js_cdn : $bootstrap_js_local, ['jquery'], null, true);

    // Owl Carousel JS
    if (is_front_page()) {
        $owl_carousel_js_cdn = 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js';
        $owl_carousel_js_local = get_template_directory_uri() . '/assets/js/owl.carousel.min.js';
        wp_enqueue_script('owl-carousel-js', is_cdn_reachable($owl_carousel_js_cdn) ? $owl_carousel_js_cdn : $owl_carousel_js_local, ['jquery'], null, true);
    }

    // Custom Scripts
    wp_enqueue_script('custom-scripts', get_template_directory_uri() . '/assets/js/scripts.js', ['jquery', 'bootstrap-js', 'owl-carousel-js'], filemtime(get_template_directory() . '/assets/js/scripts.js'), true);
}
add_action('wp_enqueue_scripts', 'gasboiler_enqueue_scripts');


// Register menus
function gasboiler_register_menus() {
    register_nav_menus([
        'header-menu' => __('Header Menu', 'gasboiler'),
        'footer_menu' => __('Footer Menu', 'gasboiler'),
        'footer_column_1_menu' => __('Footer Column 1 Menu Gasboiler Theme', 'gasboiler'),
        'footer_column_2_menu' => __('Footer Column 2 Menu Gasboiler Theme', 'gasboiler'),
        'footer_column_3_menu' => __('Footer Column 3 Menu Gasboiler Theme', 'gasboiler'),
        'footer_column_4_menu' => __('Footer Column 4 Menu Gasboiler Theme', 'gasboiler'),
    ]);
}
add_action('init', 'gasboiler_register_menus');

// Add theme support
function gasboiler_theme_support() {
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
}
add_action('after_setup_theme', 'gasboiler_theme_support');

// AJAX action for fetching address suggestions
add_action('wp_ajax_fetch_address_suggestions', 'fetch_address_suggestions');
add_action('wp_ajax_nopriv_fetch_address_suggestions', 'fetch_address_suggestions');

function fetch_address_suggestions() {
    try {
        $postcode = sanitize_text_field($_GET['postcode']);
        $apiUrl = "https://api.ideal-postcodes.co.uk/v1/postcodes/" . urlencode($postcode) . "?api_key=ak_lxsz8dglM4w48USGY5De1qNVdyQ9Q";
        $response = wp_remote_get($apiUrl);
        if (is_wp_error($response)) {
            throw new Exception('Error fetching data: ' . $response->get_error_message());
        }
        $data = wp_remote_retrieve_body($response);
        wp_send_json_success($data);
    } catch (Exception $e) {
        error_log('Error fetching address suggestions: ' . $e->getMessage());
        wp_send_json_error('Error fetching address suggestions: ' . $e->getMessage());
    }
    wp_die();
}

// Enqueue the delightchat.js script
function enqueue_delightchat_script() {
    wp_enqueue_script('delightchat-js', get_template_directory_uri() . '/assets/js/delightchat.js', array(), null, true);

    // Localize the script to pass the theme URL
    wp_localize_script('delightchat-js', 'themeSettings', array(
        'themeUrl' => get_template_directory_uri()
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_delightchat_script');
?>

<?php //Custom Post Type: FAQ 

function create_faq_post_type()
{

    register_post_type('faq', [

        'labels' => [

            'name' => __('FAQs'),

            'singular_name' => __('FAQ'),

            'add_new_item' => __('Add New FAQ'),

            'edit_item' => __('Edit FAQ'),

            'new_item' => __('New FAQ'),

            'view_item' => __('View FAQ'),

            'search_items' => __('Search FAQs'),

            'not_found' => __('No FAQs found'),

            'not_found_in_trash' => __('No FAQs found in Trash')

        ],

        'hierarchical' => true,

        'show_ui' => true,

        'public' => true,

        'has_archive' => true,

        'rewrite' => ['slug' => 'faqs'],

        'supports' => ['title', 'editor', 'custom-fields'],

    ]);

}

add_action('init', 'create_faq_post_type');

// Custom Taxonomy: FAQ Categories

function create_faq_taxonomy()
{

    register_taxonomy('faq_category', 'faq', [

        'labels' => [

            'name' => __('FAQ Categories'),

            'singular_name' => __('FAQ Category'),

            'search_items' => __('Search FAQ Categories'),

            'all_items' => __('All FAQ Categories'),

            'parent_item' => __('Parent FAQ Category'),

            'parent_item_colon' => __('Parent FAQ Category:'),

            'edit_item' => __('Edit FAQ Category'),

            'update_item' => __('Update FAQ Category'),

            'add_new_item' => __('Add New FAQ Category'),

            'new_item_name' => __('New FAQ Category Name'),

            'menu_name' => __('FAQ Categories'),

        ],

        'show_ui' => true,

        'show_admin_column' => true,

        'rewrite' => ['slug' => 'faq-category'],

    ]);

}

add_action('init', 'create_faq_taxonomy');
