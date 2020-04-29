

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
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $emailErr = "Invalid email format";
		  return $emailErr;
		}
		elseif (empty($email) || empty($pass) || empty($typeLogin)) {

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
				
				
				$query = "SELECT * FROM tbl_branch WHERE branchEmail='$email'";
				$result = $this->db->select($query);
				
				if (isset($result) && $result != false) {
					
					$row = $result->fetch_assoc();
					$companyId = $row['companyUid'];

					$query1 = "SELECT status FROM tbl_company WHERE companyUid='$companyId'";
					$result1 = $this->db->select($query1);
					if ($result1 != false) {
						
						$row = $result1->fetch_assoc();
						$status = $row['status'];

						if ($status==0) {
							
							$query2 = "SELECT * FROM tbl_branch WHERE branchEmail='$email' AND branchPassword='$pass'";

							$result2 = $this->db->select($query2);

							if ($result2 != false && mysqli_num_rows($result) ==1) {
								
								$value = $result2->fetch_assoc();
								// redireting the Admin user to dashboard
								Session::set('branchLogin','true');
								Session::set('companyUid',$value['companyUid']);
								Session::set('branchUid',$value['branchdUid']);
								Session::set('branch',$value['branchName']);
								Session::set('userName',$value['branchUsername']);

								if (!empty($remember) && !isset($_COOKIE["branchUid"])) {
									setcookie("branchUid", $value['branchdUid'], time()+600);
								}
								return "<script>window.location.href = '../branch/index.php';</script>";
							}else{

								return '<div class="alert alert-danger" role="alert">
										  Error! Wrong Information !
										</div>';
							}
						}else{

							return '<div class="alert alert-danger" role="alert">
										  Error! Account is Deactive!
										</div>';
						}
					}else{

						return '<div class="alert alert-danger" role="alert">
										  Error! Wrong Information !
										</div>';
					}
				}else{

					return '<div class="alert alert-danger" role="alert">
										  Error! Wrong Information !
										</div>';
				}
			}else{

				return "<script>window.location.href = '../404.php';</script>";
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