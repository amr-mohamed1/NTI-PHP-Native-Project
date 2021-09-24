<?php
    ob_start();
    session_start();
    $page_name = "Comfirm the email";
    $style = "confirm_email.css";
    require_once "init.php";
    if(isset($_SESSION['regstate']) && $_SESSION['regstate'] != "1" && $_SESSION['state'] !="1"){

        if(@$_GET["state"] != "error" && @$_GET["state"] != "confirmed"){

        if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["code"]) ){
            $code = filter_var($_POST["code"] , FILTER_SANITIZE_EMAIL);
            check_confirmation($_SESSION["userEmail"] , $code);
            die();
        }
?>
<div class="container">
<img class="check_img" src="img/check.gif" alt="CHECK">
<h3 style='color:#5a69ff;font-size: 30px;padding-bottom: 20px;' class="message">we sent a confirmation key to you , please check your email and enter your confirmation key</h3>
<div class="row">
    <div style="margin: auto;" class="col-md-4">
        <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
            <div class="form-row text-center mt-4">
                <div class="form-group col-md-12 mb-4">
                    <input style="direction: ltr;" placeholder="Enter Code :" autocomplete="off" name="code" autocomplete="off" type="text" class="form-control">
                </div>
            </div>
            <button type="submit" class="sign_btn mt-3 btn btn-primary">Confirm Email</button>
        </form>  
</div>
</div>
</div>
 <?php
 }else if (@$_GET["state"] == "error"){
    echo "            
    <img class=\"check_img\" src='img/animat-search-color.gif' alt='error'>
    <h3 style='color:red' class=\"message\">Sorry .... the confirmation code or the email adress is not valid</h3>
    " ;
    header("Refresh:5; url=confirmation_email.php");
 }elseif (@$_GET["state"] == "confirmed"){
    echo "            
    <img style='width:500px' class=\"check_img\" src='img/confirmed.gif' alt='error'>
    <h3 style='color:#6ace23;font-size:30px;padding:0 20px;text-align:center' class=\"message\">Congratulations your Account has been activated successfuly</h3>
    " ;
    header("Refresh:5; url=dash.php");
 }
}else{
    header("Location:siggin.php");
}
ob_end_flush();