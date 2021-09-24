<?php
    ob_start();
    session_start();
    require "./connect_db.php";
    require "./includes/functions/function.php";
    $page_name = "Main Page";
    $style = "index_style.css";
    $script="main.js";
    $boot="true";
    // if($_SESSION['user_type']=="1"){
      require_once "./includes/template/header.php";
    
    ?>

    <!--start header-->
    <div class="section_header">
      <div class="overlay">
        <div class="container">
          <div class="row">
          <div class="col-md-6 left header_text">
            <h3>Online Pharmacy</h3>
            <p>Deep created replenish herb without night fruit day earth evening Called his green were they're fruitful to over Sea bearing sixth Earth face. Them lesser great you'll second</p>
            <button class="header_login"><a href="siggin.php?state=signup">Sign UP For Free</a></button>
          </div>
          <div class="col-md-6 right header_img">
            <img src="img/pharmacy.png" alt="header_logo">
          </div>
          </div>
        </div>
      </div>
    </div>  
    <!--end header-->  

    <!--start about us-->
    <div class="advantages">
      <div class="container">
        <p class="intro"><i class="far fa-sparkles"></i> Our Advantages</p>
        <img class="line" src="img/line.png" alt="line">
        <div class="row mt-5 pt-3 mb-5">
          <div class="col-md-4 advantages_img">
                <img src="img/banner_1.svg" alt="advantages">
                <h3>Emergency Cases</h3>
          </div>
          <div class="col-md-4 advantages_img">
                <img src="img/banner_2.svg" alt="advantages"> 
                <h3>Easy Appointment</h3>
          </div>
          <div class="col-md-4 advantages_img">
                <img src="img/banner_3.svg" alt="advantages">
                <h3>Qualfied Doctores</h3>
          </div>
        </div>
      </div>
    </div>
    <!--end about us-->

    <!--start servises-->
    <div class="services">
      <div class="overlay">
        <div class="container">
          <p class="services_intro"><i class="fal fa-cogs"></i>  Our Services</p>
          <img class="line" src="img/line.png" alt="line">
            <div class="row pb-5">
              <div class="col-md-4">
                <div class="item">
                  <img src="img/reduce_cost.png" alt="reduce_cost">
                  <h3>Reduce Time and Cost</h3>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, eveniet suscipit! Debitis non laudantium aut itaque enim perferendis. Maiores, minus.</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="item">
                  <img src="img/clock.png" alt="clock">
                  <h3>Fast Delevery To Home</h3>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta itaque earum fugit. Assumenda tenetur, enim odit voluptatum ipsam nobis animi.</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="item">
                  <img src="img/note.png" alt="note">
                  <h3>Request more than one product </h3>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam error reiciendis mollitia nesciunt ratione quia sint minus, modi totam ipsum.</p>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
    <!--end servises-->

    <!--cursol-->
    <div class="caro">
      <div class="container">
      <p class="intro"><i class="fad fa-pills"></i> POPULAR PRODUCTS</p>
      <img class="line" src="img/line.png" alt="line">
      <div class="row mt-4 pt-5">
        <div class="col-md-4 mb-5">
                <div class="ui card">
                    <div style="background-color: #fff;" class="image">
                    <img src="img/medicine/product_01.png">
                    </div>
                    <div class="content">
                    <a class="header">Kristy</a>
                    <div class="meta">
                    <span class="date">Added in 2013</span>
                    </div>
                    <div class="description">
                    <p>Kristy is an art director living in New York.</p>

                    <h3 style="text-align: center;margin-top:20px;font-weight: 700;">$ 33.00</h3>
                        <a style="display: block;margin: auto;" href="#" class="ui vertical animated button mt-4 mb-3" tabindex="0">
                            <div class="hidden content">Shop</div>
                            <div class="visible content">
                                <i class="shop icon"></i>
                            </div>
                        </a>
                    </div>
                    </div>
                    <div class="extra content">
                    <a>
                    <i class="user icon"></i>
                      Category : Makeup
                    </a>
                    </div>
                </div>
        </div>


        <div class="col-md-4 mb-5">
                <div class="ui card">
                    <div style="background-color: #fff;" class="image">
                    <img src="img/medicine/product_02.png">
                    </div>
                    <div class="content">
                    <a class="header">Kristy</a>
                    <div class="meta">
                    <span class="date">Added in 2013</span>
                    </div>
                    <div class="description">
                    <p>Kristy is an art director living in New York.</p>

                    <h3 style="text-align: center;margin-top:20px;font-weight: 700;">$ 33.00</h3>
                        <a style="display: block;margin: auto;" href="#" class="ui vertical animated button mt-4 mb-3" tabindex="0">
                            <div class="hidden content">Shop</div>
                            <div class="visible content">
                                <i class="shop icon"></i>
                            </div>
                        </a>
                    </div>
                    </div>
                    <div class="extra content">
                    <a>
                    <i class="user icon"></i>
                      Category : Medicine
                    </a>
                    </div>
                </div>
        </div>
        <div class="col-md-4 mb-5">
                <div class="ui card">
                    <div style="background-color: #fff;" class="image">
                    <img src="img/medicine/product_03.png">
                    </div>
                    <div class="content">
                    <a class="header">Kristy</a>
                    <div class="meta">
                    <span class="date">Added in 2013</span>
                    </div>
                    <div class="description">
                    <p>Kristy is an art director living in New York.</p>

                    <h3 style="text-align: center;margin-top:20px;font-weight: 700;">$ 33.00</h3>
                        <a style="display: block;margin: auto;" href="#" class="ui vertical animated button mt-4 mb-3" tabindex="0">
                            <div class="hidden content">Shop</div>
                            <div class="visible content">
                                <i class="shop icon"></i>
                            </div>
                        </a>
                    </div>
                    </div>
                    <div class="extra content">
                    <a>
                    <i class="user icon"></i>
                      Category : Medicine
                    </a>
                    </div>
                </div>
        </div>

        <div class="col-md-4 mb-5">
                <div class="ui card">
                    <div style="background-color: #fff;" class="image">
                    <img src="img/medicine/product_04.png">
                    </div>
                    <div class="content">
                    <a class="header">Kristy</a>
                    <div class="meta">
                    <span class="date">Added in 2013</span>
                    </div>
                    <div class="description">
                    <p>Kristy is an art director living in New York.</p>

                    <h3 style="text-align: center;margin-top:20px;font-weight: 700;">$ 33.00</h3>
                        <a style="display: block;margin: auto;" href="#" class="ui vertical animated button mt-4 mb-3" tabindex="0">
                            <div class="hidden content">Shop</div>
                            <div class="visible content">
                                <i class="shop icon"></i>
                            </div>
                        </a>
                    </div>
                    </div>
                    <div class="extra content">
                    <a>
                    <i class="user icon"></i>
                      Category : Medicine
                    </a>
                    </div>
                </div>
        </div>
    
      </div>
      </div>
    </div>
    <!--cursol-->

    <!--start footer-->
    <div class="footer">
    <a href="https://www.facebook.com/AmrMoEissa/">Amr Mohamed</a> <span class="footer_text">All Rights Reserved</span>
    </div>
    <!--end footer-->
      


<?php 
// }else{
//   echo "error";
// }



require_once "./includes/template/footer.php";
ob_end_flush();