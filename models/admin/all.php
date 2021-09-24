<?php 
ob_start();
session_start();
$boot="true";
$page_name = "All Admins";
require "../../connect_db.php";
require "../../includes/functions/function.php";
require "../../layout/topNav.php";
require "../../includes/template/header.php";
if(isset($_SESSION['user_type']) &&$_SESSION['user_type'] == 1 ||  $_SESSION['user_type'] == 3){

$all_category = all_where("users","type","1");
if(isset($_SESSION["admin_delete"])){
if($_SESSION["admin_delete"] == "1"){
    echo "
    <script>
        toastr.error('Admin has been deleted ...!')
    </script>";
    unset($_SESSION["admin_delete"]);
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
                            <li class="breadcrumb-item active" aria-current="page">All Admins</li>
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
                                            <th>Title</th>
                                            <th>Content</th>
                                            <th>Controls</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Content</th>
                                            <th>Controls</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php foreach ($all_category as $data){?>
                                       
                                        <tr>
                                            <td><?php echo $data["id"] ?></td>
                                            <td><?php echo $data["username"] ?></td>
                                            <td><?php echo $data["email"] ?></td>
                                            <td>
                                                <a href='../../delete.php?from=admin&id=<?php echo $data['id'];?>' class='btn btn-danger m-r-1em mt-3 mr-3 mb-3'>Delete</a>
                                                <a href='update.php?id=<?php echo $data['id'];?>' class='btn btn-primary m-r-1em'>Edit</a>
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