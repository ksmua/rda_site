<div class="infobar hidden-xs hidden-sm col-md-2">
  <p>this is infobar</p>
  
  
  <?php 
    if ( function_exists('dynamic_sidebar') )
		          dynamic_sidebar('right-sidebar');
                // wp_nav_menu(array(
                //     'theme_location'  =>  'right-side-menu',
                //     // 'container'       =>  'div',
                //     // 'container_class' =>  'side-menu-container, sidenav',
                //     //'container_id'  =>  'accordion',
                //     //'menu_class'    =>  '<ul class="" ',
                //     //'menu_id'       =>  '<ul id="" ',
                //     // 'menu_class'      =>  '', 
                //     // 'walker'          =>  new Walker_Naw_Side()
                // ));

            
  ?>



  <p>this is infobar</p>



</div>