<?php   
include('dbconnect.php');
$news_errors = ['title'=>'','image'=>'','d1'=>'','d2'=>'','d3'=>''];
$len = count($news_errors);
if(isset($_POST['submit'])){
    $title               =   $_POST['title'];
    $image               =   $_FILES['image'];
    $d1               =   $_POST['d1'];
    $d2               =   $_POST['d2'];
    $d3               =   $_POST['d3'];
    $date               =   date('y/m/d');

$news_values = [
            'title'=>$title,
            'image'=>$image,
            'description'=>$d1,
            'description2'=>$d2,
            'description3'=>$d3,
            ];
if (empty($title)) {
    $news_errors['title'] = 'Name Field Is Required';
    $len++;
}
if ($image['name'] == null) {
    $news_errors['image'] = 'Please Upload an Image';
    $len++;
}else{
    $valid = ['jpeg','png','jpg','jfif'];
    $exploded = explode('.',$image['name']);
    $file_type = in_array(strtolower(end($exploded)),$valid);
    $fileinfo = @getimagesize($image["tmp_name"]);
    $file_new_name = uniqid('',true) . '.' . strtolower(end($exploded));


    if($fileinfo){
        $width = $fileinfo[0];
        $height = $fileinfo[1];
    }
    
    if (!$file_type){
        $news_errors['image'] = "Invalid File Format, try pictures with 'jpeg','png','jpg',jfif extension";
        $len++;
    }else if (($image["size"] > 2000000)) {
        $news_errors['image'] = "image Size is Bigger than 2MB";
        $len++;
    }else if ($width > "500" || $height > "500") {
        $news_errors['image'] = "image Dimmension is Bigger than 500 X 500";
        $len++;
    }
  
}

if (empty($d1)){
    $news_errors['d1'] = 'Descripton is needed For Match is needed';
    $len++;
}



    if ($len > count($news_errors)){
        session_start();
        $_SESSION['news_errors'] = $news_errors;
        $_SESSION['news_values'] = $news_values;
        header('Location:../create-news.php');
    }else{
$Title = mysqli_real_escape_string($conn,$title);
$Image = mysqli_real_escape_string($conn,$file_new_name);
$D1 = mysqli_real_escape_string($conn,$d1);
$D2 = mysqli_real_escape_string($conn,$d2);
$D3 = mysqli_real_escape_string($conn,$d3);
$Date = mysqli_real_escape_string($conn,$date);


$sql = "INSERT INTO news(`title`,`picture`,`description`,description2,description3,`date`) VALUES ('$Title', '$Image','$D1','$D2','$D3','$Date')";


if (mysqli_query($conn, $sql)) {
    $file_name = $image['name'];
    $file_tmp = $image['tmp_name'];
    $parent = dirname(__DIR__);
    $target_dir = $parent."\\uploads\\". $file_new_name;
    move_uploaded_file($file_tmp, $target_dir);
    
    header('Location:../news.php');
    exit();
   
}else{
    header('Location:../index.php?error=data couldnt be saved ');
    exit();
}
    }




}
?>