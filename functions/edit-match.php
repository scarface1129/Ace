<?php   
include('dbconnect.php');
$match_errors = ['date'=>'','time'=>'','team1'=>'','team2'=>'','location'=>'','about_match'=>''];
$len = count($match_errors);

if(isset($_POST['submit'])){
    $id                 = $_POST['id'];
    $date               =   $_POST['date'];
    $time               =   $_POST['time'];
    $team1               =   $_POST['team1'];
    $team2               =   $_POST['team2'];
    $location               =   $_POST['location'];
    $about_match               =   $_POST['about_match'];
    $fouls               =   $_POST['fouls'];
    $team1_score               =   $_POST['team1_score'];
    $team2_score               =   $_POST['team2_score'];
    $played               =   $_POST['played'];
    
    $match_values = ['date'=>$date,
                        'time'=>$time,
                        'team1'=>$team1,
                        'team2'=>$team2,
                        'location'=>$location,
                        'about_match'=>$about_match,
                        'fouls'=>$fouls,
                        'team1_score'=>$team1_score,
                        'team2_score'=>$team2_score,
                        'played'=>$played];
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
        header("Location:../update-match.php?id=$id");
    }else{
    $Id = mysqli_real_escape_string($conn,$id);
    $Date = mysqli_real_escape_string($conn,$date);
    $Time = mysqli_real_escape_string($conn,$time);
    $Team1 = mysqli_real_escape_string($conn,$team1);
    $Team2 = mysqli_real_escape_string($conn,$team2);
    $Location = mysqli_real_escape_string($conn,$location);
    $About = mysqli_real_escape_string($conn,$about_match);
    $Fouls = mysqli_real_escape_string($conn,$fouls);
    $Team1_score = mysqli_real_escape_string($conn,$team1_score);
    $Team2_score = mysqli_real_escape_string($conn,$team2_score);
    $Played = mysqli_real_escape_string($conn,$played);

    $sql = "UPDATE matches SET `date`='$Date',`time`='$Time',fouls='$Fouls', team1_id='$Team1', team2_id='$Team2',`location`='$Location',played = '$Played',team1_score='$Team1_score',team2_score='$Team2_score',about_match='$About'
    WHERE id = $Id";
    
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