# Gasboiler WordPress Theme

## Overview

This repository contains a custom WordPress theme developed for the Gasboiler project. The theme is crafted to enhance performance and usability, using best practices in PHP and WordPress.

## Features

- Customizable theme options
- Integration with Advanced Custom Fields (ACF) PRO
- Yoast SEO for improved search engine optimization
- Security Optimizer and Wordfence Security for robust site protection
- Koko Analytics for privacy-friendly analytics
- Responsive design and performance optimization

## Code Samples

### Custom Post Type Registration

```php
function create_custom_post_type() {
    register_post_type('custom_post',
        array(
            'labels'      => array(
                'name'          => __('Custom Posts'),
                'singular_name' => __('Custom Post'),
            ),
            'public'      => true,
            'has_archive' => true,
            'supports'    => array('title', 'editor', 'thumbnail'),
        )
    );
}
add_action('init', 'create_custom_post_type');

## ACF Integration

The theme utilizes Advanced Custom Fields (ACF) PRO for managing custom fields. Configure fields and settings via the WordPress admin dashboard to tailor various theme elements to your needs.

For detailed setup instructions, refer to the ACF settings in the WordPress admin area.

## Installation

1. Download the theme files from this repository.
2. Upload the files to your WordPress `wp-content/themes` directory.
3. Activate the theme from the WordPress admin dashboard.

For any issues or further assistance, please contact the repository maintainer.
