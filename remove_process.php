<!doctype html>
<html lang="en">
    <head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
        <link rel="stylesgeet" href="https://rawgit.com/creativetimofficial/material-kit/master/assets/css/material-kit.css">
            <!--Bootsrap 4 CDN-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        
        <!--Fontawesome CDN-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <!--Custom styles-->
        <link rel="stylesheet" type="text/css" href="styles.css">
            
      
        <title>Remove Process</title>
    </head>
    <body class="profile-page">
        <br>
        <div class="container">
            <div class="d-flex justify-content-center h-100">
                <div class="card">
                    <div class="card-header">
                        <div class="center">
                        <h3>REMOVE PROCESS</h3>
                        </div>
                        
                    </div>
                    <div class="card-body">
                         <?php
                            $conn = mysqli_connect("localhost","root","","radius"); // Conect to MySQL
                            mysqli_set_charset($conn,"utf8"); // MySQL utf-8
                            if($_POST['service_id'] != "Delete from service type" ) {
                                $removeid = $_POST['service_id'];
                                $conn = mysqli_connect("localhost","root","","radius"); // Conect to MySQL
                                mysqli_set_charset($conn,"utf8"); // MySQL utf-8     

                                    $rmsrv_id = $_POST['service_id'];
                                    $sql = "SELECT * FROM rm_users"; 
                                    $query = mysqli_query($conn,$sql);
                                        
                                    $sql1 = "DELETE FROM radcheck WHERE radcheck.username in ( SELECT rm_users.username FROM rm_users WHERE rm_users.srvid = $removeid )";

                                    $query = mysqli_query($conn,$sql1);

                                    $sql2 = "DELETE FROM rm_users WHERE srvid = $removeid";

                                    $query = mysqli_query($conn,$sql2);     

                                    $sql3 = "SELECT * FROM rm_services WHERE srvid = $rmsrv_id LIMIT 1";
                                    $result = mysqli_query($conn,$sql3);
                                    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);            
                                
                            };
                            ?>                     
                   
               
                   
                        <?php   if( $_POST['service_id'] != "Delete from service type" ) { ?>
                            <div class="alert alert-success alert-dismissible fade show"><strong>Remove !</strong> Group  <?php echo $row['srvname'] ?> 
                            
                        </div>
                        <?php } else { ?> <div class="alert alert-danger alert-dismissible fade show">
                            
                            <strong>Danger!</strong> You chose other but has not typed anything
                            </div>
                        <?php } ?>  
                        <br>
                    <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3"><a class="btn btn-primary" href="remove.php" role="button">Back</a></div>
                    
                    
                    
                    
                    </div>
                </div>
            </div>
        </div>
       

     
     

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>