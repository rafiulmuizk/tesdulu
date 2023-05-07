<?php
    require "../function.php";
    $data = tampilkan_data();

    if (isset($_POST['kirim_pengunjung'])) {

        if (pengunjung($_POST) > 0) {
            echo "
                    <script>
                        alert('Pesan berhasil dikirim');
                        window.location.href = 'index.php';
                    </script>
                ";
        } else {
            echo "
                    <script>
                        alert('pesan gagal terkirim');
                        window.location.href = 'index.php';
                    </script>
                ";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer | Market Digital</title>

    <!-- Style CSS -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- Box Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <style>
        .shop-box{
            position: relative;
            flex: 1 1 16rem;
            text-align: center;
            box-shadow: 0px 4px 4px rgb(14 55 54 / 15%);
            padding: 20px;
            border-radius: 0.5rem;
        }
        .customer-container .box{
            flex: 1 1 16rem;
            text-align: center;
            box-shadow: 0px 4px 4px rgb(14 55 54 / 15%);
            padding: 20px;
            border-radius: 0.5rem;
            width: 30%;
            height: 300px;
            overflow: hidden;
        }
        @media (max-width: 1100px){
            .home-text h1{
                font-size: 3rem;
            }
        }

        @media (max-width: 991px){
            header{
                padding: 18px 4%;
            }
            section{
                padding: 50px 4%;
            }
        }

        @media (max-width: 991px){
            header{
                padding: 18px 4%;
            }
            #menu-icon{
                display: initial;
            }
            header.active #menu-icon{
                color: #f3f3f3;
            }
            header .navbar{
                position: absolute;
                top: -500px;
                left: 0;
                right: 0;
                display: flex;
                flex-direction: column;
                background: var(--second-color);
                box-shadow: 0 4px 4px rgb(14, 55, 54 / 15%);
                transition: 0.5s all ease-in-out;
                text-align: center;
            }
            .navbar a{
                padding: 1.5rem;
                display: block;
                color: #fff;
            }
            .navbar.active{
                top: 100%;
            }
            .home-text h1{
                font-size: 2.4rem;
            }
        }
    </style>
    
