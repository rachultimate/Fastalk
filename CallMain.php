<?php

include('conexao.php');

$id = $_COOKIE['id'];
$s = $_COOKIE['us_uuid'];

$query = "SELECT * FROM `$id` where `incall` = '1'";
$result = mysqli_query($conexao, $query);
$con = $conexao->query($query);
$row = mysqli_num_rows($result);

while($dado = $con->fetch_array()) {
    $img = $dado['profileimg'];
    $online = $dado['online'];
    $mic = $dado['mic'];
    $vid = $dado['vid'];
    if($vid == 0) {   
        $profileImg = '';
    } else {
        $profileImg = '<img src="midia/'.$img.'" alt="call-profile-img">';
        if($mic == 1) {
            $micMuted = '<div id="muted_icon" type="submit" name="emojis" class="mute"><i class="fas fa-microphone-slash"></i></div>';
        } else {
            $micMuted = "";
        }
    }
    
    if($row != 0 && $online > time()-5) { 
        echo ('                          
        <main class="usercall2">
            '.$profileImg.'
            
            '.$micMuted.'
        </main> 
        ');
    }
}