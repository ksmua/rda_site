        <div class="sidebar col-sm-3">
            <p>
              Бокова панель меню
            </p>
            <?php 
                wp_nav_menu(array(
                    'theme_location'  =>  'side-menu',
                    'container'       =>  'div',
                    'container_class' =>  'side-menu-container, sidenav',
                    //'container_id'  =>  'accordion',
                    //'menu_class'    =>  '<ul class="" ',
                    //'menu_id'       =>  '<ul id="" ',
                    'menu_class'      =>  '', 
                    'walker'          =>  new Walker_Naw_Side()
                ));

            ?>
          
          <!-- =========== NAV MENU TEST============ -->
           <!-- <div class="sidenav">
              <a href="#about">About</a>
              <a href="#services">Services</a>
              <a href="#clients">Clients</a>
              <a href="#contact">Contact</a>
              
              <button class="dropdown-btn">Dropdown 
                <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-container">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
              </div>
              
              <a href="#contact">Search</a>
          </div> -->

                
          <script>
          /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
          var dropdown = document.getElementsByClassName("dropdown-btn");
          var i;

          for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            // Changed !!!!!!!
            var dropdownContent = document.getElementById("dropdown-container-id");
            // var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
            } else {
            dropdownContent.style.display = "block";
            }
            });
          }
          </script>
          <!-- =========== NAV MENU TEST============ -->
[wpb_category_accordion taxonomy="category" orderby="name" order="ASC" show_count="no" hide_empty="yes" icon="+"]
        </div> 