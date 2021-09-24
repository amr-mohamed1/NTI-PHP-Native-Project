<?php
    ob_start();
    session_start();
    require "./connect_db.php";
    require "./includes/functions/function.php";

    // if(isset($_SESSION['user_name'])){

        if($_GET["from"] == "category"){
            if (isset($_GET['id']) && is_numeric($_GET['id'])){
                $nm = $_GET['id'];
                $stmt = $con->prepare("DELETE FROM category WHERE id = :id");
                $stmt->bindParam(":id" , $nm);
                $stmt->execute();
                header("Location:models/category/all.php");
                $_SESSION["cat_delete"] = "1";
            }
            else{
                header("Location:models/category/all.php");
            }
        }
        elseif($_GET["from"] == "dash"){
            if (isset($_GET['id']) && is_numeric($_GET['id'])){
                $nm = $_GET['id'];
                $stmt = $con->prepare("DELETE FROM users WHERE id = :id");
                $stmt->bindParam(":id" , $nm);
                $stmt->execute();
                header("Location:admin_dash.php");
            }
            else{
                header("Location:admin_dash.php");
            }
        }
        elseif($_GET["from"] == "medicine"){
            if (isset($_GET['id']) && is_numeric($_GET['id'])){
                $nm = $_GET['id'];
                $stmt = $con->prepare("DELETE FROM medicine WHERE id = :id");
                $stmt->bindParam(":id" , $nm);
                $stmt->execute();
                header("Location:models/medicine/all.php");
                $_SESSION["medi_delete"] = "1";
            }
        }
        elseif($_GET["from"] == "type"){
            if (isset($_GET['id']) && is_numeric($_GET['id'])){
                $nm = $_GET['id'];
                $stmt = $con->prepare("DELETE FROM type WHERE id = :id");
                $stmt->bindParam(":id" , $nm);
                $stmt->execute();
                header("Location:models/type/all.php");
                $_SESSION["type_delete"] = "1";
            }
        }
        elseif($_GET["from"] == "cart"){
            if (isset($_GET['id']) && is_numeric($_GET['id'])){
                $nm = $_GET['id'];
                $stmt = $con->prepare("DELETE FROM cart WHERE id = :id");
                $stmt->bindParam(":id" , $nm);
                $stmt->execute();
                header("Location:cart.php");
                $_SESSION["cart_delete"] = "1";
            }
        }
        elseif($_GET["from"] == "admin"){
            if (isset($_GET['id']) && is_numeric($_GET['id'])){
                $nm = $_GET['id'];
                $stmt = $con->prepare("DELETE FROM users WHERE id = :id");
                $stmt->bindParam(":id" , $nm);
                $stmt->execute();
                header("Location:models/admin/all.php");
                $_SESSION["admin_delete"] = "1";
            }
        }
        elseif($_GET["from"] == "orders"){
            if (isset($_GET['id']) && is_numeric($_GET['id'])){
                $nm = $_GET['id'];
                $stmt = $con->prepare("DELETE FROM orders WHERE id = :id");
                $stmt->bindParam(":id" , $nm);
                $stmt->execute();
                header("Location:models/orders/all.php");
                $_SESSION["orders_delete"] = "1";
            }
        }
            else{
                header("Location:models/orders/all.php");
            }
        
    // }
    ob_end_flush();