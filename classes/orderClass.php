<?php

class AllOrderClass{

	private $db;
	private $fm;
	
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}


	public function getFeeOnCompany($comId){

		$comId = $this->fm->validator($comId);
		$comId = mysqli_real_escape_string($this->db->link,$comId);

		$query = "SELECT fee FROM tbl_company WHERE companyUid='$comId' AND status=0";

		$result = $this->db->select($query);

		$rows = mysqli_fetch_assoc($result);

		$fee = $rows['fee'];

		return $fee;
	}


	public function getAllOrderListFromDB($id,$cid){

		$id = $this->fm->validator($id);
		$id = mysqli_real_escape_string($this->db->link,$id);

		$cid = $this->fm->validator($cid);
		$cid = mysqli_real_escape_string($this->db->link,$cid);

		$query = "SELECT * FROM tbl_order WHERE status=0 AND orderMethod!=0 AND branchUid='$id' AND companyUid='$cid'";

		$result = $this->db->select($query);

		return $result;
	}


	public function getBranchName($buid){

		$buid = $this->fm->validator($buid);
		$buid = mysqli_real_escape_string($this->db->link,$buid);

		$query = "SELECT branchName,offerAmount,companyUid FROM tbl_branch WHERE branchdUid='$buid'";

		$result = $this->db->select($query);

		return $result;
	}

	public function updateOrderStatusToConfirm($id,$bid,$cid,$Uname){

		$id = $this->fm->validator($id);
		$id = mysqli_real_escape_string($this->db->link,$id);

		$bid = $this->fm->validator($bid);
		$bid = mysqli_real_escape_string($this->db->link,$bid);
		
		$cid = $this->fm->validator($cid);
		$cid = mysqli_real_escape_string($this->db->link,$cid);

		$Uname = $this->fm->validator($Uname);
		$Uname = mysqli_real_escape_string($this->db->link,$Uname);

		$query = "UPDATE tbl_order SET authorizer='$Uname', status=1 WHERE branchUid='$bid' AND companyUid='$cid' AND orderId='$id'";

		$result = $this->db->update($query);

		return $result;


	}

	public function getNotificationFromDB($id,$cid){

		$id = $this->fm->validator($id);
		$id = mysqli_real_escape_string($this->db->link,$id);

		$cid = $this->fm->validator($cid);
		$cid = mysqli_real_escape_string($this->db->link,$cid);

		$query = "SELECT * FROM tbl_order WHERE branchUid='$id' AND companyUid='$cid' AND status=0 AND seen=0";

		$result = $this->db->select($query);

		return $result;
	}

	public function getNotificationNumberFromDB($id,$cid){

		$id = $this->fm->validator($id);
		$id = mysqli_real_escape_string($this->db->link,$id);

		$cid = $this->fm->validator($cid);
		$cid = mysqli_real_escape_string($this->db->link,$cid);

		$query = "SELECT * FROM tbl_order WHERE branchUid='$id' AND companyUid='$cid' AND status=0 AND seen=0";

		$result = $this->db->select($query);

		if (isset($result) && $result != false) {
			
			$row = mysqli_num_rows($result);

			if ($row >0 ) {
				
				return $row;
			}else{
				return 0;
			}
		}else{
			return "0";
		}
	}



	public function getAllAcceptedToken($bid,$cid){

		$bid = $this->fm->validator($bid);
		$bid = mysqli_real_escape_string($this->db->link,$bid);
		
		$cid = $this->fm->validator($cid);
		$cid = mysqli_real_escape_string($this->db->link,$cid);

		$query = "SELECT * FROM tbl_order WHERE branchUid='$bid' AND companyUid='$cid' AND status=1";

		$result = $this->db->select($query);

		return $result;

	}



	public function getTokenSuggestionFromDB($id,$cid,$token){

		$id = $this->fm->validator($id);
		$id = mysqli_real_escape_string($this->db->link,$id);
		
		$cid = $this->fm->validator($cid);
		$cid = mysqli_real_escape_string($this->db->link,$cid);
		
		$token = $this->fm->validator($token);
		$token = mysqli_real_escape_string($this->db->link,$token);

		$query = "SELECT * FROM tbl_order WHERE branchUid='$id' AND companyUid='$cid' AND orderNumber LIKE '%$token%'";

		$result = $this->db->select($query);

		return $result;

	}



	public function getTokenSuggestionFromDBForD3Branch($id,$cid,$token){

		$year = date('Y');

		$id = $this->fm->validator($id);
		$id = mysqli_real_escape_string($this->db->link,$id);
		
		$cid = $this->fm->validator($cid);
		$cid = mysqli_real_escape_string($this->db->link,$cid);
		
		$token = $this->fm->validator($token);
		$token = mysqli_real_escape_string($this->db->link,$token);

		$query = "SELECT * FROM tbl_packorder WHERE companyUid='$cid' AND branchUid='$id' AND YEAR(orderDateTime)='$year' AND bookingUid LIKE '%$token%'";

		$result = $this->db->select($query);

		return $result;

	}



	public function getAllTokenFromDB($id,$cid){

		$id = $this->fm->validator($id);
		$id = mysqli_real_escape_string($this->db->link,$id);
		
		$cid = $this->fm->validator($cid);
		$cid = mysqli_real_escape_string($this->db->link,$cid);

		$query = "SELECT * FROM tbl_order WHERE branchUid='$id' AND companyUid='$cid' AND status=1 ORDER BY orderId DESC";

		$result = $this->db->select($query);

		return $result;

	}



	public function getTotalOrderCount($id,$cid){

		$orderDate = Date('Y-m-d');

		$id = $this->fm->validator($id);
		$id = mysqli_real_escape_string($this->db->link,$id);
		
		$cid = $this->fm->validator($cid);
		$cid = mysqli_real_escape_string($this->db->link,$cid);

		$query = "SELECT * FROM tbl_order WHERE branchUid='$id' AND companyUid='$cid' AND status=1 AND orderDate='$orderDate'";

		$res = $this->db->select($query);

		if (isset($res) && $res != false) {
			$result = mysqli_num_rows($res);

			if ($result != false) {
				return $result;
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}

	public function getDailyReportFromDB($id,$cid){

		$orderDate = Date('Y-m-d');

		$id = $this->fm->validator($id);
		$id = mysqli_real_escape_string($this->db->link,$id);
		
		$cid = $this->fm->validator($cid);
		$cid = mysqli_real_escape_string($this->db->link,$cid);

		$query = "SELECT * FROM tbl_order WHERE branchUid='$id' AND companyUid='$cid' AND status=1 AND orderDate='$orderDate'";

		$res = $this->db->select($query);

		return $res;
	}


	public function getMonthlyTotalOrderCount($id,$cid){

		$values = array();

		$orderMonth = Date('m');
		$orderYear = Date('Y');

		$id = $this->fm->validator($id);
		$id = mysqli_real_escape_string($this->db->link,$id);
		
		$cid = $this->fm->validator($cid);
		$cid = mysqli_real_escape_string($this->db->link,$cid);

		for ($i=1; $i <= 12 ; $i++) { 
			
			$query = "SELECT * FROM tbl_order WHERE branchUid='$id' AND companyUid='$cid' AND status=1 AND YEAR(orderDate)='$orderYear' AND MONTH(orderDate)='$i'";

			$res = $this->db->select($query);

			if ($res!=false) {
				
					$values[] = mysqli_num_rows($res);
			}else{
				$values[] = 0;
			}
		}


		return $values;
	}



	public function getMonthlyReportFromDB($id,$cid){

		$orderMonth = Date('m');

		$id = $this->fm->validator($id);
		$id = mysqli_real_escape_string($this->db->link,$id);
		
		$cid = $this->fm->validator($cid);
		$cid = mysqli_real_escape_string($this->db->link,$cid);

		$query = "SELECT * FROM tbl_order WHERE branchUid='$id' AND companyUid='$cid' AND status=1 AND MONTH(orderDate)='$orderMonth'";

		$res = $this->db->select($query);

		return $res;
	}



	public function getCompanyTotalOrderCount($cid){

		$orderDate = Date('Y-m-d');
		
		$cid = $this->fm->validator($cid);
		$cid = mysqli_real_escape_string($this->db->link,$cid);

		$query = "SELECT * FROM tbl_order WHERE companyUid='$cid' AND status=1 AND orderDate='$orderDate'";

		$res = $this->db->select($query);

		if (isset($res) && $res != false) {
			$result = mysqli_num_rows($res);

			if ($result != false) {
				return $result;
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}


	public function getCompanyDailyReportFromDB($cid){

		$orderDate = Date('Y-m-d');
		
		$cid = $this->fm->validator($cid);
		$cid = mysqli_real_escape_string($this->db->link,$cid);

		$query = "SELECT * FROM tbl_order WHERE companyUid='$cid' AND status=1 AND orderDate='$orderDate'";

		$res = $this->db->select($query);

		return $res;
	}


	public function getCompanyMonthlyTotalOrderCount($cid){

		$values = array();

		$orderMonth = Date('m');
		$orderYear = Date('Y');

		$cid = $this->fm->validator($cid);
		$cid = mysqli_real_escape_string($this->db->link,$cid);

		$query1 ="SELECT * FROM tbl_branch WHERE companyUid='$cid'";

		$result1 = $this->db->select($query1);

		if ($result1!=false && isset($result1)) {
			
			while ($branch = $result1->fetch_assoc()) {
				
				$branchUid = $branch['branchdUid'];
				$branch = $branch['branchName'];

				$data = 0;

				for ($i=1; $i <= 12 ; $i++) { 
			
					$query = "SELECT * FROM tbl_order WHERE branchUid='$branchUid' AND companyUid='$cid' AND status=1 AND YEAR(orderDate)='$orderYear' AND MONTH(orderDate)='$i'";

					$res = $this->db->select($query);

					if ($res!=false) {
						
						$data+=mysqli_num_rows($res);
					}else{
						$data+=0;
					}
				}

				$values[$branch] = $data;
			}
		}

		


		return $values;
	}



	public function getCompanyMonthlyTotalOrderCountOfAllBranch($cid){

		$values = array();

		$orderMonth = Date('m');
		$orderYear = Date('Y');

		$cid = $this->fm->validator($cid);
		$cid = mysqli_real_escape_string($this->db->link,$cid);

		$query1 ="SELECT * FROM tbl_branch WHERE companyUid='$cid'";

		$result1 = $this->db->select($query1);

		if ($result1!=false && isset($result1)) {
			
			while ($branch = $result1->fetch_assoc()) {

				$branchUid = $branch['branchdUid'];
				$branch = $branch['branchName'];

				$query = "SELECT SUM(totalAmount) AS Gtotal FROM tbl_order WHERE branchUid='$branchUid' AND companyUid='$cid' AND status=1 AND YEAR(orderDate)='$orderYear' AND MONTH(orderDate)='$orderMonth'";

				$res = $this->db->select($query); 
				if ($res != false && $res !=NULL) {
					
					$result = mysqli_fetch_assoc($res);
					if ($result != NULL) {
						
						if ($result['Gtotal'] != NULL) {
							
							$values[$branch] = $result['Gtotal'];
						}else{

							$values[$branch]=0;
						}

					}else{
						
						$values[$branch]=0;
					}

				}else{
					$values[$branch]=0;
				}
			}

			return $values;
		}else{
			return false;
		}
	}



	public function getAllOnlyDetailsofOrderForD3Branch($bid,$cid){

		$month = date('m');
		$year = date('Y');

		$bid = $this->fm->validator($bid);
		$bid = mysqli_real_escape_string($this->db->link,$bid);

		$cid = $this->fm->validator($cid);
		$cid = mysqli_real_escape_string($this->db->link,$cid);


		$query = "SELECT * FROM tbl_packorder WHERE companyUid='$cid' AND branchUid='$bid' AND YEAR(orderDateTime)='$year' AND MONTH(orderDateTime)='$month' ORDER BY bookId DESC";

		$result = $this->db->select($query);

		return $result;
	}



	public function getAllAcceptedTokenForD3Branch($bid,$cid){

		$year = date('Y');

		$bid = $this->fm->validator($bid);
		$bid = mysqli_real_escape_string($this->db->link,$bid);

		$cid = $this->fm->validator($cid);
		$cid = mysqli_real_escape_string($this->db->link,$cid);


		$query = "SELECT * FROM tbl_packorder WHERE companyUid='$cid' AND branchUid='$bid' AND YEAR(orderDateTime)='$year' ORDER BY bookId DESC";

		$result = $this->db->select($query);

		return $result;
	}


	public function getAllCurrentMonthlyEarningsFromdbD2($companyUid){

		$month = date('m');
		$year = date('Y');

		$companyUid = $this->fm->validator($companyUid);
		$companyUid = mysqli_real_escape_string($this->db->link,$companyUid);

		$query = "SELECT SUM(totalAmount) AS monthEarn FROM tbl_order WHERE companyUid='$companyUid' AND status=1 AND totalAmount!='' AND authorizer!='' AND orderMethod!='' AND MONTH(orderDate)='$month' AND YEAR(orderDate)='$year'";

		$result = $this->db->select($query);

		return $result;
	}


	public function getAllCurrentYearlyEarningsFromdbD2($companyUid){

		$month = date('m');
		$year = date('Y');

		$amountArray = array();

		$companyUid = $this->fm->validator($companyUid);
		$companyUid = mysqli_real_escape_string($this->db->link,$companyUid);

		for ($i=0; $i < 12; $i++) { 
			
			$query = "SELECT SUM(totalAmount) AS monthEarn FROM tbl_order WHERE companyUid='$companyUid' AND status!=0 AND totalAmount!='' AND authorizer!='' AND orderMethod!='' AND MONTH(orderDate)='$i' AND YEAR(orderDate)='$year'";

			$result = $this->db->select($query);

			if (isset($result) && $result!=false) {

				$rows = mysqli_fetch_assoc($result);
				
				if (!empty($rows['monthEarn'])) {
					
					$amountArray[$i] = $rows['monthEarn'];

				}else{

					$amountArray[$i] = 0;

				}
				
 			}else{
 				$amountArray[$i]='0';
 			}
		}

		return $amountArray;

		
	}




	public function getAllCurrentYearlyEASHOEarningsFromdbD2($companyUid){

		$year = date('Y');

		$flagArray = array();

		$companyUid = $this->fm->validator($companyUid);
		$companyUid = mysqli_real_escape_string($this->db->link,$companyUid);

		for ($i=0; $i < 12; $i++) { 
			
			$query = "SELECT * FROM tbl_order WHERE companyUid='$companyUid' AND status=2 AND totalAmount!='' AND authorizer!='' AND orderMethod!='' AND MONTH(orderDate)='$i' AND YEAR(orderDate)='$year'";

			$result = $this->db->select($query);

			if (isset($result) && $result!=false) {

				if (mysqli_num_rows($result)) {
					
					if (mysqli_num_rows($result) > 0) {
						
						$flagArray[$i] = 1; 
					}else{

						$flagArray[$i] = 0; 

					}
				}
							
 			}else{
 				$flagArray[$i]='0';
 			}
		}

		return $flagArray;

		
	}



	public function getAllPayConfirmationFromDB($cid){

		$year = date('Y');

		$cid = $this->fm->validator($cid);
		$cid = mysqli_real_escape_string($this->db->link,$cid);

		$query = "SELECT * FROM tbl_b2pay WHERE companyUid='$cid' AND YEAR(PaidDate)='$year'";

		$result = $this->db->select($query);

		return $result;



	}


}
?>