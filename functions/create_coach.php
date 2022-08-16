<?php   
include('dbconnect.php');
$coach_errors = ['name'=>'','team'=>'','picture'=>'','age'=>'','phone'=>'','email'=>''];
$len = count($coach_errors);
if(isset($_POST['submit'])){
    $name               =   $_POST['name'];
    $team               =   $_POST['team'];
    $picture            =   $_FILES['picture'];
    $age                =   $_POST['age'];
    $phone              =   $_POST['phone'];
    $email              =   $_POST['email'];
$coach_values = ['name'=>$name,
            'team'=>$team,
            'picture'=>$picture['name'],
            'age'=>$age,
            'phone'=>$phone,
            'email'=>$email];
if (empty($name)) {
    $coach_errors['name'] = 'Name Field Is Required';
    $len++;
}else{
    if(!preg_match('/^[a-zA-Z\s]+$/',$name)){
        $coach_errors['name'] = "The Name Field Must contain alphabets only";
        $len++;
    }
}
if (empty($team)){
    $coach_errors['team'] = 'Please Identify with a team';
    $len++;
}

if (empty($age)) {
    $coach_errors['age'] = 'Indicate your age';
    $len++;
}

if ($picture['name'] == null) {
    $coach_errors['picture'] = 'Please Upload a Profile Image';
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
        $coach_errors['picture'] = "Invalid File Format";
        $len++;
    }else if (($picture["size"] > 2000000)) {
        $coach_errors['picture'] = "Picture Size is Bigger than 2MB";
        $len++;
    }else if ($width > "2048" || $height > "2048") {
        $coach_errors['picture'] = "Picture Dimmension is Bigger than 2048 X 2048";
        $len++;
    }
  
}
if(empty($phone)){
    $coach_errors['phone'] = 'Phone Number is needed';
    $len++;
}else{
    if(!preg_match('/((^090)([23589]))|((^070)([1-9]))|((^080)([2-9]))|((^081)([0-9]))(\d{7})/',$phone)){
        $coach_errors['phone'] = "Enter a Valid Phone Number";
        $len++;
    }
}
if (empty($email)) {
    $coach_errors['email'] = 'Email Field Is Required';
    $len++;
}else{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $coach_errors['email'] =  "Enter a Valid Email";
        $len++;
    }
}

    if ($len > count($coach_errors)){
        session_start();
        $_SESSION['coach_errors'] = $coach_errors;
        $_SESSION['coach_values'] = $coach_values;
        header('Location:../create_coach.php');
    }else{
        $Name = mysqli_real_escape_string($conn,$name);
$team = mysqli_real_escape_string($conn,$team);
$Picture = mysqli_real_escape_string($conn,$picture['name']);
$age = mysqli_real_escape_string($conn,$age);
$Phone = mysqli_real_escape_string($conn,$phone);
$Email = mysqli_real_escape_string($conn,$email);
$sql = "INSERT INTO coach(`name`,teamId, age, email,phone,picture) VALUES ('$Name', '8', '$age','$Email','$Phone','$Picture')";

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