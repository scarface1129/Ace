<?php   
include('dbconnect.php');
$player_errors = ['name'=>'','team'=>'','picture'=>'','jersey_number'=>'','players_age'=>'','players_position'=>'','phone'=>'','email'=>''];
if(isset($_POST['submit'])){
    $name               =   $_POST['name'];
    $team               =   $_POST['team'];
    $picture            =   $_FILES['picture'];
    $jersey_number      =   $_POST['jersey_number'];
    $players_age        =   $_POST['players_age'];
    $players_position   =   $_POST['players_position'];
    $phone              =   $_POST['phone'];
    $email              =   $_POST['email'];
    $instagram          =   $_POST['instagram'];
    $facebook           =   $_POST['facebook'];
$player_values = ['name'=>$name,
            'team'=>$team,
            'picture'=>$picture['name'],
            'jersey_number'=>$jersey_number,
            'players_age'=>$players_age,
            'players_position'=>$players_position,
            'phone'=>$phone,
            'email'=>$email,
            'instagram'=>$instagram,
            'facebook'=>$facebook];
if (empty($name)) {
    $player_errors['name'] = 'Name Field Is Required';
}else{
    if(!preg_match('/^[a-zA-Z\s]+$/',$name)){
        $player_errors['name'] = "The Name Field Must contain alphabets only";
    }
}
if (empty($team)){
    $player_errors['team'] = 'Please Identify with a team';
}
if (empty($jersey_number)) {
    $player_errors['jersey_number'] = 'Your Jersey number is needed';
}else{
    if(!preg_match('/^[0-9]+$/',$jersey_number)){
        $player_errors['jersey_number'] = "This Filed Can Only Take Positive Integers";
    }
}
if (empty($players_age)) {
    $player_errors['players_age'] = 'Indicate your age';
}
if (empty($players_position)) {
    $player_errors['players_position'] = 'Indicate your Wing';
}
if ($picture['name'] == null) {
    $player_errors['picture'] = 'Please Upload a Profile Image';
}else{
    $valid = ['jpeg','png','jpg'];
    $exploded = explode('.',$picture['name']);
    $file_type = in_array(strtolower(end($exploded)),$valid);
    $fileinfo = @getimagesize($picture["tmp_name"]);
    if($fileinfo){
        $width = $fileinfo[0];
        $height = $fileinfo[1];
    }
    
    if (!$file_type){
        $player_errors['picture'] = "Invalid File Format";
    }else if (($picture["size"] > 2000000)) {
        $player_errors['picture'] = "Picture Size is Bigger than 2MB";
    }else if ($width > "2048" || $height > "2048") {
        $player_errors['picture'] = "Picture Dimmension is Bigger than 2048 X 2048";
    }
  
}
if(empty($phone)){
    $player_errors['phone'] = 'Phone Number is needed';
}else{
    if(!preg_match('/((^090)([23589]))|((^070)([1-9]))|((^080)([2-9]))|((^081)([0-9]))(\d{7})/',$phone)){
        $player_errors['phone'] = "Enter a Valid Phone Number";
    }
}
if (empty($email)) {
    $player_errors['email'] = 'Email Field Is Required';
}else{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $player_errors['email'] =  "Enter a Valid Email";
    }
}


foreach($player_errors as $error){
    if ($error){
        session_start();
        $_SESSION['player_errors'] = $player_errors;
        $_SESSION['player_values'] = $player_values;
        header('Location:../create_player.php');
    }

}
$Name = mysqli_real_escape_string($conn,$name);
$team = mysqli_real_escape_string($conn,$team);
$Picture = mysqli_real_escape_string($conn,$picture['name']);
$Jersey_number = mysqli_real_escape_string($conn,$jersey_number);
$Players_age = mysqli_real_escape_string($conn,$players_age);
$Players_position = mysqli_real_escape_string($conn,$players_position);
$Phone = mysqli_real_escape_string($conn,$phone);
$Email = mysqli_real_escape_string($conn,$email);
$Insta = mysqli_real_escape_string($conn,$instagram);
$Fb = mysqli_real_escape_string($conn,$facebook);
$sql = "INSERT INTO players(`name`,teamId, age, profilePicture,position,jerseyNumber) VALUES ('$Name', '8', '$Players_age','$Picture','$Players_position','$Jersey_number')";

if (mysqli_query($conn, $sql)) {
    // $destfile = 'images/uploads/'. $picture;
    // $filepath = $picture['tmp_name'];
    // move_uploaded_file($filepath,$destfile);
    $sql = 'SELECT id FROM players ORDER BY id DESC LIMIT 1';
    $result = mysqli_query($conn, $sql);
    $value = mysqli_fetch_all($result, MYSQLI_ASSOC)[0];
    $id = $value['id'];
    mysqli_free_result($result);
    $sql = "INSERT INTO players_contact(playerId,facebookLink,instagramHandle,phoneNumber,email) VALUES ('$id','$Fb','$Insta','$Phone','$email')";
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
?>