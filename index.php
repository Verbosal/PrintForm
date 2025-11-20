<!DOCTYPE html>
<html lang="pl">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <title>Formularz Druku 3D</title>
    <link rel="stylesheet" href="style.css">

    <style>
        option,select{
            color:black;
        }
    </style>
</head>

<body class="background">
    <h1 class="greeting">Witamy! Chcesz coś wydrukowanego? Wyślij to nam tu!</h1>

    <form method="post" action="addData.php" enctype="multipart/form-data">
        <div class="modelContainerDiv">
            <div class="modelDiv">
                <h3>Podaj link do modelu</h3>
                <input type="text" placeholder="makerworld.com/..." name="link">

                <h3>Z jakich stron polecamy? W kolejności:</h3>

                <ol>
                    <li><a target="_blank" href="https://makerworld.com">Makerworld</a></li>
                    <li><a target="_blank" href="https://printables.com">Printables</a></li>
                    <li><a target="_blank" href="https://thingiverse.com">Thingiverse</a></li>
                </ol>
            </div>

            <h3 class="lub">lub</h3>

            <div class="modelDiv">
                <h3>Wyślij plik modelu 3D</h3>
                <input type="file" multiple name="fname" id="fname">

                <h4>Akceptujemy formaty:</h4>
                <h5>.stl, .step, .3mf, .obj, .svg </h5>
                <h5>(oczywiście plik musi zawierać prawidłowy model 3d!)</h5>
            </div>
        </div>

        <div class="modelContainerDiv">
            <div class="modelDiv">
                <h3>Nie mamy wszystkich 256³ kolorów...</h3>
                <h3>Wybierz kolorki do druku!</h3>
                <h5>W PRZYPADKU NIE WYBRANIA ŻADNYCH KOLORÓW, WYDRUKUJEMY LOSOWYM FILAMENTEM!</h5>

                <?php
                    echo '<label for="kolor1">kolor 1:</label>';
                    echo '<select name="kolor1" id="kolor1">';
                    $jsoncolors=json_decode(file_get_contents('colors.json'),true)["colors"];
                    
                    foreach($jsoncolors as $color){
                        echo '<option value=' . $color["display"] . '>' . $color["display"] . '</option>';
                    }

                    echo '</select>';

                    echo '<label for="kolor2">kolor 2:</label>';
                    echo '<select name="kolor2" id="kolor2">';
                    $jsoncolors=json_decode(file_get_contents('colors.json'),true)["colors"];
                    
                    foreach($jsoncolors as $color){
                        echo '<option value=' . $color["display"] . '>' . $color["display"] . '</option>';
                    }

                    echo '</select>';

                    echo '<label for="kolor3">kolor 3:</label>';
                    echo '<select name="kolor3" id="kolor3">';
                    $jsoncolors=json_decode(file_get_contents('colors.json'),true)["colors"];
                    
                    foreach($jsoncolors as $color){
                        echo '<option value=' . $color["display"] . '>' . $color["display"] . '</option>';
                    }

                    echo '</select>';

                    echo '<label for="kolor4">kolor 4:</label>';
                    echo '<select name="kolor4" id="kolor4">';
                    $jsoncolors=json_decode(file_get_contents('colors.json'),true)["colors"];
                    
                    foreach($jsoncolors as $color){
                        echo '<option value=' . $color["display"] . '>' . $color["display"] . '</option>';
                    }

                    echo '</select>';
                ?>


            </div>

            <div class="modelDiv">
                <h3>Trzeba cię rozpoznać!</h3>
                <h3>Podaj salę i opcjonalnie imię.</h3>
                <input type="text" style="resize: both;" placeholder="Grzegorz Brzęczyszczykiewicz sala 2137" name="sender" required>

                <h3>Podaj nazwę na discord</h3>
                <h4>Żebyśmy wiedzieli kogo informować o zakończeniu wydruku ;)</h4>
                
                <input type="text" style="resize: both;" placeholder="@pozdro70" name="dcname" required>
                
                <h3>I pozostaw opcjonalną notatkę :)</h3>
                <input type="text" style="resize: both;" placeholder="Baza ma być czerwona..." name="note">
            </div>
        </div>

        <button id="subBtn" type="submit">Wyślij do druku!</button>
    </form>
    
    <h3>Po zakończeniu druku zostaniesz spingowany na dc i proszony o odbiór.</h3>
    <h3>Jak strona padnie to wysyłajcie druki na discorda hackaton 2025.</h3>
    <h3>WSZYSTKO co tu wpiszesz jest PUBLICZNIE widoczne, możesz zobaczyć liste wydruków tu:</h3>
    <button style="width: fit-content"><a href="list.php">Zobacz wszystkie druki</a></button>

    <h3>Fun fact ta strony chodzi na Raspberry pi, chodż spojrzeć i zawitać w sali 3 :P</h3>
</body>

</html>