<?php 
//    echo $_GET['id'];
//    die;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Edit Book</title>
</head>
<body>
    <div class="container my-5">
    <header class="d-flex justify-content-between my-4">
            <h1>Edit Book</h1>
            <div>
            <a href="index.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <form action="process.php" method="post">

            <?php  
                     if(isset($_GET['id'])){
                        include ("connect.php");  
                        $id = $_GET['id'];
                      
                        $sql = "SELECT *  FROM books WHERE books.id = $id ";
                        
                        $query = mysqli_query($conn, $sql);
                        $data = mysqli_fetch_assoc($query);
                        // echo "<pre>";
                        // print_r($data['description']);
                        // echo "</pre>";

                        // die();
                    
            ?>
            <div class="form-element my-4">
                 <input type="hidden" name="id"  value="<?php echo $data['id']; ?>">
            </div>
            
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="title" placeholder="Book Title:" value="<?php echo $data['title']; ?>">
            </div>
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="author" placeholder="Author Name:" value="<?php echo $data['Author']; ?>">
            </div>
            <div class="form-elemnt my-4">
                <select name="type" id="" class="form-control">
                        <option value="">Select Book Type:</option>
                        <?php   
                        include ("connect.php");
                            $select_sql = "SELECT `name`  FROM `category`";
                            $result_select = mysqli_query($conn, $select_sql );
                            
                            while($row = mysqli_fetch_array($result_select)):
                        ?>

                        <option value="<?php echo $row['name'];  ?>"><?php echo $row['name'];  ?></option>
                    
                        <?php   endwhile; ?>
                    </select>
            </div>
            </div>
            <div class="form-elemnt my-4">
                <input type="number" class="form-control" name="quantity" placeholder="Avalible Quantity:" value="<?php echo $data['Quantity']; ?>">
            </div>

            <div class="form-elemnt my-4">
                <input type="number" class="form-control" name="price" placeholder="Price Of The Book:" value="<?php echo $data['price']; ?>">
            </div>

            <div class="form-element my-4">
                <textarea name="description" id="" class="form-control" placeholder="Book Description:" value="<?php echo $data['description']; ?>"><?php echo $data['description']; ?></textarea>
            </div>
            
            <div class="form-element my-4">
                <input type="submit" name="edit" value="Edit Book" class="btn btn-primary">
            </div>

            <?php 
                     } else{

                        echo "<h3>SomeThing Wrong </h3>";
                     }
            
            ?>
           
        </form>
        
        
    </div>
</body>
</html>