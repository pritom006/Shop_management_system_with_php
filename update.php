<!DOCTYPE html>
<?php include 'db.php' ; ?>
<?php 
$id = $_GET['id'];
$sql = "select * from employees where id='$id'";
$rows = $db->query($sql);
$row = $rows->fetch_assoc();
if(isset($_POST['send'])){
    $employee = $_POST['employee'];
    $employee_phone = $_POST['employeephone'];
    $employeeimage = $_POST['employeeimage'];
    $sql_second = "update employees set name='$employee' where id='$id'";
    $sql_third = "update employees set phone='$employee_phone' where id='$id'";
    $sql_fourth = "update employees set image='$employeeimage' where id='$id'";
    $db->query($sql_second);
    $db->query($sql_third);
    $db->query($sql_fourth);
    header('location: index.php');
}
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
            <br>
            <div class="container">
                <h4 class="text-success" style="font-style:italic">Update Shops</h4>
            </div>     
            <br>
            <div class="col-md-10 col-md-offset-3">
                <table class="table ml-5">
                    <form method="post">
                        <div class="form-group">
                            <label>Shop Name</label>
                            <input type="text" required name="employee" value="<?php echo $row['name']; ?>" class="form-control">
                            <label>Phone No</label>
                            <input type="text" required name="employeephone" value="<?php echo $row['phone']; ?>" class="form-control">
                            <label>Upload New Image</label>
                            <input type="file" required name="employeeimage" src="img/<?php echo $row['image']; ?>" class="form-control">                     
                        </div>
                        <input type="submit" name="send" value="Update Shop" class="btn btn-success">
                    </form>                   
                </table>
            </div>
        </div>
    </div>
</body>
</html>