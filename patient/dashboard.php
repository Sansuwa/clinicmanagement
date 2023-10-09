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
                    <a class="list-group-item list-group-item-action active" id="list-dash-list" data-toggle="list" href="./dashboard.php" role="tab" aria-controls="home">Dashboard</a>
                    <a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" href="./bookAppointment.php" role="tab" aria-controls="home">Book Appointment</a>
                    <a class="list-group-item list-group-item-action" href="./appointnemtHistory.php" id="list-pat-list" role="tab" data-toggle="list" aria-controls="home">Appointment History</a>
                    <a class="list-group-item list-group-item-action" href="./presciptions.php" id="list-pres-list" role="tab" data-toggle="list" aria-controls="home">Prescriptions</a>
                    
                </div><br>
            </div>
            <div class="col-md-8" style="margin-top: 3%;">
    <div class="tab-content" id="nav-tabContent" style="width: 950px;">  
        
        
        <div class="tab-pane fade  show active" id="list-dash" role="tabpanel" aria-labelledby="list-dash-list">
                <div class="container-fluid container-fullw bg-white" >
                    <div class="row">
                        <div class="col-sm-4" style="left: 5%">
                            <div class="panel panel-white no-radius text-center">
                            <div class="panel-body">
                                <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-bookmark fa-stack-1x fa-inverse"></i> </span>
                                <h4 class="StepTitle" style="margin-top: 5%;"> Book My Appointment</h4>
                                <!-- <script>
                                    function clickDiv(id) {
                          document.querySelector(id).click();
                        }
                      </script>                       -->
                      <p class="links cl-effect-1">
                        <a href="./bookAppointment.php" onclick="clickDiv('#list-home-list')">
                          Book Appointment
                        </a>
                      </p>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4" style="left: 10%">
                    <div class="panel panel-white no-radius text-center">
                    <div class="panel-body" >
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">My Appointments</h2>
                    
                      <p class="cl-effect-1">
                        <a href="./appointnemtHistory.php" onclick="clickDiv('#list-pat-list')">
                          View Appointment History
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
                </div>

                <div class="col-sm-4" style="left: 20%;margin-top:5%">
                  <div class="panel panel-white no-radius text-center">
                      <div class="panel-body" >
                          <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-file-powerpoint-o fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Prescriptions</h2>
                        
                      <p class="cl-effect-1">
                        <a href="./presciptions.php" onclick="clickDiv('#list-pres-list')">
                          View Prescription List
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
                
                
            </div>
        </div>
    </div>
    </div>
   </div>
   </div>
    
</body>
        </html>