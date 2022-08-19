<?php   
include('dbconnect.php');
$player_errors = ['name'=>'','team'=>'','picture'=>'','jersey_number'=>'','players_age'=>'','players_position'=>'','phone'=>'','email'=>''];
$len = count($player_errors);
if(isset($_POST['submit'])){
    $id               =   $_POST['id'];
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
            'teamId'=>$team,
            'profilePicture'=>$picture['name'],
            'jerseyNumber'=>$jersey_number,
            'players_age'=>$players_age,
            'position'=>$players_position,
            'phoneNumber'=>$phone,
            'email'=>$email,
            'instagramHandle'=>$instagram,
            'facebookLink'=>$facebook];
if (empty($name)) {
    $player_errors['name'] = 'Name Field Is Required';
    $len++;
}else{
    if(!preg_match('/^[a-zA-Z\s]+$/',$name)){
        $player_errors['name'] = "The Name Field Must contain alphabets only";
        $len++;
    }
}
if (empty($team)){
    $player_errors['team'] = 'Please Identify with a team';
    $len++;
}
if (empty($jersey_number)) {
    $player_errors['jersey_number'] = 'Your Jersey number is needed';
    $len++;
}else{
    if(!preg_match('/^[0-9]+$/',$jersey_number)){
        $player_errors['jersey_number'] = "This Filed Can Only Take Positive Integers";
        $len++;
    }
}
if (empty($players_age)) {
    $player_errors['players_age'] = 'Indicate your age';
    $len++;
}
if (empty($players_position)) {
    $player_errors['players_position'] = 'Indicate your Wing';
    $len++;
}
if ($picture['name'] == null) {
    $player_errors['picture'] = 'Please Upload a Profile Image';
    $len++;
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
        $player_errors['picture'] = "Invalid File Format, supported :'jpeg','png','jpg'";
        $len++;
    }else if (($picture["size"] > 2000000)) {
        $player_errors['picture'] = "Picture Size is Bigger than 2MB";
        $len++;
    }else if ($width > "2048" || $height > "2048") {
        $player_errors['picture'] = "Picture Dimmension is Bigger than 2048 X 2048";
        $len++;
    }
  
}
if(empty($phone)){
    $player_errors['phone'] = 'Phone Number is needed';
    $len++;
}else{
    if(!preg_match('/((^090)([23589]))|((^070)([1-9]))|((^080)([2-9]))|((^081)([0-9]))(\d{7})/',$phone)){
        $player_errors['phone'] = "Enter a Valid Phone Number";
        $len++;
    }
}
if (empty($email)) {
    $player_errors['email'] = 'Email Field Is Required';
    $len++;
}else{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $player_errors['email'] =  "Enter a Valid Email";
        $len++;
    }
}

    if ($len > count($player_errors)){
        session_start();
        $_SESSION['player_errors'] = $player_errors;
        $_SESSION['player_values'] = $player_values;
        header('Location:../edit-players.php');
    }else{
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
$sql = "UPDATE  players SET`name`='$Name',teamId='$team', age='$Players_age', profilePicture='$Picture',position='$Players_position',
jerseyNumber='$Jersey_number',facebookLink='$Fb',instagramHandle='$Insta',phoneNumber='$Phone',email='$email' WHERE id= '$id'";

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