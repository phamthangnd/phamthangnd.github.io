<?php
 // POPULAR POST WIDGET
 class follow_us extends WP_Widget {
 
    function __construct() {
        parent::__construct(
                'follow_us',
                '['.THEME_PRETTY_NAME.'] Follow - Us',
                array(
                    'description' => __('Follow Us.', 'cuisinier'),
                    'classname' => 'widget_follow_us',
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

        <div class="socials">
            <ul class="clean-list social-links clearfix">
                <?php $social_platforms = array(
                    'facebook',
                    'twitter',
                    'pinterest',
                    'google'
                    );


                    foreach($social_platforms as $platform): 
                        if (_go('social_platforms_' . $platform)):?>
                            <li>
                                <a href="<?php echo _go('social_platforms_' . $platform) ?>">
                                    <img src="<?php echo IMAGES.'socials/'.$platform.'.png' ?>" alt="<?php echo $platform ?>">
                                    <span><?php echo $platform ?></span>
                                </a>
                            </li>
                        <?php endif;
                    endforeach;?>    
            </ul>
        </div>

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
 
add_action('widgets_init', create_function('', 'return register_widget("follow_us");')); ?>