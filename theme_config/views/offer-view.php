<div class="slider-wrap alignright margin-top-50">
    <ul id="round_slider" class="clean-list offers-slider round-slider">

        <?php foreach( $slides as $i => $slide ): ?>
            <?php if (has_post_thumbnail($slide['post']->ID)): 
                $post_thumbnail_id = get_post_thumbnail_id( $slide['post']->ID );
                $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
            ?>
                <li><a href="<?php echo $slide['options']['image_url'] ?>"><img src="<?php echo $post_thumbnail_url; ?>" alt="<?php get_the_title($slide['post']->ID); ?>" /></a><i style="<?php echo $slide['options']['label'] ? 'background-image: url('.$slide['options']['label'].');' : ''; ?>"></i></li>
            <?php endif; ?>

        <?php endforeach; ?>    
    </ul>

    <div class="aligncenter">
        <div id="carousel-controls" class="round-controls inline ovh margin-top">
        <?php 
            for($count = count($slides), $i = $count; $i > 0; $i--){
                $current = $i == 1 ? 'current' : '';
                echo '<span class="control '.$current.'"></span>';
            }
        ?>
        </div>
    </div>
</div>
