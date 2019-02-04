<!DOCTYPE html>
<html lang="en">
<head>
    <?php wp_head(); ?>
    <title><?php bloginfo('name') ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--     
    <style>
        @import url('https://fonts.googleapis.com/css?family=Cuprum|Marmelad|PT+Mono|Philosopher|Play');
    </style>
-->
</head>
<body>
  <div class="container-fluid">
    <header>
      <div class="header row">
        <div class="hidden-xs hidden-sm col-md-2 uagerb"></div>    
            <div class="incenter col-md-8 center-block">
                <div class="rdaname">
                    <a href="<?php echo home_url() ?>">
                      <h1>Оратівська районна державна адміністрація</h1>
                      <h5>офіційний сайт</h5>
                    </a>
                </div>
                <hr>
                <div class="header-contacts">22600, смт Оратів, вул. Героїв Майдану, б. 78, тел/факс: 2-15-05, 
                    <a class="green-link" href="mailto:rda_orativ@vin.gov.ua">rda_orativ@vin.gov.ua</a>
                </div>
            </div>
            <div class="hidden-xs hidden-sm col-md-2 oragerb">
                <img src="<?php bloginfo( 'template_url' )?>/img/ora_gerb.png" alt="gerb orativskogo rajonu">
            </div> 
      </div>
     
      <!-- <div class="navbar navbar-default"> -->
      <?php 
        // wp_nav_menu(array("theme_location" => "header_menu")); 
        wp_nav_menu(array(
                    'theme_location'  => 'header-menu',
                    'depth'           => 3,
                    // 'container'       => 'nav',
                    'container'       => 'div',
                    // 'container_class' => 'navbar navbar-default',
                    'container_class'   => 'collapse navbar-collapse',
                    'container_id'    => 'bs-example-navbar-collapse-1',
                    'menu_class'      => 'nav nav-pills',
                    // 'menu_class'        => 'nav navbar-nav',
                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'            => new WP_Bootstrap_Navwalker(),
                    //'walker'          => new Walker_Naw_Side()
                  )
                );
      ?>
        <!-- <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li><a href="#">Про район</a></li>
                <li><a href="#">Про райдержадміністрацію</a></li>
                <li><a href="#">Контакти</a></li>
                <li><a href="#">Новини</a></li>
                <li><a href="#">Доступ до публічної інформації</a></li>
            </ul>
        </div> -->
      <!-- </div> -->
     
    </header><!--/header-->    
   