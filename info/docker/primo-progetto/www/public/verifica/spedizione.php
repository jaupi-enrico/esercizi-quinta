<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spedizioni</title>
</head>
<body>
<h1>Richiesta di spedizione</h1>
<?php
    $tipo = isset($_GET["tipo"]) ? $_GET["tipo"] : "Standard";
    $nome = "";
    $peso = "";
    $aereo = isset($_POST["aereo"]) ? $_POST["aereo"] : false;
    $errore = false;

    echo "<p>Tipologia di spedizione selezionata: <b>" . htmlspecialchars($tipo) . "</b></p>";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
        $peso = isset($_POST["peso"]) ? $_POST["peso"] : "";
        if (empty($nome) || empty($peso)) {
            $errore = true;
        } else {
            $costoKg = ($tipo == "Espressa") ? 5 : 3;
            $supplemento = $aereo ? 10 : 0;
            $totale = $costoKg * $peso + $supplemento;
        }
    }
    if ($errore) {
        echo "<p style='color:red'><b>Attenzione: compilare tutti i campi.</b></p>";
    }
?>

<form method="post" action="spedizione.php?tipo=<?php echo $tipo; ?>">
    <label for="nome">Nome del cliente:</label> 
    <input type="text" name="nome" value="<?php echo htmlspecialchars($nome); ?>"><br>
    <label for="peso">Peso del pacco (kg):</label>
    <select name="peso">
        <option value=""></option>
        <?php
            for ($i = 1; $i <= 6; $i++) {
                echo "<option value='$i'" . ($peso == $i ? " selected" : "") . ">$i</option>";
            }
        ?>
    </select><br>
    <label for="aereo">Invio aereo:</label>
    <input type="checkbox" name="aereo" value="si" <?php echo $aereo ? "checked" : ""; ?>> Sì (costo aggiuntivo)<br>
    <input type="submit" name="calcola" value="Calcola prezzo">
</form><br>
<a href="home.php">Torna alla home</a><br>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !$errore) {
        echo "<h2>Riepilogo della richiesta di spedizione</h2>";
        echo "<table border='1'>";
        echo "<tr><td>Nome del cliente</td><td>" . htmlspecialchars($nome) . "</td></tr>";
        echo "<tr><td>Tipologia di spedizione</td><td>" . htmlspecialchars($tipo) . "</td></tr>";
        echo "<tr><td>Peso del pacco</td><td>$peso kg</td></tr>";
        echo "<tr><td>Costo per chilogrammo</td><td>$costoKg euro</td></tr>";
        echo "<tr><td>Supplemento aereo</td><td>$supplemento euro</td></tr>";
        echo "<tr><td><b>Costo totale</b></td><td><b>$totale euro</b></td></tr>";
        echo "</table>";
        echo "<p>Richiesta di spedizione <b>effettuata correttamente!</b></p>";
    }
?>
</body>
</html>
