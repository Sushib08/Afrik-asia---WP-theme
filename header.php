<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Afrik`Asia Fusion</title>
    <?php wp_head(); ?>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid background">
                <a class="navbar-brand" href="<?php echo site_url('') ?>"><img src="<?php echo get_template_directory_uri() ?>./img/Afrik`Asia.png" alt="logo" id="logo-img" /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?php echo site_url('') ?>" <?php if (is_front_page()) echo 'class="active"' ?>>Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('/blog') ?>" <?php if (get_post_type() == 'post') echo 'class="active"' ?>>Voyages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('/projects') ?>" <?php if (get_post_type() == 'project') echo 'class="active"' ?>>Recettes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('/about') ?>" <?php if (is_page('about')) echo 'class="active"' ?>>About</a>
                        </li>
                    </ul>
                    <div class="searchbox-slide-menu">
                        <?php get_search_form(); ?>
                    </div>
                    </form>
                </div>
            </div>
        </nav>

        <div id="banner">
            <h1>Afrik`Asia - Fusion</h1>
            <h3>Blog de Voyages & Cuisines Afrcaines et Asiatiques</h3>
        </div>
    </header>

    <?php if (!is_front_page()) { ?>
        <main>
        <?php } ?>