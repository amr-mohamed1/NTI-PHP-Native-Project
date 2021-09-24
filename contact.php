<?php 
    ob_start();
    session_start();
    require "./connect_db.php";
    require "./includes/functions/function.php";
    $page_name = "Dashboard";
    $style = "contact.css";
    $script="main.js";
    $boot = "true";
    require_once "./includes/template/header.php";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $name = filter_var($_POST["name"] , FILTER_SANITIZE_STRING);
            $email = filter_var($_POST["email"] , FILTER_SANITIZE_EMAIL);
            $phone = filter_var($_POST["phone"] , FILTER_SANITIZE_NUMBER_INT);
            $message = filter_var($_POST["message"] , FILTER_SANITIZE_STRING);
            $head = "from: " . $email . "\r\n";

            $formErrors = array ();
            if (strlen($name) < 3 || empty($name)){
                $formErrors[] = "<div class=\"alert alert-danger text-right\" role=\"alert\">
                عفوا .. يجب ان يكون الاسم اكثر من 3 احرف
            </div>";
            $name_error="border border-danger";
            }
            if (empty($email)){
                $formErrors[] = "<div class=\"alert alert-danger text-right\" role=\"alert\">
                عفوا .. لا يمكن ان يترك حقل الايميل فارغ
            </div>";
            $email_error="border border-danger";
            }
            if (strlen($phone) < 11 || strlen($phone) > 18){
                $formErrors[] = "<div class=\"alert alert-danger text-right\" role=\"alert\">
                عفوا .. رقم الهاتف يجب ان يكون اكتر من 11 رقم واقل من 18 رقم
            </div>";
            $phone_error="border border-danger";
            }
            if (strlen($message) <= 15){
                $formErrors[] = "<div class=\"alert alert-danger text-right\" role=\"alert\">
                عفوا .. الرسالة يجب ان تكون علي الاقل 15 حرف
            </div>";
            $message_error="border border-danger";
            }
            if (empty($formErrors)){
                mail("el3es201611@gmail.com","Message From Website","اSender Name: " . $name . "\n\r" . "Phone Number: " . $phone . "\n\r" . "Message: " . $message ,$head);
                header("Location: confirm.php");
                   
            }
        }

    ?>
<div class="overlay">
    <?php
    if (isset($formErrors)){ 
        foreach($formErrors as $error){
        echo $error;
        }
    }
    ?>
    <div class="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-6 contact_form">
                    <h3>اتصل بنا <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24"><path fill="#6563ff" d="M17,7h1V8a1,1,0,0,0,2,0V7h1a1,1,0,0,0,0-2H20V4a1,1,0,0,0-2,0V5H17a1,1,0,0,0,0,2Zm4,4a1,1,0,0,0-1,1v6a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V8.41L9.88,14.3a3,3,0,0,0,4.24,0l2.47-2.47a1,1,0,0,0-1.42-1.42L12.7,12.88a1,1,0,0,1-1.4,0L5.41,7H13a1,1,0,0,0,0-2H5A3,3,0,0,0,2,8V18a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V12A1,1,0,0,0,21,11Z"/></svg></h3>

                    <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="<?php echo $name_error;?>" name="name" value = "<?php if(isset($name)){ echo $name;} ?>" placeholder="Name *" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="email" class="<?php echo $email_error;?>" name="email" value = "<?php if(isset($email)){ echo $email;} ?>" placeholder="Email *" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="tel" name="phone" class="<?php echo $phone_error;?>" value = "<?php if(isset($phone)){ echo $phone;} ?>" placeholder="phone *" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="message" class="<?php echo $message_error;?>" placeholder="Your Message *" rows="4" autocomplete="off"><?php if(isset($message)){ echo $message;} ?></textarea>
                                </div>
                            </div>
                            
                        <button id="success" type="submit">ارسال الرساله</button>
                        <button type="button"><a style="outline: none;text-decoration: none;color:#eee;font-size:20px;" href="index.php">الصفحة الرئيسيه</a></button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 contact_img">
                    <img src="img/message.png" alt="contactImg">
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    require_once "./includes/template/footer.php";
ob_end_flush();