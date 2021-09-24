<?php 
ob_start();
session_start();
$boot="true";
$page_name = "All Categories";
require "../../connect_db.php";
require "../../includes/functions/function.php";
require "../../layout/topNav.php";
require "../../includes/template/header.php";
if(isset($_SESSION['user_type']) &&$_SESSION['user_type'] == 1 ||  $_SESSION['user_type'] == 3){

$all_orders = order();
if(isset($_SESSION["orders_aapproved"])){
if($_SESSION["orders_aapproved"] == "1"){
    echo "
    <script>
    toastr.success('Great ,Order has been Approved successfully  .')
    </script>";
    unset($_SESSION["orders_aapproved"]);
}
}

?>

<div id="layoutSidenav">        
  <?php 
  require '../../layout/sidNav.php';
  ?>


<div id="layoutSidenav_content">
              
            
            
              <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Website Dashboard</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin_dash.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">All Categories</li>
                        </ol>
                        </nav>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            DataTable Example
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Buyer Name</th>
                                            <th>Buyer Email</th>
                                            <th>Buyer Adress</th>
                                            <th>medicine</th>
                                            <th>quantity</th>
                                            <th>total price</th>
                                            <th>payment Method</th>
                                            <th>message</th>
                                            <th>img</th>
                                            <th>time</th>
                                            <th>Controls</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Buyer Name</th>
                                            <th>Buyer Email</th>
                                            <th>Buyer Adress</th>
                                            <th>medicine</th>
                                            <th>quantity</th>
                                            <th>total price</th>
                                            <th>payment Method</th>
                                            <th>message</th>
                                            <th>img</th>
                                            <th>time</th>
                                            <th>Controls</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php $z=0;$y=0; foreach ($all_orders as $data){
                                        $y =  $data["price"] * $data["quantity"] ;
                                            $z=$z+$y;?>
                                        <tr>
                                            <td><?php echo $data["id"] ?></td>
                                            <td><?php echo $data["username"] ?></td>
                                            <td><?php echo $data["email"] ?></td>
                                            <td><?php echo $data["buyer_adress"] ?></td>
                                            <td><?php echo $data["medicine"] ?></td>
                                            <td><?php echo $data["quantity"] ?></td>
                                            <td><?php echo $z ?></td>
                                            <td><?php echo $data["payment_method"] ?></td>
                                            <td><?php echo $data["message"] ?></td>
                                            <? if ($data["img"] != "0"){?>
                                            <td><img src="../../img/orders/<?php echo $data['img'];?>" width="100" height="100"></td>
                                            <?php }else{ ?>

                                                <td>Not Set !</td>
                                                <?php }?>
                                            <td><?php echo $data["time"] ?></td>
                                            <td>
                                                <a href='approve.php?id=<?php echo $data['id']?>&user_id=<?php echo $data['buyer_id'];?>&m_id=<?php echo $data["medicine_id"] ?>' class='btn btn-success m-r-1em'>Approve</a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            
<?php 
}else{
    header("location:index.php");
}
require "../../includes/template/footer.php";
ob_end_flush();