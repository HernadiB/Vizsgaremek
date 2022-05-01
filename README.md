# Országos Pontgyűjtő Szoftver Felhasználói Dokumentáció

Az alap laravel beüzemelésére írt útmutató [ITT](https://github.com/HernadiB/Vizsgaremek/blob/main/Web/UserInterface/Laravel/README.md) található. (szerző: Rostagni Csaba)

Amint ezzel megvagyunk, következő lépés a táblák migrálása az adatbázisba.
Futtassuk le a következő parancsot:

```bash
docker-compose exec php php artisan migrate:fresh
```

Illetve seedereket is kell futtatnunk, ez fogja az adatbázist feltölteni adatokkal:

```bash
docker-compose exec php php artisan db:seed
```

A storage link használhatósága érdekében kell nekünk egy `images` mappa a publicon belül.
Ezt pedig a következő kóddal tudjuk megoldani:

```bash
docker-compose exec php mkdir -p public/images
```

A ./Web/Userinterface mappában szereplő `images` mappát le kell másolnunk a ./Web/Laravel/storage/app mappába.

Amennyiben ezzel is megvagyunk már csak annyi a dolgunk, hogy kiküldjük a mappákat összekötő linket.

```bash
docker-compose exec php php artisan storage:link
```
---

## Automatizált futtatás

 A [Laravel](https://github.com/HernadiB/Vizsgaremek/tree/main/Web/UserInterface/Laravel) projekt tartalmaz egy `install.bat`, egy `install.ps1` illetve egy `install.sh` fájlt amit ha futtatunk nem kell egyesével a kódokat beírni, ehhez elég egyetlen sor kódot beírni


**Windows - CMD:**

futtatás:
```bash
install.bat
```

**Windows - Power Shell**

futtatás:
```powershell
install.ps
```

**Mac és Linux - bash, zsh**

futtatás:
```bash
install.sh
```

Ezen felül a ./Web/Userinterface mappában szereplő `images` mappát ugyanúgy le kell másolnunk a ./Web/Laravel/storage/app mappába, mint ha manuálisan konfigurálnánk.

---

## További dokumentációhoz tartozó linkek: 
- [Átfogó dokumentáció](https://docs.google.com/document/d/1rJbhp3xkCOQ58FM-NjkxjJBm-VZ9g-AMQw8iK-6CObc/edit)
- [Fejlesztői dokumentáció](https://docs.google.com/document/d/1pvqvb6A-6GUKe8qrS2tPRnYMjQeAJy4K5cVyzHKfSXU/edit)
- [Követelmény specifikáció](https://docs.google.com/document/d/1A0QRimkK1UXkKKfk2Lq60_SSoSakkj6kAxHRRs-btn8/edit)
- [Funkcionális specifikáció](https://docs.google.com/document/d/1MNaBvbd3mw4Clm1nx-DGGcet4M92TVrdYmEbd_CgdSk/edit)
- [Program elvárások](https://docs.google.com/document/d/1LsFn5bHUQSGTNGgkdbWjd6KCK4ykbzVLim8lERvP11Y/edit)
- [Tesztelési jelentés](https://docs.google.com/document/d/1Mw8-iW1jJNe9uCh6xftvkANOyZxBNmvKurSQXk8criQ/edit)
- [Tesztelési terv](https://docs.google.com/document/d/18bBNLE0fV8S815fAStYoJOUvFy-CnA-waySWnXYwjF8/edit)


## A Szoftverhez tartozó tesztek linkjei :

A projekthez elkészült tesztek jegyzőkönyvei elérhetőek [EZEN](https://drive.google.com/drive/folders/164-jEiP4vM80p7J3rR_Jao7seB0O4jZ9?usp=sharing) a linken.

A teszt jegyzőkönyvekhez tartozó teszteset fájlok megtalálhatóak [ITT](https://github.com/HernadiB/Vizsgaremek/tree/main/docs/Test).

---

## Adatbázis

Az adatbázishoz készült Entity-Relation Diagram, illetve az adatbázis export-fájl megtalálható [ITT](https://github.com/HernadiB/Vizsgaremek/tree/main/Web/Adatb%C3%A1zis)

---

## A teszteléshez használható felhasználókra néhány példa:

**18 év alatti felhasználó csapattal**
- E-mail: lengyelerik@gmail.com, jelszó: =W6k(Z>{
- E-mail: racztamas@gmail.com, jelszó: {sL.G2#Z

**18 év alatti felhasználó csapat nélkül**
- E-mail: kovacsreka@gmail.com, jelszó: vr)b6NFK
- E-mail: vassszabina@gmail.com, jelszó: 9q>GSZ-m

**18 év feletti felhasználó csapat nélkül**
- E-mail: verestimea@gmail.com, jelszó: $5N)bSy`
- E-mail: bogdanramona@gmail.com, jelszó: U5pv8>#]

**18 év feletti felhasználó csapattal (csapatvezető)**
- E-mail: bognaradam@gmail.com, jelszó: (Sb2,RB*
- E-mail: pasztormihaly@gmail.com, jelszó: ?k35TZ*!

Az összes adatbázisban szereplő felhasználó megtalálható JSON formátumban [ITT](https://github.com/HernadiB/Vizsgaremek/blob/main/Web/Adatb%C3%A1zis/users.json) vagy [ITT](https://github.com/HernadiB/Vizsgaremek/blob/main/Web/UserInterface/Laravel/database/data/users.json)
