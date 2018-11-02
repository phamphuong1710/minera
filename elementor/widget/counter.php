<?php 
namespace Elementor;

/**
 * 
 */
class Widget_Minera_Counter extends Widget_Base
{
	
	public function get_name($value='')
	{
		return "counter_minera";
	}

	public function get_title()
	{
		return esc_html__( '123 Counter', 'minera' );
	}

	public function get_icon($value='')
	{
		return 'fa fa-sort-numeric-asc';
	}

	public function get_categories($value='')
	{
		return [ 'minera_category' ];
	}

	protected function _register_controls($value='')
	{
		$this->start_controls_section(
			'section_counter',
			[
				'label' => esc_html__( 'Counter', 'minera' )
			]
		);

		$this->add_control(
			'number_start',
			[
				'label'    => esc_html__( 'Starting Number', 'minera' ),
				'type'     => Controls_Manager::NUMBER,
				'default'  => 0
			]
		);

		$this->add_control(
			'number_end',
			[
				'label'    => esc_html__( 'Ending Number', 'minera' ),
				'type'     => Controls_Manager::NUMBER,
				'default'  => 2000
			]
		);

		$this->add_control(
			'counter_title',
			[
				'label'    => esc_html__( 'Title', 'minera' ),
				'type'     => Controls_Manager::TEXT,
				'default'  => 'Title'
			]
		);

		$this->add_control(
			'suffix',
			[
				'label'     => esc_html__( 'Number Suffix', 'minera' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => '',
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_style_counter',
			[
				'label'    => esc_html__( 'Number', 'minera' ),
				'tab'      => Controls_Manager::TAB_STYLE,
			]
		);


		$this->add_control(
			'color_number',
			[
				'label'     => esc_html__( 'Color', 'minera' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_2
				],
				'selectors' => [
					'{{WRAPPER}} .minera-counter-number ' => 'color: {{VALUE}};'
				]

			]
		);


		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'typography_number',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .minera-counter .minera-counter-number'

			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_counter_title',
			[
				'label'    => esc_html__( 'Title', 'minera' ),
				'tab'      => Controls_Manager::TAB_STYLE,
			]
		);


		$this->add_control(
			'color_title',
			[
				'label'     => esc_html__( 'Color', 'minera' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'scheme'    => [
					'type'  => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_2
				],
				'selectors' => [
					'{{WRAPPER}} .minera-counter-title ' => 'color: {{VALUE}};'
				]

			]
		);


		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'typography_title',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .minera-counter-title'

			]
		);


		$this->end_controls_section();
	}

	protected function render($value='')
	{
		$settings = $this->get_settings_for_display();

	?>

	<div class="minera-counter counter-<?php echo $this->get_id(); ?>" >
		<div class="minera-counter-number" id='<?php echo $this->get_id(); ?>'>
			<span class="counter-number" data-to-value='<?php echo $settings[ 'number_end' ] ?>'><?php echo esc_html( $settings[ 'number_end' ] ); ?></span>
			<span class="minera-number-suffix"><?php echo esc_html( $settings[ 'suffix' ] ) ?></span>
		</div>
		<?php if( $settings[ 'counter_title' ] ) : ?>
			<div class="minera-counter-title">
				<?php echo esc_html( $settings[ 'counter_title' ] ); ?>
			</div>
		<?php endif ?>
	</div>

	<?php
	}



}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Minera_Counter() );