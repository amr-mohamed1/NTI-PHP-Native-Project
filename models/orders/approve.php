<?php 
ob_start();
session_start();
$boot="true";
$page_name = "Add Medicine";
require "../../connect_db.php";
require "../../includes/functions/function.php";
require "../../layout/topNav.php";
require "../../includes/template/header.php";
if(isset($_SESSION['user_type']) &&$_SESSION['user_type'] == 1 ||  $_SESSION['user_type'] == 3){
if(isset($_GET["id"]) && is_numeric($_GET['id'])){
    /*srt order state confirmed and shipped*/
    global $con;
    $stmt = $con->prepare("UPDATE orders SET order_state = '1' WHERE id = ?");
    $stmt->execute(array(
        $_GET["id"],
    ));    

    /*delete order from cart*/
    $stmt = $con->prepare("DELETE FROM cart WHERE user_id = :id and medicine_id= :medicine_id");
    $stmt->bindParam(":id" , $_GET["user_id"]);
    $stmt->bindParam(":medicine_id" , $_GET["m_id"]);
    $stmt->execute();
    $_SESSION["orders_aapproved"] = "1";
    header("Location:all.php");
}
}else{
    header("location:index.php");
}
require "../../includes/template/footer.php";
ob_end_flush();