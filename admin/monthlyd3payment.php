<?php
	include "inc/header.php"
?>

<?php
    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
        
        $proofInsert = $ad3->insertProofDetailsForFutureReference($_POST);
    }
?>

<?php
    include "inc/sidebar.php"
?>
    

<div class="page-content">
        <div class="container-default animated fadeInRight"> <br>
            <div class="viewheightWraper" style="min-height:100vh">
                <h3>Monthly D3 Payment For <b style="color:#ff5722"><?php echo date('M') ?></b></h3>
                <div class="container" style="background:#ddd;">
                <?php
                    $getD3Companies = $ad3->getAllD3CompaniesFromDB();

                    if (isset($getD3Companies) && $getD3Companies!=false) {
                        
                        while ($company = $getD3Companies->fetch_assoc()) {
                ?>
                            
                            <div class="card mb-3">
                              <div class="card-header p-3">
                                <h4>Payment Details For <b style="color:#ff5722"><?php echo $company['company']; ?></b></h4>
                              </div>
                              <?php
                                    $cId = $company['companyUid'];
                                    $fee = $company['fee'];
                                    $getTotal = $ad3->getTotalCompanyEarningsOfThisMonth($cId);


                                    if (isset($getTotal) && $getTotal!=false) {
                                        $ans = mysqli_fetch_assoc($getTotal);
                                        $payAmount = ($ans['paid']-(($fee*$ans['total'])/100));
                                        

                                ?>
                              <div class="card-body p-3">
                                  
                                  <p style="opacity:0.5">Earned This Month <span class="float-right"><?php echo $ans['total'].' ৳'; ?></span></p>  
                                  <p>Booking Money In This Month <span class="float-right"><?php echo $ans['paid'].' ৳'; ?></span></p> 
                                  <p class="text-primary">[ EASHO Charge This Month <span class="float-right"><?php echo (($fee*$ans['total'])/100).' ৳ ]'; ?></span></p> 
                                  <hr> 
                                  <h5 style="color:#ff5722">EASHO Have To Pay <span class="float-right"><?php echo ($ans['paid']-(($fee*$ans['total'])/100)).' ৳ '; ?></span></h5> 

                                <?php
                                    $getStat = $ad3->getStatusFromDB($cId);
                                    if (isset($getStat) && $getStat==true) {
                                        echo '<div class="alert alert-success text-primary text-center" role="alert">
                                              <b>PAID</b> This D3 Vendor Has No Due To pay On Current Month!
                                            </div>';
                                    }else{

                                    
                                ?>
                                <form action="" method="POST">
                                  <div class="row">
                                    <div class="col">
                                        <label for="inputPassword2" class="sr-only">Payment Authorizer</label>
                                      <input type="text" class="form-control" placeholder="Payer Name" name="payerName">

                                      <input type="hidden" class="form-control" name="paidAmount" value="<?php echo $payAmount; ?>">
                                      <input type="hidden" class="form-control" name="totalAmount" value="<?php echo $payAmount; ?>">

                                      <input type="hidden" class="form-control" value="<?php echo $cId; ?>" name="paidTo">
                                    </div>

                                    <div class="col">
                                        <label for="inputPassword2" class="sr-only">Payment Proof Token</label>
                                      <input type="text" class="form-control" placeholder="Transection Number" name="proofToken">
                                    </div>
                                    <div class="col">
                                      <button type="submit" class="btn btn-primary mb-2 float-right ml-auto" name="submit">Confirm Payment</button>
                                      
                                    </div>
                                  </div>
                                </form>
                                <?php
                                            }
                                      ?>
                              </div>
                              <?php
                                }else{
                                    echo "You Lose";
                                }
                              ?>
                            </div>
                <?php
                        }
                    }
                ?>
                </div>
            </div>
        </div>
        <div class="row footer">
            <div class="col-md-6 text-left"> Copyright &copy; 2017 Foxlabel All rights reserved. </div>
            <div class="col-md-6 text-right"> Design and Developed by Foxlabel </div>
        </div>
    </div>

<?php
    include "inc/rightbar.php"
?>
    
 

<?php
	include "inc/footer.php"
?>
   