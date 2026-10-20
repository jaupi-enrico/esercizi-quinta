<?php

$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

$errors = [];

if (strlen($password) < 8) {
    $errors[] = "Deve contenere almeno 8 caratteri";
}

if (!preg_match('/[A-Z]/', $password)) {
    $errors[] = "Deve contenere almeno una lettera maiuscola";
}

if (!preg_match('/[0-9]/', $password)) {
    $errors[] = "Deve contenere almeno una cifra numerica";
}

?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifica Accesso</title>
</head>
<body>
    <main>
        <?php if (count($errors) > 0): ?>
            <h1>Accesso</h1>
            <h2>Password non valida</h2>
            <p>La password non rispetta i seguenti requisiti:</p>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
            <form method="GET" action="login.php">
                <button type="submit">Indietro</button>
            </form>
        <?php else: ?>
            <h2>Accesso effettuato con successo!</h2>
            <p>Benvenuto, <strong><?php echo htmlspecialchars($username); ?></strong>!</p>
            <?php header("refresh:2;url=area_riservata.php"); ?>
        <?php endif; ?>
    </main>
</body>
</html>
