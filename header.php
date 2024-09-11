<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
    <style>
        /* Move CSS to wp_head for better optimization */
        @media (max-width: 992px) {
            .navbar-toggler {
                margin-left: auto;
            }
        }
        @media (max-width: 576px) {
            .navbar-brand {
                flex-grow: 1;
            }
        }
    </style>
</head>
<body <?php body_class(); ?>>
    <header id="header" class="site-header">
        <div class="site-navigation main_menu" id="mainmenu-area">
            <nav class="navbar navbar-expand-lg bg-gray-900">
                <div class="container">
                    <a class="navbar-brand site-logo" href="<?php echo esc_url(home_url('/')); ?>">
                        <?php
                        // Display custom logo if set, otherwise display site name
                        $custom_logo_id = get_theme_mod('custom_logo');
                        $logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
                        if ($logo_url) {
                            echo '<img width="280" class="img-fluid" src="' . esc_url($logo_url) . '" alt="' . get_bloginfo('name') . '">';
                        } else {
                            bloginfo('name');
                        }
                        ?>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto flex items-center justify-center space-x-4">
                            <?php
                            // Fetch and display the main menu
                            $menu_items = wp_get_nav_menu_items('header-menu');
                            foreach ($menu_items as $item) {
                                if ($item->menu_item_parent == 0) {
                                    $child_items = array_filter($menu_items, function ($submenu) use ($item) {
                                        return $submenu->menu_item_parent == $item->ID;
                                    });

                                    if (empty($child_items)) {
                                        echo '<li class="nav-item">';
                                        echo '<a class="nav-link text-white hover:text-gray-700" href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a>';
                                        echo '</li>';
                                    } else {
                                        echo '<li class="nav-item relative group">';
                                        echo '<button class="nav-link text-gray-900 hover:text-gray-700 group-hover:text-gray-900 focus:outline-none" aria-haspopup="true" data-target="' . esc_attr($item->attr_title) . '">';
                                        echo '<span>' . esc_html($item->title) . '</span>';
                                        echo '<svg class="w-4 h-4 ml-1 -mr-1 transition-transform duration-200 transform group-hover:rotate-180" viewBox="0 0 20 20" fill="currentColor">';
                                        echo '<path fill-rule="evenodd" d="M6.293 7.293a1 1 0 011.414 0L10 9.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />';
                                        echo '</svg>';
                                        echo '</button>';
                                        echo '<ul class="dropdown-menu absolute hidden z-10 left-0 mt-2 w-36 bg-white border border-gray-200 shadow-lg rounded-md divide-y divide-gray-200 group-hover:block">';
                                        foreach ($child_items as $child_item) {
                                            echo '<li><a class="dropdown-item block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="' . esc_url($child_item->url) . '">' . esc_html($child_item->title) . '</a></li>';
                                        }
                                        echo '</ul>';
                                        echo '</li>';
                                    }
                                }
                            }
                            ?>
                            <li class="nav-item">
                                <a href="tel:02081502025" class="btn btn-primary btn-lg rounded-full py-2 px-6 text-white">
                                    <span class="fa fa-phone mr-2"></span>
                                    02081502025
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
