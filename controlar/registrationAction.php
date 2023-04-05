<?php
 require "../model/connection.php";
if(isset($_POST['submit'])){
  // Get form data
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $dob = $_POST['dob'];
  $address = $_POST['address'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Upload image
  
  if(isset($_FILES["image"]) && isset($_FILES["image"]["name"])){
    $Image_name = $_FILES['image']['name'];
    $Image_size = $_FILES['image']['size'];
    $tem_name = $_FILES['image']['tmp_name'];
    $error = $_FILES['image']['error'];
    if ($error === 0) {
      if ($Image_size > 500000000) {
        $em = "unknown error occurred3!";
        // header("Location: upload.php?error=$em");
      }else{
        
        $img_ex = pathinfo($Image_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        $allowe_exs = array("jpg", "jpeg", "png");
        if (in_array($img_ex_lc, $allowe_exs)) {
          $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
          $img_upload_path = 'uploads/'.$new_img_name;
          move_uploaded_file($tem_name, $img_upload_path);
        }else{
          $em = "unknown error occurred1!";
          // header("Location: upload.php?error=$em");
        }
      }
    }else{
      $em = "unknown error occurred2!";
      // header("Location: upload.php?error=$em");
    }

  }else {
    echo "not submit";
  }
 

  $sql = "INSERT INTO userinfo (firstname, lastname, gender, email, phone, dob, address, username, password, userPic)
  VALUES ('$first_name', '$last_name', '$gender', '$email', '$phone', '$dob', '$address', '$username', '$password', '$new_img_name')";
  if (mysqli_query($conn, $sql)) {
    header("Loaction: ../index.php");
  } else {
    echo "Error: " . $sql . "<br>";
  }
  $conn->close();
}
?>