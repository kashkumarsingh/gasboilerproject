<section class="bg-v5-light-gray px-4 faq">
    <div class="container block container-v5 mx-auto py-14 text-left">
              <span>FAQ’s</span>
        <h2 class="text-4xl font-semibold text-gray-900 mb-4">Some of the most frequent questions we get asked.</h2>

        <ul class="nav nav-tabs mt-4 mb-2 border-0" id="faqTabs" role="tablist">
            <?php
            $faq_categories = get_terms('faq_category');
            foreach ($faq_categories as $index => $category) {
                $active_class = $index === 0 ? 'active bg-gray-300' : 'bg-gray-300';
                echo '<li class="nav-item" role="presentation">';
                echo '<button class="' . esc_attr($active_class) . ' hover:bg-gray-400 py-1 px-3 rounded-xl mr-2 cursor-pointer dot" id="' . esc_attr($category->slug) . '-tab" data-bs-toggle="tab" data-bs-target="#' . esc_attr($category->slug) . '" type="button" role="tab" aria-controls="' . esc_attr($category->slug) . '" aria-selected="' . ($index === 0 ? 'true' : 'false') . '">' . esc_html($category->name) . '</button>';
                echo '</li>';
            }
            ?>
        </ul>

        <div class="tab-content" id="faqTabsContent">
            <?php
            foreach ($faq_categories as $index => $category) {
                $active_class = $index === 0 ? 'show active' : '';
                echo '<div class="tab-pane fade ' . esc_attr($active_class) . '" id="' . esc_attr($category->slug) . '" role="tabpanel" aria-labelledby="' . esc_attr($category->slug) . '-tab">';
                echo '<div class="accordion" id="' . esc_attr($category->slug) . 'Accordion">';

                $faq_query = new WP_Query(array(
                    'post_type' => 'faq',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'faq_category',
                            'field'    => 'term_id',
                            'terms'    => $category->term_id,
                        ),
                    ),
                    'posts_per_page' => -1
                ));

                if ($faq_query->have_posts()) {
                    while ($faq_query->have_posts()) {
                        $faq_query->the_post();
                        $question = get_the_title();
                        $answer = get_the_content();
                        $faq_id = get_the_ID();
                        ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="<?php echo esc_attr($category->slug); ?>Heading<?php echo esc_attr($faq_id); ?>">
                                <button class="accordion-button bg-transparent" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#<?php echo esc_attr($category->slug); ?>Collapse<?php echo esc_attr($faq_id); ?>" aria-expanded="true"
                                    aria-controls="<?php echo esc_attr($category->slug); ?>Collapse<?php echo esc_attr($faq_id); ?>">
                                    <?php echo esc_html($question); ?>
                                </button>
                            </h2>
                            <div id="<?php echo esc_attr($category->slug); ?>Collapse<?php echo esc_attr($faq_id); ?>" class="accordion-collapse collapse"
                                aria-labelledby="<?php echo esc_attr($category->slug); ?>Heading<?php echo esc_attr($faq_id); ?>" data-bs-parent="#<?php echo esc_attr($category->slug); ?>Accordion">
                                <div class="accordion-body">
                                    <?php echo wp_kses_post($answer); ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    wp_reset_postdata();
                } else {
                    echo '<p>' . __('No FAQs found in this category.', 'gasboiler') . '</p>';
                }

                echo '</div></div>';
            }
            ?>
        </div>
    </div>
</section>



