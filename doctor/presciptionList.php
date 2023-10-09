<!DOCTYPE html>
<html lang="en">
<?php
  include './doctorHeader.php';
  ?>
<body style="padding-top:50px;">


   <div class="container-fluid" style="margin-top:50px;">
    <div class="row">
  <div class="col-md-4" style="max-width:18%;margin-top: 3%;">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action" href="./doctorDashboard.php" role="tab" aria-controls="home" data-toggle="list">Dashboard</a>
      <a class="list-group-item list-group-item-action" href="./appointments.php" id="list-app-list" role="tab" data-toggle="list" aria-controls="home">Appointments</a>
      <a class="list-group-item list-group-item-action active" href="./presciptionList.php" id="list-pres-list" role="tab" data-toggle="list" aria-controls="home"> Prescription List</a>
      
    </div><br>
  </div>
  <div class="col-md-8" style="margin-top: 3%;">
    <div class="tab-content" id="nav-tabContent" style="width: 950px;">

        
      <div class="tab-pane fade active show" id="list-pres" role="tabpanel" aria-labelledby="list-pres-list">
        <table class="table table-hover">
                <thead>
                  <tr>
                    
                    <th scope="col">#</th>
                    <th scope="col">Patient</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment Time</th>
                    <th scope="col">Disease</th>
                    <th scope="col">Allergy</th>
                    <th scope="col">Prescribe</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

                    $con=mysqli_connect("localhost","root","","cmsupdate");
                    global $con;

                    $query = "SELECT  pat.fname, pat.lname, doc.docFees, apm.appdate, apm.apptime, pre.disease, pre.allergy, pre.prescription
                    from prestb as pre, appointmenttb as apm, patreg as pat, doctb as doc 
                    where pat.pid=apm.pid and doc.did=apm.did and pre.ID=apm.prid and doc.username='$doctor';";


                   
                    
                    $result = mysqli_query($con,$query);
                    if(!$result){
                      echo mysqli_error($con);
                    }
                    
                    $cnt=1;
                    while ($row = mysqli_fetch_array($result)){
                  ?>
                      <tr>
                        <td><?php echo $cnt;?></td>
                        <td><?php echo $row['fname'];?> <?php echo $row['lname'];?></td>                        
                        <td><?php echo $row['appdate'];?></td>
                        <td><?php echo $row['apptime'];?></td>
                        <td><?php echo $row['disease'];?></td>
                        <td><?php echo $row['allergy'];?></td>
                        <td><?php echo $row['prescription'];?></td>
                    
                      </tr>
                    <?php $cnt++; }
                    ?>
                </tbody>
              </table>
      </div>
         </div>
         </div>
         </div>
         </div>

</body>
</html>