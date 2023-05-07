<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/dashboard.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- Box Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <style>
        .dashboard{
            position: relative;
            left: 250px;
            background-color: var(--panel-color);
            min-height: 100vh;
            width: calc(100% - 250px);
            padding: 10px 14px;
            transition: var(--tran-05);
            overflow: hidden;
        }
        .store{
            width: 90%;
            height: 100vh;
            margin-top: 80px;
            padding-top: 20px;
            border-radius: 20px;
            background: #EEEEEE;
        }
        @media (max-width: 400px) {
            .regis-tom{
                width: 25%;
                gap: 10px;
                padding-top: 40px;
                margin: auto;
            }
            .tambahd{
                width: 50%;
            }
            .tiga-aksi{
                display: flex;
                flex-direction: column;
                margin-left: 20px;
                border: none;
                gap: 10px;
                margin-top: 8px;
                margin-bottom: 8px;
            }
            .tiga-aksi a{
                margin-bottom: 40px;
            }
        }
    </style>
</head>
<body>
    <div class="store" id="store">
        <h4>Tawarkan Hasil Tani Anda</h4>
        <div class="tambahd">
            <a href="tambah.php">Tambah Data</a> 
        </div> 
        <table border="1" class="table" style="margin: auto; border-collapse: collapse;">
            <tr>
                <th style="padding: 30px;">Nama Pemilik</th>
                <th style="padding: 30px;">Kode Produk</th>
                <th style="padding: 30px;">Jenis Produk</th>
                <th style="padding: 30px;">Alamat</th>
                <th style="padding: 30px;">Jumlah</th>
                <th style="padding: 30px;">Gambar</th>
                <th style="padding: 30px;">Deskripsi</th>
                <th>Aksi</th>
            </tr>
                <?php
                    $iduser =  $_SESSION['id'];
                    $result = tampil_user($iduser);

                    foreach ($result as $row):
                ?>
                <tr>
                    <td style="padding: 30px;"><?= $row['nama_produk']; ?></td>
                    <td><?= $row['kode_produk']; ?></td>
                    <td><?= $row['jenis_produk']; ?></td>
                    <td><?= $row['alamat']; ?></td>
                    <td><?= $row['jumlah']; ?></td>
                    <td><img src="img/<?= $row['gambar']; ?>" alt="" width="50%" height="100px"></td>
                    <td><?= $row['deskripsi']; ?></td>
                    <td class="tiga-aksi" style="padding: 30px;">
                        <?php 
                            $id = $row['id']; 
                        ?>
                        <a href="form.php?id=<?= $id ?>"><i class='bx bx-show ss'></i></a>
                        <a href="hapus.php?id=<?= $id ?>" onclick="return confirm('Yakin hapus data ini ?')"><i class='bx bx-x salah'></i></a>
                        <a href="edit.php?id=<?= $id ?>"><i class='bx bx-edit sb'></i></a>
                    </td>
                </tr>
                <?php
                endforeach;
                ?>
            </table>
    </div>
</body>
</html>