<?php
define('IMAGES', get_template_directory_uri() . '/images/');
/***********************************************************************************************/
/*  Tesla Framework */
/***********************************************************************************************/
require_once(get_template_directory() . '/tesla_framework/tesla.php');

/***********************************************************************************************/
/*  Register Plugins */
/***********************************************************************************************/
if ( is_admin() && current_user_can( 'install_themes' ) ) {
    require_once( get_template_directory() . '/plugins/tgm-plugin-activation/register-plugins.php' );
}

/***********************************************************************************************/
/* Load JS and CSS Files - done with TT_ENQUEUE */
/***********************************************************************************************/

/***********************************************************************************************/
/* Google fonts + Fonts changer */
/***********************************************************************************************/
TT_ENQUEUE::$base_gfonts = array('://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700|Open+Sans:400,700|Marmelad');

TT_ENQUEUE::$gfont_changer = array(
        _go('logo_text_font'),
        _go('main_content_text_font'),
        _go('sidebar_text_font'),
        _go('menu_text_font')
    );

TT_ENQUEUE::add_js(array('http://w.sharethis.com/button/buttons.js'));


/***********************************************************************************************/
/* Custom CSS */
/***********************************************************************************************/
add_action('wp_enqueue_scripts', 'tesla_custom_css', 99);
function tesla_custom_css() {
    $custom_css = _go('custom_css') ? _go('custom_css') : '';
    wp_add_inline_style('tt-main-style', $custom_css);
}

add_action('wp_enqueue_scripts', 'tt_color_changers',99);

