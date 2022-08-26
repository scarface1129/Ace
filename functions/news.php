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
    $valid = ['jpeg','png','jpg'];
    $exploded = explode('.',$image['name']);
    $file_type = in_array(strtolower(end($exploded)),$valid);
    $fileinfo = @getimagesize($image["tmp_name"]);
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
$Image = mysqli_real_escape_string($conn,$image['name']);

$sql = "INSERT INTO awards(`name`,`image`) VALUES ('$Name', '$Image')";


if (mysqli_query($conn, $sql)) {
    // $destfile = 'images/uploads/'. $picture;
    // $filepath = $picture['tmp_name'];
    // move_uploaded_file($filepath,$destfile);
    
    header('Location:../index.php');
    exit();
   
}else{
    header('Location:../index.php?error=data couldnt be saved ');
    exit();
}
    }




}
?>