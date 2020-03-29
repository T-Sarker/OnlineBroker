<?php include '../classes/adminDetails.php'; ?>

<?php
  $al = new AdminLogin();
  if ($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $pin = $_POST['pin'];
    $remember = $_POST['remember'];

    echo $isLogedIn = $al->adminlogin($email,$pass,$pin,$remember);
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
<title>Login</title>

<link href="assets/css/root.css" rel="stylesheet">
<style type="text/css">
        body {
            background-image: url('https://cdna.artstation.com/p/assets/images/images/006/891/216/original/vlx-ocs-cctv.gif?1502043953');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body>
	<div class="middle-box text-center loginscreen animated fadeInDown">
		<div>
			<h3 style="color:#fff;font-weight:300;">Welcome to Online Broker</h3>
			<h5 style="color:#fff;font-weight:800;">Login in</h5>
			<form class="m-t" action="" method="POST">
				<div class="form-group">
					<input type="email" class="form-control" style="border-radius: 40px 40px 40px;" name="email" placeholder="Email" required>
				</div>
				<div class="form-group">
					<input type="password" class="form-control" style="border-radius: 40px 40px 40px;" name="password" placeholder="Password" required>
				</div>
				<div class="form-group">
					<input type="password" class="form-control" style="border-radius: 40px 40px 40px;" name="pin" placeholder="Pin " required>
				</div>
				<div class="form-check">
				    <input type="checkbox" class="form-check-input" style="border:none;box-shadow: none;" name="remember" value="remember-me" id="exampleCheck1">
				    <label class="form-check-label" for="exampleCheck1" style="color:#fff">Remember Me</label>
				  </div>
					<button type="submit" class="btn btn-primary block full-width m-b" name="login">Login</button>
				<br>
			</form>
		</div>
	</div>
	<p class="m-t text-center mt-5" style="color:#fff;">Techdynobd &copy; 2020</p>
</body>
</html>