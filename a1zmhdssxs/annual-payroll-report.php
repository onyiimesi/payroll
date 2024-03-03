<?php include "includes/header.php"; ?>

  <?php include "includes/nav.php"; ?>


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Annual Payroll Report</h1>
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
                  <?php 
                    $getPro = $acct->getPayrolls();
                      if($getPro){

                        foreach ($getPro as $results) {
                        

                          $dates = $results['payroll_month'];

                          $date = date('Y', strtotime($dates));

                          $month = date('Y', strtotime($dates));
                        ?>
                      <?php } }else{$month = null; $school = null;} ?>

                      <?php 
                        if (isset($_GET['school'])) {

                          $school = $_GET['school'];
                        }

                        $school = isset($school) ? $school: '';
                      ?>

                      <?php if($month){ ?>
                  <h4>Year <?php echo $month .'<br>'. $school ?></h4>
                  <?php } ?>
                </div>

                <div class="float-right">
                  <form action="">

                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-12">
                          <select class="form-control" name="school" id="">
                            <option value="">Choose School</option>
                            <option value="PRY SURULERE">PRY SURULERE</option>
                            <option value="SECONDARY SURULERE">SECONDARY SURULERE</option>
                            <option value="PRY IJEGUN">PRY IJEGUN</option>
                            <option value="SECONDARY IJEGUN">SECONDARY IJEGUN</option>
                          </select>
                        </div>
                        
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-9">
                          <select class="form-control" name="year" id="">
                            <option>Choose Year</option>
                            <?php for ($count = date('Y'); $count >= 1910; $count--) 
                              echo '<option value="' . $count . '">' . $count . '</option>';
                              ?>
                          </select>
                        </div>
                        <div class="col-md-2">
                          <button type="submit" class="btn btn-success">Go</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  </form>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
                
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Fullname</th>
                    <th>Designation</th>
                    <th>School</th>
                    <th>Year</th>
                    <th>Gross Pay</th>
                    <th>Pension By Staff</th>
                    <th>Tax</th>
                    <th>Total Deduction</th>
                    <th>Net Pay</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $getPro = $acct->getPayrolls();

                    $gross = 0;
                    $pens = 0;
                    $taxes = 0;
                    $tdeduct = 0;
                    $net = 0;
                    if($getPro){
                      $i = 0;
                      foreach ($getPro as $results) {
                        $i++;

                        $dates = $results['payroll_month'];

                        $date = date('Y-m-d', strtotime($dates));

                        $month = date('Y', strtotime($dates));

                        $loan = $results['loan'];
                        $fees = $results['fees'];
                        $rent = $results['rent'];
                        $upfront = $results['upfront'];
                        $tax = $results['tax'];
                        $pension = $results['pension'];

                        $total = $loan + $fees + $rent + $upfront + $tax + $pension;

                        $gross += $results['salary'];
                        $pens += $results['pension'];
                        $taxes += $results['tax'];
                        $tdeduct += $total;
                        $net += $results['netpay'];
     
                  ?>
                  <tr>
                    <td><?=$i?></td>
                    <td><?=$results['surname']?> <?=$results['firstname']?></td>
                    <td><?=$results['designation']?></td>
                    <td><?=$results['school']?></td>
                    <td><?=$month?></td>
                    <td>&#8358;<?=number_format($results['salary'])?></td>
                    <td>&#8358;<?=number_format($results['pension'])?></td>
                    <td>&#8358;<?=number_format($results['tax'])?></td>
                    <td>&#8358;<?=number_format($total)?></td>
                    <td>&#8358;<?=number_format($results['netpay'])?></td>
                  </tr>
                  <?php } } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td></td>
                      <td colspan="4" class="text-right">Total</td>
                      <td>&#8358;<?= number_format($gross) ?></td>
                      <td>&#8358;<?= number_format($pens) ?></td>
                      <td>&#8358;<?= number_format($taxes) ?></td>
                      <td>&#8358;<?= number_format($tdeduct) ?></td>
                      <td>&#8358;<?= number_format($net) ?></td>
                    </tr>
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