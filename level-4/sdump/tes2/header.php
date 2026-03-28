<?php
?><!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<?php wp_body_open(); ?>
<header class="site-header">
    <div class="container navbar">
        <a class="brand" href="<?php echo esc_url(home_url('/')); ?>">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.svg'); ?>" alt="Logo SDN Wonokromo III" />
            <?php endif; ?>
            <span><?php bloginfo('name'); ?></span>
        </a>
        <button class="menu-toggle" type="button" aria-label="Buka Menu">
            Menu
        </button>
        <nav class="main-menu" id="main-menu">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'fallback_cb' => function() {
                    echo '<a href="' . esc_url(home_url('/')) . '">Beranda</a>';
                    echo '<a href="' . esc_url(home_url('/profil-sekolah')) . '">Profil</a>';
                    echo '<a href="' . esc_url(home_url('/program')) . '">Program</a>';
                    echo '<a href="' . esc_url(home_url('/galeri')) . '">Galeri</a>';
                    echo '<a href="' . esc_url(home_url('/berita')) . '">Berita</a>';
                    echo '<a href="' . esc_url(home_url('/kontak')) . '">Kontak</a>';
                }
            ));
            ?>
        </nav>
    </div>
</header>
