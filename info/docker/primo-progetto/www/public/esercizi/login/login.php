<?php
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accesso Area Riservata</title>
</head>
<body>
    <main>
        <h1>Accesso Area Riservata</h1>
        <form method="POST" action="controllo.php">
            <p>
                <label for="username">Username (*)</label><br>
                <input type="text" id="username" name="username" required>
            </p>

            <p>
                <label for="password">Password (*)</label><br>
                <input type="password" id="password" name="password" required>
            </p>

            <button type="submit">Accedi</button>
        </form>
    </main>
</body>
</html>
