<?php
    ob_start();
    session_start();
    require "./connect_db.php";
    require "./includes/functions/function.php";
    $page_name = "Dashboard";
    $style = "dash.css";
    $script="dash.js";
    $boot = "true";
    require_once "./includes/template/header.php";
    if(isset($_SESSION['user_type']) &&$_SESSION['user_type'] == 2){

      ;
      if(isset($_GET["cat"])){
       $cat = all_where("category","title",$_GET["cat"]);

       $cat_id = $cat[0]["id"];

       $all_medicine = all_medicines_where($cat_id);
      }else{
        $all_medicine = all_medicines();
      }

      $all_category = all_data("category");
      
      if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["quantity"])){
       $quan = filter_var($_POST["quantity"],FILTER_SANITIZE_NUMBER_INT);
       add_to_cart($_POST["medicine_id"],$quan,$_SESSION["user_id"]);

      }

?>

<!--start header-->
<div class="page_header">
  <div class="overlay pt-4"> 
    <div class="container">
    <p class="menu_left"><i class="men fas fa-bars"></i><span style="font-size: 25px;color:#fff;padding-top: 3px !important;">Menu</span></p>
    <div class="ui sidebar inverted vertical menu">
    <a class="item men_head">
    <i class="far fa-house-user"></i>
    </a>
    <a href="dash.php" class="item men_body">
      Home page
    </a>
    <a href="cart.php" class="item men_body">
     Your Cart
    </a>
    <a href="track.php" class="item men_body">
     Track Orders
    </a>
    <a href="profile.php" class="item men_body">
      Profile
    </a>
    <a href="contact.php" class="item men_body">
     Contact Us
    </a>
    <a href="logout.php" class="item men_body">
      Logout
    </a>
  </div>
  <div class="pusher ">
    <!-- Site content !-->
  </div>
      <img src="img/feedback.png" alt="deal">
      <h3 class="header_text">  Welcome to our website , you can buy all medicine you want</h3>
      <p class="header_p">For more information <a href="contact.php">contact us</a></p>
    </div>
  </div>
</div>
<!--end header-->

<!--start content-->

<div class="page_content">
  <div class="overlay">
    <div class="container">
      <h3>Our Medicine</h3>
      <img class="line" src="img/line.png" alt="line">

            <div class="row mt-5 pt-3">


                <div class="card mb-4 col-12">
                        <div class="card-header">
                            <span style="font-size: 20px;display: inline-block;padding-top: 5px;"><i class="fas fa-table mr-1"></i>
                            Your order</span>

                            <div style="display: inline-block;float: right;" class="ui floating dropdown labeled icon button">
                              <i class="filter icon"></i>
                              <span class="text">Filter Medicines</span>
                              <div class="menu">
                                <div class="ui icon search input">
                                  <i class="search icon"></i>
                                  <input type="text" placeholder="Search tags...">
                                </div>
                                <div class="divider"></div>
                                <div class="header">
                                  <i class="tags icon"></i>
                                  Our Categories
                                </div>
                                <div class="scrolling menu">
                                <a style="text-decoration:none" href="dash.php" class="item">
                                    <div class="ui red empty circular label"></div>
                                    All Medicines
                                  </a>
                                <?php foreach($all_category as $cat_data){ ?>
                                  <a style="text-decoration:none" href="dash.php?cat=<?php echo $cat_data["title"];?>" class="item">
                                    <div class="ui red empty circular label"></div>
                                    <?php echo $cat_data["title"];?>
                                  </a>
                                  <?php } ?>
                                </div>
                              </div>
                            </div>



                        </div>
                        <div class="card-body">
                           <div class="row">
                        <?php foreach($all_medicine as $data){?>
               <div class="col-md-4 mb-5">
               <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                  <div class="ui card">
                      <div style="background-color: #fff;" class="image">
                      <img style="height: 250px !important;" src="img/medicine/<?php echo $data['img'];?>">
                      </div>
                      <div class="content">
                      <a class="header mb-4"><?php echo $data["medicine"];?></a>
                      <input type="number" hidden class="form-control" name="medicine_id" value="<?php echo $data['id'];?>" aria-label="Dollar amount (with dot and two decimal places)">
                      <div class="meta">
                      <span class="date mb-3">Added in <?php echo $data["time"];?></span>
                      </div>
                      <div class="description">
                      <p><?php echo $data["description"];?></p>

                      <div class="input-group mb-3 mt-4">
                        <div class="input-group-prepend">
                          <span class="input-group-text">$</span>
                          <span class="input-group-text price"><?php echo $data["price"].".00";?></span>

                        </div>
                        <input type="number" name="quantity" class="form-control" value="1" aria-label="Dollar amount (with dot and two decimal places)">

                      </div>
                          <button type="submit" style="display: block;margin: auto;width:150px" class="ui vertical animated button mt-4 mb-3" tabindex="0">
                              <div class="hidden content">Shop</div>
                              <div class="visible content">
                                  <i class="shop icon"></i>
                              </div>
                          </button>
                      </div>
                      </div>
                      <div class="extra content">
                      <a>
                      <i class="user icon"></i>
                      category : <?php echo $data["title"];?>
                      </a>
                      </div>
                  </div>
              </form>
                </div>
                
                <?php } ?>
                </div>
                        </div>
                    </div>
    

            </div>

        

    </div>
  </div>
</div>

<!--end content-->

    <!--start footer-->
    <div class="footer">
    <a href="https://www.facebook.com/AmrMoEissa/">Amr Mohamed</a> <span class="footer_text">جميع الحقوق محفوظة ، تصميم وتطوير</span>
    </div>
    <!--end footer-->
    

<?php 
}else{
            header("location:siggin.php");}

//             ob_end_flush();

require_once "./includes/template/footer.php";
ob_end_flush();