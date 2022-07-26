<?php   
include('dbconnect.php');

$team_errors = ['name'=>'','numberOfPlayers'=>'','logo'=>'','seeking_players'=>'','phone'=>'','email'=>'','about_team'=>''];
$len = count($team_errors);
if(isset($_POST['submit'])){
    $name               =   $_POST['name'];
    $numberOfPlayers    =   $_POST['players'];
    $about_team    =   $_POST['about_team'];
    $logo               =   $_FILES['logo'];
    $seeking_players    =   $_POST['seeking_players'];
    $phone              =   $_POST['phone'];
    $email              =   $_POST['email'];
    $instagram          =   $_POST['instagram'];
    $facebook           =   $_POST['facebook'];
$team_values = ['name'=>$name,'numberOfPlayers'=>$numberOfPlayers,'about_team'=>$about_team,'logo'=>$logo['name'],'seeking_players'=>$seeking_players,'phone'=>$phone,'email'=>$email,'instagram'=>$instagram,'facebook'=>$facebook];
if (empty($name)) {
    $team_errors['name'] = 'Name Field Is Required';
    $len++;
}else{
    if(!preg_match('/^[a-zA-Z\s]+$/',$name)){
        $team_errors['name'] = "The Name Field Must contain alphabets only";
    $len++;

    }
}
if (empty($about_team)) {
    $team_errors['about_team'] = 'Say something about team ';
    $len++;
}
if (empty($numberOfPlayers)) {
    $team_errors['numberOfPlayers'] = 'Number Of Players Field Is Required';
    $len++;

}else{
    if(!preg_match('/^[0-9]+$/',$numberOfPlayers)){
        $team_errors['numberOfPlayers'] = "This Filed Can Only Take Positive Integers";
    $len++;

    }
}
if ($logo['name'] == null) {
    $team_errors['logo'] = 'Please Upload a Profile Image';
    $len++;

}else{
    $valid = ['jpeg','png','jpg','jfif'];
    $exploded = explode('.',$logo['name']);
    $file_type = in_array(strtolower(end($exploded)),$valid);
    $fileinfo = @getimagesize($logo["tmp_name"]);
    $file_new_name = uniqid('',true) . '.' . strtolower(end($exploded));

    if($fileinfo){
        $width = $fileinfo[0];
        $height = $fileinfo[1];
    }
    
    if (!$file_type){
        $team_errors['logo'] = "Invalid File Format";
        $len++;
    }else if (($logo["size"] > 2000000)) {
        $team_errors['logo'] = "Picture Size is Bigger than 2MB";
        $len++;
    }else if ($width > "500" || $height > "500") {
        $team_errors['logo'] = "Picture Dimmension is Bigger than 500 x 500";
        $len++;
    }
  
}
if(empty($phone)){
    $team_errors['phone'] = 'Phone Number is needed';
    $len++;

}else{
    if(!preg_match('/((^090)([23589]))|((^070)([1-9]))|((^080)([2-9]))|((^081)([0-9]))(\d{7})/',$phone)){
        $team_errors['phone'] = "Enter a Valid Phone Number";
        $len++;
    }
}
if (empty($email)) {
    $team_errors['email'] = 'Email Field Is Required';
    $len++;
}else{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $team_errors['email'] =  "Enter a Valid Email";
        $len++;
    }
}


    if ($len > count($team_errors)){
        session_start();
        $_SESSION['team_errors'] = $team_errors;
        $_SESSION['team_values'] = $team_values;
        header('Location:../create_team.php');
    }else{
        $Name = mysqli_real_escape_string($conn,$name);
$Players = mysqli_real_escape_string($conn,$numberOfPlayers);
$Logo = mysqli_real_escape_string($conn,$file_new_name);
$Seeking_players = mysqli_real_escape_string($conn,$seeking_players);
$About_team = mysqli_real_escape_string($conn,$about_team);
$Phone = mysqli_real_escape_string($conn,$phone);
$Email = mysqli_real_escape_string($conn,$email);
$Insta = mysqli_real_escape_string($conn,$instagram);
$Fb = mysqli_real_escape_string($conn,$facebook);
$sql = "INSERT INTO teams(`name`,numberOfPlayers, seekingPlayers, logo,about_team,facebookLink,instagramHandle,phoneNumber,email) 
VALUES ('$Name', '$Players', '$Seeking_players','$Logo','$About_team','$Fb','$Insta','$Phone','$email')";

if (mysqli_query($conn, $sql)) {
    $file_name = $logo['name'];
    $file_tmp = $logo['tmp_name'];
    $parent = dirname(__DIR__);
    $target_dir = $parent."\\uploads\\". $file_new_name;
    move_uploaded_file($file_tmp, $target_dir);
    header('Location:../teams.php');
    exit();
    
}else{
    header('Location:../index.php?error=data couldnt be saved ');
    exit();
}

    }





    
}




?>