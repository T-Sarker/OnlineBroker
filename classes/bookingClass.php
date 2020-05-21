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

    	$query = "SELECT * FROM tbl_packorder WHERE companyUid='$companyUid' AND bookVendorStatus=1 AND bookUserStatus=1 AND status=0 AND MONTH(orderDateTime)='$thisMonth' ORDER BY bookId DESC";

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

            $query = "SELECT SUM(totalAmount) AS totalAmount FROM tbl_packorder WHERE companyUid='$companyUid' AND bookVendorStatus=1 AND bookUserStatus=1 AND status!=2 AND status!=3 AND MONTH(orderDateTime)='$i' AND YEAR(orderDateTime)='$thisYear'";

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


            $query = "SELECT * FROM tbl_packorder WHERE companyUid='$companyUid' AND bookVendorStatus=1 AND bookUserStatus=1 AND status!=2 AND status!=3 AND MONTH(orderDateTime)='$i' AND YEAR(orderDateTime)='$thisYear'";

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
    

}

?>