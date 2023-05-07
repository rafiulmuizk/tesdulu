<?php

    session_start();

    if(!isset($_SESSION["login"])){
        header("Location: auth/login.php");
        exit;
    }

    if($_SESSION["role"] != "Petani"){
        header("Location: index2.php");
    }

    require "function.php";
    $page = isset($_GET['p']) ? $_GET['p'] : false;
    $data = tampilkan_data();
    $data2 = tampil_harga();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/dashboard.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- Box Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <title>Admin Dashboard Panel</title> 

    <style>
        .tomboll{
            border: none;
            padding: 10px 20px;
            color: #e6e5e5;
            background-color: rgb(63, 187, 71);
            border-radius: 20px;
            font-weight: 700;
        }
        .tomboll:hover{
            background-color: #4070f4;
        }
        .tombol:hover{
            background-color: #4070f4;
        }
    </style>
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="img/logo1.png" alt="">
            </div>

            <span class="logo_name">Ma'Baluki</span>
        </div>
        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="index.php?p=toko">
                    <i class='bx bxs-store-alt'></i>
                    <span class="link-name">Toko Tani</span>
                </a></li>
                <li><a href="index.php?p=konfirmasi">
                    <i class='bx bxs-badge-check'></i>
                    <span class="link-name">Konfirmasi</span>
                </a></li>
                <li><a href="index.php?p=kesepakatan">
                    <i class='bx bxs-message-rounded-error'></i>
                    <span class="link-name">Info Kesepakatan</span>
                </a></li>
            </ul>
            
            <ul class="logout-mode">
                <li><a href="logout.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a>
            </li>

                <div class="mode-toggle">
                </div>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <div class="first">
                <h1>Selamat Datang <?= $_SESSION['login']?></h1>
            </div>
            <div class="kembali-b">
                <a href="#">DASHBOARD</a>
            </div>
        </div>
        <?php include "page.php"; ?>
    </section>
    <script src="js/script.js"></script>
</body>
</html>