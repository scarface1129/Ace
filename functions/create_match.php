<?php   
include('dbconnect.php');
$match_errors = ['date'=>'','time'=>'','team1'=>'','team2'=>'','location'=>'','about_match'=>''];
$len = count($match_errors);
if(isset($_POST['submit'])){
    $date               =   $_POST['date'];
    $time               =   $_POST['time'];
    $team1               =   $_POST['team1'];
    $team2               =   $_POST['team2'];
    $location               =   $_POST['location'];
    $about_match               =   $_POST['about_match'];
    
$match_values = ['date'=>$date,'time'=>$time,'team1'=>$team1,'team2'=>$team2,'location'=>$location,'about_match'=>$about_match];
if (empty($date)) {
    $match_errors['date'] = 'date Field Is Required';
    $len++;
}
if (empty($time)){
    $match_errors['time'] = 'Time For Match is needed';
    $len++;
}
if (empty($team1)) {
    $match_errors['team1'] = 'Required';
    $len++;
}
if (empty($team2)) {
    $match_errors['team2'] = 'Required';
    $len++;
}
if (empty($location)) {
    $match_errors['location'] = 'Required';
    $len++;
}if (empty($about_match)) {
    $match_errors['about_match'] = 'Required';
    $len++;
}


$ready = False;
    if ($len > count($match_errors)){
        session_start();
        $_SESSION['match_errors'] = $match_errors;
        $_SESSION['match_values'] = $match_values;
        header('Location:../match_form.php');
    }else{
        $Date = mysqli_real_escape_string($conn,$date);
    $Time = mysqli_real_escape_string($conn,$time);
    $Team1 = mysqli_real_escape_string($conn,$team1);
    $Team2 = mysqli_real_escape_string($conn,$team2);
    $Location = mysqli_real_escape_string($conn,$location);
    $About = mysqli_real_escape_string($conn,$location);
    $Fouls = 0;
    $Team1_score = 0;
    $Team2_score = 0;
    $sql = "INSERT INTO matches(`date`,`time`,fouls, team1_id, team2_id,`location`,team1_score,team2_score,about_match) 
    VALUES ('$Date', '$Time','$Fouls', '$Team1','$Team2','$Location','$Team1_score','$Team2_score','$About')";
    
    if (mysqli_query($conn, $sql)) {
        header('Location:../index.php');
        exit();
       
    }else{
        header('Location:../index.php?error=data-couldnt-be-saved ');
        exit();
    }
    }



    


}
?>