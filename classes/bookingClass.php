<?php
class BookingClass {

    private $db;
    private $fm;

    function __construct() {
        $this->db = new Database();
        $this->fm = new Format();
    }


    public function getAllBookingOrdersFromDB($companyUid){

    	$thisMonth = date('m');

    	$companyUid = $this->fm->validator($companyUid);
        $companyUid = mysqli_real_escape_string($this->db->link, $companyUid);

    	$query = "SELECT * FROM tbl_packorder WHERE companyUid='$companyUid' AND bookVendorStatus=1 AND bookUserStatus=1 AND status!=3 AND status!=2 AND MONTH(orderDateTime)='$thisMonth' ORDER BY bookId DESC";

    	$result = $this->db->select($query);

    	return $result;
    }



    public function getSearchedValueFromDB($companyUid,$searchValue){

        $companyUid = $this->fm->validator($companyUid);
        $companyUid = mysqli_real_escape_string($this->db->link, $companyUid);

        $searchValue = $this->fm->validator($searchValue);
        $searchValue = mysqli_real_escape_string($this->db->link, $searchValue);

        $query = "SELECT * FROM tbl_packorder WHERE companyUid='$companyUid' AND bookVendorStatus=1 AND bookUserStatus=1 AND status!=3 AND bookingUid LIKE '%$searchValue%'";

        $result = $this->db->select($query);

        return $result;
    }


    public function getAllBookingOrdersForajaxFromDB($companyUid){

        $thisYear = date('Y');

        $companyUid = $this->fm->validator($companyUid);
        $companyUid = mysqli_real_escape_string($this->db->link, $companyUid);

        $query = "SELECT * FROM tbl_packorder WHERE companyUid='$companyUid' AND bookVendorStatus=1 AND bookUserStatus=1 AND YEAR(orderDateTime)='$thisYear'";

        $result = $this->db->select($query);

        return $result;
    }


    public function getYearTotalAccountsForD3($companyUid){

        $thisMonth = date('m');
        $thisYear = date('Y');

        $datas = array();

        

        $companyUid = $this->fm->validator($companyUid);
        $companyUid = mysqli_real_escape_string($this->db->link, $companyUid);

        for ($i=1; $i <= 12; $i++) { 
            
            $totalEarn = 0;
            $totalOrder = 0;

            $query = "SELECT SUM(totalAmount) AS totalAmount FROM tbl_packorder WHERE companyUid='$companyUid' AND bookVendorStatus=1 AND bookUserStatus=1 AND status!=2 AND MONTH(orderDateTime)='$i' AND YEAR(orderDateTime)='$thisYear'";

            $result = $this->db->select($query);

            if (isset($result) && $result != false) {

                $res = mysqli_fetch_assoc($result);
                
                if ($res != null) {
                    
                    if ($res['totalAmount'] != null) {
                        
                        $datas[] = (int) $res['totalAmount'];
                    }else{
                        $datas[] = 0;
                    }
                }else{
                     $datas[] = 0;
                }
            }else{
               $datas[] = 0;
            }


            }

            return $datas;
        }




        public function getYearTotalAccountOrderForD3($companyUid){

            $thisYear = date('Y');

            $companyUid = $this->fm->validator($companyUid);
            $companyUid = mysqli_real_escape_string($this->db->link, $companyUid);

            $totalOrder = array();
            for ($i=1; $i <= 12; $i++) { 


            $query = "SELECT * FROM tbl_packorder WHERE companyUid='$companyUid' AND bookVendorStatus=1 AND bookUserStatus=1 AND status!=2 AND MONTH(orderDateTime)='$i' AND YEAR(orderDateTime)='$thisYear'";

            $result = $this->db->select($query);

            if (isset($result) && $result != false) {

                $totalOrder[$i] = mysqli_num_rows($result);
            }else{
               $totalOrder[$i] = 0;
            }

            }
            return $totalOrder;
        }


