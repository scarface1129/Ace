<?php 
include('./functions/dbconnect.php');

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
   
}
$nextMatch = $matches[0];

 

?> 