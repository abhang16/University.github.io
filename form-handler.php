<?php
  $name = $_POST['name'];
  $visitor_email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

 // Database connection
	$conn = new mysqli('localhost','root','','intern');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into contact(name,email,subject,message) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $name,$email,$subject,$message);
		$execval = $stmt->execute();
		echo $execval;
		echo "Thank you for Contacting...We will respond you soon..";
		$stmt->close();
		$conn->close();
	}

?>