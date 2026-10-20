<?php
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accesso Area Riservata</title>
    <link rel="stylesheet" href="../../assets/style.css">
</head>
<body>
    <div class="page narrow">
        <h1>🔑 Accesso Area Riservata</h1>
        <form method="POST" action="controllo.php">
            <div class="form-group">
                <label for="username" class="required">Username</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password" class="required">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="btn-primary" style="width: 100%;">Accedi</button>
        </form>
    </div>
</body>
</html>
