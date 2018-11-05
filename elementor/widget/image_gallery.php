<?php
namespace Elementor;


class Widget_Minera_Image_Gallery extends Widget_Base {

	public function get_name() {
		return 'minera-image-gallery';
	}

	public function get_title() {
		return esc_html__( 'Image Gallery', 'minera' );
	}

	
	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	
	public function get_keywords() {
		return [ 'image', 'photo', 'visual', 'gallery' ];
	}

	public function get_categories($value='')
	{
		return [ 'minera_category' ];
	}


	
	protected function _register_controls() {
		$this->start_controls_section(
			'section_minera_image_gallery',
			[
				'label' => esc_html__( 'Image Gallery', 'minera' ),
			]
		);

		$this->add_control(
			'wp_gallery',
			[
				'label'      => esc_html__( 'Add Images', 'minera' ),
				'type'       => Controls_Manager::GALLERY,
				'show_label' => false,
				'dynamic'    => [
					'active' => true,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'      => 'thumbnail',
				'exclude'   => [ 'custom' ],
				'separator' => 'none',
			]
		);

		$gallery_columns = range( 1, 10 );
		$gallery_columns = array_combine( $gallery_columns, $gallery_columns );

		$this->add_control(
			'gallery_columns',
			[
				'label'   => esc_html__( 'Columns', 'minera' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 4,
				'options' => $gallery_columns,
			]
		);

		$this->add_control(
			'gallery_link',
			[
				'label'   => esc_html__( 'Link to', 'minera' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'file',
				'options' => [
					'file' => esc_html__( 'Media File', 'minera' ),
					'none' => esc_html__( 'None', 'minera' ),
				],
			]
		);

		$this->add_control(
			'open_lightbox',
			[
				'label'      => esc_html__( 'Lightbox', 'minera' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => 'default',
				'options'    => [
					'default' => esc_html__( 'Default', 'minera' ),
					'yes'     => esc_html__( 'Yes', 'minera' ),
					'no'      => esc_html__( 'No', 'minera' ),
				],
				'condition' => [
					'gallery_link' => 'file',
				],
			]
		);


		$this->add_control(
			'view',
			[
				'label'   => esc_html__( 'View', 'minera' ),
				'type'    => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_gallery_images',
			[
				'label' => esc_html__( 'Images', 'minera' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'image_spacing',
			[
				'label'      => esc_html__( 'Spacing', 'minera' ),
				'type'       => Controls_Manager::SELECT,
				'options'    => [
					''       => esc_html__( 'Default', 'minera' ),
					'custom' => esc_html__( 'Custom', 'minera' ),
				],
				'prefix_class' => 'gallery-spacing-',
				'default'      => '',
			]
		);

		$columns_margin = is_rtl() ? '0 0 -{{SIZE}}{{UNIT}} -{{SIZE}}{{UNIT}};' : '0 -{{SIZE}}{{UNIT}} -{{SIZE}}{{UNIT}} 0;';
		$columns_padding = is_rtl() ? '0 0 {{SIZE}}{{UNIT}} {{SIZE}}{{UNIT}};' : '0 {{SIZE}}{{UNIT}} {{SIZE}}{{UNIT}} 0;';

		$this->add_control(
			'image_spacing_custom',
			[
				'label'     => esc_html__( 'Image Spacing', 'minera' ),
				'type'      => Controls_Manager::SLIDER,
				'show_label' => false,
				'range'     => [
					'px' => [
						'max' => 100,
					],
				],
				'default'   => [
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} .figure-item' => 'padding:' . $columns_padding,
					'{{WRAPPER}} .gallery' => 'margin: ' . $columns_margin,
				],
				'condition' => [
					'image_spacing' => 'custom',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'image_border',
				'selector'  => '{{WRAPPER}} .figure-item img',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'image_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'minera' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .figure-item img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$number = count( $settings[ 'wp_gallery' ] );

		if ( ! $settings['wp_gallery'] ) {
			return;
		}

		?>

		<div class="minera-gallery-image">

			<div class="gallery gallery-columns-<?php echo $settings[ 'gallery_columns' ] ?> gallery-size-<?php echo $settings[ 'thumbnail_size' ]; ?>">
				<?php foreach ( $settings['wp_gallery'] as $key => $value): ?>
					<figure class="figure-item">
						<?php echo $settings[ 'gallery_link' ] !== 'none' ? '<a href="'.$value[ 'url' ].'">' : ''; ?>

							<img src="<?php echo $value[ 'url' ] ?>" alt="image gallery item">
						<?php echo $settings[ 'gallery_link' ] !== 'none' ? '</a>' : ''; ?>

					</figure>
				<?php endforeach ?>
			</div>
			
		</div>

		<?php
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_Minera_Image_Gallery() );
