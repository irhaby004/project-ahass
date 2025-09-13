<?php 
    session_start();
    if(!isset($_SESSION['ID'])){
      header("location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pemasaran Ikan - <?=ucwords($page);?></title>
        <link href="assets/css/datatables.css" rel="stylesheet" />
        <link href="assets/css/styles.css" rel="stylesheet" />
        <script src="js/font-awsome-6-1.0.js"></script>  
        <!-- SweetAlert 2 -->
        <script src="assets/dist/sweetalert2/sweetalert2.all.min.js"></script>
        <link rel="assets/dist/sweetalert2/sweetalert2.min.css">
        
    </head>