<?php include "includes/header.php"; ?>

  <?php include "includes/nav.php"; ?>

  <?php 
        
    if(isset($_GET['delstaff'])){

      $id = $_GET['delstaff'];
      
      $delpro = $acct->delStaff($id);
    }
    
  ?>


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Employee</h1>
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
                  <a href="/a1zmhdssxs/add-employee" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add Employee</a>
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
              <!-- /.card-header -->
              <!-- form start -->

              
              <div class="card-body table-responsive">
                <?php 
            
                  if(isset($delpro)){
                    echo $delpro;
                  }

                ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Full Name</th>
                    <th>Email Address</th>
                    <th>Phone Number</th>
                    <th>Image</th>
                    <th>School</th>
                    <th>Designation</th>
                    <th>Year Joined</th>
                    <th>Status</th>
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
                    <td><?= $results['school'] ?></td>
                    <td><?= $results['designation'] ?></td>
                    <td><?=$format->formatDate($results['yearjoined'])?></td>
                    <td><?= $results['status'] ?></td>
                    <td>
                      <a href="edit-employee?staffid=<?=$results['staff_id']; ?>" class="btn btn-success btn-sm">Edit</a>
                      <a onClick="return confirm('Are you sure?')" href="?delstaff=<?php echo $results['staff_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
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