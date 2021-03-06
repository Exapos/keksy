
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style.css">
    <title>Counter</title>
</head>
<body>

<?php 

try {
    if (file_exists("./source/exapos.txt") && file_exists("./source/sara.txt")) {  
        $fileExapos = fopen("source/exapos.txt", "r+");   
        $contentE = fgets($fileExapos);
        fclose($fileExapos);

        $timestampE = trim(file_get_contents('./source/exaposTime.txt'));
//////////////////////////////////////////////////////////////////////////////////////////////
        $timestampS = trim(file_get_contents('./source/saraTime.txt'));
        $fileSara = fopen("source/sara.txt", "r+");   
        $contentS = fgets($fileSara);
        fclose($fileSara);

        if (isset($_POST["btn-exa"])){
            $time = time();
            $timestampE = date('d m Y  @ H:i:s', $time);
            file_put_contents("./source/exaposTime.txt", $timestampE);
            $contentE = trim(file_get_contents('./source/exapos.txt'));
            $contentE = $contentE + 1;
            file_put_contents("./source/exapos.txt", $contentE);
            fclose($fileExapos);
        }

        if (isset($_POST["btn-sar"])){
            $time = time();
            $timestampS = date('d m Y  @ H:i:s', $time);
            file_put_contents("./source/saraTime.txt", $timestampS);
            $contentS = trim(file_get_contents('./source/sara.txt'));
            $contentS = $contentS + 1;
            file_put_contents("./source/sara.txt", $contentS);
            fclose($fileExapos);
        }
    } else {
        echo "Nejsou tu no";
    }
}
catch (exception $e) {
    echo $e;
}



?>

     <div class="main">
        <div class="table">
            <div class="counter">
                <div class="sara">S??rinka m?? momentaln??: <span id="pocetS"><?php echo $contentS;?></span> ????</div>
                <div class="keksapos">Keksapos??k m?? momentaln??: <span id="pocetE"><?php echo $contentE;?></span> ????</div>
            </div>
            <div class="buttons">
                <form action="" method="post">

                <input type="submit" name="btn-sar" value="P??idat S??rince" class="btn btn-success">
                <input type="submit" name="btn-exa" value="P??idat Exaposovi" class="btn btn-success">

                </form>
            </div>
            <div class="timestamp">
                <span class="saraT">Posledn?? keks??k sarince byl posl??n: <?php echo $timestampE;?></span><br>
                <span class="exaposT">Posledn?? keks??k keksapovovi byl posl??n: <?php echo $timestampS;?></span>
            </div>
        </div>
    </div>
</body>
</html>

