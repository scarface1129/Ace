<?php   
include('dbconnect.php');
$login_errors = ['email'=>'','team'=>'','role'=>'', 'message'=> ''];
$len = count($login_errors);
if(isset($_POST['submit'])){
    $email               =   $_POST['email'];
    $team               =   $_POST['team'];
    $role               =   $_POST['role'];
   
$login_values = ['email'=>$email,
            'team'=>$team,
            'role'=>$role];


if (empty($team)){
    $login_errors['team'] = 'Please Identify with a team';
    $len++;
}
if (empty($role)) {
    $login_errors['role'] = 'Are you a player or a coach?';
    $len++;
}

if (empty($email)) {
    $login_errors['email'] = 'Email Field Is Required';
    $len++;
}else{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $login_errors['email'] =  "Enter a Valid Email";
        $len++;
    }
}
// print_r($login_errors);
// die();
    if ($len > count($login_errors)){
        session_start();
        $_SESSION['login_errors'] = $login_errors;
        $_SESSION['login_values'] = $login_values;
        header('Location:../login.php');
    }else{
        $Email = mysqli_real_escape_string($conn,$email);
        $Team = mysqli_real_escape_string($conn,$team);
        $Role = mysqli_real_escape_string($conn,$role);
        if($Role == 'coach'){
            $sql = "SELECT email, teamId,id FROM coach WHERE email='$Email' and teamId = $Team";
            $result = mysqli_query($conn, $sql);
            $value = mysqli_fetch_all($result, MYSQLI_ASSOC);
           
        if ($value) {
            session_start();
            $loginDetails = ['teamId'=>$Team,'coachId'=>$value[0]['id']];
            $_SESSION['loginDetail']=$loginDetails;
            print_r($_SESSION);
            die();      
            header('Location:../index.php');
            exit();
        }else{
            $login_errors['message'] = 'Details does not match any in our database';
            session_start();
            $_SESSION['login_errors'] = $login_errors;
            header('Location:../login.php');
            exit();
        }
        }else{
            $sql = "SELECT email, teamId,id FROM players WHERE email='$Email' and teamId = $Team";
            $result = mysqli_query($conn, $sql);
            $value = mysqli_fetch_all($result, MYSQLI_ASSOC);
           
        if ($value) {
            session_start();
            $loginDetails = ['teamId'=>$Team,'playerId'=>$value[0]['id']];
            $_SESSION['loginDetail']=$loginDetails;
            header('Location:../index.php');
            exit();
        }else{
            $login_errors['message'] = 'Details does not match any in our database';
            session_start();
            $_SESSION['login_errors'] = $login_errors;
            header('Location:../login.php');
            exit();
        }
        }
        
            }




}
?>