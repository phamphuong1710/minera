<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor minera icon box widget.
 *
 * Elementor widget that displays an icon, a headline and a text.
 *
 * @since 1.0.0
 */

/**
 * 
 */
class Widget_Minera_Icon_Box extends Widget_Base
{
	
	public function get_name()
	{
		return "minera_icon_box";
	}


	public function get_title()
	{
		return __( 'Minera Icon Box', 'minera' );
	}

	public function get_icon()
	{
		return "fa fa-star-o";
	}

	public function get_categories()
	{
		return [ 'minera_category' ];
	}


	protected function _register_controls()
	{
		$this->start_controls_section(

			'section_icon',
			[
				'label'=> esc_html( 'Icon Box', 'minera' )
			]
		);

		$this->add_control(

			'icon',
			[

				'label'       => esc_html__( 'Icon', 'minera' ),
				'type'        => Controls_Manager::ICON,
				'input_type'  => 'icon',
				'placeholder' => 'fa fa-star',
				'default'     => 'fa fa-star'

			]
		);

		$this->add_control(
			'view',
			[
				'label'        => esc_html__( 'View', 'minera' ),
				'type'         => Controls_Manager::SELECT,
				'options'      => [
					'default' => esc_html__( 'Default', 'minera' ),
					'stacked' => esc_html__( 'Stacked', 'minera' ),
					'framed'  => esc_html__(  'Framed', 'minera' )
				],
				'default'      => 'default',
				'prefix_class' => 'elementor-view-',
				'condition'    => [
					'icon!' => ''
				],
			]
		);


		$this->add_control(
			'shape',
			[
				'label'        => esc_html__( 'Shape', 'minera' ),
				'type'         => Controls_Manager::SELECT,
				'options'      => [
					'circle' => esc_html__( 'Circle', 'minera' ),
					'square' => esc_html__( 'Square', 'minera' )
				],
				'default'      => 'circle',
				'condition'    => [
					'view!' => 'default',
					'icon!' => ''
				],
				'prefix_class' => 'elementor-shape-'
			]
		);


		$this->add_control(

			'title_header',
			[
				'label'       => esc_html__( "Title & Description", 'minera' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => '',
				'placeholder' => esc_html__('Enter your title', 'minera' ),
				'labek_block' => true
			]
		);


		$this->add_control(

			'description',
			[
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter Description', 'minera' ),
				'show_lable'  => false
			]

		);


		$this->add_control(

			'link',
			[
				'label'       => esc_html__( 'Link To', 'minera' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://yourlink.com', 'minera' )
			]
		);


		$this->add_control(

			'position',
			[
				'label'        => esc_html__( 'Icon Position', 'minera' ),
				'type'         => Controls_Manager::CHOOSE,
				'default'      => 'center',
				'options'      => [
					'left'  => [
						'title' => esc_html__( 'Left', 'minera' ),
						'icon'  => 'fa fa-align-left'
					],

					'center'  => [
						'title' => esc_html__( 'Center', 'minera' ),
						'icon'  => 'fa fa-align-center'
					],

					'right'=> [
						'title' => esc_html__( 'right', 'minera' ),
						'icon'  => 'fa fa-align-right'
					]
				],
				'prefix_class' => 'elementor-position-',
				'toggle'       => false,
				'condition'    => [ 'icon!' => '' ],
				'selectors'       => [ '{{WRAPPER}} .minera-icon-box .minera-icon' => 'text-align: {{VALUE}}' ]
			]
			
		);


		$this->add_control(

			'title_size',
			[
				'label'     => esc_html__( 'Title HTML Tag', 'minera' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [

					'h1'   => 'H1',
					'h2'   => 'H2',
					'h3'   => 'H3',
					'h4'   => 'H4',
					'h5'   => 'H5',
					'h6'   => 'H6',
					'span' => 'span'
				],
				'default'  => 'h3'
			]
		);


		$this->end_controls_section();


		$this->start_controls_section(
			'section_style_icon',
			[
				'label'    => esc_html__( 'Icon', 'minera' ),
				'tab'      => Controls_Manager::TAB_STYLE,
				'condition'=> [
					'icon!' => ''
				]
			]
		);

		$this->start_controls_tabs( 'icon_colors' );

		$this->start_controls_tab(
			'icon_colors_nornal',
			[
				'label'  => esc_html__( 'Normal', 'minera' )
			]
		);

		$this->add_control(
			'primary_color',
			[
				'label'       => esc_html__( 'Primary Color', 'minera' ),
				'type'        => Controls_manager::COLOR,
				'scheme'      => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1
				],
				'default'     => "#000000",
				'selectors'   => [
					'{{WRAPPER}}.elementor-view-stacked .elementor-icon' => 'background-color: {{VALUE}};',
					'{{WRAPPER}}.elementor-view-framed .elementor-icon' => 'border: 3px solid {{VALUE}};',
				]
			]
		);

		$this->add_control(
			'secondary_color',
			[
				'label'       => esc_html__( 'Secondary Color', 'minera' ),
				'type'        => Controls_manager::COLOR,
				'scheme'      => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1
				],
				'default'     => "#fff",
				'selectors'   => [
					'{{WRAPPER}} .minera-icon-box .minera-icon .fa' => 'color: {{VALUE}};',
				]
			]
		);

		$this->add_responsive_control(
			'size_icon',
			[
				'label'     => esc_html__( 'Size', 'minera' ),
				'type'      => Controls_manager::SLIDER,
				'range'     => [
					'px' => [
						'min' => 10,
						'max' => 300
					]
				],
				'selectors' => [ '{{WRAPPER}} .minera-icon-box .minera-icon .fa' => 'font-size: {{SIZE}}{{UNIT}};' ]
			]
		);

		$this->add_responsive_control(
			'spacing_icon',
			[
				'label'     => esc_html__( 'Spacing', 'minera' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min' => 20,
						'max' => 250
					]
				],
				'selectors' =>[
					'{{WRAPPER}} .minera-icon-box .minera-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'(mobile){{WRAPPER}} .minera-icon-box .minera-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',

				]

			]
		);


		$this->add_control(
			'icon_padding',
			[
				'label'        => esc_html__( 'Padding', 'minera' ),
				'type'         => Controls_Manager::SLIDER,
				'range'        => [
					'em' => [
						'min' => 0,
						'max' => 5
					]
				],
				'selectors'    => [ '{{WRAPPER}} .elementor-icon' => 'padding: {{SIZE}}{{UNIT}}' ],
				'condition'    => [ 'view!' => 'default' ]
			]
		);


		$this->add_control(
			'border_width',
			[
				'label'      => esc_html__( 'Border Width', 'minera' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [ '{{WRAPPER}}.elementor-view-framed .elementor-icon' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' ],
				'condition'  => [ 'view' => 'framed']
			]
		);


		$this->add_control(
			'border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'minera' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [ '{{WRAPPER}} .elementor-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' ],
				'condition'  => [ 'view!' => 'default' ]
			]
		);

		$this->add_control(
			'rotate',
			[
				'label'     => esc_html__( 'Rotate', 'minera' ),
				'type'      => Controls_Manager::SLIDER,
				'default'   => [
					'size' => 0,
					'unit' => 'deg'
				],
				'selectors' => [ '{{WRAPPER}} .elementor-icon .fa' => 'transform: rotate({{SIZE}}{{UNIT}})' ]
			]
		);

		$this->end_controls_tab();



		$this->start_controls_tab(
			'icon_hover_color',
			[
				'label'    => esc_html__( 'Hover', 'minera' )
			]
		);

		$this->add_control(
			'hover_primary_color',
			[
				'label'      => esc_html__( 'Primary Color', 'minera' ),
				'type'       => Controls_Manager::COLOR,
				'default'    => '#222222',
				'selectors'  => [
					'{{WRAPPER}} .minera-icon-box .minera-icon .fa:hover' => 'color: {{VALUE}}'
				]
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'content',
			[
				'label'     => esc_html__( 'Content', 'minera' ),
				'tab'       => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'content_align',
			[
				'lable'    => esc_html__( 'Align', 'minera' ),
				'type'     => Controls_Manager::CHOOSE,
				'default'  => 'center',
				'options'  => [
					'left'    => [
						'title'  => esc_html__( 'Left', 'minera' ),
						'icon'   => 'fa fa-align-left'
					],
					'center' => [
						'title'  => esc_html__( 'Center', 'minera' ),
						'icon'   => 'fa fa-align-center'
					],
					'right' => [
						'title' => esc_html__( 'Right', 'minera' ),
						'icon'  => 'fa fa-align-right'
					],
					'justify' => [
						'title' => esc_html__( 'Justify', 'minera' ),
						'icon'  => 'fa fa-align-justify'
					]
				],
				'selectors'  => [ '{{WRAPPER}} .minera-content-icon-box' => 'text-align:{{VALUE}};' ]
			]
		);


		$this->add_control(
			'heading_title',
			[
				'label'     => esc_html__( 'Title', 'minera' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this-> add_control(
			'color_title',
			[
				'label'      => esc_html__( 'Color', 'minera' ),
				'type'       => Controls_Manager::COLOR,
				'default'    => '#222222',
				'selectors'  => [
					'{{WRAPPER}} .minera-icon-box .minera-content-icon-box .icon-box-title .minera-text-title' => 'color: {{VALUE}};',
					'{{WRAPPER}} .minera-icon-box .minera-content-icon-box .icon-box-title a' => 'color: {{VALUE}};',
				],
				'scheme'     => [
					'type'   => Scheme_Color::get_type(),
					'value'  => Scheme_Color::COLOR_1
				]
			]
		);

		$this->add_responsive_control(
			'title_space',
			[
				'label'     => 'Spacing',
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min' => 0,
						'max' => 200
					]
				],
				'selectors' => [
					'{{WRAPPER}} .minera-icon-box .minera-content-icon-box .icon-box-title' => 'margin-bottom: {{SIZE}}{{UNIT}};'
				]
			]
		);


		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => esc_html__( 'title_typography', 'minera' ),
				'selector' => '{{WRAPPER}} .minera-icon-box .minera-content-icon-box .icon-box-title .minera-text-title',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1
			]
		);

		$this->add_control(
			'heading_description_content_box',
			[
				'label'   => esc_html__( 'Description', 'minera' ),
				'type'    => Controls_Manager::HEADING,
				'scheme'  => 'before'
 			]
		);

		$this->add_control(
			'color_text_description_content_box',
			[
				'label'     => esc_html__( 'Color', 'minera' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#000',
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1
				],

				'selectors' => [ '{{WRAPPER}} .minera-icon-box .minera-content-icon-box .text-description' => 'color: {{VALUE}};' ],

			]
		);


		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => esc_html__( 'description_typography', 'minera' ),
				'selector' => '{{WRAPPER}} .minera-icon-box .minera-content-icon-box .text-description',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();


	}


	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$icon    = wp_oembed_get( $settings[ 'icon' ] );
		$title   = wp_oembed_get( $settings[ 'title_header' ] );
		$href    = $settings[ 'link' ];

		?>

		<div class=" minera-icon-box icon-box ">
			<div class="minera-icon view-<?php echo $settings['view']?> shape-<?php echo $settings['shape']?>">
				<?php echo !empty( $settings[ 'link' ]['url']) ? '<a href="'.$settings["link"][ 'url' ].'">' : '' ?>
					<?php echo (( $settings['view'] !== 'default' )) ?'<span class="minera-view-icon elementor-icon">' : '' ?>
						<i class="<?php echo ($icon) ? $icon : $settings[ 'icon' ] ?>"></i>
					<?php echo (( $settings['view'] !== 'default' )) ? '</span>' : '' ?>
				<?php echo !empty( $settings[ 'link' ][ 'url' ]) ? '</a>' : '' ?>
			</div>
			<div class="minera-content-icon-box">
				<div class="icon-box-title">
					<?php echo !empty( $settings[ 'link' ]['url']) ? '<a href="'.$settings["link"][ 'url' ].'">' : '' ?>
					
						<<?php echo $settings[ 'title_size' ] ?> class = "minera-text-title"><?php echo esc_html( $settings[ 'title_header' ] )?></<?php echo $settings['title_size'] ?>>
					<?php echo !empty( $settings[ 'link' ]['url']) ? '</a>' : '' ?>
					
				</div>
				<div class="text-description">
					<p><?php echo esc_html( $settings[ 'description' ] ); ?></p>
				</div>
			</div>

		</div>
		<?php

	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Minera_Icon_Box() );
