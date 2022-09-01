<?php

    $eid = $_POST['eid'];
    $name = $_POST['name'];
    $title = $_POST['title'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $nic = $_POST['nic'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $blood = $_POST['blood'];
    $nationality = $_POST['nationality'];
    $religion = $_POST['religion'];
    $status = $_POST['status'];
    $license = $_POST['license'];
    $experience = $_POST['experience'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost','root','','expresstravels');
    if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }
    if(isset($_POST["insert"]))
    {
        $stmt = $conn->prepare("insert into staff(eid, name, title, dob, age, nic, address, contact, blood, nationality, religion, status, license, experience, username, password) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssssssssss", $eid, $name, $title, $dob, $age, $nic, $address, $contact, $blood, $nationality, $religion, $status, $license, $experience, $username, $password);
        $stmt->execute();
        echo '<script type="text/javascript">alert("Successfully Inserted");
        window.location="staff.php";</script>';
        $stmt->close(); 
        $conn->close();
    }
    if(isset($_POST["update"]))
    {
        $sql = ("update staff set name ='".$_POST['name']."', title ='".$_POST['title']."', dob ='".$_POST['dob']."', age ='".$_POST['age']."', nic ='".$_POST['nic']."', address ='".$_POST['address']."', contact ='".$_POST['contact']."', blood ='".$_POST['blood']."', nationality ='".$_POST['nationality']."', religion ='".$_POST['religion']."', status ='".$_POST['status']."', license ='".$_POST['license']."', experience ='".$_POST['experience']."', username ='".$_POST['username']."', password ='".$_POST['password']."' where eid ='".$_POST['eid']."'");
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo '<script type="text/javascript">alert("Successfully Updated");
        window.location="staff.php";</script>';
        $stmt->close(); 
        $conn->close();
    }
    if(isset($_POST["delete"]))
    {
        $sql = ("delete from staff where eid ='".$_POST['eid']."'");
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo '<script type="text/javascript">alert("Successfully Deleted");
        window.location="staff.php";</script>';
        $stmt->close(); 
        $conn->close();
    }

?>