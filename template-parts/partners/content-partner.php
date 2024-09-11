<?php
// Get the partners data from the JSON file or ACF fields
$partners_json = file_get_contents(get_template_directory() . '/template-parts/partners/partners.json');
$partners = json_decode($partners_json, true);

// Optionally, fetch ACF fields directly
// $partners = get_field('partners'); // Assuming 'partners' is a repeater field with sub-fields

if ($partners): ?>
    <!-- Partners Carousel Section: Start -->
    <section id="boiler-partner" class="partners p-4">
        <div class="container">
            <h5 class="text-center mb-6">Some brands we install, service and repair</h5>
            <div id="boiler-partner-carousel" class="owl-carousel owl-theme p-8">
                <?php foreach ($partners as $partner): ?>
                    <div class="single-partner item">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/' .$partner['image']); ?>" class="img-fluid" alt="<?php echo esc_attr($partner['alt']); ?>">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- /Partners Carousel Section: End -->
<?php endif; ?>
