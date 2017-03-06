<?php
 // POPULAR POST WIDGET
 class recent_posts extends WP_Widget {
 
    function __construct() {
        parent::__construct(
                'recent_posts',
                '['.THEME_PRETTY_NAME.'] Recent Posts',
                array(
                    'description' => __('Shows your recent posts.', 'cuisinier'),
                    'classname' => 'widget_recent_entries',
                )
        );
    }

 
    function widget($args, $instance){
        extract($args);
        //$options = get_option('custom_recent');
        $title = $instance['title'];
        $number = $instance['posts'];

        //global $postcount;

        echo !empty($title) ? $before_widget.$before_title .$title.$after_title : $before_widget; 
        ?>
    <?php 
    $args = array(       
        //Type & Status Parameters
        'post_type'   => 'post',
        'post_status' => 'publish',
        'posts_per_page' => $number,
        'ignore_sticky_posts' => 1,
        
        //Order & Orderby Parameters
        'order' => 'DESC',
        'orderby' => 'date',
    );
    $query = new WP_QUERY( $args ); ?>
    
    

        <?php if ( $query->have_posts() ) : ?>
            <ul class="clean-list ovh margin-top row">
            <?php while( $query->have_posts() ): $query->the_post() ?>
                <li class="col-md-12 col-sm-6  no-margin">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-3 no-padding">
                            <?php if (has_post_thumbnail()): 
                                $post_thumbnail_id = get_post_thumbnail_id();
                                $post_thumbnail_url = wp_get_attachment_thumb_url( $post_thumbnail_id );
                            ?>
                                <figure class="">
                                    <a href="<?php the_permalink(); ?>"><img src="<?php echo $post_thumbnail_url; ?>" alt="<?php echo the_title(); ?>"></a>
                                </figure>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-9 no-padding">
                            <div class="entry-content">
                                <a href="<?php the_permalink(); ?>" class="entry-title"><?php the_title(); ?></a>
                                <time datetime="<?php the_time('Y-m-d'); ?>"><img alt="<?php _ex('Time Icon', 'cuisinier'); ?>" src="<?php echo IMAGES.'icons/time-icon.png' ?>"><?php the_time('F d, Y'); ?></time>
                            </div>
                        </div>
                    </div>
                </li>
            <!-- a href="<?php the_permalink() ?>"><?php //echo substr(strip_tags(get_the_content()), 0, 80);  ?>...</a></p -->

            <?php endwhile; ?>
        </ul>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>



    
    <?php echo $after_widget;

    }
 
    function update($newInstance, $oldInstance){
        $instance = $oldInstance;
        $instance['title'] = strip_tags($newInstance['title']);
        $instance['posts'] = $newInstance['posts'];
        return $instance;
    }
 
    function form($instance){
        echo '<p ><label  for="'.$this->get_field_id('title').'">' . __('Title:', 'widgets') . '  <input style="width: 200px;" id="'.$this->get_field_id('title').'"  name="'.$this->get_field_name('title').'" type="text"  value="'.$instance['title'].'" /></label></p>';
        
        echo '<p ><label  for="'.$this->get_field_id('posts').'">' . __('Number of Posts:',  'widgets') . ' <input style="width: 50px;"  id="'.$this->get_field_id('posts').'"  name="'.$this->get_field_name('posts').'" type="text"  value="'.$instance['posts'].'" /></label></p>';

        echo '<input type="hidden" id="custom_recent" name="custom_recent" value="1" />';
    }
}
 
add_action('widgets_init', create_function('', 'return register_widget("recent_posts");')); ?>