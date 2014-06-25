<?php
/**
 * Including the options panel
 *
 * @since OmaGue 0.3
 */
if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
	require_once dirname( __FILE__ ) . '/inc/options-framework.php';
}

/**
 * Enqueue scripts and styles
 *
 * @since OmaGue 0.1
 */
define( 'OMAGUE', '1.5' );
add_action( 'wp_enqueue_scripts', 'omague_enqueue_scripts' );
add_action( 'wp_head', 'omague_print_ie_scripts');
add_action( 'wp_footer', 'omague_selectnav_scripts');

function omague_enqueue_scripts() {
if( is_home() || is_category() || is_tag() || is_search() || is_month() || is_author() ) {
wp_enqueue_style( 'omague-style', get_template_directory_uri().'/style-home.css', array(), '1.5');
} else {
wp_enqueue_style( 'omague-style', get_template_directory_uri() . '/style.css', array(), '1.5');
}
	if ( is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

wp_enqueue_script( 'omague-responsive-menu', get_template_directory_uri() . '/js/selectnav.js', array( 'jquery' ), '1.1');
}

function omague_print_ie_scripts() {
  ?>
<!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script><![endif]-->
  <?php
}

function omague_selectnav_scripts() {
  ?>
<script type='text/javascript'>selectnav('nav', {label: 'Main Menu', nested: true, indent: '&raquo;'});</script>
  <?php
}

/**
 * Setup function
 *
 * @since OmaGue 0.1
 */
function omague_setup() {
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 900;
	load_theme_textdomain( 'omague', get_template_directory() . '/languages' );
	add_editor_style();
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('custom-background');
	register_nav_menus( array('primary' => __( 'Primary Menu', 'omague' ), ) );
	}
add_action( 'after_setup_theme', 'omague_setup' );

/**
 * Default menu fallback function
 *
 * @since OmaGue 0.1
 */
function omague_default_menu() {
	echo '<nav class="main-nav"><ul id="nav">'. wp_list_pages('title_li=&echo=0') .'</ul></nav>';
}

/**
 * Title filter by wp_title()
 *
 * @since OmaGue 0.1
 */
add_filter('wp_title', 'omague_filter_title');
function omague_filter_title( $filter_title ){
	global $page, $paged;

	$filter_title = str_replace( '&raquo;', '', $filter_title );
	$site_description = get_bloginfo( 'description', 'display' );
	$separator = '#124';
	
	if ( is_singular() ) {
		if ( $paged >= 2 || $page >= 2 )$filter_title .=  ', ' . __( 'Page', 'omague' ) . ' ' . max( $paged, $page );
	} else {
		if( ! is_home() )$filter_title .= ' &' . $separator . '; ';
		$filter_title .= get_bloginfo( 'name' );
		if ( $paged >= 2 || $page >= 2 )
			$filter_title .=  ', ' . __( 'Page', 'omague' ) . ' ' . max( $paged, $page );
	}
	if ( is_home() && $site_description )
		$filter_title .= ' &' . $separator . '; ' . $site_description;
	return $filter_title;
}

/**
 * Filter content with empty post title
 *
 * @since OmaGue 0.3
 */
add_filter('the_title', 'omague_untitled');
function omague_untitled($title) {
	if ($title == '') {
		return __('Untitled', 'omague');
	} else {
		return $title;
	}
}

/**
 * Register Sidebar
 *
 * @since OmaGue 0.1
 */
add_action( 'widgets_init', 'omague_widgets_init');
function omague_widgets_init() {
register_sidebar(array(
     'name' => __('Home1','omague'),
     'description' => __('Home Widget 1', 'omague'),
     'before_widget' => '',
     'after_widget' => '',
     'before_title' => '<h3>',
     'after_title' => '</h3>'
));
register_sidebar(array(
     'name' => __('Home2','omague'),
     'description' => __('Home Widget 2', 'omague'),
     'before_widget' => '',
     'after_widget' => '',
     'before_title' => '<h3>',
     'after_title' => '</h3>'
));
register_sidebar(array(
     'name' => __('Home3','omague'),
     'description' => __('Home Widget 3', 'omague'),
     'before_widget' => '',
     'after_widget' => '',
     'before_title' => '<h3>',
     'after_title' => '</h3>'
));
register_sidebar(array(
     'name' => __('Single1','omague'),
     'description' => __('Single Widget 1', 'omague'),
     'before_widget' => '',
     'after_widget' => '',
     'before_title' => '<h3>',
     'after_title' => '</h3>'
));
register_sidebar(array(
     'name' => __('Single2','omague'),
     'description' => __('Single Widget 2', 'omague'),
     'before_widget' => '',
     'after_widget' => '',
     'before_title' => '<h3>',
     'after_title' => '</h3>'
));
register_sidebar(array(
     'name' => __('Single3','omague'),
     'description' => __('Single Widget 3', 'omague'),
     'before_widget' => '',
     'after_widget' => '',
     'before_title' => '<h3>',
     'after_title' => '</h3>'
));
register_sidebar(array(
     'name' => __('Footer1','omague'),
     'description' => __('Footer Widget 1', 'omague'),
     'before_widget' => '',
     'after_widget' => '',
     'before_title' => '<h3>',
     'after_title' => '</h3>'
));
register_sidebar(array(
     'name' => __('Footer2','omague'),
     'description' => __('Footer Widget 2', 'omague'),
     'before_widget' => '',
     'after_widget' => '',
     'before_title' => '<h3>',
     'after_title' => '</h3>'
));
register_sidebar(array(
     'name' => __('Footer3','omague'),
     'description' => __('Footer Widget 3', 'omague'),
     'before_widget' => '',
     'after_widget' => '',
     'before_title' => '<h3>',
     'after_title' => '</h3>'
));
}

/**
 * Custom Excerpt function
 *
 * @since OmaGue 0.1
 */
add_filter( 'excerpt_length', 'omague_excerpt_length' );
add_filter( 'excerpt_more', 'omague_auto_excerpt_more' );
add_filter( 'get_the_excerpt', 'omague_custom_excerpt_more' );

function omague_excerpt_length( $length ) {
	return 40;}
function omague_continue_reading_link() {
	return ' <a class="more" href="'. esc_url( get_permalink() ) . '">' . __( 'Read more &raquo;', 'omague' ) . '</a>';}
function omague_auto_excerpt_more( $more ) {
	return ' &hellip;' . omague_continue_reading_link();}
function omague_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= ' &hellip;'  . omague_continue_reading_link();
	} return $output; }

