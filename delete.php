<?php 

  if(isset($_GET['id'])){

    include "connect.php";

    $id = $_GET['id'];

    $sql = "DELETE FROM `books` WHERE id = $id";
    mysqli_query($conn,$sql);
    $result = mysqli_affected_rows($conn);

    if($result){
        $_SESSION['delete'] = "Book Deleted Succsefully ";
            header("location: index.php");
    }else{

        echo "Something Wrong";
    }
  }