<?php
    ob_start();
    session_start();
    require "./connect_db.php";
    require "./includes/functions/function.php";
    $page_name = "Dashboard";
    $style = "all_con.css";
    $script="login.js";
    $boot = "true";
    require_once "./includes/template/header.php";
    if(isset($_SESSION['user_type']) &&$_SESSION['user_type'] == 2){

        if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["adress"]) && !empty($_POST["pay"])&& !empty($_POST["notes"])){

            if(!is_string($_POST["adress"]) || !is_string($_POST["pay"]) || strlen($_POST["adress"])<7 || strlen($_POST["notes"])<5){
                echo "
                <script>
                    toastr.error('Sorry adress or pay Should be string only......!')
                </script>";
              }else{



                $adress = $_POST["adress"];
                $pay = $_POST["pay"];
                $notes = $_POST["notes"];

                update_user_adress($adress,$_SESSION["user_id"]);

                $cart_elemnts = cart_id($_SESSION["user_id"]);



                $avatar_name            = $_FILES["img"]["name"];
                $size                   = $_FILES["img"]["size"];
                $tmp_name               = $_FILES["img"]["tmp_name"];
                $type                   = $_FILES["img"]["type"];
                $ext_allowed            = array("png","jpg","jpeg","mp4");
                @$extention             = strtolower(end(explode(".",$avatar_name)));

                if(!empty($avatar_name) && $avatar_name != ""){

                if(in_array($extention,$ext_allowed)){
                    $avatar = rand(0,1000000) . "_" . $avatar_name ;
                    $destination = "./img/orders/" . $avatar ;
                    
                    move_uploaded_file($tmp_name,$destination);
                    foreach($cart_elemnts as $data){
                        add_order ($_SESSION["user_id"], $_SESSION["user_adress"] , $data["medicine_id"] , $data["price"] , $data["quantity"] ,$pay,"0","0",$notes,$avatar);

                        /*update cart table (ordered) to hide order button from cart*/
                        global $con;
                        $stmt = $con->prepare("UPDATE cart SET ordered = '1' WHERE user_id = ?");
                        $stmt->execute(array(
                            $_SESSION["user_id"],                   
                        ));    
                    }
                    
                }  
            }else{
                foreach($cart_elemnts as $data){
                    add_order ($_SESSION["user_id"], $_SESSION["user_adress"] , $data["medicine_id"] , $data["price"] , $data["quantity"] ,$pay,"0","0",$notes,"0");

                    /*update cart table (ordered) to hide order button from cart*/
                    global $con;
                    $stmt = $con->prepare("UPDATE cart SET ordered = '1' WHERE user_id = ?");
                    $stmt->execute(array(
                        $_SESSION["user_id"],                   
                    ));     
                    
                }
            }

              }

              if($_POST["pay"]=="paypal"){
                $all_orders = order();
                $z=0 ; $y=0;
                 $z=0;$y=0; foreach ($all_orders as $data){
                    $y =  $data["price"] * $data["quantity"] ;
                        $z=$z+$y;
                 }
                 echo $z;
                header("location: request.php?amount=".$z);
              }
        }
    $data = all_where("users","id",$_SESSION["user_id"]);
                ?>
                <div class="container">
                    <div class="seller mt-5">    
                        <div class="overlay">
                            <h3 style="font-family: 'Cairo', sans-serif;padding-top:50px;" class="text-center">Please compleat this informations </h3>
                            
                            <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                        <div class=" form-row mt-5">
                            <div style="margin-bottom: 20px;" class="form-group col-md-6">
                                <label for="send_method">User Name</label>
                                <input disabled style="direction: ltr;" value="<?php echo $data[0]["username"]; ?>" name="w_account_email" type="text" class="form-control w_ac1">
                            </div>

                            <div class="form-group col-md-6">
                                <label>User Email</label>
                                <input style="direction: ltr;"
                                disabled value="<?php echo $data[0]["email"]; ?>" name="send_account_email" type="text" class="form-control send_acc">
                            </div>

                            <div class="form-group col-md-6">
                                <label>User Adress</label>
                                <input style="direction: ltr;" <?php if($data[0]["adress"] != "0"){echo "value=". $data[0]["adress"] ;} ?> name="adress" required type="text" class="form-control send_acc">
                            </div>

                            <div style="margin-bottom: 20px;" class="form-group col-md-6">
                                <label for="send_method">Payment Method</label>
                                <select class="custom-select ui search dropdown" name="pay" id="gender" required>
                                    <option selected disable ddefault  value="">Payment</option>
                                    <option value="cash">Pay With Cash</option>
                                    <option value="paypal">Pay With Paypal</option>
                                </select>
                            </div>


                            <div style="  margin-bottom: 20px;" class="col-md-12">
                                <div class="form-group">
                                    <label>Notes</label>
                                    <textarea placeholder="Write Your Messge" name="notes" rows="6" autocomplete="off"></textarea>
                                </div>
                            </div>

                            <div style="margin: auto;" class="form-group col-md-4">
                                <label>upload Image</label>
                                <input style="direction: ltr;" name="img" type="file" class="form-control send_acc">
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Button trigger modal -->
                    
                    <button type="submit" style="display: block;margin: auto;width:250px;margin-bottom:50px;padding:10px 5px" class="btn btn-primary">Complete Order!</button>

                </form>



            </div>
            </div>
    <!--start footer-->
    <div class="footer">
    <a href="https://www.facebook.com/AmrMoEissa/">Amr Mohamed</a> <span class="footer_text">جميع الحقوق محفوظة ، تصميم وتطوير</span>
    </div>
    <!--end footer-->
<?php
// }else{
//     header("location:siggin.php");
// }
}else{
    header("location:siggin.php");}
require_once "./includes/template/footer.php";
ob_end_flush();