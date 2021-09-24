<?php 

function url($input){

echo "http://".$_SERVER['HTTP_HOST']."/NTI/project_php/".$input;

} ?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $page_name?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400&display=swap" rel="stylesheet">
    <?php if (@$boot == "true"){?>
    <link rel="stylesheet" href="<?php url("layout/css/") ?>bootstrap.min.css">
    <?php }?>
    <link rel="stylesheet" href="<?php url("layout/css/") ?>all.min.css">
    <link rel="stylesheet" href="<?php url("layout/css/") ?>owl.carousel.min.css">
    <link rel="stylesheet" href="<?php url("layout/css/") ?>owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php url("layout/css/") ?>semantic.min.css">
    <link rel="stylesheet" href="<?php url("asset/css/") ?>styles.css">
    <link rel="stylesheet" href="<?php url("layout/css/") ?>toastr.min.css">
    <link rel="stylesheet" href="<?php url("layout/css/") ?><?php echo $style ?>">
    <script src="<?php url("layout/js/")?>jquery-3.5.1.min.js"></script>
    <script src="<?php url("layout/js/")?>toastr.min.js"></script>
</head>
<body>