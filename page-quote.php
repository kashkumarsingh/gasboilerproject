<?php
/*
Template Name: Quote Template
*/
get_header();
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php
        get_template_part('template-parts/quote/content', 'quote-wizard');
        ?>
    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php
get_footer();
?>