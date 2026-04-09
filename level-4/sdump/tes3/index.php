<?php
/**
 * Home Page Template
 * 
 * @package SDN Wonokromo 3
 */

get_header();
?>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1><?php echo get_theme_mod( 'hero_title', 'Selamat Datang di SDN Wonokromo III' ); ?></h1>
            <p><?php echo get_theme_mod( 'hero_subtitle', 'Membangun Generasi Penerus Bangsa yang Berkarakter dan Berprestasi' ); ?></p>
        </div>
        <div class="hero-image">
            <?php if ( has_post_thumbnail( 0 ) ) : ?>
                <?php the_post_thumbnail(); ?>
            <?php else : ?>
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/hero-bg.jpg" alt="<?php bloginfo( 'name' ); ?>">
            <?php endif; ?>
        </div>
    </section>

    <!-- Quick Access Buttons -->
    <section class="quick-access">
        <div class="container">
            <h2><?php _e( 'Akses Cepat', 'sdn-wonokromo-3' ); ?></h2>
            <div class="button-grid">
                <a href="<?php echo esc_url( get_theme_mod( 'quick_ppdb_url', '#ppdb' ) ); ?>" class="quick-btn">
                    <span class="icon">📋</span>
                    <span><?php _e( 'PPDB', 'sdn-wonokromo-3' ); ?></span>
                </a>
                <a href="<?php echo esc_url( get_page_link( get_theme_mod( 'quick_contact_page', '' ) ) ); ?>" class="quick-btn">
                    <span class="icon">📞</span>
                    <span><?php _e( 'Kontak', 'sdn-wonokromo-3' ); ?></span>
                </a>
                <a href="<?php echo esc_url( get_page_link( get_theme_mod( 'quick_profile_page', '' ) ) ); ?>" class="quick-btn">
                    <span class="icon">🏫</span>
                    <span><?php _e( 'Profil Sekolah', 'sdn-wonokromo-3' ); ?></span>
                </a>
                <a href="<?php echo esc_url( get_page_link( get_theme_mod( 'quick_gallery_page', '' ) ) ); ?>" class="quick-btn">
                    <span class="icon">📸</span>
                    <span><?php _e( 'Galeri', 'sdn-wonokromo-3' ); ?></span>
                </a>
            </div>
        </div>
    </section>

    <!-- Sambutan Kepala Sekolah -->
    <section class="welcome-section">
        <div class="container">
            <div class="welcome-content">
                <?php if ( get_theme_mod( 'welcome_image' ) ) : ?>
                    <img src="<?php echo esc_url( get_theme_mod( 'welcome_image' ) ); ?>" alt="<?php _e( 'Kepala Sekolah', 'sdn-wonokromo-3' ); ?>" class="welcome-image">
                <?php endif; ?>
                <div class="welcome-text">
                    <h2><?php echo get_theme_mod( 'welcome_title', 'Sambutan Kepala Sekolah' ); ?></h2>
                    <p class="title"><?php echo get_theme_mod( 'welcome_name', 'Ibu/Bapak Kepala Sekolah' ); ?></p>
                    <?php echo wp_kses_post( get_theme_mod( 'welcome_message', '' ) ); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Program Unggulan -->
    <section class="featured-program">
        <div class="container">
            <h2><?php _e( 'Program Unggulan', 'sdn-wonokromo-3' ); ?></h2>
            <div class="program-grid">
                <?php
                    $args = array(
                        'posts_per_page' => 3,
                        'post_type'      => 'post',
                        'category_name'  => 'program',
                    );
                    $query = new WP_Query( $args );
                    
                    if ( $query->have_posts() ) :
                        while ( $query->have_posts() ) : $query->the_post();
                            ?>
                            <div class="program-card">
                                <h3><?php the_title(); ?></h3>
                                <p><?php echo wp_trim_words( get_the_content(), 20 ); ?></p>
                                <a href="<?php the_permalink(); ?>" class="btn-learn-more"><?php _e( 'Pelajari Lebih Lanjut →', 'sdn-wonokromo-3' ); ?></a>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Latest News -->
    <section class="news-section">
        <div class="container">
            <h2><?php _e( 'Berita Terbaru', 'sdn-wonokromo-3' ); ?></h2>
            <div class="news-grid">
                <?php
                    $args = array(
                        'posts_per_page' => 6,
                        'post_type'      => 'post',
                    );
                    $query = new WP_Query( $args );
                    
                    if ( $query->have_posts() ) :
                        while ( $query->have_posts() ) : $query->the_post();
                            ?>
                            <article class="news-card">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <img src="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>" alt="<?php the_title(); ?>">
                                <?php endif; ?>
                                <div class="news-content">
                                    <span class="category"><?php echo esc_html( get_the_category()[0]->name ); ?></span>
                                    <h3><?php the_title(); ?></h3>
                                    <p class="date"><?php echo get_the_date(); ?></p>
                                    <p><?php echo wp_trim_words( get_the_content(), 15 ); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="btn-small"><?php _e( 'Selengkapnya →', 'sdn-wonokromo-3' ); ?></a>
                                </div>
                            </article>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                ?>
            </div>
        </div>
    </section>

<?php get_footer();
