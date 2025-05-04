<?php

/**
 * Render View file for CTA widget
 */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

$primekit_settings = $this->get_settings_for_display();
$primekit_subheading = $primekit_settings['primekit_cta_sub_heading'];
$primekit_heading = $primekit_settings['primekit_cta_heading'];
$primekit_description = $primekit_settings['primekit_cta_description'];
$primekit_btn1_text = $primekit_settings['primekit_cta_button_text_one'];
$primekit_btn2_text = $primekit_settings['primekit_cta_button_text_two'];
$primekit_cta_ribbon = $primekit_settings['primekit_cta_ribbon_enable'];
$primekit_cta_ribbon_position = $primekit_settings['primekit_cta_ribbon_position'];
$primekit_cta_zoom_effect = $primekit_settings['primekit_cta_zoom_effect_disable'];

if (!empty($primekit_settings['primekit_cta_button_link_one']['url'])) {
    $this->add_link_attributes('primekit_cta_button_link_one', $primekit_settings['primekit_cta_button_link_one']);
}

if (!empty($primekit_settings['primekit_cta_button_link_two']['url'])) {
    $this->add_link_attributes('primekit_cta_button_link_two', $primekit_settings['primekit_cta_button_link_two']);
}
?>

<!-- CTA Area -->
<div class="primekit-cta-area<?php if ('yes' == $primekit_cta_zoom_effect):
                                    echo esc_attr(' primekit-cta-zoom-effect-disabled');
                                endif; ?>">


    <?php if ('yes' == $primekit_cta_ribbon): ?>
        <!-- CTA Ribbon Area -->
        <div class="primekit-cta-ribbon-area <?php if ('left' == $primekit_cta_ribbon_position):
                                                    echo esc_attr('primekit-left-rabbon');
                                                endif; ?>">
            <div class="primekit-cta-ribbon-text">
                <p><?php echo esc_html($primekit_settings['primekit_cta_ribbon_text']); ?></p>
            </div>
        </div>
        <!--/ CTA Rabbon Area -->
    <?php endif; ?>

    <!-- CTA Content Area -->
    <div class="primekit-cta-content-area">
        <?php if (!empty($primekit_subheading) || !empty($primekit_heading)): ?>
            <div class="primekit-cta-heading">
                <?php if (!empty($primekit_subheading)): ?>
                    <h4><?php echo esc_html($primekit_subheading); ?></h4>
                <?php endif; ?>
                <?php if (!empty($primekit_heading)): ?>
                    <h2><?php echo esc_html($primekit_heading); ?></h2>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($primekit_description)): ?>
            <div class="primekit-cta-description">
                <?php echo wp_kses_post(wpautop($primekit_description)); ?>
            </div>
        <?php endif; ?>

    </div>
    <!--/ CTA Content Area -->

    <?php if (!empty($primekit_btn1_text) || !empty($primekit_btn2_text)): ?>
        <!-- CTA Button -->
        <div class="primekit-cta-button-area">
            <?php if (!empty($primekit_btn1_text)): ?>
                <a <?php echo wp_kses_post($this->get_render_attribute_string('primekit_cta_button_link_one')); ?>
                    class="primekit-cta-button"><?php echo esc_html($primekit_btn1_text); ?></a>
            <?php endif; ?>

            <?php if (!empty($primekit_btn2_text)): ?>
                <a <?php echo wp_kses_post($this->get_render_attribute_string('primekit_cta_button_link_two')); ?>
                    class="primekit-cta-button"><?php echo esc_html($primekit_btn2_text); ?></a>
            <?php endif; ?>

        </div>
        <!--/ CTA Button -->
    <?php endif; ?>
</div>
<!--/ CTA Area -->