<!DOCTYPE html>
<?php
include 'doctorHeader.php';
// include('../func1.php');

$paid='';
$prid='';

$doctor = $_SESSION['dname'];
if(isset($_GET['paid']) ) {
$paid = $_GET['paid'];
 
}



if(isset($_POST['prescribe']) && isset($_POST['paid'])){
  
  $disease = $_POST['disease'];
 
  $paid = $_POST['paid'];
  $allergy = $_POST['allergy'];
  $prescription = $_POST['prescription'];

  $queryins=mysqli_query($con,"insert into prestb(disease,allergy,prescription) values('$disease','$allergy','$prescription')");

  if($queryins)
  {

   
$sql1="SELECT max(ID) as ID from prestb";
	
$compile=mysqli_query($con,$sql1 );

$countUser=mysqli_num_rows($compile); 
if($countUser==1){
    $row = mysqli_fetch_array($compile);
    $_SESSION['id']= $row["ID"];
    $prid=$_SESSION['id'];



      $query=mysqli_query($con," update appointmenttb set prid='$prid' where paid='$paid' ");
      if($query)
      {
      
        echo "<script>alert('Prescribedsuccessfully!');
        window.location.href = 'presciptionList.php';</script>";
      }
      else{
        echo "<script>alert('Unable to process your request. Try again!');</script>";
      }
    }

  
  }
  
}

?>

<html lang="en">
 


<body style="padding-top:50px;">
   <div class="container-fluid" style="margin-top:50px;">

   <div class="tab-pane" id="list-pres" role="tabpanel" aria-labelledby="list-pres-list">
        <form class="form-group" name="prescribeform" method="post" action="prescribe.php">
        
          <div class="row">
            <div class="container">
              <div style="margin:0 200px;">
              <div class="form-group">
                <label>Disease:</label>
                <textarea id="disease" class="form-control" rows ="2" column="5" name="disease" required></textarea>
              </div>
              <br>
              <div class="form-group">
                <label>Allergies:</label>
                <textarea id="allergy" class="form-control" rows ="2" name="allergy" required></textarea>
              </div>
      <br>
              <div class="form-group">
                <label>Prescription:</label>
                <textarea id="prescription"class="form-control" rows ="5" name="prescription" required></textarea>
              </div>
              <input type="hidden" name="paid" value="<?php echo $paid ?>" />
                   
                  <div class="row">
                    
         <div class="col-md-4"  style="margin-top: 2%">
            <input type="submit" name="prescribe" value="Prescribe" class="btn btn-success">
          </div>
          </div>
          <div class="col-md-8" style="margin-top: 1%">
            <a href="index.php" class="btn btn-primary" onclick="javascript:window.history.back(-1);return false;">Back</a>
          </div>
        </div>
            </div>
          </div>
        </form>
        <br>
        
      </div>
      </div>
      

  