function tt_color_changers(){
    $background_color = _go('bg_color') ;
    $background_image = _go('bg_image') ;
    if ( !empty($background_color) ) {
        wp_add_inline_style('tt-main-style', "body{background: $background_color;}");
    }
    if ( !empty($background_image) ) {
        wp_add_inline_style('tt-main-style', "body{background-image: url('$background_image')}");
    }

    $colopickers_css = '';

    if (_go('site_color')) : 
        $colopickers_css .= '.background-orange,
                            .section header > .entry-wrapper > hr,
                            .main-slider ul li .more,
                            .round-controls .current,
                            .section-about-us .container header hr,
                            .bar,
                            .section-gallery .gallery-list a,
                            .section-contact .contact-form input[type="submit"]:hover,
                            .comment-form input[type="submit"],
                            .single-dishes .i-cube:before,
                            .filter-cats li > [class^="icon-"]:hover:before,
                            .filter-cats li > .active:before,
                            .page-slider li .entry-title:before,
                            .blog-slider li .entry-title:before,
                            .blog-slider figure figcaption a,
                            .section-footer footer .subscription input[type="submit"],
                            .post-password-form input[type="submit"]{
                                background-color: ' . _go('site_color') . ';
                            }

                            .star-rating:before,
                            .star-rating span:before,
                            .responsive-nav > ul > li > a:hover,
                            .responsive-nav > ul > li:hover > a,
                            .responsive-nav > ul > li ul a:hover,
                            .responsive-main-nav > ul > li ul a,
                            .responsive-main-nav > ul > li li:hover > a,
                            nav ul .current-menu-item > [class^="icon-"]:before,
                            .responsive-nav > ul > .current-menu-item > a,
                            .responsive-nav > ul:hover .current-menu-item:hover > a,
                            .bar-container-wrap .entry-title,
                            .bar-percentage,
                            .ingredients-block .entry-title,
                            .page-content .ingredients-title,
                            .home-nav li > [class^="icon-"],
                            body > nav li > [class^="icon-"],
                            .filter-cats li > [class^="icon-"],
                            nav li > [class^="icon-"]:before,
                            .filter-cats li > [class^="icon-"]:before,
                            nav ul li > [class^="icon-"]:hover:before,
                            .dishes-list .entry-title a:hover,
                            .dishes-list .cook-time strong,
                            .page-blog .blog-posts-list > li .entry-title a:hover,
                            .page-content .post-nav a:hover,
                            .page-slider li .entry-title a:hover,
                            .blog-slider li .entry-title a:hover,
                            .blog-slider .read-more,
                            .blog-slider .date,
                            .gallery-wrap .filter-cats a:hover,
                            .widget_recent_comments > ul li a:hover,
                            .widget_meta ul li a:hover,
                            .widget_archive ul li a:hover,
                            .widget_categories ul li a:hover,
                            table > tbody th a:hover,
                            .page-post .post-photo .meta-list li a:hover,
                            .blog-posts-list .tag-list:hover,
                            .blog-posts-list .tag-list a:hover,
                            .blog-posts-list .cat-list a:hover,
                            .page-post .tag-list:hover,
                            .page-post .tag-list a:hover,
                            .page-post .cat-list a:hover,
                            .widget_pages ul li a:hover,
                            .widget_nav_menu ul li a:hover,
                            .widget_rss li:hover{
                                color: ' . _go('site_color') . ';
                            }

                            nav ul .current-menu-item > [class^="icon-"]:before, 
                            .responsive-nav > ul > .current-menu-item > a, 
                            .responsive-nav > ul:hover .current-menu-item:hover > a{
                                color: ' . _go('site_color') . ' !important;
                            }

                            .section-contact .contact-form input[type="submit"]:hover,
                            nav li > [class^="icon-"]:before,
                            .filter-cats li > [class^="icon-"]:before,
                            .gallery-wrap .filter-cats a:hover,
                            .post-password-form input[type="submit"]{
                                border-color: ' . _go('site_color') . ';
                            }

                            .section-about-us .orange-border{
                                box-shadow: 0 0 0 14px ' . _go('site_color') . ';
                            }';
    endif;

    if (_go('site_color_2')) :
        $colopickers_css .= '.responsive-nav > ul > li ul a,
                            .responsive-page-nav > ul > li ul a,
                            .section header > .entry-title-desc,
                            .section-food-drinks .entry-title,
                            .section-gallery .entry-title,
                            .section-blog .entry-title,
                            .section-offer .entry-title,
                            .page-slider li p,
                            .blog-slider li p,
                            .comment-form input[type="text"],
                            .comment-form textarea,
                            .comments-block .entry-title,
                            .comment-block .comment-meta,
                            .comment-block .comment-text p,
                            .comment-block .comment-reply a,
                            .comment-respond .entry-title,
                            .comment-respond small a,
                            .error404 .entry-title span,
                            .page-search  header > .entry-title i,
                            .single-dishes .tag-list a,
                            .single-dishes .cat-list li,
                            .single-dishes .rating-block span,
                            .single-dishes .rating-block .star-rating:before,
                            .ingredients-list li,
                            .page-post .entry-content .entry-header,
                            .page-post .post-photo .meta-list li time,
                            .page-post .post-photo .meta-list li a,
                            .page-content .post-nav a,
                            .blog-posts-list .tag-list,
                            .blog-posts-list .tag-list a,
                            .blog-posts-list .cat-list a,
                            .page-post .tag-list,
                            .page-post .tag-list a,
                            .page-post .cat-list a,
                            .section-slider header .entry-title,
                            .widget > h3,
                            .widget_search input[type="text"],
                            .widget_recent_comments > ul li a,
                            .widget_meta ul li a,
                            .widget_archive ul li a,
                            .widget_categories ul li a,
                            .widget_recent_comments > ul li,
                            .widget_recent_comments > ul .recentcomments a,
                            .widget_recent_entries .entry-content,
                            .widget_recent_entries  .entry-title,
                            .widget_tag_cloud div a,
                            .page-numbers li,
                            .page-numbers a,
                            .share-links .entry-title,
                            .twitter_widget ul li,
                            .twitter_widget ul li .date,
                            footer p{
                                color: ' . _go('site_color_2') . ';
                            }

                            .widget_tag_cloud div a:hover,
                            .page-numbers a:hover, 
                            .page-numbers .current{
                                background-color: ' . _go('site_color_2') . ';
                            }
                            
                            .contact-form input[type="text"], 
                            .contact-form textarea,
                            .comment-form input[type="text"], 
                            .comment-form textarea,
                            .widget > h3,
                            .widget_search input[type="text"],
                            .widget_tag_cloud div a,
                            .page-numbers a,
                            .page-numbers span{
                                border-color: ' . _go('site_color_2') . ';
                            }';
    endif;

    wp_add_inline_style('tt-main-style', $colopickers_css);

    //Custom Fonts Changers
    wp_add_inline_style('tt-main-style', tt_text_css('main_content_text','.content, .content p, p, .page-slider li p, .blog-slider li p, .dishes-list p'));
    wp_add_inline_style('tt-main-style', tt_text_css('sidebar_text','.main-sidebar,.main-sidebar .widget,.main-sidebar a,.main-sidebar p, .main-sidebar .widget h3, .main-sidebar .widget li a, .main-sidebar .widget h3 a, .widget .tab-content .entry-title a'));
    wp_add_inline_style('tt-main-style', tt_text_css('menu_text','.main-nav, .main-nav ul li a'));
}

