<?php include "includes/header.php"; ?>

  <?php include "includes/nav.php"; ?>


  <?php 
      
    if(!isset($_GET['add']) || $_GET['add'] == null){
        echo "<script>window.location = 'edit-product'; </script> ";
      }else{
        $add = $_GET['add'];
    }
    
    
  ?>

  <?php 

   if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addpayroll'])){

      $addpayroll = $acct->addPayroll($_POST);
   }

  ?>


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Payroll</h1>
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
                <h5>Add Employee</h5>
              </div> -->
              <!-- /.card-header -->
              <!-- form start -->
              <?php 
                $getbonus = $acct->getBonus($add);

                $bonus = 0;
                if($getbonus){
                  foreach($getbonus as $resultss){

                    $bonus = $resultss['amount'];

                  }
                }
                $bonus= isset($bonus) ? $bonus: 0;

                $getPro = $acct->getEmployee($add);
                  if($getPro){
                      foreach($getPro as $results){

                        $salary = $results['salary'];
                        $allowance = $results['allowance'];
                    
              ?>
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <?php  

                    if (isset($addpayroll)) {
                      echo $addpayroll;
                    }

                  ?>
                  <div class="row">
                    <div class="col-md-12">
                      <div>
                        <h5>Employee Details</h5>
                      </div>
                    </div>
                  </div><hr>

                  <div class="row">
                    <div class="col-md-3">
                      <div class="">
                        <label for="">Payroll Month</label>
                        <input type="month" class="form-control" name="payroll_month">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="">
                        <label for="">Session</label>
                        <select name="payroll_session" class="form-control" id="">
                          <option value="">Choose</option>
                          <option value="2024/2025">2024/2025</option>
                          <option value="2023/2024">2023/2024</option>
                          <option value="2022/2023">2022/2023</option>
                          <option value="2021/2022">2021/2022</option>
                        </select>
                      </div>
                    </div>

                    <!-- <div class="col-md-3">
                      <div class="">
                        <label for="">Pension (Contribution)</label>
                        <input type="number" class="form-control" name="pension_contribution">
                      </div>
                    </div> -->

                    <div class="col-md-1">
                      <div class="">
                        <!-- <label for="">Email</label> -->
                        <input type="hidden" class="form-control" name="email" value="<?=$results['email']?>">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="">
                        <!-- <label for="">Email</label> -->
                        <input type="hidden" class="form-control" name="role" value="<?=$results['role']?>">
                      </div>
                    </div>
                    
                  </div><hr>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="mb-4">
                        <label for="">Staff ID Number</label>
                        <input type="text" class="form-control" name="staff_id" readonly value="<?=$results['staff_id']?>">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="mb-4">
                        <label for="">Surname</label>
                        <input type="text" class="form-control" name="surname" readonly value="<?=$results['surname']?>">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="mb-4">
                        <label for="">First Name</label>
                        <input type="text" class="form-control" name="firstname" readonly value="<?=$results['firstname']?>">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="mb-4">
                        <label for="">Middle Name</label>
                        <input type="text" class="form-control" name="middle" readonly value="<?=$results['middle']?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-3">
                      <div class="mb-4">
                        <label for="">Designation</label>
                        <input type="text" class="form-control" name="designation" readonly value="<?=$results['designation']?>">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="mb-4">
                        <label for="">School</label>
                        <input type="text" class="form-control" name="school" readonly value="<?=$results['school']?>">
                      </div>
                    </div>

                    <div class="col-6 col-md-3">
                      <div class="mb-4">
                        <label for="">Basic Salary</label>
                        <input type="number" name="basic_salary" class="form-control" id="yyy"  onclick="salaryConverter(this.value,'input')" value="<?=$results['basic_salary']; ?>" readonly>
                        <div id="outputCurrency"></div>
                      </div>
                    </div>

                    <div class="col-6 col-md-3">
                      <div class="mb-4">
                        <label for="">Housing</label>
                        <input type="number" name="housing" class="form-control" id="salary" onclick="transportConverter(this.value)" value="<?=$results['housing']; ?>" readonly>
                        <div id="outputSalary"></div>
                      </div>
                    </div>

                    <div class="col-6 col-md-3">
                      <div class="mb-4">
                        <label for="">Transport</label>
                        <input type="number" name="transport" class="form-control" id="transport" onclick="mealConverter(this.value)" value="<?=$results['transport']; ?>" readonly>
                        <div id="outputTransport"></div>
                      </div>
                    </div>

                    <div class="col-6 col-md-3">
                      <div class="mb-4">
                        <label for="">Meal</label>
                        <input type="number" name="meal" class="form-control" id="meal" onclick="entConverter(this.value)" value="<?=$results['meal']; ?>" readonly>
                        <div id="outputMeal"></div>
                      </div>
                    </div>

                    <div class="col-6 col-md-3">
                      <div class="mb-4">
                        <label for="">Entertainment</label>
                        <input type="number" name="entertainment" class="form-control" id="ent" onclick="intConverter(this.value)" value="<?=$results['entertainment']; ?>" readonly>
                        <div id="outputEnt"></div>
                      </div>
                    </div>

                    <div class="col-6 col-md-3">
                      <div class="mb-4">
                        <label for="">Internet</label>
                        <input type="number" name="internet" class="form-control" value="<?=$results['internet']; ?>" id="int" readonly>
                        <div id="outputInt"></div>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="mb-4">
                        <label for="">Gross Salary</label>
                        <input type="number" name="salary" readonly class="form-control" value="<?=$results['salary']?>">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="mb-4">
                        <label for="">Allowance</label>
                        <input type="number" name="allowance" readonly class="form-control" value="<?=$results['allowance']?>">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="">
                        <label for="">Leave Bonus</label>
                        <input type="text" readonly class="form-control" name="leave_bonus" value="<?=$bonus?>">
                      </div>
                    </div>

                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div>
                        <h5>Deductions</h5>
                      </div>
                    </div>
                  </div><hr>


                  <div class="row">

                    <?php 

                      $get = $acct->getLoan($add);
                        if($get){
                          
                            foreach($get as $result){
                              $loan = $result['amount'];
                          
                    ?>
                    <?php 

                      }

                     }elseif (!$get) {
                       $loan = 0;
                     } 


                     ?>
                    <div class="col-md-3">
                      <div class="mb-4">
                        <label for="">Loan</label>
                        <input type="text" name="loan" class="form-control" value="<?=$loan?>" readonly>
                      </div>
                    </div>
                    

                    <?php 

                      $get = $acct->getFees($add);
                        if($get){
                          
                          foreach($get as $result){
                            $fees = $result['amount'];
                          
                    ?>
                    <?php 

                      }

                     }elseif (!$get) {
                       $fees = 0;
                     } 


                     ?>
                    <div class="col-md-3">
                      <div class="mb-4">
                        <label for="">School Fees</label>
                        <input type="text" name="fees" class="form-control" value="<?=$fees?>" readonly>
                      </div>
                    </div>
                  


                    <?php 

                      $get = $acct->getRent($add);
                        if($get){
                          
                          foreach($get as $result){
                            $rent = $result['amount'];
                          
                    ?>
                    <?php 

                      }

                     }elseif (!$get) {
                       $rent = 0;
                     } 


                     ?>

                    <div class="col-md-3">
                      <div class="mb-4">
                        <label for="">Rent</label>
                        <input type="text" name="rent" class="form-control" value="<?=$rent?>" readonly>
                      </div>
                    </div>

                    <?php 

                      $get = $acct->getUpfront($add);
                        if($get){
                          
                            foreach($get as $result){
                              $upfront = $result['amount'];
                          
                    ?>
                    <?php 

                      }

                     }elseif (!$get) {
                       $upfront = 0;
                     } 


                     ?>
                    <div class="col-md-3">
                      <div class="mb-4">
                        <label for="">Upfront</label>
                        <input type="text" name="upfront" class="form-control" value="<?=$upfront?>" readonly>
                      </div>
                    </div>

                  </div>

                  <div class="row">

                    <?php 

                      $get = $acct->getTax($add);
                        if($get){
                          
                            foreach($get as $result){
                              $tax = $result['amount'];
                          
                      ?>
                      <?php 

                        }

                       }elseif (!$get) {
                         $tax = 0;
                       } 


                    ?>
                    <div class="col-md-3">
                      <div class="mb-4">
                        <label for="">Tax</label>
                        <input type="text" name="tax" class="form-control" value="<?=$tax?>" readonly>
                      </div>
                    </div>


                    <?php 

                      $get = $acct->getPension($add);
                        if($get){
                          
                            foreach($get as $result){
                              $pension = $result['amount'];
                          
                      ?>
                      <?php 

                        }

                       }elseif (!$get) {
                         $pension = 0;
                       } 


                    ?>
                    <div class="col-md-3">
                      <div class="mb-4">
                        <label for="">Pension</label>
                        <input type="text" name="pension" class="form-control" value="<?=$pension?>" readonly>
                      </div>
                    </div>

                    <?php 

                      $get = $acct->getSpecialDed($add);
                        if($get){
                          
                            foreach($get as $result){
                              $spension = $result['amount'];
                          
                      ?>
                      <?php 

                        }

                       }elseif (!$get) {
                         $spension = 0;
                       } 


                    ?>
                    <div class="col-md-3">
                      <div class="mb-4">
                        <label for="">Special Deduction</label>
                        <input type="text" name="special_deduction" class="form-control" value="<?=$spension?>" readonly>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div>
                        <h5>Net Pay</h5>
                      </div>
                    </div>
                  </div><hr>

                  <?php  

                    $gross = $salary;

                    $deduct = $loan + $fees + $rent + $upfront + $tax + $pension + $spension;

                    $salary += $bonus;

                    $netpays = (int)$salary + (int)$allowance;
                    
                    $netpay = (int)$netpays - (int)$deduct;

                  ?>

                  <div class="row">
                    <div class="col-md-3">
                      <div class="mb-4">
                        <label for="">Net Pay</label>
                        <input type="text" name="netpay" class="form-control" value="<?=$netpay?>" readonly>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer mb-3">
                  <button type="submit" name="addpayroll" class="btn btn-primary">Add</button>
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