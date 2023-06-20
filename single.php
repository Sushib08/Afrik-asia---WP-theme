<?php get_template_part('header', 'without-banner');

while (have_posts()) {
    the_post();
?>

    <h2 class="page-heading"><?php the_title(); ?></h2>
    <div id="post-container">
        <section id="blogpost">
            <div class="cards">
                <div class="card-meta-blogpost">
                    Posté par <?php the_author(); ?> le <?php echo sky_date_french('d F Y à H:i', get_post_time('U', true), 1); ?>
                    <?php if (get_post_type() == 'post') { ?>
                        au
                        <a href="#"><?php echo get_the_category_list(','); ?></a>
                    <?php } ?>
                </div>
                <div class="card-image">
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="<?php echo get_the_title(); ?>" />
                </div>
                <div class="card-description">
                    <?php the_content(); ?>
                </div>
            </div>
            <div id="comments-section">

                <?php
                $fields = array();
                $commenter = wp_get_current_commenter();

                if ($commenter) {
                    $fields['author'] = '<input placeholder="Nom" id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" /></p>';
                    $fields['email'] = '<input placeholder="Email" id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" /></p>';
                }

                $args = array(
                    'title_reply' => 'Partagez vos impressions, vos idées',
                    'fields' => $fields,
                    'comment_field' => '<textarea placeholder="Votre commentaire" id="comment" cols="45" rows="8" aria-required="true"></textarea>',
                    'comment_notes_before' => '<p class="comment-notes">Votre adresse email ne sera jamais publiée.</p>',
                    'comment_notes_after' => '', // Ajout de cette ligne pour supprimer les notes après le formulaire
                    'label_submit' => 'Envoyer' // Ajout de cette ligne pour modifier le texte du bouton de soumission
                );

                ob_start();
                comment_form($args);
                $comment_form = ob_get_clean();

                // Supprimer le champ de consentement pour les cookies du formulaire généré
                $comment_form = str_replace('p class="comment-form-cookies-consent"', 'p style="display: none;"', $comment_form);

                echo $comment_form;


                $comments_number = get_comments_number();
                if ($comments_number != 0) {
                ?>

                    <div class="comments">
                        <h3>Partagez moi vos avis</h3>
                        <ol class="all-comments">
                            <?php
                            $comments = get_comments(array(
                                'post_id' => $post->ID,
                                'status' => 'approve'
                            ));
                            wp_list_comments(array(
                                'per_page' => 15,
                            ), $comments);
                            ?>
                        </ol>
                    </div>

                <?php } ?>

            <?php } ?>
            </div>
        </section>

        <aside id="sidebar">
            <?php dynamic_sidebar('main_sidebar') ?>
        </aside>
    </div>

    <?php get_footer(); ?>