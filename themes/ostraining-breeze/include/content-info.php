<dl class="article-info muted">
    <dd class="createdby">
        <i class="fa fa-user"></i> <?php _e( 'Written by', 'ostraining-breeze' ); ?>:
        <span itemprop="author" itemscope itemtype="http://schema.org/Person">
            <span itemprop="name">
                <?php the_author_posts_link(); ?>
            </span>
        </span>
    </dd>
    <dd class="category-name">
        <i class="fa fa-bars"></i> <?php _e( 'Category', 'ostraining-breeze' ); ?>:
        <span itemprop="genre">
            <?php the_category(', '); ?>
        </span>
    </dd>
    <dd class="published">
        <i class="fa fa-calendar"></i> <?php _e( 'Published', 'ostraining-breeze' ); ?>:
        <span datetime="<?php the_time('Y-m-dTH:i:sO'); ?>" itemprop="datePublished" pubdate>
            <?php the_time( get_option( 'date_format', 'l F d, Y' ) ); ?>
        </span>
    </dd>
</dl>