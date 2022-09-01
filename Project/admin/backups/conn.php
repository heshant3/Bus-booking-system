<?php

    $conn = new mysqli('localhost','root','','expresstravels');
    if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }

?>