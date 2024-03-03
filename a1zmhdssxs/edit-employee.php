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
    
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['changeimage'])){

      $editimage = $acct->editImage($_FILES, $id);
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editemployee'])){

      $editemployee = $acct->editEmployee($_POST, $_FILES, $id);
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
                <h5>Edit Employee</h5>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <div class="card-body">
                <?php 
                
                 if(isset($editimage)){
                    echo $editimage;
                  }
                        
                  if(isset($editemployee)){
                    echo $editemployee;
                  }
                  
                ?>

                <?php 

                  $getPro = $acct->getEmployeeID($id);
                    if($getPro){
                        foreach($getPro as $results){
                      
                ?>
                
                <form action="" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-12">
                      <div>
                        <h5>Change Image</h5>
                      </div><hr>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <?php if(empty($results['image'])): ?>
                      <img src="../img/no_image.png" width="80" height="80" alt="">
                      <?php else: ?>
                        <img src="<?=$format->esc($results['image'])?>" width="80" height="80" alt="">
                      <?php endif; ?>
                        
                      <div class="mb-3">
                        <label for="">Choose Image</label>
                        <input type="file" class="form-control" name="image">
                      </div>

                      <div>
                        <button type="submit" name="changeimage" class="btn btn-success">Change</button>
                      </div>
                    </div>
                  </div>
                </form><hr>
                
                <form action="" method="post" enctype="multipart/form-data">
                  
                    <div class="row">
                      <div class="col-md-3">
                        <div class="mb-4">
                          <label for="">Staff ID Number</label>
                          <input type="text" class="form-control" readonly name="staff_id" value="<?=$results['staff_id']; ?>">
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="mb-4">
                          <label for="">Surname</label>
                          <input type="text" class="form-control" name="surname" value="<?=$results['surname']; ?>">
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="mb-4">
                          <label for="">First Name</label>
                          <input type="text" class="form-control" name="firstname" value="<?=$results['firstname']; ?>">
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="mb-4">
                          <label for="">Middle Name</label>
                          <input type="text" class="form-control" name="middle" value="<?=$results['middle']; ?>">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-3">
                        <div class="mb-4">
                          <label for="">Address</label>
                          <input type="text" class="form-control" name="addr" value="<?=$results['addr']; ?>">
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="mb-4">
                          <label for="">Email Address</label>
                          <input type="email" class="form-control" name="email" value="<?=$results['email']; ?>">
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="mb-4">
                          <label for="">Phone Number</label>
                          <input type="text" class="form-control" name="phone" value="<?=$results['phone']; ?>">
                        </div>
                      </div>


                      <div class="col-md-3">
                        <div class="mb-4">
                          <label for="">School/Location</label>
                          <select name="school" class="form-control" id="">
                            <option value="<?=$results['school']; ?>"><?=$results['school']; ?></option>

                            <option value="PRY SURULERE">PRY SURULERE</option>
                            <option value="SECONDARY SURULERE">SECONDARY SURULERE</option>
                            <option value="PRY IJEGUN">PRY IJEGUN</option>
                            <option value="SECONDARY IJEGUN">SECONDARY IJEGUN</option>
                          </select>
                        </div>
                      </div>

                    </div>

                    <div class="row">
                      <div class="col-md-3">
                        <div class="mb-4">
                          <label for="">Designation</label>
                          <select name="designation" class="form-control" id="">
                            <option value="<?=$results['designation']; ?>"><?=$results['designation']; ?></option>
                            <option value="Educator">Educator</option>
                            <option value="Admin Staff">Admin Staff</option>
                            <option value="Support Staff">Support Staff</option>
                            <option value="Head Teacher">Head Teacher</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="mb-4">
                          <label for="">Next of Kin Name</label>
                          <input type="text" class="form-control" name="nxtofkin" value="<?=$results['nxtofkin']; ?>">
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="mb-4">
                          <label for="">Next of Kin Mobile Number</label>
                          <input type="text" class="form-control" name="nxtphone" value="<?=$results['nxtphone']; ?>">
                        </div>
                      </div>
                      
                      <div class="col-md-3">
                        <div class="mb-4">
                          <label for="">Next of Kin Address</label>
                          <input type="text" class="form-control" name="nxtaddr" value="<?=$results['nxtaddr']; ?>">
                        </div>
                      </div>
                      
                    </div>

                    <div class="row">

                      <div class="col-md-3">
                        <div class="mb-4">
                          <label for="">Gross Salary</label>
                          <input type="number" name="salary" class="form-control" value="<?=$results['salary']; ?>" oninput="currencyConverter(this.value)">
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="mb-4">
                          <label for="">Allowance</label>
                          <input type="number" name="allowance" class="form-control" value="<?=$results['allowance']; ?>">
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
                          <label for="">Status</label>
                          <select name="status" class="form-control" id="">
                            <option value="<?=$results['status']; ?>"><?=$results['status']; ?></option>
                            <option value="Fulltime">Fulltime</option>
                            <option value="Part Time">Part Time</option>
                          </select>
                        </div>
                      </div>
                      
                      <div class="col-6 col-md-3">
                        <div class="mb-4">
                          <label for="">Year Joined</label>
                          <input type="date" class="form-control" name="yearjoined" value="<?=$results['yearjoined']; ?>">
                        </div>
                      </div>
                    </div>

                    
                  
                    <button type="submit" name="editemployee" class="btn btn-primary mt-4">Edit</button>
                  </div>
                </form>
                <?php } } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>


  <script type="text/javascript">

    var valN;
    var ss;
    var aa;
    var housingA;
    var transportAA;
    var num;


    function currencyConverter(valNum) {
      //alert(valNum);
      ss = valNum;
      valN = document.getElementById("outputCurrency").innerHTML = (Math.round(valNum - 1400)/2.2).toFixed(2);

      if (valNum.length==0) { 
      document.getElementById("outputCurrency").innerHTML="";
      document.getElementById("outputCurrency").style.border="0px";
      return;
      }else{
        document.getElementById("outputCurrency").innerHTML=valN;
        document.getElementById("outputCurrency").style.border="";

        $("#yyy").val($("#outputCurrency").text());
        $("#outputCurrency").text("")
      }
    }

    function salaryConverter(valNums) {

      
      housingA = document.getElementById("outputSalary").innerHTML = Math.round(valNums * 0.7).toFixed(2);


      if (valNums.length==0) { 
      document.getElementById("outputSalary").innerHTML="";
      document.getElementById("outputSalary").style.border="0px";
      return;
      }else{
        document.getElementById("outputSalary").innerHTML=housingA;
        document.getElementById("outputSalary").style.border="";

        $("#salary").val($("#outputSalary").text());
        $("#outputSalary").text("")
      }
     

      
    }

    function transportConverter(valNumss) {
      transportAA = document.getElementById("outputTransport").innerHTML = Math.round(valN * 0.3).toFixed(2);

      if (valNumss.length==0) { 
      document.getElementById("outputTransport").innerHTML="";
      document.getElementById("outputTransport").style.border="0px";
      return;
      }else{
        document.getElementById("outputTransport").innerHTML=transportAA;
        document.getElementById("outputTransport").style.border="";

        $("#transport").val($("#outputTransport").text());
        $("#outputTransport").text("")
      }

    }

    function mealConverter(valNumsss) {
      aa = valNumsss;
      num = document.getElementById("outputMeal").innerHTML =  Math.round(0.35 *(ss - valNumsss - housingA - valN)).toFixed(2);

      if (valNumsss.length==0) { 
      document.getElementById("outputMeal").innerHTML="";
      document.getElementById("outputMeal").style.border="0px";
      return;
      }else{
        document.getElementById("outputMeal").innerHTML=num;
        document.getElementById("outputMeal").style.border="";

        $("#meal").val($("#outputMeal").text());
        $("#outputMeal").text("")
      }

      numsss = document.getElementById("outputPenStaff").innerHTML =  Math.round(0.08 *(+valN + +housingA + +transportAA)).toFixed(2);


      if (valNumsss.length==0) { 
      document.getElementById("outputPenStaff").innerHTML="";
      document.getElementById("outputPenStaff").style.border="0px";
      return;
      }else{
        document.getElementById("outputPenStaff").innerHTML=numsss;
        document.getElementById("outputPenStaff").style.border="";

        $("#Pen").val($("#outputPenStaff").text());
        $("#outputPenStaff").text("")
      }

      numssss = document.getElementById("outputPenEmp").innerHTML =  Math.round(0.1 *(+valN + +housingA + +transportAA)).toFixed(2);

      if (valNumsss.length==0) { 
      document.getElementById("outputPenEmp").innerHTML="";
      document.getElementById("outputPenEmp").style.border="0px";
      return;
      }else{
        document.getElementById("outputPenEmp").innerHTML=numssss;
        document.getElementById("outputPenEmp").style.border="";

        $("#Emp").val($("#outputPenEmp").text());
        $("#outputPenEmp").text("")
      }

    }

    function entConverter(valNumssss) {
      nums = document.getElementById("outputEnt").innerHTML =  Math.round(0.35 *(ss - aa - housingA - valN)).toFixed(2);

      if (valNumssss.length==0) { 
      document.getElementById("outputEnt").innerHTML="";
      document.getElementById("outputEnt").style.border="0px";
      return;
      }else{
        document.getElementById("outputEnt").innerHTML=nums;
        document.getElementById("outputEnt").style.border="";

        $("#ent").val($("#outputEnt").text());
        $("#outputEnt").text("")
      }

    }

    function intConverter(valNumsssss) {
      numss = document.getElementById("outputInt").innerHTML =  Math.round(0.3 *(ss - aa - housingA - valN)).toFixed(2);

      if (valNumsssss.length==0) { 
      document.getElementById("outputInt").innerHTML="";
      document.getElementById("outputInt").style.border="0px";
      return;
      }else{
        document.getElementById("outputInt").innerHTML=numss;
        document.getElementById("outputInt").style.border="";

        $("#int").val($("#outputInt").text());
        $("#outputInt").text("")
      }

    }

    
  </script>




<?php include "includes/footer.php"; ?>