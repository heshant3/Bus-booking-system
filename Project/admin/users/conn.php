<?php

    $uid = $_POST['uid'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $useLev = $_POST['useLev'];

    $conn = new mysqli('localhost','root','','expresstravels');
    if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }
    if(isset($_POST["insert"]))
    {
        $stmt = $conn->prepare("insert into users(uid, username, password, useLev) values(?, ?, ?, ?)");
        $stmt->bind_param("ssss", $uid, $username, $password, $useLev);
        $stmt->execute();
        echo '<script type="text/javascript">alert("Successfully Inserted");
        window.location="users.php";</script>';
        $stmt->close(); 
        $conn->close();
    }
    if(isset($_POST["update"]))
    {
        $sql = ("update schedule set username ='".$_POST['username']."', password ='".$_POST['password']."', useLev ='".$_POST['useLev']."' where uid ='".$_POST['uid']."'");
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo '<script type="text/javascript">alert("Successfully Updated");
        window.location="users.php";</script>';
        $stmt->close(); 
        $conn->close();
    }
    if(isset($_POST["delete"]))
    {
        $sql = ("delete from schedule where uid ='".$_POST['uid']."'");
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo '<script type="text/javascript">alert("Successfully Deleted");
        window.location="users.php";</script>';
        $stmt->close(); 
        $conn->close();
    }

?>