<?php   
    include "../lib/session.php";
    Session::checkLogin();
?>
<?php

	include '../config/config.php';
	include "../lib/database.php";
	include "../helpers/formats.php";
	include '../classes/alld2classes.php';
?>

<?php
	$bc = new AdminD2Class();
?>

<?php
  
    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['cid'])) {
            
            $cid = $_POST['cid'];
            
            $getSingleCompany = $bc->getASingleCompanyFromDB($cid);

            if (isset($getSingleCompany) && $getSingleCompany!=false) {
              
                while ($company = $getSingleCompany->fetch_assoc()) {
                  
?>
                      <div class="head">
                        <div class="media">
                          <img src="<?php echo $company['image'] ?>" class="mr-3" alt="company-logo" style="width:100px;">
                          <div class="media-body">
                            <h5 class="mt-0"><?php echo $company['company'] ?></h5>
                            <p><span class="mr-3"><?php echo '<b>Owner: </b>'.$company['owner']."  \t"; ?></span><span><?php echo "\t ".'<b>Id: </b>'.$company['companyUid']; ?></span></p>

                            <p>Email: <?php echo $company['email'] ?></p>
                            <p>Phone: <?php echo $company['phone'] ?></p>
                          </div>
                        </div>
                      </div>


                      <br>
                      <hr>
                      <div class="modalBody">
                      <p>  <?php
                            $companyUid = $company['companyUid'];
                            $getPaidProof = $bc->getPaidProofD2FromDB($cid);

                            if (isset($getPaidProof) && $getPaidProof!= false) {
                              
                                foreach ($getPaidProof as $key => $value) {
                                    
                                    echo "<span class='btn btn-warning'>".$key.'[ '.$value." ৳ ]</span>";
                                }
                            }

                        ?></p>


                        <br>
                        <hr>

                        <?php

                            $totalPayment = $bc->getJustTotalAmountOfThisMonth($cid);
                            $getMonthHandPay = $bc->getJustTotalAmountByHandOfThisMonth($cid);
                            $getMonthOnlinePay = $bc->getJustTotalAmountByOnlineOfThisMonth($cid);
                            $lastMonthDue = $bc->getLastMonthDueFromDB($cid);
                        ?>

                        <h5>This Month Payment Due</h5>
                        <?php
                            if ($totalPayment>0) {
                              
                        ?>
                        <table class="table">
                            <tbody>
                              <tr>
                                <td>Total Earned On <?php echo date('M'); ?> <span class="float-right"><?php echo $totalPayment>0? $totalPayment.' ৳':'0'.' ৳'; ?></span></td>
                              </tr>
                              <tr>
                                <td>Company % <span class="float-right"><?php echo $company['fee'].'%'; ?></span></td>
                              </tr>
                              <tr>
                                <td>Total Earned On Handcash <span class="float-right"><?php echo $getMonthHandPay>0? $getMonthHandPay.' ৳':'0'.' ৳'; ?></span></td>
                              </tr>
                              <tr>
                                <td>Total Earned On Online <span class="float-right"><?php echo $getMonthOnlinePay>0? $getMonthOnlinePay.' ৳':'0'.' ৳'; ?></span></td>
                              </tr>
                              <tr style="border-top:2px solid;">
                                <td>Last Month Due <span class="float-right"><?php echo $lastMonthDue>0? $lastMonthDue.' ৳':'0'.' ৳'; ?></span></td>
                                
                              </tr>
                              <tr>
                                <?php
                                    if (($totalPayment*($company['fee']/100)) > $getMonthOnlinePay) {

                                      $due = ($totalPayment*($company['fee']/100))-$getMonthOnlinePay;
                                      
                                ?>
                                <td>This Month pay to EASHO <span class="float-right"><?php echo $getMonthOnlinePay>0? $due.' ৳':'0'.' ৳'; ?></span></td>

                                <tr>

                                <td>Company Will Pay To EASHO <span class="float-right"><?php echo $due+$lastMonthDue.' ৳'; ?></span></td>
                              </tr>
                                
                                <?php

                                    }else{
                                      $due = $getMonthOnlinePay-($totalPayment*($company['fee']/100));
                                ?>
                                <td style="color:red">EASHO will pay to Company  <span class="float-right"><?php echo $getMonthOnlinePay>0? $due.' ৳':'0'.' ৳'; ?></span></td>

                                <?php

                                    }
                                ?>
                              </tr>
                              
                            </tbody>
                          </table>
                      </div>

<?php
                    
                    }else{
                      echo "Nothing To Show";
                    }
                }
            }

        }

?>

            