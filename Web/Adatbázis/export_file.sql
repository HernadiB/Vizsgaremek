-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: db
-- Létrehozás ideje: 2022. Ápr 29. 17:46
-- Kiszolgáló verziója: 8.0.26-0ubuntu0.20.04.2
-- PHP verzió: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `laravel`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `blockedpeople`
--

CREATE TABLE `blockedpeople` (
  `id` bigint UNSIGNED NOT NULL,
  `blocker_user_id` bigint UNSIGNED NOT NULL,
  `blocked_user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `friendinvitations`
--

CREATE TABLE `friendinvitations` (
  `id` bigint UNSIGNED NOT NULL,
  `sender_user_id` bigint UNSIGNED NOT NULL,
  `receiver_user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `friendinvitations`
--

INSERT INTO `friendinvitations` (`id`, `sender_user_id`, `receiver_user_id`, `created_at`, `updated_at`) VALUES
(1, 9, 1, NULL, NULL),
(2, 9, 5, NULL, NULL),
(3, 7, 9, NULL, NULL),
(4, 8, 9, NULL, NULL),
(5, 10, 8, NULL, NULL),
(6, 10, 9, NULL, NULL),
(7, 2, 10, NULL, NULL),
(8, 3, 10, NULL, NULL),
(9, 11, 6, NULL, NULL),
(10, 11, 8, NULL, NULL),
(11, 4, 11, NULL, NULL),
(12, 2, 11, NULL, NULL),
(13, 12, 1, NULL, NULL),
(14, 12, 2, NULL, NULL),
(15, 3, 12, NULL, NULL),
(16, 4, 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `friendships`
--

CREATE TABLE `friendships` (
  `id` bigint UNSIGNED NOT NULL,
  `user1_id` bigint UNSIGNED NOT NULL,
  `user2_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `friendships`
--

INSERT INTO `friendships` (`id`, `user1_id`, `user2_id`, `created_at`, `updated_at`) VALUES
(1, 9, 2, NULL, NULL),
(2, 9, 3, NULL, NULL),
(3, 9, 4, NULL, NULL),
(4, 10, 4, NULL, NULL),
(5, 10, 5, NULL, NULL),
(6, 10, 6, NULL, NULL),
(7, 11, 5, NULL, NULL),
(8, 11, 7, NULL, NULL),
(9, 11, 9, NULL, NULL),
(10, 12, 8, NULL, NULL),
(11, 12, 10, NULL, NULL),
(12, 12, 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `levels`
--

CREATE TABLE `levels` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `levels`
--

INSERT INTO `levels` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Tisztes', NULL, NULL),
(2, 'Altiszt', NULL, NULL),
(3, 'Zászlós', NULL, NULL),
(4, 'Tiszt', NULL, NULL),
(5, 'Tábornok', NULL, NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_04_05_220401_create_friendships_table', 1),
(4, '2022_04_05_220605_create_friendinvitations_table', 1),
(5, '2022_04_05_220743_create_teams_table', 1),
(6, '2022_04_05_220854_create_levels_table', 1),
(7, '2022_04_05_220925_create_tasks_table', 1),
(8, '2022_04_05_220940_create_usertasks_table', 1),
(9, '2022_04_05_223329_modify_users_table', 1),
(10, '2022_04_27_135234_create_usersettings_table', 1),
(11, '2022_04_27_135349_create_blockedpeople_table', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/tasks/task.png',
  `score` int NOT NULL,
  `level_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `description`, `image`, `score`, `level_id`, `created_at`, `updated_at`) VALUES
(1, 'Előkészületi tevékenység', 'Tábor témája és részleteinek megosztása.', 'images/tasks/task.png', 2, 1, NULL, NULL),
(2, 'Tervezési tevékenység', 'Feladatok kidolgozása, azok beosztása.', 'images/tasks/task.png', 2, 1, NULL, NULL),
(3, 'Menü', 'Menü kidolgozása napokra lebontva.', 'images/tasks/task.png', 3, 1, NULL, NULL),
(4, 'Óvni a környezetet', 'Vizek tisztán tartása', 'images/tasks/task.png', 4, 1, NULL, NULL),
(5, 'Fizikai erőnléti terv készítése', 'Menj el túrázni vagy kerékpározni vagy más tevékenység által fejleszd magad', 'images/tasks/task.png', 4, 1, NULL, NULL),
(6, 'Tábori áhitat tervezés', 'Tervezz minden napra tábori áhitatokat.', 'images/tasks/task.png', 4, 2, NULL, NULL),
(7, 'Misszó', 'Készülj fel a misszióra, misszionárius tanulmányozása', 'images/tasks/task.png', 3, 2, NULL, NULL),
(8, 'Családtörténeti munka', 'Végezz családtörténeti munkát azáltal, hogy történeteket mesélsz, főzöl.', 'images/tasks/task.png', 3, 2, NULL, NULL),
(9, 'Zenés est', 'Tarts egy felemelő zenés estet.', 'images/tasks/task.png', 4, 2, NULL, NULL),
(10, 'Játsszatok színdarabot vagy jelenetet', 'Játsszatok olyan színdarabot vagy jelenetet mely egy szentírásról vagy evangéliumról tanít.', 'images/tasks/task.png', 4, 2, NULL, NULL),
(11, 'Csapatjáték szervezés', 'Szervezz csapatjátékot mint például a foci, röplabda vagy kosárabda.', 'images/tasks/task.png', 5, 3, NULL, NULL),
(12, 'Vadvízi evezés', 'Szervezz vadvízi evezést.', 'images/tasks/task.png', 5, 3, NULL, NULL),
(13, 'Sziklamászás - ereszkedés', 'Próbáld ki a sziklamászást és az ereszkedést.', 'images/tasks/task.png', 5, 3, NULL, NULL),
(14, 'Egészséges életmódterv', 'Állíts össze egy egészséges életmódtervet', 'images/tasks/task.png', 5, 3, NULL, NULL),
(15, 'Többnapos túra', 'Tervezz egy hosszabb vagy többnapos hátizsákos túrát.', 'images/tasks/task.png', 4, 3, NULL, NULL),
(16, 'Vészhelyzet - elsősegély', 'Hívjatok meg egy képzett szakembert, hogy tanítson az alapszintű elsősegélyről vagy a vészhelyzeti tennivalókról.', 'images/tasks/task.png', 5, 4, NULL, NULL),
(17, 'Elsősegélycsomag', 'Tanuljátok meg, hogyan kell összeállítani és naprakészen tartani egy elsősegélycsomagot.', 'images/tasks/task.png', 3, 4, NULL, NULL),
(18, 'Tűzrakás', 'Tanuljátok meg hogyan kell biztonságosan tüzet rakni és azt táplálni.', 'images/tasks/task.png', 5, 4, NULL, NULL),
(19, 'Szabadtéri túlélési készségek', 'Sajátítsatok el alapvető szabadtéri túlélési készségeket.', 'images/tasks/task.png', 6, 4, NULL, NULL),
(20, 'Vészhelyzet', 'Építsetek vészhelyzeti menedéket.', 'images/tasks/task.png', 7, 4, NULL, NULL),
(21, 'Tábortűz', 'Szervezz esti programokat a tábortűznél.', 'images/tasks/task.png', 8, 5, NULL, NULL),
(22, 'Vezénylés', 'Gyakoroljátok a vezénylést.', 'images/tasks/task.png', 7, 5, NULL, NULL),
(23, 'Újrahasznosítás és továbbhasznosítás.', 'Tanuljátok meg, hogyan lehet egyes tárgyakat újrahasznosítani és továbbhasznosítani.', 'images/tasks/task.png', 8, 5, NULL, NULL),
(24, 'Költségvetés', 'Ismerjétek meg a költségvetés és a források kezelésének alapjait.', 'images/tasks/task.png', 9, 5, NULL, NULL),
(25, 'Kézműves tevékenység', 'Gyakoroljatok különféle kézműves készségeket, mint például a kosárfonás, a festés, a szobrászat vagy a kötés.', 'images/tasks/task.png', 10, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `teams`
--

CREATE TABLE `teams` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `leader_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `teams`
--

INSERT INTO `teams` (`id`, `name`, `description`, `leader_id`, `created_at`, `updated_at`) VALUES
(1, 'Brutal Warriors', 'Nem tudod, melyik a te utad, de van segítség. Nézed a térképet, figyeled a táblákat, hogy megtaláld. Mert ezt az utat neked kell megtalálnod. Ám van, hogy nem te találod meg az utat. Hanem az út talál meg téged. Az út, ami a tiéd, amely célodhoz vezet. Nem neked kell keresgélned, nem neked kell kutatnod utána. Nem neked kell elképzelned, hogy milyen lehet. Mert az út, a te utad megtalál. Mert az út, a te utad ismer téged. És egy napon ott fog állni előtted. Lehet, hogy nem ismered fel azonnal. De van segítség. Hogy észrevedd, hogy felismerd őt. Van segítség. A szíved, a lelked. Lehet, hogy első pillantásra ez az út más, mint amit magadban elképzeltél, ám a szíved, a lelked érzi, tudja, hogy ő az. Hogy megtaláltad. Hogy ez az út vezet célodhoz. Hogy ez az út az Életed, a Célod. És akkor... akkor lépj rá.', 1, NULL, NULL),
(2, 'Phoenix Hungary', 'Egy emberbe nem lehet akaraterőt nevelni. Ha szabadságban neveljük a gyerekeket, akkor tudatosabbak lesznek önmagukkal kapcsolatban, mert a szabadságban a tudatalattiból egyre több minden kerül fel a tudatos szintre. (...) A gyenge akaraterő általában az érdeklődés hiányát jelenti. Az a gyenge ember, akit könnyedén rábeszélnek a teniszezésre, holott nem is igazán akar teniszezni, valójában nem tudja, hogy mi érdekli.', 2, NULL, NULL),
(3, 'Amazon Road', 'Valahányszor elindulsz otthonról, húzd be az állad, emeld fel a fejed, és szívd tele a tüdőd levegővel, idd be a napfényt, köszöntsd mosolyogva a barátaidat, és szívvel-lélekkel szoríts mindenkivel kezet. Ne félj attól, hogy félreértenek, és egy pillanatig se törődj az ellenségeiddel. Döntsd el határozottan, mi a szándékod, aztán pedig egyenesen törj a cél felé. Legyen szemed előtt a magasztos cél, amit kitűztél magad elé - és akkor egy idő múlva észreveszed, hogy öntudatlanul is megragadod azokat a lehetőségeket, amelyek vágyaid teljesüléséhez szükségesek, ugyanúgy, ahogy a korallállatka kiválasztja a tenger habjaiból mindazt, amire szüksége van. Képzeld önmagadat annak a tehetséges, komoly, hasznos embernek, aki lenni akarsz, és ez a gondolat óráról órára jobban átalakít majd, hogy saját eszményedet megközelítsd.', 3, NULL, NULL),
(4, 'Magyarok nyilai', '˝Mondok valamit, amit amúgy is tudsz. A világ nem csak napfény és szivárvány. Ez egy kegyetlen, undok hely, és bármilyen tökös srác vagy, térdre kényszerítenek ha hagyod, és soha nem engednek felállni. Senki nem tud olyan nagyot ütni, mint az élet, de nem az számít, mekkorát ütsz, hanem hogy mennyi ütést állsz ki, mikor talpon kell maradni. Bírni kell a pofont és muszáj menni tovább. Csak így lehet győzni. Ha tudod, hogy mit érsz, menj és küzdj meg azért, ami jár és közben viseld el a pofonokat! Ne mutogass másra, ne mondd, hogy nem te vagy a hibás, hanem ő vagy ő vagy akárki, ez gyáva duma és te fiam nem vagy gyáva!˝', 4, NULL, NULL),
(5, 'Angry Birds', 'Nem egymásra támaszkodni, hanem egymást támogatva előre menni. Ennyi a lényeg. Csak két teljes ember találkozásából születhet meg ez a fajta kapcsolat. Nem érdemes mással beérni, mert így egy mese az élet. Hagyjuk a másikat, hogy a maga útját járhassa, míg ő ugyanezt megteszi veled szemben. Nem irányítjuk egymást, de éreztetjük: számíthat ránk a másik, mellette vagyunk. Ő úgyis tudja, hogy te ott vagy neki, és ő is ott van neked. Ha valaki bántja a másikat, közösen, együttes erővel legyőzitek. Mert a jó játékhoz csapatmunka kell.', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `gender` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/profile_pictures/unknown.jpg',
  `score` int DEFAULT NULL,
  `team_id` bigint UNSIGNED DEFAULT NULL,
  `level_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `birthdate`, `gender`, `email`, `password`, `role`, `profile_picture`, `score`, `team_id`, `level_id`, `created_at`, `updated_at`) VALUES
(1, 'Vincze Vince', 'ZombieSlice', '1990-11-19', 'M', 'vinczevince@gmail.com', '$2y$10$OVZEyiYKvmZ9iIdiSi11u.WjHoEDtFg0fm0seTfWGrHhrYKZE5tYy', 'admin', 'images/profile_pictures/unknown.jpg', NULL, 1, NULL, NULL, NULL),
(2, 'Fábián Richárd', 'MineGermSad', '2003-10-01', 'M', 'fabianrichard@gmail.com', '$2y$10$K59z.bExVMdBzyz7ZLRov.u15Zc3xbzcfqhPdyxRvOGY0VSwc0GvS', 'admin', 'images/profile_pictures/unknown.jpg', NULL, 2, NULL, NULL, NULL),
(3, 'Surány Norbert', 'DeeperBreakSlash', '1984-03-09', 'M', 'suranynorbert@gmail.com', '$2y$10$TdgZbBxT315jvtoeTePwp.3hulYhySKub6RD6pmHpHYc7kVndHUaC', 'admin', 'images/profile_pictures/unknown.jpg', NULL, 3, NULL, NULL, NULL),
(4, 'Bognár Ármin', 'CultHill', '2003-05-27', 'M', 'bognaradam@gmail.com', '$2y$10$FdZOex4lYMAIWYgO3nwDze/jk1OZ3FxJcfVH1iKMBCjxqh.Ebw/rC', 'admin', 'images/profile_pictures/unknown.jpg', NULL, 4, NULL, NULL, NULL),
(5, 'Pásztor Mihály', 'OneDeath', '1996-01-22', 'M', 'pasztormihaly@gmail.com', '$2y$10$EZg65k2FwVhoKgVpmv5riedBpSY6O1veuMP1RkcbwefbZXybl2MQu', 'admin', 'images/profile_pictures/unknown.jpg', NULL, 5, NULL, NULL, NULL),
(6, 'Orosz Soma', 'SandFall', '2008-11-26', 'M', 'oroszsoma@gmail.com', '$2y$10$uWpYp0E6.Ba/m1cUygHxkefc.JFoq76mQoX6lVtWXtBS2iZeT490G', 'user', 'images/profile_pictures/unknown.jpg', 18, 1, 1, NULL, NULL),
(7, 'Sándor Benjamin', 'BubbleEagle', '2012-12-25', 'M', 'sandorbenjamin@gmail.com', '$2y$10$Zg5vuDYmVmxKuJTPJYIE8eqJqg9jzFEm5cX3YDQ4evJ0Aivrvy80i', 'user', 'images/profile_pictures/unknown.jpg', 10, 2, 1, NULL, NULL),
(8, 'Illés Géza', 'FlameYour', '2014-11-23', 'M', 'illesgeza@gmail.com', '$2y$10$cA882tWuksT0VzgVqvzsM.b9UKYiQ/.8lNYSy9Yt6.qIxW2JoECre', 'user', 'images/profile_pictures/unknown.jpg', 12, 3, 1, NULL, NULL),
(9, 'Lengyel Erik', 'UnoPanda', '2015-04-13', 'M', 'lengyelerik@gmail.com', '$2y$10$B8gh52H/GFMUwIHbkGAbSO6dj3CCJxesR2OUSjYWUfAaJ1DEDW8Sa', 'user', 'images/profile_pictures/unknown.jpg', 23, 4, 1, NULL, NULL),
(10, 'Rácz Tamás', 'KnowledgeMelting', '2007-07-05', 'M', 'racztamas@gmail.com', '$2y$10$N1oYS3d0Rdq7C8jdcXyrtupyzA/X8BULgIbsRQDpRaKR8rq4qN3ha', 'user', 'images/profile_pictures/unknown.jpg', 26, 5, 2, NULL, NULL),
(11, 'Molnár Evelin', 'KittenDonkey', '2012-09-20', 'F', 'molnarevelin@gmail.com', '$2y$10$qW17/smZlQCZQ6EIGukD9OZeK22EMDc5HAR7pQLjOKT.MgQS/QJGi', 'user', 'images/profile_pictures/unknown.jpg', 17, 1, 2, NULL, NULL),
(12, 'Lengyel Elizabet', 'DemonicCatAttack', '2006-12-08', 'F', 'lengyelelizabet@gmail.com', '$2y$10$ojIcvRNdp/zo7Cg.G25BJeYEz0XevTMNRvdEOmkb2Ttg3T6LuyX6G', 'user', 'images/profile_pictures/unknown.jpg', 15, 2, 2, NULL, NULL),
(13, 'Bács Tamara', 'RoofRooster', '2007-09-20', 'F', 'bacstamara@gmail.com', '$2y$10$I8EJkAM7EsygGOb02U7D2.xtW1soztlyT8gRDpX24qiaB0xAYeRZW', 'user', 'images/profile_pictures/unknown.jpg', 22, 3, 2, NULL, NULL),
(14, 'Somogyi Brigitta', 'DeathGiraffe', '2008-09-11', 'F', 'somogyibrigitta@gmail.com', '$2y$10$YZPziJSSs7bcN0bYztvtK.BNnXxD5ttt16i7TdSmfkchB0DKhtuUu', 'user', 'images/profile_pictures/unknown.jpg', 18, 4, 3, NULL, NULL),
(15, 'Bakos Dóra', 'DeepestRendOmega', '2006-02-24', 'F', 'bakosdora@gmail.com', '$2y$10$Y.wBIc5n25Ousw98zDYaD.Sv8erL9x6xqqJvM7.ti4M2V9UfrWPtK', 'user', 'images/profile_pictures/unknown.jpg', 31, 5, 3, NULL, NULL),
(16, 'Kovács Réka', 'OneMindTwo', '2015-12-04', 'F', 'kovacsreka@gmail.com', '$2y$10$JWfkNuL0t2B8vkYCLB.8ZuKfuJoMnpHQXGf/I2iLX289doLDyCw52', 'user', 'images/profile_pictures/unknown.jpg', 9, NULL, 3, NULL, NULL),
(17, 'Vass Szabina', 'LiquidWrench', '2013-12-16', 'F', 'vassszabina@gmail.com', '$2y$10$dsdV/BJjlIKj8jPCFOsWpeg26GW6D8/m1EeXVE8JvHch9maI9qSja', 'user', 'images/profile_pictures/unknown.jpg', 11, NULL, 4, NULL, NULL),
(18, 'Jakab Vanessza', 'DukeMemorySickly', '2006-10-24', 'F', 'jakabvanessza@gmail.com', '$2y$10$x3hv/rOAlBjugzPc6DcCzO4MKcIELzsxhDfma5cnQgoE4NMClXAny', 'user', 'images/profile_pictures/unknown.jpg', 10, NULL, 4, NULL, NULL),
(19, 'Veres Tímea', 'WolfStickSlash', '2008-11-02', 'F', 'verestimea@gmail.com', '$2y$10$6jT/RtwkDq2LdaFN6cErO.qK3ZbXBk9J/xffMNodLEu5tobPk6xvO', 'user', 'images/profile_pictures/unknown.jpg', 20, NULL, 4, NULL, NULL),
(20, 'Bogdán Ramóna', 'UniverseKittyPunch', '1984-09-28', 'F', 'bogdanramona@gmail.com', '$2y$10$5d1dS0lDgWvRkuMPjI/CuOcHq5EkzYpSu6/EsD6JRmZ/EkTqME0m.', 'user', 'images/profile_pictures/unknown.jpg', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `usersettings`
--

CREATE TABLE `usersettings` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `block_after_rejection` tinyint(1) NOT NULL DEFAULT '0',
  `block_after_delete` tinyint(1) NOT NULL DEFAULT '0',
  `weather` tinyint(1) NOT NULL DEFAULT '1',
  `dark_mode` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `usersettings`
--

INSERT INTO `usersettings` (`id`, `user_id`, `block_after_rejection`, `block_after_delete`, `weather`, `dark_mode`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, 1, 1, NULL, NULL),
(2, 2, 0, 0, 1, 1, NULL, NULL),
(3, 3, 0, 0, 1, 1, NULL, NULL),
(4, 4, 0, 0, 1, 1, NULL, NULL),
(5, 5, 0, 0, 1, 1, NULL, NULL),
(6, 6, 0, 0, 1, 1, NULL, NULL),
(7, 7, 0, 0, 1, 1, NULL, NULL),
(8, 8, 0, 0, 1, 1, NULL, NULL),
(9, 9, 0, 0, 1, 1, NULL, NULL),
(10, 10, 0, 0, 1, 1, NULL, NULL),
(11, 11, 0, 0, 1, 1, NULL, NULL),
(12, 12, 0, 0, 1, 1, NULL, NULL),
(13, 13, 0, 0, 1, 1, NULL, NULL),
(14, 14, 0, 0, 1, 1, NULL, NULL),
(15, 15, 0, 0, 1, 1, NULL, NULL),
(16, 16, 0, 0, 1, 1, NULL, NULL),
(17, 17, 0, 0, 1, 1, NULL, NULL),
(18, 18, 0, 0, 1, 1, NULL, NULL),
(19, 19, 0, 0, 1, 1, NULL, NULL),
(20, 20, 0, 0, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `usertasks`
--

CREATE TABLE `usertasks` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `task_id` bigint UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unfinished',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `usertasks`
--

INSERT INTO `usertasks` (`id`, `user_id`, `task_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 'finished', NULL, NULL),
(2, 6, 2, 'unfinished', NULL, NULL),
(3, 6, 3, 'finished', NULL, NULL),
(4, 7, 1, 'finished', NULL, NULL),
(5, 7, 5, 'unfinished', NULL, NULL),
(6, 7, 4, 'unfinished', NULL, NULL),
(7, 8, 3, 'finished', NULL, NULL),
(8, 8, 4, 'unfinished', NULL, NULL),
(9, 8, 5, 'finished', NULL, NULL),
(10, 9, 3, 'finished', NULL, NULL),
(11, 9, 2, 'unfinished', NULL, NULL),
(12, 9, 4, 'unfinished', NULL, NULL),
(13, 10, 6, 'finished', NULL, NULL),
(14, 10, 7, 'unfinished', NULL, NULL),
(15, 10, 8, 'unfinished', NULL, NULL),
(16, 11, 7, 'finished', NULL, NULL),
(17, 11, 6, 'unfinished', NULL, NULL),
(18, 11, 10, 'unfinished', NULL, NULL),
(19, 12, 7, 'finished', NULL, NULL),
(20, 12, 9, 'unfinished', NULL, NULL),
(21, 12, 10, 'unfinished', NULL, NULL),
(22, 13, 5, 'finished', NULL, NULL),
(23, 13, 8, 'unfinished', NULL, NULL),
(24, 13, 10, 'unfinished', NULL, NULL),
(25, 14, 11, 'finished', NULL, NULL),
(26, 14, 12, 'unfinished', NULL, NULL),
(27, 14, 13, 'unfinished', NULL, NULL),
(28, 15, 12, 'finished', NULL, NULL),
(29, 15, 14, 'unfinished', NULL, NULL),
(30, 15, 15, 'unfinished', NULL, NULL),
(31, 16, 11, 'finished', NULL, NULL),
(32, 16, 13, 'unfinished', NULL, NULL),
(33, 16, 15, 'unfinished', NULL, NULL),
(34, 17, 15, 'finished', NULL, NULL),
(35, 17, 18, 'unfinished', NULL, NULL),
(36, 17, 19, 'unfinished', NULL, NULL),
(37, 18, 16, 'finished', NULL, NULL),
(38, 18, 18, 'unfinished', NULL, NULL),
(39, 18, 20, 'unfinished', NULL, NULL),
(40, 19, 15, 'finished', NULL, NULL),
(41, 19, 16, 'unfinished', NULL, NULL),
(42, 19, 20, 'unfinished', NULL, NULL);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `blockedpeople`
--
ALTER TABLE `blockedpeople`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blockedpeople_blocker_user_id_foreign` (`blocker_user_id`),
  ADD KEY `blockedpeople_blocked_user_id_foreign` (`blocked_user_id`);

--
-- A tábla indexei `friendinvitations`
--
ALTER TABLE `friendinvitations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `friendinvitations_sender_user_id_foreign` (`sender_user_id`),
  ADD KEY `friendinvitations_receiver_user_id_foreign` (`receiver_user_id`);

--
-- A tábla indexei `friendships`
--
ALTER TABLE `friendships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `friendships_user1_id_foreign` (`user1_id`),
  ADD KEY `friendships_user2_id_foreign` (`user2_id`);

--
-- A tábla indexei `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- A tábla indexei `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_level_id_foreign` (`level_id`);

--
-- A tábla indexei `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_leader_id_foreign` (`leader_id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_team_id_foreign` (`team_id`),
  ADD KEY `users_level_id_foreign` (`level_id`);

--
-- A tábla indexei `usersettings`
--
ALTER TABLE `usersettings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usersettings_user_id_foreign` (`user_id`);

--
-- A tábla indexei `usertasks`
--
ALTER TABLE `usertasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usertasks_user_id_foreign` (`user_id`),
  ADD KEY `usertasks_task_id_foreign` (`task_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `blockedpeople`
--
ALTER TABLE `blockedpeople`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `friendinvitations`
--
ALTER TABLE `friendinvitations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT a táblához `friendships`
--
ALTER TABLE `friendships`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT a táblához `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT a táblához `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT a táblához `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT a táblához `usersettings`
--
ALTER TABLE `usersettings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT a táblához `usertasks`
--
ALTER TABLE `usertasks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `blockedpeople`
--
ALTER TABLE `blockedpeople`
  ADD CONSTRAINT `blockedpeople_blocked_user_id_foreign` FOREIGN KEY (`blocked_user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `blockedpeople_blocker_user_id_foreign` FOREIGN KEY (`blocker_user_id`) REFERENCES `users` (`id`);

--
-- Megkötések a táblához `friendinvitations`
--
ALTER TABLE `friendinvitations`
  ADD CONSTRAINT `friendinvitations_receiver_user_id_foreign` FOREIGN KEY (`receiver_user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `friendinvitations_sender_user_id_foreign` FOREIGN KEY (`sender_user_id`) REFERENCES `users` (`id`);

--
-- Megkötések a táblához `friendships`
--
ALTER TABLE `friendships`
  ADD CONSTRAINT `friendships_user1_id_foreign` FOREIGN KEY (`user1_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `friendships_user2_id_foreign` FOREIGN KEY (`user2_id`) REFERENCES `users` (`id`);

--
-- Megkötések a táblához `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`);

--
-- Megkötések a táblához `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_leader_id_foreign` FOREIGN KEY (`leader_id`) REFERENCES `users` (`id`);

--
-- Megkötések a táblához `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`),
  ADD CONSTRAINT `users_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`);

--
-- Megkötések a táblához `usersettings`
--
ALTER TABLE `usersettings`
  ADD CONSTRAINT `usersettings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Megkötések a táblához `usertasks`
--
ALTER TABLE `usertasks`
  ADD CONSTRAINT `usertasks_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`),
  ADD CONSTRAINT `usertasks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
