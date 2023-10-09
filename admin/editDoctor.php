<!DOCTYPE html>
<html lang="en">
<?php
include './adminHeader.php';
$con = mysqli_connect("localhost", "root", "", "cmsupdate");



// isset($_GET['did']);


$did=$_GET['did'];
  $result1=mysqli_query($con,"Select * from doctb where did= $did ");

  while ($row = mysqli_fetch_array($result1)){
    $doctorname = $row['doctorname'];
    $spec = $row['spec'];
    $demail = $row['email'];
    $username = $row['username'];
    
    $docFees = $row['docFees'];
    $did=$row['did'];
  }
$did='';
  if(isset($_POST['docsub']))
  {
   $did=$_POST['did'];
   $doctorname=$_POST['doctorname'];
    $doctor=$_POST['doctor'];
    $dpassword=$_POST['dpassword'];
    $demail=$_POST['demail'];
    $spec=$_POST['special'];
    $docFees=$_POST['docFees'];
   
   
    $query1="update doctb set doctorname ='$doctorname' , 
    username='$doctor', password='$dpassword',email='$demail' ,
    spec='$spec', docFees='$docFees' where did='$did' ";

    $result1=mysqli_query($con,$query1);
    if($result1)
      {
       

        echo "<script>alert('Doctor updated successfully!');
        window.location.href = 'viewDoctors.php';</script>";
    }
    else{
      echo "<script>alert('Please Try again');</script>";
    }
    
  }

  ?>
    <body style="padding-top:50px;">

        </div>
  <div style="display:flex;justify-content:center">
    <div class="col-md-8" style="margin-top: 3%;">
      <div class="tab-content" id="nav-tabContent" style="width: 980px;">
  <h1 style="    text-align: center;">Edit Doctor</h1>
  <br>
      <div class="tab-pane fade active show" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
          <form class="form-group" method="post" id="myForm" onsubmit="return validateForm()" name="myForm">
            <div class="row">
            <input type="hidden" name="did" value=<?php echo $_GET['did'];?>>
            <div class="col-md-4"><label>Doctor Name:</label></div>
                    <div class="col-md-8"><input type="text" class="form-control" name="doctorname" value="<?php echo $doctorname; ?>" onkeydown="return alphaOnly(event);" required></div><br><br>
                    <div class="col-md-4"><label>Username:</label></div>
                    <div class="col-md-8"><input type="text" class="form-control" name="doctor" value="<?php echo $username; ?>" onkeydown="return alphaOnly(event);" required></div><br><br>
                    <div class="col-md-4"><label>Specialization:</label></div>
                    <div class="col-md-8">
                     <select name="special" class="form-control" id="special"  required>
                        <option  name="spec"  >Select Specialization</option>
                        <option value="General" name="spec">General</option>
                        <option value="Gynecologist" name="spec">Gynecologist</option>
                        <option value="Oncologist">Oncologist</option>
                        <option value="Cardiologist" name="spec">Cardiologist</option>
                        <option value="Gastroenterologist">Gastroenterologist</option>
                        <option value="Neurologist" name="spec">Neurologist</option>
                        <option value="Pediatrician" name="spec">Pediatrician</option>
                        <option value="Dermatologist" name="spec">Dermatologist</option>
                      </select>
                      </div><br><br>
                    <div class="col-md-4"><label>Email ID:</label></div>
                    <div class="col-md-8"><input type="email"  class="form-control" name="demail" value="<?php echo $demail; ?>" required></div><br><br>
                    <div class="col-md-4"><label>Password:</label></div>
                    <div class="col-md-8"><input type="password" class="form-control"  onkeyup='check();' name="dpassword" id="dpassword"  required></div><br><br>
                    <div class="col-md-4"><label>Confirm Password:</label></div>
                    <div class="col-md-8"><input type="password" class="form-control" onkeyup='check();' name="cdpassword" id="cdpassword" required><span id='message'></span> </div><br><br>
                     
                    
                    <div class="col-md-4"><label>Consultancy Fees:</label></div>
                    <div class="col-md-8"><input type="text" class="form-control" id="docFees" value="<?php echo $docFees; ?>" onchange=" return feeValidation()" name="docFees" min="1" required></div>
                    <span id="alertFee" style="padding-left:300px; color:red"></span>
                    <br><br>
                  </div>
            <input type="submit" name="docsub" value="Update" onclick="return checklen();"class="btn btn-primary float-left">
  
          </form>

          <br>
           <a href="viewDoctors.php"><button class="btn btn-secondary">Back</button></a>
        </div>
  
  
        </div>
        </div>
        </div>
        </div>
      
  
  
    
        </div>  </body>
    <script>
  
  function checklen()
  {
      var pass1 = document.getElementById("dpassword");  
      if(pass1.value.length<6){  
          alert("Password must be at least 6 characters long. Try again!");  
          return false;  
    }  
  }
      var check = function() {
    if (document.getElementById('dpassword').value ==
      document.getElementById('cdpassword').value) {
      document.getElementById('message').style.color = '#5dd05d';
      document.getElementById('message').innerHTML = 'Matched';
    } else {
      document.getElementById('message').style.color = '#f55252';
      document.getElementById('message').innerHTML = 'Password fields doesnot match';
    }
  }
  
      function alphaOnly(event) {
    var key = event.keyCode;
    return ((key >= 65 && key <= 90) || key == 8 || key == 32);
  };
  
  function validateForm() {
    let x = document.forms["myForm"]["docFees"].value;
    if (x <=0) {
      alert("doctor fee cant be negative");
      document.getElementById("alertFee").innerHTML= "Doctor fee cannot be negative";
      return false;
    }
  }
  
  </script>


</html>