<?php include "includes/header.php"; ?>

  <?php include "includes/nav.php"; ?>

  <?php 

   if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['send'])){

      $send = $acct->sendPayroll($_POST);
   }

  ?>

  <?php 
        
    if(isset($_GET['edit'])){

      $edit = $_GET['edit'];
      
    }
    
  ?>


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Payroll</h1>
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
              <div class="card-header">
                <div class="float-left">
                  <a href="/a1zmhdssxs/add-employee-payroll"><button class="btn btn-success">Add Employee to Payroll</button></a>
                </div>

                <div class="float-right">
                  <!-- <form action="">
                    <div class="row">
                      <div class="col-md-8">
                        <input type="month" name="search" value="" class="form-control">
                      </div>

                      <div class="col-md-4">
                        <button type="submit" class="btn btn-success">Go</button>
                      </div>
                    </div>
                  </form> -->
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body table-responsive">

                <?php 

                  if(isset($send)){
                    echo $send;
                  }

                ?>
                
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Surname</th>
                    <th>Firstname</th>
                    <th>Designation</th>
                    <th>Month</th>
                    <th>Gross Pay</th>
                    <th>Allowance</th>
                    <th>Leave Bonus</th>
                    <th>Pension By Staff</th>
                    <th>Tax</th>
                    <th>Total Deduction</th>
                    <th>Net Pay</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $getPro = $acct->getPayroll();

                    if($getPro){
                      $i = 0;
                      foreach ($getPro as $results) {
                        $i++;

                        $dates = $results['payroll_month'];

                        $date = date('Y-m-d', strtotime($dates));

                        $month = date('M, Y', strtotime($dates));

                        $loan = $results['loan'];
                        $fees = $results['fees'];
                        $rent = $results['rent'];
                        $upfront = $results['upfront'];
                        $tax = $results['tax'];
                        $pension = $results['pension'];

                        $total = $loan + $fees + $rent + $upfront + $tax + $pension;
     
                  ?>
                  <tr>
                    <td><?=$i?></td>
                    <td><?=$results['surname']?></td>
                    <td><?=$results['firstname']?></td>
                    <td><?=$results['designation']?></td>
                    <td><?=$month?></td>
                    <td>&#8358;<?=number_format($results['salary'])?></td>
                    <td>&#8358;<?=number_format($results['allowance'])?></td>
                    <td>&#8358;<?=number_format($results['leave_bonus'])?></td>
                    <td>&#8358;<?=number_format($results['pension'])?></td>
                    <td>&#8358;<?=number_format($results['tax'])?></td>
                    <td>&#8358;<?=number_format($total)?></td>
                    <td>&#8358;<?=number_format($results['netpay'])?></td>
                    <td>
                      <a href="edit-payroll?edit=<?=$results['staff_id']?>"><button class="btn btn-success">Edit</button></a>
                    </td>
                  </tr>

                  <?php } } ?>

                  <?php if($getPro): ?>
                    <div class="mb-4">
                      <form action="" method="post">
                        <button type="submit" name="send" class="btn btn-success">Send Payslip</button>
                      </form>
                    </div>
                  <?php endif; ?>
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