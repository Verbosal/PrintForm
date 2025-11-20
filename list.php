<?php
require_once 'database.php';
$printsQuery = $db->query('SELECT * FROM druki');
$prints=$printsQuery->fetchAll(PDO::FETCH_ASSOC);

echo("<table>");

echo("<tr><th>Link</th><th>Imię</th><th>Notatka</th><th>Nazwa pliku</th><th>Kolory</th><th>Nazwa na DC</th></tr>");

foreach($prints as $print){
    echo("<tr>");
    $wypisanoID=false;
    $i=0;
    $allcolors="";
    foreach($print as $pdata){
        if($wypisanoID){
            if($i==5){
                $colorsjson=json_decode($pdata,true)["selectedColors"];

                foreach($colorsjson as $color){
                    if($color != "BRAK"){$allcolors =  $allcolors." ".$color;}
                }

            echo("<td>".$allcolors."</td>");
                
            }
            else{
                echo("<td>$pdata</td>");
            }
            
        }
        $wypisanoID=true;
        $i++;
    }
    echo("</tr>");
}
echo("</table>");
?>
<html>
    <head>
        <style>
            table, th, td {
            border: 1px solid white;
            border-collapse: collapse;
            }
            th, td {
            background-color: #c5e6e6ff;
            }
        </style>
    </head>
    <body>
        <h5>Te dane i tak były by widoczne na discordzie!</h5>

        <a href="index.php"> Powrót </a>
    </body>
</html>