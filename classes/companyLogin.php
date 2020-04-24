

<?php

class CompanyLogin{

		private $db;
		private $fm;
		
		function __construct()
		{
			# connecting db and formats
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function companyAdminlogin($email,$pass,$typeLogin,$remember){
		
		$email = $this->fm->validator($email);
		$pass = $this->fm->validator($pass);
		$typeLogin = $this->fm->validator($typeLogin);
		$remember = $this->fm->validator($remember);

		$email= mysqli_real_escape_string($this->db->link,$email);

		$pass= mysqli_real_escape_string($this->db->link,$pass);
		$pass = md5($pass);  

		// $pin= mysqli_real_escape_string($this->db->link,$pin); 

		if (empty($email) || empty($pass) || empty($typeLogin)) {

			$showError = "Fields can not be empty!";

			return $showError;
		}
		else{

			if ($typeLogin=='company') {
				
				$query = "SELECT * FROM tbl_company WHERE email='$email' AND password='$pass' AND status=0";

				$result = $this->db->select($query);

				if ($result!=false && mysqli_num_rows($result)==1) {
					 // getting values from db and if the result is not false set the sessions
					$value = $result->fetch_assoc();
					// redireting the Admin user to dashboard
					Session::set('CompanyLogin','true');
					Session::set('company',$value['company']);
					Session::set('companyUid',$value['companyUid']);

					if (!empty($remember) && !isset($_COOKIE["email"])) {
						setcookie("companyId", $value['companyUid'], time()+600);
					}
					return "<script>window.location.href = 'index.php';</script>";

				}
				else {

					$showError = "Username or password is wrong!";

					return $showError;
				}
			}elseif ($typeLogin=='branch') {
				
				echo "<script>alert('branch Login')</script>";
			}

		}


	}



	public function getLogedInUsersDetail($id){

		$id = $this->fm->validator($id);

		$query = "SELECT * FROM tbl_company WHERE companyUid='$id'";

		$result = $this->db->select($query);

		if (isset($result) && $result!= false) {
			
			return $result;
		}else{
			return false;
		}
	}

	}
?>