/***********************************************************************************************/
/* Custom JS */
/***********************************************************************************************/
function tesla_custom_js() {
    ?>
    <script type="text/javascript"><?php echo esc_js(_eo('custom_js')) ?></script>
    <?php
}

add_action('wp_footer', 'tesla_custom_js', 99);

/* Register Contact Form Locations */
/***********************************************************************************************/
TT_Contact_Form_Builder::add_form_locations(array(
        'footer'=>'Footer'
));

/***********************************************************************************************/
/* Add Menus */
/***********************************************************************************************/

function tt_register_menus(){
    register_nav_menus(
        array(
            'primary'    => _x('Primary menu', 'dashboard', 'cuisinier'),
            'secondary'    => _x('Footer menu', 'dashboard', 'cuisinier')
        )
    );
}
add_action('init', 'tt_register_menus');


/***********************************************************************************************/
/* Add Shortcodes */
/***********************************************************************************************/

require_once(TT_THEME_DIR . '/shortcodes.php');

/***********************************************************************************************/
/* Add Widgets */
/***********************************************************************************************/

require_once(TT_THEME_DIR . '/widgets/widget-socials.php');
require_once(TT_THEME_DIR . '/widgets/widget-subscribe.php');
require_once(TT_THEME_DIR . '/widgets/widget-links.php');
require_once(TT_THEME_DIR . '/widgets/widget-recent.php');
require_once(TT_THEME_DIR . '/widgets/widget-twitter.php');

/* ========================================================================================================================

  Comments

  ======================================================================================================================== */
 
function tt_custom_comments( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
?>
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
        <?php if ( 'div' != $args['style'] ) : ?>
            <div id="div-comment-<?php comment_ID() ?>" class="tt-comment">
        <?php endif; ?>

        <span class="tt-avatar">
            <?php if ($args['avatar_size'] != 0)
                echo get_avatar( $comment, $args['avatar_size'] ); ?>
        </span>

        <div class="comment-block">


            <span class="comment-reply">
                <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
            </span>

            <div class="comment-meta commentmetadata">
                <?php edit_comment_link(__('(Edit)','cuisinier'),'  ','' );?>
                
                <div class="author-wrap">
                    <?php echo get_comment_author_link() ?>
                    <span class="comment-info"><i>at </i><?php echo get_comment_time('d M Y') ?></span>
                </div>
            </div>

            <div class="comment-text">
                <?php comment_text() ?>
            </div>
          </div>
            <?php if ($comment->comment_approved == '0') : ?>
                <em class="comment-awaiting-moderation">
                    <?php _e('Your comment is awaiting moderation.','cuisinier') ?>
                </em>
            <?php endif; ?>

    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; 

}

function tt_custom_comments_closed( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
    
    if($comment->comment_type == 'pingback' || $comment->comment_type == 'trackback'):?>
        <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
            
            <?php if ( 'div' != $args['style'] ) : ?>
                <div id="div-comment-<?php comment_ID() ?>" class="tt-comment">
            <?php endif; ?>

            <span class="tt-avatar">
                <?php if ($args['avatar_size'] != 0)
                    echo get_avatar( $comment, $args['avatar_size'] ); ?>
            </span>

            <?php if ($comment->comment_approved == '0') : ?>
                <em class="comment-awaiting-moderation">
                    <?php _e('Your comment is awaiting moderation.','cuisinier') ?>
                </em>
                <br />
            <?php endif; ?>

            <div class="comment-block">
                <div class="comment-meta commentmetadata">
                    <?php edit_comment_link(__('(Edit)','cuisinier'),'  ','' );?>

                    <span class="comment-reply">
                        <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                    </span>
                    
                    <div class="author-wrap">
                        <?php echo get_comment_author_link() ?>
                        <span class="comment-info"><i> <?php _e("at","cuisinier"); ?> </i><?php echo get_comment_time('d M Y') ?></span>
                    </div>
                </div>
                
                <div class="comment-text">
                    <?php comment_text() ?>
                </div>
            </div>
        <?php if ( 'div' != $args['style'] ) : ?>
            </div>
        <?php endif; ?>
    <?php endif; 

}

