<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Parcheggio</title>
</head>
<body>
    <h1>Prenotazione parcheggio</h1>
    <?php
        $veicolo = isset($_GET['veicolo']) ? $_GET['veicolo'] : (isset($_POST['veicolo']) ? $_POST['veicolo'] : '');
        echo "<p>Veicolo selezionato: <b>" . $veicolo . "</b></p>";
    ?>

    <form method="POST" action="parcheggio.php">
        <input type="hidden" name="veicolo" value="<?php echo $veicolo; ?>">

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo isset($_POST['nome']) ? $_POST['nome'] : ''; ?>">
        <br><br>

        <label for="ore">Numero di ore:</label>
        <select id="ore" name="ore">
            <option value="" selected disabled hidden></option>
            <?php
                for ($i = 1; $i <= 6; $i++) {
                    $selected = (isset($_POST['ore']) && $_POST['ore'] == $i) ? 'selected' : '';
                    echo "<option value=\"$i\" $selected>$i</option>";
                }
            ?>
        </select>
        <br><br>

        <input type="submit" value="Calcola prezzo">
    </form>

    <br>
    <a href="home.php">Torna alla home</a>

    <?php
        if (isset($_POST['nome'], $_POST['ore'])) {
            if (empty($_POST['nome']) || empty($_POST['ore'])) {
                echo "<p>Compila tutti i campi obbligatori.</p>";
            } else {
                $nome = $_POST['nome'];
                $ore = $_POST['ore'];

                if ($veicolo == 'Automobile') {
                    $costoOrario = 2;
                } elseif ($veicolo == 'Motocicletta') {
                    $costoOrario = 1;
                } else {
                    $costoOrario = 0;
                }

                $costoTotale = $costoOrario * $ore;
            ?>
                <h2>Riepilogo della prenotazione</h2>
                <table border="1">
                    <tr>
                        <td>Nome cliente</td>
                        <td><?php echo $nome; ?></td>
                    </tr>
                    <tr>
                        <td>Tipologia di veicolo</td>
                        <td><?php echo $veicolo; ?></td>
                    </tr>
                    <tr>
                        <td>Numero di ore</td>
                        <td><?php echo $ore; ?></td>
                    </tr>
                    <tr>
                        <td>Costo orario</td>
                        <td><?php echo $costoOrario; ?> euro</td>
                    </tr>
                    <tr>
                        <td><b>Costo totale</b></td>
                        <td><b><?php echo $costoTotale; ?> euro</b></td>
                    </tr>
                </table>
                <p>Prenotazione effettuata correttamente!</p>
            <?php
            }
        }
    ?>
</body>
</html>
