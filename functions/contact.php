<?php   
include('dbconnect.php');
include('functions.php');
$ace_errors = ['phone'=>'','email'=>'','twitter'=>'','instagramHandle'=>'','facebookLink'=>'','location'=>''];
$len = count($ace_errors);
if(isset($_POST['submit'])){
    $phone              =   $_POST['phone'];
    $email              =   $_POST['email'];
    $twitter              =   $_POST['twitter'];
    $instagramHandle              =   $_POST['instagram'];
    $facebookLink              =   $_POST['facebook'];
    $location              =   $_POST['location'];
$coach_values = [
            'phone'=>$phone,
            'email'=>$email,
            'twitter'=>$twitter,
            'instagramHandle'=>$instagramHandle,
            'facebookLink'=>$facebook,
            'location'=>$location
        ];

if(empty($phone)){
    $ace_errors['phone'] = 'Phone Number is needed';
    $len++;
}else{
    if(!preg_match('/((^090)([23589]))|((^070)([1-9]))|((^080)([2-9]))|((^081)([0-9]))(\d{7})/',$phone)){
        $ace_errors['phone'] = "Enter a Valid Phone Number";
        $len++;
    }
}
if (empty($email)) {
    $ace_errors['email'] = 'Email Field Is Required';
    $len++;
}else {if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $ace_errors['email'] =  "Enter a Valid Email";
        $len++;
} }


    if ($len > count($ace_errors)){
        session_start();
        $_SESSION['ace_errors'] = $ace_errors;
        $_SESSION['ace_values'] = $ace_values;
        header('Location:../aceContactform.php');
    }else{

$Phone = mysqli_real_escape_string($conn,$phone);
$Email = mysqli_real_escape_string($conn,$email);
$Twitter = mysqli_real_escape_string($conn,$twitter);
$Insta = mysqli_real_escape_string($conn,$instagramHandle);
$Facebook = mysqli_real_escape_string($conn,$facebookLink);
$Location = mysqli_real_escape_string($conn,$location);
$sql = "INSERT INTO contact(email,phone,twitter,instagramHandle,facebookLink,`address`) VALUES ('$Email','$Phone', '$Twitter', '$Insta','$Facebook','$Location')";

if (mysqli_query($conn, $sql)) {    
    header('Location:../index.php');
    exit();
}else{
    header('Location:../index.php?error=data couldnt be saved ');
    exit();
}
    }




}
?>