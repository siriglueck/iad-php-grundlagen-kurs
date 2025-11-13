<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');
// indizierte Arrays
$posts = ['Post 1', 'Post 2', 'Post 3'];
$cities = array('Leipzig', 'Nordhausen', 'Erfurt');
// assoziative Arrays
$maincities = array(
  'DE' => 'Berlin',
  'FR' => 'Paris',
  'TH' => 'Bangkok'
);
// mehrdimensionale Arrays
$posts2 = array(
  array(
    'title' => 'Erster Beitrag',
    'author' => 'Alex',
    'content' => 'Wilkommen im Blog!',
  ),
  array(
    'title' => 'Zweiter Beitrag',
    'author' => 'Maria',
    'content' => 'Heute ist ein schöner Tag.',
  ),
);

// Arrays für tabellarische Ausgaben
$laender = array(
  'Spanien' => array(
    'Hauptstadt' => 'Madrid',
    'Sprache' => 'Spanisch',
    'Währung' => 'Euro',
    'Fläche' => 505990,
  ),
  'Deutschland' => array(
    'Hauptstadt' => 'Berlin',
    'Sprache' => 'Deutsch',
    'Währung' => 'Euro',
    'Fläche' => 357022,
  ),
  'Thailand' => array(
    'Hauptstadt' => 'Bangkok',
    'Sprache' => 'Thailändisch',
    'Währung' => 'Baht',
    'Fläche' => 513120,
  ),
);

?>

<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Arrays Beispiel</title>
  <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
  <header><h1>Beiträge aus Arrays</h1></header>
  <main class="container">
    <?php foreach ($posts as $post): ?>
      <p><?= $post  ?></p>
    <?php endforeach; ?>

    <p>Zweite Stadt im Array der Städte: <?= $cities[1]; ?></p>
    <?php $country = 'TH'; ?>
    <p> Die Hauptstadt von <?= $country ?> ist <?= $maincities[$country] ?></p>
  
    <?php foreach ($maincities as $country => $city): ?>
    <p><?= $country ?>: <?= $city ?></p>
    <?php endforeach; ?>

    <h2>Unsere aktuellen Beiträge</h2>
    <?php foreach ($posts2 as $p): ?>
      <article class="post">
        <h3><?= htmlspecialchars($p['title']) ?></h3>
        <p class="meta"><em>von <?= htmlspecialchars($p['author']) ?></em></p>
        <div>
          <?= nl2br(htmlspecialchars($p['content'])) 
          //nl2br wandelt Zeilenumbrüche in <br> um?>
        </div>
      </article>
    <?php endforeach; ?>

    <h2> Infomationen zu Ländern</h2>
    <table>
      <tr>
        <th>Land</th>
        <th>Hauptstadt</th>
        <th>Sprache</th>
        <th>Währung</th>
        <th>Fläche</th>
      </tr>
    
      <?php foreach( $laender as $land => $infos ): ?>
        <tr>
          <td><?= htmlspecialchars($land) ?></td>
          <?php foreach( $infos as $info ): ?>
            <td><?= $info ?></td>
            <?php endforeach; ?>
        </tr>
      <?php endforeach; ?>
    </table>
  </main>
</body>
</html>