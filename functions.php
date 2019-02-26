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
      'side-menu' => 'Меню в сайдбарі',
      'right-side-menu' => 'Меню в правому сайдбарі'
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
    </ul> // end_lvl()
  </div>
  */
  class Walker_Naw_Side extends Walker_Nav_menu {
   
    function start_lvl(&$output, $depth = 0, $args = array() ){ // ul
      $indent = str_repeat("\t", $depth);
      $submenu = ($depth >= 0)? ' sub-menu' : ''; //inner ul classes
      $collapse = ''; //($depth >= 0)? ' collapse' : '';
      $output .= "\n$indent<ul class=\"myside-menu$submenu dropdown-container depth_$depth $collapse\" id=\"dropdown-container-id\" >\n"; // add id=\"dropdown-container-id\"
    }//start_lvl
  
    /*
    // START ELEMENT OROGINAL WALKER
  
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
        */
        //START ELEMENT OROGINAL WALKER
        
        //START ELEMENT CUSTOM
        function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0) {
          $indent = ($depth) ? str_repeat("\t", $depth) : '';

          $li_atributes = '';
          $class_names = $value = '';

          $classes = empty( $item->classes ) ? array() : (array)$item->classes;

          $classes[] = ( $args->walker->has_children ) ? 'dropdown-btn' : '';
          $classes[] = ( $item->curent || $item->curent_item_anchestor) ? 'active' : '';
          $classes[] = 'menu-item-' . $item->ID; // Here @list-group-item@ clas added
          if ( $depth && $args->walker->has_children ){
            $classes[] = 'dropdown-submenu';
          }

          $class_names = join(  ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
          $class_names = 'class="' . esc_attr( $class_names ) . '"';

          $id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
          $id = strlen( $id ) ? ' id="' . esc_attr($id) . '"' : '';

          $output .= $indent . '<li' . $id . $value . $class_names . $li_atributes . '>';

          $attributes = ! empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
          $attributes = ! empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
          $attributes = ! empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
          $attributes = ! empty($item->url) ? ' href="#"': ''; // . esc_attr($item->url) . '"' : '';// # no link addd now

          $attributes .= ( $args->walker->has_children ) ? ' class="dropdown-link" ' : ''; // < a href="..." class="dropdown-link"

          $item_output = $args->before;
          $item_output .= '<a' . $attributes . '>';
          $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
          $item_output .= ( $depth == 0 && $args->walker->has_children ) ? '<b class="carret"></b></a>' : '</a>' ;
          $item_output .= $args->after;

          $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);

        }//function start_el END
        //START ELEMENT CUSTOM
          
  
  } //class Walker_Naw_Side extends Walker_Nav_menu
  

   
  //walker

 /**Add Post Thumnails support in theme */
  add_theme_support('post-thumbnails');

?>
