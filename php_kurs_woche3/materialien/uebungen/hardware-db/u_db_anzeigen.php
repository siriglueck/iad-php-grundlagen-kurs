<?php
declare(strict_types=1);

require_once 'u_db_anzeigen.func.php';
require_once 'u_db_anzeigen.inc.php';

$condition1 = isset($_POST['condition1']);
$condition2 = $_POST['condition2'] ?? null;
$showall = isset($_POST['showall']);
$sort = isset($_POST['asc']) ? 'ASC' : 'DESC';
//var_dump($condition2);
//var_dump($sort);


if ($showall) {
    $data = getAllData($pdo);
} elseif ($condition1) {
    $data = getCondition1($pdo);
} elseif ($condition2) {
    switch ($condition2) {
        case 'opt1':
            $data = getOpt1($pdo, $sort);
            break;
        case 'opt2':
            $data = getOpt2($pdo, $sort);
            break;
        case 'opt3':
            $data = getOpt3($pdo, $sort);
            break;
        default:
            $data = [];
    }
} else {
    $data = [];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>u_db_anzeigen</title>
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
    <header><h1>u_db_anzeigen</h1></header>
    <main class="container">
        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th>hersteller</th>
                        <th>typ</th>
                        <th>gb</th>
                        <th>preis</th>
                        <th>prod</th>
                        <th>artnummer 🔑</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $d): ?>
                        <tr>
                        <td><?= htmlspecialchars($d->hersteller)?></td>
                        <td><?= htmlspecialchars($d->typ) ?></td>
                        <td><?= $d->gb?></td>
                        <td><?= $d->preis?></td>
                        <td><?= $d->prod?></td>
                        <td><?= htmlspecialchars($d->artnummer)?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

         <!-- Checkbox Form -->
        <div class="card">
            <h2>u_db_zahl</h2>
            <form action="<?= $_SERVER['SCRIPT_NAME'] ?>" method="post">
                <input style="display:inline; width:auto; padding:0;" type="checkbox" name="condition1" <?= $condition1 ? 'checked' : '' ?>>
                <label style="display:inline; margin:0;" for="condition1">Es sollen alle Angaben derjenigen Festplatten angezeigt werden, die einen maximalen Speicherplatz von mehr als 60 GByte haben und weniger als 150€ kosten, und zwar nach maximalem Speicherplatz absteigend.</label>
                <button style="margin: 1rem 0 1rem 0" type="submit">Senden</button>
                <button style="margin: 1rem 0 1rem 0" type="submit" name="showall">alle Angaben in Datenbank anzeigen</button>
            </form>
        </div>

        <!-- Radio Form -->
        <div class="card">
            <h2>u_db_radio</h2>
            <form action="<?= $_SERVER['SCRIPT_NAME'] ?>" method="post">
                <input style="display:inline; width:auto; padding:0; margin:1rem;" type="radio" name="condition2" value="opt1" id="opt1" <?= $condition2==='opt1' ? 'checked' : '' ?>>
                <label style="display:inline; margin:0;" for="opt1">bis 120€ einschl.</label><br>

                <input style="display:inline; width:auto; padding:0; margin:1rem;" type="radio" name="condition2" value="opt2" id="opt2" <?= $condition2==='opt2' ? 'checked' : '' ?>>
                <label style="display:inline; margin:0;" for="opt2">ab 120€ ausschl. bis 140€ einschl.</label><br>

                <input style="display:inline; width:auto; padding:0; margin:1rem;" type="radio" name="condition2" value="opt3" id="opt3" <?= $condition2==='opt3' ? 'checked' : '' ?>>
                <label style="display:inline; margin:0;" for="opt3">ab 140€ ausschl.</label><br>

                <input style="display:inline; width:auto; padding:0;" type="checkbox" name="asc" id="asc2" <?= $sort==='ASC' ? 'checked' : '' ?>>
                <label style="display:inline; margin:0;" for="asc2">Ausgabe nach Preis (aufsteigend) sortiert</label><br>

                <button style="margin: 1rem 0 1rem 0" type="submit">Senden</button>
            </form>
        </div>

    </main>
    
</body>
</html>