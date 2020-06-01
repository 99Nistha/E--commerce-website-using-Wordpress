<div class="page-header">
    <?php if ( is_single() ) : ?>
        <h1 itemprop="name"><?php the_title(); ?></h1>
    <?php else: ?>
        <h2 itemprop="name"><a href="<?php echo get_permalink(); ?>" itemprop="url"><?php the_title(); ?></a></h2>
    <?php endif; ?>
</div>