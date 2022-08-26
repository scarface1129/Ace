<?php   
include('dbconnect.php');
include('functions.php');
$comment_errors = ['name'=>'','email'=>'','message'=>'','date'=>'','time'=>'',];
$len = count($comment_errors);
if(isset($_POST['submit'])){
    $name               =   $_POST['name'];
    $newsId               =   $_POST['id'];
    $email               =   $_POST['email'];
    $message               =   $_POST['message'];
    $date            =   date('y/m/d') ;
    date_default_timezone_set("Africa/Lagos");
    $time              =   date('h:i:s');
   
$comment_values = ['name'=>$name,
            'newsId'=>$newsId,
            'email'=>$email,
            'message'=>$message,
            'date'=>$date,
            'time'=>$time
            ];

if (empty($name)) {
    $comment_errors['name'] = 'Name Is Required';
    $len++;
}else{
    if(!preg_match('/^[a-zA-Z\s]+$/',$name)){
        $comment_errors['name'] = "The Name Field Must contain alphabets only";
        $len++;
    }
}

if (empty($message)){
    $comment_errors['message'] = 'Required';
    $len++;
}


if (empty($email)) {
    $comment_errors['email'] = 'Email Field Is Required';
    $len++;
}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $comment_errors['email'] =  "Enter a Valid Email";
        $len++;
}


    if ($len > count($comment_errors)){
        session_start();
        $_SESSION['comment_errors'] = $comment_errors;
        $_SESSION['comment_values'] = $comment_values;
        header('Location:../create_coach.php');
    }else{
$name = mysqli_real_escape_string($conn,$name);
$newsId = mysqli_real_escape_string($conn,$newsId);
$email = mysqli_real_escape_string($conn,$email);
$message = mysqli_real_escape_string($conn,$message);
$date = mysqli_real_escape_string($conn,$date);
$time = mysqli_real_escape_string($conn,$time);
$sql = "INSERT INTO comment(`name`,newsId,`message`,email,`time`,`date`) VALUES ('$name','$newsId','$message','$email','$time','$date')";

if (mysqli_query($conn, $sql)) {
    header("Location:../news-single.php?id=$newsId");
    exit();
   
}else{
    header('Location:../index.php?error=data couldnt be saved ');
    exit();
}
    }




}
?>