<?php   
include('dbconnect.php');
$award_errors = ['name'=>'','image'=>'','winnerId'=>'','losserId'=>'','scores'=>''];
$len = count($award_errors);
if(isset($_POST['submit'])){
    $id               =   $_POST['id'];
    $name               =   $_POST['name'];
    $image               =   $_FILES['image'];
    $winnerId               =   $_POST['winnerId'];
    $losserId            =   $_POST['losserId'];
    $scores                =   $_POST['scores'];
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

if (empty($winnerId)){
    $award_errors['winnerId'] = 'Please Identify with a team';
    $len++;
}if (empty($losserId)){
    $award_errors['losserId'] = 'Please Identify with a team';
    $len++;
}if (empty($scores)){
    $award_errors['scores'] = 'score is needed';
    $len++;
}


    if ($len > count($award_errors)){
        session_start();
        $_SESSION['award_errors'] = $award_errors;
        $_SESSION['award_values'] = $award_values;
        header("Location:../edit-award.php?id=$id");
    }else{
$Name = mysqli_real_escape_string($conn,$name);
$Image = mysqli_real_escape_string($conn,$image['name']);
$Winner = mysqli_real_escape_string($conn,$winnerId);
$Losser = mysqli_real_escape_string($conn,$losserId);
$Scores = mysqli_real_escape_string($conn,$scores);
$sql = "UPDATE awards SET `name`='$Name',`image`='$Image', winnerId='$Winner', losserId='$Losser',scores='$Scores' WHERE id = '$id'";


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