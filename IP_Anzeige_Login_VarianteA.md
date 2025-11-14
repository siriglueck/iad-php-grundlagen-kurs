# IP-Anzeige beim Login (Variante A)

Diese Variante zeigt den Teilnehmern die IPv4-Adresse **direkt nach dem Login** an.  
Sie ist **absolut boot-sicher** und verändert keine Systemdienste.

---

## 1. Script erstellen

```bash
sudo nano /etc/profile.d/show-ip.sh
```

Inhalt einfügen:

```sh
#!/bin/sh
# IP nur in interaktiven Shells anzeigen
[ -t 1 ] || return

IP=$(ip -4 addr show eth0 | awk '/inet /{print $2}')
[ -z "$IP" ] && return

echo "------------------------------"
echo " IP-Adresse dieses Servers:"
echo " $IP"
echo "------------------------------"
```

---

## 2. Rechte setzen

```bash
sudo chmod +x /etc/profile.d/show-ip.sh
```

---

## 3. Testen

Abmelden:

```bash
exit
```

Danach neu einloggen – die IP sollte direkt erscheinen.

---

## 4. Entfernen (falls nötig)

```bash
sudo rm /etc/profile.d/show-ip.sh
```