        public function getAllBookingOrdersFromDB2($companyUid){

        $thisMonth = date('m');

        $companyUid = $this->fm->validator($companyUid);
        $companyUid = mysqli_real_escape_string($this->db->link, $companyUid);

        $query = "SELECT * FROM tbl_packorder WHERE companyUid='$companyUid' AND bookVendorStatus=1 AND bookUserStatus=1 AND status=0 AND MONTH(orderDateTime)='$thisMonth' ORDER BY bookId DESC LIMIT 10";

        $result = $this->db->select($query);

        return $result;
    }


        public function getAllBookingOrdersFromDB3($companyUid){

        $thisMonth = date('m');

        $companyUid = $this->fm->validator($companyUid);
        $companyUid = mysqli_real_escape_string($this->db->link, $companyUid);

        $query = "SELECT * FROM tbl_packorder WHERE companyUid='$companyUid' AND bookVendorStatus=1 AND bookUserStatus=1 AND status=0 AND seen=0 AND MONTH(orderDateTime)='$thisMonth' ORDER BY bookId DESC LIMIT 10";

        $result = $this->db->select($query);

        return $result;
    }


        public function getAllBookingOrdersFromDB2seen($companyUid){

        $thisMonth = date('m');

        $companyUid = $this->fm->validator($companyUid);
        $companyUid = mysqli_real_escape_string($this->db->link, $companyUid);

        $query = "UPDATE tbl_packorder SET seen=1 WHERE companyUid='$companyUid' AND bookVendorStatus=1 AND bookUserStatus=1 AND status=0 AND seen=0 AND MONTH(orderDateTime)='$thisMonth'";

        $result = $this->db->update($query);

        return $result;
    }


        public function getPayConfirmationFromDB2($companyUid){

        $thisMonth = date('m');

        $companyUid = $this->fm->validator($companyUid);
        $companyUid = mysqli_real_escape_string($this->db->link, $companyUid);

        $query = "SELECT * FROM tbl_paycomplete WHERE paidTo='$companyUid' AND status=0 AND confirmed=0 AND MONTH(payDate)='$thisMonth'";

        $result = $this->db->select($query);

        return $result;
    }


        public function getPayConfirmationFromDB3($companyUid){

        $thisMonth = date('m');

        $companyUid = $this->fm->validator($companyUid);
        $companyUid = mysqli_real_escape_string($this->db->link, $companyUid);

        $query = "SELECT * FROM tbl_paycomplete WHERE paidTo='$companyUid' AND status=0 AND confirmed=0 AND MONTH(payDate)='$thisMonth'";

        $result = $this->db->select($query);

        return $result;
    }
    


        public function getvendorPaymentDetails($companyUid){

        $thisMonth = date('m');

        $companyUid = $this->fm->validator($companyUid);
        $companyUid = mysqli_real_escape_string($this->db->link, $companyUid);

        $query = "SELECT * FROM tbl_paycomplete WHERE paidTo='$companyUid' AND status=0 AND confirmed=0 AND MONTH(payDate)='$thisMonth'";

        $result = $this->db->select($query);

        return $result;
    }



    public function updateConfirmationToMakeProofOnVandorPayment($cid){

        $thisMonth = date('m');
        $thisYear = date('Y');

        $cid = $this->fm->validator($cid);
        $cid = mysqli_real_escape_string($this->db->link, $cid);

        $query = "UPDATE tbl_packorder SET status=3 WHERE companyUid='$cid' AND bookVendorStatus=1 AND bookUserStatus=1 AND MONTH(orderDateTime)='$thisMonth' AND YEAR(orderDateTime)='$thisYear'";

        $result = $this->db->update($query);

        if (isset($result) && $result != false) {
            
            $query2 = "UPDATE tbl_paycomplete SET status=1, confirmed=1 WHERE paidTo='$cid' AND YEAR(payDate)='$thisYear' AND MONTH(payDate)='$thisMonth'";

            $result2 = $this->db->update($query2);

            if (isset($result2) && $result2!=false) {
                
                return ture;
            }else{
                return flase;
            }
        }
    }
    

}

?>