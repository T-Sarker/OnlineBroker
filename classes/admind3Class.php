
<?php

class AdminD3Class{

	private $db;
	private $fm;
		
	function __construct(){
			# connecting db and formats
			$this->db = new Database();
			$this->fm = new Format();
	}


	public function getAllCurrentBookingRequest(){

		$query = "SELECT * FROM tbl_packorder WHERE bookVendorStatus=0 AND bookUserStatus=0";

		$result = $this->db->select($query);

		return $result;
	}


	public function getThisCompanyName($cid){

		$cid = $this->fm->validator($cid);
		$cid =mysqli_real_escape_string($this->db->link,$cid);

		$query = "SELECT company FROM tbl_company WHERE companyUid='$cid' AND status=0";
		$result = $this->db->select($query);

		return $result;

	}


	public function getThisBranchName($bid){

		$bid = $this->fm->validator($bid);
		$bid =mysqli_real_escape_string($this->db->link,$bid);

		$query = "SELECT branchName FROM tbl_branch WHERE branchdUid='$bid'";
		$result = $this->db->select($query);

		return $result;

	}


	public function getThisBookingDataFromDB($id){

		$id = $this->fm->validator($id);
		$id =mysqli_real_escape_string($this->db->link,$id);

		$query = "SELECT * FROM tbl_packorder WHERE bookVendorStatus=0 AND bookUserStatus=0 AND bookId='$id'";
		$result = $this->db->select($query);

		return $result;
	}


	public function getThisBookingDataFromDBForAdmin($id){

		$id = $this->fm->validator($id);
		$id =mysqli_real_escape_string($this->db->link,$id);

		$query = "SELECT * FROM tbl_packorder WHERE bookVendorStatus!=0 AND bookUserStatus!=0 AND bookId='$id'";
		$result = $this->db->select($query);

		return $result;
	}



	public function updateBookingParameterOnAccept($bid,$pamount){

		$bid = $this->fm->validator($bid);
		$bid =mysqli_real_escape_string($this->db->link,$bid);

		$pamount = $this->fm->validator($pamount);
		$pamount =mysqli_real_escape_string($this->db->link,$pamount);

		$query = "UPDATE tbl_packorder SET bookVendorStatus=1,bookUserStatus=1,paidAmount='$pamount' WHERE bookingUid='$bid'";

		$result = $this->db->update($query);

		if (isset($result) && $result != false) {
			
			echo "<script>window.location.href = 'currentd3Order.php';</script>";
		}else{

			echo "<span class='alert alert-danger'>Booking Update Failed!</span>";
		}
	}


	public function getUpdateBookingDataFromDB($bid){

		$bid = $this->fm->validator($bid);
		$bid =mysqli_real_escape_string($this->db->link,$bid);

		$query = "UPDATE tbl_packorder SET bookVendorStatus=2,bookUserStatus=2,paidAmount=0,status=2 WHERE bookId='$bid'";

		$result = $this->db->update($query);

		if (isset($result) && $result != false) {
			
			return "<script>window.location.href = 'currentd3Order.php';</script>";
		}else{

			return "<span class='alert alert-danger'>Booking Update Failed!</span>";
		}
	}


	public function getAllBookingRequestFromDB(){

		$month = date('m');
		$year = date('Y');

		$query = "SELECT * FROM tbl_packorder WHERE bookVendorStatus!=0 AND bookUserStatus!=0 AND MONTH(orderDateTime)='$month' AND YEAR(orderDateTime)='2020' ORDER BY bookId DESC";

		$result = $this->db->select($query);

		return $result;
	}



	public function getFilterValueOfAllBookingRequestUnpaid($checkValue){
		
		$year = date('Y');

		$checkValue = $this->fm->validator($checkValue);
		$checkValue =mysqli_real_escape_string($this->db->link,$checkValue);

		$query = "SELECT * FROM tbl_packorder WHERE YEAR(orderDateTime)='2020' AND bookVendorStatus=1 AND bookUserStatus=1 AND status=0";

		$result = $this->db->select($query);
		return $result;
	}


	public function getFilterValueOfAllBookingRequestCancled($checkValue){
		
		$year = date('Y');

		$checkValue = $this->fm->validator($checkValue);
		$checkValue =mysqli_real_escape_string($this->db->link,$checkValue);

		$query = "SELECT * FROM tbl_packorder WHERE YEAR(orderDateTime)='2020' AND bookVendorStatus=2 AND bookUserStatus=2 AND status=2";

		$result = $this->db->select($query);
		return $result;
	}


