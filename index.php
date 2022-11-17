<!DOCTYPE html>

<?php include 'db.php'; 
$sql = "select * from employees";
$rows = $db->query($sql);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Crud App</title>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <h1 class="text-primary text-center ml-auto mr-auto mb-5">BSMRSTU Shop Management System</h1>
            <div class="col-md-10 col-md-offset-3">
                <table class="table table-hover ml-5">
                    <button type="button" data-target="#myModal" data-toggle="modal" class="btn btn-success ml-5 mb-2">Add Shop</button>                   
                    <br>                   
                    <!-- The Modal -->
                    <div class="modal" id="myModal" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Shop</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form method="post" action="add.php" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Shop Name</label>
                                            <input type="text" required name="employee" class="form-control">
                                            <label>Shop Phone No</label>
                                            <input type="text" required name="phone" class="form-control">
                                            <label>Shop Image</label>
                                            <input type="file" required name="image" accept=".jpg, .jpeg, .png" class="form-control">
                                        </div>
                                        <input type="submit" name="send" value="Add Shop" class="btn btn-success">
                                    </form>
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-12 text-center">
                        <p style="font-style: italic; font-size: bold; background-color: cyan">Search the shop name</p>
                        <form action="search.php" method="post" class="form-group">
                            <input type="text" placeholder="Search" name="search" class="form-control">
                        </form>
                    </div>
                    <br>
                    <thead>
                        <tr>
                            <th scope="col-1">ID.</th>
                            <th scope="col-2">Shop Name</th>
                            <th scope="col-2">Shop Image</th>
                            <th scope="col-2">Shop Cell No</th>
                            <th scope="col-5">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php while($row = $rows->fetch_assoc()): ?>   
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td ><img style="width: 90px;" class="rounded-circle" src="img/<?php echo $row['image']; ?>"></td>
                            <td><?php echo $row['phone'] ?></td>
                            <td>
                                <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a>
                                <a onclick="return confirm('Are you sure to delete this shop?')" href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                            <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>