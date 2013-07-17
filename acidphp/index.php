<?php

include 'global.php';

if (isset($_SESSION['NAME']) && isset($_SESSION['USER']))
{
	header("Location: home.php");
}

$error = '';

if (isset($_POST['name']) && isset($_POST['password']))
{
	$username = mysql_real_escape_string($_POST['name']);
    $password = mysql_real_escape_string($_POST['password']);
	
	if (($result = Core::$users->tryLogin($username, $password)) === true)
	{
		header("Location: home.php");
	}
	else
	{
		$error = $result;
	}
}

?>

<link href="styles/bootstrap/css/bootstrap.css" media="all" type="text/css" rel="stylesheet">  
<link href="styles/bootstrap/css/bootstrap.min.css" media="all" type="text/css" rel="stylesheet">   
<link href="styles/bootstrap/css/bootstrap-responsive.css" media="all" type="text/css" rel="stylesheet">  
<link href="styles/bootstrap/css/bootstrap-responsive.min.css" media="all" type="text/css" rel="stylesheet">  
<link href="styles/bootstrap/css/bootstrap-login.css" media="all" type="text/css" rel="stylesheet">  
 
<script src="styles/bootstrap/js/bootstrap.js"></script>
<script src="styles/bootstrap/js/bootstrap.min.js"></script>
<script src="styles/bootstrap/js/jquery.js"></script>

<body>

    <div class="container">
	

      <form class="form-signin" method="post">
	  	<?php
	
	if ($error != '')
	{
		echo '<p class="text-error">' . $error . '</p>';
	}
	
	?>
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" class="input-block-level" placeholder="Email address" name="name">
        <input type="password" class="input-block-level" placeholder="Password" name="password">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-large btn-primary" type="submit">Sign in</button>
		<a class="btn btn-large btn-primary" href="register.php">New here?</a>
      </form>

    </div>

  </body>