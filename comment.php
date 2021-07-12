<?php
  $name = $_POST['name'];
  $visitor_email = $_POST['email'];
  $comment = $_POST['comment'];
 

 // Database connection
	$conn = new mysqli('localhost','root','','intern');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into inquiry(name,email,comment) values(?, ?, ?)");
		$stmt->bind_param("sss", $name,$email,$comment);
		$execval = $stmt->execute();
		echo $execval;
		echo "Thank you for Contacting...We will respond you soon..";
		$stmt->close();
		$conn->close();
	}

?>