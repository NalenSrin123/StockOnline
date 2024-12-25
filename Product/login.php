<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    form{
        width: 350px;
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
            <h2 class="text-center">Login</h2>
            <div class="form-group">
                <label for="uname" class="form-label">Username/Email</label>
                <input type="text" name="username" id="uname" class="form-control">
            </div>

            <div class="form-group">
                <label for="password" class="form-label mt-2">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
    
            <div class="form-group d-flex flex-column">
                <a href="register.php" class="text-center mt-2">Create an account?</a>
                <button type="submit" name="signIn" class="btn btn-primary mt-4">Sign In</button>
            </div>
        </form>
    </div>
</body>
</html>


</script>
<?php 
    session_start();
    include 'connection.php';
    if(isset($_POST['signIn'])){
        $name_email=$_POST['username'];
        $password=$_POST['password'];
        global $con;
        $sql="SELECT userName , email ,password FROM `user`";
        $data=$con->query($sql);
        while($row=$data->fetch_assoc()){
            if($name_email==$row['userName'] || $name_email==$row['email']){
                if($password==$row['password']){
                    $_SESSION['name']=$name_email;
                    header('location: index.php');
                }else{
                    echo '
                    <script>
                        $(document).ready(function(){
                                Swal.fire({
                                title: "Incorrect password!",
                                icon: "error"
                            });
                        })
                    </script>  
                    ';
                }
            }else{
                echo '
                <script>
                    $(document).ready(function(){
                        Swal.fire({
                            title: "Incorrect username or email!",
                            icon: "error"
                        });
                    })
                </script>    
                ';
            }
        }
    }
?>