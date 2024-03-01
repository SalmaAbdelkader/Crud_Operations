<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Book Details</title>
    <style>
        .book-details{
            background-color:#f5f5f5;
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>Book Details</h1>
            <div>
            <a href="index.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <div class="book-details p-5 my-4">
            <?php
                  
                  if(isset($_GET['id'])){

                      $id = $_GET['id'];
                      include ("connect.php");
                      $sql = "SELECT * , category.name AS 'type' FROM books INNER JOIN category ON books.type_id = category.id WHERE books.id = $id ";
                        
                      $query = mysqli_query($conn, $sql);
                      while ($data = mysqli_fetch_array($query)){

              ?>
                 <h3>Title:</h3>
                 <p><?php echo $data['title'];?></p>
                 <h3>Description:</h3>
                 <p><?php echo $data['description'];?></p>
                 <h3>Author:</h3>
                 <p><?php echo $data['Author'];?></p>
                 <h3>Type:</h3>
                 <p><?php echo $data['type'];?></p>
                 <h3>Price:</h3>
                 <p><?php echo $data['price'];?></p>
                 <h3>Quantity:</h3>
                 <p><?php echo $data['Quantity'];?></p>
            <?php   
                      }
                  }else{

                       echo "<h3>No Books Are Found</h3>";
                  }
            
            ?>
            
        </div>
    </div>
</body>
</html>