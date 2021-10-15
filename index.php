<?php
$submit=false;
if(isset($_POST['name'])){
	// set connection
   $server= "localhost";
   $username= "root";
   $password="" ;
// creating database connection
   $conn=mysqli_connect($server,$username,$password);
   // checking for connection
   if(!$conn){
       die("connection to this database failed due to ". mysqli_connect_error());
   }
//    echo "working";
// collect post variables
$name=$_POST['name'];
$age=$_POST['age'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$Query=$_POST['Query'];

$sql="INSERT INTO `tripform`.`usa trip` (`name`, `age`, `email`, `phone`, `Query`, `dt`) 
VALUES ('$name', '$age','$email', '$phone', '$Query' , current_timestamp())";
// echo $sql;

// executing query
if($conn->query($sql)==true){
	// echo "successful";
	$submit=true;
}
else{
	echo "ERROR: $sql <br> $conn->error";
}

// closing database connection
$conn->close();

}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Welcome Travel Form</title>
		<link rel="stylesheet" href="styles.css" />
	</head>
	<body>
		<img
			class="bg"
			src="https://i2.wp.com/revisesociology.com/wp-content/uploads/2017/01/united-states-of-america.jpg?resize=840%2C560&ssl=1"
			alt="us flag"
		/>
		<div class="container">
			<h1>Welcome to VIT Bhopal US trip form</h1>
			<p>
				Enter your details and submit this form to confirm your participation in
				the trip
			</p>
			<?php 
			if($submit==true){
			echo "<p class='submitmsg'>Thank you for your response</p>";
			}
		?>
			<form action="index.php" method="post">
				<input
					type="text"
					name="name"
					id="name"
					placeholder="Enter your Name"
				/>
				<input type="int" name="age" id="age" placeholder="Enter your Age " />
				<input
					type="varchar"
					name="email"
					id="email"
					placeholder="Enter your Email"
				/>
				<input
					type="varchar"
					name="phone"
					id="phone"
					placeholder="Enter your Phone Number"
				/>
				<textarea
					name="Query"
					id="Query"
					cols="30"
					rows="5"
					placeholder="Enter any Queries?"
				></textarea>
				<button class="btn">Submit</button>
			</form>
		</div>
		<script src="index.js"></script>
	</body>
</html>