/**
* This function removes WordPress generated category and tag atributes.
* For W3C validation purposes only.
*
* @since OmaGue 1.0
*/
add_filter('wp_list_categories', 'omague_category_rel_removal');
add_filter('the_category', 'omague_category_rel_removal');
function omague_category_rel_removal ($output) {
   $output = str_replace(' rel="category tag"', '', $output);
   return $output;
   }

/**
 * Breadcrumb
 *
 * @since OmaGue 0.1
 */
function omague_breadcrumb () {
  
  $omague = '<span>&#187;</span>';
  $home = __('Home','omague'); // text for the 'Home' link
  $before = '<a>'; // tag before the current crumb
  $after = '</a>'; // tag after the current crumb
 
  if ( !is_home() && !is_front_page() || is_paged() ) {
 
    echo '';
 
    global $post;
    $homeLink = home_url();
    echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $omague . ' ';
 
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $omague . ' '));
      echo $before . __('Archive for ','omague') . single_cat_title('', false) . $after;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $omague . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $omague . ' ';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $omague . ' ';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $omague . ' ';
        echo $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $omague . ' ');
        echo $before . get_the_title() . $after;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $omague . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $omague . ' ';
      echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $omague . ' ';
      echo $before . get_the_title() . $after;
 
    } elseif ( is_search() ) {
      echo $before . __('Search results for ','omague') . get_search_query() . $after;
 
    } elseif ( is_tag() ) {
      echo $before . __('Posts tagged ','omague') . single_tag_title('', false) . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . __('All posts by ','omague') . $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . __('Error 404 ','omague') . $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page','omague') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '';
 
  }
}

