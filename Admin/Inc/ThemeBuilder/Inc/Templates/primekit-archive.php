<?php
/**
 * Custom Archive Template
 * 
 * This is the template for displaying archives when no custom Elementor template is found.
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}


\Elementor\Plugin::$instance->frontend->add_body_class( 'elementor-template-full-width' );

get_header();
/**
 * Before Header-Footer page template content.
 *
 * Fires before the content of Elementor Header-Footer page template.
 *
 * @since 2.0.0
 */
do_action( 'elementor/page_templates/header-footer/before_content' );
?>

<div class="primekit-archive-page">
    <?php
    if (!\Elementor\Plugin::$instance->preview->is_preview_mode()):
        do_action('primekit_archive_page_content');
    else:
        ?>
        <div class="primekit-container">

            <?php if (have_posts()): ?>
                <h1 class="primekit-archive-title">
                    <?php
                    // Display the archive title
                    the_archive_title();
                    ?>
                </h1>

                <div class="primekit-archive-posts-list">
                    <?php
                    // Start the Loop
                    while (have_posts()):
                        the_post();
                        ?>
                        <div class="primekit-archive-post-item">
                            <h2 class="primekit-archive-post-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <div class="primekit-archive-post-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    ?>

                    <!-- Pagination -->
                    <div class="primekit-archive-pagination">
                        <?php
                        // Pagination links
                        the_posts_pagination(array(
                            'prev_text' => __('Previous', 'primekit-addons'),
                            'next_text' => __('Next', 'primekit-addons'),
                        ));
                        ?>
                    </div>
                </div>

            <?php else: ?>

                <h1 class="primekit-no-posts-title"><?php echo esc_html__('No Posts Found', 'primekit-addons'); ?></h1>
                <p class="primekit-no-posts-message">
                    <?php  echo esc_html__('Sorry, but no posts are available in this archive.', 'primekit-addons'); ?>
                </p>

            <?php endif; ?>

        </div>
        <?php
    endif;
    ?>
</div>

<?php
/**
 * After Header-Footer page template content.
 *
 * Fires after the content of Elementor Header-Footer page template.
 *
 * @since 2.0.0
 */
do_action( 'elementor/page_templates/header-footer/after_content' );

get_footer();