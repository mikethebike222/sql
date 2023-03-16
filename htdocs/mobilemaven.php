<?php
$servername = "localhost";
$username = "root";
$password = "password";
$servername = 'localhost';
try {
	$conn = new PDO("mysql:host=$servername;dbname=mobilemaven", $username, $password);
	
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}	catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}
	

?>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        

        <title>Registration</title>
		
        <style>
           
         
        </style>
		</head>
		<body>
		
    </body>
</html>