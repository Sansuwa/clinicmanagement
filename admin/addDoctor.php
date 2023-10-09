<!DOCTYPE html>
<html lang="en">
<?php
include './adminHeader.php';
$con = mysqli_connect("localhost", "root", "", "cmsupdate");


if (isset($_POST['docsub'])) {
  $doctorname = $_POST['doctorname'];
  $doctor = $_POST['doctor'];
  $dpassword = $_POST['dpassword'];
  $demail = $_POST['demail'];
  $spec = $_POST['special'];
  $docFees = $_POST['docFees'];


  $query = "insert into doctb(doctorname,username,password,email,spec,docFees)values('$doctorname','$doctor','$dpassword','$demail','$spec','$docFees')";
  $result = mysqli_query($con, $query);
  if ($result) {

    echo "<script>alert('Doctor added successfully!');
      window.location.href = 'viewDoctors.php';</script>";
  }
}



?>

<body style="padding-top:50px;">


  <div class="col-md-4" style="max-width:25%;margin-top: 3%;">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action" id="list-dash-list" data-toggle="list" href="adminDashboard.php" role="tab" aria-controls="home">Dashboard</a>
      <a class="list-group-item list-group-item-action" href="viewDoctors.php" id="list-doc-list" role="tab" aria-controls="home" data-toggle="list">View Doctors</a>
      <a class="list-group-item list-group-item-action" href="viewPatients.php" id="list-pat-list" role="tab" data-toggle="list" aria-controls="home">View Patients</a>
      <a class="list-group-item list-group-item-action" href="appointmentDetails.php" id="list-app-list" role="tab" data-toggle="list" aria-controls="home">Appointment Details</a>
      <!-- <a class="list-group-item list-group-item-action" href="presciptionList1.php" id="list-pres-list" role="tab"
            data-toggle="list" aria-controls="home">Prescription List</a> -->
      <a class="list-group-item list-group-item-action active" href="addDoctor.php" id="list-adoc-list" role="tab" data-toggle="list" aria-controls="home">Add Doctor</a>


    </div><br>
  </div>

  <div class="col-md-8" style="margin-top: 3%;">
    <div class="tab-content" id="nav-tabContent" style="width: 980px;">

      <div class="tab-pane fade active show" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
        <form class="form-group" method="post" id="myForm" onsubmit="return validateForm()" name="myForm">
          <div class="row">
            <div class="col-md-4"><label>Doctor Name:</label></div>
            <div class="col-md-8"><input type="text" class="form-control" name="doctorname" onkeydown="return alphaOnly(event);" required></div><br><br>
            <div class="col-md-4"><label>Username:</label></div>
            <div class="col-md-8"><input type="text" class="form-control" name="doctor" onkeydown="return alphaOnly(event);" required></div><br><br>
            <div class="col-md-4"><label>Specialization:</label></div>
            <div class="col-md-8">
              <select name="special" class="form-control" id="special" required>
                <option value="head" name="spec" disabled selected>Select Specialization</option>
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
            <div class="col-md-8"><input type="email" class="form-control" placeholder="example@gmail.com" name="demail" required></div><br><br>
            <div class="col-md-4"><label>Password:</label></div>
            <div class="col-md-8"><input type="password" class="form-control" onkeyup='check();' name="dpassword" id="dpassword" required></div><br><br>
            <div class="col-md-4"><label>Confirm Password:</label></div>
            <div class="col-md-8"><input type="password" class="form-control" onkeyup='check();' name="cdpassword" id="cdpassword" required><span id='message'></span> </div><br><br>


            <div class="col-md-4"><label>Consultancy Fees:</label></div>
            <div class="col-md-8"><input type="text" class="form-control" id="docFees" onchange=" return feeValidation()" name="docFees" min="1" required></div>
            <span id="alertFee" style="padding-left:300px; color:red"></span>
            <br><br>
          </div>
          <input type="submit" name="docsub" value="Add Doctor" onclick="return checklen();" class="btn btn-primary">
        </form>
      </div>
      <br>
      <a href="viewDoctors.php"><button class="btn btn-secondary">Back</button></a>

    </div>
  </div>
  </div>
  </div>



</body>
<script>
  function checklen() {
    var pass1 = document.getElementById("dpassword");
    if (pass1.value.length < 6) {
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
    if (x <= 0) {
      alert("doctor fee cant be negative");
      document.getElementById("alertFee").innerHTML = "Doctor fee cannot be negative";
      return false;
    }
  }

  // function ValidateEmail(email) {
  //   if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myForm.email.value)) {
  //     return (true)
  //   }
  //   alert("You have entered an invalid email address!")
  //   return (false)
  // }
</script>

</html>