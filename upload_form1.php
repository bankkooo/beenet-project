<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="theme.css">

        <title>Import Radius Users : Upload Form</title>
    </head>
    <body>
        <div class="container border border-light my-md-5 p-4">
            <form action="upload_process.php" method="post" enctype="multipart/form-data" name="upload_form">
                <div class="row mb-4">
                    <div class="col">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="fileCSV" id="fileCSV" onchange="processSelectedFiles(this)" required>
                            <label class="custom-file-label" id="fileCSV_label" for="fileCSV">Choose .csv file</label>
                        </div>
                    </div>
                    <div class="col">
                        <select class="custom-select" name="service_id" id="service_id" required>
                            <option selected>Select service type</option>
                            <?php
                                $conn = mysqli_connect("localhost","importuser","secret","radius"); // Conect to MySQL
                                mysqli_set_charset($conn, "utf8");
                                $sql = "SELECT `srvid`, `srvname` FROM `rm_services`";
                                $query = mysqli_query($conn,$sql);
                                while($objResult = mysqli_fetch_array($query)){
                                    echo '<option value="'.$objResult['srvid'].'">'.$objResult['srvname'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Enter device(s) per user" name="simu_use" id="simu_use" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
                
                <h1></h1><h1></h1><h1></h1><h1></h1>
                <div class="col">
                        <select class="custom-select" name="service_id" id="service_id" required>
                            <option selected>Update from group name</option>
                            <?php
                                $conn = mysqli_connect("localhost","importuser","secret","radius"); // Conect to MySQL
                                mysqli_set_charset($conn, "utf8");
                                $sql = "SELECT `srvid`, `srvname` FROM `rm_services`";
                                $query = mysqli_query($conn,$sql);
                                while($objResult = mysqli_fetch_array($query)){
                                    echo '<option value="'.$objResult['srvid'].'">'.$objResult['srvname'].'</option>';
                                }
                            ?>
                        </select>
                </div>
                <h1></h1><h1></h1><h1></h1><h1></h1>

                <div class="col">
                        <select class="custom-select" name="service_id" id="service_id" required>
                            <option selected>Update to group name</option>
                            <?php
                                $conn = mysqli_connect("localhost","importuser","secret","radius"); // Conect to MySQL
                                mysqli_set_charset($conn, "utf8");
                                $sql = "SELECT `srvid`, `srvname` FROM `rm_services`";
                                $query = mysqli_query($conn,$sql);
                                while($objResult = mysqli_fetch_array($query)){
                                    echo '<option value="'.$objResult['srvid'].'">'.$objResult['srvname'].'</option>';
                                }
                            ?>
                        </select>
                </div>


            </form>
        </div>

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
    </body>
</html>