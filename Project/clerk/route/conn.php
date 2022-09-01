<?php

    $rid = $_POST['rid'];
    $origin = $_POST['origin'];
    $rouFrom = $_POST['rouFrom'];
    $rouTo = $_POST['rouTo'];

    $conn = new mysqli('localhost','root','','expresstravels');
    if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }
    if(isset($_POST["insert"]))
    {
        $stmt = $conn->prepare("insert into route(rid, origin, rouFrom, rouTo) values(?, ?, ?, ?)");
        $stmt->bind_param("ssss", $rid, $origin, $rouFrom, $rouTo);
        $stmt->execute();
        echo '<script type="text/javascript">alert("Successfully Inserted");
        window.location="route.php";</script>';
        $stmt->close(); 
        $conn->close();
    }
    if(isset($_POST["update"]))
    {
        $sql = ("update route set origin ='".$_POST['origin']."', rouFrom ='".$_POST['rouFrom']."', rouTo ='".$_POST['rouTo']."' where rid ='".$_POST['rid']."'");
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo '<script type="text/javascript">alert("Successfully Updated");
        window.location="route.php";</script>';
        $stmt->close(); 
        $conn->close();
    }
    if(isset($_POST["delete"]))
    {
        $sql = ("delete from route where rid ='".$_POST['rid']."'");
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo '<script type="text/javascript">alert("Successfully Deleted");
        window.location="route.php";</script>';
        $stmt->close(); 
        $conn->close();
    }

?>