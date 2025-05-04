<?php
class My_Custom_Widget_Carousel extends \Elementor\Widget_Base {

    public function get_name() {
        return 'MyCustomWidgetCarousel';
    }

    public function get_title() {
        return __( 'custom widget carousel', 'my-elementor-widget' ); // title of widget
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
		return [ 'widget-script' , 'swiper-js'];
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
			'list',
			[
				'label' => esc_html__( 'List', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'text',
						'label' => esc_html__( 'Text', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'placeholder' => esc_html__( 'List Item', 'textdomain' ),
						'default' => esc_html__( 'List Item', 'textdomain' ),
					],
					[
						'name' => 'link',
						'label' => esc_html__( 'Link', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::URL,
						'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
					],
				],
				'default' => [
					[
						'text' => esc_html__( 'List Item #1', 'textdomain' ),
						'link' => 'https://elementor.com/',
					],
					[
						'text' => esc_html__( 'List Item #2', 'textdomain' ),
						'link' => 'https://elementor.com/',
					],
				],
				'title_field' => '{{{ text }}}',
			]
		);
        $this->end_controls_section();






        


		// $this->start_controls_section(
        //     'style',
        //     [
        //         'label' => __( 'style', 'my-elementor-widget' ),
        //         'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        //     ]
        // );

		// $this->add_control(
		// 	'Title color',
		// 	[
		// 		'label' => esc_html__( 'Title Color', 'textdomain' ),
		// 		'type' => \Elementor\Controls_Manager::COLOR,
		// 		'default' =>' rgb(23, 46, 46)',
		// 		'selectors' => [
		// 			'{{WRAPPER}} .mywidget_container_text h2' => 'color: {{VALUE}}',
		// 		],
		// 	]
		// );
		// $this->add_control(
		// 	'Text color',
		// 	[
		// 		'label' => esc_html__( 'Text Color', 'textdomain' ),
		// 		'type' => \Elementor\Controls_Manager::COLOR,
		// 		'default' =>' rgb(23, 46, 46)',
		// 		'selectors' => [
		// 			'{{WRAPPER}} .mywidget_container_text p' => 'color: {{VALUE}}',
		// 		],
		// 	]
		// );
		// $this->add_control(
		// 	'button background color',
		// 	[
		// 		'label' => esc_html__( 'button background color', 'textdomain' ),
		// 		'type' => \Elementor\Controls_Manager::COLOR,
		// 		'default' => 'rgb(23, 46, 46)',
		// 		'selectors' => [
		// 			'{{WRAPPER}} .mywidget_round_wrapper' => 'background-color: {{VALUE}}',
		// 		],
		// 	]
		// );
		// $this->add_control(
		// 	'button color',
		// 	[
		// 		'label' => esc_html__( 'button color', 'textdomain' ),
		// 		'type' => \Elementor\Controls_Manager::COLOR,
		// 		'default' => 'white',
		// 		'selectors' => [
		// 			'{{WRAPPER}} .mywidget-read-more > svg' => 'fill: {{VALUE}}',
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'box_shadow',
		// 	[
		// 		'label' => __('Box Shadow', 'textdomain'),
		// 		'type' => \Elementor\Controls_Manager::BOX_SHADOW,
		// 		'selectors' => [
		// 			'{{WRAPPER}} .mywidget-card-front' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}};',
		// 		],
		// 	]
		// );

		// $this->add_group_control(
		// 	\Elementor\Group_Control_Border::get_type(),
		// 	[
		// 		'name' => 'border',
		// 		'label' => __('Border', 'textdomain'),
		// 		'selector' => '{{WRAPPER}} .mywidget-card-front',
		// 	]
		// );
		
		
		// $this->end_controls_section();

    }

    // render
    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>

        <?php
    }

    // preview
    protected function content_template() {
        ?>

        <?php
    }
}

