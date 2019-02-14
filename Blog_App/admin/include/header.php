<?php ob_start(); ?>
<?php include "../db.php"; ?>
<?php include "./function.php"; ?>
<?php session_start(); ?>
<?php 
//THE AUTHERIZATION LOGIC 
if(!isset($_SESSION['user_role']) || $_SESSION['user_role']!=='Admin'){
        header("location:../index.php");
    }


 ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>The aswesome Assam Admin </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet">

     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
     <script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>
   
    </head>




<body>





















