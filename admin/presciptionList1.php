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
          <a class="list-group-item list-group-item-action" href="viewPatients.php" id="list-pat-list"
            role="tab" data-toggle="list" aria-controls="home">View Patients</a>
          <a class="list-group-item list-group-item-action" href="appointmentDetails.php" id="list-app-list"
            role="tab" data-toggle="list" aria-controls="home">Appointment Details</a>
          <!-- <a class="list-group-item list-group-item-action active" href="presciptionList1.php" id="list-pres-list" role="tab"
            data-toggle="list" aria-controls="home">Prescription List</a> -->
          <a class="list-group-item list-group-item-action" href="addDoctor.php" id="list-adoc-list" role="tab"
            data-toggle="list" aria-controls="home">Add Doctor</a>
          <!-- <a class="list-group-item list-group-item-action" href="deleteDoctor.php" id="list-ddoc-list" role="tab"
            data-toggle="list" aria-controls="home">Delete Doctor</a> -->

        </div><br>
      </div>

  <div class="col-md-8" style="margin-top: 3%;">
    <div class="tab-content" id="nav-tabContent" style="width: 980px;">

                  <div class="tab-pane fade active show" id="list-pres" role="tabpanel" aria-labelledby="list-pres-list">

       <div class="col-md-12">
  
        <div class="row">
        
    
        
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                  <th scope="col">Doctor</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment Time</th>
                    <th scope="col">Disease</th>
                    <th scope="col">Allergy</th>
                    <th scope="col">Prescription</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $con=mysqli_connect("localhost","root","","cmsupdate");
                    global $con;
                    // $query = "select * from prestb";
                    $query = "SELECT  pat.fname, pat.lname, doc.doctorname as doctor, doc.docFees, apm.appdate, apm.apptime, pre.disease, pre.allergy, pre.prescription
                    from prestb as pre, appointmenttb as apm, patreg as pat, doctb as doc 
                    where pat.pid=apm.pid and doc.did=apm.did and pre.ID=apm.prid ;";
                    $result = mysqli_query($con,$query);
                    $cnt=1;
                    while ($row = mysqli_fetch_array($result)){
                      $doctor = $row['doctor'];
                      // $pid = $row['pid'];
                      // $ID = $row['ID'];
                      $fname = $row['fname'];
                      $lname = $row['lname'];
                      $appdate = $row['appdate'];
                      $apptime = $row['apptime'];
                      $disease = $row['disease'];
                      $allergy = $row['allergy'];
                      $pres = $row['prescription'];

                      
                      echo "<tr>
                      <td>$cnt</td>
                        <td>$doctor</td>
                        <td>$fname $lname</td>
                        <td>$appdate</td>
                        <td>$apptime</td>
                        <td>$disease</td>
                        <td>$allergy</td>
                        <td>$pres</td>
                      </tr>";
                   $cnt++; }

                  ?>
                </tbody>
              </table>


   

        <br>
      </div>
      </div>
      </div>



      </div>
      </div>
      </div>
      </div>
    


  </body>
</html>