/***********************************************************************************************/
/* Add Sidebar Support */
/***********************************************************************************************/
function tt_register_sidebars(){
    if (function_exists('register_sidebar')) {
        register_sidebar(
            array(
                'name'           => __('Blog Sidebar', 'cuisinier'),
                'id'             => 'blog',
                'description'    => __('Blog Sidebar Area', 'cuisinier'),
                'before_widget'  => '<div class="widget widget-item %2$s">',
                'after_widget'   => '</div>',
                'before_title'   => '<h3>',
                'after_title'    => '</h3>'
            )
        );
        register_sidebar(
            array(
                'name'           => __('Footer', 'cuisinier'),
                'id'             => 'footer',
                'description'    => __('Footer Sidebar Area', 'cuisinier'),
                'before_widget'  => '',
                'after_widget'   => '',
                'before_title'   => '<h2 class="entry-title">',
                'after_title'    => '</h2>'
            )
        );
    }
}
add_action('widgets_init','tt_register_sidebars');

//calculates width for each widget in footer area 
function tt_footer_sidebar_params($params) {

    $sidebar_id = $params[0]['id'];

    if ( $sidebar_id == 'footer' ) {
        $total_widgets = wp_get_sidebars_widgets();
        $sidebar_widgets = count($total_widgets[$sidebar_id]);
        $params[0]['before_widget'] = str_replace('class="', 'class="span' . floor(12 / $sidebar_widgets), $params[0]['before_widget']);
    }

    return $params;
}
add_filter('dynamic_sidebar_params','tt_footer_sidebar_params');
// add post-formats to post
//add_theme_support('post-formats', array('quote', 'gallery', 'video', 'audio', 'image'));



function tt_share(){
    $share_this = _go('share_this');
    if(isset($share_this)): ?>
        <div class="share-it">
            <ul class="clean-list socials">
                <?php foreach($share_this as $val): ?>
                    <li>
                        <span class='st_<?php echo $val ?>_large ' st_username="<?php echo  $val == "youtube" ? (_go("youtube_subscribe") ? _eo("youtube_subscribe") : "TeslaThemes")  : "" ?>" displayText='<?php echo ucfirst($val) ?>'></span>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="clear"></div>
        </div>
    <?php endif;
}

add_image_size('home-blog-thumb',178,178);

/*==== Function Call custom meta boxex ====*/
function tt_video_or_image_featured($echo = false) {
    global $post;
    $embed_code = get_post_meta($post->ID , THEME_NAME . '_video_embed', true);
    $patern = '<div class="entry-cover">%s</div>';

    if($echo){

        if(!empty($embed_code)) {
            return sprintf($patern, $embed_code);
        }else {
            if( has_post_thumbnail() && ! post_password_required() ){
                return sprintf($patern, get_the_post_thumbnail());
            }
        }

    }else{

        if(!empty($embed_code)) {
            printf($patern, $embed_code);
        }else {
            if( has_post_thumbnail() && ! post_password_required() ){
                printf($patern, get_the_post_thumbnail());
            }
        }

    }
}

