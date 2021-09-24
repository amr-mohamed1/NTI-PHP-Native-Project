<?php 
ob_start();
session_start();
require "./connect_db.php";
require "./includes/functions/function.php";
$page_name = "Admin Dashboard";
$boot="true";
require './layout/topNav.php';
require_once "./includes/template/header.php";
if(isset($_SESSION['user_type']) &&$_SESSION['user_type'] == 1 ||  $_SESSION['user_type'] == 3){
$all_users = all_data("users");
?>
    
    <div id="layoutSidenav">
           
 <?php 
    require './layout/sidNav.php';
 ?>
          
          
          
          
          
          
          
            <div id="layoutSidenav_content">
              
            
            
                  <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Website Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Categories</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?php echo url("models/category/all.php");?>">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Medicines</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?php echo url("models/medicine/all.php");?>">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Orders Requests</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?php echo url("models/orders/all.php");?>">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Payments History</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

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
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Gender</th>
                                                <th>Adress</th>
                                                <th>Type</th>
                                                <?php if(isset($_SESSION['user_type']) &&$_SESSION['user_type'] == 3){?><th>Control</th><?php } ?>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Gender</th>
                                                <th>Adress</th>
                                                <th>Type</th>
                                                <?php if(isset($_SESSION['user_type']) &&$_SESSION['user_type'] == 3){?><th>Control</th><?php } ?>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                           <?php foreach($all_users as $data){?>
                                            <tr>
                                                <td><?php echo $data["id"] ?></td>
                                                <td><?php echo $data["username"] ?></td>
                                                <td><?php echo $data["email"] ?></td>
                                                <td><?php echo $data["gender"] ?></td>
                                                <td><?php if($data["adress"]=="0"){
                                                    echo "Not Set Yet";
                                                } else{
                                                    echo $data["adress"];
                                                }
                                                ?></td>

                                                <td><?php if($data["type"]=="2"){
                                                    echo "User";
                                                } 
                                                else if($data["type"]=="1"){
                                                    echo "Admin";
                                                }
                                                else if($data["type"]=="3"){
                                                    echo "Super Admin";
                                                }
                                                ?></td>

<?php if(isset($_SESSION['user_type']) &&$_SESSION['user_type'] == 3){?>

                                                <td>
                                                <a href='delete.php?from=dash&id=<?php echo $data['id'];?>' class='btn btn-danger m-r-1em'>Delete</a>
                                                </td>
                                            <?php }?>
                                            </tr>
                                            <?php }?>
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
require_once "./includes/template/footer.php";
ob_end_flush();