<?php
require_once 'database.php';
$printsQuery = $db->query('SELECT * FROM druki');
$prints=$printsQuery->fetchAll(PDO::FETCH_ASSOC);

echo("<table>");

echo("<tr><th>Link</th><th>Imię</th><th>Notatka</th><th>Nazwa pliku</th><th>Kolory</th><th>Nazwa na DC</th></tr>");

foreach($prints as $print){
    echo("<tr>");
    $wypisanoID=false;
    foreach($print as $pdata){
        if($wypisanoID){echo("<td>$pdata</td>");}
        $wypisanoID=true;
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

        <a href="index.html"> Powrót </a>
    </body>
</html>