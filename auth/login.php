<?php
    session_start();
    if(isset($_SESSION["login"])){
        header("Location: ../index.php");
    }
    require "../function.php";

    if (isset($_POST['login'])) {
        
        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = mysqli_query($konek, "SELECT * FROM user WHERE nama_user = '$username'");


        //cek username
        if (mysqli_num_rows($result) === 1) {

            $_SESSION['ulogin'] = $_POST['username'];
            //cek password
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row["password"])){

                //set session
                $_SESSION["login"] = $row["nama_lengkap"];
                $_SESSION["role"] = $row["role"];
                $_SESSION['id'] = $row['id_user'];
               
                if($row['role'] === 'Petani'){
                    header("location: ../index.php");
                } else {
                    header("location: ../index2.php");
                }
                exit;
            }
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Register</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
    <div class="h2">
        <h2 data-text="Login/Daftar!">Login/Daftar!</h2>
    </div>
    
    <form action="" method="post">
        <div class="body">
            <div class="foto-petani">
                <img src="../img/petani1-removebg-preview.png" alt="">
            </div>
            <div class="inputbox">
                <input type="text" name="username" required>
                <span>Nama</span>
            </div>
            <div class="inputbox">
                <input type="password" name="password" required>
                <span>Password</span>
            </div>
            <a href="../register.php" class="daftar">Daftar</a>
            <button type="submit" class="masukk" name="login">Masuk</button>
        </div>
    </form>
    <div class="akses">
        <p>*Silahkan akses halaman utama website<a href="../user/index.php">di sini</a></p>
    </div>
</body>
</html>