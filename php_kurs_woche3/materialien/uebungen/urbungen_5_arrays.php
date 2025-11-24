

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Übungen - Arrays</title>
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
    <header><h1>PHP-Übungen</h1></header>
    <main class="container">
        <!-- Array -->
        <h2>Übungen 1: Mit eindimensionalen Arrays arbeiten</h2>
        <div class="container card">
            <h2>Autokenzeichen und dazugehörige Städte</h2>
            <?php
    
                $cities = array(
                'HH' => 'Hamburg',
                'B' => 'Berlin',
                'S' => 'Stuttgart'
                );
                
            ?>
            <?php
                // Elemente ins Array hinzufügen
                $cities['F'] = 'Frankfurt';
                $cities['HB'] = 'Bremen';
                // Elemente löchen
                unset($cities['HB']);
                // Info der Elemente bearbeiten
                $cities['F'] = 'Frankfurt am Main';
            ?>
            <table>
                <thead>
                    <tr>
                        <th>Kennzeichen</th>
                        <th>Stadt</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cities as $ccode => $cname) :?>
                        <tr>
                            <td><?= $ccode ?></td>
                            <td><?= $cname ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <h2>Übungen 2: Mit mehrdimensionalen Arrays arbeiten</h2>
        <div class="container card">
            <h2>Sportfest: Startzeiten und Veranstaltungen</h2>
            <?php
                $plans = array(
                array(
                    'Beginn' => '09:30 Uhr',
                    'Disziplin' => 'Diskuswurf',
                    'Ort' => 'Nebenplatz',
                    'Bemerkung' => 'Jugendmeisterschaften',
                ),
                array(
                    'Beginn' => '10:00 Uhr',
                    'Disziplin' => '5-km-Lauf',
                    'Ort' => 'Stadion - Laufbahn',
                    'Bemerkung' => 'Offener Lauf',
                ),
                array(
                    'Beginn' => '11:00 Uhr',
                    'Disziplin' => 'Halbmarathon',
                    'Ort' => 'Waldgebiet',
                    'Bemerkung' => 'Teilnahme ab 18 Jahren',
                ),
                array(
                    'Beginn' => '12:00 Uhr',
                    'Disziplin' => 'Stabhochsprung',
                    'Ort' => 'Stadion - Stabhochsprunganlage',
                    'Bemerkung' => 'Nut Frauen',
                ),
                
                );
            ?>
            <table>
                <thead>
                    <tr>
                        <th>Beginn</th>
                        <th>Disziplin</th>
                        <th>Ort</th>
                        <th>Bemerkung</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($plans as $plan) :?>
                        <tr>
                            <td><?= $plan['Beginn'] ?></td>
                            <td><?= $plan['Disziplin'] ?></td>
                            <td><?= $plan['Ort'] ?></td>
                            <td><?= $plan['Bemerkung'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>