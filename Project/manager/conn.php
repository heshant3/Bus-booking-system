<?php

    $sid = $_POST['sid'];
    $eid = $_POST['eid'];
    $bid = $_POST['bid'];
    $rid = $_POST['rid'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $departure = $_POST['departure'];
    $wty = $_POST['wty'];

    $conn = new mysqli('localhost','root','','expresstravels');
    if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }
    if(isset($_POST["insert"]))
    {
        $stmt = $conn->prepare("insert into sche(sid, eid, bid, rid, date, time, departure, wty) values(?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $sid, $eid, $bid, $rid, $date, $time, $departure, $wty);
        $stmt->execute();
        echo '<script type="text/javascript">alert("Successfully Inserted");
        window.location="sche.php";</script>';
        $stmt->close(); 
        $conn->close();
    }
    if(isset($_POST["update"]))
    {
        $sql = ("update sche set eid ='".$_POST['eid']."', bid ='".$_POST['bid']."', rid ='".$_POST['rid']."', date ='".$_POST['date']."', time ='".$_POST['time']."', departure ='".$_POST['departure']."', wty ='".$_POST['wty']."' where sid ='".$_POST['sid']."'");
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo '<script type="text/javascript">alert("Successfully Updated");
        window.location="sche.php";</script>';
        $stmt->close(); 
        $conn->close();
    }
    if(isset($_POST["delete"]))
    {
        $sql = ("delete from sche where sid ='".$_POST['sid']."'");
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo '<script type="text/javascript">alert("Successfully Deleted");
        window.location="sche.php";</script>';
        $stmt->close(); 
        $conn->close();
    }

?>