
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>CMS</title>
  <link rel="shortcut icon" type="image/x-icon" href="image/icon.png" />


    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">




  </head>

  <body style="background: linear-gradient(to bottom, #000C40, #F0F2F0); background-size: cover; margin-bottom:7%">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" >
    <div class="container">

      <a class="navbar-brand js-scroll-trigger" href="index.php" style="margin-top: 10px;margin-left:-65px;font-family: 'IBM Plex Sans', sans-serif;"><h4><i class="fa fa-medkit" aria-hidden="true"></i>&nbsp CLINIC MANAGEMENT SYSTEM</h4></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

    </div>
  </nav>



      <div class="row">





         <div class="col-md-5" style="margin-top: 10%;margin-left:30%;right: 5%">
          <div class="card" style="font-family: 'IBM Plex Sans', sans-serif;">
            <div class="card-body">
              <center>
                <i class="fa fa-hospital-o fa-3x" aria-hidden="true" style="color:#0062cc"></i>
                <br>
              <h3 style="margin-top: 10%">Patient Login</h3><br>
              <form class="form-group" method="POST" action="func.php">
                <div class="row" style="margin-top: 10%">
                  <div class="col-md-4"><label>Email: </label></div>
                  <div class="col-md-8"><input type="email" name="email" class="form-control" placeholder="Email" required/></div><br><br>
                  <div class="col-md-4" style="margin-top: 8%"><label>Password: </label></div>
                  <div class="col-md-8" style="margin-top: 8%"><input type="password" class="form-control" name="password2" placeholder="Password" required/></div><br><br><br>
                </div>
                <div class="row">
                 <div class="col-md-4"  style="padding-left: 160px;margin-top: 10%">
                    <input type="submit" id="inputbtn" name="patsub" value="Login" class="btn btn-success"></div>
                  <div class="col-md-8" style="margin-top: 10%">
                    <a href="index.php" class="btn btn-primary">Back</a></div>
                </div>
              </form>
            </center>
            </div>
          </div>
        </div>


      </div>





  </body>
</html>
