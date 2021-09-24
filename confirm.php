<?php ob_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600&family=Caveat:wght@400;700&family=Open+Sans:wght@300;400&family=Permanent+Marker&family=Tajawal:wght@200;300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="layout/css/confirm_style.css">
</head>
<body>
    <div class="container">
        <div class="content text-center mt-5 pt-3">
            <img src="img/animat-checkmark-color.gif" alt="gif">
            <p>(جاري التحويل الي الصفحة الرئيسيه) شكرا علي مراسلتنا .. سوف يتم الرد عليكم قريبا</p>
        </div>
    </div>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php 
header("Refresh:4; URL=index.php");
ob_end_flush();