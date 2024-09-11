<?php
/*
Template Name: Front Page
*/
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php get_template_part('template-parts/content', 'hero'); 
            get_template_part('template-parts/services/content', 'services');
            get_template_part('template-parts/partners/content', 'partner');
            get_template_part('template-parts/content','why-choose-us');
            get_template_part('template-parts/faqs/content','faq');
             get_template_part('template-parts/content', 'gasboiler-articles');
             get_template_part('template-parts/content', 'cta');
        ?>
        
    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php
get_footer();
?>

