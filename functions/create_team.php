<?php   
include('dbconnect.php');

$team_errors = ['name'=>'','numberOfPlayers'=>'','logo'=>'','seeking_players'=>'','phone'=>'','email'=>''];
$len = count($team_errors);
if(isset($_POST['submit'])){
    $name               =   $_POST['name'];
    $numberOfPlayers    =   $_POST['players'];
    $logo               =   $_FILES['logo'];
    $seeking_players    =   $_POST['seeking_players'];
    $phone              =   $_POST['phone'];
    $email              =   $_POST['email'];
    $instagram          =   $_POST['instagram'];
    $facebook           =   $_POST['facebook'];
$team_values = ['name'=>$name,'numberOfPlayers'=>$numberOfPlayers,'logo'=>$logo['name'],'seeking_players'=>$seeking_players,'phone'=>$phone,'email'=>$email,'instagram'=>$instagram,'facebook'=>$facebook];
if (empty($name)) {
    $team_errors['name'] = 'Name Field Is Required';
    $len++;
}else{
    if(!preg_match('/^[a-zA-Z\s]+$/',$name)){
        $team_errors['name'] = "The Name Field Must contain alphabets only";
    $len++;

    }
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
    $valid = ['jpeg','png','jpg'];
    $exploded = explode('.',$logo['name']);
    $file_type = in_array(strtolower(end($exploded)),$valid);
    $fileinfo = @getimagesize($logo["tmp_name"]);
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
    }else if ($width > "2048" || $height > "2048") {
        $team_errors['logo'] = "Picture Dimmension is Bigger than 2048X2048";
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
$Logo = mysqli_real_escape_string($conn,$logo['name']);
$Seeking_players = mysqli_real_escape_string($conn,$seeking_players);
$Phone = mysqli_real_escape_string($conn,$phone);
$Email = mysqli_real_escape_string($conn,$email);
$Insta = mysqli_real_escape_string($conn,$instagram);
$Fb = mysqli_real_escape_string($conn,$facebook);
$sql = "INSERT INTO teams(`name`,numberOfPlayers, seekingPlayers, logo) VALUES ('$Name', '$Players', '$Seeking_players','$Logo')";

if (mysqli_query($conn, $sql)) {
    $sql = 'SELECT id FROM teams ORDER BY id DESC LIMIT 1';
    $result = mysqli_query($conn, $sql);
    $value = mysqli_fetch_all($result, MYSQLI_ASSOC)[0];
    $id = $value['id'];
    mysqli_free_result($result);
    $sql = "INSERT INTO team_contact(teamId,facebookLink,instagramHandle,phoneNumber,email) VALUES ('$id','$Fb','$Insta','$Phone','$email')";
    if (mysqli_query($conn, $sql)) {
    header('Location:../index.php');
    exit();
    }
    else{
        header('Location:../index.php?error=Contact info couldnt be saved ');
        exit();
    }
}else{
    header('Location:../index.php?error=data couldnt be saved ');
    exit();
}

    }





    
}




?>