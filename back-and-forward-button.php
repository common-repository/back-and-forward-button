<?php
/* 
Plugin Name: Back and Forward Button
Plugin URI: https://store.devilhunter.net/wordpress-plugin/back-and-forward-button/
Description:  This Plugin will automatically match your Theme's style. Go to Appearance > Widgets, and drag 'Plugin' in sidebar or footer or into any widgetized area. Insert into page or post by Page Builder. There is no need to use any short-code or to edit settings. Theme must be non-block Theme. 
Version: 1.0
Author: Tawhidur Rahman Dear
Author URI: https://www.tawhidurrahmandear.com/
Text Domain: tawhidurrahmandearthirty
License: GPLv2 or later 
 
 */
 
 
// Prevent direct file access
if ( ! defined ( 'ABSPATH' ) ) {
	exit;
}
// 

 
class tawhidurrahmandearthirtyWidget extends WP_Widget {
  function tawhidurrahmandearthirtyWidget() {
    $widget_ops = array('classname' => 'tawhidurrahmandearthirtyWidget', 'description' => 'Drag the Plugin in sidebar or footer. Insert into page or post by Page Builder' );
    $this->WP_Widget('tawhidurrahmandearthirtyWidget', 'Back and Forward Button', $widget_ops);
  }
 
  function form($instance) {
    $instance = wp_parse_args((array) $instance, array( 'title' => '' ));
    $title = $instance['title'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title (optional) :<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
<?php
  }
 
  function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }
 
  function widget($args, $instance) {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
      echo $before_title . $title . $after_title;;
 
 ?>

<body>
<div align="center">
<form>
<input type="button" value="◄" onclick="history.back()">
<input type="button" value="►" onclick="history.forward()">
</form>
</div>
</body>
 
<?php
 
    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("tawhidurrahmandearthirtyWidget");') );?>