<!DOCTYPE html>
<html lang="en">
<?php
  include './patientHeader.php';
  ?>

<body style="padding-top:50px;">



        <!-- for vertical navbar -->
        <div class="row">
            <div class="col-md-4" style="max-width:25%; margin-top: 3%">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action" id="list-dash-list" data-toggle="list" href="./dashboard.php" role="tab" aria-controls="home">Dashboard</a>
                    <a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" href="./bookAppointment.php" role="tab" aria-controls="home">Book Appointment</a>
                    <a class="list-group-item list-group-item-action" href="./appointnemtHistory.php" id="list-pat-list" role="tab" data-toggle="list" aria-controls="home">Appointment History</a>
                    <a class="list-group-item list-group-item-action active" href="./presciptions.php" id="list-pres-list" role="tab" data-toggle="list" aria-controls="home">Prescriptions</a>
                    
                </div><br>
            </div>
            <div class="col-md-8" style="margin-top: 3%;">
    <div class="tab-content" id="nav-tabContent" style="width: 950px;">  
        
              <div class="tab-pane fade show active" id="list-pres" role="tabpanel" aria-labelledby="list-pres-list">
        
              <table class="table table-hover">
                <thead>
                  <tr>
                    
                    <th scope="col">Doctor</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment Time</th>
                    <th scope="col">Diseases</th>
                    <th scope="col">Allergies</th>
                    <th scope="col">Prescriptions</th>
                    <th scope="col">Payment</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

                    $con=mysqli_connect("localhost","root","","cmsupdate");
                    global $con;

                    $query = "SELECT pr.ID,pre.fname, doc.doctorname as doctor, apm.appdate, apm.apptime ,
                    pr.disease, pr.prescription, pr.allergy FROM prestb as pr, appointmenttb as apm , 
                    doctb as doc, patreg as pre WHERE apm.prid= pr.ID and apm.did= doc.did and 
                    apm.pid= pre.pid and apm.pid='$pid';";
                    
                    $result = mysqli_query($con,$query);
                    if(!$result){
                      echo mysqli_error($con);
                    }
                    

                    while ($row = mysqli_fetch_array($result)){
                  ?>
                      <tr>
                        <td><?php echo $row['doctor'];?></td>
                        <td><?php echo $row['appdate'];?></td>
                        <td><?php echo $row['apptime'];?></td>
                        <td><?php echo $row['disease'];?></td>
                        <td><?php echo $row['allergy'];?></td>
                        <td><?php echo $row['prescription'];?></td>
                        <td>
                          <form method="get">
                              <a href="presciptions.php?ID=<?php echo $row['ID']?>">
                                 <input type ="hidden" name="ID" value="<?php echo $row['ID']?>"/>
                                 <input type = "submit" onclick="alert('Bill Paid Successfully');" name ="generate_bill" class = "btn btn-success" value="Pay Bill"/>
                              </a>
                          </form>
                        </td>
                              

                    
                      </tr>
                    <?php }
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