<?php get_template_part('header', 'without-banner'); ?>

<div class="container-404">
    <h2 class="page-heading">Oh Non ! Quoi ? 404 ?</h2>
    <img src="https://source.unsplash.com/640x480/?404" alt="404" />
    <h3>Désolé, je pense que tu es perdu(e), veuillez cliquez sur un lien :</h3>
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

<?php get_footer(); ?>