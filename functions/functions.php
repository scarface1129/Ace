<?php     

function getTeams($conn){
    $sql = 'SELECT `name`,id FROM teams ORDER BY id DESC';
    $result = mysqli_query($conn, $sql);
    $value = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $value;
}


?>