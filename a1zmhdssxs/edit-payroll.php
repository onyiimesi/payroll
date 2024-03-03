<?php include "includes/header.php"; ?>

  <?php include "includes/nav.php"; ?>


  <?php 
      
    if(!isset($_GET['edit']) || $_GET['edit'] == null){
        echo "<script>window.location = 'edit-product'; </script> ";
      }else{
        $edit = $_GET['edit'];
    }
    
    
  ?>

  <?php 

   if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editpayroll'])){

      $editpayroll = $acct->editPayroll($_POST, $edit);
   }

  ?>


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Payroll</h1>
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
<!--               <div class="card-header">
                <h5>edit Employee</h5>
              </div> -->
              <!-- /.card-header -->
              <!-- form start -->
              <?php 

                $getPay = $acct->getEmployeePayroll($edit);
                  if($getPay){
                      foreach($getPay as $results){

                        $salary = $results['salary'];
                    
              ?>
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <?php  

                    if (isset($editpayroll)) {
                      echo $editpayroll;
                    }

                    $rawdate = htmlentities($results['payroll_month']);
                    $month = date('F Y', strtotime($rawdate));

                    echo $month;
                  ?>

                  <div class="row">
                    <div class="col-md-3">
                      <div class="">
                        <label for="">Payroll Month</label>
                        <input type="month" class="form-control" name="payroll_month" value="<?=$month?>">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="">
                        <label for="">Session</label>
                        <input type="text" class="form-control" name="payroll_session" value="<?=$results['payroll_session']?>">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="mb-4">
                        <label for="">School</label>
                        <input type="text" class="form-control" name="school" readonly value="<?=$results['school']?>">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="">
                        <!-- <label for="">Email</label> -->
                        <input type="hidden" readonly class="form-control" name="email" value="<?=$results['email']?>">
                      </div>
                    </div>

                  </div><hr>

                
                  <button type="submit" name="editpayroll" class="btn btn-primary">Edit</button>
                </div>
              </form>
              <?php } } ?>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>







<?php include "includes/footer.php"; ?>