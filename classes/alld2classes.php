<?php

class AdminD2Class{

	private $db;
	private $fm;
		
	function __construct(){
			# connecting db and formats
			$this->db = new Database();
			$this->fm = new Format();
	}


	public function getAllCompanyFromDBForD2(){

		$query = "SELECT * FROM tbl_company WHERE acType='d2' AND status=0";

		$result = $this->db->select($query);

		return $result;
	}


	public function getJustTotalAmountOfThisMonth($cid){

		$month = date('m');
		$year = date('Y');

		$cid = $this->fm->validator($cid);
		$cid = mysqli_real_escape_string($this->db->link,$cid);

		$query = "SELECT SUM(totalAmount) AS total FROM tbl_order WHERE companyUid='$cid' AND status=1 AND MONTH(orderDate)='$month' AND YEAR(orderDate)='$year'"; 

		$result = $this->db->select($query);

		if (isset($result) && $result != false) {
			
			$row = mysqli_fetch_assoc($result);

			if ($row['total'] > 0) {
				
				return $row['total'];

			}else{

				return 0;
			}
		}else{

			return false;
		}

	}



	public function getASingleCompanyFromDB($cid){

		$cid = $this->fm->validator($cid);
		$cid = mysqli_real_escape_string($this->db->link,$cid);

		$query = "SELECT * FROM tbl_company WHERE companyUid='$cid' AND status=0";

		$result = $this->db->select($query);


		return $result;
	}


	public function getPaidProofD2FromDB($cid){

		$cid = $this->fm->validator($cid);
		$cid = mysqli_real_escape_string($this->db->link,$cid);

		$paidMonth = array();

		$query = "SELECT * FROM tbl_b2pay WHERE companyUid='$cid'";

		$result = $this->db->select($query);

		if (isset($result) && $result!=false) {

			while ($row = $result->fetch_assoc()) {
			
				$paidMonth[$row['paidMonth']] = $row['paidAmount'];
			}
		}else{
			echo "<span class='alert alert-danger'>No Payment Done Yet</span>";
		}

		return $paidMonth;
	}


	public function getJustTotalAmountByHandOfThisMonth($cid){

		$month = date('m');
		$year = date('Y');

		$cid = $this->fm->validator($cid);
		$cid = mysqli_real_escape_string($this->db->link,$cid);

		$query = "SELECT SUM(totalAmount) AS total FROM tbl_order WHERE companyUid='$cid' AND status=1 AND orderMethod=1 AND MONTH(orderDate)='$month' AND YEAR(orderDate)='$year'"; 

		$result = $this->db->select($query);

		if (isset($result) && $result != false) {
			
			$row = mysqli_fetch_assoc($result);

			if ($row['total'] > 0) {
				
				return $row['total'];

			}else{

				return 0;
			}
		}else{

			return false;
		}

	}


	public function getJustTotalAmountByOnlineOfThisMonth($cid){

		$month = date('m');
		$year = date('Y');

		$cid = $this->fm->validator($cid);
		$cid = mysqli_real_escape_string($this->db->link,$cid);

		$query = "SELECT SUM(totalAmount) AS total FROM tbl_order WHERE companyUid='$cid' AND status=1 AND orderMethod=2 AND MONTH(orderDate)='$month' AND YEAR(orderDate)='$year'"; 

		$result = $this->db->select($query);

		if (isset($result) && $result != false) {
			
			$row = mysqli_fetch_assoc($result);

			if ($row['total'] > 0) {
				
				return $row['total'];

			}else{

				return 0;
			}
		}else{

			return false;
		}

	}


	public function getLastMonthDueFromDB($cid){

		$month = date('m');
		$preMonth = $month-1;
		$year = date('Y');

		$cid = $this->fm->validator($cid);
		$cid = mysqli_real_escape_string($this->db->link,$cid);

		$query = "SELECT * FROM tbl_b2pay WHERE companyUid='$cid' AND MONTH(PaidDate)='$preMonth' AND YEAR(PaidDate)='$year'";

		$result = $this->db->select($query);

		if (isset($result) && $result!=false) {
			
			$row = mysqli_fetch_assoc($result);

			return $row['due'];
		}else{
			return 0;
		}
	}



