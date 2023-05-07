<?php 
    session_start();

    if(!isset($_SESSION["login"])){
        header("Location: auth/login.php");
        exit;
    }
    if($_SESSION["role"] == "Pengepul"){
        header("Location: index2.php");
    }
    require "function.php";
    
    // cek apakah ada id yang dikirim
    if(isset($_GET['id'])){
        $data = show_update($_GET['id']);
    }

    if (isset($_POST['submit'])) {
        update($_POST);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section id="tambah">
        <div class="container">
            <h1 class="tmbh">Edit Produk</h1>
            <div class="tambah">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                    <label for=""> Nama Pemilik</label>
                    <input type="text" name="nama"  value="<?= $data['nama_produk'] ?? '' ?>" required>
                    <label for="">Kode Produk</label>
                    <input type="text" name="kode"  value="<?= $data['kode_produk'] ?? '' ?>" required>
                    <select name="jenis" id="">
                        <option value="<?= $data['jenis_produk'] ?? '' ?>">Padi</option>
                        <option value="<?= $data['jenis_produk'] ?? '' ?>">Jagung</option>
                        <option value="<?= $data['jenis_produk'] ?? '' ?>">Kacang</option>
                        <option value="<?= $data['jenis_produk'] ?? '' ?>">Wijen</option>
                    </select>
                    <label for="">Alamat</label>
                    <input type="text" name="alamat" value="<?= $data['alamat'] ?? '' ?>" required>
                    <label for="">Jumlah Produk</label>
                    <input type="number" name="jumlah" value="<?= $data['jumlah'] ?? '' ?>" required>
                    <label for="">Gambar</label>
                    <img src="img/<?= $data['gambar'] ?? '' ?>" alt="">
                    <input type="file" name="gambar">
                    <label for="">Deskripsi</label>
                    <input type="text" name="deskripsi" value="<?= $data['deskripsi'] ?? '' ?>" required>
                    <div class="tom">
                        <a href="index.php" class="tom">Kembali</a>
                        <button class="tom" name="submit">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>