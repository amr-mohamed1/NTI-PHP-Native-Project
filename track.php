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
      $data = all_where("orders","buyer_id",$_SESSION["user_id"]);

      if(isset($_GET["state"])){
      $request = $_GET["state"];

      if($request == "arrived"){
        /*srt order state confirmed and shipped*/
        global $con;
        $stmt = $con->prepare("UPDATE orders SET order_state = '2' WHERE buyer_id = ?");
        $stmt->execute(array(
          $_SESSION["user_id"],
        ));    
      }
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

<div style="background-image:unset !important;" class="page_content">
    <div class="container">
    <img style="width:120px;display:block;margin:auto" src="img/steps.png" alt="deal">
      <h3>Follow up on your purchase</h3>
      <img class="line mb-5 mt-3" src="img/line.png" alt="line">

      <?php if(isset($data[0]['order_state']) && $data[0]['order_state'] != "2" ){?>

      <div class="ui ordered steps mb-5">
                <div class="completed step">
                    <div class="content">
                    <div style=" font-family: 'Cairo', sans-serif;padding-bottom:10px;padding-left:10px" class="title">Order Has Created Successfully</div>
                    <div style="padding-left: 10px;" class="description">the request is waiting for the doctor's approval</div>
                    </div>
                </div>
                <div class="<?php if ($data[0]['order_state'] == "0"){echo "active";}else{echo "completed";} ?> step">
                    <div class="content">
                    <div style=" font-family: 'Cairo', sans-serif;padding-bottom:10px;padding-left:10px" class="title">The request has been approved</div>
                    <div style="padding-left: 10px;" class="description">Your order is now on its way to you</div>
                    </div>
                </div>
                <div class="<?php if ($data[0]['order_state'] == "0"){echo "";}else{echo "active";} ?> step">
                    <div class="content">
                    <div style=" font-family: 'Cairo', sans-serif;padding-bottom:10px;padding-left:10px" class="title">The order has been delivered</div>
                    <div style="padding-left: 10px;" class="description">order has been delivered</div>
                    </div>
                </div>
            </div>

            <a style="display: block;width:250px;margin: auto;margin-bottom:50px" class="btn btn-success" href="track.php?state=arrived">order Receved!</a>

<?php }else{?>

<img style="display: block;margin:auto;margin-bottom: 50px;" src="img/404.gif" alt="error">

    <?php }?>
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