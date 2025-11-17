<?php
declare(strict_types=1);
/**
 * Aufgabe:
 * 1) Definiere class Note (title, content, __construct).
 * 2) Erzeuge mehrere Objekte und gib sie in HTML aus.
 * 3) Optional: Lese Daten aus notes.json und wandle sie in Objekte um.
 */

class Note {
    /* Construcor Property Promotion */
    public function __construct(private string $title, private string $content ) {
        // 
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }
}

$notes = [
  new Note( 'Erster Eintrag', 'OOP macht PHP strukturierter' ),
  new Note( 'Zweiter Eintrag', 'Klassen kapseln Daten & Verhalten.' ),
];

// JSON lesen
$path = __DIR__ . '/uebung_4_notes.json';
$notesJSON = is_file($path)
    ? json_decode(file_get_contents($path), true)
    : [];

// JSON → Objekte
$notesJSONObject = [];

foreach ($notesJSON as $item) {
    if (!isset($item['title'], $item['content'])) continue;

    $notesJSONObject[] = new Note(
        $item['title'],
        $item['content']
    );
}


?>
<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Übung 4 – Note-Klasse</title>
  <link rel="stylesheet" href="../style/style.css">
</head>
<body>
  <header><h1>Übung 4 – Note-Klasse</h1></header>
  <main class="container">
    <!-- TODO -->
      <?php foreach($notes as $n): ?>
        <article class="post">
          <h2><?= htmlspecialchars($n->getTitle()) ?></h2>
          <p><?= nl2br(htmlspecialchars($n->getContent())) ?></p>
        </article>
      <?php endforeach; ?>

      <?php foreach($notesJSONObject as $n): ?>
        <article class="post">
          <h2><?= htmlspecialchars($n->getTitle()) ?></h2>
          <p><?= nl2br(htmlspecialchars($n->getContent())) ?></p>
        </article>
      <?php endforeach; ?>



  </main>
</body>
</html>
