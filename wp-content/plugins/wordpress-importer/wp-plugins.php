<?php
/**
 * @package TuyenMinh
 * @version 1.0.0
 */
/*
Plugin Name: Custom Plugin


Author: TuyenMinh

*/
/**
 * khởi tạo widget
 */

 // Đăng ký widget tùy chỉnh
// Đăng ký widget tùy chỉnh
function register_custom_widget() {
    register_widget('Custom_Widget');
}
add_action('widgets_init', 'register_custom_widget');

// Lớp widget tùy chỉnh
class Custom_Widget extends WP_Widget {

    // Thiết lập widget
    function __construct() {
        parent::__construct(
            'custom_widget', // ID của widget
            'Custom Widget', // Tên hiển thị của widget
            array('description' => 'A custom widget with icon and two texts') // Mô tả của widget
        );
    }

    // Hiển thị widget
    public function widget($args, $instance) {
        echo $args['before_widget'];

        // Hiển thị biểu tượng
        $icon = !empty($instance['icon']) ? $instance['icon'] : 'fa fa-star'; // Mặc định sử dụng class icon "fa fa-star"
        echo ' <div class="custom-wp"><i id ="wp-icon"class="' . $icon . '"></i>';

        // Hiển thị văn bản thứ nhất
        $text1 = !empty($instance['text1']) ? $instance['text1'] : 'First text'; // Mặc định hiển thị văn bản "First text"
        echo '<div class="custom-wpc" ><div <div class="custom-wpcc" >' . $text1 . '</div>';

        // Hiển thị văn bản thứ hai
        $text2 = !empty($instance['text2']) ? $instance['text2'] : 'Second text'; // Mặc định hiển thị văn bản "Second text"
        echo '<div class="custom-wpt">' . $text2 . '</div></div></div>';

        echo $args['after_widget'];
    }

    // Hiển thị form cài đặt widget trong trang quản trị
    public function form($instance) {
        $icon = !empty($instance['icon']) ? $instance['icon'] : '';
        $text1 = !empty($instance['text1']) ? $instance['text1'] : '';
        $text2 = !empty($instance['text2']) ? $instance['text2'] : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('icon'); ?>">Icon:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('icon'); ?>" name="<?php echo $this->get_field_name('icon'); ?>" type="text" value="<?php echo esc_attr($icon); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('text1'); ?>">Text 1:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('text1'); ?>" name="<?php echo $this->get_field_name('text1'); ?>" type="text" value="<?php echo esc_attr($text1); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('text2'); ?>">Text 2:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('text2'); ?>" name="<?php echo $this->get_field_name('text2'); ?>" type="text" value="<?php echo esc_attr($text2); ?>">
        </p>
        <?php
    }

    // Lưu dữ liệu khi cập nhật cài đặt widget
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['icon'] = (!empty($new_instance['icon'])) ? sanitize_text_field($new_instance['icon']) : '';
        $instance['text1'] = (!empty($new_instance['text1'])) ? sanitize_text_field($new_instance['text1']) : '';
        $instance['text2'] = (!empty($new_instance['text2'])) ? sanitize_text_field($new_instance['text2']) : '';
        return $instance;
    }
}
//

function register_custom_widget1() {
    register_widget('Custom_Widget1');
}
add_action('widgets_init', 'register_custom_widget1');
class Custom_Widget1 extends WP_Widget {

    // Thiết lập widget
    function __construct() {
        parent::__construct(
            'custom_widget1', // ID của widget
            'Custom Widget1', // Tên hiển thị của widget
            array('description' => 'A custom widget with icon and two texts') // Mô tả của widget
        );
    }

    // Hiển thị widget
    public function widget($args, $instance) {
        echo $args['before_widget'];

        // Hiển thị biểu tượng
        $icon = !empty($instance['icon']) ? $instance['icon'] : 'fa fa-star'; // Mặc định sử dụng class icon "fa fa-star"
        echo ' <div class="custom-wp1"><i class="' . $icon . '"></i>';

        // Hiển thị văn bản thứ nhất
        $text1 = !empty($instance['text1']) ? $instance['text1'] : ''; // Mặc định hiển thị văn bản "First text"
        echo '<div class="custom-wpc1" ><div <div class="custom-wpcc1" >' . $text1 . '</div>';

        // Hiển thị văn bản thứ hai
        $text2 = !empty($instance['text2']) ? $instance['text2'] : ''; // Mặc định hiển thị văn bản "Second text"
        echo '<div class="custom-wpt1">' . $text2 . '</div></div></div>';

        echo $args['after_widget'];
    }

