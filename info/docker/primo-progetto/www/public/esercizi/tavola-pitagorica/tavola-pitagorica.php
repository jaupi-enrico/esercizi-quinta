<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tavola Pitagorica</title>
    <link rel="stylesheet" href="../../assets/style.css">
</head>
<body>
<div class="page wide" style="text-align: center; overflow-x: auto;">
    <h1>🔢 Tavola Pitagorica</h1>
    <table>
        <?php
        $dimensione = 10;

        echo "<tr><th>×</th>";
        for ($colonna = 1; $colonna <= $dimensione; $colonna++) {
            echo "<th>" . $colonna . "</th>";
        }
        echo "</tr>";

        for ($riga = 1; $riga <= $dimensione; $riga++) {
            echo "<tr>";
            echo "<th>" . $riga . "</th>";
            for ($colonna = 1; $colonna <= $dimensione; $colonna++) {
                echo "<td>" . ($riga * $colonna) . "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</div>
</body>
</html>
