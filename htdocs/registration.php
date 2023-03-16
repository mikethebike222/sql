<?php
include "includes/db.php";

      $debug = True;
      $feedback = '';
			
		$n1 = mt_rand(1,20);
		$n2 = mt_rand(1,20);
		$sum = $n1 + $n2;
		$nHash = hash('sha256', "$sum");
				

      function validEmail(string $email1): bool{
    $email1 = trim($email1);
    if (strlen($email1) < 5) 
        return false;
    $atAt = strpos($email1, '@');
    $dotAt = strpos($email1, '.');
    if (false === $dotAt) 
        return false;
    if (false === $atAt) 
        return false;
    if ($dotAt < $atAt) 
        return false;
    return true;
}
      
      $bFormSubmitted = isset($_POST['email1']);
      if ($bFormSubmitted === true) {
        $bValidEmail = validEmail($_POST['email1']);
      if (false === $bValidEmail) {
        $feedback .= $_POST['email1'] . ' isnt valid, Your Email Should meet these parameters: A length >= 5  ,

Has the character “@”  ,

Has the character “.”  ,

“@” comes before the “.” <br>';
    }
		  
		  
		  
}


      function validPassword(string $password): bool{
        $password = trim($password);
        if (strlen($password) < 5)
          return false;
        $doll = strpos($password, '$');
        $aster = strpos($password, '*');
        if (false != $aster)
          return false;
        if (false != $doll)
          return false;
        return true;
      }

      $bFormSubmitted = isset($_POST['password']);
      if ($bFormSubmitted === true)
      {
        $bValidPassword = validPassword($_POST['password']);
        if (false === $bValidPassword)
          $feedback .= $_POST['password'] . ' isnt valid, Your Password should meet these parameters, length >= 5,

not allowed a "$" sign or a "*" sign  <br>';
      }


    $bFormSubmitted = isset($_POST['hash_2']);
if ($bFormSubmitted)
  {
    $userinput = trim($_POST['num1']);
    $num1_hash = trim($_POST['hash_2']);

    if (hash('sha256', $userinput) === $num1_hash) 
      echo "";
    else 
      $feedback .= $_POST['num1'] . ' Invalid ReCaptcha';
      
    }
		$email1 = $_POST['email1'];
if( $bFormSubmitted && strlen($feedback) > 0 ){
          echo '<div class="bg-danger text-white mt-4 p-3" >';
            echo $feedback ;
          echo ' </div> ';
        }
          if ( $bFormSubmitted && strlen($feedback) == 0 ){
			$pword = hash('sha256', $password  . $salt);
			
			$sql = "SELECT id, username from `mvn_users` WHERE email=? AND password=? Limit 1 ";
			$stmt = $conn->prepare($sql);
			$stmt->execute([$email1, $password]);
			$numRows= $stmt->rowCount();
		if($numRows === 1) {
			
			$_SESSiON['username']=  $data['username'];
			$_SESSION['uid']=    $data['id'];
			header("Location: dashboard.php");
		}
           
   }

      
?>
        

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        

        <title>Registration</title>
		
        <style>
            #registerbttn{
                margin-left: 100px;
                margin-top:10px;
            }
            #feedback{
                opacity: 0;
            }
        </style>
		</head>
		<body>
		
		<div class="container">
      
        <h2 class="col-12 ml-4 mt-2 mb-2">Register for Mr M's Premium Content</h2>
        
        <div class="col-12">	
            <div class="row">
                <div class="col-12 border ml-4 mt-2 mb-2 text-center p-4">
                    Upgrade your <u>life</u> by accessing these premium educational content including a calculator that will tell you how many years you have been alive!!
                </div>
            </div>
        </div>

        <div class="container ml-4 mt-2 text-center">
            <div class="row">
					<form method="post">
                
                    <div class="input-group p-2">
                        <span class="input-group-text">Password</span>
                        <input type="password" class="form-control" id="password" placeholder="123456" name="password">
                    
                    <div class="input-group p-2">
                        <span class="input-group-text">Email</span>
                        <input type="email" class="form-control" id="email" placeholder="morrisv@harrisoncsd.org" name="email1">
                    </div>
                    
                </div>
				<div class="input-group mb-3  ">
                  <div class="input-group-prepend ">
                  <span class="input-group-text" ><span id="botq"> What is <?php echo $n1; ?> + <?php echo $n2; ?></span> </span>
                  </div>
                  <input class="form-control loginform" name="num1" type="number" id="antibotanswer" value='' placeholder="enter solution"  />
                </div>
				<input name="hash_2" type="hidden" value="<?php echo $nHash; ?>" />
            </div>
          </div>
        <input type="submit" value="button" id="registerbttn" class="btn btn-lg btn-primary">
        <div id="feedback" class="border ml-4 mt-2 mb-2 p-2 bg-danger"></div>
		</div>

      
      </script>
    </body>
</html>