    // Hiển thị form cài đặt widget trong trang quản trị
    public function form($instance) {
        $icon = !empty($instance['icon']) ? $instance['icon'] : '';
        $text1 = !empty($instance['text1']) ? $instance['text1'] : '';
        $text2 = !empty($instance['text2']) ? $instance['text2'] : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('icon'); ?>">Icon:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('icon'); ?>" name="<?php echo $this->get_field_name('icon'); ?>" type="text" value="<?php echo esc_attr($icon); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('text1'); ?>">Text 1:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('text1'); ?>" name="<?php echo $this->get_field_name('text1'); ?>" type="text" value="<?php echo esc_attr($text1); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('text2'); ?>">Text 2:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('text2'); ?>" name="<?php echo $this->get_field_name('text2'); ?>" type="text" value="<?php echo esc_attr($text2); ?>">
        </p>
        <?php
    }

    // Lưu dữ liệu khi cập nhật cài đặt widget
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['icon'] = (!empty($new_instance['icon'])) ? sanitize_text_field($new_instance['icon']) : '';
        $instance['text1'] = (!empty($new_instance['text1'])) ? sanitize_text_field($new_instance['text1']) : '';
        $instance['text2'] = (!empty($new_instance['text2'])) ? sanitize_text_field($new_instance['text2']) : '';
        return $instance;
    }
}
//////
function register_custom_widget2() {
    register_widget('Custom_Widget2');
}
add_action('widgets_init', 'register_custom_widget2');
class Custom_Widget2 extends WP_Widget {

    // Thiết lập widget
    function __construct() {
        parent::__construct(
            'custom_widget2', // ID của widget
            'Custom Widget2', // Tên hiển thị của widget
            array('description' => 'A custom widget with icon and two texts') // Mô tả của widget
        );
    }

    // Hiển thị widget
    public function widget($args, $instance) {
        echo $args['before_widget'];

        // Hiển thị biểu tượng
        $icon = !empty($instance['icon']) ? $instance['icon'] : 'fa fa-star'; // Mặc định sử dụng class icon "fa fa-star"
        echo ' <div class="custom-wp2"><i class="' . $icon . '"></i>';

        // Hiển thị văn bản thứ nhất
        $text1 = !empty($instance['text1']) ? $instance['text1'] : ''; // Mặc định hiển thị văn bản "First text"
        echo '<div class="custom-wpc2" >' . $text1 . '</div>';


        echo $args['after_widget'];
    }

    // Hiển thị form cài đặt widget trong trang quản trị
    public function form($instance) {
        $icon = !empty($instance['icon']) ? $instance['icon'] : '';
        $text1 = !empty($instance['text1']) ? $instance['text1'] : '';
      
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('icon'); ?>">Icon:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('icon'); ?>" name="<?php echo $this->get_field_name('icon'); ?>" type="text" value="<?php echo esc_attr($icon); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('text1'); ?>">Text 1:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('text1'); ?>" name="<?php echo $this->get_field_name('text1'); ?>" type="text" value="<?php echo esc_attr($text1); ?>">
        </p>
        
        <?php
    }

    // Lưu dữ liệu khi cập nhật cài đặt widget
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['icon'] = (!empty($new_instance['icon'])) ? sanitize_text_field($new_instance['icon']) : '';
        $instance['text1'] = (!empty($new_instance['text1'])) ? sanitize_text_field($new_instance['text1']) : '';
       
        return $instance;
    }
}
////icon
function register_custom_widget_icon() {
    register_widget('Custom_Widget_icon');
}
add_action('widgets_init', 'register_custom_widget_icon');
class Custom_Widget_icon extends WP_Widget {

    // Thiết lập widget
    function __construct() {
        parent::__construct(
            'custom_widget_icon', // ID của widget
            'Custom Widget_icon', // Tên hiển thị của widget
            array('description' => 'A custom widget  icon ') // Mô tả của widget
        );
    }

    // Hiển thị widget
    public function widget($args, $instance) {
        echo $args['before_widget'];

        // Hiển thị biểu tượng
        $icon = !empty($instance['icon']) ? $instance['icon'] : 'fa fa-star'; // Mặc định sử dụng class icon "fa fa-star"
        echo ' <div class="custom-wp2"><i class="' . $icon . '"></i>';
        echo $args['after_widget'];
    }

    // Hiển thị form cài đặt widget trong trang quản trị
    public function form($instance) {
        $icon = !empty($instance['icon']) ? $instance['icon'] : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('icon'); ?>">Icon:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('icon'); ?>" name="<?php echo $this->get_field_name('icon'); ?>" type="text" value="<?php echo esc_attr($icon); ?>">
        </p>
    
        
        <?php
    }