	public function insertD2ProofIntoDB($month,$proof,$companyName,$cid,$totalAmount,$paidAmount,$fee,$onlinePaid){

		$month = $this->fm->validator($month);
		$month = mysqli_real_escape_string($this->db->link,$month);

		$curMonth = date('m');

		$proof = $this->fm->validator($proof);
		$proof = mysqli_real_escape_string($this->db->link,$proof);

		$companyName = $this->fm->validator($companyName);
		$companyName = mysqli_real_escape_string($this->db->link,$companyName);

		$totalAmount = $this->fm->validator($totalAmount);
		$totalAmount = mysqli_real_escape_string($this->db->link,$totalAmount);

		echo $paidAmount = $this->fm->validator($paidAmount);
		$paidAmount = mysqli_real_escape_string($this->db->link,$paidAmount);

		$onlinePaid = $this->fm->validator($onlinePaid);
		$onlinePaid = mysqli_real_escape_string($this->db->link,$onlinePaid);

		$cid = $this->fm->validator($cid);
		$cid = mysqli_real_escape_string($this->db->link,$cid);

		$fee = $this->fm->validator($fee);
		$fee = mysqli_real_escape_string($this->db->link,$fee);

		echo $paidDate = date('Y-m-d h:m');

		$check = (int)((int)$totalAmount*($fee/100));

		if (empty($month) && empty($proof) && empty($paidAmount)) {
			
			return "<span class='alert alert-danger'>Fill Input Field Correctly!</span>";
		}

		if ($check<$onlinePaid) {
			
			echo $due = $paidAmount-($onlinePaid-$check);

			$query = "INSERT INTO tbl_b2pay(paidBy,paidTo,paidAmount,due,paidMonth,totalAmount,PaidDate,paidProof,companyUid) VALUES('EASHO','$companyName','$paidAmount','$due','$month','$totalAmount','$paidDate','$proof','$cid')";

			$result = $this->db->insert($query);

			if ($result!=false && isset($result)) {
				
				$query = "UPDATE tbl_order SET status=2 WHERE companyUid='$cid' AND MONTH(orderDate)='$curMonth' AND status=1";
				$result = $this->db->update($query);

				if (isset($result) && $result!=false) {
					
					// echo "<script>window.location.href = 'payDetailsd2.php';</script>";
				}else{

					echo "Something Wrong";
				}
			}else{
				echo "Something Wrong";
			}

		}else{

			echo $due = $paidAmount-($check-$onlinePaid);
			$query = "INSERT INTO tbl_b2pay(paidBy,paidTo,paidAmount,due,paidMonth,totalAmount,PaidDate,paidProof,companyUid) VALUES('$companyName','EASHO','$paidAmount','$due','$month','$totalAmount','$paidDate','$proof','$cid')";

			$result = $this->db->insert($query);

			if ($result!=false && isset($result)) {
				
				$query = "UPDATE tbl_order SET status=2 WHERE companyUid='$cid' AND MONTH(orderDate)='$curMonth' AND status=1";
				$result = $this->db->update($query);

				if (isset($result) && $result!=false) {
					
					// echo "<script>window.location.href = 'payDetailsd2.php';</script>";
				}else{

					echo "Something Wrong";
				}
			}else{
				echo "Something Wrong";
			}
		}
	}


	public function checkProofForThisCompany($cid){

		$month = date('M'); 
		$year = date('Y');


		$cid = $this->fm->validator($cid);
		$cid = mysqli_real_escape_string($this->db->link,$cid);


		$query = "SELECT * FROM tbl_b2pay WHERE companyUid='$cid' AND paidMonth='$month' AND YEAR(PaidDate)='$year'";

		$result = $this->db->select($query);


		if (isset($result) && $result!=false) {
			
			if (mysqli_num_rows($result) > 0) {
				
				return true;
			}else{
				return false;
			}
		}else{

			return false;
		}
	}


	public function getYearDetailsFromDBOnCompany($companyUid){

		$month = date('m'); 
		$year = date('Y');

		$earnTotal = array();


		$companyUid = $this->fm->validator($companyUid);
		$companyUid = mysqli_real_escape_string($this->db->link,$companyUid);

		for ($i=1; $i <= 12; $i++) { 
			
			$query = "SELECT SUM(totalAmount) AS total FROM tbl_order WHERE companyUid='$companyUid' AND MONTH(orderDate)='$i' AND YEAR(orderDate)='$year' AND status!=0";

			$result = $this->db->select($query);

			if (isset($result) && $result!=false) {
				
				$row = mysqli_fetch_assoc($result);

				if ($row['total'] >0) {
					
					$earnTotal[$i] = $row['total'];
				}else{

					$earnTotal[$i] = 0;
				}
			}else{

				$earnTotal[$i] = 'lol';
			}


		}

		return $earnTotal;
	}

}
?>