<?php     

function getTeams($conn){
    $sql = 'SELECT `name`,id FROM teams ORDER BY id DESC';
    $result = mysqli_query($conn, $sql);
    $value = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $value;
}
function getTeam($conn,  $id){
    $sql = "SELECT * FROM teams WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $value = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    if($value){
        return $value[0];
    }else{
        header('Location:./404.php');
        exit();
    }
}
function getTeamCoach($conn,  $id){
    $sql = "SELECT teamId FROM coach WHERE teamId='$id'";
    $result = mysqli_query($conn, $sql);
    $value = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if($value){
        return True;
    }else{
        return False;
    }
}
function getMatchDetail($conn,  $id){
    $sql = "SELECT * FROM matches WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $value = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    if($value){
        return $value[0];
    }else{
        header('Location:./404.php');
        exit();
    }
}
function getAllTeam($conn){
    $sql = "SELECT * FROM teams";
    $result = mysqli_query($conn, $sql);
    $value = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    if($value){
        return $value;
    }else{
        header('Location:./404.php');
        exit();
    }
}
function getCoach($conn,$id){
    $sql = "SELECT * FROM coach WHERE teamId='$id'";
    $result = mysqli_query($conn, $sql);
    $coach = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if($coach){
        return $coach[0];
    }else{
        return Null ;
    }
}
function getCoachDetails($conn,$id){
    $sql = "SELECT * FROM coach WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $coach = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if($coach){
        return $coach[0];
    }else{
        return Null ;
    }
}
function getPlayers($conn,$id){
    $sql = "SELECT * FROM players WHERE teamId='$id'";
    $result = mysqli_query($conn, $sql);
    $players = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if($players){
        return $players;
    }else{
        return Null ;
    }
}
function getPlayersDetail($conn,$id){
    $sql = "SELECT * FROM players WHERE Id='$id'";
    $result = mysqli_query($conn, $sql);
    $players = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if($players){
        return $players[0];
    }else{
        return Null ;
    }
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
function getMatches($conn){
    $sql = 'SELECT * FROM matches WHERE `date` > NOW()  ORDER BY `date` LIMIT 7';
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
    
    } if($matches){
        return $matches;
    }else{
        return null;
    }
}

function getLastPlayedMatch($conn){
    $sql = "SELECT * FROM `matches` WHERE `date` < NOW() LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $date = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if($date){
        return $date[0];
    }else{
        return null;
    }
}
function getTeamName($conn,$id){
    $sql = "SELECT `name`,logo FROM `teams` WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $name = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if($name){
        return $name[0];
    }else{
        return null;
    }
}
function getMatchResults($conn){
    $sql = "SELECT * FROM `matches` WHERE `date` < NOW()";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if($data){
        return $data;
    }else{
        return null;
    }
}


function getAcePictures($conn){
    $sql = "SELECT * FROM `gallery` where category ='company'";
    $result = mysqli_query($conn, $sql);
    $picture = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if($picture){
        return $picture;
    }else{
        return null;
    }
}function getOtherPictures($conn){
    $sql = "SELECT * FROM `gallery` where category= 'others'";
    $result = mysqli_query($conn, $sql);
    $picture = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if($picture){
        return $picture;
    }else{
        return null;
    }
}function getAboutAce($conn){
    $sql = "SELECT * FROM `about_ace` where id=1";
    $result = mysqli_query($conn, $sql);
    $about = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if($about){
        return $about[0];
    }else{
        return null;
    }
}function getAwards($conn){
    $sql = "SELECT * FROM `awards`";
    $result = mysqli_query($conn, $sql);
    $awards = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if($awards){
        return $awards;
    }else{
        return null;
    }
}function getAward($conn,$id){
    $sql = "SELECT * FROM `awards` WHERE winnerId='$id'";
    $result = mysqli_query($conn, $sql);
    $name = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if($name){
        return $name;
    }else{
        return null;
    }
}function getAwardDetails($conn,$id){
    $sql = "SELECT * FROM `awards` WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $name = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if($name){
        return $name[0];
    }else{
        return null;
    }
}

function userExists($conn,$email,$table){
    $sql = "SELECT email FROM `$table` WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $val = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if($val){
        return True;
    }else{
        return False;
    }
}

function getAceContact($conn){
    $sql = "SELECT * FROM `contact` WHERE id= '1'";
    $result = mysqli_query($conn, $sql);
    $contact = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if($contact){
        return $contact[0];
    }else{
        return null;
    }
}
function getNews($conn){
    $sql = "SELECT * FROM news ";
    $result = mysqli_query($conn, $sql);
    $news = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if($news){
        return $news;
    }else{
        return null;
    }
}function getAllPost($conn){
    $sql = "SELECT * FROM news  ORDER BY id DESC LIMIT 3";
    $result = mysqli_query($conn, $sql);
    $news = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if($news){
        return $news;
    }else{
        return null;
    }
}function getCommment($conn, $id){
    $sql = "SELECT * FROM comment WHERE newsId = $id ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    $comment = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if($comment){
        return $comment;
    }else{
        return null;
    }
}function getSingleNews($conn,$id){
    $sql = "SELECT * FROM news WHERE id= '$id'";
    $result = mysqli_query($conn, $sql);
    $news = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if($news){
        return $news[0];
    }else{
        return null;
    }
}


function reArrangeFiles($file_post){
    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for($i=0; $i<$file_count; $i++){
        foreach($file_keys as $key){
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }
    return $file_ary;

}
?>
