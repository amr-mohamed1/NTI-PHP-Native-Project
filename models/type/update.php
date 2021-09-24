<?php 
ob_start();
session_start();
$boot="true";
$page_name = "update Type";
require "../../connect_db.php";
require "../../includes/functions/function.php";
require "../../layout/topNav.php";
require "../../includes/template/header.php";
if(isset($_SESSION['user_type']) &&$_SESSION['user_type'] == 1 ||  $_SESSION['user_type'] == 3){
if(isset($_GET["id"]) && is_numeric($_GET['id'])){
    $id=$_GET["id"];
$data = all_where("type","id",$_GET['id']);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){



  if(empty($_POST["title"])){
    echo "
    <script>
        toastr.error('Sorry Title or Content Can not be empty......!')
    </script>";
  }else if(!is_string($_POST["title"])){
    echo "
    <script>
        toastr.error('Sorry Title or Content Should be string only......!')
    </script>";
  }else if(strlen($_POST["title"])<4){
    echo "
    <script>
        toastr.error('Sorry Title Should be more than 5 characters......!')
    </script>";
  }else{
    
    $title    = filter_var($_POST["title"],FILTER_SANITIZE_STRING);
    
    if(update_type($title,$id)){
    }else{
      echo "error";
    }

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
            update Type
          </li>
      </ol>



      <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">

          <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input value="<?php echo $data[0]['type'] ?>" type="text" name="title" class="form-control" id="exampleInputName" aria-describedby=""
                  placeholder="Enter Title">
          </div>


          <button type="submit" class="btn btn-primary">update Type</button>
      </form>


  </div>
</main>



<?php 
}else{
  header("location:index.php");
}

require "../../includes/template/footer.php";
ob_end_flush();