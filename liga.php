<!doctype HTML>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Rozgrywki futbolowe</title>
    <link href="styl2.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="baner">
        <h3>Reprezentacja polski w piłce nożnej</h3>
        <img src="obraz1.jpg" alt="Reprezentacja">
</div>
    <div id="lewy">
    <form action="liga.php" method="post">
        <select name="lista">
            <option value="1">Bramkarze</option>
            <option value="2">Obrońcy</option>
            <option value="3">Pomocnicy</option>
            <option value="4">Napastnicy</option>
        </select>
        <input type="submit" value="Zobacz">

    </form>
    <img src="zad2.png" alt="piłka">
    <p>Autor:00000000000</p>
</div>
    <div id="prawy">
        <ol>
            <?php
            if(isset($_POST["lista"])){
                $pozycja = $_POST["lista"];
                
            $db = mysqli_connect("localhost","root","","egzamin2");
            $sql = "select imie,nazwisko from zawodnik where pozycja_id=$pozycja";
            $wynik = mysqli_query($db,$sql);
                while($wiersz = mysqli_fetch_array($wynik)){
                    echo "<li>"."<p>".$wiersz["imie"]." ".$wiersz["nazwisko"]."</p>"."</li>";
                }
    
            mysqli_close($db);
            }
            ?>
        </ol>
</div>
    <div id="głowny">
        <h3>Liga mistrzów</h3>
</div>
    <div id="liga">
    <?php
    $db = mysqli_connect("localhost","root","","egzamin2");
    $sql = "select zespol,punkty,grupa from liga order by punkty";
    $wynik = mysqli_query($db,$sql);

    While($wiersz = mysqli_fetch_array($wynik)){
        echo "<div id='druzyna'>";
        echo "<h2>".$wiersz["zespol"]."</h2>";
        echo "<h1>".$wiersz["punkty"]."</h1>";
        echo "<p>"."grupa:".$wiersz["grupa"]."<p>";
        echo "</div>";
    }
    
    mysqli_close($db);
    
    ?>   
</div>
</body>
</html>