	public function getFilterValueOfAllBookingRequestPaid($checkValue){
		
		$year = date('Y');

		$checkValue = $this->fm->validator($checkValue);
		$checkValue =mysqli_real_escape_string($this->db->link,$checkValue);

		$query = "SELECT * FROM tbl_packorder WHERE YEAR(orderDateTime)='2020' AND bookVendorStatus=1 AND bookUserStatus=1 AND status=3";

		$result = $this->db->select($query);
		return $result;
	}


	public function getFilterValueOfAllBookingRequestOnSearch($checkValue){

		$year = date('Y');

		$checkValue = $this->fm->validator($checkValue);
		$checkValue =mysqli_real_escape_string($this->db->link,$checkValue);

		$query = "SELECT * FROM tbl_packorder WHERE YEAR(orderDateTime)='2020' AND bookVendorStatus=1 AND bookUserStatus=1 AND bookingUid LIKE '%$checkValue%'";

		$result = $this->db->select($query);
		return $result;
	}



	public function getAllD3CompaniesFromDB(){

		$query = "SELECT * FROM tbl_company WHERE acType='d3' ORDER BY companyId";

		$result = $this->db->select($query);

		return $result;
	}


	public function getTotalCompanyEarningsOfThisMonth($cId){

		$year = date('Y');
		$month = date('m');

		$cId = $this->fm->validator($cId);
		$cId =mysqli_real_escape_string($this->db->link,$cId);

		$query = "SELECT SUM(totalAmount) AS total,SUM(paidAmount) AS paid FROM tbl_packorder WHERE bookVendorStatus=1 AND bookUserStatus=1 AND status=0 AND YEAR(orderDateTime)='$year' AND MONTH(orderDateTime)='$month' AND companyUid='$cId'";

		$result = $this->db->select($query);

		return $result;
	}



	public function insertProofDetailsForFutureReference($post){

		$year = date('Y');
		$month = date('m');

		$payerName = $this->fm->validator($post['payerName']);
        $payerName = mysqli_real_escape_string($this->db->link, $payerName);

		$paidAmount = $this->fm->validator($post['paidAmount']);
        $paidAmount = mysqli_real_escape_string($this->db->link, $paidAmount);

		$paidTo = $this->fm->validator($post['paidTo']);
        $paidTo = mysqli_real_escape_string($this->db->link, $paidTo);

		$proofToken = $this->fm->validator($post['proofToken']);
        $proofToken = mysqli_real_escape_string($this->db->link, $proofToken);

        $today = date("Y-m-d h:i:s");

        if (empty($payerName) && empty($proofToken)) {
        	return '<div class="alert alert-danger" role="alert">
                                      Fill The Input Field Carefully!
                                    </div>';
        }else{

        	$query = "INSERT INTO tbl_paycomplete(payerName,transactionNo,paidAmount,paidTo,payDate,status,confirmed) VALUES('$payerName','$proofToken','$paidAmount','$paidTo','$today',0,0)";

        	$result = $this->db->insert($query);

        	if (isset($result) && $result != false) {
        		
        		$query = "UPDATE tbl_packorder SET status=1 WHERE bookVendorStatus=1 AND bookUserStatus=1 AND companyUid='$paidTo' AND YEAR(orderDateTime)='$year' AND MONTH(orderDateTime)='$month'";

        		$result = $this->db->update($query);

        		if (isset($result) && $result!=false) {

        			return "<script>window.location.href = 'monthlyd3payment.phpp';</script>";
				}else{

					return "<span class='alert alert-danger'>Booking Update Failed!</span>";
				}
        	}
        }
	}


	public function getStatusFromDB($cId){

		$month = date('m');

		$cId = $this->fm->validator($cId);
		$cId =mysqli_real_escape_string($this->db->link,$cId);

		$query = "SELECT * FROM tbl_paycomplete WHERE paidTo='$cId' AND MONTH(payDate)='$month'";

		$result = $this->db->select($query);

		if (isset($result) && $result!=false) {
			
			$row = mysqli_num_rows($result);

			if (isset($row) && $row > 0) {
				
				return true;
			}else{
				return false;
			}
		}
	}


	public function getPaymentRecordsDataFromDB($cid){

		$year = date('Y');

		$records = array();

		$cid = $this->fm->validator($cid);
		$cid =mysqli_real_escape_string($this->db->link,$cid);

			
		$query = "SELECT * FROM tbl_paycomplete WHERE paidTo='$cid' AND YEAR(payDate)='$year'";

		$result = $this->db->select($query);

		return $result;
 
		
	}



}
?>