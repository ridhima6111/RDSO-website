<?php

$name=$_POST['name'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$comments=$_POST['comments'];
 
//database creation
$conn = new mysqli('localhost','root','','feedback');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}
else{
   $stmt = $conn->prepare("insert into registration(name , email , contact , comments) values(?, ?, ?, ?)");
   $stmt->bind_param("ssis",$name, $email, $contact, $comments);
   $stmt->execute();
   echo "Thank You for your feedback";
   $stmt->close();
   $conn->close();
}

?>