<?php 
    require "function.php";

    if (isset($_POST['regis'])){
        $nama_lengkap = $_POST['nama_lengkap'];
        $user = $_POST['user'];
        $password = $_POST['password'];
        $hp = $_POST['hp'];
        $role = $_POST['peran'];

        //encrypt
        $pass = password_hash($password, PASSWORD_BCRYPT);

        $insert = mysqli_query($konek, "INSERT INTO user (nama_lengkap, nama_user, password, nomor_hp, role) VALUES ('$nama_lengkap', '$user', '$pass', '$hp', '$role')");

        if ($insert) {
            header('location.index.php');
        } else{
            echo"
                <script>
                    alert('Registrasi gagal');
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
    <title>Registrasi</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <style>
        .body-regis{
            display: flex;
        }
        .register-r{
            display: flex;
            flex-direction: column;
            gap: 5px;
            max-width: 60%;
            margin: auto;
            margin-right: 650px;
            margin-top: 70px;
        }
        .register-r input{
            padding: 10px;
            border: 3px solid rgba(255, 255, 255, 0.25);
            border-radius: 20px;
            background: transparent;
            outline: none;
            color: #e6e5e5;
            font-size: 1em;
            transition: 0.5s;
        }
        .register-r label{
            color: rgb(233, 215, 215);
        }
        .register-2 input{
            margin-left: 20px;
        }
        .regis-tom{
            display: flex;
            flex-direction: column;
            width: 8%;
            gap: 10px;
            padding-top: 40px;
            margin: auto;
        }
        @media (max-width: 400px){
            .register-r{
                margin-right: 80px;
                margin-top: 50px;
            }
            .regis-tom{
                width: 25%;
                gap: 10px;
                padding-top: 40px;
                margin: auto;
            }
        }     
    </style>
</head>
<body>

    <!-- Header -->
    <h2 style="text-align: center; font-weight: 700; color: #f4f5f6; font-size: 35px; letter-spacing: 5px; padding-top: 80px;">REGISTRASI</h2>
    <!-- End Header -->

    <!-- Form Regis -->
    <form action="" method="post">
        <div class="body-regis">
            <div class="register-r">
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" name="nama_lengkap" required>
                <label for="user">Username</label>
                <input type="text" id="user" name="user" required>
                <label for="pass">Password</label>
                <input type="password" id="pass" name="password" required>
                <label for="num">No. HP</label>
                <input type="number" id="num" name="hp" required>
                <div class="register-2">
                    <label for="">Peran</label><br>
                    <input type="radio" name="peran" value="Petani" required>
                    <label for="">Petani</label>
                    <input type="radio" name="peran" value="Pengepul" required>
                    <label for="">Pengepul</label>
                </div>
            </div> 
        </div>
        <div class="regis-tom">
            <a href="auth/login.php" class="daftar" style="text-decoration: underline; margin-left: -45px;">Login</a>
            <button type="submit" class="masukk" name="regis" style="color: #f4f5f6;">Daftar</button>   
        </div>
    </form>
    <!-- End Form Regis -->
    
</body>
</html>