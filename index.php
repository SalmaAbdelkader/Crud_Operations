<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Book List</title>
    <style>
        table  td, table th{
        vertical-align:middle;
        text-align:right;
        padding:20px!important;
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>Book List</h1>
            <div>
                <a href="create.php" class="btn btn-primary">Add New Book</a>
            </div>
        </header>
        <?php
        session_start();
        if (isset($_SESSION["create"])) {
        ?>
        <div class="alert alert-success">
            <?php 
            echo $_SESSION["create"];
            ?>
        </div>
        <?php
        unset($_SESSION["create"]);
        }
        ?>
         <?php
        if (isset($_SESSION["edit"])) {
        ?>
        <div class="alert alert-success">
            <?php 
            echo $_SESSION["edit"];
            ?>
        </div>
        <?php
        unset($_SESSION["edit"]);
        }
        ?>
        <?php
        if (isset($_SESSION["delete"])) {
        ?>
        <div class="alert alert-danger">
            <?php 
            echo $_SESSION["delete"];
            ?>
        </div>
        <?php
        unset($_SESSION["delete"]);
        }
        ?>        
        <table class="table table-bordered table-dark">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Author</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
                  
                  <?php 
                        include ("connect.php");
                        $sql = "SELECT *  FROM books ";
                        
                        $query = mysqli_query($conn, $sql);
                        
                        if($count = mysqli_num_rows($query)):
                            $_d = 0;
                            
                            
                            while ($data = mysqli_fetch_assoc($query) ):
                            //    $data[] = $d;
                            
                            
                           
                  ?>
            <tr>
                <td><?php echo $_d++ ;?></td>
                <td><?php echo $data['title'] ;?></td>
                <td><?php echo $data['Author'] ;?></td>
                <td><?php echo $data['price'] ;?></td>
                <td>
                    <a href="view.php?id=<?php echo $data['id'] ; ?>" class="btn btn-info">Read More</a>
                    <a href="edit.php?id=<?php echo $data['id'] ;?>" class="btn btn-warning">Edit</a>
                    <a href="delete.php?id=<?php echo $data['id'] ;?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>

            <?php 
                    endwhile;
                    echo "<pre>";
                    print_r($data);
                    die;
            endif;
                  
                
            ?>
        </tbody>
        </table>
    </div>
</body>
</html>