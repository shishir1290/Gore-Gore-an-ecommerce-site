<?php 

function showUserInfo(){
    require "../model/connection.php";
    $sql = "SELECT firstname,lastname,gender,email,phone,address,dob,userPic,password FROM userinfo where username=?";
    $stmt = $conn -> prepare($sql);
    $stmt->bind_param("s", $_SESSION['username']);
    if($stmt -> execute() > 0){
        $stmt->bind_result($first_name, $last_name, $gender, $email, $phone, $address, $dob, $new_img_name, $password);
        $rows = array();
        while ($stmt->fetch()) {

            $rows[] = array('firstname' => $first_name, 'lastname' => $last_name, 'gender' => $gender, 'email' => $email, 'phone' => $phone, 'address' => $address, 'dob' => $dob, 'userPic' => $new_img_name, 'password' => $password);
        }
        $_SESSION['userInfo'] = $rows;
        $stmt->close(); 
        return true;
    }else{
        return false;
    }
}

function updateUserInfo($first_name, $last_name, $phone, $address, $username){
    require "connection.php";
    $stmt = $conn->prepare("UPDATE userinfo SET firstname = ?, lastname = ?, phone = ?, address = ? WHERE username = ?");
    $stmt->bind_param("sssss", $first_name, $last_name, $phone, $address, $username);
    if ($stmt->execute()){
        $_SESSION['msg'] = "Profile updated successfully!";
        return true;
    }else{
        $_SESSION['msg'] = "Failed to update profile!";
        return false;
    }
    $stmt->close();
    $conn->close();
}



?>