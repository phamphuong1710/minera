<?php 
namespace Elementor;

/**
 * 
 */
class Widget_Minera_Accordion extends Widget_Base
{
	public function get_name()
	{
		return "minera_accordion";
	}


	public function get_title($value='')
	{
		return esc_html__( 'Minera Accordion', 'minera' );
	}


	public function get_icon()
	{
		return "fa fa-minus-square";
	}

	public function get_keyworks()
	{
		return [ 'accordion', 'tab', 'toggle', 'minera' ];
	}

	public function get_categories()
	{
		return [ 'minera_category' ];
	}



	public function get_script_depends()
	{
		return [ 'accordion-js' ];
	}


	protected function _register_controls()
	{
		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( 'Accordion', 'minera' )
			]
		);


		$repeater =  new Repeater();

		$repeater->add_control(
			'tab_title',
			[
				'label'       => esc_html__( 'Title & Content', 'minera' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Accordion Title', 'minera' ),
				'dynamic'     => [
					'active' => true
				],
				'label_block' =>true
			]
		);

		$repeater->add_control(
			'tab_content',
			[
				'label'       => esc_html__( 'Content', 'minera' ),
				'type'        => Controls_Manager::WYSIWYG,
				'default'     => esc_html__( 'Accordion Content', 'minera' ),
				'show_label'  => true
			]
		);


		$this->add_control(
			'tabs',
			[
				'label'         => esc_html__( 'Accordion Items', 'minera' ),
				'type'          => Controls_Manager::REPEATER,
				'fields'        => $repeater->get_controls(),
				'default'       => [
					[
						'tab_title'   => esc_html__( 'Accordion 1', 'minera' ),
						'tab_content' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.​', 'minera' )
					],
					[
						'tab_title'   => esc_html__( 'Accordion 2', 'minera' ),
						'tab_content' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.​', 'minera' )
					],
					[
						'tab_title'   => esc_html__( 'Accordion 3', 'minera'),
						'tab_content' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.​', 'minera' )
					]
				],
				'title_field'  => '{{{ tab_title }}}'
			]
		);

		$this->add_control(
			'view',
			[
				'label'       => esc_html__( 'view', 'minera' ),
				'type'        => Controls_Manager::HIDDEN,
				'default'     => 'traditional'
			]
		);

		$this->add_control(
			'icon',
			[
				'label'     => esc_html__( 'Icon', 'minera' ),
				'type'      => Controls_Manager::ICON,
				'default'   => 'fa fa-plus',
				'separator' => 'before'
			]
		);


		$this->add_control(
			'icon_active',
			[
				'label'     => esc_html__( 'Active Icon', 'minera' ),
				'type'      => Controls_Manager::ICON,
				'default'   => 'fa fa-minus',
				'condition' => [
					'icon!' => ''
				]
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'      => esc_html__( 'Title Tag', 'minera' ),
				'type'       => Controls_Manager::SELECT,
				'options'    => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
				],
				'default'    => 'h3',
				'separator'  => 'before'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_accordion',
			[
				'label' => esc_html__( 'Accordion', 'minera' ),
				'tab'  => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'border_width',
			[
				'label'      => esc_html__( 'Border Width', 'minera' ),
				'type'       => Controls_Manager::SLIDER,
				'range'      => [
					'px'  => [
						'min'   => 0,
						'max'   => 10
					]

				],
				'selectors'  => [
					'{{WRAPPER}} .minera-accordion ' => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .minera-accordion .minera-accordion-item:not(:last-child)' => 'border-bottom-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .minera-accordion .minera-title-item:not(:last-child)' => 'border-bottom-width: {{SIZE}}{{UNIT}};'

				]
			]
		);

		$this->add_control(
			'border_color',
			[
				'label'      => esc_html__( 'Border Color', 'minera' ),
				'type'       => Controls_Manager::COLOR,
				'selectors'  => [
					'{{WRAPPER}} .minera-accordion'  => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .minera-accordion .minera-accordion-item:not(:last-child)' => 'border-bottom-color: {{VALUE}};',
					'{{WRAPPER}} .minera-accordion .minera-title-item:not(:last-child)' => 'border-bottom-color: {{VALUE}};'
				],
				'default'    => '#222'
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_style_title',
			[
				'label'       => esc_html__( 'Title', 'minera' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_background',
			[
				'label'      => esc_html__( 'Background', 'minera' ),
				'type'       => Controls_Manager::COLOR,
				'selectors'  => [
					'{{WRAPPER}} .minera-accordion .minera-title-item' => 'background-color: {{VALUE}}'
				]
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'      => esc_html__( 'Color', 'minera' ),
				'type'       => Controls_Manager::COLOR,
				'selectors'  => [
					'{{WRAPPER}} .minera-accordion .minera-title-item .minera-tab-title' => 'color: {{VALUE}}'
				],
				'scheme'     => [
					'type'   => Scheme_Color::get_type(),
					'value'  => Scheme_Color::COLOR_3
				]
			]
		);

		$this->add_control(
			'title_color_active',
			[
				'label'      => esc_html__( 'Color Active', 'minera' ),
				'type'       => Controls_Manager::COLOR,
				'selectors'  => [
					'{{WRAPPER}} .minera-accordion .minera-title-item.accordion-item-active .minera-tab-title' => 'color: {{VALUE}}'
				],
				'scheme'     => [
					'type'   => Scheme_Color::get_type(),
					'value'  => Scheme_Color::COLOR_3
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .minera-accordion .minera-title-item',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->add_responsive_control(
			'title_padding',
			[
				'label'      => esc_html__( 'Padding', 'minera' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .minera-accordion .minera-title-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}'
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'icon_tab',
			[
				'label'      => esc_html__( 'Icon', 'minera' ),
				'tab'       => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'color_icon',
			[
				'label'      => esc_html__( 'Color', 'minera' ),
				'type'       => Controls_Manager::COLOR,
				'default'    => '#222',
				'selectors'  => [
					'{{WRAPPER}} .minera-accordion .minera-title-item .elementor-accordion-icon-closed' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'icon_color_active',
			[
				'label'      => esc_html__( 'Color Active', 'minera' ),
				'type'       => Controls_Manager::COLOR,
				'selectors'  => [
					'{{WRAPPER}} .minera-accordion .minera-title-item.accordion-item-active .minera-tab-title .elementor-accordion-icon-opened' => 'color: {{VALUE}};'
				],
				'scheme'     => [
					'type'   => Scheme_Color::get_type(),
					'value'  => Scheme_Color::COLOR_3
				]
			]
		);


		$this->add_control(
			'align_icon',
			[
				'label'       => esc_html__( 'Align', 'minera' ),
				'type'        => Controls_Manager::CHOOSE,
				'options'     => [
					'left'  => [
						'title'  => esc_html__( 'Left', 'minera' ),
						'icon'   => 'fa fa-align-left'
					],
					'right' => [
						'title'  => esc_html__( 'Right','minera' ),
						'icon'   => 'fa fa-align-right'
					]
				],
				'default'   => 'left',
				'condition' => [ 'icon!' => '' ],
				'selectors' => [ '{{WRAPPER}} .minera-accordion .minera-title-item .minera-tab-title .minera-accordion-icon' => 'float: {{VALUE}};' ]
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_content',
			[
				'label'       => esc_html__( 'Content', 'minera' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'content_background',
			[
				'label'      => esc_html__( 'Background', 'minera' ),
				'type'       => Controls_Manager::COLOR,
				'selectors'  => [
					'{{WRAPPER}} .minera-accordion .minera-content-item' => 'background-color: {{VALUE}}'
				]
			]
		);

		$this->add_control(
			'content_color',
			[
				'label'      => esc_html__( 'Color', 'minera' ),
				'type'       => Controls_Manager::COLOR,
				'selectors'  => [
					'{{WRAPPER}} .minera-accordion .minera-content-item' => 'color: {{VALUE}}'
				],
				'scheme'     => [
					'type'   => Scheme_Color::get_type(),
					'value'  => Scheme_Color::COLOR_3
				]
			]
		);

		$this->add_control(
			'content_color_active',
			[
				'label'      => esc_html__( 'Color Active', 'minera' ),
				'type'       => Controls_Manager::COLOR,
				'selectors'  => [
					'{{WRAPPER}} .minera-accordion .minera-accordion-item.minera-accordion-active .minera-content-item ' => 'color: {{VALUE}}'
				],
				'scheme'     => [
					'type'   => Scheme_Color::get_type(),
					'value'  => Scheme_Color::COLOR_3
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'content_typography',
				'selector' => '{{WRAPPER}} .minera-accordion .minera-content-item',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->add_responsive_control(
			'content_padding',
			[
				'label'      => esc_html__( 'Padding', 'minera' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .minera-accordion .minera-content-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}'
				]
			]
		);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();

		?>
		<div class="minera-accordion">
		<?php

		foreach ($settings[ 'tabs' ] as $key => $value) {
		?>

			<div class="minera-accordion-item">
				<div id="minera-title-item-<?php echo $key ?>" class="minera-title-item">
					<?php echo '<'.$settings['title_tag'].' class= "minera-tab-title" >' ?>
						<?php echo ($settings[ 'icon' ]) ? '<i class="elementor-accordion-icon-closed minera-accordion-icon '.$settings['icon'].'"></i><i class="elementor-accordion-icon-opened minera-accordion-icon '.$settings['icon_active'].'"></i>' : ''; ?>
						<?php echo esc_html( $value['tab_title'] ); ?>
					<?php echo '</'.$settings['title_tag'].'>' ?>
				</div>
				<div id="minera-content-item-<?php echo $key ?>" class="minera-content-item">
					<?php echo esc_html( $value[ 'tab_content' ] ) ?>
				</div>
			</div>

		<?php
		}

		?>
		</div>

		<?php
	}



	




}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Minera_Accordion() );