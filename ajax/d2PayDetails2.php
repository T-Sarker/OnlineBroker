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
  $months = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July ', 'August', 'September', 'October', 'November', 'December', );
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
                      <h3>Payment Made</h3>
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

                        <h5>This Year Payment Record</h5>
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">Month</th>
                              <th scope="col">Earned</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php

                              $getyearDetails = $bc->getYearDetailsFromDBOnCompany($companyUid);

                              if (isset($getyearDetails) && $getyearDetails!=false) {
                                  
                                  for ($i=1; $i < 12; $i++) { 
                                      

                          ?>
                            <tr>
                              <td><?php echo $months[$i] ?></td>
                              <td><?php echo $getyearDetails[$i].' ৳' ?></td>
                            </tr>
                            <?php

                                  }
                              }
                            ?>
                          </tbody>
                        </table>
                      </div>

<?php
                    
                }
            }

        }

?>

            