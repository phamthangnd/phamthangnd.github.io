<?php
 // POPULAR POST WIDGET
 class subscribe extends WP_Widget {
 
    function __construct() {
        parent::__construct(
            'subscribe',
            '['.THEME_PRETTY_NAME.'] Subscribe',
            array(
                'description' => __('Subscribe to our newsletter.', 'cuisinier'),
                'classname' => 'widget_subscribe',
            )
        );
    }
 
    function widget($args, $instance){
        extract($args);

        $title = $instance['title'];
        $parts = explode(" ", $title);
        $widget_title = '';
        
        for($counter = count($parts), $i = 0; $i < $counter; $i++){
            $widget_title .= $counter-1 === $i ? '<strong>'.$parts[$i].'</strong>' : $parts[$i].' ';
        }

        echo !empty($title) ? $before_widget.'<div class="col-md-4"><div class="widget subscribe_widget">'. $before_title . $widget_title . $after_title : $before_widget.'<div class="col-md-4"><div class="widget">'; 
        ?>

        <form id="subscription_form" class="subscription" data-tt-subscription method="post" action="#">
            <input type="text" name="email" id="email" data-tt-subscription-required data-tt-subscription-type="email" class="subscription-line" />
            <input type="submit" id="result_container" value="<?php echo _x('Submit','subscribe widget','cuisinier'); ?>" />
        </form>


    <?php echo $after_widget.'</div></div>';
    }
 
    function update($newInstance, $oldInstance){
        $instance = $oldInstance;
        $instance['title'] = strip_tags($newInstance['title']);
        return $instance;
    }
 
    function form($instance){
        echo '<p ><label  for="'.$this->get_field_id('title').'">' . __('Title:', 'widgets') . '  <input style="width: 200px;" id="'.$this->get_field_id('title').'"  name="'.$this->get_field_name('title').'" type="text"  value="'.$instance['title'].'" /></label></p>';
    }
}
 
add_action('widgets_init', create_function('', 'return register_widget("subscribe");')); ?>