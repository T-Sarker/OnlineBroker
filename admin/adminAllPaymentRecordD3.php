<?php
	include "inc/header.php"
?>

<?php
    include "inc/sidebar.php"
?>
    
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="width:500px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="showDetailsProof">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<div class="page-content">
        <div class="container-default animated fadeInRight"> <br>
            <div class="viewheightWraper" style="min-height:100vh">

            <h3>ALL Detailed PAYMENT RECORDS</h3>
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Logo</th>
                      <th scope="col">Company</th>
                      <th scope="col">Owner</th>
                      <th scope="col">Joined</th>
                      <th scope="col">Type</th>
                      <th scope="col">Handle</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                        $getRecord = $ad3->getAllD3CompaniesFromDB();

                        if (isset($getRecord) && $getRecord!=false) {
                            $x=1;
                            while ($record = $getRecord->fetch_assoc()) {
                                
                  ?>
                    <tr>
                      <th scope="row"><?php echo $x++; ?></th>
                      <td> <img src="<?php echo $record['image']; ?>" alt="image" style="width:100px"> </td>
                      <td><?php echo $record['company']; ?></td>
                      <td><?php echo $record['owner']; ?></td>
                      <td><?php echo $record['joinDate']; ?></td>
                      <td><?php echo $record['acType']; ?></td>
                      <td><a href=""class="btn btn-primary recordCheck" data-toggle="modal" data-target=".bd-example-modal-lg" id="<?php echo $record['companyUid']; ?>">
                          Yearly Payment Check
                        </a></td>
                    </tr>
                    <?php

                            }
                        }else{

                            echo "<span class='alert alert-danger'>No Recodr For D3</span>";
                        }
                    ?>
                  </tbody>
                </table>
                
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
   