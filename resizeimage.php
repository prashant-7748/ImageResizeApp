<?php
if(isset($_POST['img_submit'])){
	
	$img_name=$_FILES['img_upload']['name'];
	$tmp_img_name=$_FILES['img_upload']['tmp_name'];
	move_uploaded_file($tmp_img_name,$img_name);
    $original_image=imagecreatefromjpeg($img_name);

    //imagesX and imagesY

    $width=imagesx($original_image);
    $height=imagesy($original_image);
    
    // $new_width=($width*.5);
    // $new_height=($height*.5);
    
    $new_width=$_POST['width'];
    $new_height=$_POST['height'];


    $new_image=imagecreate($new_width,$new_height);

    //imagecopyresized   --copy and resize part of an image;
    imagecopyresized($new_image,$original_image,0,0,0,0,$new_width,$new_height,$width,$height);

    imagejpeg($new_image,"resizeimage.jpg");
    imagedestroy($original_image);
    imagedestroy($new_image);

    echo "<img src=$img_name>";
    echo "<hr/>";
    echo "<img src=resizeimage.jpg>";

   
}
?>
