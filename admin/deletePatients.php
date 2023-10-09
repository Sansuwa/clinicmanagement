<!DOCTYPE html>
<html lang="en">
<?php
  include './adminHeader.php';
  $pid=$_GET['pid'];
  if (isset($_POST['delpat'])) {
  $con = mysqli_connect("localhost", "root", "", "cmsupdate");
    $pid = $_POST['pid'];
    $query = "delete from patreg where pid='$pid';";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<script>alert('Patient removed successfully!');
        window.location.href = 'viewPatients.php';</script>";
    } else {
        echo "<script>alert('Unable to delete! Patient has appoinment');</script>";
    }
}
$con = mysqli_connect("localhost", "root", "", "cmsupdate");
    $query1 = "select * from patreg where pid=$pid";
    $result1 = mysqli_query($con, $query1);
    
    while ($row = mysqli_fetch_array($result1)) {
     
      $fname = $row['fname'];
      $lname = $row['lname'];
      $gender = $row['gender'];
      $email = $row['email'];
      $contact = $row['contact'];
}






?>
  <body style="padding-top:50px;">


  <div class="col-md-4" style="margin: 3% 40%;">
   
      <table>
        <tr><td>Full Name :</td><td><?php echo $fname?><?php echo $lname?></td></tr>
        <tr><td>Gender :</td><td><?php echo $gender?></td></tr>
        <tr><td>Email :</td><td><?php echo $email?></td></tr>
        <tr><td>Contact :</td><td><?php echo $contact?></td></tr>
    
      </table>
      <br>
      <form class="form-group" method="post">
        <input type="hidden" name="pid" value=<?php echo $_GET['pid'];?>>
          <input type="submit" name="delpat" style="float:right;" value="Delete Patient" class="btn btn-danger" onclick="confirm('do you really want to delete?')">
        </form>
      </div>
      
           <a href="viewPatients.php" style="padding-left:55%"><button class="btn btn-secondary">Back</button></a>
      </div>
      </div>
      </div>
      </div>
    


  </body>
</html>