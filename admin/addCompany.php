<?php
    include "inc/header.php"
?>

<?php include '../classes/companyClass.php' ?>

<?php
    $ac = new AllCompany();
    
    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
        
        $insertCompany = $ac->insertCompanyDetailsIntoDB($_POST,$_FILES);
    }
?>


<?php
    include "inc/sidebar.php"
?>
<div class="page-content">
    <div class="container-default animated fadeInRight"> <br>
        <div class="viewheightWraper" style="min-height:100vh">
            <h3>Register A Company</h3>
            <?php
                if (isset($insertCompany)) {
                    
                    echo $insertCompany;
                }
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <label for="category">Category:</label>
                        <select class="form-control" name="category" id="category" required>
                          <option value="" selected disabled>Choose</option>
                          <?php
                                $getCategory = $ac->getCategoryFromDB();

                                if (isset($getCategory) && $getCategory != false) {
                                    
                                    while ($cate = $getCategory->fetch_assoc()) {
                                        
                          ?>
                          <option style="padding:5px; margin-bottom:4px;" value="<?php echo $cate['cateUid'] ?>"><?php echo $cate['category'] ?></option>
                          <?php

                                    }
                                }
                          ?>
                        </select>
                    </div>

                    <div class="col">
                        <label for="category">Type:</label>
                        <select class="form-control" name="acType" id="category" required>
                          <option value="" selected disabled>Choose</option>
                          
                          <option style="padding:5px; margin-bottom:4px;" value="d2">D2</option>
                          <option style="padding:5px; margin-bottom:4px;" value="d3">D3</option>
                          
                        </select>
                    </div>
                    
                    
                </div><br>

                <div class="row">
                    <div class="col">
                        <label for="company">Company Name:</label>
                        <input type="text" class="form-control" id="company" name="company" value="<?php if(isset($_POST["company"])) echo $_POST["company"]; ?>" placeholder="Company Name" required>
                    </div>
                    <div class="col">
                        <label for="companyFee">Company Fee:</label>
                        <input type="number" min="1" max="100" class="form-control" id="companyFee" name="companyFee" value="<?php if(isset($_POST["companyFee"])) echo $_POST["companyFee"]; ?>" required>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col">
                        <label for="owner">Company Owner:</label>
                        <input type="text" class="form-control" id="owner" name="owner" value="<?php if(isset($_POST["owner"])) echo $_POST["owner"]; ?>" placeholder="Owner Name" required>
                    </div>
                    <div class="col">
                      <label for="address">Company Address:</label>
                      <input type="text" class="form-control" id="address" name="address" value="<?php if(isset($_POST["address"])) echo $_POST["address"]; ?>" placeholder="Company Address" required>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col">
                        <label for="latitude">Latitude:</label>
                        <input type="text" class="form-control" id="latitude" name="latitude" value="<?php if(isset($_POST["latitude"])) echo $_POST["latitude"]; ?>" placeholder="latitude" required>
                    </div>
                    <div class="col">
                      <label for="longitude">Longitude:</label>
                      <input type="text" class="form-control" name="longitude" value="<?php if(isset($_POST["longitude"])) echo $_POST["longitude"]; ?>" id="longitude" placeholder="longitude" required>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col">
                        <label for="location">Company Location:</label>
                        <input type="text" class="form-control" id="location" name="location" value="<?php if(isset($_POST["location"])) echo $_POST["location"]; ?>" placeholder="Location" required>
                    </div>
                    <div class="col">
                      <label for="email">Company Email:</label>
                      <input type="email" class="form-control" name="email" value="<?php if(isset($_POST["email"])) echo $_POST["email"]; ?>" id="email" placeholder="Company Email" required>
                    </div>
                </div><br>

                <div class="row">

                    <div class="col">
                      <label for="phone">Company Phone:</label>
                      <input type="tel" class="form-control" name="phone" value="<?php if(isset($_POST["phone"])) echo $_POST["phone"]; ?>" id="phone" placeholder="Phone No" required>
                    </div>

                    <div class="col">
                      <label for="date">Register Date:</label>
                      <input type="date" class="form-control" name="joindate" value="<?php echo date('Y-m-d'); ?>" id="date" placeholder="Company Email">
                    </div>
                    
                </div><br>

                <div class="row">
                    <div class="col">
                        <label for="password">Company Password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="col">
                      <label for="logo">Company Logo:</label>
                      <input type="file" class="form-control" name="myfile"  id="logo">
                    </div>
                    
                </div><br>
                <button type="submit" name="submit" class="btn btn-success">Submit</button>
            </form>
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