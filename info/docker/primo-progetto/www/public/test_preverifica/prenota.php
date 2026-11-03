<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pronota</title>
</head>
<body>
    <?php
        $tipo = $_GET['tipo'] ?? $_POST['tipo'] ?? "";
        $nome = $_POST['nome'] ?? "";
        $biglietti = $_POST['n_biglietti'] ?? "";
        $inviato = $_SERVER["REQUEST_METHOD"] == "POST";
    ?>
    <a href="cinema.php">Torna alla home</a>
    <p>Tipo di film selezionato: <b><?php echo htmlspecialchars($tipo); ?></b></p>
    <form action="prenota.php" method="POST">
        <input type="hidden" name="tipo" value="<?php echo htmlspecialchars($tipo); ?>">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($nome); ?>">
        <br><br>
        <label for="n_biglietti">Numero di biglietti:</label>
        <select name="n_biglietti" id="n_biglietti">
            <option value="" selected disabled hidden></option>
            <?php
                for ($i = 1; $i <= 5; $i++) {
                    $sel = ($biglietti == $i) ? "selected" : "";
                    echo "<option value=\"$i\" $sel>$i</option>";
                }
            ?>
        </select>
        <br><br>

        <input type="submit" value="Calcola prezzo">
    </form>
    <?php
    if ($inviato) {
        if (empty($nome) || empty($biglietti)) {
            echo "<p>Compila tutti i campi.</p>";
        } else {
            $prezzo = ($tipo == "Normale") ? 7 : 10;
            $totale = $prezzo * $biglietti;
            if ($biglietti >= 4) {
                $totale = $totale * 0.9;
            }
    ?>
            <table border="1">
                <tr><td>Nome cliente</td><td><?php echo htmlspecialchars($nome); ?></td></tr>
                <tr><td>Tipo di film</td><td><?php echo htmlspecialchars($tipo); ?></td></tr>
                <tr><td>Numero di biglietti</td><td><?php echo $biglietti; ?></td></tr>
                <tr><td>Prezzo per biglietto</td><td><?php echo $prezzo; ?> euro</td></tr>
                <tr><td><b>Totale</b></td><td><b><?php echo $totale; ?> euro</b></td></tr>
            </table>
    <?php
        }
    }
    ?>
</body>
</html>