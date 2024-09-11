<section class="bg-gray-100 px-4 overflow-hidden">
    <div class="container block container-v5 mx-auto py-14 text-left">
         <span>News & Articles</span>
        <h2 class="text-4xl font-semibold text-gray-900 mb-4">Boiler Help &amp; Advice</h2>
        <p class="mt-4 max-w-md text-v5-dark-blue">Read our in-depth guides and expert reviews, as well news and updates
            on the topic of central heating in Great Britain.</p>
        <h3 class="font-medium text-2xl mb-2 mt-8">Latest articles</h3>
        <div class="grid grid-cols-12 gap-y-8 md:gap-8">
            <?php
            // Fetch the latest posts from the external site
            $response = wp_remote_get('http://gasboiler.com/blog/wp-json/wp/v2/posts?per_page=3');
            if (is_array($response) && !is_wp_error($response)) {
                $body = wp_remote_retrieve_body($response);
                $posts = json_decode($body);

                if (!empty($posts)) {
                    foreach ($posts as $post) {
                        ?>
                        <a href="<?php echo esc_url($post->link); ?>" class="col-span-12 sm:col-span-6 md:col-span-4 group">
                            <?php if (isset($post->featured_media)) : ?>
                                <?php
                                $media_response = wp_remote_get('http://gasboiler.com/blog/wp-json/wp/v2/media/' . $post->featured_media);
                                if (is_array($media_response) && !is_wp_error($media_response)) {
                                    $media_body = wp_remote_retrieve_body($media_response);
                                    $media = json_decode($media_body);
                                    if (!empty($media) && isset($media->source_url)) {
                                        ?>
                                        <img src="<?php echo esc_url($media->source_url); ?>" class="w-full mb-4 rounded-lg">
                                        <?php
                                    }
                                }
                                ?>
                            <?php endif; ?>
                            <div class="flex items-center justify-between mb-2">
                                <p class="font-medium text-gray-400">
                                    <?php echo date('F j, Y', strtotime($post->date)); ?>
                                </p>
                                <p class="bg-gray-200 text-gray-400 text-sm rounded p-1"><?php echo esc_html($post->type); ?></p>
                            </div>
                            <h3 class="text-2xl font-medium text-v5-dark-blue mb-2 group-hover:underline"><?php echo esc_html($post->title->rendered); ?></h3>
                            <p class="text-v5-dark-blue"><?php echo wp_trim_words($post->excerpt->rendered, 20, '...'); ?></p>
                        </a>
                        <?php
                    }
                } else {
                    echo '<p>No posts found.</p>';
                }
            } else {
                echo '<p>Unable to fetch blog content.</p>';
            }
            ?>
        </div>
        <a href="<?php echo esc_url('https://gasboiler.com/blog'); ?>" class="bg-black rounded-2xl text-white px-4 py-2 inline-block mt-8 font-">Read more articles</a>
    </div>
</section>
