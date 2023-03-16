<?php
require('includes/db.php') ;
?>
<?php
      $debug = true;
      $recaptchaData = recaptcha();
      $feedback = '';

			function recaptcha():array{
				$n1 = mt_rand(1,20);
				$n2 = mt_rand(1,20);
				$arr = array (
					'n1' => $n1,
					'n2' => $n2,
					'sum' => $n1 + $n2
				);
				return $arr;
			}
      

      function validEmail(string $email1): bool{
    $email1 = trim($email1);
    if (strlen($email1) < 5) {
        return false;
    }
    $atAt = strpos($email1, '@');
    $dotAt = strpos($email1, '.');
    if (false === $dotAt) {
        return false;
    }
    if (false === $atAt) {
        return false;
    }
    if ($dotAt > $atAt) {
        return false;
    }
    return true;
}
      
      $bFormSubmitted = isset($_GET['email1']);
      if ($bFormSubmitted === true) {
        $bValidEmail = validEmail($_GET['email1']);
      if (false === $bValidEmail) {
        $feedback .= $_GET['email1'] . 'is invalid';
    }
}

      function validUsername(string $username): bool{
        $username = trim($username);
        if (strlen($username) < 5)
          return false;
        return true;
      }
      $bFormSubmitted = isset($_GET['username']);
      if ($bFormSubmitted === true)
      {
        $bValidUsername = validUsername($_GET['username']);
        if (false === $bValidUsername)
          $feedback .= $_GET['username'] . ' is not valid';
        
      }

      function validPassword(string $password): bool{
        $password = trim($password);
        if (strlen($password) < 5)
          return false;
        $doll = strpos($password, '$');
        $aster = strpos($password, '*');
        if (false === $doll)
          return false;
        if (false === $aster)
          return false;
        return true;
      }
      $bFormSubmitted = isset($_GET['password']);
      if ($bFormSubmitted === true)
      {
        $bValidPassword = validPassword($_GET['password']);
        if (false === $bValidPassword)
          $feedback .= $_GET['password'] . ' is not valid';
      }

        function validAge(int $age): bool {
    if ($age >= 18) {
        return true;
    } else {
        return false;
    }
}
    $bFormSubmitted = isset($_GET['age']);
if ($bFormSubmitted === true) {
    $bValidAge = validAge((int)$_GET['age']);
    if (false === $bValidAge) {
        $feedback .= $_GET['age'] . ' is not valid, You should be 18 or older';
    }
}
 if( $bFormSubmitted && strlen($feedback) > 0 ){
          echo '<div class="bg-danger text-white mt-4 p-3" >';
            echo $feedback ;
          echo ' </div> ';
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
                <div class="col-8 border">
					<form method="get" action="regform">
                    <div class="input-group p-2">
                        <span class="input-group-text">username</span>
                        <input name="username" type="text" class="form-control" id="username" placeholder="morrisv">
                    </div>
                    <div class="input-group p-2">
                        <span class="input-group-text">age</span>
                        <input type="number" class="form-control" id="age" placeholder="90" name="age">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col border ">
                    <div class="input-group p-2">
                        <span class="input-group-text">Password</span>
                        <input type="password" class="form-control" id="password" placeholder="123456" name="password">
                    </div>
                    <div class="input-group p-2">
                        <span class="input-group-text">Email</span>
                        <input type="email" class="form-control" id="email" placeholder="morrisv@harrisoncsd.org" name="email1">
                    </div>
                    
                </div>
				<div class="input-group mb-3  ">
                  <div class="input-group-prepend ">
                  <span class="input-group-text" ><span id="botq"> What is <?php echo recaptcha()['n1']; ?> + <?php echo recaptcha()['n2']; ?></span> </span>
                  </div>
                  <input class="form-control loginform" type="number" id="antibotanswer" value='' placeholder="enter solution"  />
                </div>
				<input type="hidden" value="<?php echo recaptcha()['sum']; ?>" />
            </div>
          </div>
        <input type="submit" value="button" id="registerbttn" class="btn btn-lg btn-primary">
        <div id="feedback" class="border ml-4 mt-2 mb-2 p-2 bg-danger"></div>
		</div>
		
      
    </body>
</html>