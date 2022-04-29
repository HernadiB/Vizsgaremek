# Országos Pontgyűjtő Szoftver Felhasználói Dokumentáció

## Szerver előkészítése

A `https://github.com/HernadiB/Vizsgaremek` egy olyan alap projektet tartalmaz, ami egy a  `https://github.com/rcsnjszg/laravel-alap` oldalon található laravel egy változata.

A tároló klónozásával töltsük le a repositoryt.

```bash
git clone https://github.com/HernadiB/Vizsgaremek.git Vizsgaremek
```

Amennyiben nem lenne git a gépünkön telepítve, az előbbi műveletet docker segítségével is megtehetjük:

**Windows - CMD:**

```bat
docker run -it --rm -v %cd%:/git alpine/git clone ^
    https://github.com/HernadiB/Vizsgaremek.git Vizsgaremek
```

**Windows - Power Shell**

```powershell
docker run -it --rm -v ${PWD}:/git alpine/git clone \
    https://github.com/HernadiB/Vizsgaremek.git Vizsgaremek
```
**Mac és Linux - bash, zsh**

```bash
docker run -it --rm -v (pwd):/git alpine/git clone \
    https://github.com/HernadiB/Vizsgaremek.git Vizsgaremek
```
---
## Laravel projekt felépítése

Ezt követően lépjünk be a gyökérkönyvtárba hogy a következő kódokat tudjuk használni.
Szükség lesz egy `.env` fájl létrehozására, mivel nincsen csak egy `.env.example` fájlunk így annak a másolásával lesz lehetőség erre.

**Windows - CMD:**

```bat
copy .env.example .env
```

**Windows - Power Shell**

```powershell
Copy-Item .env.example .env
```
**Mac és Linux - bash, zsh**

```bash
cp .env.example .env
```

Ha megvan az `.env` fájl akkor fel kell építeni a docker container-t.
```bash
docker-compose build
```
---
## Laravel projekt elindítása
Ezt követően el kell indítanunk a szerverünket amit docker 
segítségével tudunk megtenni.

```bash
docker-compose up -d
```
Kelleni fog nekünk a `composer` ami előre megírt osztályokat használ.

```bash
docker-compose exec php composer install
```

Ahhoz hogya laravel működjön szükségünk lesz egy egyedi API kulcshoz ezt a `key:generate` tudja számunkra lehetővé tenni.

```bash
docker-compose exec php php artisan key:generate
```
---
## Friendly Interactive Shell (Fish)

A `Dockerfile` tartalmazza a fisht így nekünk egyszerűbb lesz azzal dolgozni.
Írjuk be a következő kódot ami elindítja a shellt.

```bash
docker-compose exec php fish
```
Kulcsot generálni fish-ben is tudunk. 

```bash
php artisan key:generate
```

Itt kell nekünk a migrációs fájlokat is futtatni: 

```bash
php artisan migrate:fresh
```

Illetve a seedereket is itt kell futtatnunk:

```bash
php artisan db:seed
```

A storage link használhatósága érdekében kell nekünk egy `images` mappa a publicon belül.
Ezt pedig a következő kóddal tudjuk megoldani 

```bash
php mkdir -p public/images
```

Amennyiben ezzel is megvagyunk már csak annyi a dolgunk, hogy a linket kiküldjük a shell-ből.

```bash
php artisan storage:link 
```
--- 

## Automaizált futtatás

 A projekt tartalmaz egy `install.bat`, egy `install.ps1` illetve egy `install.sh` fájlt amit ha futtatunk nem kell egyesével a kódokat beírni ehhez elég beírni egyetlen sor kódot




**Windows - CMD:**
Az `install.bat` fájl tartalma:

futtatás:
```bash
install.bat
```

**Windows - Power Shell**

Az `install.ps1` fájl tartalma:

futtatás:
```powershell
install.ps
```

**Mac és Linux - bash, zsh**

Az `install.sh` fájl tartalma:


futtatás:
```bash
install.sh
```

---

Már csak az `images` mappát kell másolnunk a ./Web/Userinterface mappából a ./Web/Laravel/storage/app mappába.
Ezzel a beüzemelés végére értünk.

## Linkek a további dokumentációhoz tartozó link: 
- [Átfogó dokumentáció](https://docs.google.com/document/d/1rJbhp3xkCOQ58FM-NjkxjJBm-VZ9g-AMQw8iK-6CObc/edit)
- [Követelmény specifikáció](https://docs.google.com/document/d/1A0QRimkK1UXkKKfk2Lq60_SSoSakkj6kAxHRRs-btn8/edit)
- [Funkcionális specifikáció](https://docs.google.com/document/d/1MNaBvbd3mw4Clm1nx-DGGcet4M92TVrdYmEbd_CgdSk/edit)
- [Program elvárások](https://docs.google.com/document/d/1LsFn5bHUQSGTNGgkdbWjd6KCK4ykbzVLim8lERvP11Y/edit)


## A Szoftverhez tartozó tesztek linkjei :

Űrlapok tesztjegyzőkönyvei elérhetőek [EZEN](https://drive.google.com/drive/folders/164-jEiP4vM80p7J3rR_Jao7seB0O4jZ9?usp=sharing) a linken.

A tesztjegyzőkönyvekhez tartozó teszteset fájlok megtalálhatóak [ITT](https://github.com/HernadiB/Vizsgaremek/tree/main/docs/Test).
