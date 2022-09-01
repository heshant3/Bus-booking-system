<?php

    $sid = $_POST['sid'];
    $eid = $_POST['eid'];
    $bid = $_POST['bid'];
    $rid = $_POST['rid'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $departure = $_POST['departure'];
    $wayTyp = $_POST['wayTyp'];

    $conn = new mysqli('localhost','root','','expresstravels');
    if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }
    if(isset($_POST["insert"]))
    {
        $stmt = $conn->prepare("insert into schedule(sid, eid, bid, rid, date, time, departure, wayTyp) values(?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $sid, $eid, $bid, $rid, $date, $time, $departure, $wayTyp);
        $stmt->execute();
        echo '<script type="text/javascript">alert("Successfully Inserted");
        window.location="sche.php";</script>';
        $stmt->close(); 
        $conn->close();
    }
    if(isset($_POST["update"]))
    {
        $sql = ("update schedule set eid ='".$_POST['eid']."', bid ='".$_POST['bid']."', rid ='".$_POST['rid']."', date ='".$_POST['date']."', time ='".$_POST['time']."', departure ='".$_POST['departure']."', wayTyp ='".$_POST['wayTyp']."' where sid ='".$_POST['sid']."'");
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo '<script type="text/javascript">alert("Successfully Updated");
        window.location="sche.php";</script>';
        $stmt->close(); 
        $conn->close();
    }
    if(isset($_POST["delete"]))
    {
        $sql = ("delete from schedule where sid ='".$_POST['sid']."'");
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo '<script type="text/javascript">alert("Successfully Deleted");
        window.location="sche.php";</script>';
        $stmt->close(); 
        $conn->close();
    }

?>