    // Lưu dữ liệu khi cập nhật cài đặt widget
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['icon'] = (!empty($new_instance['icon'])) ? sanitize_text_field($new_instance['icon']) : '';        
        return $instance;
    }
}

// Create the widget class img
function register_image_text_widget() {
    register_widget('Image_Text_Widget');
}
add_action('widgets_init', 'register_image_text_widget');

// Tạo lớp widget
class Image_Text_Widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            'image_text_widget',
            'Image Text Widget',
            array('description' => 'A widget to display image and text.')
        );
    }

    // Hiển thị giao diện widget
    public function widget($args, $instance) {
        echo $args['before_widget'];

        $image_url = $instance['image_url'];
        $text = $instance['text'];
       
        $text2 = $instance['text'];
       
        echo '<div class ="ab_us">';
  
       
        if (!empty($image_url)) {
            echo '<img style="height: 100px" src="' . esc_url($image_url) . '" alt="Image">';
        }
        echo '<div class ="ab_tt">';
        if (!empty($text)) {
            echo '<div class="us_name">' . esc_html($text) . '</div>';
        }
        $text1 =  !empty($instance['text1']) ? $instance['text1'] : '';
        echo '<div class="us_vtri">' . esc_html($text1) . '</div>';
        echo '</div>';
        echo '</div>';
        $text2 =  !empty($instance['text2']) ? $instance['text2'] :'';
        echo '<p class="us_drip">' . esc_html($text2) . '</p>';

        echo $args['after_widget'];
    }

    // Hiển thị giao diện cài đặt widget
    public function form($instance) {
        $image_url = !empty($instance['image_url']) ? $instance['image_url'] : '';
        $text = !empty($instance['text']) ? $instance['text'] : '';
        $text1 = !empty($instance['text1']) ? $instance['text1'] : '';
        $text2 = !empty($instance['text2']) ? $instance['text2'] : '';
        ?>
      
        <p>
            <label for="<?php echo $this->get_field_id('image_url'); ?>">Image URL:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('image_url'); ?>" name="<?php echo $this->get_field_name('image_url'); ?>" type="text" value="<?php echo esc_attr($image_url); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('text'); ?>">Text:</label>
            <textarea class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo esc_textarea($text); ?></textarea>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'text1' ); ?>">Text:</label>
            <textarea class="widefat" id="<?php echo $this->get_field_id( 'text1' ); ?>" name="<?php echo $this->get_field_name( 'text1' ); ?>" rows="4"><?php echo esc_html( $text1 ); ?></textarea>
        </p>
       
        <p>
            <label for="<?php echo $this->get_field_id( 'text2' ); ?>">Text:</label>
            <textarea class="widefat" id="<?php echo $this->get_field_id( 'text2' ); ?>" name="<?php echo $this->get_field_name( 'text2' ); ?>" rows="4"><?php echo esc_html( $text2 ); ?></textarea>
        </p>

        <?php
    }

    // Lưu dữ liệu cài đặt widget
    public function update($new_instance, $old_instance) {
        $instance = array();
       
        $instance['image_url'] = (!empty($new_instance['image_url'])) ? esc_url($new_instance['image_url']) : '';
        $instance['text'] = (!empty($new_instance['text'])) ? sanitize_textarea_field($new_instance['text']) : '';
        $instance['text1'] = (!empty($new_instance['text1'])) ? sanitize_textarea_field($new_instance['text1']) : '';
        $instance['text2'] = (!empty($new_instance['text2'])) ? sanitize_textarea_field($new_instance['text2']) : '';
        return $instance;
    }
}
//
function register_custom_widget3() {
    register_widget('Custom_Widget3');
}
add_action('widgets_init', 'register_custom_widget3');
class Custom_Widget3 extends WP_Widget {

    // Thiết lập widget
    function __construct() {
        parent::__construct(
            'custom_widget3', // ID của widget
            'Custom Widget3', // Tên hiển thị của widget
            array('description' => 'A custom widget with icon and two texts') // Mô tả của widget
        );
    }

