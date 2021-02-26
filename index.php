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
    <table class="table table-dark table-hover">
        <tr>
            <th>Názov súboru</th>
            <th>veľkosť súboru</th>
            <th>Dátum</th>
        </tr>
        <tr>
            <td>Jill</td>
            <td>Smith</td>
            <td>50</td>
        </tr>
        <tr>
            <td>Eve</td>
            <td>Jackson</td>
            <td>94</td>
        </tr>
        <tr>
            <td>John</td>
            <td>Doe</td>
            <td>80</td>
        </tr>
    </table>
</div>

<div class="container-card">
    <div class="card text-white bg-dark">
        <div class="card-body">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <h3>Vybrať súbor na upload:</h3>

                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload File" name="submit">
            </form>
        </div>
    </div>
</div>




</main>


<script src="js/script.js"></script>
</body>

</html>