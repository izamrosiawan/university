<?php
/**
 * 404 Template
 * 
 * @package SDN_Wonokromo
 */

get_header();
?>

<main id="main-content">
    <div class="container" style="text-align: center; padding: 4rem 0;">
        <h1 style="font-size: 3rem; color: var(--secondary-color); margin-bottom: 1rem;">404</h1>
        <h2 style="margin-bottom: 1rem;"><?php esc_html_e( 'Page Not Found', 'sdn-wonokromo' ); ?></h2>
        <p style="margin-bottom: 2rem; color: #666;">
            <?php esc_html_e( 'Sorry, the page you are looking for does not exist.', 'sdn-wonokromo' ); ?>
        </p>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-submit" style="display: inline-block; text-decoration: none; padding: 1rem 2rem;">
            <?php esc_html_e( 'Go Back Home', 'sdn-wonokromo' ); ?>
        </a>
    </div>
</main>

<?php
get_footer();
