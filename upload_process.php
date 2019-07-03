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
            
        

        <title>Upload Process</title>
    </head>
    <body class="profile-page" >
        <br>
        <div class="container">
            <div class="d-flex justify-content-center h-100">
        <?php
            setlocale ( LC_ALL, 'en_US.UTF-8' ); // fgetcsv utf-8
            
            move_uploaded_file($_FILES["fileCSV"]["tmp_name"],$_FILES["fileCSV"]["name"]); // Copy/Upload CSV

            $conn = mysqli_connect("localhost","root","","radius"); // Conect to MySQL
            mysqli_set_charset($conn,"utf8"); // MySQL utf-8

            $objCSV = fopen($_FILES["fileCSV"]["name"], "r");
            $create_date = date('Y-m-d');
            $expire_date = date('Y-m-d', strtotime('+2 years'));
            $count = 0;
            $dup_count = 0;
            $dup_arr = array();
            $flag = true; // skip column header row
            while(($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
                if($flag) { $flag = false; continue; } // skip column header row

                $sql = "SELECT * FROM radcheck WHERE username = '".$objArr[0]."' "; // check duplicate user
                $query = mysqli_query($conn,$sql);
                $obj_result = mysqli_fetch_array($query);

                if($obj_result) {
                    array_push($dup_arr,$objArr[0]);
                    $dup_count++;
                }else{
                    $sql1 = "INSERT INTO radcheck(id,username,attribute,op,value)
                            VALUES ('','".$objArr[0]."','Cleartext-Password',':=','".$objArr[1]."') ";
                    $sql2 = "INSERT INTO radcheck(id,username,attribute,op,value)
                            VALUES ('','".$objArr[0]."','Simultaneous-Use',':=','".$_POST['simu_use']."') ";
                    $sql3 = "INSERT INTO rm_users(username,password,groupid,enableuser,firstname,lastname,srvid,expiration,createdon)
                            VALUES ('".$objArr[0]."','".md5($objArr[1])."','1','1','".$objArr[2]."','".$objArr[3]."','".$_POST['service_id']."','$expire_date','$create_date') ";
                    $query = mysqli_query($conn,$sql1);
                    $query = mysqli_query($conn,$sql2);
                    $query = mysqli_query($conn,$sql3);

                    $count++;
                }
            }
        
            $row = $count + $dup_count;
            $perc_succ = ($count/$row)*100;
            $perc_dup = ($dup_count/$row)*100;
        ?>
         <div class="card">
                    <div class="card-header">
                        <div class="center">
                        <h3>UPDATE PROCESS</h3>
                        </div>
                        
                    </div>
                    <div class="card-body">
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
                                <div class="col text-center">
                                   <button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#collapse_dup_users" aria-expanded="false" aria-controls="collapse_dup_users">
                                    Show Duplicate Users
                                </button>
                                </div>
                                
                            </p>
                            <div class="collapse mb-4" id="collapse_dup_users">
                                <div class="card card-body">
                                    <!-- Duplicate users -->
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
                            <div class="col-sm-3"></div>
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3"><a class="btn btn-primary" href="upload.php" role="button">Back</a></div>
                            </div>
                        
                    
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