<?php
    session_start();
    include "function.php";
    if(isset($_GET['id'])){
        $hasil = show_one($_GET['id']);
    }

    if (isset($_POST['cirim'])){
        $namap = $_POST['namap'];
        $kode = $_POST['kode'];
        $price = $_POST['price'];
        $tgl = $_POST['tgl'];

        $tambah = mysqli_query($konek, "INSERT INTO pengepul (nama_p, kode_produk, harga_p, tanggal_p) VALUES ('$namap', '$kode', '$price', '$tgl')");

        if ($tambah) {
            echo"
            <script>
                alert('Berhasil Mengajukan Penawaran');
                window.location.href = 'user/index.php';
            </script>
            ";
        } else{
            echo"
                <script>
                    alert('Gagal');
                    window.location.href = 'register.php';
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
    <title>Form Input Survey</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
     <!-- Style CSS -->
     <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="kembali">
        <a href="user/index.php">Kembali</a>
    </div>
    <!-- Pembuka -->
    <div class="pembuka">
        <h1>Berikan Penawaran Anda !</h1>
        <p>"Penawaran anda akan menjadi tolak ukur kami"</p>
    </div>
    
    <!-- Form Input -->
    <section id="form-input">
        <div class="form">
            <div class="produk">
                <div class="img-produk">
                    <img src="img/<?= $hasil['gambar'] ?>" alt="">
                </div>
                <h3><?= $hasil['jenis_produk'];?></h3>
                <div class="deskripsi-produk">
                    <table border="1" class="table-form">
                        <th>Nama Pemilik</th>
                        <th>Kode Produk</th>
                        <th>Alamat</th>
                        <th>Jumlah Stok</th>
                        <th>Deskripsi Produk</th>
                        <tr>
                            <td><?= $hasil['nama_produk'];?></td>
                            <td><?= $hasil['kode_produk'];?></td>
                            <td><?= $hasil['alamat'] ?></td>
                            <td><?= $hasil['jumlah'] ?></td>
                            <td><?= $hasil['deskripsi'] ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="survey">
                <img src="img/petani.png" alt="" width="100%" height="300px
                ">
                <p style="text-align: center; color: rgba(99, 99, 96, 0.677); margin: 10px 0;">*untuk mendapatkan produk, isi form berikut</p>
                <form action="" method="post">
                    <label for="">Kode Produk</label>
                    <input type="text" readonly value="<?= $hasil['kode_produk'];?>" name="kode">
                    <label for="">Jenis Produk</label>
                    <input type="text" readonly value="<?= $hasil['jenis_produk'];?>" name="jenis">
                    <label for="nama">Nama Anda</label>
                    <input type="text" id="nama" name="namap" required>
                    <label for="harga">Harga yang Ditawarkan / kg</label>
                    <input type="number" id="harga" name="price" required>
                    <label for="tanggal">Tanggal Kunjungan</label>
                    <input type="date" id="tanggal" name="tgl" required>
                    
                    <!-- <button type="submit" class="cirim" name="cirim">Kirim</button> -->

                    <?php if(isset($_SESSION['ulogin']))
                    { ?>
                    <button type="submit" class="cirim" name="cirim">Kirim</button>
                    <div class="informasi-p">
                        <a href="index2.php">*Info Penawaran</a>
                    </div>
                    <?php } else { ?>
                        <div class="login-dulu">
                            <a href="auth/login.php">login</a>
                        </div>
                    <?php } ?>
                </form>
            </div>
        </div> 
    </section>

    <!-- Copyright -->
    <div class="copyright">
        <p>&#169; Ma'Baluki All Right Reserved.</p>
    </div>

    <!-- JavaScript -->
    <script src="js/main.js"></script>
</body>
</html>