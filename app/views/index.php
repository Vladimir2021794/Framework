<?php

foreach($posts as $row){
         
    $userid = $row["id"];
    $title = $row["title"];
    $userage = $row["content"];
    echo $title . '<br>';
}

