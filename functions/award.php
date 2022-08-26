<?php   
include('dbconnect.php');
$award_errors = ['name'=>'','image'=>''];
$len = count($award_errors);
if(isset($_POST['submit'])){
    $name               =   $_POST['name'];
    $image               =   $_FILES['image'];
    
$award_values = ['name'=>$name,
            'image'=>$image,
            'winnerId'=>$winnerId,
            'losserId'=>$losserId,
            'scores'=>$scores,
            ];
if (empty($name)) {
    $award_errors['name'] = 'Name Field Is Required';
    $len++;
}
if ($image['name'] == null) {
    $award_errors['image'] = 'Please Upload an Image';
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
        $award_errors['image'] = "Invalid File Format, try pictures with 'jpeg','png','jpg' extension";
        $len++;
    }else if (($image["size"] > 2000000)) {
        $award_errors['image'] = "image Size is Bigger than 2MB";
        $len++;
    }else if ($width > "500" || $height > "500") {
        $award_errors['image'] = "image Dimmension is Bigger than 500 X 500";
        $len++;
    }
  
}



    if ($len > count($award_errors)){
        session_start();
        $_SESSION['award_errors'] = $award_errors;
        $_SESSION['award_values'] = $award_values;
        header('Location:../create-award.php');
    }else{
$Name = mysqli_real_escape_string($conn,$name);
$Image = mysqli_real_escape_string($conn,$file_new_name);

$sql = "INSERT INTO awards(`name`,`image`) VALUES ('$Name', '$Image')";


if (mysqli_query($conn, $sql)) {
    $file_name = $image['name'];
    $file_tmp = $image['tmp_name'];
    $parent = dirname(__DIR__);
    $target_dir = $parent."\\uploads\\". $file_new_name;
    move_uploaded_file($file_tmp, $target_dir);
    
    header('Location:../index.php');
    exit();
   
}else{
    header('Location:../index.php?error=data couldnt be saved ');
    exit();
}
    }




}
?>