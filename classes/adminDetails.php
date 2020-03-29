<?php
	include "../lib/session.php";
	Session::checkLogin();
	include '../config/config.php';
	include "../lib/database.php";
	include "../helpers/formats.php";
?>

<?php

class AdminLogin{

		private $db;
		private $fm;
		
		function __construct()
		{
			# connecting db and formats
			$this->db = new Database();
			$this->fm = new Format();
		}

	public function adminlogin($email,$pass,$pin,$remember){
		
		$email = $this->fm->validator($email);
		$pass = $this->fm->validator($pass);
		$pin = $this->fm->validator($pin);
		$remember = $this->fm->validator($remember);

		$email= mysqli_real_escape_string($this->db->link,$email);

		$pass= mysqli_real_escape_string($this->db->link,$pass);
		$pass = md5($pass);  

		$pin= mysqli_real_escape_string($this->db->link,$pin); 

		if (empty($email) || empty($pass) || empty($pin)) {

			$showError = "Fields can not be empty!";

			return $showError;
		}
		else{

			$query = "SELECT * FROM tbl_admin WHERE adminEmail='$email' AND adminPass='$pass' AND adminPin='$pin'";

			$result = $this->db->select($query);

			if ($result!=false) {
				 // getting values from db and if the result is not false set the sessions
				$value = $result->fetch_assoc();
				// redireting the Admin user to dashboard
				Session::set('Alogin','true');
				Session::set('Aname',$value['adminName']);
				Session::set('Aemail',$value['adminEmail']);

				if (!empty($remember) && !isset($_COOKIE["email"])) {
					setcookie("email", $value['adminEmail'], time()+600);
				}
				return "<script>window.location.href = 'index.php';</script>";

			}
			else {

				$showError = "Username or password is wrong!";

				return $showError;
			}

		}


	}


	public function adminRegister($fname,$lname,$email,$pass,$pin,$files){


		move_uploaded_file($files['proImage']['tmp_name'],'uploads/'.$files['proImage']['name']);

		$orgfiles = 'uploads/'.$files['proImage']['name'];

		$newimage = imagecreatefromjpeg($orgfiles);

		list($width,$height) = getimagesize($orgfiles);

		$newwidth = 100;
		$newheight = 100;

		$thumb = 'uploads/bla'.$files['proImage']['name'];

		$truecolor = imagecreatetruecolor($newwidth,$newheight);



		imagecopyresampled($truecolor,$newimage,0,0,0,0,$newwidth,$newheight,$width,$height);

		imagejpeg($truecolor,$thumb,100);
		unlink($orgfiles);
	}
}

?>