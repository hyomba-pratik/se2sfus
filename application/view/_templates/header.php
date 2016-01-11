<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SFuS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- JS -->
    <!-- please note: The JavaScript files are loaded in the footer to speed up page construction -->
    <!-- See more here: http://stackoverflow.com/q/2105327/1114320 -->

    <!-- CSS -->
    <link href="<?php echo URL; ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo URL; ?>assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo URL; ?>assets/css/all-skins.css" rel="stylesheet" type="text/css">
    <link href="<?php echo URL; ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo URL; ?>assets/css/sweetalert.css" rel="stylesheet" type="text/css">
    <link href="<?php echo URL; ?>assets/css/helpers.css" rel="stylesheet" type="text/css">
    <link href="<?php echo URL; ?>assets/css/footable.bootstrap.css" rel="stylesheet" type="text/css">
    
</head>
<?php 
    //echo $loggedin_user["user_role"];
?>
<body class="<?php echo (($loggedin_user["user_role"])=="Counsellor")?"skin-green":"skin-blue"; ?>">


