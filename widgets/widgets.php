<?php
class My_Custom_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'ویجت المنتوری من'; // اسم منحصر به فرد ویجت
    }

    public function get_title() {
        return __( 'ویجت اختصاصی من', 'my-elementor-widget' ); // عنوان ویجت توی پنل المنتور
    }

    public function get_icon() {
        return 'eicon-code'; // آیکون ویجت (از آیکون‌های المنتور انتخاب کن)
    }

    public function get_categories() {
        return [ 'general' ]; // دسته‌بندی ویجت
    }

    // تنظیمات ویجت (کنترل‌ها)
    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'محتوا', 'my-elementor-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'عنوان', 'my-elementor-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'سلام دنیا!', 'my-elementor-widget' ),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __( 'متن دکمه', 'my-elementor-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'کلیک کن', 'my-elementor-widget' ),
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
				<img src="/asset/img/0.jpg" alt="Card image" title="Photo by Joseph Barrientos for Unsplash">
				<div class="mywidget_btn">
					<div class="mywidget_round_wrapper"><a href="#" class="mywidget-read-more">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" with="30" height="30" fill="white">
								<path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l370.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z" />
							</svg></a>
					</div>
				</div>
			</div>
			<div class="mywidget_container_text">
				<h2>Where in the World Will You Go Next ?</h2>
				<p>From coastal escapes to mountain retreats, your journey begins here.
					Each destination is handpicked for wanderers with a taste for wonder.
					Pack your bags—your next chapter is just a card away. </p>
			</div>
		</div>

		<div class="mywidget_card mywidget-card-back">
			<h3>Where Every Sunset Feels Like Magic</h3>
			<h1>Maui, Hawai‘i</h1>

			<p>Savor island flavors, from fresh poke bowls to sweet shaved ice by the shore.
				End your days with golden sunsets over the Pacific and the sound of waves lapping at your feet.
				In Maui, every bite and every view is a memory in the making.</p>
			<div class="mywidget_btn_back">
				<a href="#" class="mywidget-read-more">Read more</a>
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
				<img src="/asset/img/0.jpg" alt="Card image" title="Photo by Joseph Barrientos for Unsplash">
				<div class="mywidget_btn">
					<div class="mywidget_round_wrapper"><a href="#" class="mywidget-read-more">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" with="30" height="30" fill="white">
								<path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l370.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z" />
							</svg></a>
					</div>
				</div>
			</div>
			<div class="mywidget_container_text">
				<h2>Where in the World Will You Go Next ?</h2>
				<p>From coastal escapes to mountain retreats, your journey begins here.
					Each destination is handpicked for wanderers with a taste for wonder.
					Pack your bags—your next chapter is just a card away. </p>
			</div>
		</div>

		<div class="mywidget_card mywidget-card-back">
			<h3>Where Every Sunset Feels Like Magic</h3>
			<h1>Maui, Hawai‘i</h1>

			<p>Savor island flavors, from fresh poke bowls to sweet shaved ice by the shore.
				End your days with golden sunsets over the Pacific and the sound of waves lapping at your feet.
				In Maui, every bite and every view is a memory in the making.</p>
			<div class="mywidget_btn_back">
				<a href="#" class="mywidget-read-more">Read more</a>
			</div>
		</div>
	</div>
        <?php
    }
}