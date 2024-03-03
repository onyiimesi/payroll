<?php include "includes/header.php"; ?>

  <?php include "includes/nav.php"; ?>

  <?php 
      
    if(!isset($_GET['staffid']) || $_GET['staffid'] == null){
        echo "<script>window.location = 'edit-product'; </script> ";
      }else{
        $id = $_GET['staffid'];
    }
    
    
  ?>


  <?php 


    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['rentedit'])){

      $rentedit = $acct->rentEdit($_POST, $id);
    }

  ?>


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Rent</h1>
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
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5>Edit Rent</h5>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <div class="card-body">
                <?php
                        
                  if(isset($rentedit)){
                    echo $rentedit;
                  }
                  
                ?>

                <?php 

                  $getPro = $acct->getRentDeductID($id);
                    if($getPro){
                        foreach($getPro as $results){
                      
                ?>

                <form action="" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-10">
                        
                      <div class="mb-3">
                        <label for="">Full Name</label>
                        <input type="text" class="form-control" readonly value="<?=$results['fullname']; ?>">
                      </div>

                      <div class="mb-3">
                        <label for="">Amount</label>
                        <input type="text" class="form-control" name="amount" value="<?=$results['amount']; ?>">
                      </div>

                      <div>
                        <button type="submit" name="rentedit" class="btn btn-success">Edit</button>
                      </div>
                    </div>
                  </div>
                </form><hr>
                <?php } } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>




<?php include "includes/footer.php"; ?>