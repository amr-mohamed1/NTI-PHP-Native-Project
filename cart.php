<?php
    ob_start();
    session_start();
    require "./connect_db.php";
    require "./includes/functions/function.php";
    $page_name = "Cart";
    $style = "dash.css";
    $script="dash.js";
    $boot = "true";
    require_once "./includes/template/header.php";

    if(isset($_SESSION['user_type']) &&$_SESSION['user_type'] == 2){



    $cart_data = cart_id($_SESSION['user_id']);

    $all_medicine = all_data("medicine");
    $i=1;

    if(isset($_SESSION["cart_delete"])){
        if($_SESSION["cart_delete"] == "1"){
            echo "
            <script>
                toastr.error('Medicine has been deleted ...!')
            </script>";
            unset($_SESSION["cart_delete"]);
        }
        }
?>
   
   <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Website Dashboard</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dash.php">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                        </nav>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Your order
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Order Date</th>
                                            <th>Medicine Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Total Price</th>
                                            <th>Image</th>
                                            <?php if(@$cart_data[0]["ordered"] == "0"){?>
                                            <th>Controls</th>
                                            <?php }?>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Order Date</th>
                                            <th>Medicine Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Total Price</th>
                                            <th>Image</th>
                                            <?php if(@$cart_data[0]["ordered"] == "0"){?>
                                            <th>Controls</th>
                                            <?php }?>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php foreach ($cart_data as $data){?>
                                        <tr class="text-center">
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $data["order_date"] ?></td>
                                            <td><?php echo $data["medicine"] ?></td>
                                            <td><?php echo $data["quantity"] ?></td>
                                            <td><?php echo "$ " . $data["price"] . ".00" ?></td>
                                            <td><?php echo "$ " . $data["quantity"]*$data["price"] . ".00"?></td>
                                            <td><img style="display: block;margin: auto;" src="./img/medicine/<?php echo $data['img'];?>" width="100" height="100"></td>
                                            <?php if($cart_data[0]["ordered"] == "0"){?>
                                            <td>
                                                <a href='./delete.php?from=cart&id=<?php echo $data['id'];?>' class='btn btn-danger m-r-1em mt-3 mr-3 mb-3'>Delete</a>
                                            </td>
                                            <?php }?>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php if($cart_data){
                                    if($cart_data[0]["ordered"] == "0"){?>
                                    <a style="display: block;width:250px;margin: auto;" class="btn btn-primary" href="submit_order.php">order Now!</a>
                                    <?php }else{?>
                                        <div style="direction: ltr;text-align: left;font-size: 17px;line-height: 25px ;padding:30px 20px; margin-top:40px;border:3px solid #ea7c85" class="alert alert-danger" role="alert">
                                            <h3 style="font-family: 'Cairo', sans-serif;"><i class="far fa-engine-warning ml-2"></i> Important notes :</h3>
                                            1- You canot order the same order two times
                                            <br>
                                            <br>
                                            2- your request is sent to admin and waited to accept it
                                            <br>
                                            <br>
                                            3- it may take 1 or 2 hours at maximum
                                            <br>
                                            <br>
                                            4- You can track Your Order From (track order page)
                                            <br>
                                            <br>
                                            5- the ordder take 30 min to reach you
                                        </div>

                                <?php } }?>
                            </div>
                        </div>
                    </div>
                </div>
            </main>


<?php
}else{
            header("location:siggin.php");}

//             ob_end_flush();

require_once "./includes/template/footer.php";
ob_end_flush();