/**
 * Comment and trackback layout
 *
 * @since OmaGue 0.1
 */
function omague_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
	case 'pingback' :
	case 'trackback' :
?>
<li class="post pingback">
	<p><?php _e( 'Pingback:', 'omague' ); ?> <?php  comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'omague' ), '<span class=edit-link>', '</span>' ); ?>
	<?php
 	break; default : ?>
<li <?php comment_class(); ?> id="li-comment-<?php  comment_ID(); ?>">
<article id="comment-<?php  comment_ID(); ?>" class=comment>
<footer class="comment-meta">
<div class="comment-author vcard">
	<?php
		$avatar_size = 58;				
		if ( '0' != $comment->comment_parent )    $avatar_size = 30;
		echo get_avatar( $comment, $avatar_size );
		printf( __( '%1$s on %2$s <span class="says">said:</span>', 'omague' ), 
		sprintf( '<span class=fn>%s</span>', get_comment_author_link() ), 
		sprintf( '<span class=time><a class=time href="%1$s"><time datetime="%2$s">%3$s</time></a></span>',        
		esc_url( get_comment_link( $comment->comment_ID ) ), get_comment_time( 'c' ), 
		sprintf( __( '%1$s at %2$s', 'omague' ), get_comment_date(), get_comment_time() )));
	?>
	<?php edit_comment_link( __( 'Edit', 'omague' ), '<span class=edit-link>', '</span>' ); ?>
</div>
<?php if ( $comment->comment_approved == '0' ) : ?>
<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'omague' ); ?></em>
<br />
<?php endif; ?>
</footer>

<div class=comment-content>
	<?php comment_text(); ?>
</div>
<div class=bersih></div>
<div class=reply>
	<?php comment_reply_link( array_merge( $args, array( 
		'reply_text' => __( 'Reply <span>&darr;</span>', 'omague' ), 
		'depth' => $depth, 
		'max_depth' => $args['max_depth'] ) ) ); ?>
</div>
<div class=kosong></div>
</article>
<?php
	break;
	endswitch;
}

/**
 * Page navigation
 *
 * @since OmaGue 0.1
 */
function omague_pagenavi( $p = 1 ) { // pages will be show before and after current page
  if ( is_singular() ) return; // don't show in single page
  global $wp_query, $paged;
  $max_page = $wp_query->max_num_pages;
  if ( $max_page == 1 ) return; // don't show when only one page
  if ( empty( $paged ) ) $paged = 1;
  echo '<span class="pages">'.esc_attr('Page: ','omague').'' . $paged . ' - ' . $max_page . ' </span> '; // pages
  if ( $paged > $p + 1 ) omague_p_link( 1, ''.esc_attr('Start Page','omague').'' );
  if ( $paged > $p + 1 ) echo '<b>... </b> ';
  for( $i = $paged - $p; $i <= $paged + $p; $i++ ) { // Middle pages
    if ( $i > 0 && $i <= $max_page ) $i == $paged ? print "<span class='page-numbers current'>{$i}</span> " : omague_p_link( $i );
  }
  if ( $paged < $max_page - $p - 1 ) echo '<b>&hellip;</b>';
  if ( $paged < $max_page - $p ) omague_p_link( $max_page, ''.esc_attr('Last Page','omague').'' );
}
function omague_p_link( $i, $title = '' ) {
  if ( $title == '' ) $title = "Page {$i}";
  echo "<a class='page-numbers' href='", esc_html( get_pagenum_link( $i ) ), "' title='{$title}'>{$i}</a> ";
}

/**
 * Content navigation
 *
 * @since OmaGue 0.1
 */
