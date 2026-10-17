<?php

$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

$errors = [];

if (strlen($password) < 8) {
    $errors[] = "• Deve contenere almeno 8 caratteri";
}

if (!preg_match('/[A-Z]/', $password)) {
    $errors[] = "• Deve contenere almeno una lettera maiuscola";
}

if (!preg_match('/[0-9]/', $password)) {
    $errors[] = "• Deve contenere almeno una cifra numerica";
}

?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifica Accesso</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 20px;
        }

        .container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
        }

        h1 {
            text-align: center;
            margin-top: 0;
        }

        .error-message {
            background: #fee;
            border: 1px solid #fcc;
            color: #c33;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .error-message h2 {
            margin-top: 0;
            color: #c33;
        }

        .error-message ul {
            margin: 10px 0;
            padding-left: 20px;
        }

        .error-message li {
            margin: 8px 0;
        }

        .success-message {
            background: #efe;
            border: 1px solid #cfc;
            color: #3c3;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }

        .success-message h2 {
            margin-top: 0;
            color: #3c3;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: #764ba2;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (count($errors) > 0): ?>
            <div class="error-message">
                <h2>❌ Password non valida</h2>
                <p>La password non rispetta i seguenti requisiti:</p>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <form method="GET" action="login.php">
                <button type="submit">Indietro</button>
            </form>
        <?php else: ?>
            <div class="success-message">
                <h2>✅ Accesso effettuato con successo!</h2>
                <p>Benvenuto, <strong><?php echo htmlspecialchars($username); ?></strong>!</p>
            </div>
            <?php header("refresh:2;url=area_riservata.php"); ?>
        <?php endif; ?>
    </div>
</body>
</html>
