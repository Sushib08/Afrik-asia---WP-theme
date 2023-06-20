<?php get_template_part('header', 'without-banner'); ?>

<a href="<?php echo site_url('') ?>">
    <h2 class="page-heading">Résultats de recherche pour : <?php echo get_search_query(); ?></h2>
</a>

<section>


    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <div class="cards">
                <div class="card-image">
                    <a href="<?php echo get_permalink(); ?>">
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="<?php echo get_the_title(); ?>" />
                    </a>
                </div>
                <div class="card-description">
                    <h3><?php echo get_the_title(); ?></h3>
                    <div class="card-meta">
                        Posté par <?php the_author(); ?> le <?php echo sky_date_french('d F Y à H:i', get_post_time('U', true), 1); ?>
                        au
                        <a href="#"><?php echo get_the_category_list(','); ?></a>
                    </div>
                    <p>
                        <?php echo wp_trim_words(get_the_excerpt(), 30); ?>
                    </p>
                    <a href="<?php echo get_permalink(); ?>" class="btn-readmore">Lire plus</a>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else : ?>
        <div class="no-results">
            <p class="no_found">Aucun résultat trouvé pour votre recherche.</p>

            <div class="links-contain">
                <h3>Consultez les liens suivants :</h3>
                <ul>
                    <li>
                        <a href="<?php echo site_url('') ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('/about') ?>">A propos</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('/blog') ?>">Voyages</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('/projects') ?>">Retettes</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    <?php endif; ?>

</section>

<div class="paginate">
    <?php echo paginate_links(); ?>
</div>

<?php get_footer(); ?>