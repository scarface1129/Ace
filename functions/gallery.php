<?php   
include('dbconnect.php');
include('functions.php');
$gallery_errors = ['title'=>'','picture'=>'','category'=>'','phone'=>'','email'=>'','about_coach'=>''];
$len = count($gallery_errors);
if(isset($_POST['submit'])){
    $title               =   $_POST['title'];
    $picture            =   $_FILES['picture'];
    $category                =   $_POST['category'];
$gallery_values = ['title'=>$title,
            'picture'=>$picture['name'],
            'category'=>$category];
if (empty($title)) {
    $gallery_errors['title'] = 'Name Field Is Required';
    $len++;
}else{
    if(!preg_match('/^[a-zA-Z\s]+$/',$title)){
        $gallery_errors['title'] = "The Name Field Must contain alphabets only";
        $len++;
    }
}
if (empty($category)) {
    $gallery_errors['category'] = 'Indicate category';
    $len++;
}

if ($picture['name'] == null) {
    $gallery_errors['picture'] = 'Please Upload Profile';
    $len++;
}else{
    $valid = ['jpeg','png','jpg','jfif'];
    $exploded = explode('.',$picture['name']);
    $file_type = in_array(strtolower(end($exploded)),$valid);
    $fileinfo = @getimagesize($picture["tmp_name"]);
    $file_new_name = uniqid('',true) . '.' . strtolower(end($exploded));

    if($fileinfo){
        $width = $fileinfo[0];
        $height = $fileinfo[1];
    }
    
    if (!$file_type){
        $gallery_errors['picture'] = "Invalid File Format";
        $len++;
    }else if (($picture["size"] > 2000000)) {
        $gallery_errors['picture'] = "Picture Size is Bigger than 2MB";
        $len++;
    }else if ($width < "1000" || $height < "1000") {
        $gallery_errors['picture'] = "Picture Dimmension is less than 1000 X 1000";
        $len++;
    }
  
}


    if ($len > count($gallery_errors)){
        session_start();
        $_SESSION['gallery_errors'] = $gallery_errors;
        $_SESSION['gallery_values'] = $gallery_values;
        header('Location:../create-gallery.php');
    }else{
$title = mysqli_real_escape_string($conn,$title);
$Picture = mysqli_real_escape_string($conn,$file_new_name);
$category = mysqli_real_escape_string($conn,$category);
$sql = "INSERT INTO gallery(`title`,category,picture) VALUES ('$title','$category','$Picture')";

if (mysqli_query($conn, $sql)) {
    $file_name = $picture['name'];
    $file_tmp = $picture['tmp_name'];
    $parent = dirname(__DIR__);
    $target_dir = $parent."\\uploads\\". $file_new_name;
    move_uploaded_file($file_tmp, $target_dir);
    
    header("Location:../index.php");
    exit();
   
}else{
    header('Location:../index.php?error=data couldnt be saved ');
    exit();
}
    }




}
?>