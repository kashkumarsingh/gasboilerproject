<?php
/**
 * Template part for displaying the CTA section.
 *
 * @package gasboiler
 */

// Retrieve ACF fields
$heading = get_field('heading');
$description = get_field('description');
$background_image = get_field('background_image');
$buttons = get_field('buttons');

// Default background image as a fallback
$default_background_image = get_template_directory_uri() . '/v5/wave-bg-gray.png';
$background_image_url = $background_image ? $background_image['url'] : $default_background_image;
?>

<section class="bg-gray-200 bg-v5-alt-blue bg-cover px-4" style="background-image: url('https://boiler.sirv.com/Images/gasboiler/gasboiler_van.jpg'); background-position:center center;">
    <div class="block container-v5 mx-auto py-14 text-center">
        <?php if ($heading) : ?>
            <h2 class="text-4xl lg:text-5xl font-medium text-white"><?php echo esc_html($heading); ?></h2>
        <?php endif; ?>
        <?php if ($description) : ?>
            <p class="mt-4 text-white"><?php echo esc_html($description); ?></p>
        <?php endif; ?>
        <?php if ($buttons) : ?>
            <div class="mt-6">
                <?php foreach ($buttons as $button) : ?>
                    <?php if ($button['button_text'] && $button['button_link']) : ?>
                        <a href="<?php echo esc_url($button['button_link']); ?>" class="btn btn-primary mt-6 inline-block px-6 py-3 rounded-full bg-red-500 hover:bg-red-600 text-white font-semibold">
                            <?php echo esc_html($button['button_text']); ?>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
