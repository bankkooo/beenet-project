<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="theme.css">

        <!-- Custom fonts for this template -->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/resume.min.css" rel="stylesheet">

        <title>Remove Process</title>
    </head>
    <body>
        <?php
        
            $removeid = $_POST['service_id'];
            $conn = mysqli_connect("localhost","root","","radius"); // Conect to MySQL
            mysqli_set_charset($conn,"utf8"); // MySQL utf-8     

                $sql = "SELECT * FROM rm_users"; 
                $query = mysqli_query($conn,$sql);
                	
                    $sql1 = "DELETE FROM radcheck WHERE radcheck.username in ( SELECT rm_users.username FROM rm_users WHERE rm_users.srvid = $removeid )";

                    $query = mysqli_query($conn,$sql1);

                    $sql2 = "DELETE FROM rm_users WHERE srvid = $removeid";

                    $query = mysqli_query($conn,$sql2);                
               
        ?>

        <br>
        <div class="subheading mb-5 text-center">Remove Group Number
            <?php echo $_POST['service_id']  ?> Completed
            
        </div>


        
        <div class="row">
                <div class="col text-center">
                    <a class="btn btn-primary" href="remove.php" role="button">Back</a>
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