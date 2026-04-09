<?php
/**
 * Comments Template
 * 
 * @package SDN Wonokromo 3
 */

if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">
    <?php
        if ( have_comments() ) :
            ?>
            <h2 class="comments-title">
                <?php
                    $comment_count = get_comments_number();
                    if ( 1 === $comment_count ) {
                        esc_html_e( 'One thought on &ldquo;', 'sdn-wonokromo-3' );
                    } else {
                        echo esc_html( sprintf( _n( '%s thought on &ldquo;', '%s thoughts on &ldquo;', $comment_count, 'sdn-wonokromo-3' ), number_format_i18n( $comment_count ) ) );
                    }
                    echo the_title();
                    echo esc_html__( '&rdquo;', 'sdn-wonokromo-3' );
                ?>
            </h2>

            <ol class="comment-list">
                <?php
                    wp_list_comments( array(
                        'style'       => 'ol',
                        'short_ping'  => true,
                        'avatar_size' => 50,
                    ) );
                ?>
            </ol>

            <?php
                the_comments_pagination( array(
                    'prev_text' => esc_html__( 'Older Comments', 'sdn-wonokromo-3' ),
                    'next_text' => esc_html__( 'Newer Comments', 'sdn-wonokromo-3' ),
                ) );
            ?>
        <?php
        endif;

        if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
            ?>
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'sdn-wonokromo-3' ); ?></p>
        <?php
        endif;

        comment_form();
    ?>
</div>