    // Hiển thị widget
    public function widget($args, $instance) {
        echo $args['before_widget'];

        // Hiển thị biểu tượng
        $icon = !empty($instance['icon']) ? $instance['icon'] : 'fa fa-star'; // Mặc định sử dụng class icon "fa fa-star"
        echo ' <div class="custom-wp3 wp3"> <div class="wp-icon" ><i class="' . $icon . '"></i></div>';

        // Hiển thị văn bản thứ nhất
        $text1 = !empty($instance['text1']) ? $instance['text1'] : ''; // Mặc định hiển thị văn bản "First text"
        echo '<div class="custom-wpc3" >' . $text1 . '</div>';

        // Hiển thị văn bản thứ hai
        $text2 = !empty($instance['text2']) ? $instance['text2'] : ''; // Mặc định hiển thị văn bản "Second text"
        echo '<div class="custom-wpt3 ">' . $text2 . '</div></div>';

        echo $args['after_widget'];
    }

    // Hiển thị form cài đặt widget trong trang quản trị
    public function form($instance) {
        $icon = !empty($instance['icon']) ? $instance['icon'] : '';
        $text1 = !empty($instance['text1']) ? $instance['text1'] : '';
        $text2 = !empty($instance['text2']) ? $instance['text2'] : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('icon'); ?>">Icon:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('icon'); ?>" name="<?php echo $this->get_field_name('icon'); ?>" type="text" value="<?php echo esc_attr($icon); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('text1'); ?>">Text 1:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('text1'); ?>" name="<?php echo $this->get_field_name('text1'); ?>" type="text" value="<?php echo esc_attr($text1); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('text2'); ?>">Text 2:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('text2'); ?>" name="<?php echo $this->get_field_name('text2'); ?>" type="text" value="<?php echo esc_attr($text2); ?>">
        </p>
        <?php
    }

    // Lưu dữ liệu khi cập nhật cài đặt widget
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['icon'] = (!empty($new_instance['icon'])) ? sanitize_text_field($new_instance['icon']) : '';
        $instance['text1'] = (!empty($new_instance['text1'])) ? sanitize_text_field($new_instance['text1']) : '';
        $instance['text2'] = (!empty($new_instance['text2'])) ? sanitize_text_field($new_instance['text2']) : '';
        return $instance;
    }
}
///
function register_custom_widget4() {
    register_widget('Custom_Widget4');
}
add_action('widgets_init', 'register_custom_widget4');
class Custom_Widget4 extends WP_Widget {

    // Thiết lập widget
    function __construct() {
        parent::__construct(
            'custom_widget4', // ID của widget
            'Custom Widget4', // Tên hiển thị của widget
            array('description' => 'A custom widget with icon and two texts') // Mô tả của widget
        );
    }

    // Hiển thị widget
    public function widget($args, $instance) {
        echo $args['before_widget'];

        // Hiển thị biểu tượng
        $icon = !empty($instance['icon']) ? $instance['icon'] : 'fa fa-star'; // Mặc định sử dụng class icon "fa fa-star"
        echo ' <div class="custom-wp4 "> <div class="wp-icon" ><i class="' . $icon . '"></i></div>';

        // Hiển thị văn bản thứ nhất
        $text1 = !empty($instance['text1']) ? $instance['text1'] : ''; // Mặc định hiển thị văn bản "First text"
        echo '<div class="custom-wpc3" >' . $text1 . '</div>';

        // Hiển thị văn bản thứ hai
        $text2 = !empty($instance['text2']) ? $instance['text2'] : ''; // Mặc định hiển thị văn bản "Second text"
        echo '<div class="custom-wpt3 ">' . $text2 . '</div></div>';

        echo $args['after_widget'];
    }

    // Hiển thị form cài đặt widget trong trang quản trị
    public function form($instance) {
        $icon = !empty($instance['icon']) ? $instance['icon'] : '';
        $text1 = !empty($instance['text1']) ? $instance['text1'] : '';
        $text2 = !empty($instance['text2']) ? $instance['text2'] : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('icon'); ?>">Icon:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('icon'); ?>" name="<?php echo $this->get_field_name('icon'); ?>" type="text" value="<?php echo esc_attr($icon); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('text1'); ?>">Text 1:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('text1'); ?>" name="<?php echo $this->get_field_name('text1'); ?>" type="text" value="<?php echo esc_attr($text1); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('text2'); ?>">Text 2:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('text2'); ?>" name="<?php echo $this->get_field_name('text2'); ?>" type="text" value="<?php echo esc_attr($text2); ?>">
        </p>
        <?php
    }

    // Lưu dữ liệu khi cập nhật cài đặt widget
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['icon'] = (!empty($new_instance['icon'])) ? sanitize_text_field($new_instance['icon']) : '';
        $instance['text1'] = (!empty($new_instance['text1'])) ? sanitize_text_field($new_instance['text1']) : '';
        $instance['text2'] = (!empty($new_instance['text2'])) ? sanitize_text_field($new_instance['text2']) : '';
        return $instance;
    }
}
