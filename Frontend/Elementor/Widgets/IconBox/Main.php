<?php

namespace PrimeKit\Frontend\Elementor\Widgets\IconBox;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

/**
 * Elementor List Widget.
 */
class Main extends Widget_Base
{
	public function get_name()
	{
		return 'primekit-icon-box';
	}

	public function get_title()
	{
		return esc_html__('Icon Box', 'primekit-addons');
	}

	public function get_icon()
	{
		return 'eicon-icon-box primekit-addons-icon';
	}

	public function get_categories()
	{
		return ['primekit-category'];
	}

	public function get_keywords()
	{
		return ['prime', 'icon', 'box'];
	}

	/**
	 * Register list widget controls.
	 */
	protected function register_controls()
	{
		//Template
		$this->start_controls_section(
			'primekit-elementor-icon-box',
			[
				'label' => esc_html__('Content', 'primekit-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		//select icon box settins 

		$this->add_control(
			'primekit_elementor_icon_box_style',
			[
				'label' => esc_html__('Choose Style', 'primekit-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'style-one',
				'options' => [
					'style-one'  => esc_html__('Style One', 'primekit-addons'),
					'style-two'  => esc_html__('Style Two', 'primekit-addons'),
					'style-three'  => esc_html__('Style Three', 'primekit-addons'),
				],
			]
		);


		$this->add_control(
			'primekit_elementor_icon_box_icon_shape',
			[
				'label' => esc_html__('Icon Shape', 'primekit-addons'),
				'type' => Controls_Manager::ICONS,
				'condition' => [
					'primekit_elementor_icon_box_style' => 'style-one',
				],


			]
		);
		$this->add_control(
			'primekit_elementor_icon_box_icon',
			[
				'label' => esc_html__('Icon', 'primekit-addons'),
				'type' => Controls_Manager::ICONS,

			]
		);
		$this->add_control(
			'primekit_elementor_icon_box_title',
			[
				'label' => esc_html__('Title', 'primekit-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Responsive Design', 'primekit-addons'),
				'placeholder' => esc_html__('Type your title here', 'primekit-addons'),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);
		$this->add_control(
			'primekit_elementor_icon_box_desc',
			[
				'label' => esc_html__('Description', 'primekit-addons'),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__('Duis Aute Irure Dolor Reprehenderit In Voluptate Velit Esse Cillum Dolore Fugiat Nulla Pariatur', 'primekit-addons'),
				'placeholder' => esc_html__('Type your description here', 'primekit-addons'),
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'primekit_elementor_icon_box_button_text',
			[
				'label' => esc_html__('Button Text', 'primekit-addons'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Read More', 'primekit-addons'),
				'placeholder' => esc_html__('Type your button text here', 'primekit-addons'),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'primekit_elementor_icon_box_style' => 'style-one',
				],
			]
		);

		$this->add_control(
			'primekit_elementor_icon_box_button_link',
			[
				'label' => esc_html__('Button Link', 'primekit-addons'),
				'type' => Controls_Manager::URL,
				'default' => [
					'url' => '#',
				],
				'condition' => [
					'primekit_elementor_icon_box_style' => 'style-one',
				],
				'dynamic' => [
					'active' => true
				],
			]
		);
		// button alignment
		$this->add_responsive_control(
			'primekit_elementor_icon_box_button_align',
			[
				'label' => esc_html__('Button Alignment', 'primekit-addons'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
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
				'condition' => [
					'primekit_elementor_icon_box_style' => 'style-one',
				],
				'selectors' => [
					'{{WRAPPER}} .primekit-elementor-icon-box-button' => 'text-align: {{VALUE}};',
				],
			]
		);
		// button size slider
		$this->add_responsive_control(
			'primekit_elementor_icon_box_button_size',
			[
				'label' => esc_html__('Button Size', 'primekit-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => [
						'min' => 30,
						'max' => 400,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .primekit-elementor-icon-box-button a.primekit-elementor-button-link' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'primekit_elementor_icon_box_style' => 'style-one',
				],
			]
		);

		//PrimeKit Notice
		$this->add_control(
			'primekit_elementor_addons_notice',
			[
				'type' => \Elementor\Controls_Manager::NOTICE,
				'notice_type' => 'warning',
				'dismissible' => false,
				'heading' => esc_html__('Created by PrimeKit', 'primekit-addons'),
				'content' => esc_html__('This amazing widget is built with PrimeKit Addons, making it super easy to create beautiful and functional designs.', 'primekit-addons'),
			]
		);

		$this->end_controls_section(); // End the Feature option

		// box style
		$this->start_controls_section(
			'primekit_elementor_icon_box_area_style_section',
			[
				'label' => esc_html__('Box', 'primekit-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'primekit_elementor_icon_box_padding',
			[
				'label' => esc_html__('Padding', 'primekit-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'selectors' => [
					'{{WRAPPER}} .primekit-elementor-icon-box-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .primekit-single-icon-box-two-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .primekit-single-icon-box-three-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs(
			'primekit_elementor_icon_box_area_style_tabs',
			[
				'condition'	=> [
					'primekit_elementor_icon_box_style' => ['style-one', 'style-three'],
				],
			]
		);

		$this->start_controls_tab(
			'primekit_elementor_icon_box_area_style_normal_tab',
			[
				'label' => esc_html__('Normal', 'primekit-addons'),
			]
		);
		// box border (style three)
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'primekit_elementor_icon_box_area_border',
				'selector' => '{{WRAPPER}} .primekit-elementor-icon-box-area, {{WRAPPER}} .primekit-single-icon-box-two-area, {{WRAPPER}} .primekit-single-icon-box-three-area',
			]
		);
		$this->add_responsive_control(
			'primekit_elementor_icon_box_area_style_normal_radius',
			[
				'label' => esc_html__('Border Radius', 'primekit-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'selectors' => [
					'{{WRAPPER}} .primekit-elementor-icon-box-area' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .primekit-single-icon-box-two-area' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .primekit-single-icon-box-three-area' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]

		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'acb_elementor_box_area_bg',
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .primekit-elementor-icon-box-area, {{WRAPPER}} .primekit-single-icon-box-two-area, {{WRAPPER}} .primekit-single-icon-box-three-area',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'primekit_elementor_icon_box_area_style_hover_tab',
			[
				'label' => esc_html__('Hover', 'primekit-addons'),
			]
		);
		// box border (style three)
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'primekit_elementor_icon_box_area_border_hover',
				'selector' => '{{WRAPPER}} .primekit-elementor-icon-box-area:hover, {{WRAPPER}} .primekit-single-icon-box-two-area:hover, {{WRAPPER}} .primekit-single-icon-box-three-area:hover',
			]
		);
		$this->add_control(
			'primekit_elementor_icon_box_area_style_hover_radius',
			[
				'label' => esc_html__('Border Radius', 'primekit-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'default'	=> [
					'top' => '100',
					'right' => '0',
					'bottom' => '100',
					'left' => '0',
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .primekit-elementor-icon-box-area:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .primekit-single-icon-box-two-area:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .primekit-single-icon-box-three-area:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]

		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'acb_elementor_box_area_bg_hover',
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .primekit-elementor-icon-box-area:hover,{{WRAPPER}} .primekit-single-icon-box-two-area:hover,{{WRAPPER}} .primekit-single-icon-box-three-area:hover',
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();

		// icon style 
		$this->start_controls_section(
			'primekit_elementor_icon_box_style_section',
			[
				'label' => esc_html__('Icon', 'primekit-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		//icon size
		$this->add_responsive_control(
			'primekit_elementor_icon_box_icon_size',
			[
				'label' => esc_html__('Icon Size', 'primekit-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'range' => [
					'px' => [
						'max' => 150,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .primekit-single-icon-box-two-icon .primekit-ele-icon-box2-icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .primekit-single-icon-box-two-icon .primekit-ele-icon-box-hover svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .primekit-single-icon-box-three-area .primekit-ele-icon-box3-icon svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .primekit-elementor-icon-box-icon .primekit-ele-icon-box-hover i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .primekit-elementor-icon-box-icon .primekit-ele-icon-box-hover svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .primekit-single-icon-box-two-icon .primekit-ele-icon-box2-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .primekit-single-icon-box-three-area .primekit-ele-icon-box3-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			],
		);

		//icon background shape size
		$this->add_responsive_control(
			'primekit_elementor_icon_box_icon_bg_shape_size',
			[
				'label' => esc_html__('Shape Size', 'primekit-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'default' => [
					'unit' => 'px',
					'size' => 100,
				],
				'range' => [
					'px' => [
						'max' => 150,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .primekit-elementor-icon-box-icon .primekit-ele-icon-box-normal svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .primekit-elementor-icon-box-icon .primekit-ele-icon-box-normal i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition'	=> [
					'primekit_elementor_icon_box_style' => 'style-one',
				],
			],
		);

		$this->add_responsive_control(
			'primekit_elementor_icon_box_icon_indent',
			[
				'label' => esc_html__('Icon Spacing', 'primekit-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'range' => [
					'px' => [
						'max' => 150,
						'min' => -10,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .primekit-elementor-icon-box-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .primekit-single-icon-box-two-icon .primekit-ele-icon-box2-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .primekit-single-icon-box-three-area .primekit-single-icon-box-icons' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		//icon position indent
		$this->add_responsive_control(
			'primekit_elementor_icon_box_icon_positing_indent',
			[
				'label' => esc_html__('Icon Position', 'primekit-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'range' => [
					'px' => [
						'max' => 150,
						'min' => -100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .primekit-ele-icon-box-hover' => 'top: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .primekit-single-icon-box-three-area .primekit-single-icon-box-icons' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition'	=> [
					'primekit_elementor_icon_box_style' => ['style-one', 'style-three'],
				],
			]
		);
		// icon padding
		$this->add_responsive_control(
			'primekit_elementor_icon_box_icon_padding',
			[
				'label' => esc_html__('Icon Padding', 'primekit-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'selectors' => [
					'{{WRAPPER}} .primekit-single-icon-box-icons .primekit-ele-icon-box3-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'	=> [
					'primekit_elementor_icon_box_style' => 'style-three',
				],
			]
		);

		$this->start_controls_tabs(
			'primekit_elementor_icon_box_style_tabs'
		);

		$this->start_controls_tab(
			'primekit_elementor_icon_box_style_normal_tab',
			[
				'label' => esc_html__('Normal', 'primekit-addons'),
			]
		);
		$this->add_control(
			'primekit_elementor_icon_box_icon_stroke_color',
			[
				'label' => esc_html__('Shape Color', 'primekit-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .primekit-ele-icon-box-normal svg path' => 'stroke: {{VALUE}}',
					'{{WRAPPER}} .primekit-ele-icon-box-normal svg' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .primekit-ele-icon-box-normal i' => 'color: {{VALUE}}',
				],
				'condition'	=> [
					'primekit_elementor_icon_box_style' => 'style-one',
				],
			]
		);
		$this->add_control(
			'primekit_elementor_icon_box_icon_fill_color',
			[
				'label' => esc_html__('Icon Color', 'primekit-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .primekit-ele-icon-box-hover svg path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .primekit-ele-icon-box-hover i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .primekit-ele-icon-box2-icon svg path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .primekit-ele-icon-box3-icon svg path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .primekit-ele-icon-box2-icon i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .primekit-ele-icon-box3-icon i' => 'color: {{VALUE}}',
				],
			]
		);
		// icon background
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'primekit_elementor_icon_box_icon_bg',
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .primekit-single-icon-box-icons .primekit-ele-icon-box3-icon',
				'condition'	=> [
					'primekit_elementor_icon_box_style' => 'style-three',
				],
			]
		);
		// icon border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'primekit_elementor_icon_box_icon_border',
				'selector' => '{{WRAPPER}} .primekit-single-icon-box-icons .primekit-ele-icon-box3-icon',
				'condition'	=> [
					'primekit_elementor_icon_box_style' => 'style-three',
				],
			]
		);
		// icon border radius
		$this->add_responsive_control(
			'primekit_elementor_icon_box_icon_border_radius',
			[
				'label' => esc_html__('Border Radius', 'primekit-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'selectors' => [
					'{{WRAPPER}} .primekit-single-icon-box-icons .primekit-ele-icon-box3-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'	=> [
					'primekit_elementor_icon_box_style' => 'style-three',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'primekit_elementor_icon_box_style_hover_tab',
			[
				'label' => esc_html__('Hover', 'primekit-addons'),
			]
		);

		$this->add_control(
			'primekit_elementor_icon_box_icon_stroke_hover_color',
			[
				'label' => esc_html__('Shape Hover Color', 'primekit-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .primekit-elementor-icon-box-area:hover .primekit-ele-icon-box-normal svg path' => 'stroke: {{VALUE}}',
					'{{WRAPPER}} .primekit-elementor-icon-box-area:hover .primekit-ele-icon-box-normal svg' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .primekit-elementor-icon-box-area:hover .primekit-ele-icon-box-normal i' => 'color: {{VALUE}}',
				],
				'condition'	=> [
					'primekit_elementor_icon_box_style' => 'style-one',
				],
			]
		);
		$this->add_control(
			'primekit_elementor_icon_box_icon_fill_hover_color',
			[
				'label' => esc_html__('Icon Hover Color', 'primekit-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .primekit-elementor-icon-box-area:hover .primekit-ele-icon-box-hover svg path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .primekit-single-icon-box-two-area:hover .primekit-ele-icon-box2-icon svg path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .primekit-single-icon-box-three-area:hover .primekit-ele-icon-box3-icon svg path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .primekit-single-icon-box-two-area:hover .primekit-ele-icon-box2-icon i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .primekit-elementor-icon-box-area:hover .primekit-ele-icon-box-hover i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .primekit-single-icon-box-three-area:hover .primekit-ele-icon-box3-icon i' => 'color: {{VALUE}}',
				],
			]
		);
		// icon background
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'primekit_elementor_icon_box_icon_bg_hover',
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .primekit-single-icon-box-three-area:hover .primekit-single-icon-box-icons .primekit-ele-icon-box3-icon',
				'condition'	=> [
					'primekit_elementor_icon_box_style' => 'style-three',
				],
			]
		);
		// icon border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'primekit_elementor_icon_box_icon_border_hover',
				'selector' => '{{WRAPPER}} .primekit-single-icon-box-three-area:hover .primekit-single-icon-box-icons .primekit-ele-icon-box3-icon',
				'condition'	=> [
					'primekit_elementor_icon_box_style' => 'style-three',
				],
			]
		);
		// icon border radius
		$this->add_control(
			'primekit_elementor_icon_box_icon_border_radius_hover',
			[
				'label' => esc_html__('Border Radius', 'primekit-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'selectors' => [
					'{{WRAPPER}} .primekit-single-icon-box-three-area:hover .primekit-single-icon-box-icons .primekit-ele-icon-box3-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'	=> [
					'primekit_elementor_icon_box_style' => 'style-three',
				],
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section(); // end icon style

		// content style 
		$this->start_controls_section(
			'primekit_elementor_icon_box_content_style_section',
			[
				'label' => esc_html__('Content', 'primekit-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'primekit_elementor_icon_box_button_heading_indent',
			[
				'label' => esc_html__('Heading Spacing', 'primekit-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .primekit-elementor-icon-box-title' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'primekit_elementor_icon_box_button_content_indent',
			[
				'label' => esc_html__('Content Spacing', 'primekit-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .primekit-elementor-icon-box-desc' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'primekit_elementor_icon_box_title_typography',
				'label' => esc_html__('Title Typography', 'primekit-addons'),
				'selector' => '{{WRAPPER}} .primekit-elementor-icon-box-title',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'primekit_elementor_icon_box_text_typography',
				'selector' => '{{WRAPPER}} .primekit-elementor-icon-box-desc',
				'label' => esc_html__('Content Typography', 'primekit-addons'),
			]
		);


		$this->start_controls_tabs(
			'primekit_elementor_icon_box_content_style_tabs'
		);

		$this->start_controls_tab(
			'primekit_elementor_icon_box_content_style_normal_tab',
			[
				'label' => esc_html__('Normal', 'primekit-addons'),
			]
		);
		$this->add_control(
			'primekit_elementor_icon_box_icon_title_color',
			[
				'label' => esc_html__('Title Color', 'primekit-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .primekit-elementor-icon-box-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'primekit_elementor_icon_box_icon_text_color',
			[
				'label' => esc_html__('Text Color', 'primekit-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .primekit-elementor-icon-box-desc' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'primekit_elementor_icon_box_content_style_hover_tab',
			[
				'label' => esc_html__('Hover', 'primekit-addons'),
			]
		);
		$this->add_control(
			'primekit_elementor_icon_box_icon_title_hover_color',
			[
				'label' => esc_html__('Title Color', 'primekit-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .primekit-elementor-icon-box-area:hover .primekit-elementor-icon-box-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .primekit-single-icon-box-two-area:hover .primekit-elementor-icon-box-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .primekit-single-icon-box-three-area:hover .primekit-elementor-icon-box-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'primekit_elementor_icon_box_icon_text_hover_color',
			[
				'label' => esc_html__('Text Color', 'primekit-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .primekit-elementor-icon-box-area:hover .primekit-elementor-icon-box-desc' => 'color: {{VALUE}}',
					'{{WRAPPER}} .primekit-single-icon-box-two-area:hover .primekit-elementor-icon-box-desc' => 'color: {{VALUE}}',
					'{{WRAPPER}} .primekit-single-icon-box-three-area:hover .primekit-elementor-icon-box-desc' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section(); // end content style

		// button style 
		$this->start_controls_section(
			'primekit_elementor_icon_box_button_style_section',
			[
				'label' => esc_html__('Button', 'primekit-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'primekit_elementor_icon_box_style' => 'style-one',
				],
			]
		);
		$this->add_responsive_control(
			'primekit_elementor_icon_box_button_indent',
			[
				'label' => esc_html__('Spacing', 'primekit-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .primekit-elementor-icon-box-button a' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'primekit_elementor_icon_box_button_icon_indent',
			[
				'label' => esc_html__('Icon Spacing', 'primekit-addons'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .primekit-elementor-icon-box-button a i' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'primekit_elementor_icon_box_button_typography',
				'label' => esc_html__('Text Typography', 'primekit-addons'),
				'selector' => '{{WRAPPER}} .primekit-elementor-icon-box-button a',
			]
		);
		$this->add_responsive_control(
			'primekit_elementor_icon_box_button_padding',
			[
				'label' => esc_html__('Padding', 'primekit-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'selectors' => [
					'{{WRAPPER}} .primekit-elementor-icon-box-button a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'primekit_elementor_icon_box_button_order',
				'selector' => '{{WRAPPER}} .primekit-elementor-icon-box-button a',
				'label' => esc_html__('Border', 'primekit-addons'),
			]
		);
		$this->add_responsive_control(
			'primekit_elementor_icon_box_button_radius',
			[
				'label' => esc_html__('Border Radius', 'primekit-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'selectors' => [
					'{{WRAPPER}} .primekit-elementor-icon-box-button a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs(
			'primekit_elementor_icon_box_button_style_tabs'
		);

		$this->start_controls_tab(
			'primekit_elementor_icon_box_button_style_normal_tab',
			[
				'label' => esc_html__('Normal', 'primekit-addons'),
			]
		);

		$this->add_control(
			'primekit_elementor_icon_box_button_color',
			[
				'label' => esc_html__('Color', 'primekit-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .primekit-elementor-icon-box-button a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'primekit_elementor_icon_box_button_bg_color',
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .primekit-elementor-icon-box-button a',
				'label' => esc_html__('Background', 'primekit-addons'),
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'primekit_elementor_icon_box_button_style_hover_tab',
			[
				'label' => esc_html__('Hover', 'primekit-addons'),
			]
		);

		$this->add_control(
			'primekit_elementor_icon_box_btn_hover_color',
			[
				'label' => esc_html__('Color', 'primekit-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .primekit-elementor-icon-box-area:hover .primekit-elementor-icon-box-button a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'primekit_elementor_icon_box_btn_bg_hover',
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .primekit-elementor-icon-box-area:hover .primekit-elementor-icon-box-button a',
				'label' => esc_html__('Background', 'primekit-addons'),
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section(); // end content style

	}

	/**
	 * Render list widget output on the frontend.
	 */
	protected function render()
	{
		$primekit_settings = $this->get_settings_for_display();

		if ($primekit_settings['primekit_elementor_icon_box_style'] == 'style-one') {
			include 'RenderView.php';
		} elseif ($primekit_settings['primekit_elementor_icon_box_style'] == 'style-two') {
			include 'RenderView2.php';
		} elseif ($primekit_settings['primekit_elementor_icon_box_style'] == 'style-three') {
			include 'RenderView3.php';
		}
	}
}