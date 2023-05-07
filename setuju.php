<?php 
    require "function.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query1= mysqli_query($konek, "UPDATE pengepul SET status = 1 WHERE id_p= $id");

        $query2 = mysqli_query($konek, "SELECT * FROM pengepul WHERE id_p= $id");
	
	    $row = mysqli_fetch_assoc($query2);
    }
?>