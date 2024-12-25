<?php 
include "connection.php";
include "function.php";

session_start();
    if(empty($_SESSION['name'])){
        header('location: login.php');
    }else{
        global $con;
        $user=$_SESSION['name'];
        $sql="SELECT `user_id` FROM `user` WHERE userName='$user' OR email='$user'";
        $data=$con->query($sql);
        $id= $data->fetch_assoc();

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    .modals{
        display: none;
        position: absolute;
        top: 0;
        background-color:rgba(162, 163, 164, 0.759);
        width: 100%;
        height: 100%;
    }
    form{
        width: 400px;
        padding: 20px;
        background-color: #ffff;
        margin: auto;
        margin-top: 40px;
        padding-bottom: 30px;
        border-radius: 5px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;

    }
</style>
<body>
    <div class="container-fluid">
        <h1>Products</h1>
        <button class="btn btn-primary float-end addProduct">Add Product</button>
        <table class="mt-5 table align-middle text-center" style="table-layout: fixed;">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Image</th>
                    <th>Admin</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php getProduct() ?>
                
            </tbody>
        </table>
        <a href="login.php" class=" btn btn-info float-end">Logout</a>
    </div>
    <div class="modals">
        <form action="" method="post" enctype="multipart/form-data">
        <h1 class="text-center">Add product</h1>
            <input type="hidden" name="userID" id="userID" value="<?php echo $id['user_id']?>">
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="price" class="form-label">Price</label>
                <input type="text" name="price" id="price" class="form-control">
            </div>
            <div class="form-group">
                <label for="qty" class="form-label">Qty</label>
                <input type="text" name="qty" id="qty" class="form-control">
            </div>
            <div class="form-group">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="form-group d-flex justify-content-end">
                <button type="submit" class="me-2 mt-3 btn btn-primary" name="btnSave">Save</button>
                <button type="submit" class="me-2 mt-3 btn btn-danger">Cancel</button>
            </div>
        </form>
    </div>
</body>
</html>
<script>
    $(document).ready(function(){
        $('.addProduct').click(function(){
            $('.modals').show()
        })
    })
</script>


