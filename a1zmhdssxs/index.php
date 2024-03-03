<?php include "includes/header.php"; ?>

  <?php include "includes/nav.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">
              Dashboard | 
              <?= Session::get("lname"); ?>
              <?= Session::get("fname"); ?>
          </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                  <?php
                    
                    $getData = $acct->numRowEmployees();
                    
                    if(isset($getData)){                                               
                        echo $getData;
                    }

                  ?> 
                </h3>

                <p>Total Employees</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="/payroll/a1zmhdssxs/employee" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>8<sup style="font-size: 20px"></sup></h3>

                <p>Reports</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row mt-2">
          <!-- Left col -->
          <section class="col-lg-12 card">
            <div class="card-header">
              <div class="float-left">
                <h5>List of Empoyees</h5>
              </div>

              <div class="float-right">
                <form action="">
                  <div class="row">
                    <div class="col-md-8">
                      <select class="form-control" name="search" id="">
                        <option value="">Choose School</option>
                        <option value="PRY SURULERE">PRY SURULERE</option>
                        <option value="SECONDARY SURULERE">SECONDARY SURULERE</option>
                        <option value="PRY IJEGUN">PRY IJEGUN</option>
                        <option value="SECONDARY IJEGUN">SECONDARY IJEGUN</option>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <button type="submit" class="btn btn-success">Go</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="card-body table-responsive">
              
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Full Name</th>
                  <th>Email Address</th>
                  <th>Phone Number</th>
                  <th>Image</th>
                  <th>Designation</th>
                  <th>School</th>
                  <th>Year Joined</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                  $getPro = $acct->getEmployees();

                  if($getPro){
                    $i = 0;
                    foreach ($getPro as $results) {
                      $i++;
   
                ?>
                <tr>
                  <td><?= $results['surname'] ?> <?= $results['firstname'] ?></td>
                  <td><?= $results['email'] ?></td>
                  <td><?= $results['phone'] ?></td>
                  <td>
                    <?php if (empty($results['image'])): ?>
                      <img src="../img/no_image.png" width="80" height="80" alt="">
                    <?php else: ?>
                      <img src="<?=$format->esc($results['image'])?>" width="80" height="80" alt="">
                    <?php endif; ?>
                  </td>
                  <td><?= $results['designation'] ?></td>
                  <td><?= $results['school'] ?></td>
                  <td><?=$format->formatDate($results['yearjoined'])?></td>
                  <td><?= $results['status'] ?></td>
                </tr>
                <?php } } ?>
                </tfoot>
              </table>
            </div>
          </section>
          <!-- /.Left col -->

          
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<?php include "includes/footer.php"; ?>
