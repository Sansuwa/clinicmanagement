<!DOCTYPE html>
<html lang="en">
<?php
  include './adminHeader.php';
  $did=$_GET['did'];
  
  if (isset($_POST['docsub1'])) {
  $con = mysqli_connect("localhost", "root", "", "cmsupdate");
    $did = $_POST['did'];
    $query = "delete from doctb where did='$did';";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<script>alert('Doctor removed successfully!');
        window.location.href = 'viewDoctors.php';</script>";
    } else {
         echo "<script>alert('Unable to delete! Doctor has appoinment.');
         
         window.location.href = 'viewDoctors.php';</script>";
    }
}

$query1 = "select * from doctb where did=$did";
$result1 = mysqli_query($con,$query1);

while ($row = mysqli_fetch_array($result1)){
  $doctorname = $row['doctorname'];
  $spec = $row['spec'];
  $email = $row['email'];
}
 

?>
  <body style="padding-top:50px;">


  <div class="col-md-4" style="margin:3% 40%">
  
      
      <table>
        <tr><td>Name :</td><td><?php echo $doctorname?></td></tr>
        
        <tr><td>Email :</td><td><?php echo $email?></td></tr>
        <tr><td>Specification :</td><td><?php echo $spec?></td></tr>
    
      </table>
      <br>
        <form class="form-group" method="post">
          <div class="row">
          
          <input type="hidden" name="did" value=<?php echo $_GET['did'];?>>
                  
                </div>
          <input type="submit" name="docsub1" style="float:right; " value="Delete Doctor" class="btn btn-danger" onclick="confirm('do you really want to delete?')">
        </form>
      </div>
  
           <a href="viewDoctors.php" style="padding-left:55%"><button class="btn btn-secondary">Back</button></a>
      </div>
      </div>
    


  </body>
</html>