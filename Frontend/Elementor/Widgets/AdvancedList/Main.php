<?php

namespace PrimeKit\Frontend\Elementor\Widgets\AdvancedList;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

use Elementor\Widget_Base;

class Main extends Widget_Base
{
    public function get_name()
    {
        return 'primekit-advanced-list';
    }

    public function get_title()
    {
        return esc_html__('Advanced List', 'primekit-addons');
    }

    public function get_icon()
    {
        return 'eicon-editor-list-ul primekit-addons-icon';
    }

    public function get_categories()
    {
        return ['primekit-category'];
    }

    public function get_keywords()
    {
        return ['prime', 'advance', 'list', 'icon list'];
    }

    /**
     * Register the widget controls.
     */
    protected function register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Advanced List', 'primekit-addons'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        // List Repeater
        $this->add_control(
            'primekit_advanced_list_items',
            [
                'label' => esc_html__('Items', 'primekit-addons'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    //Title
                    [
                        'name' => 'list_title',
                        'label' => esc_html__('Title', 'primekit-addons'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('List Title', 'primekit-addons'),
                        'label_block' => true,
                        'dynamic' => [
                            'active' => true
                        ]
                    ],
                    // Sub Title
                    [
                        'name' => 'list_sub_title',
                        'label' => esc_html__('Sub Title', 'primekit-addons'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('List Sub Title', 'primekit-addons'),
                        'label_block' => true,
                        'dynamic' => [
                            'active' => true
                        ]
                    ],
                    // Assets Type
                    [
                        'name' => 'list_assets_type',
                        'label' => esc_html__('Assets Type', 'primekit-addons'),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'icon',
                        'options' => [
                            'icon' => esc_html__('Icon', 'primekit-addons'),
                            'image' => esc_html__('Image', 'primekit-addons'),
                            'count' => esc_html__('Number Count', 'primekit-addons'),
                        ],
                    ],
                    // Icon Control 
                    [
                        'name' => 'list_assets_icon',
                        'label' => esc_html__('Icon', 'primekit-addons'),
                        'type' => \Elementor\Controls_Manager::ICONS,
                        'condition' => [
                            'list_assets_type' => 'icon',
                        ],
                        'default' => [
                            'value' => 'fas fa-check',
                            'library' => 'fa-solid',
                        ]
                    ],

                    // Image Control 
                    [
                        'name' => 'list_assets_img',
                        'label' => esc_html__('Choose Image', 'primekit-addons'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'condition' => [
                            'list_assets_type' => 'image',
                        ],
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],

                    // URL Control 
                    [
                        'name' => 'list_item_url',
                        'label' => esc_html__('Link', 'primekit-addons'),
                        'type' => \Elementor\Controls_Manager::URL,
                        'options' => ['url', 'is_external', 'nofollow'],
                        'default' => [
                            'url' => '',
                            'is_external' => true,
                            'nofollow' => true,
                            // 'custom_attributes' => '',
                        ],
                        'label_block' => true,
                    ]

                ],


                'default' => [
                    [
                        'list_title' => esc_html__('Title #1', 'primekit-addons'),
                        'list_sub_title' => esc_html__('Subtitle', 'primekit-addons'),
                    ],
                    [
                        'list_title' => esc_html__('Title #2', 'primekit-addons'),
                        'list_sub_title' => esc_html__('Subtitle', 'primekit-addons'),
                    ],
                    [
                        'list_title' => esc_html__('Title #3', 'primekit-addons'),
                        'list_sub_title' => esc_html__('Subtitle', 'primekit-addons'),
                    ],

                ],
                'title_field' => '{{{ list_title }}}',
            ]
        );

        $this->end_controls_section(); // End content tab

        // Start Style Tab
        $this->start_controls_section(
            'primekit_advanced_list_style',
            [
                'label' => esc_html__('List', 'primekit-addons'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Space Between 
        $this->add_responsive_control(
            'Space Between',
            [
                'label' => esc_html__('Space Between', 'primekit-addons'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'step' => 1,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 10,
                ],
                'selectors' => [
                    '{{WRAPPER}} .primekit-advanced-list-wrapper' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Gap Between 
        $this->add_responsive_control(
            'gap_between',
            [
                'label' => esc_html__('Gap', 'primekit-addons'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'step' => 1,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 20,
                ],
                'selectors' => [
                    '{{WRAPPER}} .primekit-advanced-list-wrapper .primekit-advanced-list-item' => 'gap: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .primekit-advanced-list-wrapper .primekit-advanced-list-item .primekit-advanced-list-item-link' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // List Style Tabs
        $this->start_controls_tabs(
            'list_style_tabs'
        );
        // Normal Tab
        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => esc_html__('Normal', 'primekit-addons'),
            ]
        );

        // List Item Background
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .primekit-advanced-list-wrapper .primekit-advanced-list-item',
                'fields_options' => [
                    'background' => [
                        'default' => 'gradient',
                    ],
                    'color' => [
                        'default' => '#a14af0', // Gradient start
                    ],
                    'color_b' => [
                        'default' => '#0249e7', // Gradient end
                    ],
                    'gradient_type' => [
                        'default' => 'linear',
                    ],
                ],
            ]
        );

        //Box Shadow
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'selector' => '{{WRAPPER}} .primekit-advanced-list-wrapper .primekit-advanced-list-item',
            ]
        );

        $this->end_controls_tab(); // End Normal Tab

        // Hover Tab
        $this->start_controls_tab(
            'style_Hover_tab',
            [
                'label' => esc_html__('Hover', 'primekit-addons'),
            ]
        );

        // List Item hover Background
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background_hover',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .primekit-advanced-list-wrapper .primekit-advanced-list-item:hover',
            ]
        );

        //Hover Box Shadow
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow_hover',
                'selector' => '{{WRAPPER}} .primekit-advanced-list-wrapper .primekit-advanced-list-item:hover',
            ]
        );
        $this->end_controls_tab(); // End Hover Tab        
        $this->end_controls_tabs(); // End List Style Tabs

        //Border
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'list_border',
                'selector' => '{{WRAPPER}} .primekit-advanced-list-wrapper .primekit-advanced-list-item',
                'separator' => 'before',
            ]
        );
        // Padding
        $this->add_responsive_control(
            'list_padding',
            [
                'label' => esc_html__('Padding', 'primekit-addons'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', 'rem', 'custom'],
                'default' => [
                    'top' => 10,
                    'right' => 10,
                    'bottom' => 10,
                    'left' => 10,
                    'unit' => 'px',
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .primekit-advanced-list-wrapper .primekit-advanced-list-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Border Radius
        $this->add_responsive_control(
            'list_border_radius',
            [
                'label' => esc_html__('Border Radius', 'primekit-addons'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', 'rem', 'custom'],
                'default' => [
                    'top' => 05,
                    'right' => 05,
                    'bottom' => 05,
                    'left' => 05,
                    'unit' => 'px',
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .primekit-advanced-list-wrapper .primekit-advanced-list-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section(); // End Style Tab

        //Number Counter Style
        $this->start_controls_section(
            'number_count_style',
            [
                'label' => esc_html__('Number Count', 'primekit-addons'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );


        // start tab
        $this->start_controls_tabs(
            'number_count_style_tabs'
        );

        // Normal Tab
        $this->start_controls_tab(
            'number_count_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'primekit-addons'),
            ]
        );

        // Count color 
        $this->add_control(
            'count_text_color',
            [
                'label' => esc_html__('Color', 'primekit-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .primekit-advanced-list-item .primekit-advanced-list-item-count span' => 'color: {{VALUE}}',
                ],
            ]
        );
        // Count BG Color
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'count_background',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .primekit-advanced-list-item .primekit-advanced-list-item-count',
            ]
        );

        $this->end_controls_tab(); // End Normal Tab

        // Hover Tab
        $this->start_controls_tab(
            'number_count_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'primekit-addons'),
            ]
        );

        // Count hover color 
        $this->add_control(
            'count_text_hover_color',
            [
                'label' => esc_html__('Color', 'primekit-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primekit-advanced-list-item:hover .primekit-advanced-list-item-count span' => 'color: {{VALUE}}',
                ],
            ]
        );

        // Count BG Hover Color
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'count_hover_background',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .primekit-advanced-list-item:hover .primekit-advanced-list-item-count',
            ]
        );

        //Border hover color
        $this->add_control(
            'count_border_hover_color',
            [
                'label' => esc_html__('Border Color', 'primekit-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primekit-advanced-list-item:hover .primekit-advanced-list-item-count' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab(); // End Hover Tab

        $this->end_controls_tabs(); // End Number Counter Style Tabs


        //Border 
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'count_border',
                'selector' => '{{WRAPPER}} .primekit-advanced-list-wrapper .primekit-advanced-list-item-count',
                'separator' => 'before',
            ]
        );

        // Border Radius
        $this->add_responsive_control(
            'count_border_radius',
            [
                'label' => esc_html__('Border Radius', 'primekit-addons'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', 'rem', 'custom'],
                'default' => [
                    'top' => 0,
                    'right' => 0,
                    'bottom' => 0,
                    'left' => 0,
                    'unit' => 'px',
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .primekit-advanced-list-wrapper .primekit-advanced-list-item-count' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // padding

        $this->add_responsive_control(
            'count_padding',
            [
                'label' => esc_html__('Padding', 'primekit-addons'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', 'rem', 'custom'],
                'default' => [
                    'top' => 06,
                    'right' => 06,
                    'bottom' => 06,
                    'left' => 06,
                    'unit' => 'px',
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .primekit-advanced-list-wrapper .primekit-advanced-list-item-count' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .primekit-advanced-list-wrapper .primekit-advanced-list-item-count span',
            ]
        );
        $this->end_controls_section(); // End Count style

        // Title & Sub Title Style
        $this->start_controls_section(
            'title_subtitle_style',
            [
                'label' => esc_html__('Title & Sub Title', 'primekit-addons'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        //Title Heading 
        $this->add_control(
            'title_label',
            [
                'label' => esc_html__('Title', 'primekit-addons'),
                'type' => \Elementor\Controls_Manager::HEADING,
            ]
        );
        // Title Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .primekit-advanced-list-item .primekit-advanced-list-item-content .primekit-advanced-list-title',
            ]
        );

        // Title Color
        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Color', 'primekit-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .primekit-advanced-list-item .primekit-advanced-list-item-content .primekit-advanced-list-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        // Title Hover Color
        $this->add_control(
            'title_hover_color',
            [
                'label' => esc_html__('Hover Color', 'primekit-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primekit-advanced-list-item:hover .primekit-advanced-list-item-content .primekit-advanced-list-title' => 'color: {{VALUE}}',
                ],
                'separator' => 'after',
            ]
        );

        // Sub Title controls

        //Sub title Heading 
        $this->add_control(
            'subtitle_label',
            [
                'label' => esc_html__('Sub Title', 'primekit-addons'),
                'type' => \Elementor\Controls_Manager::HEADING,
            ]
        );
        // Sub Title Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'selector' => '{{WRAPPER}} .primekit-advanced-list-item .primekit-advanced-list-item-content .primekit-advanced-list-text',
            ]
        );

        // Title Color
        $this->add_control(
            'subtitle_color',
            [
                'label' => esc_html__('Color', 'primekit-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .primekit-advanced-list-item .primekit-advanced-list-item-content .primekit-advanced-list-text' => 'color: {{VALUE}}',
                ],
            ]
        );

        // Title Hover Color
        $this->add_control(
            'subtitle_hover_color',
            [
                'label' => esc_html__('Hover Color', 'primekit-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primekit-advanced-list-item:hover .primekit-advanced-list-item-content .primekit-advanced-list-text' => 'color: {{VALUE}}',
                ],
                'separator' => 'after',
            ]
        );

        $this->end_controls_section(); // End Title & Sub Title Style

        // Icon Style
        $this->start_controls_section(
            'icon_style',
            [
                'label' => esc_html__('Icon', 'primekit-addons'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        //Size
        $this->add_responsive_control(
            'icon_size',
            [
                'label' => esc_html__('Size', 'primekit-addons'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 25,
                ],
                'selectors' => [
                    '{{WRAPPER}} .primekit-advanced-list-wrapper .primekit-advanced-list-item-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // start tab 
        $this->start_controls_tabs(
            'icon_style_tabs'
        );

        // Normal Tab
        $this->start_controls_tab(
            'icon_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'primekit-addons'),
            ]
        );

        // icon color 
        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Color', 'primekit-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .primekit-advanced-list-wrapper .primekit-advanced-list-item .primekit-advanced-list-item-icon svg path' => 'fill: {{VALUE}}',
                    '{{WRAPPER}} .primekit-advanced-list-wrapper .primekit-advanced-list-item .primekit-advanced-list-item-icon i' => 'color: {{VALUE}}',
                ],
            ]
        );
        // icon BG Color
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'icon_background',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .primekit-advanced-list-wrapper .primekit-advanced-list-item .primekit-advanced-list-item-icon',
            ]
        );

        $this->end_controls_tab(); // End Normal Tab

        // Hover Tab
        $this->start_controls_tab(
            'icon_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'primekit-addons'),
            ]
        );

        // icon hover color 
        $this->add_control(
            'icon_hover_color',
            [
                'label' => esc_html__('Color', 'primekit-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primekit-advanced-list-wrapper .primekit-advanced-list-item:hover .primekit-advanced-list-item-icon svg path' => 'fill: {{VALUE}}',
                    '{{WRAPPER}} .primekit-advanced-list-wrapper .primekit-advanced-list-item:hover .primekit-advanced-list-item-icon i' => 'color: {{VALUE}}',
                ],
            ]
        );

        // Icon BG Hover Color
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'icon_hover_background',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .primekit-advanced-list-wrapper .primekit-advanced-list-item:hover .primekit-advanced-list-item-icon',
            ]
        );

        //Border hover color
        $this->add_control(
            'icon_border_hover_color',
            [
                'label' => esc_html__('Border Color', 'primekit-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primekit-advanced-list-wrapper .primekit-advanced-list-item:hover .primekit-advanced-list-item-icon' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab(); // End Hover Tab

        $this->end_controls_tabs(); // End Icon Style Tabs


        //Border
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'icon_border',
                'selector' => '{{WRAPPER}} .primekit-advanced-list-wrapper .primekit-advanced-list-item .primekit-advanced-list-item-icon',
                'separator' => 'before',
            ]
        );

        // Border Radius
        $this->add_responsive_control(
            'icon_border_radius',
            [
                'label' => esc_html__('Border Radius', 'primekit-addons'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', 'rem', 'custom'],
                'default' => [
                    'top' => 0,
                    'right' => 0,
                    'bottom' => 0,
                    'left' => 0,
                    'unit' => 'px',
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .primekit-advanced-list-wrapper .primekit-advanced-list-item .primekit-advanced-list-item-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // padding
        $this->add_responsive_control(
            'icon_padding',
            [
                'label' => esc_html__('Padding', 'primekit-addons'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', 'rem', 'custom'],
                'default' => [
                    'top' => 10,
                    'right' => 10,
                    'bottom' => 10,
                    'left' => 10,
                    'unit' => 'px',
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .primekit-advanced-list-wrapper .primekit-advanced-list-item .primekit-advanced-list-item-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section(); // End Icon Style Section

        // Start Image Style Section
        $this->start_controls_section(
            'image_style_section',
            [
                'label' => esc_html__('Image', 'primekit-addons'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]

        );

        //Width
        $this->add_responsive_control(
            'image_width',
            [
                'label' => esc_html__('Width', 'primekit-addons'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 40,
                ],
                'selectors' => [
                    '{{WRAPPER}} .primekit-advanced-list-wrapper .primekit-advanced-list-item-img img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        //Border
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'selector' => '{{WRAPPER}} .primekit-advanced-list-wrapper .primekit-advanced-list-item-img img',
            ]
        );

        // Border Radius
        $this->add_responsive_control(
            'image_border_radius',
            [
                'label' => esc_html__('Border Radius', 'primekit-addons'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', 'rem', 'custom'],
                'default' => [
                    'top' => 0,
                    'right' => 0,
                    'bottom' => 0,
                    'left' => 0,
                    'unit' => 'px',
                    'isLinked' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .primekit-advanced-list-wrapper .primekit-advanced-list-item-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section(); // End Image Style Section

    }

    /**
     * Render the widget output on the frontend.
     */
    protected function render()
    {
        include 'RenderView.php';
    }


}
