<?php

    $pid = $_POST['pid'];
    $passeName = $_POST['passeName'];
    $passeContact = $_POST['passeContact'];
    $boarPlace = $_POST['boarPlace'];
    $destPlace = $_POST['destPlace'];
    $time = $_POST['time'];
    $seat = $_POST['seat'];

    $conn = new mysqli('localhost','root','','expresstravels');
    if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }
    if(isset($_POST["insert"]))
    {
        $stmt = $conn->prepare("insert into passenger(pid, passeName, passeContact, boarPlace, destPlace, time, seat) values(?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $pid, $passeName, $passeContact, $boarPlace, $destPlace, $time, $seat);
        $stmt->execute();
        echo '<script type="text/javascript">alert("Successfully Inserted");
        window.location="sche.php";</script>';
        $stmt->close(); 
        $conn->close();
    }
    if(isset($_POST["update"]))
    {
        $sql = ("update passenger set passeName ='".$_POST['passeName']."', passeContact ='".$_POST['passeContact']."', boarPlace ='".$_POST['boarPlace']."', destPlace ='".$_POST['destPlace']."', time ='".$_POST['time']."', seat ='".$_POST['seat']."' where pid ='".$_POST['pid']."'");
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo '<script type="text/javascript">alert("Successfully Updated");
        window.location="sche.php";</script>';
        $stmt->close(); 
        $conn->close();
    }
    if(isset($_POST["delete"]))
    {
        $sql = ("delete from passenger where pid ='".$_POST['pid']."'");
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo '<script type="text/javascript">alert("Successfully Deleted");
        window.location="sche.php";</script>';
        $stmt->close(); 
        $conn->close();
    }

?>