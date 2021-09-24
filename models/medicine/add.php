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
if($_SERVER["REQUEST_METHOD"] == "POST"){



    if(empty($_POST["title"]) || empty($_POST["cat_id"])){
      echo "
      <script>
          toastr.error('Sorry Title or Category Can not be empty......!')
      </script>";
    }
    elseif(empty($_POST["price"]) || empty($_POST["desc"])){
      echo "
      <script>
          toastr.error('Sorry Price or Description Can not be empty......!')
      </script>";
    }
    else if(!is_string($_POST["title"]) || !is_string($_POST["desc"])){
      echo "
      <script>
          toastr.error('Sorry Title or Content Should be string only......!')
      </script>";
    }
    else if(!is_numeric($_POST["price"]) || !is_numeric($_POST["cat_id"])){
      echo "
      <script>
          toastr.error('Sorry Price or Categoory id Should be Numeric only......!')
      </script>";
    }
    else if(strlen($_POST["title"])<3){
      echo "
      <script>
          toastr.error('Sorry Title Should be more than 5 characters......!')
      </script>";
    }
    else if( strlen($_POST["desc"])<15){
      echo "
      <script>
          toastr.error('Sorry Content Should be more than 15 characters......!')
      </script>";
    }
    else{
      
      $title      = filter_var($_POST["title"],FILTER_SANITIZE_STRING);
      $cat_id     = filter_var($_POST["cat_id"],FILTER_SANITIZE_NUMBER_INT);
      $price      = filter_var($_POST["price"],FILTER_SANITIZE_NUMBER_INT);
      $desc       = filter_var($_POST["desc"],FILTER_SANITIZE_STRING);

      $avatar_name            = $_FILES["img"]["name"];
      $size                   = $_FILES["img"]["size"];
      $tmp_name               = $_FILES["img"]["tmp_name"];
      $type                   = $_FILES["img"]["type"];
      $ext_allowed            = array("png","jpg","jpeg","mp4");
      @$extention             = strtolower(end(explode(".",$avatar_name)));
      if(in_array($extention,$ext_allowed)){
          $avatar = rand(0,1000000) . "_" . $avatar_name ;
          $destination = "../../img/medicine/" . $avatar ;
          
          /*check if info already added*/
  
          global $con;
          $stmt = $con->prepare("SELECT * FROM medicine WHERE medicine = ?");
          $stmt->execute(array($title));
          $rows = $stmt->fetch(PDO::FETCH_ASSOC);
          $count = $stmt->rowCount();
          if ($count){
              echo "
                  <script>
                      toastr.error('Sorry This Medicine is already excit.')
                  </script>";
          }
          else{
              move_uploaded_file($tmp_name,$destination);
              add_medicine ($title , $cat_id , $price , $desc , $avatar);

          }   




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
              Add Medicine
            </li>
        </ol>



        <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">

            <div class="form-group">
                <label for="exampleInputEmail1">Medicine Namw</label>
                <input type="text" name="title" class="form-control" id="exampleInputName" aria-describedby=""
                    placeholder="Enter Title">
            </div>


            <div class="form-group">
                <label for="exampleInputPassword1">category</label>
                <select name="cat_id" class="form-control">

                    <?php foreach(all_data("category") as $data) {?>
                    <option value="<?php echo $data['id'];?>"><?php echo $data['title'];?></option>
                    <?php }?>
                </select>
            </div>


            <div class="form-group">
                <label for="price">Medicine Price</label>
                <input type="number" name="price" class="form-control" id="price" aria-describedby=""
                    placeholder="Enter Title">
            </div>


            <div class="form-group">
                <label for="exampleInputPassword1">Small Description</label>
                <textarea name="desc" class="form-control"></textarea>    
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Medicine Namw</label>
                <input type="file" name="img" class="form-control" id="exampleInputName" aria-describedby=""
                    placeholder="Enter Title">
            </div>


            <button type="submit" class="btn btn-primary">Add Medicine</button>
        </form>


    </div>
</main>

<?php
}else{
    header("location:index.php");
}
require "../../includes/template/footer.php";
ob_end_flush();