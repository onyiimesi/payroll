<?php include "includes/header.php"; ?>

  <?php include "includes/nav.php"; ?>

  <?php
    
    $acct = new Account();
                
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['change'])){

        $changePass = $acct->changePass($_POST);
    }

  ?>


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Change Password</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  


    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <!-- /.card-header -->
              <!-- form start -->
              
              
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <?php 
                            
                      if(isset($changePass)){
                          echo $changePass;
                      }
                    
                    ?>
                    <form action="" method="post">
                      <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Current Password</label>
                            <input type="password" class="form-control" name="cpass" placeholder="Enter Current Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">New Password</label>
                            <input type="password" class="form-control" name="npass" placeholder="Enter New Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Confirm Password</label>
                            <input type="password" class="form-control" name="copass" placeholder="Confirm Password">
                        </div>
                      </div>

                      <button type="submit" name="change" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>







<?php include "includes/footer.php"; ?>