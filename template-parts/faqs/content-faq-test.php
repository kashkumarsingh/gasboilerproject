<?php
// Fetch FAQ data from JSON file
$faq_json = file_get_contents(get_template_directory() . '/template-parts/faqs/faqs.json');
$faqs = json_decode($faq_json, true);
?>

<section class="faq-section">
   <div class="container mx-auto px-4 py-8">
          <div class="text-center mb-8">
        <h1 class="text-2xl font-bold"><?php esc_html_e('FAQs', 'gasboiler'); ?></h1>
        <h2 class="text-xl font-semibold mt-2"><?php esc_html_e('Common Questions', 'gasboiler'); ?></h2>
    </div>


<div class="row align-items-center justify-center">
    
    <div class="col-sm-12 col-md-12 col-lg-8">
        <div class="accordion" id="faqAccordion">
        <?php if (!empty($faqs) && is_array($faqs)) : ?>
            <?php foreach ($faqs as $index => $faq) : ?>
                <?php
                $collapse_id = 'collapse' . $index;
                $heading_id = 'heading' . $index;
                ?>
                <div class="accordion-item border border-gray-200 mb-2 rounded">
                    <h2 class="accordion-header" id="<?php echo esc_attr($heading_id); ?>">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($collapse_id); ?>" aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>" aria-controls="<?php echo esc_attr($collapse_id); ?>">
                            <?php echo esc_html($faq['question']); ?>
                        </button>
                    </h2>
                    <div id="<?php echo esc_attr($collapse_id); ?>" class="accordion-collapse collapse <?php echo $index === 0 ? 'show' : ''; ?>" aria-labelledby="<?php echo esc_attr($heading_id); ?>" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <?php echo wp_kses_post($faq['answer']); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p><?php esc_html_e('No FAQs found.', 'gasboiler'); ?></p>
        <?php endif; ?>
    </div>
        
    </div>
</div>

   </div>
</section>