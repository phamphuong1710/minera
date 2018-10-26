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
				'placeholder' => 'fa fa-star'

			]
		);


		$this->add_control(

			'title_header',
			[
				'label'       => esc_html__( "Title & Description", 'minera' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => '',
				'placeholder' => esc_html__('Enter your title', 'minare' ),
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
				'default'      => 'top',
				'options'      => [
					'left'  => [
						'title' => esc_html__( 'Left', 'minera' ),
						'icon'  => 'fa fa-align-left'
					],

					'top'  => [
						'title' => esc_html__( 'center', 'minera' ),
						'icon'  => 'fa fa-align-center'
					],

					'right'=> [
						'title' => esc_html__( 'right', 'minera' ),
						'icon'  => 'fa fa-align-right'
					]
				]
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
			]
		);

	}


	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$icon    = wp_oembed_get( $settings[ 'icon' ] );
		$title   = wp_oembed_get( $settings[ 'title_header' ] );
		$href    = $settings[ 'link' ];
		// var_dump($href);
		?>

		<div class=" minera_icon_box icon-box-<?php echo $settings[ 'hover_anmation' ] ?> ">
			<div class="meria-icon">
				<?php echo !empty( $settings[ 'link' ]['url']) ? '<a href="'.$settings["link"][ 'url' ].'">' : '' ?>
					<i class="<?php echo ($icon) ? $icon : $settings[ 'icon' ] ?>"></i>
				<?php echo !empty( $settings[ 'link' ][ 'url' ]) ? '</a>' : '' ?>
			</div>
			<div class="icon-box-title">
				<?php echo !empty( $settings[ 'link' ]['url']) ? '<a href="'.$settings["link"][ 'url' ].'">' : '' ?>
				
					<<?php echo $settings[ 'title_size' ] ?>><?php echo esc_html( $settings[ 'title_header' ] )?></<?php echo $settings['title_size'] ?>>
				<?php echo !empty( $settings[ 'link' ]['url']) ? '</a>' : '' ?>
				
			</div>
			<p><?php echo esc_html( $settings[ 'description' ] ); ?></p>

		</div>
		<?php

	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Minera_Icon_Box() );
