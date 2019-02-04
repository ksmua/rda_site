<?php
  // Register Custom Navigation Walker
  // echo ('-----> ');
  // echo (get_template_directory());
  require_once get_template_directory() . '/wp-bootstrap-navwalker.php';

/** Add Styles and Scripts to theme */
function rda_styles() {
    wp_enqueue_style( 'style.css', get_stylesheet_uri() );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.min.css' );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/js/bootstrap.min.js' );
  }
  
  add_action ( 'wp_head', 'rda_styles');

  /** Add Fonts to theme */  
  function add_google_fonts() {
    wp_register_style('google-play', 'https://fonts.googleapis.com/css?family=Play', array(), null, 'all');
    wp_register_style('google-cuprum', 'https://fonts.googleapis.com/css?family=Cuprum', array(), null, 'all');
    wp_register_style('google-marmelad', 'https://fonts.googleapis.com/css?family=Marmelad', array(), null, 'all');
    wp_register_style('google-philosopher', 'https://fonts.googleapis.com/css?family=Philosopher', array(), null, 'all');
    
    wp_enqueue_style('google-play');
    wp_enqueue_style('google-cuprum');
    wp_enqueue_style('google-marmelad');
    wp_enqueue_style('google-philosopher');
  }

  add_action('wp_enqueue_scripts', 'add_google_fonts');

  /** Add Menu support in themme */  



  add_action('after_setup_theme', function(){
    // add_theme_support('menus');
    // register_nav_menu('header-menu', 'Меню в шапці сайту');
    // register_nav_menu('footer-menu', 'Меню в підвалі сайту');
    register_nav_menus([
      'header-menu' => 'Меню в шапці сайту',
      'footer-menu' => 'Меню в підвалі сайту',
      'side-menu' => 'Меню в сайдбарі'
    ]);
  });
  
 
  
  /**
  *            WALKER
  *http://wordpressunik.ru/wordpress_walker_nav
  *https://www.youtube.com/watch?time_continue=16&v=ArEmwJV6M7s
  **/
  /*
  wp_naw_menu();
  <div class="menu-container">
    <ul> // start_lvl()
      <li><a><span> //start_el()
        Link
      </span></a></li>// end_el()
      <li><a>Link</a></li>
      <li><a>Link</a></li>
      <li><a>Link</a></li>
      <li><a>Link</a></li>
    </ul> // end_lvl()
  </div>
  */
  class Walker_Naw_Side extends Walker_Nav_menu {
   
    function start_lvl(&$output, $depth = 0, $args = array() ){ // ul
      $indent = str_repeat("\t", $depth);
      $submenu = ($depth >= 0)? ' sub-menu list-group' : '';
      $collapse = ($depth >= 0)? ' collapse' : '';
      $output .= "\n$indent<ul class=\"panel myside-menu$submenu depth_$depth $collapse\">\n";
    }//start_lvl
  
    // 
  
public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
    // Here is @list-group-item@ clas added
    $classes[] = 'list-group-item menu-item-' . $item->ID;

    $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : ''; 
    
    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $class_names .'>';

		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';
  
    $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

    $title = apply_filters( 'the_title', $item->title, $item->ID );
    
    $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . $title . $args->link_after;
		$item_output .= '</a>';
    $item_output .= $args->after;
    
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
  // 
  
  }
  
  // <div class="panel panel-default">
  //   <div class="panel-heading" role="tab" id="headingOne">
  //     <h4 class="panel-title">
  //       <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
  //         Назва меню #1
  //       </a>
  //     </h4>
  //   </div>
    
  //   <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
  //     <div class="panel-body">
  //       Зміст панелі #1.
  //     </div>
  //   </div>
  // </div>
  //============================================
  // <ul id="menu-side-menu" class="menu">
  //   <li id="menu-item-34" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-34">
  //     <a href="http://test/2018/09/25/%d0%bf%d1%80%d0%b8%d0%b2%d1%96%d1%82-%d1%81%d0%b2%d1%96%d1%82/">Перший запис!</a>
  //   </li>
  //   <li id="menu-item-33" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-has-children menu-item-33">
  //     <a href="http://test/2018/09/30/%d0%b4%d1%80%d1%83%d0%b3%d0%b8%d0%b9-%d0%b7%d0%b0%d0%bf%d0%b8%d1%81/">Другий запис!</a>
  //     <ul class="dropdown-menu depth_0">
  //       <li id="menu-item-41" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-41"><a href="http://test/2019/01/05/%d0%b4%d1%80%d1%83%d0%b3%d0%b8%d0%b9-%d0%b7%d0%b0%d0%bf%d0%b8%d1%81-1/">Другий запис 1</a></li>
  //       <li id="menu-item-40" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-40"><a href="http://test/2019/01/05/%d0%b4%d1%80%d1%83%d0%b3%d0%b8%d0%b9-%d0%b7%d0%b0%d0%bf%d0%b8%d1%81-2/">Другий запис 2</a></li>
  //     </ul>
  //   </li>
  // </ul>
   
  //walker

 /**Add Post Thumnails support in theme */
  add_theme_support('post-thumbnails');

?>
