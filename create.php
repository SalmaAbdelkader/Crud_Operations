

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Add New Book</title>
</head>
<body>
    <div class="container my-5">
    <header class="d-flex justify-content-between my-4">
            <h1>Add New Book</h1>
            <div>
            <a href="index.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        
        <form action="process.php" method="post">
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="title" placeholder="Book Title:">
            </div>
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="author" placeholder="Author Name:">
            </div>
            <div class="form-elemnt my-4">
                <select name="type" id="" class="form-control">
                     <option value="">Select Book Type:</option>
                    <?php   
                       include ("connect.php");
                       $select_sql = "SELECT `name`  FROM `category`";
                        $result_select = mysqli_query($conn, $select_sql );
                        
                        while($data = mysqli_fetch_array($result_select)):
                    ?>

                    <option value="<?php echo $data['name']; ?>" name="type" ><?php echo $data['name'];  ?></option>
                   
                    <?php   endwhile; ?>
                </select>
            </div>
            <div class="form-elemnt my-4">
                <input type="number" class="form-control" name="quantity" placeholder="Avalible Quantity:">
            </div>

            <div class="form-elemnt my-4">
                <input type="number" class="form-control" name="price" placeholder="Price Of The Book:">
            </div>

            <div class="form-element my-4">
                <textarea name="description" id="" class="form-control" placeholder="Book Description:"></textarea>
            </div>
            <div class="form-element my-4">
                <input type="submit" name="create" value="Add Book" class="btn btn-primary">
            </div>
        </form>
        
        
    </div>
</body>
</html>