<?php

    $bid = $_POST['bid'];
    $seat = $_POST['seat'];
    $engNum = $_POST['engNum'];
    $gearTyp = $_POST['gearTyp'];
    $busTyp = $_POST['busTyp'];
    $facility = $_POST['facility'];
    $other = $_POST['other'];

    $conn = new mysqli('localhost','root','','expresstravels');
    if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }
    if(isset($_POST["insert"]))
    {
        $stmt = $conn->prepare("insert into bus(bid, seat, engNum, gearTyp, busTyp, facility, other) values(?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $bid, $seat, $engNum, $gearTyp, $busTyp, $facility, $other);
        $stmt->execute();
        echo '<script type="text/javascript">alert("Successfully Inserted");
        window.location="bus.php";</script>';
        $stmt->close(); 
        $conn->close();
    }
    if(isset($_POST["update"]))
    {
        $sql = ("update bus set seat ='".$_POST['seat']."', engNum ='".$_POST['engNum']."', gearTyp ='".$_POST['gearTyp']."', busTyp ='".$_POST['busTyp']."', facility ='".$_POST['facility']."', other ='".$_POST['other']."' where bid ='".$_POST['bid']."'");
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo '<script type="text/javascript">alert("Successfully Updated");
        window.location="bus.php";</script>';
        $stmt->close(); 
        $conn->close();
    }
    if(isset($_POST["delete"]))
    {
        $sql = ("delete from bus where bid ='".$_POST['bid']."'");
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo '<script type="text/javascript">alert("Successfully Deleted");
        window.location="bus.php";</script>';
        $stmt->close(); 
        $conn->close();
    }

?>