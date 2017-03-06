<?php 
 $filters = '';

foreach( $all_categories as $category_slug => $category_name ){
    $filters .= '<li>
                    <a href="#" data-filter=".'.$category_slug.'">'.$category_name.'</a>
                </li>';
}

$filters =  '<ul id="filters_view" class="clean-list filter-cats margin-top-100 center-me">
                <li>
                    <a href="#" class="active" data-filter="*">'.$shortcode['all_button'].'</a>
                </li>'.$filters.'</ul>';
?>

<div class="container">
    <div class="gallery-wrap">
        
        <?php echo $filters; ?>
        
        <ul id="gallery_view" class="clean-list filter-items gallery-items margin-double-top">
            <li class="row">
            
            <?php foreach( $slides as $i => $slide ):
                    $size = null;

                    switch ($slide['options']['size']) {
                        case 'default':
                            $size = 4;
                            break;
                        case 'original':
                            $size = 12;
                            break;
                        case 'half':
                            $size = 6;
                            break;
                        case 'third':
                            $size = 4;
                            break;
                        default:
                            $size = 4;
                            break;
                    }
                ?>
                <?php 
                    $cats = '';
                    foreach ($slide['categories'] as $slug => $category){
                        $cats .= $slug.' ';
                    }
                ?>
                
                
                    <div class="col-md-<?php echo $size ?> col-sm-<?php echo $size ?> col-xs-12 gallery-item  <?php echo trim($cats); ?>">
                        <figure>
                            <a href="<?php echo $slide['options']['photo'] ?>" class="zoom-image"><img src="<?php echo $slide['options']['photo'] ?>" alt=""></a>
                            <a href="<?php echo $slide['options']['photo'] ?>" target="_blank" class="link-image"></a>
                        </figure>
                    </div>

            <?php endforeach; ?>
                </li>
        </ul>
    </div>
</div>