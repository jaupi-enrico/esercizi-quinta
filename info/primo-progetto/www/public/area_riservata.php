<?php
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area Riservata</title>
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
            text-align: center;
        }

        h1 {
            color: #3c3;
            margin-top: 0;
        }

        .welcome-message {
            background: #efe;
            border: 2px solid #3c3;
            color: #3c3;
            padding: 30px;
            border-radius: 5px;
            margin: 20px 0;
        }

        .welcome-message h2 {
            margin-top: 0;
            font-size: 24px;
        }

        .content {
            margin-top: 30px;
            line-height: 1.6;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 30px;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background 0.3s;
        }

        a:hover {
            background: #764ba2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔒 Area Riservata</h1>

        <div class="welcome-message">
            <h2>✅ Accesso effettuato con successo!</h2>
            <p style="margin: 15px 0;">Benvenuto nell'area riservata!</p>
        </div>

        <div class="content">
            <p>Sei ora collegato con le credenziali corrette.</p>
            <p>Questa pagina contiene informazioni riservate e accessibili solo agli utenti autenticati.</p>
        </div>

        <a href="login.php">Esci</a>
    </div>
</body>
</html>