</head>
<body>

    <!-- Navbar -->
     <header>
        <a href="#" class="logo"><img src="../img/petani - Copy.png" alt="">Ma'Baluki</a>
        <div class="bx bx-menu" id="menu-icon"></div>
        <ul class="navbar">
            <li><a href="#home">Home</a></li>
            <li><a href="#terbaru">Kategori</a></li>
            <li><a href="#shop">Hasil Tani</a></li>
            <li><a href="#customer">Pengunjung</a></li>
            <li><a href="#contact">Kontak</a></li>
        </ul>
        <div class="tombol-login">
            <a href="../auth/login.php">Login</a>
        </div>
     </header>
    <!-- End Navbar -->

    <!-- Home -->
    <section class="home" id="home">
        <div class="home-text">
            <span>Selamat Datang</span>
            <h1>Situs <br> Ma'Baluki</h1>
            <p>Ini adalah Website,<br>untuk jual beli hasil tani secara langsung tanpa perantara</p>
            <a href="#shop" class="btn">Produk</a>
        </div>
    </section>
    <!-- End Home -->

    <!-- Terbaru -->
    <section class="terbaru" id="terbaru">
        <h1 style="color:#081b54;">Kategori</h1>
        <div class="terbaru-container">
            <div class="terbaru-box">
                <div class="box-img">
                    <img src="../img/about1.png" alt="">
                </div>
                <h3>Stok / karung</h3>
                <h2>Jagung</h2>
            </div>
            <div class="terbaru-box">
                <div class="box-img">
                    <img src="../img/about2.png" alt="">
                </div>
                <h3>Stok / karung</h3>
                <h2>Kacang</h2>
            </div>
            <div class="terbaru-box">
                <div class="box-img">
                    <img src="../img/about3.png" alt="">
                </div>
                <h3>Stok / karung</h3>
                <h2>Padi</h2>
            </div>
            <div class="terbaru-box">
                <div class="box-img">
                    <img src="../img/about4.png" alt="">
                </div>
                <h3>Stok / karung</h3>
                <h2>Wijen</h2>
            </div>
        </div>
    </section>
    <!-- End Terbaru -->

    <!-- Shop -->
    <section class="shop" id="shop">
        <div class="heading">
            <h2>Hasil Tani Kami</h2>
            <p>*Ini adalah hasil tani yang telah di distribusikan oleh para petani untuk dijual, silahkan dipilih dan ditawar maszzehh</p>
        </div>
        <div class="shop-container">
                <?php
                    $result = tampilkan_data();

                    foreach ($result as $row):
                ?>
            <div class="shop-box">
                <div class="shop-img">
                    <img src="../img/<?= $row['gambar']; ?>" alt="">
                </div>
                <h3 id="tasty1"><?= $row['jumlah']; ?> Karung</h3>
                <h2 id="price1"><?= $row['alamat']; ?></h2>
                <?php 
                            $id = $row['id']; 
                ?>
                <a href="../form.php?id=<?= $id ?>"><i class='bx bxs-show'></i></a>
            </div>
            <?php
                endforeach;
            ?>
        </div>
    </section>
    <!-- End Shop -->

    <!-- Customer -->
    <section class="customer" id="customer">
        <div class="heading">
            <h2>Review Pengunjung </h2>
            <p>*berikut ditampilkan hasil review dari pengunjung website</p>
        </div>
        
        <div class="customer-container">
        <?php
                    $result = tampil_pengunjung();

                    foreach ($result as $row):
        ?>
            <div class="box">
                <div class="stars">
                    <p style="font-style: italic; font-weight: 700;"><?= $row['email']; ?></p>
                </div>
                <div class="pesanp">
                <p><?= $row['pesan']; ?></p>
                </div>
                <h2><?= $row['nama_pengunjung']; ?></h2>
            </div>
            <?php
                endforeach;
        ?>
        </div>
        
    </section>
    <!-- End Customers -->

    

    <!-- Contact -->
    <section class="contact" id="contact">
        <div class="heading">
            <h2>Kontak</h2>
            <p>*silahkan berikan kritik maupun saran untuk website kami, silahkan untuk mengisi form di bawah ini !</p>
        </div>
        <div class="contact-container">
            <div class="contact-info">
                <h2>Alamat</h2>
                <p>Hubungi kami jika ada saran, kritikan dan masukan. Anda juga bisa mengunjungi studio kami secara langsung berdasarkan alamat yang tertera di bawah!</p>
                <div class="addres">
                    <i class='bx bxs-map' ><span>Bumi Tamarunang Indah, Tamarunang</span></i>
                    <i class='bx bxs-phone' ><span>+6285340031836</span></i>
                    <i class='bx bxs-envelope' ><span>mabbaluki21@gmail.com</span></i>
                </div>
                <div class="social">
                    <a href="https://www.facebook.com/rafiul.muiz.16" target="_blank"><i class='bx bxl-facebook' ></i></a>
                    <a href="https://twitter.com/piulajaa" target="_blank"><i class='bx bxl-twitter' ></i></a>
                    <a href="https://www.secure.instagram.com/rfiulmuizk/" target="_blank"><i class='bx bxl-instagram' ></i></a>
                </div>
            </div>
            <div class="contact-form">
                <form action="" method="post">
                    <input type="text" placeholder="Name*" name="nama_pengunjung" required>
                    <input type="email" name="email" id="" placeholder="Email*" required>
                    <textarea name="pesan" id="" cols="30" rows="10" placeholder="Message*"></textarea>
                    <!-- <input type="button" name="kirim_pengunjung" value="submit" class="btn"> -->
                    <div class="kirim_pengunjung">
                        <button type="submit" name="kirim_pengunjung">Kirim</button>
                    </div>
                </form>
                
            </div>
        </div> 
    </section>
    <!-- End Contact -->

    <!-- Copyright -->
    <div class="copyright">
        <p>&#169; Ma'Baluki All Right Reserved.</p>
    </div>

    <!-- JavaScript -->
    <script src="../js/main.js"></script>
    <script>
        let menu = document.querySelector('#menu-icon');
        let navbar = document.querySelector('.navbar');

        menu.onclick = () => {
            navbar.classList.toggle('active');
        }
        window.onscroll = () => {
            navbar.classList.remove('active');
        }
    </script>
</body>
</html>