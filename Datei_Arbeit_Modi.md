# Die Modi und ihre Bedeutung

| Modus | Bezeichnung | Beschreibung |
|-------|-------------|--------------|
| r |  read  |  nur zum lesen öffnen |
| r+ | read+ |  zum Lesen und Schreiben öffnen der Dateizeiger, wird an den Anfang der Datei gesetzt |
| w | write | nur zum Schreiben, Dateizeiger am Anfang und die Länge der Datei wird auf 0 Byte gesetzt (evtl. vorhandene Daten werden gelöscht), Existiert die Datei nicht, wird sie angelegt |
| w+ | write+ | wie w, aber zum Lesen und Schreiben geöffnet| 
| a | append |zum Schreiben öffnen, Dateizeiger am Ende, Daten werden angehängt |
| a+ | append+ | wie a, aber zum Lesen und Schreiben geöffnet | 
| x  | | Erzeugt und öffnet eine Datei zum Schreiben, Dateizeiger am Anfang, Existiert die Datei bereits liefert fopen() FALSE |
| x+ | | wie x aber Lesen und Schreiben | 
| c  | | wie w, aber die Datei wird nicht überschrieben, Dateizeiger am Anfang (Daten werden am Anfang der Datei hinzugefügt) |
| c+ | |  wie c, aber Lesen und Schreiben |