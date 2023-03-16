<?php
include "../includes/db.php";

$userName = '';

if( isset($_GET['id'] ) )
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title>Untitled Document</title>
</head>

<body>
	<div class="container">
	<h1> Admin Panel-Edit User </h1>
		<p>Admin Restricted Page</p>
		
		<?php 	
		 
		var_dump($_GET) ;
		
		?>
	</div>
</body>
</html>