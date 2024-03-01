<?php 
    session_start();
    include ("connect.php");
    if(isset($_POST['create'])){

        $title1 =mysqli_real_escape_string($conn, trim($_POST['title'])) ;
        $author1 =mysqli_real_escape_string($conn, trim($_POST['author'])) ;
        $type1 =mysqli_real_escape_string($conn, trim($_POST['type'])) ;
        $quantity1 = mysqli_real_escape_string($conn, trim($_POST['quantity'])) ;
        $price1 = mysqli_real_escape_string($conn, trim($_POST['price'])) ;
        $description1 = mysqli_real_escape_string($conn, trim($_POST['description']));

        $select_sql = "SELECT `id`  FROM `category` WHERE `name` = '$type1' ";
        $result_select = mysqli_query($conn, $select_sql );
        $data = mysqli_fetch_assoc($result_select);
        $type_id1 = $data['id'];


        $sql = "INSERT INTO books(title,description, price, type_id, Quantity, Author)VALUES('$title1','$description1','$price1','$type_id1','$quantity1','$author1')";

        $inserted_query = mysqli_query($conn, $sql);

        if($inserted_query){

            $_SESSION['create'] = "Book Inserted Succsefully ";
            header("location: index.php");
        } else {

            die("Something is Wrong");

          }
   }



   if(isset($_POST['edit'])){

    include ("connect.php");
    $id = $_POST['id'];
    $title =mysqli_real_escape_string($conn, trim($_POST['title'])) ;
    $author =mysqli_real_escape_string($conn, trim($_POST['author'])) ;
    $type =mysqli_real_escape_string($conn, trim($_POST['type'])) ;
    $quantity = mysqli_real_escape_string($conn, trim($_POST['quantity'])) ;
    $price = mysqli_real_escape_string($conn, trim($_POST['price'])) ;
    $description = mysqli_real_escape_string($conn, trim($_POST['description']));
    echo $type;
    $select_sql = "SELECT * FROM `category` WHERE `name` = '$type' ";
    $result_select = mysqli_query($conn, $select_sql );
    if($count = mysqli_num_rows($result_select)){
        $data = mysqli_fetch_assoc($result_select);
        print_r($data);
        $type_id = $data['id'];
        echo $type_id;
    }else{
        echo "something wrong";
    }
    echo $count;
    $sql = "UPDATE `books` SET `title`='$title',`description`='$description',`price`='$price',`type_id`='$type_id',`Quantity`='$quantity',`Author`='$author' WHERE id = '$id' ";
    // echo $sql;die;
    $updated_query = mysqli_query($conn, $sql);

    $result = mysqli_affected_rows($conn);
    // echo $result;die;

    if($result){

        $_SESSION['edit'] = "Book Updated Succsefully ";
        header("location: index.php");

    } else {

        die("Something is Wrong");

      }
}