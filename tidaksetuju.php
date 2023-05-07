<?php 
    require "function.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query= mysqli_query($konek, "UPDATE pengepul SET status = 2 WHERE id_p= $id");
        $query2 = mysqli_query($konek, "SELECT * FROM pengepul WHERE id_p= $id");

        if($query2) {
            header("location:index2.php?p=info");
        } else {
            echo "error : " . mysqli_error($konek);
        }
    }
?>