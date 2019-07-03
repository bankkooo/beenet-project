<?php 
  session_start(); 

   if (isset($_SESSION['managername']) == 0) {
     $_SESSION['msg'] = "You must log in first";
     header('location: login.php');
   }
  $username = $_SESSION['managername'];



  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Update Radius Users</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/resume.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">
      <span class="d-block d-lg-none">Update Form</span>
      <span class="d-none d-lg-block">
       <!-- <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="img/profile.jpg" alt=""> -->
      </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="upload.php">Upload</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="update.php">Update</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="remove.php">Remove</a>
        </li>
        <br><br>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" style="color: black;">User: <?php echo $username ?> </a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="index.php?logout='1'" style="color: red;">Log Out</a>
        </li>

      </ul>
    </div>
  </nav>

  <div class="container-fluid p-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="about">
      <div class="w-100">
        <h1 class="mb-0">Update
          <span class="text-success">Form</span>
        </h1>
      	<br><br>       
        <form action="update_process.php" method="post" enctype="multipart/form-data" name="update_form">
            <h1></h1><h1></h1><h1></h1>
                <div class="col">
                        <select class="custom-select" name="service_id" id="service_id" onchange="processSelectedFiles(this)" required>
                            <option selected>Update from service type</option>
                            <?php
                                $conn = mysqli_connect("localhost","root","","radius"); // Conect to MySQL
                                mysqli_set_charset($conn, "utf8");
                                $sql = "SELECT rm_services.srvid,rm_services.srvname FROM rm_services INNER JOIN rm_allowedmanagers ON rm_services.srvid = rm_allowedmanagers.srvid WHERE managername = '".$username."'";

                                $query = mysqli_query($conn,$sql);
                                while($objResult = mysqli_fetch_array($query)){
                                    echo '<option value="'.$objResult['srvid'].'">'.$objResult['srvname'].'</option>';
                                }
                            ?>
                        </select>
                </div>
                <h1></h1><h1></h1><h1></h1><h1></h1>

                <div class="col">
                        <select class="custom-select" name="service_id2" id="service_id2" required>
                            <option selected>Update to service type</option>
                            <?php
                               $conn = mysqli_connect("localhost","root","","radius"); // Conect to MySQL
                                mysqli_set_charset($conn, "utf8");
                                $sql = "SELECT rm_services.srvid,rm_services.srvname FROM rm_services INNER JOIN rm_allowedmanagers ON rm_services.srvid = rm_allowedmanagers.srvid WHERE managername = '".$username."'";
                                $query = mysqli_query($conn,$sql);
                                while($objResult = mysqli_fetch_array($query)){
                                    echo '<option value="'.$objResult['srvid'].'">'.$objResult['srvname'].'</option>';
                                }
                            ?>
                        </select>
                </div>
                

                <h1></h1><h1></h1><h1></h1><h1></h1><h1></h1><h1></h1><h1></h1><h1></h1>

                 <div class="row">
                    <div class="col text-center">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Update</button>
                    </div>
                  </div>
                  <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                        
                          <h4 class="modal-title">Update Process</h4> 
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                        <h4 class="modal-title">detail</h4> 
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Update</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                      
                    </div>
                  </div>
        </form>
      

         <!--        <h1></h1><h1></h1><h1></h1><h1></h1><h1></h1><h1></h1><h1></h1>      
                <button type="button" class="btn btn-primary" onclick="window.location.href='upload_form.php'">Upload</button>  -->
                
                



        <!-- Optional JavaScript -->
        <script type="text/javascript">
            // show selected file name
            function processSelectedFiles(fileInput) {
                var file_name = fileInput.files[0].name;
                document.getElementById("fileCSV_label").innerHTML = file_name;
            }
        </script>
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        
	<!-- <H5> Contact Us </H5>
        <div class="social-icons">
          <a href="https://www.facebook.com/BeenetEngineering">
            <i class="fab fa-facebook-f"></i>
          </a>
        </div> -->
	<br><br>
	<div class="subheading mb-5 text-center">Powered by
          <a class="text-success text-center" href="https://www.beenet-engineering.com">Beenet Engineering</a>
        </div>


      </div>
    </section>

    <hr class="m-0">

       

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/resume.min.js"></script>

</body>

</html>