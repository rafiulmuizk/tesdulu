<?php 
    $hostname = "localhost";
    $username = "root";
    $password =  "";
    $nama_database = "project";
    
    $konek = mysqli_connect($hostname, $username, $password, $nama_database);
    
    function tampilkan_data(){
        global $konek;

        $sql = "SELECT * FROM produk";
        $result = mysqli_query($konek, $sql);
        return $result;
    }


    function tampil_user($id){
        global $konek;

        $sql = "SELECT * FROM produk WHERE id_user = '$id'";
        $result = mysqli_query($konek, $sql);
        return $result;
    }
    
    function tampil_harga(){
        global $konek;

        $sql2 = "SELECT pengepul.kode_produk, pengepul.id_p, jenis_produk, nama_p, harga_p, tanggal_p, status FROM pengepul INNER JOIN 
        produk ON pengepul.kode_produk = produk.kode_produk  WHERE status !=1 ORDER BY harga_p";
        $result = mysqli_query($konek, $sql2);
        return $result;
    }
    function lihat_info(){
        global $konek;

        $sql2 = "SELECT pengepul.kode_produk, pengepul.id_p, jenis_produk, nama_p, harga_p, tanggal_p, status FROM pengepul INNER JOIN 
        produk ON pengepul.kode_produk = produk.kode_produk  WHERE status =1 ";
        $result = mysqli_query($konek, $sql2);
        return $result;
    }
    function status(){
        global $konek;

        $sql3 = "SELECT  pengepul.id_p, pengepul.kode_produk, produk.jenis_produk, nama_produk, alamat, jumlah, status FROM pengepul INNER JOIN 
        produk ON pengepul.kode_produk = produk.kode_produk  WHERE status OR status!=1";
        $result = mysqli_query($konek, $sql3);
        return $result;
    }
    
    function show_one($id){
        global $konek;
    
        $query = "SELECT * FROM produk WHERE id = '$id'";
        $hasil = mysqli_query($konek, $query);
        return mysqli_fetch_assoc($hasil);
    }

    function tambah_data($data){
        global $konek;

        
        $nama = $data['nama'];
        $kode = $data['kode'];
        $jenis = $data['jenis'];
        $alamat = $data['alamat'];
        $jumlah = $data['jumlah'];
        $gambar = upload_file();
        $deskripsi = $data['deskripsi'];
        $iduser = $data['iduser'];
        
        if (!$gambar){
            return false;
        }

        $sql = "INSERT INTO produk VALUES ('','$nama', '$kode', '$jenis', '$alamat', '$jumlah', '$gambar', '$deskripsi', '$iduser')";
        return mysqli_query($konek, $sql);
    }
    function pengunjung($data){
        global $konek;

        $nama_pengunjung = $data['nama_pengunjung'];
        $email_pengunjung = $data['email'];
        $pesan = $data['pesan'];

        $sql = "INSERT INTO pengunjung VALUES ('','$nama_pengunjung', '$email_pengunjung', '$pesan')";
        return mysqli_query($konek, $sql);
    }
    function tampil_pengunjung(){
        global $konek;

        $sql = "SELECT * FROM pengunjung";
        $result = mysqli_query($konek, $sql);
        return $result;
    }

    function upload_file(){
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        $extensifileValid = ['jpg', 'jpeg', 'png'];
        $extensifile = explode('.', $namaFile);
        $extensifile = strtolower(end($extensifile));

        // Cek Format Gambar
        if (!in_array($extensifile, $extensifileValid)){
            echo"<script>
               alert('Format File harus jpg, jpeg, atau png');
               document.location.href= 'tambah.php';
            </script>";
        }

        // Cek ukuran gambar
        if ($ukuranFile > 2048000){
            echo"<script>
               alert('Ukuran gambar maksimal 20 MB');
               document.location.href= 'tambah.php';
            </script>";
        }

        $namafileBaru = uniqid();
        $namafileBaru .= '.';
        $namafileBaru .= $extensifile;

        //pindah ke folder lokal
        move_uploaded_file($tmpName, 'img/'. $namafileBaru);
        return $namafileBaru;
    }

    function update($data){
        global $konek;
        $id = $data['id'];
        $nama = $data['nama'];
        $kode = $data['kode'];
        $jenis = $data['jenis'];
        $alamat = $data['alamat'];
        $jumlah = $data['jumlah'];
        $gambar = upload_file();
        $deskripsi = $data['deskripsi'];
    
        if($nama != null && $kode != null && $jenis != null && $alamat != null && $jumlah != null &&  $deskripsi != null){
            $query = "UPDATE produk SET nama_produk='$nama', kode_produk='$kode', jenis_produk='$jenis', alamat='$alamat', jumlah='$jumlah', gambar='$gambar', deskripsi='$deskripsi' WHERE id = $id"; 
            mysqli_query($konek, $query);
            if(mysqli_affected_rows($konek)){
                echo "
                    <script>
                        alert('Edit Data Berhasil');
                        window.location.href = 'index.php';
                    </script>
                ";
            }
        }
    }

    function show_update($id){
        global $konek;
        // query untuk update data
        $query_select = "SELECT * FROM produk WHERE id = '$id'";
        // eksekusi query
        $result = mysqli_query($konek, $query_select);
    
        // menyinmpan hasil query (datanya) dalam $data
        return mysqli_fetch_assoc($result);
    }
    
    function hapus_data($id){
        global $konek;

        $query = "DELETE FROM produk WHERE id = $id";

        mysqli_query($konek, $query);
        return mysqli_affected_rows($konek);
    }

?>