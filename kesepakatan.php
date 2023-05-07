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
    </style>
</head>
<body>
    <div class="store" id="konfirmasi">
        <h4>Konfirmasi Permintaan</h4>
        <form action="" method="post">
            <table border="1" class="table"width="80%" style="margin: auto; height: 75%; border-collapse: collapse;">
            <tr>
                <th style="padding: 30px;">Kode Produk</th>
                <th style="padding: 30px;">Jenis Produk</th>
                <th style="padding: 30px;">Nama Pengepul</th>
                <th style="padding: 30px;">Harga Tertinggi</th>
                <th style="padding: 30px;">Tanggal Survey</th>
                <th style="padding: 30px;">Status</th> 
            </tr>
            <?php
                $hasil = lihat_info();

                foreach ($hasil as $baris):
            ?>
            <tr>
                <td style="padding: 30px;"><?= $baris['kode_produk']; ?></td>
                <td style="padding: 30px;"><?= $baris['jenis_produk']; ?></td>
                <td style="padding: 30px;"><?= $baris['nama_p']; ?></td>
                <td style="padding: 30px;"><?= $baris['harga_p']; ?></td>
                <td style="padding: 30px;"><?= $baris['tanggal_p']; ?></td>
                <td style="padding: 30px;"><?php 
                    if ($baris['status'] == 0){
                        echo '<span style="color: #F8CB2E;">Menunggu Persetujuan</span>';
                    } else if($baris['status'] == 1){
                        echo '<span style="color: #06f044dd; font-style: italic;">Telah disetujui</span>';
                    } else{
                        echo '<span style="color: red;">Tidak disetujui</span>';
                    }
                ?>
                </td>
            </tr>
            <?php
                endforeach;
            ?>
            </table>
        </form>
            
    </div>
</body>
</html>
