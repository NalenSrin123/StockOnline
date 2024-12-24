<?php
    include "moveFile.php"; 
    function insertProduct(){
        if(isset($_POST['btnSave'])){
            $userID=$_POST['userID'];
            $name=$_POST['name'];
            $price=$_POST['price'];
            $qty=$_POST['qty'];
            moveUploadFile('image');
            global $image;
            $sql="INSERT INTO `products`(`userID`, `name`, `price`, `qty`, `image`) 
            VALUES ('$userID','$name','$price','$qty','$image')";
            global $con;
            $con->query($sql);
        }
    }
    insertProduct();
    function getProduct(){
        global $con;
        $sql="SELECT * ,profile FROM `products` INNER JOIN `user` ON products.userID=user.user_id";
        $data=$con->query($sql);
        while($row=$data->fetch_assoc()){
            echo '
                <tr>
                    <td>'.$row['code'].'</td>
                    <td>'.$row['name'].'</td>
                    <td>'.$row['price'].'</td>
                    <td>'.$row['qty'].'</td>
                    <td>
                        <img width="120px" src="./Image/'.$row['image'].'" alt="">
                    </td>
                    <td >
                        <img width="120px" src="./Image/'.$row['profile'].'" alt="">
                    </td>
                    <td>Online</td>
                    <td>
                        <button class="btn btn-warning me-2">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            ';
        }

    }
?>