<?php
    session_start();

    if(!isset($_SESSION["login"])){
        header("Location: auth/login.php");
        exit;
    }
    if($_SESSION["role"] == "Pengepul"){
        header("Location: index2.php");
    }

include 'function.php';

    if (isset($_POST['submit'])) {

        if (tambah_data($_POST) > 0) {
            echo "
                    <script>
                        alert('Tambah Data Berhasil');
                        window.location.href = 'index.php';
                    </script>
                ";
        } else {
            echo "
                    <script>
                        alert('Tambah Data Gagal');
                        window.location.href = 'tambah.php';
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
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section id="tambah">
        <div class="container">
            <h1 class="tmbh">Tambah Produk</h1>
            <div class="tambah">
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Nama Pemilik</label>
                    <input type="text" name="nama" required>
                    <label for="">Kode Produk</label>
                    <input type="text" name="kode" required>
                    <select name="jenis" id="">
                        <option value="padi">Padi</option>
                        <option value="jagung">Jagung</option>
                        <option value="kacang">Kacang</option>
                        <option value="Wijen">Wijen</option>
                    </select>
                    <label for="">Alamat</label>
                    <input type="text" name="alamat" required>
                    <label for="">Jumlah Produk</label>
                    <input type="number" name="jumlah" required>
                    <label for="">Gambar</label>
                    <input type="file" name="gambar">
                    <label for="">Deskripsi</label>
                    <input type="text" name="deskripsi" required>
                    <input type="hidden" name="iduser" value="<?= $_SESSION['id']; ?>">
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