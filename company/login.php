<?php   
    include "../lib/session.php";
    Session::checkLogin();
?>

<?php include '../config/config.php'; ?>
<?php include '../lib/database.php'; ?>
<?php include '../helpers/formats.php'; ?>
<?php include '../classes/companyLogin.php'; ?>

<?php
  $al = new CompanyLogin();
  if ($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['signin'])) {

    $email = $_POST['email'];

    $typeLogin = $_POST['typeLogin'];

    $pass = $_POST['password'];

    if (!empty($_POST['remember'])) {
        
        $remember = $_POST['remember'];
    }else{
        $remember = "";
    }
     

    $isLogedIn = $al->companyAdminlogin($email,$pass,$typeLogin,$remember);
  }
    

?>

<!DOCTYPE html>
<html class="h-100" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin | Login</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.html">
    <link href="css/style.css" rel="stylesheet">
    
</head>

<body class="h-100">
 
    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="index-2.html"> <h4>Broker</h4></a>
        
                                <form class="mt-5 mb-5 login-input" action="" method="POST">
                                    <?php
                                        if (isset($isLogedIn)) {
                                            echo $isLogedIn;
                                        }
                                    ?>
                                    <div class="form-group">
                                        <!-- <label for="exampleFormControlSelect1">Example select</label> -->
                                        <select class="form-control" id="exampleFormControlSelect1" required name="typeLogin">
                                          <option disabled selected>Choose..</option>
                                          <option value="company">Company</option>
                                          <option value="branch">Branch</option>
                                        </select>
                                      </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                    <div class="form-check mt-3 mb-4">
                                        <input type="checkbox" class="form-check-input" style="border:none;box-shadow: none;" name="remember" value="remember-me" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                                    </div>
                                    <button class="btn login-form__btn submit w-100" type="submit" name="signin">Sign In</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    

    <!--**********************************
        Scripts
    ***********************************-->
</body>
</html>





