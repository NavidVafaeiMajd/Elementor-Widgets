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
        <div class="my-widget">
            <h2>NAVID<?php echo $settings['title']; ?></h2>
            <button><?php echo $settings['button_text']; ?></button>
        </div>
        <?php
    }

    // پیش‌نمایش زنده توی ویرایشگر المنتور
    protected function content_template() {
        ?>
        <div class="my-widget">
            <h2>{{{ settings.title }}}</h2>
            <button>{{{ settings.button_text }}}</button>
        </div>
        <?php
    }
}