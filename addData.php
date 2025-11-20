<?php
if(isset($_POST['sender']) && isset($_POST['dcname'])){
    require_once 'database.php';

    $newFNAME = "";
    if(!empty($_FILES['fname']['name'])){
        $target_dir = "pliki/";

        $pfinfo = pathinfo($_FILES["fname"]["name"]);
        $newFNAME = $pfinfo['filename'] . '-' . rand() . '.' . $pfinfo['extension'];

        $target_file = $target_dir . basename($newFNAME);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $uploadOk = 1;

        if (file_exists($target_file)) {
            echo "Dej inną nazwe pliku bo taki już jest.";echo '<br> <a href="index.php"> Powrót </a>';
            $uploadOk = 0;
            exit();
        }

        if ($_FILES["fname"]["size"] > 500000) {
            echo "Zaś za durzy plik, zuploaduj go na jakąś stronke typu mediaFire i wyślij link zamiast pliku.";echo '<br> <a href="index.php"> Powrót </a>';
            $uploadOk = 0;
            exit();
        }

        if($imageFileType != "stl" && $imageFileType != "step" && $imageFileType != "3mf"
        && $imageFileType != "obj" && $imageFileType != "svg" ) {
            echo "Typ pliku sie nie zgadza";echo '<br> <a href="index.php"> Powrót </a>';
            $uploadOk = 0;
            exit();
        }

        if ($uploadOk == 0) {
            echo "Ełror!";
        } else {
            if (move_uploaded_file($_FILES["fname"]["tmp_name"], $target_file)) {
                echo "Plik ". htmlspecialchars( basename( $_FILES["fname"]["name"])). " został zaplołdowany do druku";
            } else {
                echo "jakiś błąd przy uploadzie spróbuj jeszcze raz";
            }
        }
    }

    $colorsinp='{"selectedColors":["'.$_POST["kolor1"].'","'.$_POST["kolor2"].'","'.$_POST["kolor3"].'","'.$_POST["kolor4"].'"]}';
    $query = $db->prepare('INSERT INTO druki VALUES (NULL, :link, :sender, :note, :fname, :colors, :dcname)');
    $query->bindValue(':link',$_POST['link'],PDO::PARAM_STR);
    $query->bindValue(':sender',$_POST['sender'],PDO::PARAM_STR);
    $query->bindValue(':note',$_POST['note'],PDO::PARAM_STR);
    $query->bindValue(':fname',$newFNAME,PDO::PARAM_STR);
    $query->bindValue(':colors',$colorsinp,PDO::PARAM_STR);
    $query->bindValue(':dcname',$_POST['dcname'],PDO::PARAM_STR);
    $query->execute();
    echo "Plik wysłany do druku <br>";
}
else{
    header("Location: index.html");
    exit();
}

echo '<br> <a href="index.php"> Powrót </a>';
?>

<html>
    <!-- 
        TU MOZESZ NORNALNIE ZROBIC STRONE PO SUBMICIE FORMA - Jak ma być przekierowanie spowrotem to powiec,
        zrobiłem to tak aby działało a nie wyglądało.
    -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="/favicon.ico">
        <title>Formularz Druku 3D - Wysyłanie druku</title>
    </head>

    <body>
        
    </body>
</html>