<!DOCTYPE html>
<html lang="en">
<?php
  include './patientHeader.php';
  if (isset($_GET['cancel'])) {
    $query = mysqli_query($con, "update appointmenttb set userStatus='0' where paid = '" . $_GET['ID'] . "'");
    if ($query) {
        echo "<script>alert('Your appointment successfully cancelled');</script>";
    }
}

  ?>
<body style="padding-top:50px;">

    


        <!-- for vertical navbar -->
        <div class="row">
            <div class="col-md-4" style="max-width:25%; margin-top: 3%">
                <div class="list-group" id="list-tab" role="tablist">
                     <a class="list-group-item list-group-item-action" id="list-dash-list" data-toggle="list" href="./dashboard.php" role="tab" aria-controls="home">Dashboard</a>
                    <a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" href="./bookAppointment.php" role="tab" aria-controls="home">Book Appointment</a>
                    <a class="list-group-item list-group-item-action active" href="./appointnemtHistory.php" id="list-pat-list" role="tab" data-toggle="list" aria-controls="home">Appointment History</a>
                    <a class="list-group-item list-group-item-action" href="./presciptions.php" id="list-pres-list" role="tab" data-toggle="list" aria-controls="home">Prescriptions</a>
                    
                </div><br>
            </div>
            <div class="col-md-8" style="margin-top: 3%;">
    <div class="tab-content" id="nav-tabContent" style="width: 950px;">  
        
<div class="tab-pane fade show active" id="app-hist" role="tabpanel" aria-labelledby="list-pat-list">
        
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Doctor</th>
                    <th scope="col">Fees</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

                    $con=mysqli_connect("localhost","root","","cmsupdate");
                    global $con;

                    $query = "select apm.paid, doc.doctorname as doctor, doc.docFees, apm.appdate, apm.apptime,  apm.userStatus, apm.doctorStatus
                     from appointmenttb  as apm, doctb as doc, patreg as pre
                     where doc.did=apm.did and pre.pid=apm.pid and pre.fname ='$fname' and pre.lname='$lname';";
                    $result = mysqli_query($con,$query);
                    $cnt=1;
                    while ($row = mysqli_fetch_array($result)){
              
                      #$fname = $row['fname'];
                      #$lname = $row['lname'];
                      #$email = $row['email'];
                      #$contact = $row['contact'];
                  ?>
                      <tr>
                        <td><?php echo $cnt;?></td>
                        <td><?php echo $row['doctor'];?></td>
                        <td><?php echo '$'.$row['docFees'];?></td>
                        <td><?php echo $row['appdate'];?></td>
                        <td><?php echo $row['apptime'];?></td>
                        
                          <td>
                    <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
                    {
                      echo "Active";
                    }
                    if(($row['userStatus']==0) && ($row['doctorStatus']==1))  
                    {
                      echo "Cancelled by You";
                    }

                    if(($row['userStatus']==1) && ($row['doctorStatus']==0))  
                    {
                      echo "Cancelled by Doctor";
                    }
                        ?></td>

                        <td>
                        <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
                        { ?>

													
	                        <a href="appointnemtHistory.php?ID=<?php echo $row['paid']?>&cancel=update" 
                              onClick="return confirm('Are you sure you want to cancel this appointment ?')"
                              title="Cancel Appointment" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger">Cancel</button></a>
	                        <?php } else {

                                echo "Cancelled";
                                } ?>
                        
                        </td>
                      </tr>
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