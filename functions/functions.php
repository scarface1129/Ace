<?php     

function getTeams($conn){
    $sql = 'SELECT `name`,id FROM teams ORDER BY id DESC';
    $result = mysqli_query($conn, $sql);
    $value = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $value;
}


function getMatch($conn,$id){
    $sql = "SELECT * FROM matches where id='$id'";
    $result = mysqli_query($conn, $sql);
    $matches = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $count = 0;

    foreach ($matches as $match) {
        $team1_id = $match['team1_id'];
        $team2_id = $match['team2_id'];
        // $date = date('F d, Y h:i:s A', strtotime($match['date']));
        $sql = "SELECT id,`name`,logo FROM teams where id= '$team1_id'";
        $result = mysqli_query($conn, $sql);
        $team1 = mysqli_fetch_all($result,MYSQLI_ASSOC);
        $sql = "SELECT id,`name`,logo FROM teams where id= '$team2_id'";
        $result = mysqli_query($conn, $sql);
        $team2 = mysqli_fetch_all($result,MYSQLI_ASSOC);
        $matches[$count]['team1_id'] = ['info'=> $team1]; 
        $matches[$count]['team2_id'] = ['info'=> $team2]; 
        $count++;
    
    }
    if($matches){
        return $matches;
    }else{
        header('Location:./404.php');
        exit();
    }

}


function getValue($conn,$id){
    // $match_values = ['date'=>$date,'time'=>$time,'team1'=>$team1,'team2'=>$team2,'location'=>$location,'about_match'=>$about_match];
    $sql = "SELECT * FROM matches where id='$id'";
    $result = mysqli_query($conn, $sql);
    $matches = mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $matches[0];
    // print_r($matches[0]);
    // die();

}
?>