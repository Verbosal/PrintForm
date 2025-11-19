<?php
if(isset($_POST['sender'])){
    require_once 'database.php';

    $query = $db->prepare('INSERT INTO druki VALUES (NULL, :link, :sender, :note, :fname, :colors)');
    $query->bindValue(':link',$_POST['link'],PDO::PARAM_STR);
    $query->bindValue(':sender',$_POST['sender'],PDO::PARAM_STR);
    $query->bindValue(':note',$_POST['note'],PDO::PARAM_STR);
    $query->bindValue(':fname',$_POST['fname'],PDO::PARAM_STR);
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