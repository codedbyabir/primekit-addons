<?php

namespace PrimeKit\Frontend\Elementor\Widgets\CTA;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;

class Main extends Widget_Base
{
    public function get_name()
    {
        return 'primekit-cta';
    }

    public function get_title()
    {
        return esc_html__('Call To Action', 'primekit-addons');
    }

    public function get_icon()
    {
        return 'eicon-call-to-action primekit-addons-icon';
    }

    public function get_categories()
    {
        return ['primekit-category'];
    }

    public function get_keywords()
    {
        return ['prime', 'cta', 'call to action', 'call'];
    }

    /**
     * Register the widget controls.
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'primekit_elementor_cta_setting',
            [
                'label' => esc_html__('Contents', 'primekit-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        // Sub Heading Control
        $this->add_control(
            'primekit_cta_sub_heading',
            [
                'label' => esc_html__('Sub Heading', 'primekit-addons'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__('Type your sub heading here', 'primekit-addons'),
                'label_block' => true,
            ]
        );

        // Heading Control
        $this->add_control(
            'primekit_cta_heading',
            [
                'label' => esc_html__('Heading', 'primekit-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Lets deliver the right solution for your', 'primekit-addons'),
                'placeholder' => esc_html__('Type your heading here', 'primekit-addons'),
                'label_block' => true,
            ]
        );

        // Description Control
        $this->add_control(
            'primekit_cta_description',
            [
                'label' => esc_html__('Description', 'primekit-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('onsectetur adipiscing elit pellentesque habitant morbi tristique senectus. Vestibulum mattis
                velit sed ullamcorper morbi. At erat  pellentesque.', 'primekit-addons'),
                'placeholder' => esc_html__('Type your description here', 'primekit-addons'),
                'label_block' => true,
            ]
        );

        // First Button text
        $this->add_control(
            'primekit_cta_button_text_one',
            [
                'label' => esc_html__('Button 1 Text', 'primekit-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Get Started', 'primekit-addons'),
                'placeholder' => esc_html__('Type your button text here', 'primekit-addons'),
                'label_block' => true,

            ]
        );
        // First Button Link
        $this->add_control(
            'primekit_cta_button_link_one',
            [
                'label' => esc_html__('Button 1 Link', 'primekit-addons'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'primekit-addons'),
                'show_external' => true,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );

        // Second Button text
        $this->add_control(
            'primekit_cta_button_text_two',
            [
                'label' => esc_html__('Button 2 Text', 'primekit-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Contact Us', 'primekit-addons'),
                'placeholder' => esc_html__('Type your button text here', 'primekit-addons'),
                'label_block' => true,
            ]
        );

        // Second Button Link
        $this->add_control(
            'primekit_cta_button_link_two',
            [
                'label' => esc_html__('Button 2 Link', 'primekit-addons'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'primekit-addons'),
                'show_external' => true,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );
        $this->end_controls_section(); // End Section


        // Ribbon Section
        $this->start_controls_section(
            'primekit_cta_ribbon_section',
            [
                'label' => esc_html__('Ribbon', 'primekit-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Rabbon Switch
        $this->add_control(
            'primekit_cta_ribbon_enable',
            [
                'label' => esc_html__('Enable Ribbon', 'primekit-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'primekit-addons'),
                'label_off' => esc_html__('No', 'primekit-addons'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        // Rabbon Text
        $this->add_control(
            'primekit_cta_ribbon_text',
            [
                'label' => esc_html__('Ribbon Text', 'primekit-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Most popular', 'primekit-addons'),
                'placeholder' => esc_html__('Type your ribbon text', 'primekit-addons'),
                'label_block' => true,
                'condition' => [
                    'primekit_cta_ribbon_enable' => 'yes',
                ],
            ]
        );

        // Rabbon Position 
        $this->add_control(
            'primekit_cta_ribbon_position',
            [
                'label' => esc_html__('Ribbon Position', 'primekit-addons'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'primekit-addons'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'primekit-addons'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'right',
                'toggle' => true,
                'condition' => [
                    'primekit_cta_ribbon_enable' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        // Start Style Tab
        $this->start_controls_section(
            'primekit_cta_style_section',
            [
                'label' => esc_html__('CTA Box', 'primekit-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // Box Padding
        $this->add_responsive_control(
            'primekit_cta_box_padding',
            [
                'label' => esc_html__('Padding', 'primekit-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .primekit-cta-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        // Box Background Normal
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'primekit_cta_box_background_normal',
                'label' => esc_html__('Box Background', 'primekit-addons'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .primekit-cta-area:before',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__('Box Background', 'primekit-addons'),
                    ]
                ]
            ]
        );

        // Zoom Effect Disable Field
        $this->add_control(
            'primekit_cta_zoom_effect_disable',
            [
                'label' => esc_html__('Disable Zoom Effect', 'primekit-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'primekit-addons'),
                'label_off' => esc_html__('No', 'primekit-addons'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        //box border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'primekit_cta_box_border',
                'label' => esc_html__('Box Border', 'primekit-addons'),
                'selector' => '{{WRAPPER}} .primekit-cta-area',
            ]
        );
        $this->add_responsive_control(
            'primekit_cta_box_border_radius',
            [
                'label' => esc_html__('Border Radius', 'primekit-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .primekit-cta-area' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        // Content Alignment Control
        $this->add_responsive_control(
            'primekit_cta_content_alignment',
            [
                'label' => esc_html__('Content Alignment', 'primekit-addons'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'primekit-addons'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'primekit-addons'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'primekit-addons'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .primekit-cta-content-area .primekit-cta-heading' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .primekit-cta-content-area .primekit-cta-description' => 'text-align: {{VALUE}};',
                ],
                'toggle' => true,
            ]
        );

        //end box style tab
        $this->end_controls_section();
        // Start Section for Alignment
        $this->start_controls_section(
            'primekit_elementor_cta_alignment',
            [
                'label' => esc_html__('Alignment', 'primekit-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        // Content Direction
        $this->add_responsive_control(
            'primekit_cta_content_direction',
            [
                'label' => esc_html__('Content Direction', 'primekit-addons'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'row' => [
                        'title' => esc_html__('Row', 'primekit-addons'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'row-reverse' => [
                        'title' => esc_html__('Row Reverse', 'primekit-addons'),
                        'icon' => 'eicon-h-align-right',
                    ],
                    'column' => [
                        'title' => esc_html__('Column', 'primekit-addons'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'column-reverse' => [
                        'title' => esc_html__('Column Reverse', 'primekit-addons'),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .primekit-cta-area' => 'flex-direction: {{VALUE}};',
                ],
            ]
        );

        // Justify Content Control
        $this->add_responsive_control(
            'primekit_cta_area_justify_content',
            [
                'label' => esc_html__('Justify Content', 'primekit-addons'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => true,
                'options' => [
                    'flex-start' => [
                        'title' => esc_html__('Start', 'primekit-addons'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'primekit-addons'),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'flex-end' => [
                        'title' => esc_html__('End', 'primekit-addons'),
                        'icon' => 'eicon-h-align-right',
                    ],
                    'space-between' => [
                        'title' => esc_html__('Space Between', 'primekit-addons'),
                        'icon' => 'eicon-flex eicon-justify-space-between-h',
                    ],
                    'space-around' => [
                        'title' => esc_html__('Space Around', 'primekit-addons'),
                        'icon' => 'eicon-flex eicon-justify-space-around-h',
                    ],
                    'space-evenly' => [
                        'title' => esc_html__('Space Evenly', 'primekit-addons'),
                        'icon' => 'eicon-flex eicon-justify-space-evenly-h',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .primekit-cta-area' => 'justify-content: {{VALUE}};',
                ],
                'condition' => [
                    'primekit_cta_content_direction' => ['row', 'row-reverse'],
                ],
            ]
        );

        // Align Items Control for row
        $this->add_responsive_control(
            'primekit_cta_area_align_items_row',
            [
                'label' => esc_html__('Align Items', 'primekit-addons'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => esc_html__('Start', 'primekit-addons'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'primekit-addons'),
                        'icon' => 'eicon-v-align-middle',
                    ],
                    'flex-end' => [
                        'title' => esc_html__('End', 'primekit-addons'),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .primekit-cta-area' => 'align-items: {{VALUE}};',
                ],
                'condition' => [
                    'primekit_cta_content_direction' => ['row', 'row-reverse'],
                ],
            ]
        );

        // Align Items Control for coumn
        $this->add_responsive_control(
            'primekit_cta_area_align_items_column',
            [
                'label' => esc_html__('Align Items', 'primekit-addons'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => esc_html__('Start', 'primekit-addons'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'primekit-addons'),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'flex-end' => [
                        'title' => esc_html__('End', 'primekit-addons'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .primekit-cta-area' => 'align-items: {{VALUE}};',
                ],
                'condition' => [
                    'primekit_cta_content_direction' => ['column', 'column-reverse'],
                ],
            ]
        );

        // CTA Area Gap between content and button
        $this->add_responsive_control(
            'primekit_cta_area_gap',
            [
                'label' => esc_html__('Gap Between Content/Button', 'primekit-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => 0.1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .primekit-cta-area' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // button direction
        $this->add_responsive_control(
            'primekit_cta_button_direction',
            [
                'label' => esc_html__('Button Direction', 'primekit-addons'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'row' => [
                        'title' => esc_html__('Row (Horizontal)', 'primekit-addons'),
                        'icon' => 'eicon-arrow-right',
                    ],
                    'column' => [
                        'title' => esc_html__('Column (Vertical)', 'primekit-addons'),
                        'icon' => 'eicon-arrow-down',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .primekit-cta-area .primekit-cta-button-area' => 'flex-direction: {{VALUE}};',
                ]
            ]
        );
        //button gap
        $this->add_responsive_control(
            'primekit_cta_button_gap',
            [
                'label' => esc_html__('Button Gap', 'primekit-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .primekit-cta-area .primekit-cta-button-area' => 'gap: {{SIZE}}{{UNIT}};',
                ]
            ]
        );

        // Button Alignment
        $this->add_responsive_control(
            'primekit_cta_button_alignment',
            [
                'label' => esc_html__('Button Alignment', 'primekit-addons'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => true,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'primekit-addons'),
                        'icon' => 'eicon-justify-start-h',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'primekit-addons'),
                        'icon' => 'eicon-justify-center-h',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'primekit-addons'),
                        'icon' => 'eicon-justify-end-h',
                    ],
                    'space-between' => [
                        'title' => esc_html__('Space Between', 'primekit-addons'),
                        'icon' => 'eicon-justify-space-between-h',
                    ],
                    'space-around' => [
                        'title' => esc_html__('Space Around', 'primekit-addons'),
                        'icon' => 'eicon-justify-space-around-h',
                    ],
                    'space-evenly' => [
                        'title' => esc_html__('Space Evenly', 'primekit-addons'),
                        'icon' => 'eicon-justify-space-evenly-h',
                    ],

                ],
                'selectors' => [
                    '{{WRAPPER}} .primekit-cta-button-area' => 'justify-content: {{VALUE}};',
                ],
                'condition' => [
                    'primekit_cta_content_direction' => ['column', 'reverse-column'],
                ],

            ]
        );

        $this->end_controls_section();
        // Heading style tab
        $this->start_controls_section(
            'primekit_cta_heading_style_section',
            [
                'label' => esc_html__('Heading', 'primekit-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Sub Heading typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'primekit_cta_sub_heading_typography',
                'label' => esc_html__('Sub Heading Typography', 'primekit-addons'),
                'selector' => '{{WRAPPER}} .primekit-cta-content-area .primekit-cta-heading h4',
            ]
        );
        // Sub Heading Color
        $this->add_control(
            'primekit_cta_sub_heading_color',
            [
                'label' => esc_html__('Sub Heading Color', 'primekit-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .primekit-cta-content-area .primekit-cta-heading h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        // Sub Heading Bottom Spacing
        $this->add_responsive_control(
            'primekit_cta_sub_heading_spacing',
            [
                'label' => esc_html__('Sub Heading Bottom Spacing', 'primekit-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px', '%'],
                'default' => [
                    'unit' => 'px',
                    'size' => 10,
                ],
                'selectors' => [
                    '{{WRAPPER}} .primekit-cta-content-area .primekit-cta-heading h4' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Heading typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'primekit_cta_heading_typography',
                'label' => esc_html__('Heading Typography', 'primekit-addons'),
                'selector' => '{{WRAPPER}} .primekit-cta-content-area .primekit-cta-heading h2',
            ]
        );

        // Heading Color
        $this->add_control(
            'primekit_cta_heading_color',
            [
                'label' => esc_html__('Heading Color', 'primekit-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .primekit-cta-content-area .primekit-cta-heading h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Heading Bottom Spacing
        $this->add_responsive_control(
            'primekit_cta_heading_bottom_spacing',
            [
                'label' => esc_html__('Heading Bottom Spacing', 'primekit-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 5,
                        'step' => 0.1,
                    ],
                ],
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .primekit-cta-content-area .primekit-cta-heading h2' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        //end heading style tab
        $this->end_controls_section();

        // Description style tab
        $this->start_controls_section(
            'primekit_cta_desc_style_section',
            [
                'label' => esc_html__('Description', 'primekit-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Description typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'primekit_cta_description_typography',
                'label' => esc_html__('Description Typography', 'primekit-addons'),
                'selector' => '{{WRAPPER}} .primekit-cta-content-area .primekit-cta-description p, {{WRAPPER}} .primekit-cta-content-area .primekit-cta-description',
            ]
        );

        // Description Color
        $this->add_control(
            'primekit_cta_description_color',
            [
                'label' => esc_html__('Description Color', 'primekit-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .primekit-cta-content-area .primekit-cta-description p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .primekit-cta-content-area .primekit-cta-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Description Bottom Spacing
        $this->add_responsive_control(
            'primekit_cta_description_bottom_spacing',
            [
                'label' => esc_html__('Description Bottom Spacing', 'primekit-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 5,
                        'step' => 0.1,
                    ],
                ],
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .primekit-cta-content-area .primekit-cta-description' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ],
        );

        //end description style tab
        $this->end_controls_section();

        // Button Style
        $this->start_controls_section(
            'primekit_cta_button_style_section',
            [
                'label' => esc_html__('Button', 'primekit-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Button Width
        $this->add_responsive_control(
            'primekit_cta_button_width',
            [
                'label' => esc_html__('Width', 'primekit-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => 0.1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .primekit-cta-button-area .primekit-cta-button' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Button Height
        $this->add_responsive_control(
            'primekit_cta_button_height',
            [
                'label' => esc_html__('Height', 'primekit-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 5,
                        'step' => 0.1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .primekit-cta-button-area .primekit-cta-button' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Border Group
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'primekit_cta_button_border',
                'label' => esc_html__('Button Border', 'primekit-addons'),
                'selector' => '{{WRAPPER}} .primekit-cta-button-area .primekit-cta-button',
            ]
        );

        // Border Radius
        $this->add_responsive_control(
            'primekit_cta_button_border_radius',
            [
                'label' => esc_html__('Border Radius', 'primekit-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .primekit-cta-button-area .primekit-cta-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Button Typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'primekit_cta_button_typography',
                'label' => esc_html__('Button Typography', 'primekit-addons'),
                'selector' => '{{WRAPPER}} .primekit-cta-button-area .primekit-cta-button',
            ]
        );

        $this->start_controls_tabs('primekit_cta_button_style_tabs');

        // Normal State Tab
        $this->start_controls_tab(
            'primekit_cta_button_normal',
            [
                'label' => esc_html__('Normal', 'primekit-addons'),
            ]
        );

        // Text Color
        $this->add_control(
            'primekit_cta_button_text_color',
            [
                'label' => esc_html__('Text Color', 'primekit-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .primekit-cta-button-area a.primekit-cta-button' => 'color: {{VALUE}};',
                ],
            ]
        );
        // Button Background
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'primekit_cta_button_background_color',
                'label' => esc_html__('Button Background', 'primekit-addons'),
                'types' => ['classic', 'gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} .primekit-cta-button-area a.primekit-cta-button',
            ]
        );

        $this->end_controls_tab(); // end normal tab

        // Hover State Tab
        $this->start_controls_tab(
            'primekit_cta_button_hover',
            [
                'label' => esc_html__('Hover', 'primekit-addons'),
            ]
        );
        // Text Color
        $this->add_control(
            'primekit_cta_button_hover_text_color',
            [
                'label' => esc_html__('Text Color', 'primekit-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primekit-cta-button-area a.primekit-cta-button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Background
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'primekit_cta_button_hover_background',
                'label' => esc_html__('Hover Background', 'primekit-addons'),
                'types' => ['classic', 'gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} .primekit-cta-button-area a.primekit-cta-button:hover',
            ]
        );
        // Border Color
        $this->add_control(
            'primekit_cta_button_hover_border_color',
            [
                'label' => esc_html__('Border Color', 'primekit-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primekit-cta-button-area a.primekit-cta-button:hover' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'primekit_cta_button_border_border!' => 'none',
                ],
            ]
        );

        $this->end_controls_tab(); // end hover tab

        $this->end_controls_tabs(); // end tabs

        $this->end_controls_section(); // end button style

        $this->start_controls_section(
            'primekit_cta_ribbon_style',
            [
                'label' => esc_html__('Ribbon Style', 'primekit-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'primekit_cta_ribbon_enable' => 'yes',
                ],
            ]
        );

        // Ribbon Text Color
        $this->add_control(
            'primekit_cta_ribbon_text_color',
            [
                'label' => esc_html__('Text Color', 'primekit-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .primekit-cta-ribbon-area .primekit-cta-ribbon-text p' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Ribbon Typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'primekit_cta_ribbon_typography',
                'selector' => '{{WRAPPER}} .primekit-cta-ribbon-area .primekit-cta-ribbon-text p',
            ]
        );

        // Ribbon Background
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'primekit_cta_ribbon_background',
                'label' => esc_html__('Background', 'primekit-addons'),
                'types' => ['classic', 'gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} .primekit-cta-ribbon-area .primekit-cta-ribbon-text',
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render the widget output on the frontend.
     */
    protected function render()
    {
        include 'RenderView.php';
    }
}
