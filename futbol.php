<!doctype HTML>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Rozgrywki futbolowe</title>
    <link href="styl.css" rel="stylesheet" type="text/css">
</head>
<body>

    <div id="baner">
        <h2>Światowe rozgrywki piłkarskie</h2>
        <img src="obraz1.jpg" alt="boisko">
    </div>
    <div id="mecze">
   <?php
    $db = mysqli_connect("localhost","root","","egzamin");
    $sql = "select zespol1,zespol2,wynik,data_rozgrywki from rozgrywka where zespol1='EVG'";
    $wynik = mysqli_query($db,$sql);

    While($wiersz = mysqli_fetch_array($wynik)){
        echo "<div id='rozgrywka'>";
        echo "<h3>".$wiersz["zespol1"]." - ".$wiersz["zespol2"]."</h3>";
        echo "<h4>".$wiersz["wynik"]."</h4>";
        echo "<p>"."w dniu:".$wiersz["data_rozgrywki"]."<p>";
        echo "</div>";
    }
    
    mysqli_close($db);
    
    ?>



    </div>
    <div id="glowny">
        <h2>Reprezentacja Polski</h2>
    </div>
    <div id="lewy">
        <p>Podaj pozycję zawodników (1-bramkarze, 2-obrońcy, 3-pomocnicy,
            4-napastnicy)</p>
        <form action="futbol.php" method="post">
            <input name="liczba" type="number">
            <input type="submit" value="Sprawdź">
        </form>
        <ul id="lista">
        <?php
        if(isset($_POST["liczba"])){
            $dane = $_POST["liczba"];
            
        $db = mysqli_connect("localhost","root","","egzamin");
        $sql = "select imie,nazwisko from zawodnik where pozycja_id=$dane";
        $wynik = mysqli_query($db,$sql);
            while($wiersz = mysqli_fetch_array($wynik)){
                echo "<li>"."<p>".$wiersz["imie"]." ".$wiersz["nazwisko"]."</p>"."</li>";
            }

        mysqli_close($db);
        }
    ?>
        </ul>
    </div>
    <div id="prawy">
        <img src="zad1.png" alt="piłkarz">
        <p>Autor:00000000000</p>
    </div>
</body>
</html>

