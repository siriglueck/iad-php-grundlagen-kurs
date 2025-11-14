<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formular zur Eingabe von Daten</title>
    <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
    <header>
        <h1>Session: Angaben zur Person</h1>
    </header>
    <main class="container">
        <form action="session-auswertung.php" method="post">
            <label> Vorname:
                <input type="text" name="vorname" id="vorname">
            </label>
            <label> Nachname:
                <input type="text" name="nachname" id="nachname">
            </label>
            <label> Wohnort:
                <input type="text" name="ort" id="ort">
            </label>
            <button type="submit">Absenden</button>
        </form>
    </main>
</body>
</html>