function omague_content_nav() {
	global $wp_query;

	$paged			=	( get_query_var( 'paged' ) ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link	=	get_pagenum_link();
	$url_parts		=	parse_url( $pagenum_link );
	$format			=	( get_option('permalink_structure') ) ? user_trailingslashit('<span>page/%#%</span>', 'paged') : '?paged=%#%';
	
	if ( isset($url_parts['query']) ) {
		$pagenum_link	=	"{$url_parts['scheme']}://{$url_parts['host']}{$url_parts['path']}%_%?{$url_parts['query']}";
	} else {
		$pagenum_link	.=	'%_%';
	}
	
	$links			=	paginate_links( array(
		'base'		=>	$pagenum_link,
		'format'	=>	$format,
		'total'		=>	$wp_query->max_num_pages,
		'current'	=>	$paged,
		'mid_size'	=>	2,
		'type'		=>	'list'
	) );
	
	if (!is_singular() && $links ) {
		echo "<nav id=\"page-nav\">{$links}</div><div class=\"bersih\"></nav>";
	}
	if (is_singular()){
		wp_link_pages( array( 
		'before' => '<nav id="post-pages"><span>' . __( 'Pages:', 'omague' ) . '</span>', 
		'after' => '</nav><div class=bersih></div>' ) );
		echo '<nav class="nav-single">';
			previous_post_link('%link', '<span class="prev-post">Prev | %title</span>');
			next_post_link('%link', '<span class="next-post">%title | Next</span>');
		echo '</nav>';
	}
}

/**
 * Output favicon from theme options
 *
 * @since OmaGue 0.3
 */
add_action('wp_head', 'omague_custom_favicon', 5);
function omague_custom_favicon() {
	if (of_get_option('omague_custom_favicon'))
		echo '<link rel="shortcut icon" href="'. esc_url( of_get_option('omague_custom_favicon') ) .'">'."\n";
}

/**
 * Output Google meta verification from theme options
 *
 * @since OmaGue 0.3
 */
add_action('wp_head', 'omague_meta_google', 2);
function omague_meta_google(){
	$output = of_get_option('omague_meta_google');
	if ( $output ) 
		echo '<meta name="google-site-verification" content="' . esc_attr( $output ) . '"> ' . "\n";
}

/**
 * Output Bing meta verification from theme options
 *
 * @since OmaGue 0.3
 */
add_action('wp_head', 'omague_meta_bing', 2);
function omague_meta_bing(){
	$output = of_get_option('omague_meta_bing');
	if ( $output ) 
		echo '<meta name="msvalidate.01" content="' . esc_attr( $output ) . '"> ' . "\n";
}


/**
 * Output Alexa meta verification from theme options
 *
 * @since OmaGue 0.3
 */
add_action('wp_head', 'omague_meta_alexa', 2);
function omague_meta_alexa(){
	$output = of_get_option('omague_meta_alexa');
	if ( $output ) 
		echo '<meta name="alexaVerifyID" content="' . esc_attr( $output ) . '"> ' . "\n";
}

/**
 * Output analytics code in footer from theme options
 *
 * @since OmaGue 0.3
 */
add_action('wp_footer','omague_analytics'); 
function omague_analytics(){
	$output = of_get_option('omague_analytic_code');
	if ( $output ) 
		echo "\n" . stripslashes($output) . "\n";
}

/**
 * textarea sanitization and $allowedposttags + embed and script
 * based on theme options framework
 *
 * @since OmaGue 0.3
 */
add_action('admin_init', 'omague_change_santiziation', 100);
function omague_change_santiziation() {
    remove_filter( 'of_sanitize_textarea', 'of_sanitize_textarea' );
    add_filter( 'of_sanitize_textarea', 'omague_sanitize_textarea' );
}

function omague_sanitize_textarea($input) {
    global $allowedposttags;
    $custom_allowedtags["embed"] = array(
		"src" => array(),
		"type" => array(),
		"allowfullscreen" => array(),
		"allowscriptaccess" => array(),
		"height" => array(),
			"width" => array()
		);
	$custom_allowedtags["script"] = array();
	$custom_allowedtags = array_merge($custom_allowedtags, $allowedposttags);
	$output = wp_kses( $input, $custom_allowedtags);
    return $output;
}