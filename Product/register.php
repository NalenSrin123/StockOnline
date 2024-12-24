<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    form{
        width: 400px;
        padding: 20px 15px;
        margin: auto;
        border-radius: 5px;
        margin-top: 50px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }
</style>
<body>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <h2 class="text-center">Register Here</h2>
            <div class="form-group">
                <label for="uname" class="form-label">Username</label>
                <input type="text" name="username" id="uname" class="form-control">
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="profile" class="form-label">Profile</label>
                <input type="file" name="profile" id="profile" class="form-control">
            </div>
            <div class="form-group d-flex flex-column">
                <a href="login.php" class="text-center mt-2">Already have account?</a>
                <button type="submit" name="signUp" class="btn btn-primary mt-4">Sign Up</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php 
  include 'connection.php';
  include 'moveFile.php';
  try{
    if(isset($_POST['signUp'])){
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        moveUploadFile('profile');
        global $con;
        $sql="INSERT INTO `user`(`userName`, `email`, `password`, `profile`)
         VALUES ('$username','$email','$password','$image')";
         $data=$con->query($sql);
         
        if($data){
            header('location: login.php');
        }
      }
  }catch(Exception $error){
    echo '
        <script>
            Swal.fire({
            title: "404 Not Found!",
            text:"Username or email already used.",
            icon: "error"
            });
        </script>
    ';
  }
?>