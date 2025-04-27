<?php
class My_Custom_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'MyCustomWidget';
    }

    public function get_title() {
        return __( 'custom widget', 'my-elementor-widget' ); // title of widget
    }

    public function get_icon() {
        return 'eicon-code'; // widget's icon
    }

    public function get_categories() {
        return [ 'general' ]; // widget's category
    }

	public function get_style_depends() {
		return [ 'widget-style' ];
	}
	
	public function get_script_depends() {
		return [ 'widget-script' , 'gsap'];
	}
	

    // widget settings
    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'content', 'my-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


		
		$this->add_control(
			'front_image',
			[
				'label' => esc_html__( 'Choose Image', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);


        $this->add_control(
            'front_title',
            [
                'label' => __( 'title', 'my-elementor-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'hello world!', 'my-elementor-widget' ),
            ]
        );

		$this->add_control(
            'front_description',
            [
                'label' => __( 'description', 'my-elementor-widget' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( '.....', 'my-elementor-widget' ),
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => __('Custom Link', 'textdomain'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://example.com', 'textdomain'),
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
                'show_external' => true,
            ]
        );
        $this->end_controls_section();

		$this->start_controls_section(
            'style',
            [
                'label' => __( 'style', 'my-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_control(
			'Title color',
			[
				'label' => esc_html__( 'Title Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' =>' rgb(23, 46, 46)',
				'selectors' => [
					'{{WRAPPER}} .mywidget_container_text h2' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'Text color',
			[
				'label' => esc_html__( 'Text Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' =>' rgb(23, 46, 46)',
				'selectors' => [
					'{{WRAPPER}} .mywidget_container_text p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'button background color',
			[
				'label' => esc_html__( 'button background color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgb(23, 46, 46)',
				'selectors' => [
					'{{WRAPPER}} .mywidget_round_wrapper' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'button color',
			[
				'label' => esc_html__( 'button color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'white',
				'selectors' => [
					'{{WRAPPER}} .mywidget-read-more > svg' => 'fill: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'box_shadow',
			[
				'label' => __('Box Shadow', 'textdomain'),
				'type' => \Elementor\Controls_Manager::BOX_SHADOW,
				'selectors' => [
					'{{WRAPPER}} .mywidget-card-front' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __('Border', 'textdomain'),
				'selector' => '{{WRAPPER}} .mywidget-card-front',
			]
		);
		
		
		$this->end_controls_section();

    }

    // رندر خروجی ویجت
    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
	<div class="mywidget_card_container">
		<div class="mywidget_card mywidget-card-front">
			<div class="mywidget_img_wrapper">
				<img src="<?php echo $settings['front_image']['url']?>" alt="Card image" title="Photo by Joseph Barrientos for Unsplash">
				<div class="mywidget_btn">
					<div class="mywidget_round_wrapper"><a href="" class="mywidget-read-more">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" with="30" height="30" fill="white">
								<path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l370.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z" />
							</svg></a>
					</div>
				</div>
			</div>
			<div class="mywidget_container_text">
				<h2><?php echo $settings['front_title']?></h2>
				<p>
					<?php echo $settings['front_description']?>
				</p>
			</div>
		</div>
	</div>
        <?php
    }

    // پیش‌نمایش زنده توی ویرایشگر المنتور
    protected function content_template() {
        ?>
	<div class="mywidget_card_container">
		<div class="mywidget_card mywidget-card-front">
			<div class="mywidget_img_wrapper">
				<img src="{{{ settings.front_image.url }}}" alt="Card image" title="Photo by Joseph Barrientos for Unsplash">
				<div class="mywidget_btn">
					<div class="mywidget_round_wrapper"><a href="#" class="mywidget-read-more">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" with="30" height="30" fill="white">
								<path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l370.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z" />
							</svg></a>
					</div>
				</div>
			</div>
			<div class="mywidget_container_text">
				<h2>{{{ settings.front_title }}}</h2>
				<p>{{{ settings.front_description }}} </p>
			</div>
		</div>
	</div>
        <?php
    }
}