/*==== Custom form builder ====*/
function tt_custom_form_builder() {
    $fields = _go_repeated('Form builder');
    $output = '';
    $left = array();
    $right = array();
    $full = array();
    $offset = '';
    $before_submit = _go('custom_form_info');
    $button = _go('custom_form_button');
    $field_counter = 0;

    if(!empty($fields)) {
        $output = '<form class="project-form"><div class="row">';
        foreach ($fields as $key => $val) {
            if($val['custom_input_position'] == '1') {
                $left[] = $val;
            }elseif($val['custom_input_position'] == '2') {
                $right[] = $val;                    
            }else{
                $full[] = $val;                    
            }
        }

        $output .= ' <div class="span6">';
        if(!empty($left)) {
            $output .= tt_form_fields($left);
            $counter = count($left);
        }else {
            $counter = 0;
            $offset = 'offset6';
        }
        $output .= ' </div>'; 
        if(!empty($right)) {
            $output .= ' <div class="span6 '.$offset.'">';
            $output .= tt_form_fields($right,$counter);
            $output .= ' </div>';
            $counter = count($left)+count($right);
        }
        if(!empty($full)) {
            $output .= '<div class="span12">';
            $output .= tt_form_fields($full,$counter);
            $output .= ' </div>';
        }
        $output .= '';
        if(!empty($before_submit)) {
            $output .= '<div class="span12">';
            $output .= sprintf('<h5>%s</h5>', $before_submit); 
            $output .= '</div>';               
        }
        if(empty($button)) {
            $button = 'Submit';
        }
        $output .= '<div class="span12">';
        $output .= sprintf('<input type="submit" value="%s" class="project-button">', $button);
        $output .= '</div></div></form>';
    }

    return $output;
}

/*==== Custom form fields ====*/
function tt_form_fields($fields,$i=0) {
    $output     = '';
    $span       = 'span12';

    if(!empty($fields)) {
        foreach ($fields as $key => $val) {
            $i++;
            if(!empty($val['custom_input_type'])) {
                if($val['custom_input_size'] === '12') {
                    $span = 'span12';
                } else if($val['custom_input_size'] === '6') {
                    $span = 'span6';
                }
            }

            $output .= '<div class="row-fluid"><div class="'.$span.'">';
                /*if(!empty($val['custom_input_label'])){
                    $output .= sprintf('<p>%s</p>', $val['custom_input_label']);                    
                }*/
                if(!empty($val['custom_input_type'])) {
                    $type = $val['custom_input_type'];
                    $n = 'field_'. $i;

                    if($type === 'text' || $type === 'email') {
                        $output .= sprintf('<input type="text" name="%1$s" value="%2$s" placeholder="%3$s" class="project-line" />', $n, $val['custom_form_value'], $val['custom_form_placeholder']);
                    }
                    if($type === 'select') {
                        $n = 'field_'. $i;
                        if(!empty($val['custom_form_value'])) {
                            $options    = '';
                            $content    = str_replace(', ', ',', $val['custom_form_value']);
                            $content    = explode(',', $content);
                            $content    = array_filter($content);
                            $j          = 0;

                            if(!empty($val['custom_form_placeholder'])) {
                                $options .= sprintf('<option value="0">%2$s</option>', $j, $val['custom_form_placeholder']);
                            }

                            foreach ($content as $key => $val) {
                                $j++;
                                $options .= sprintf('<option value="%1$s">%2$s</option>', $val, $val);
                            }
                        }
                        $output .= sprintf('<select name="%1$s" class="project-select">%2$s</select>', $n, $options);
                    }
                    if($type === 'textarea') {
                        $output .= sprintf('<textarea name="%1$s" value="%2$s" placeholder="%3$s" class="project-area"></textarea>', $n, $val['custom_form_value'], $val['custom_form_placeholder']);
                    }
                }
            $output .= '</div></div>';
        }

    }
    return $output;
}

function tt_ajax_custom_form () {
    $receiver_mail = _go('custom_form_email');
    $mail_title    = '"'._go('custom_form_title').'" - form was sent';
    $fields        = _go_repeated('Form builder');

    $i = '';

    $message = '<table style="margin: 0 auto; border: 1px solid #dddddd;"><tbody>';
        foreach ($fields as $key => $val) {
            $i++;
            $message .= sprintf('<tr><td style="padding: 10px;border-bottom: 1px solid #ddd;">%1$s</td><td style="padding: 10px;border-bottom: 1px solid #ddd;border-left: 1px solid #ddd;">%2$s</td></tr>', $val['custom_input_label'], $_POST['field_'.$i]);
        }
    $message .= '</tbody></table>';

    $header  = 'MIME-Version: 1.0' . "\r\n";
    $header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $header .= 'Submited form from -' . get_bloginfo('name');
    
    if ( mail( $receiver_mail, $mail_title, $message, $header ) )
            $result = __('Message successfully sent.', 'cuisinier');
        else
            $result = __('Message could not be sent.', 'cuisinier');

    die($result);
}
add_action('wp_ajax_tt_ajax_custom_form', 'tt_ajax_custom_form');           // for logged in user  
add_action('wp_ajax_nopriv_tt_ajax_custom_form', 'tt_ajax_custom_form');    // if user not logged in

