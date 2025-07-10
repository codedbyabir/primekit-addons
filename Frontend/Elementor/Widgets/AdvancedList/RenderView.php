<?php
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

use Elementor\Icons_Manager;

$settings = $this->get_settings_for_display();
// Count init 
$count = 1;

if ($settings['primekit_advanced_list_items']) {
    echo '<ul class="primekit-advanced-list-wrapper">';
    foreach ($settings['primekit_advanced_list_items'] as $item) {
        echo '<li class="primekit-advanced-list-item">';

        $anchor_url = isset($item['list_item_url']['url']) ? $item['list_item_url']['url'] : '';
        // Check if the item has a URL
        if (!empty($anchor_url)) {
            $target = !empty($item['list_item_url']['is_external']) ? ' target="_blank"' : '';
            $nofollow = !empty($item['list_item_url']['nofollow']) ? ' rel="nofollow"' : '';
            echo '<a href="' . esc_url($item['list_item_url']['url']) . '" class="primekit-advanced-list-item-link"' . $target . $nofollow . '>';
        }

        // Check if the icon is set and render it
        if ($item['list_assets_type'] == 'icon') {
            if (!empty($item['list_assets_icon'])) {
                echo '<div class="primekit-advanced-list-item-icon">';
                Icons_Manager::render_icon($item['list_assets_icon'], ['aria-hidden' => 'true']);
            }
        }
        //End icon rendering
        // Check if the image is set and render it
        if ($item['list_assets_type'] == 'image') {
            if (!empty($item['list_assets_img'])) {
                echo '<div class="primekit-advanced-list-item-img">';
                echo '<img src="' . $item['list_assets_img']['url'] . '">';
            }
        }
        //End image rendering
        // Check if the number is set and render it
        if ($item['list_assets_type'] == 'count') {
            echo '<div class="primekit-advanced-list-item-count">';
            echo '<span>' . $count . '</span>';

        }
        //End counter rendering

        echo '</div>
                <div class="primekit-advanced-list-item-content">';

        if (!empty($item['list_title'])) {
            echo '<h4 class="primekit-advanced-list-title">' . esc_html($item['list_title']) . '</h4>';
        }
        //End title rendering

        // Check if the sub-title is set and render it
        if (!empty($item['list_sub_title'])) {
            echo '<p class="primekit-advanced-list-text">' . esc_html($item['list_sub_title']) . '</p>';
        }
        //End sub-title rendering
        echo '</div>';
        if (!empty($anchor_url)) {
            echo '</a>';
        }
        echo '</li>';
        // Increment the count for the next item
        $count++;
    }

    echo '</ul>';
}




