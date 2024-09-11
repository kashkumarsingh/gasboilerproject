<?php get_header(); ?>
<main class="container py-5">
    <?php if (have_posts()) : ?>
        <div class="row">
            <?php while (have_posts()) : the_post(); ?>
                <div class="col-md-4 mb-4">
                    <article>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail('medium', array('class' => 'img-fluid')); ?>
                            </div>
                        <?php endif; ?>
                        <h2><?php the_title(); ?></h2>
                        <p><?php the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
                    </article>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <p>No posts found</p>
    <?php endif; ?>
</main>
<?php get_footer(); ?>
