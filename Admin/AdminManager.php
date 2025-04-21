<?php
/**
 * AdminManager.php
 *
 * This file contains the AdminManager class, which is responsible for handling the
 * initialization and configuration of the PrimeKit Admin.
 * It ensures the proper setup of the required configurations and functionalities
 * for the PrimeKit Admin.
 *
 * @package PrimeKit\Admin
 * @since 1.0.0
 */
namespace PrimeKit\Admin;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


use PrimeKit\Admin\Inc\Dashboard\Settings\PrimeKit;
use PrimeKit\Admin\Inc\Dashboard\Settings\Settings;
use PrimeKit\Admin\Inc\Dashboard\Templates\TemplatesMenu;
use PrimeKit\Admin\Assets\Assets;
use PrimeKit\Admin\Inc\Dashboard\AvailableWidgets\PrimeKitWidgets;
use PrimeKit\Admin\Inc\Hooks\FilterHooks;
use PrimeKit\Admin\Inc\Hooks\ActionHooks;
use PrimeKit\Admin\Inc\ThemeBuilder\ThemeBuilder;
use PrimeKit\Admin\Inc\Metabox\MetaBox;
use PrimeKit\Admin\Inc\Templates\Templates;

/**
 * Class AdminManager
 * Handles the initialization and configuration of the PrimeKit Admin.
 * It ensures the proper setup of the required configurations and functionalities
 * for the PrimeKit Admin.
 *
 * @package PrimeKit\Admin
 * @since 1.0.0
 */
class AdminManager
{
    protected $primeKit;
    protected $settings;
    protected $templatesMenu;
    protected $Assets;
    protected $PrimeKitWidgets;
    protected $FilterHooks;
    protected $ActionHooks;
    protected $ThemeBuilder;
    protected $MetaBox;
    protected $Templates;

    /**
     * AdminManager constructor.
     *
     * Initializes the AdminManager by setting constants and initiating configurations
     * necessary for the PrimeKit Admin setup.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        $this->setConstants();
        $this->init();
        add_action('wp_ajax_primekit_save_widget_setting', [$this, 'primekit_save_widget_setting']);

        if (!class_exists('PrimeKitPro')) {
            add_filter('plugin_action_links_' . PRIMEKIT_BASENAME, [$this, 'add_plugin_settings_link']);
        }
        add_filter('plugin_row_meta', [$this, 'plugin_row_meta'], 10, 2);

        $this->tracker_primekit_addons();
    }

    /**
     * Sets the constants for the PrimeKit Admin.
     *
     * Defines the URL path for the PrimeKit Admin assets directory.
     *
     * @since 1.0.0
     */
    public function setConstants()
    {
        define('PRIMEKIT_ADMIN_ASSETS', plugin_dir_url(__FILE__) . 'Assets');

    }

    /**
     * Initializes the classes used by the PrimeKit Admin.
     *
     * This function instantiates the settings and assets classes.
     *
     * @since 1.0.0
     */
    public function init()
    {
        $this->primeKit = new PrimeKit();
        $this->settings = new Settings();
        $this->templatesMenu = new TemplatesMenu();
        $this->Assets = new Assets();
        $this->PrimeKitWidgets = new PrimeKitWidgets();
        $this->FilterHooks = new FilterHooks();
        $this->ActionHooks = new ActionHooks();
        $this->ThemeBuilder = new ThemeBuilder();
        $this->MetaBox = new MetaBox();
        $this->Templates = new Templates();
    }




    /**
     * Saves a widget setting through an AJAX request.
     *
     * Verifies the nonce, checks for the proper capability, and ensures the
     * required fields are set. Sanitizes the widget name and strictly validates
     * the value before saving the setting in the options table.
     *
     * @since 1.0.0
     */
    public function primekit_save_widget_setting()
    {
        // Verify nonce for security
        check_ajax_referer('primekit_nonce', 'nonce');

        // Ensure the user has the proper capability
        if (!current_user_can('manage_options')) {
            wp_send_json_error(['message' => __('Unauthorized', 'primekit-addons')]);
            wp_die();
        }

        // Check if the required fields are set
        if (!isset($_POST['widgetName']) || !isset($_POST['value'])) {
            wp_send_json_error(['message' => __('Missing data', 'primekit-addons')]);
            wp_die();
        }

        // Sanitize the widget name
        $widget_name = sanitize_text_field(wp_unslash($_POST['widgetName']));

        // Strictly validate the value, allowing only '1' or '0'
        $value = ($_POST['value'] === '1') ? '1' : '0';

        // Save the setting in the options table
        if (update_option($widget_name, $value)) {
            wp_send_json_success(['message' => __('Setting saved.', 'primekit-addons')]);
        } else {
            wp_send_json_error(['message' => __('Failed to save setting.', 'primekit-addons')]);
        }

        wp_die();
    }

    /**
     * Add custom links to the plugin actions in the Plugins list.
     *
     * @param array $links Existing plugin action links.
     * @return array Modified plugin action links.
     */
    public function add_plugin_settings_link($links)
    {
        $settings_link = sprintf(
            '<a href="%s">%s</a>',
            esc_url(admin_url('admin.php?page=primekit_home')),
            esc_html__('Settings', 'primekit-addons')
        );

        $pro_link = sprintf(
            '<a href="%s" target="_blank" style="font-weight: bold; color: #ff4500;">%s</a>',
            esc_url('https://primekitaddons.com/pro/'),
            esc_html__('Get Pro', 'primekit-addons')
        );

        // Prepend the settings link
        array_unshift($links, $settings_link);

        // Append the Pro link
        array_push($links, $pro_link);

        return $links;
    }


    public function plugin_row_meta($links, $file)
    {
        if (PRIMEKIT_BASENAME === $file) {
            $row_meta = array(
                'support' => '<a href="https://wordpress.org/support/plugin/primekit-addons" target="_blank">' . esc_html__('Support', 'primekit-addons') . '</a>',
                'rate' => '<a href="https://wordpress.org/support/plugin/primekit-addons/reviews/#new-post" target="_blank">' . esc_html__('Rate Us', 'primekit-addons') . '</a>',
            );
            return array_merge($links, $row_meta);
        }
        return (array) $links;
    }

    /**
     * Initialize the plugin tracker
     *
     * @return void
     */
   public function tracker_primekit_addons()
    {

        $client = new \Appsero\Client('1be56cc3-aaf0-4840-b551-088e690dbaee', 'PrimeKit Addons and Templates', PRIMEKIT_FILE);

        // Active insights
        $client->insights()->init();

    }



}