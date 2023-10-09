<!DOCTYPE html>
<html lang="en">

<?php
  include './adminHeader.php';
?>

<body style="padding-top:50px;">
  
  

<div class="col-md-4" style="max-width:25%;margin-top: 3%;">
        <div class="list-group" id="list-tab" role="tablist">
          <a class="list-group-item list-group-item-action" id="list-dash-list" data-toggle="list"
            href="adminDashboard.php" role="tab" aria-controls="home">Dashboard</a>
          <a class="list-group-item list-group-item-action" href="viewDoctors.php" id="list-doc-list" role="tab"
            aria-controls="home" data-toggle="list">View Doctors</a>
          <a class="list-group-item list-group-item-action active" href="viewPatients.php" id="list-pat-list"
            role="tab" data-toggle="list" aria-controls="home">View Patients</a>
          <a class="list-group-item list-group-item-action" href="appointmentDetails.php" id="list-app-list"
            role="tab" data-toggle="list" aria-controls="home">Appointment Details</a>
          <!-- <a class="list-group-item list-group-item-action" href="presciptionList1.php" id="list-pres-list" role="tab"
            data-toggle="list" aria-controls="home">Prescription List</a> -->
          <a class="list-group-item list-group-item-action" href="addDoctor.php" id="list-adoc-list" role="tab"
            data-toggle="list" aria-controls="home">Add Doctor</a>
          <!-- <a class="list-group-item list-group-item-action" href="deleteDoctor.php" id="list-ddoc-list" role="tab"
            data-toggle="list" aria-controls="home">Delete Doctor</a> -->

        </div><br>
      </div>

      <div class="col-md-8" style="margin-top: 3%;">
        <div class="tab-content" id="nav-tabContent" style="width: 980px;">

          <div class="tab-pane fade active show" id="list-pat" role="tabpanel" aria-labelledby="list-pat-list">

         

            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Fullname</th>
                  <th scope="col">Gender</th>
                  <th scope="col">Email</th>
                  <th scope="col">Contact</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $con = mysqli_connect("localhost", "root", "", "cmsupdate");
                  global $con;
                  $query = "select * from patreg";
                  $result = mysqli_query($con, $query);
                  $cnt = 1;
                  while ($row = mysqli_fetch_array($result)) {
                    $pid = $row['pid'];
                    $fname = $row['fname'];
                    $lname = $row['lname'];
                    $gender = $row['gender'];
                    $email = $row['email'];
                    $contact = $row['contact'];
                    ?>
               
                    <tr>
                    <td> <?php echo $cnt;?> </td>
                    <td> <?php echo $fname ;?> <?php echo  $lname;?> </td>
                    <td> <?php echo $gender;?> </td>
                    <td> <?php echo $email;?> </td>
                    <td> <?php echo $contact;?> </td>
                    <td> <a href="deletePatients.php?pid=<?php echo $pid;?> "><button class="btn btn-danger">Delete</button></a></td>
                  </tr>
                <?php  $cnt++;}
                    
                    ?>
              </tbody>
            </table>
            <br>
          </div>

        </div>
      </div>
    </div>
  </div>
  
  
  
</body>

</html>