<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="theme.css">

        <title>Import Radius Users : Upload Process</title>
    </head>
    <body>
        <?php
                $conn = mysqli_connect("localhost","root","","radius"); // Conect to MySQL
                mysqli_set_charset($conn,"utf8"); // MySQL utf-8
                $oldsrv_id = $_POST['service_id'];
                $newsrv_id = $_POST['service_id2'];
                $sql = "UPDATE rm_users SET srvid = $newsrv_id WHERE srvid = $oldsrv_id";
                $query = mysqli_query($conn,$sql);
                $sql = "SELECT `srvname` FROM `rm_service` WHERE 'srvid'=  $newsrv_id' LIMIT 1";
                $query = mysqli_query($conn,$sql);
              

        ?>
        <div class="subheading mb-5 text-center">Update Group Name
            <?php echo $query ?> <span class="text-success">Completed</span>
            
        </div>

       
           

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>