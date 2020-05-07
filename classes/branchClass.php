<?php

class AllBranchClass{

	private $db;
	private $fm;
	
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}


	public function insertBranchDetailsIntoDB($post,$files){

		$branchName = $this->fm->validator($post['branchName']);
		$branchName = mysqli_real_escape_string($this->db->link,$branchName);

		$branchEmail = $this->fm->validator($post['branchEmail']);
		$branchEmail = mysqli_real_escape_string($this->db->link,$branchEmail);
		$branchEmail = $this->fm->validateEmail($branchEmail);

		$branchLocation = $this->fm->validator($post['branchLocation']);
		$branchLocation = mysqli_real_escape_string($this->db->link,$branchLocation);

		$branchAddress = $this->fm->validator($post['branchAddress']);
		$branchAddress = mysqli_real_escape_string($this->db->link,$branchAddress);


		$branchlatitude = $this->fm->validator($post['branchlatitude']);
		$branchlatitude = mysqli_real_escape_string($this->db->link,$branchlatitude);

		$branchlongitude = $this->fm->validator($post['branchlongitude']);
		$branchlongitude = mysqli_real_escape_string($this->db->link,$branchlongitude);

		$branchUsername = $this->fm->validator($post['branchUsername']);
		$branchUsername = mysqli_real_escape_string($this->db->link,$branchUsername);

		$branchPassword = $this->fm->validator($post['branchPassword']);
		$branchPassword = mysqli_real_escape_string($this->db->link,$branchPassword);
		$branchPasswordhashed = md5($branchPassword);

		$offerAmount = $this->fm->validator($post['offerAmount']);
		$offerAmount = mysqli_real_escape_string($this->db->link,$offerAmount);

		$BranchTime = $this->fm->validator($post['BranchTime']);
		$BranchTime = mysqli_real_escape_string($this->db->link,$BranchTime);

		$branchOff = $this->fm->validator($post['branchOff']);
		$branchOff = mysqli_real_escape_string($this->db->link,$branchOff);

		$offerTime = $this->fm->validator($post['offerTime']);
		$offerTime = mysqli_real_escape_string($this->db->link,$offerTime);

		$offerStart = $this->fm->validator($post['offerStart']);
		$offerStart = mysqli_real_escape_string($this->db->link,$offerStart);

		$offerEnd = $this->fm->validator($post['offerEnd']);
		$offerEnd = mysqli_real_escape_string($this->db->link,$offerEnd);

		$altText = $this->fm->validator($post['altText']);
		$altText = mysqli_real_escape_string($this->db->link,$altText);

		$branchUid = substr(md5($branchEmail),rand(1,6),rand(8,15));

		$companyUid = Session::get('companyUid');

		$p = $_FILES['files']['size'];
		


		if (empty($branchName) || empty($branchLocation) || empty($branchAddress) || empty($branchlatitude) || empty($branchlongitude) || empty($branchUsername) || empty($branchPassword) || empty($offerAmount) || empty($BranchTime) || empty($branchOff)) {
					
					return '<div class="alert alert-danger" role="alert">
					  Fields Must not be empty !!
					</div>';

		}elseif ($branchEmail==false) {

			return '<div class="alert alert-danger" role="alert">
			  Invalid Email !!
			</div>';

		}elseif ($p[0]==0) {
			
			return '<div class="alert alert-danger" role="alert">
			  Image Must Be Included !!
			</div>';
		}else{

			$query = "INSERT INTO tbl_branch(branchName, branchEmail, branchLocation, branchAddress, branchlatitude, branchlongitude, branchUsername, branchPassword,offerAmount, BranchTime, branchOff, offerTime, offerStart, offerEnd, branchdUid,companyUid) VALUES ('$branchName','$branchEmail','$branchLocation','$branchAddress','$branchlatitude','$branchlongitude','$branchUsername','$branchPasswordhashed','$offerAmount','$BranchTime','$branchOff','$offerTime','$offerStart','$offerEnd','$branchUid','$companyUid')";

			$result = $this->db->insert($query);

			if ($result && $result != false) {
				
				$targetDir = "../uploads/";
			    $allowTypes = array('jpg','png','jpeg','JPG','PNG');

			    if(!empty(array_filter($_FILES['files']['name']))){

			        foreach($_FILES['files']['name'] as $key=>$val){
			            // File upload path
			            $fileName = basename($_FILES['files']['name'][$key]);
			            $targetFilePath = $targetDir . $fileName;
			            
			            // Check whether file type is valid
			            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

			            if(in_array($fileType, $allowTypes)){

			                // Upload file to server
			                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){

			                	$query = "INSERT INTO tbl_branchimg(image,branchUid,imageName) VALUES('$targetFilePath','$branchUid','$altText')";

			                	$result = $this->db->insert($query);

			                	

			                }else{

			                	return '<div class="alert alert-danger" role="alert">
										  Something Went Wrong. image Upload Failed !
										</div>';
			                }

			            }else{
			                return '<div class="alert alert-danger" role="alert">
										  Wrong Format. Action Failed !
										</div>';
			            }
			        }

			        if ($result && $result!=false) {
			                		return 2;
			                	}else{
			                		return 1;
			                	}
				}
			}
		}
	}



	public function getBranchListFromDB(){

		$query = "SELECT * FROM tbl_branch ORDER BY branchId DESC";
		$result = $this->db->select($query);

		return $result;
	}


	public function getBranchImagesFromDB($uid){

		$uid = $this->fm->validator($uid);
		$uid = mysqli_real_escape_string($this->db->link,$uid);

		$query = "SELECT * FROM tbl_branchimg WHERE branchUid='$uid'";

		$result = $this->db->select($query);

		return $result;
	}


	public function getSignleBranchDataFromDB($id){

		$id = $this->fm->validator($id);
		$id = mysqli_real_escape_string($this->db->link,$id);

		$query = "SELECT * FROM tbl_branch WHERE branchId='$id'";

		$result = $this->db->select($query);

		return $result;
	}


	public function getAltTextFromDB($id){

		$id = $this->fm->validator($id);
		$id = mysqli_real_escape_string($this->db->link,$id);

		$query = "SELECT * FROM tbl_branchimg WHERE branchUid='$id' LIMIT 1";

		$result = $this->db->select($query);

		if ($result && $result != false) {
			
			$row = $result->fetch_assoc();

			return $row['imageName'];
		}else{
			return "";
			return '<div class="alert alert-danger" role="alert">
					  Image Name Could not be fetched!!
					</div>';
		}
	}


	public function updateBranchDetailsIntoDB($post,$files,$uid,$id){

		$branchName = $this->fm->validator($post['branchName']);
		$branchName = mysqli_real_escape_string($this->db->link,$branchName);

		$branchEmail = $this->fm->validator($post['branchEmail']);
		$branchEmail = mysqli_real_escape_string($this->db->link,$branchEmail);
		$branchEmail = $this->fm->validateEmail($branchEmail);

		$branchLocation = $this->fm->validator($post['branchLocation']);
		$branchLocation = mysqli_real_escape_string($this->db->link,$branchLocation);

		$branchAddress = $this->fm->validator($post['branchAddress']);
		$branchAddress = mysqli_real_escape_string($this->db->link,$branchAddress);


		$branchlatitude = $this->fm->validator($post['branchlatitude']);
		$branchlatitude = mysqli_real_escape_string($this->db->link,$branchlatitude);

		$branchlongitude = $this->fm->validator($post['branchlongitude']);
		$branchlongitude = mysqli_real_escape_string($this->db->link,$branchlongitude);

		$branchUsername = $this->fm->validator($post['branchUsername']);
		$branchUsername = mysqli_real_escape_string($this->db->link,$branchUsername);

		$branchPassword = $this->fm->validator($post['branchPassword']);
		$branchPassword = mysqli_real_escape_string($this->db->link,$branchPassword);
		$branchPasswordhashed = md5($branchPassword);

		$offerAmount = $this->fm->validator($post['offerAmount']);
		$offerAmount = mysqli_real_escape_string($this->db->link,$offerAmount);

		$BranchTime = $this->fm->validator($post['BranchTime']);
		$BranchTime = mysqli_real_escape_string($this->db->link,$BranchTime);

		$branchOff = $this->fm->validator($post['branchOff']);
		$branchOff = mysqli_real_escape_string($this->db->link,$branchOff);

		$offerTime = $this->fm->validator($post['offerTime']);
		$offerTime = mysqli_real_escape_string($this->db->link,$offerTime);

		$offerStart = $this->fm->validator($post['offerStart']);
		$offerStart = mysqli_real_escape_string($this->db->link,$offerStart);

		$offerEnd = $this->fm->validator($post['offerEnd']);
		$offerEnd = mysqli_real_escape_string($this->db->link,$offerEnd);

		$altText = $this->fm->validator($post['altText']);
		$altText = mysqli_real_escape_string($this->db->link,$altText);

		$uid = $this->fm->validator($uid);
		$uid = mysqli_real_escape_string($this->db->link,$uid);

		$id = $this->fm->validator($id);
		$id = mysqli_real_escape_string($this->db->link,$id);

		$p = $_FILES['files']['size'];

		if (!empty($branchPassword) && $p[0]==0) {
			
			$query = "UPDATE tbl_branch SET 
										branchName = '$branchName',
										branchEmail = '$branchEmail',
										branchLocation = '$branchLocation',
										branchAddress = '$branchAddress',
										branchlatitude = '$branchlatitude',
										branchlongitude = '$branchlongitude',
										branchUsername = '$branchUsername',
										branchPassword = '$branchPasswordhashed',
										offerAmount = '$offerAmount',
										BranchTime = '$BranchTime',
										branchOff = '$branchOff',
										offerTime = '$offerTime',
										offerStart = '$offerStart',
										offerEnd = '$offerEnd' WHERE branchdUid='$uid'";
			$result = $this->db->update($query);

			if ($result != false) {
				
				echo "<script>window.location.href = 'manageBranch.php';</script>";
			}else{
				return '<div class="alert alert-danger" role="alert">
						  Error! Update Failed !
						</div>';
			}

		}elseif (empty($branchPassword) && $p[0] != 0) {

			$query = "UPDATE tbl_branch SET 
										branchName = '$branchName',
										branchEmail = '$branchEmail',
										branchLocation = '$branchLocation',
										branchAddress = '$branchAddress',
										branchlatitude = '$branchlatitude',
										branchlongitude = '$branchlongitude',
										branchUsername = '$branchUsername',
										offerAmount = '$offerAmount',
										BranchTime = '$BranchTime',
										branchOff = '$branchOff',
										offerTime = '$offerTime',
										offerStart = '$offerStart',
										offerEnd = '$offerEnd' WHERE branchdUid='$uid'";
			$result = $this->db->update($query);

			if ($result != false) {
				
				$query = "SELECT * FROM tbl_branchimg WHERE branchUid='$uid'";

				$check1 = $this->db->select($query);

				if ($check1 != false) {
					
					$row = mysqli_num_rows($check1);

					if ($row > 0) {
						
						while ($imgs = $check1->fetch_assoc()) {
							
							$img = $imgs['image'];
							$imgName = chop($img,'../uploads/');
							$unLink = unlink($imgName);														
						}

						$querydel = "DELETE FROM tbl_branchimg WHERE branchUid='$uid'";
						$delete = $this->db->delete($querydel);

						if ($delete != false) {
							
							$targetDir = "../uploads/";
						    $allowTypes = array('jpg','png','jpeg');

						    if(!empty(array_filter($_FILES['files']['name']))){

						        foreach($_FILES['files']['name'] as $key=>$val){
						            // File upload path
						            $fileName = basename($_FILES['files']['name'][$key]);
						            $targetFilePath = $targetDir . $fileName;
						            
						            // Check whether file type is valid
						            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

						            if(in_array($fileType, $allowTypes)){

						                // Upload file to server
						                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){

						                	$query = "INSERT INTO tbl_branchimg(image,branchUid,imageName) VALUES('$targetFilePath','$uid','$altText')";

						                	$resultinsrt = $this->db->insert($query);

						                	

						                }else{

						                	return '<div class="alert alert-danger" role="alert">
													  Something Went Wrong. image Upload Failed !
													</div>';
						                }

						            }else{
						                return '<div class="alert alert-danger" role="alert">
													  Wrong Format. Action Failed !
													</div>';
						            }
						        }

						        if ($resultinsrt && $resultinsrt!=false) {
						                		echo "<script>window.location.href = 'manageBranch.php';</script>";
						                	}else{
						                		return '<div class="alert alert-danger" role="alert">
														  Error!! Update Failed
														</div>';
						                	}
							}else{
									return '<div class="alert alert-danger" role="alert">
											  Image Must Be Included !!
											</div>';
							}
						}else{
							return '<div class="alert alert-danger" role="alert">
									  Error!! Previous Delete Failed!!
									</div>';
						}
					}else{
						return '<div class="alert alert-danger" role="alert">
								  Error!! No Image Found! Update Failed!!
								</div>';
					}
				}else{
					return '<div class="alert alert-danger" role="alert">
							  Error!! No Record Found!!
							</div>';
				}
			}else{
				return '<div class="alert alert-danger" role="alert">
						  Error!! Update Failed !
						</div>';
			}

		}elseif (!empty($branchPassword) && $p[0] != 0) {
			$query = "UPDATE tbl_branch SET 
										branchName = '$branchName',
										branchEmail = '$branchEmail',
										branchLocation = '$branchLocation',
										branchAddress = '$branchAddress',
										branchlatitude = '$branchlatitude',
										branchlongitude = '$branchlongitude',
										branchUsername = '$branchUsername',
										branchPassword = '$branchPasswordhashed',
										offerAmount = '$offerAmount',
										BranchTime = '$BranchTime',
										branchOff = '$branchOff',
										offerTime = '$offerTime',
										offerStart = '$offerStart',
										offerEnd = '$offerEnd' WHERE branchdUid='$uid'";
			$result = $this->db->update($query);

			if ($result != false) {
				
				$query = "SELECT * FROM tbl_branchimg WHERE branchUid='$uid'";

				$check1 = $this->db->select($query);

				if ($check1 != false) {
					
					$row = mysqli_num_rows($check1);

					if ($row > 0) {
						
						while ($imgs = $check1->fetch_assoc()) {
							
							$img = $imgs['image'];
							$imgName = chop($img,'../uploads/');
							$unLink = unlink($imgName);														
						}

						$querydel = "DELETE FROM tbl_branchimg WHERE branchUid='$uid'";
						$delete = $this->db->delete($querydel);

						if ($delete != false) {
							
							$targetDir = "../uploads/";
						    $allowTypes = array('jpg','png','jpeg');

						    if(!empty(array_filter($_FILES['files']['name']))){

						        foreach($_FILES['files']['name'] as $key=>$val){
						            // File upload path
						            $fileName = basename($_FILES['files']['name'][$key]);
						            $targetFilePath = $targetDir . $fileName;
						            
						            // Check whether file type is valid
						            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

						            if(in_array($fileType, $allowTypes)){

						                // Upload file to server
						                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){

						                	$query = "INSERT INTO tbl_branchimg(image,branchUid,imageName) VALUES('$targetFilePath','$uid','$altText')";

						                	$resultinsrt = $this->db->insert($query);

						                	

						                }else{

						                	return '<div class="alert alert-danger" role="alert">
													  Something Went Wrong. image Upload Failed !
													</div>';
						                }

						            }else{
						                return '<div class="alert alert-danger" role="alert">
													  Wrong Format. Action Failed !
													</div>';
						            }
						        }

						        if ($resultinsrt && $resultinsrt!=false) {
						                		echo "<script>window.location.href = 'manageBranch.php';</script>";
						                	}else{
						                		return " 3";
						                		return '<div class="alert alert-danger" role="alert">
														  Error!! Update Failed
														</div>';
						                	}
							}else{
									return '<div class="alert alert-danger" role="alert">
											  Image Must Be Included !!
											</div>';
							}
						}else{
							return "";
							return "<div class='alert alert-danger' role='alert'>
									  Previous Delete Failed!
									</div>";

						}
					}else{
						return "<div class='alert alert-danger' role='alert'>
								  No Image Found! Update Failed!
								</div>";
					}
				}else{
					return "<div class='alert alert-danger' role='alert'>
							  No Record Found.
							</div>";
				}
			}else{
				return "<div class='alert alert-danger' role='alert'>
						  Error!! Update Requst Failed
						</div>";
			}

		}elseif (empty($branchPassword) && $p[0] == 0) {
			
			$query = "UPDATE tbl_branch SET 
										branchName = '$branchName',
										branchEmail = '$branchEmail',
										branchLocation = '$branchLocation',
										branchAddress = '$branchAddress',
										branchlatitude = '$branchlatitude',
										branchlongitude = '$branchlongitude',
										branchUsername = '$branchUsername',
										-- branchPassword = '$branchPasswordhashed',
										offerAmount = '$offerAmount',
										BranchTime = '$BranchTime',
										branchOff = '$branchOff',
										offerTime = '$offerTime',
										offerStart = '$offerStart',
										offerEnd = '$offerEnd' WHERE branchdUid='$uid'";
			$result = $this->db->update($query);

			if ($result != false) {
				
				echo "<script>window.location.href = 'manageBranch.php';</script>";
			}else{
				return "<div class='alert alert-danger' role='alert'>
						  Sorry! Update Requst Failed
						</div>";
			}
		}
	}


	public function deleteBranchFromDB($id,$uid){

		$uid = $this->fm->validator($uid);
		$uid = mysqli_real_escape_string($this->db->link,$uid);

		$id = $this->fm->validator($id);
		$id = mysqli_real_escape_string($this->db->link,$id);

		$query = "SELECT * FROM tbl_branchimg WHERE branchUid='$uid'";

		$check1 = $this->db->select($query);

		if ($check1 != false) {
			
			$row = mysqli_num_rows($check1);

			if ($row > 0) {
				
				while ($imgs = $check1->fetch_assoc()) {
					
					$img = $imgs['image'];
					$imgName = chop($img,'../uploads/');
					$unLink = unlink($imgName);														
				}

				$querydel = "DELETE FROM tbl_branchimg WHERE branchUid='$uid'";
				$delete = $this->db->delete($querydel);

				if ($delete!=false && $delete) {
					
					$query = "DELETE FROM tbl_branch WHERE branchId='$id'";

					$result = $this->db->delete($query);

					if ($result && $result!=false) {
                		echo "<script>window.location.href = 'manageBranch.php';</script>";
                	}else{
                		return "<div class='alert alert-danger' role='alert'>
								  Error! Can't Delete this Branch.
								</div>";
                	}
				}
			}
		}
	}


	public function getCompanyDetailsInBranchFromDB($uid){

		$uid = $this->fm->validator($uid);
		$uid = mysqli_real_escape_string($this->db->link,$uid);

		$query = "SELECT * FROM tbl_company WHERE companyUid='$uid' AND status=0";

		$result = $this->db->select($query);

		return $result;
	}


	public function getCompanySLiderImages($id){

		$id = $this->fm->validator($id);
		$id = mysqli_real_escape_string($this->db->link,$id);

		$query = "SELECT * FROM tbl_comslider WHERE companyUid='$id'";

		$result = $this->db->select($query);

		return $result;
	}

	public function getBranchDetailsFromDB($uid){

		$uid = $this->fm->validator($uid);
		$uid = mysqli_real_escape_string($this->db->link,$uid);

		$query = "SELECT * FROM tbl_branch WHERE branchdUid='$uid'";

		$result = $this->db->select($query);

		return $result;
	}

	
}
?>