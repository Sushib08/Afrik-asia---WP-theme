<?php get_template_part('header', 'without-banner'); ?>


<a href="<?php echo site_url('/blog') ?>">
    <h2 class="page-heading"><?php the_archive_title() ?></h2>
</a>

<section>

    <?php
    // Personnalisation de la requête avec WP_Query
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'post_type' => 'post',
        'paged' => $paged
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) :
            $query->the_post();
            // Afficher le contenu ici
    ?>

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
                    </div>
                    <p>
                        <?php echo wp_trim_words(get_the_excerpt(), 30); ?>
                    </p>
                    <a href="<?php echo get_permalink(); ?>" class="btn-readmore">Lire plus</a>
                </div>
            </div>

    <?php
        endwhile;
    else :
    // Aucun contenu trouvé
    endif;

    // Réinitialisation de la requête principale
    wp_reset_postdata();
    ?>

</section>

<div class="paginate">
    <?php echo paginate_links(array('total' => $query->max_num_pages, 'current' => max(1, get_query_var('paged')))); ?>
</div>

<?php get_footer(); ?>