function tt_ajax_contact_form () {
    $receiver_mail = (_go('email_contact')) ? _go('email_contact') : get_bloginfo( 'admin_email' );

    $header = '';
    if (!empty($_POST['name']) && !empty($_POST ['email']) && !empty($_POST ['message'])) {
        $mail_title = (!empty($_POST['website'])) ? $_POST['name'] . ' from ' . $_POST['website'] : ' from ' . get_bloginfo( 'name' ) . ' Contact form';
        $email = $_POST['email'];
        $message = $_POST['message'];
        $message = wordwrap($message, 70, "\r\n");
        $header .= 'From: ' . $_POST['name'] . "\r\n";
        $header .= 'Reply-To: ' . $email;
    
        if ( wp_mail( $receiver_mail, $mail_title, $message, $header ) )
            $result = __('Message successfully sent.', 'cuisinier');
        else
            $result = __('Message could not be sent.', 'cuisinier');
    }else
        $result = __('Please fill all the fields','cuisinier');
    die($result);
}
add_action('wp_ajax_tt_ajax_contact_form', 'tt_ajax_contact_form');           // for logged in user  
add_action('wp_ajax_nopriv_tt_ajax_contact_form', 'tt_ajax_contact_form');    // if user not logged in

//Search page
function cut_shortcodes($content) {
    return preg_replace('@\[.*?\]@', '', $content);
}

class Menu_With_Description extends Walker_Nav_Menu {
      function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $value . $class_names .'>';

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;
        $item_attr = $atts['title'] ? $atts['title'] : 'menu-icon';
        if(strlen($item_attr) < 20):
        $item_output .= '<a'. $attributes .' class="'.$item_attr.'">';
        else :
        $item_output .= '<a'. $attributes .' class="icon-"><img src="'.$item_attr.'">';
        endif;
        $item_output .= $args->link_before . apply_filters( 'the_title', strip_tags($item->title), $item->ID ) . (''!==$item->description?'<span>'.$item->description.'</span>':'') . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
  }


class Displaywp_Walker_Page extends Walker_Page {
    function start_el( &$output, $page, $depth = 0, $args = array(), $current_page = 0 ) {
        if ( $depth )
            $indent = str_repeat("\t", $depth);
        else
            $indent = '';

        extract($args, EXTR_SKIP);
        $css_class = array('page_item', 'page-item-'.$page->ID);

        if( isset( $args['pages_with_children'][ $page->ID ] ) )
            $css_class[] = 'page_item_has_children';

        if ( !empty($current_page) ) {
            $_current_page = get_post( $current_page );
            if ( in_array( $page->ID, $_current_page->ancestors ) )
                $css_class[] = 'current_page_ancestor';
            if ( $page->ID == $current_page )
                $css_class[] = 'current_page_item';
            elseif ( $_current_page && $page->ID == $_current_page->post_parent )
                $css_class[] = 'current_page_parent';
        } elseif ( $page->ID == get_option('page_for_posts') ) {
            $css_class[] = 'current_page_parent';
        }

        $css_class = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );

        if ( '' === $page->post_title )
            $page->post_title = sprintf( __( '#%d (no title)', 'cuisinier' ), $page->ID );

        $output .= $indent . '<li class="' . $css_class . '"><a href="' . get_permalink($page->ID) . '">' . $link_before . apply_filters( 'the_title', strip_tags($page->post_title), $page->ID ) . $link_after . '</a>';

        if ( !empty($show_date) ) {
            if ( 'modified' == $show_date )
                $time = $page->post_modified;
            else
                $time = $page->post_date;

            $output .= " " . mysql2date($date_format, $time);
        }
    }
}
