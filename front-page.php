<?php get_header(); ?>
<main>
    <a href="<?php echo site_url('/voyages') ?>">
        <h2 class="section-heading">Tous les Voyages</h2>
    </a>

    <section>

        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 2,
        );

        $blogposts = new WP_Query($args);

        while ($blogposts->have_posts()) {
            $blogposts->the_post();
        ?>

            <div class="cards">
                <div class="card-image">
                    <a href="<?php echo get_permalink(); ?>">
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="<?php echo get_the_title(); ?>" />
                    </a>
                </div>
                <p>
                    <?php echo wp_trim_words(get_the_excerpt(), 30); ?>
                </p>
                <a href="<?php echo get_permalink(); ?>" class="btn-readmore">Lire plus</a>
            </div>
            </div>

        <?php }
        wp_reset_query();

        ?>

    </section>

    <a href="<?php echo site_url('/project') ?>">
        <h2 class="section-heading">Toutes les Recettes</h2>
    </a>

    <section>
        <?php
        $args = array(
            'post_type' => 'project',
            'posts_per_page' => 2,
        );

        $projects = new WP_Query($args);

        while ($projects->have_posts()) {
            $projects->the_post();
        ?>

            <div class="cards">
                <div class="card-image">
                    <a href="<?php echo get_permalink(); ?>">
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="<?php echo get_the_title(); ?>" />
                    </a>
                </div>
                <div class="card-description">
                    <h3><?php echo get_the_title(); ?></h3>
                    <p>
                        <?php echo wp_trim_words(get_the_excerpt(), 30); ?>
                    </p>
                    <a href="<?php echo get_permalink(); ?>" class="btn-readmore">Lire plus</a>
                </div>
            </div>

        <?php }
        wp_reset_query();

        ?>
    </section>

    <h2 class="section-heading">Mon blog</h2>

    <section id="section-source">
        <p>
            Voici un petit projet de blog pour tester mes compétences ainsi
            apprendre un peu plus avec wordpress. Si vous voulez voir le code
            source et en savoir plus sur mes projets et mon profil cliquer sur le
            bouton en dessous 😉👇🏻
        </p>
        <a href="https://github.com/Sushib08/Afrik-Asia" class="btn-readmore">Profil GitHub</a>
    </section>
</main>

<?php get_footer(); ?>