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

                /*$sql = "SELECT * FROM group"; 
                $query = mysqli_query($conn,$sql);
                            
                // $sql1 = "DELETE FROM testbeenet.group WHERE groupid = '".$objResult[groupid]."'";
                $sql1 = "DELETE FROM testbeenet.group WHERE groupid = 1";
            
                $query = mysqli_query($conn,$sql1);*/

        ?>

        <!--<div class="container border border-light my-md-5 p-4">
            <div class="row">
                <div class="col text-center">
                    <span class="text-success"><?php echo "Success import: ".$count." records";?></span>
                    <span> | </span>
                    <span class="text-danger"><?php echo "Duplicate import: ".$dup_count." records";?></span>
                </div>
            </div>
            <div class="progress mb-4" style="height: 20px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo number_format((float)$perc_succ, 2, '.', '') . "%"; ?>" 
                    aria-valuenow="<?php echo number_format((float)$perc_succ, 2, '.', ''); ?>" aria-valuemin="0" aria-valuemax="100">
                    <?php echo number_format((float)$perc_succ, 2, '.', '') . " %"; ?>
                </div>
                <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo number_format((float)$perc_dup, 2, '.', '') . "%"; ?>" 
                    aria-valuenow="<?php echo number_format((float)$perc_dup, 2, '.', ''); ?>" aria-valuemin="0" aria-valuemax="100">
                    <?php echo number_format((float)$perc_dup, 2, '.', '') . " %"; ?>
                </div>
            </div>
            <?php if($dup_count > 0) {?>
            <p>
                <button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#collapse_dup_users" aria-expanded="false" aria-controls="collapse_dup_users">
                    Show Duplicate Users
                </button>
            </p>
            <div class="collapse mb-4" id="collapse_dup_users">
                <div class="card card-body">
                     Duplicate users 
                    <?php
                        $chk = true;
                        foreach ($dup_arr as $dup_uname) {
                            if($chk){
                                echo "Already exist user(s): ".$dup_uname;
                                $chk = false;
                            }else{
                                echo ", ".$dup_uname;
                            }
                        }
                    ?>
                </div>
            </div>
            <?php } ?>
            <div class="row">
                <div class="col text-center">
                    <a class="btn btn-primary" href="upload_form.php" role="button">Back</a>
                </div>
            </div>
        </div>-->

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>