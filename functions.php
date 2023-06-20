<?php

// adding the css and Js files

function theme_setup()
{
    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Roboto|Roboto+Condensed|Roboto+Slab');
    wp_enqueue_style('fontawesome', '//use.fontawesome.com/releases/v5.1.0/css/all.css');
    wp_enqueue_style('bootstrap', '//cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css');
    wp_enqueue_style('stylesheet', get_stylesheet_uri());
    wp_enqueue_script("main", get_theme_file_uri('/js/main.js'), NULL, microtime(), true);
    wp_enqueue_script("bootstrap", "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js", array(), '5.3.0-alpha3', true);
}

add_action('wp_enqueue_scripts', 'theme_setup');

// Adding Theme Support


function theme_init()
{
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support(
        'html5',
        array('comment-list', 'comment-form', 'search-form')
    );
}

add_action('after_setup_theme', 'theme_init');

// Projects Post Type

function theme_custom_post_type()
{
    register_post_type(
        'project',
        array(
            'rewrite' => array('slug' => 'projects'),
            'labels' => array(
                'name' => 'Project',
                'add_new_item' => 'Add New Project',
                'edit_item' => 'Edit Project'
            ),
            'menu-icon' => 'dashicons-clipboard',
            'public' => true,
            'has_archive' => true,
            'supports' => array(
                'title', 'thumbnail', 'editor', 'excerpt', 'comments'
            )
        )
    );
}

add_action('init', 'theme_custom_post_type');


// Convert EN date to FR date

function sky_date_french($format, $timestamp = null, $echo = null)
{
    $param_D = array('', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim');
    $param_l = array('', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
    $param_F = array('', 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
    $param_M = array('', 'Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc');
    $return = '';
    if (is_null($timestamp)) {
        $timestamp = mktime();
    }
    for ($i = 0, $len = strlen($format); $i < $len; $i++) {
        switch ($format[$i]) {
            case '\\': // fix.slashes
                $i++;
                $return .= isset($format[$i]) ? $format[$i] : '';
                break;
            case 'D':
                $return .= $param_D[date('N', $timestamp)];
                break;
            case 'l':
                $return .= $param_l[date('N', $timestamp)];
                break;
            case 'F':
                $return .= $param_F[date('n', $timestamp)];
                break;
            case 'M':
                $return .= $param_M[date('n', $timestamp)];
                break;
            default:
                $return .= date($format[$i], $timestamp);
                break;
        }
    }
    if (is_null($echo)) {
        return $return;
    } else {
        echo $return;
    }
}

function modify_logged_in_as_text($text)
{
    $new_text = 'Vous êtes connecté en tant que :'; // Modifier le texte ici
    $text = str_replace('Logged in as', $new_text, $text);
    return $text;
}
add_filter('gettext', 'modify_logged_in_as_text');

function remove_edit_profile_link($text)
{
    $text = preg_replace('/<a href="([^"]+)"[^>]*>Edit your profile<\/a>/', '', $text);
    return $text;
}
add_filter('gettext', 'remove_edit_profile_link');

function modify_loggout_in_as_text($text)
{
    $new_text = 'Déconnexion ?'; // Modifier le texte ici
    $text = str_replace('Log out?', $new_text, $text);
    return $text;
}
add_filter('gettext', 'modify_loggout_in_as_text');

function modify_required_field_message($text)
{
    $new_text = 'Les champs requis sont marqués'; // Modifier le texte ici
    $text = str_replace('Required fields are marked', $new_text, $text);
    return $text;
}
add_filter('gettext', 'modify_required_field_message');


function modify_required_says($text)
{
    $new_text = ''; // Modifier le texte ici
    $text = str_replace('says:', $new_text, $text);
    return $text;
}
add_filter('gettext', 'modify_required_says');


function modify_reply($text)
{
    $new_text = 'Répondre'; // Modifier le texte ici
    $text = str_replace('Reply', $new_text, $text);
    return $text;
}
add_filter('gettext', 'modify_reply');


function wpse_comment_date_18350375($date)
{
    $date = date("d/m/Y");
    return $date;
}
add_filter('get_comment_date', 'wpse_comment_date_18350375');

function modify_edit($text)
{
    $new_text = 'Modifier'; // Modifier le texte ici
    $text = str_replace('Edit', $new_text, $text);
    return $text;
}
add_filter('gettext', 'modify_edit');


//SIDEBAR
function widgets()
{
    register_sidebar(
        array(
            'name' => 'Main SideBar',
            'id' => 'main_sidebar',
            'before_title' => '<h3>',
            'after_title' => '</h3>'
        )
    );
}
add_action('widgets_init', 'widgets');
