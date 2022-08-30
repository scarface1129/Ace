<?php   
include('dbconnect.php');
include('functions.php');
if(isset($_POST['submit'])){
    $sender               =   $_POST['name'];
    $email               =   $_POST['email'];
    $message               =   $_POST['message'];
    $date            =   date('y/m/d') ;
    

$Sender = mysqli_real_escape_string($conn,$sender);
$Email = mysqli_real_escape_string($conn,$email);
$Message = mysqli_real_escape_string($conn,$message);
$Date = mysqli_real_escape_string($conn,$date);
$sql = "INSERT INTO messages(`sender`,email,`message`, `date`) VALUES ('$Sender','$Email', '$Message', '$Date')";

if (mysqli_query($conn, $sql)) {
    header("Location:../index.php?feed=Message-sent");
    exit();
   
}else{
    header('Location:../index.php?feed=Message-Was-Not-Sent');
    exit();
}
    }





?>