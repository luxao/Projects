<?php

use JetBrains\PhpStorm\Pure;

    $sizeDesc = "fileSizeDesc";
    $sizeAsc = "fileSizeAsc";
    $DateDesc = "fileDateDesc";
    $DateAsc = "fileDateAsc";
    $urlDir = $_GET['getDirContent'];
    $urlName = $_GET['sorting'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Files upload</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/44b171361e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <link rel='stylesheet' type='text/css' href='css/style.css' />
    <link href="https://fonts.googleapis.com/css2?family=Amaranth&display=swap" rel="stylesheet">
</head>

<body>

<header>
    <nav class="navbar  navbar-dark bg-dark">
        <h1>Files <i class="fas fa-file-upload"></i></h1>
    </nav>
</header>

<main>

    <div class="container">
        <table class='table table-dark table-hover'>
            <thead>
            <tr>
                <th>Názov súboru
                    <form action='index.php' method='post'>
                        <button type='submit' name='sortNamesDesc'><i class='fas fa-sort-alpha-down-alt'></i></button>
                        <button type='submit' name='sortNamesAsc'><i class='fas fa-sort-alpha-down'></i></button>
                        <a href='index.php'><i class='fas fa-undo'></i></a>
                    </form></th>
                <th>veľkosť súboru <small>(KB)</small>  <form action='index.php' method='post'>
                        <a  href='?sorting=<?php echo $sizeDesc?>'><i class='fas fa-sort-numeric-down'></i></a>
                        <a href='?sorting=<?php echo $sizeAsc?>' > <i class='fas fa-sort-numeric-down-alt'></i></a>
                    </form></th>

                <th>Dátum <form action='index.php' method='post'>
                        <a href='?sorting=<?php echo $DateDesc?>'><i class='fas fa-sort-amount-up'></i></a>
                        <a href='?sorting=<?php echo $DateAsc?>' ><i class='fas fa-sort-amount-down-alt'></i></a>
                    </form></th>
            </tr>
            </thead>

            <?php
            //nastavenie europskeho času
            date_default_timezone_set("Europe/Bratislava");
            if(!$_GET['getDirContent']){

            $directory = "../files/";
            //načitanie obsahu priečinka bez . a ..
            $dir = array_diff(scandir($directory), array('..', '.'));
            $length = count($dir);
            $tmp = array();


            // sortovanie podla nazvov
            if(isset($_POST['sortNamesDesc'])){
                rsort($dir);
            }
            if(isset($_POST['sortNamesAsc'])){
                sort($dir);
            }

            //funkcia na sortovanie velkosti
            function sizeSort($size1, $size2)
            {
                if (filesize("../files/".$size1) == filesize("../files/".$size2))
                {
                    return 0;
                }
                return (filesize("../files/".$size1) < filesize("../files/".$size2)) ? -1 : 1;
            }

            //funkcia na sortovanie datumov
            #[Pure] function compareByTimeStamp($time1, $time2)
            {
                if (filemtime("../files/".$time1) < filemtime("../files/".$time2))
                    return 1;
                else if (filemtime("../files/".$time1) > filemtime("../files/".$time2))
                    return -1;
                else
                    return 0;
            }

        // sortovanie
            if($urlName == "fileSizeDesc"){
                usort($dir,"sizeSort");
            }
            else if($urlName == "fileSizeAsc"){
               usort($dir, "sizeSort");
               $dir = array_reverse($dir);
            }
            else if($urlName == "fileDateDesc"){
                usort($dir, "compareByTimeStamp");
            }
            else if($urlName == "fileDateAsc"){
                usort($dir, "compareByTimeStamp");
                $dir = array_reverse($dir);
            }

                foreach ($dir as $value){
                    echo "
                    <tr>
                    <td>";

                    if(is_dir("../files/$value")){
                        echo "<a href='?getDirContent=$value'>".$value."</a>";
                    }

                  else {
                      //vypis mena
                      $tmp = explode("-",$value);
                      $ext = explode(".",$tmp[1]);
                      echo $tmp[0].".".$ext[1];
                  }
                  echo "
                    </td>
                     <td>".(is_dir("../files/$value")? (' ') : round((filesize("../files/$value") / 1024), 0))."</td>
                    <td>".(is_dir("../files/$value")? (' ') : date('M d Y H:i:s',filemtime("../files/$value")))."</td>
                    ";
                }
            }

            if($_GET['getDirContent']){
                $dir = array_diff(scandir('../files/Priečinok/'), array('..', '.'));
                foreach ($dir as $item){
                    echo "
                                   <tr>
                                    <td class='table-light table:hover'>";
                    if(is_dir("../files/Priečinok/$item")){
                        echo "<a href='index.php'>".$item."</a>";
                    }
                    else {
                        $tmp = explode("-",$item);
                        $ext = explode(".",$tmp[1]);
                        echo $tmp[0].".".$ext[1];
                    }
                    echo "
                                    </td>
                                     <td class='table-light table:hover'>".(is_dir("../files/Priečinok/$item")? (' ') : round((filesize("../files/Priečinok/$item") / 1024), 0))."</td>
                                    <td class='table-light table:hover'>".(is_dir("../files/Priečinok/$item")? (' ') : date('M d Y H:i:s',filemtime("../files/Priečinok/$item")))."</td></tr>
                                    ";
                }
            }


         ?>

        </table>
    </div>


    <div class="container-card">
        <div class="card text-white bg-dark">
            <div class="card-body">
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <label for="renameFile">Zadaj názov:</label>
                    <input type="text" name="renameFile" id="renameFile">

                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input  type="submit" value="Upload Image" name="submit" id="submitBtn">
                </form>
            </div>
        </div>
    </div>


</main>


</body>

</html>