<!DOCTYPE html>
<html lang="en">
<?php
  include './doctorHeader.php';
  if (isset($_GET['cancel'])) {
    $query = mysqli_query($con, "update appointmenttb set doctorStatus='0' where paid = '" . $_GET['ID'] . "'");
    if ($query) {
        echo "<script>alert('Your appointment successfully cancelled');</script>";
    }
}

  ?>
<body style="padding-top:50px;">
    


   <div class="container-fluid" style="margin-top:50px;">
    <div class="row">
  <div class="col-md-4" style="max-width:18%;margin-top: 3%;">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action" href="./doctorDashboard.php" role="tab" aria-controls="home" data-toggle="list">Dashboard</a>
      <a class="list-group-item list-group-item-action active" href="./appointments.php" id="list-app-list" role="tab" data-toggle="list" aria-controls="home">Appointments</a>
      <a class="list-group-item list-group-item-action" href="./presciptionList.php" id="list-pres-list" role="tab" data-toggle="list" aria-controls="home"> Prescription List</a>
      
    </div><br>
  </div>
  <div class="col-md-8" style="margin-top: 3%;">
    <div class="tab-content" id="nav-tabContent" style="width: 950px;">

            <div class="tab-pane fade active show" id="list-app" role="tabpanel" aria-labelledby="list-home-list">
        
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Patient</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    <th scope="col">Prescribe</th>

                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $con=mysqli_connect("localhost","root","","cmsupdate");
                    global $con;
                    $dname = $_SESSION['dname'];
                    $query = "select apm.paid,  pre.fname ,pre.lname, pre.email, pre.contact, pre.contact,pre.gender, apm.appdate, apm.apptime,  apm.userStatus, apm.doctorStatus
                    from appointmenttb  as apm, doctb as doc, patreg as pre
                                       where doc.did=apm.did and pre.pid=apm.pid and  doc.username='$dname';";
                    $result = mysqli_query($con,$query);
                    $cnt=1;
                    while ($row = mysqli_fetch_array($result)){
                      ?>
                      <tr>
                      <td><?php echo $cnt;?></td>
                        <td><?php echo $row['fname'];?> <?php echo $row['lname'];?></td>
                        <td><?php echo $row['gender'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['contact'];?></td>
                        <td><?php echo $row['appdate'];?></td>
                        <td><?php echo $row['apptime'];?></td>
                        <td>
                    <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
                    {
                      echo "Active";
                    }
                    if(($row['userStatus']==0) && ($row['doctorStatus']==1))  
                    {
                      echo "Cancelled by Patient";
                    }

                    if(($row['userStatus']==1) && ($row['doctorStatus']==0))  
                    {
                      echo "Cancelled by You";
                    }
                        ?></td>

                     <td>
                        <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
                        { ?>

													
	                        <a href="appointments.php?ID=<?php echo $row['paid']?>&cancel=update" 
                              onClick="return confirm('Are you sure you want to cancel this appointment ?')"
                              title="Cancel Appointment" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger">Cancel</button></a>
	                        <?php } else {

                                echo "Cancelled";
                                } ?>
                        
                        </td>

                        <td>

                        <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
                        { ?>

                        <!-- <a href="prescribe.php?pid=<?php echo $row['pid']?>&paid=<?php echo $row['paid']?>&fname=<?php echo $row['fname']?>&lname=<?php echo $row['lname']?>&appdate=<?php echo $row['appdate']?>&apptime=<?php echo $row['apptime']?>"
                        tooltip-placement="top" tooltip="Remove" title="prescribe">
                        <button class="btn btn-success">Prescribe</button></a> -->
                      <a href="prescribe.php?paid=<?php echo $row['paid']?>"
                        tooltip-placement="top" tooltip="Remove" title="prescribe">
                        <button class="btn btn-success">Prescribe</button></a>  
                        <?php } else {

                            echo "-";
                            } ?>
                        
                        </td>


                      </tr></a>
                    <?php $cnt++; } ?>
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