<?php
if(isset($_POST['sender'])){
    require_once 'database.php';

    $target_dir = "pliki/";

    $pfinfo = pathinfo($_FILES["fname"]["name"]);
    $newFNAME = $pfinfo['filename'] . '-' . rand() . '.' . $pfinfo['extension'];

    $target_file = $target_dir . basename($newFNAME);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $uploadOk = 1;

    if (file_exists($target_file)) {
        echo "Dej inną nazwe pliku bo taki już jest.";
        $uploadOk = 0;
        exit();
    }

    if ($_FILES["fname"]["size"] > 500000) {
        echo "Zaś za durzy plik, zuploaduj go na jakąś stronke typu mediaFire i wyślij link zamiast pliku.";
        $uploadOk = 0;
        exit();
    }

    if($imageFileType != "stl" && $imageFileType != "step" && $imageFileType != "3mf"
    && $imageFileType != "obj" ) {
        echo "Typ pliku sie nie zgadza";
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

    $query = $db->prepare('INSERT INTO druki VALUES (NULL, :link, :sender, :note, :fname, :colors)');
    $query->bindValue(':link',$_POST['link'],PDO::PARAM_STR);
    $query->bindValue(':sender',$_POST['sender'],PDO::PARAM_STR);
    $query->bindValue(':note',$_POST['note'],PDO::PARAM_STR);
    $query->bindValue(':fname',$newFNAME,PDO::PARAM_STR);
    //$query->bindValue(':colors',$_POST['???'],PDO::PARAM_STR); czekam jak zrobisz kolorki
    $query->bindValue(':colors',"none",PDO::PARAM_STR);
    $query->execute();
}
else{
    header("Location: index.html");
    exit();
}

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