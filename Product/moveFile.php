<?php 
   $image='';
    function moveUploadFile($name){
        global $image;
        $image=rand(1,1000).'_'.$_FILES[$name]['name'];
        $tmp_name=$_FILES[$name]['tmp_name'];
        $path='./Image/'.$image;
        move_uploaded_file($tmp_name,$path);
    }
?>