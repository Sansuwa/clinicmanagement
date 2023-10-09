<!DOCTYPE html>
<html lang="en">
<?php
  include './patientHeader.php';
  $con=mysqli_connect("localhost","root","","cmsupdate");
  if (isset($_POST['app-submit'])) {
    $pid = $_SESSION['pid'];
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $gender = $_SESSION['gender'];
    $contact = $_SESSION['contact'];
    $doctor = $_POST['doctor'];
    $email = $_SESSION['email'];
    # $fees=$_POST['fees'];
    $docFees = $_POST['docFees'];

    $appdate = $_POST['appdate'];
    $apptime = $_POST['apptime'];
    $cur_date = date("Y-m-d");
    date_default_timezone_set('Asia/Kathmandu');
    $cur_time = date("H:i:s");
    $apptime1 = strtotime($apptime);
    $appdate1 = strtotime($appdate);



    if (date("Y-m-d", $appdate1) >= $cur_date) {
        if ((date("Y-m-d", $appdate1) == $cur_date and date("H:i:s", $apptime1) > $cur_time) or date("Y-m-d", $appdate1) > $cur_date) {

             
          $sql1="SELECT did  from doctb where username='$doctor'";
	
          $compile=mysqli_query($con,$sql1 );
          
          $countUser=mysqli_num_rows($compile); 
          if($countUser==1){
              $row = mysqli_fetch_array($compile);
              $_SESSION['did']= $row["did"];
              $did=$_SESSION['did'];
          

      $query="insert into appointmenttb(pid, did, appdate, apptime,userStatus,doctorStatus) values('$pid','$did','$appdate','$apptime',1,1)";
  $result=mysqli_query($con,$query);
  if($result)
    {
      echo "<script>alert('Your appointment successfully booked');</script>";
  }
  else {
                 echo "<script>alert('Unable to process your request. Please try again!');</script>";
     }
          
        } 
        


      }


        else {
            echo "<script>alert('Select a time or date in the future!');</script>";
        }
    } else {
        echo "<script>alert('Select a time or date in the future!');</script>";
    }

}

  ?>

<body style="padding-top:50px;">


    


        <!-- for vertical navbar -->
        <div class="row">
            <div class="col-md-4" style="max-width:25%; margin-top: 3%">
                <div class="list-group" id="list-tab" role="tablist">
                     <a class="list-group-item list-group-item-action" id="list-dash-list" data-toggle="list" href="./dashboard.php" role="tab" aria-controls="home">Dashboard</a>
                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="./bookAppointment.php" role="tab" aria-controls="home">Book Appointment</a>
                    <a class="list-group-item list-group-item-action" href="./appointnemtHistory.php" id="list-pat-list" role="tab" data-toggle="list" aria-controls="home">Appointment History</a>
                    <a class="list-group-item list-group-item-action" href="./presciptions.php" id="list-pres-list" role="tab" data-toggle="list" aria-controls="home">Prescriptions</a>
                    
                </div><br>
            </div>

            <div class="col-md-8" style="margin-top: 3%;">
    <div class="tab-content" id="nav-tabContent" style="width: 950px;">  
        
              <div class="tab-pane fade  show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <center><h4>Book Appointment</h4></center><br>
              <form class="form-group" method="post">
                <div class="row">


                    <div class="col-md-4">
                          <label for="spec">Specialization:</label>
                        </div>
                        <div class="col-md-8">
                          <select name="spec" class="form-control" id="spec">
                              <option value="" disabled selected>Select Specialization</option>
                              <?php 
                              display_specs();
                              ?>
                          </select>
                        </div>

                        <br><br>

                        
                        <script>
                      document.getElementById('spec').onchange = function foo() {
                        let spec = this.value;   
                        console.log(spec)
                        let docs = [...document.getElementById('doctor').options];
                        
                        docs.forEach((el, ind, arr)=>{
                          arr[ind].setAttribute("style","");
                          if (el.getAttribute("data-spec") != spec ) {
                            arr[ind].setAttribute("style","display: none");
                          }
                        });
                      };

                  </script>

              <div class="col-md-4"><label for="doctor">Doctors:</label></div>
                <div class="col-md-8">
                    <select name="doctor" class="form-control" id="doctor" required="required">
                      <option value="" disabled selected>Select Doctor</option>
                
                      <?php
                       display_docs();
                       ?>
                    </select>
                  </div><br/><br/> 

                        <script>
              document.getElementById('doctor').onchange = function updateFees(e) {
                var selection = document.querySelector(`[value=${this.value}]`).getAttribute('data-value');
                document.getElementById('docFees').value = selection;
              };
            </script>
                  
                  <div class="col-md-4"><label for="consultancyfees">
                                Consultancy Fees
                              </label></div>
                              <div class="col-md-8">
                              <!-- <div id="docFees">Select a doctor</div> -->
                              <input class="form-control" type="text" name="docFees" id="docFees" readonly="readonly"/>
                  </div><br><br>

                  <div class="col-md-4"><label>Appointment Date</label></div>
                  <div class="col-md-8"><input type="date" class="form-control datepicker" name="appdate"></div><br><br>

                  <div class="col-md-4"><label>Appointment Time</label></div>
                  <div class="col-md-8">
                    <!-- <input type="time" class="form-control" name="apptime"> -->
                    <select name="apptime" class="form-control" id="apptime" required="required">
                      <option value="" disabled selected>Select Time</option>
                     
                      <option value="10:00:00">10:00 AM</option>
                      <option value="12:00:00">12:00 PM</option>
                      <option value="14:00:00">2:00 PM</option>
                      <option value="16:00:00">4:00 PM</option>
                    </select>

                  </div><br><br>

                  <div class="col-md-4">
                    <input type="submit" name="app-submit" value="Create new entry" class="btn btn-primary" id="inputbtn">
                  </div>
                  <div class="col-md-8"></div>                  
                </div>
              </form>
            </div>
          </div>
        </div><br>
      </div>
      

    </div>
    </div>
   </div>
   </div>
    
</body>
        </html>