<?php
 // POPULAR POST WIDGET
 class quick_links extends WP_Widget {
 
    function __construct() {
        parent::__construct(
                'quick_links',
                '['.THEME_PRETTY_NAME.'] Quick - Links',
                array(
                    'description' => __('Shows your links.', 'cuisinier'),
                    'classname' => 'widget_quick_links',
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

        echo !empty($title) ? $before_widget.'<div class="col-md-4"><div class="widget">'. $before_title . $widget_title . $after_title : $before_widget.'<div class="col-md-4"><div class="widget">'; 
        ?>


        <nav class="responsive-nav footer-nav">
            <ul class="clean-list clearfix">
               <?php wp_nav_menu( array( 
                    'title_li'=>'',
                    'theme_location' => 'primary',
                    'container' => false,
                    'items_wrap' => '%3$s',
                    'depth'      => 1,
                    'fallback_cb' => 'wp_list_pages'
                )); ?>
            </ul>
        </nav>

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
 
add_action('widgets_init', create_function('', 'return register_widget("quick_links");')); ?>