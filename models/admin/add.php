<?php 
ob_start();
session_start();
$boot="true";
$script="login.js";
$page_name = "Add Category";
require "../../connect_db.php";
require "../../includes/functions/function.php";
require "../../layout/topNav.php";
require "../../includes/template/header.php";
if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1 ||  $_SESSION['user_type'] == 3){
if($_SERVER["REQUEST_METHOD"] == "POST"){



  if(empty($_POST["name"]) || empty($_POST["pass"])){
    echo "
    <script>
        toastr.error('Sorry pass or name Can not be empty......!')
    </script>";
  }else if(!is_string($_POST["pass"]) || !is_string($_POST["name"])){
    echo "
    <script>
        toastr.error('Sorry pass or name Should be string only......!')
    </script>";
  }else if(strlen($_POST["name"])<5){
    echo "
    <script>
        toastr.error('Sorry Title Should be more than 5 characters......!')
    </script>";
  }else if( strlen($_POST["pass"])<5){
    echo "
    <script>
        toastr.error('Sorry Content Should be more than 15 characters......!')
    </script>";
  }else{
    
    $name    = filter_var($_POST["name"],FILTER_SANITIZE_STRING);
    $email  = filter_var($_POST["email"],FILTER_SANITIZE_EMAIL);
    $pass  = filter_var($_POST["pass"],FILTER_SANITIZE_STRING);
    $sup_hased  = sha1($pass);
    $gender  = filter_var($_POST["gender"],FILTER_SANITIZE_STRING);

    insert_admin ($name,$email,$sup_hased,$gender);
    
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

      <h1 class="mt-4">Dashboard </h1>
      <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item active">
            Add Admin
          </li>
      </ol>



      <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">

          <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" name="name" class="form-control" id="exampleInputName" aria-describedby=""
                  placeholder="Enter Title">
          </div>

          <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" name="email" required class="form-control" id="exampleInputName" aria-describedby=""
                  placeholder="Enter Title">
          </div>

          <div class="form-group">
              <label for="exampleInputEmail1">Password</label>
              <input type="password" name="pass" class="form-control" id="exampleInputName" aria-describedby=""
                  placeholder="Enter Title">
          </div>

          <div class="form-group">
          <label for="gender">Gender</label>
            <select class="custom-select ui search dropdown" name="gender" id="gender" required>
                <option selected disable ddefault  value="">Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>



          <button type="submit" class="btn btn-primary">Add Category</button>
      </form>


  </div>
</main>



<?php 

}else{
  header("location:index.php");
}
require "../../includes/template/footer.php";
ob_end_flush();