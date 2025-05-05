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
		return [ 'widget-style' , 'swiper-css' , 'bootstrap-css'];
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
						'name' => 'title',
						'label' => esc_html__( 'title', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => 'title',
					],
					[
						'name' => 'rate',
						'label' => esc_html__( 'rate', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::NUMBER,
						'max' => 5,
						'min' => 0,
						'default' => 5,
					],
					[
						'name' => 'discount',
						'label' => esc_html__( 'discount', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::NUMBER,
						'max' => 100,
						'min' => 0,
						'default' => 5,
					],
					[
						'name' => 'coupon_code',
						'label' => esc_html__( 'coupon_code', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'placeholder' => esc_html__( 'e.g. OFF25', 'textdomain' ),
						'default' => '',
					],
					[
						'name' => 'deadline',
						'label' => esc_html__( 'deadline', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::DATE_TIME,
						'default' => date('Y-m-d H:i:s', strtotime('+1 day')),
					],
					[
						'name' => 'cartimg',
						'label' => esc_html__( 'Choose', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::MEDIA,
						'default' => [
							'url' => \Elementor\Utils::get_placeholder_image_src(),
						],					
					],

				],
				'default' => [
					[

					],
				]			]
		);
        $this->end_controls_section();









		$this->start_controls_section(
            'style',
            [
                'label' => __( 'style', 'my-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'background',
					'types' => [ 'classic', 'gradient', 'video' ],
					'selector' => '{{WRAPPER}} .card-slide',
					'default' => [
						'background' => 'classic',
						'color' => '#f4f4f4',
					],
				]
				);

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
		
		
		$this->end_controls_section();

    }

    // render
    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>

            <div class="swiper card-slider">
                <div class="swiper-wrapper">
                    <!-- Slides -->
					<?php foreach ( $settings['list'] as $index => $item ) : ?>
						<?php 
							$deadline_timestamp = strtotime( $item['deadline'] );
							$is_expired = time() >= $deadline_timestamp;
							$btn_id = 'btn_' . $this->get_id() . '_' . $index;
							$coupon_code= esc_html( $item['coupon_code'] );
							?>
						<div class="swiper-slide card-slide bg-light">
						<div class="first-sec">
							<div class="first-sec-img">
								<img src="<?php echo $item['cartimg']['url'];?>" alt="">
							</div>
							<div class="first-sec-info">
								<div class="first-sec-info-title fw-bold">
									<?php
									echo $item['title'];
									?>
								</div>
								<div class="first-sec-info-rate">
									<span class="rate-star">
										<svg height="800px" width="800px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 47.94 47.94" xml:space="preserve"><path style="fill:#ED8A19;" d="M26.285,2.486l5.407,10.956c0.376,0.762,1.103,1.29,1.944,1.412l12.091,1.757	c2.118,0.308,2.963,2.91,1.431,4.403l-8.749,8.528c-0.608,0.593-0.886,1.448-0.742,2.285l2.065,12.042	c0.362,2.109-1.852,3.717-3.746,2.722l-10.814-5.685c-0.752-0.395-1.651-0.395-2.403,0l-10.814,5.685	c-1.894,0.996-4.108-0.613-3.746-2.722l2.065-12.042c0.144-0.837-0.134-1.692-0.742-2.285l-8.749-8.528	c-1.532-1.494-0.687-4.096,1.431-4.403l12.091-1.757c0.841-0.122,1.568-0.65,1.944-1.412l5.407-10.956	C22.602,0.567,25.338,0.567,26.285,2.486z"/></svg>
									</span>
									<span class="rate-number">
										<span>5</span> / <?php echo $item['rate']?>
									</span>
								</div>
							</div>
						</div>
						<div class="secound-sec">
							<div class="secound-sec-timer text-danger"> 
								
								<div class="secound-sec-timer-discount">
									<span><?php echo $item['discount'];?>%</span>
									تخفیف
								</div>
								<div class="secound-sec-timer-separator"></div>
								<div class="secound-sec-timer-count">
									<div class="secound-sec-timer-count-number" data-deadline="<?php echo esc_attr( $deadline_timestamp )?>">
										22:22:22:22
									</div>
									<div class="secound-sec-timer-count-icon">
									<svg fill="#dc3545" height="800px" width="800px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve"><g><g><path d="M256,0C114.842,0,0,114.842,0,256s114.842,256,256,256s256-114.842,256-256S397.158,0,256,0z M374.821,283.546H256 c-15.148,0-27.429-12.283-27.429-27.429V137.295c0-15.148,12.281-27.429,27.429-27.429s27.429,12.281,27.429,27.429v91.394h91.392 c15.148,0,27.429,12.279,27.429,27.429C402.249,271.263,389.968,283.546,374.821,283.546z"/></g></g></svg>
									</div>
								</div>
							</div>
							<div class="secound-sec-separator">

							</div>
							<div class="secound-sec-btn">
								<button class="bg-light " onclick="copyToClipboard('<?php echo esc_js( $item['coupon_code'] ); ?>')" id="<?php echo esc_attr($btn_id) ?>" <?php echo $is_expired ? 'disabled' : ''; ?>>دریافت</button>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
                </div>
            </div>
        <?php
    }

    // preview
	protected function content_template() {
		?>
		<div class="swiper card-slider">
			<div class="swiper-wrapper">
				<# _.each( settings.list, function( item, index ) {
					var deadlineTimestamp = new Date( item.deadline ).getTime() / 1000;
					var isExpired = Date.now() / 1000 >= deadlineTimestamp;
					var btnId = 'btn_' + index; 
					#>
					<div class="swiper-slide card-slide bg-light">
						<div class="first-sec">
							<div class="first-sec-img">
								<img src="{{{ item.cartimg.url }}}" alt="">
							</div>
							<div class="first-sec-info">
								<div class="first-sec-info-title fw-bold">
									{{{ item.title }}}
								</div>
								<div class="first-sec-info-rate">
									<span class="rate-star">
										<svg height="800px" width="800px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 47.94 47.94" xml:space="preserve"><path style="fill:#ED8A19;" d="M26.285,2.486l5.407,10.956c0.376,0.762,1.103,1.29,1.944,1.412l12.091,1.757c2.118,0.308,2.963,2.91,1.431,4.403l-8.749,8.528c-0.608,0.593-0.886,1.448-0.742,2.285l2.065,12.042c0.362,2.109-1.852,3.717-3.746,2.722l-10.814-5.685c-0.752-0.395-1.651-0.395-2.403,0l-10.814,5.685c-1.894,0.996-4.108-0.613-3.746-2.722l2.065-12.042c0.144-0.837-0.134-1.692-0.742-2.285l-8.749-8.528c-1.532-1.494-0.687-4.096,1.431-4.403l12.091-1.757c0.841-0.122,1.568-0.65,1.944-1.412l5.407-10.956C22.602,0.567,25.338,0.567,26.285,2.486z"/></svg>
									</span>
									<span class="rate-number">
										<span>5</span> / {{{ item.rate }}}
									</span>
								</div>
							</div>
						</div>
						<div class="secound-sec">
							<div class="secound-sec-timer text-danger">
								<div class="secound-sec-timer-discount">
									<span>{{{ item.discount }}}%</span>
									تخفیف
								</div>
								<div class="secound-sec-timer-separator"></div>
								<div class="secound-sec-timer-count">
									<div class="secound-sec-timer-count-number" data-deadline="{{{ deadlineTimestamp }}}">
										22:22:22:22
									</div>
									<div class="secound-sec-timer-count-icon">
										<svg fill="#dc3545" height="800px" width="800px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve"><g><g><path d="M256,0C114.842,0,0,114.842,0,256s114.842,256,256,256s256-114.842,256-256S397.158,0,256,0z M374.821,283.546H256c-15.148,0-27.429-12.283-27.429-27.429V137.295c0-15.148,12.281-27.429,27.429-27.429s27.429,12.281,27.429,27.429v91.394h91.392c15.148,0,27.429,12.279,27.429,27.429C402.249,271.263,389.968,283.546,374.821,283.546z"/></g></g></svg>
									</div>
								</div>
							</div>
							<div class="secound-sec-separator"></div>
							<div class="secound-sec-btn">
								<button class="bg-light" onclick="copyToClipboard('{{{ item.coupon_code }}}')" id="{{{ btnId }}}" {{{ isExpired ? 'disabled' : '' }}}>دریافت</button>
							</div>
						</div>
					</div>
				<# }); #>
			</div>
		</div>
		<?php
	}
	}

