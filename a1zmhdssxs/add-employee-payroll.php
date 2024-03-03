<?php include "includes/header.php"; ?>

  <?php include "includes/nav.php"; ?>

  <?php 
        
      if(isset($_GET['add'])){

        $add = $_GET['add'];
        
      }
    
  ?>



  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Employee Payroll</h1>
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

              <?php 
            
                if(isset($payroll)){
                  echo $payroll;
                }

              ?>
              <div class="card-body">
                <?php 

                  if (isset($_SESSION['message'])) {
                  
                    $msg = $_SESSION['message'];

                    unset($_SESSION['message']);

                    echo $msg;

                  }

                ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Full Name</th>
                    <th>Email Address</th>
                    <th>Phone Number</th>
                    <th>Position</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $getPro = $acct->getEmployees();

                    

                    if($getPro){
                      $i = 0;
                      foreach ($getPro as $results) {
                        $i++;

                        $getPay = $acct->getEmployeePayroll($results['staff_id']);

                        if($getPay){
                          $i = 0;
                          foreach ($getPay as $resultss) {
                            $status = $resultss['status'];

                            $dates = $resultss['payroll_month'];

                            $date = date('Y-m-d', strtotime($dates));

                            $month = date('Y-m', strtotime($dates));

                            $emails = $resultss['email'];
                          }
                        }

                        $status = isset($status) ? $status: '';
                        $month = isset($month) ? $month: '';
                        $emails = isset($emails) ? $emails: '';
                        $date = date('Y-m');
     
                  ?>
                  <tr>
                    <td><?= $results['surname'] ?> <?= $results['firstname'] ?></td>
                    <td><?= $results['email'] ?></td>
                    <td><?= $results['phone'] ?></td>
                    <td><?= $results['designation'] ?></td>
                    <td>
                      <?php if($month == $date && $emails == $results['email']): ?>
                      <button disabled class="btn btn-success">Added</button>
                    <?php else: ?>
                      <a href="add-payroll?add=<?=$results['staff_id']?>" target="_blank" class="btn btn-success">Add</a>
                    <?php endif; ?>
                    </td>
                  </tr>
                  <?php } } ?>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>







<?php include "includes/footer.php"; ?>