        <div class="sidebar col-sm-3">
            <p>
              Бокова панель меню
            </p>
            <?php 
                wp_nav_menu(array(
                    'theme_location'  =>  'side-menu',
                    'container'       =>  'div',
                    'container_class' =>  'side-menu-container',
                    // 'container_id'    =>  'accordion',
                    // 'menu_class'   =>  '<ul class="" ',
                    // 'menu_id'      =>  '<ul id="" ',
                    'menu_class'      =>  'list-group', 
                    'walker'          =>  new Walker_Naw_Side()
                ));

            ?>
            <p>
              This is the sidebar
            </p>
            <p>ТЕСТ АКОРДИОН</p>
            <!-- ТЕСТ -->
 <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  
 <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Назва меню #1
        </a>
      </h4>
    </div>
    
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        Зміст панелі #1.
      </div>
    </div>
  </div>


  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Назва меню #2
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        Зміст панелі #2.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Назва меню #3
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
        Зміст панелі #3
      </div>
    </div>
  </div>
</div>
            <!-- ТЕСТ -->
        </div> 