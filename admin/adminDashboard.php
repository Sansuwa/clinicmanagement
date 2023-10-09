<!DOCTYPE html>
<html lang="en">
<?php
  include './adminHeader.php';
?>
  <body style="padding-top:50px;">


<div class="col-md-4" style="max-width:25%;margin-top: 3%;">
        <div class="list-group" id="list-tab" role="tablist">
          <a class="list-group-item list-group-item-action active" id="list-dash-list" data-toggle="list"
            href="adminDashboard.php" role="tab" aria-controls="home">Dashboard</a>
          <a class="list-group-item list-group-item-action" href="viewDoctors.php" id="list-doc-list" role="tab"
            aria-controls="home" data-toggle="list">View Doctors</a>
          <a class="list-group-item list-group-item-action" href="viewPatients.php" id="list-pat-list"
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



      <div class="tab-pane fade show active" id="list-dash" role="tabpanel" aria-labelledby="list-dash-list">
        <div class="container-fluid container-fullw bg-white" >
              <div class="row">
               <div class="col-sm-4">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-user-md fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Doctor List</h4>
                      <p class="links cl-effect-1">
                        <a href="./viewDoctors.php" onclick="clickDiv('#list-doc-list')">
                          View Doctors
                        </a>
                      </p>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4" style="left: -3%">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body" >
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-users fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Patient List</h4>
                      
                      <p class="cl-effect-1">
                        <a href="./viewPatients.php" onclick="clickDiv('#list-pat-list')">
                          View Patients
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
              

                <div class="col-sm-4">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body" >
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Appointment Details</h4>
                    
                      <p class="cl-effect-1">
                        <a href="./appointmentDetails.php" onclick="clickDiv('#list-app-list')">
                          View Appointments
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
                </div>
<!-- 
                <div class="row">
                <div class="col-sm-4" style="left: 13%;margin-top: 5%;">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body" >
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-file-powerpoint-o fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Prescription List</h4>
                    
                      <p class="cl-effect-1">
                        <a href="./presciptionList1.php" onclick="clickDiv('#list-pres-list')">
                          View Prescriptions
                        </a>
                      </p>
                    </div>
                  </div>
                </div> -->


                <div class="col-sm-4" style="left: 18%;margin-top: 5%">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body" >
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-plus-circle fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Manage Doctors</h4>
                    
                      <p class="cl-effect-1">
                        <a href="./addDoctor.php" onclick="clickDiv('#list-adoc-list')">Add Doctors</a>
                       
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
      </div>
    


  </body>
</html>