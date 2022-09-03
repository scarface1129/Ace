<?php   
include('dbconnect.php');
include('functions.php');
$match_errors = ['date'=>'','time'=>'','team1'=>'','team2'=>'','location'=>'','about_match'=>'','picture'=>[]];
$file_new_name = [];
$len = count($match_errors);
if(isset($_POST['submit'])){
    $date               =   $_POST['date'];
    $time               =   $_POST['time'];
    $team1               =   $_POST['team1'];
    $team2               =   $_POST['team2'];
    $location               =   $_POST['location'];
    $about_match               =   $_POST['about_match'];
    $picture                 = $_FILES['picture'];
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
if ($picture['size'][0] == 0) {
    $match_errors['picture'] = 'Please Upload some pictures at least 3 or 4';
    $len++;
}else{
    $pictures = reArrangeFiles($picture);
    $count=0;
    foreach($pictures as $pics){
    $valid = ['jpeg','png','jpg','jfif'];
    $exploded = explode('.',$pics['name']);
    $file_type = in_array(strtolower(end($exploded)),$valid);
    $fileinfo = @getimagesize($pics["tmp_name"]);
    $new_name = uniqid('',true) . '.' . strtolower(end($exploded));
     if($fileinfo){
        $width = $fileinfo[0];
        $height = $fileinfo[1];
    }
    
    if (!$file_type){
        array_push($match_errors['picture'],$pics['name'].">>> Invalid File Format") ;
        $len++;
    }
    else if (($pics["size"] > 2000000)) {
        array_push($match_errors['picture'],$pics['name'].">>>Picture Size is Bigger than 2MB");
        $len++;
    }else if ($width > "500" || $height > "500") {
        array_push($match_errors['picture'],$pics['name'].">>>Picture Dimmension is Bigger than 500 X 500");
        $len++;
    }
    else{
        $pictures[$count]['new_name'] = $new_name;
        array_push($file_new_name,$new_name);
    }
    $count++;
    }
    
  
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
    $About = mysqli_real_escape_string($conn,$about_match);
    $Picture = mysqli_real_escape_string($conn,implode(',',$file_new_name));
    $Fouls = 0;
    $Team1_score = 0;
    $Team2_score = 0;
    $sql = "INSERT INTO matches(`date`,`time`,fouls, team1_id, team2_id,`location`,team1_score,team2_score,about_match,stadium_image) 
    VALUES ('$Date', '$Time','$Fouls', '$Team1','$Team2','$Location','$Team1_score','$Team2_score','$About','$Picture')";
    
    if (mysqli_query($conn, $sql)) {
        foreach($pictures as $pics){
            $file_name = $pics['new_name'];
            $file_tmp = $pics['tmp_name'];
            $parent = dirname(__DIR__);
            $target_dir = $parent."\\uploads\\". $file_name;
            move_uploaded_file($file_tmp, $target_dir);
        }
        header('Location:../index.php');
        exit();
       
    }else{
        header('Location:../index.php?error=data-couldnt-be-saved ');
        exit();
    }
    }



    


}
?>