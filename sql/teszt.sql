-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Okt 14. 13:11
-- Kiszolgáló verziója: 10.4.21-MariaDB
-- PHP verzió: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `teszt`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `adminok`
--

CREATE TABLE `adminok` (
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `adminok`
--

INSERT INTO `adminok` (`id`) VALUES
(8),
(17);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `hianyzok`
--

CREATE TABLE `hianyzok` (
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `hianyzok`
--

INSERT INTO `hianyzok` (`id`) VALUES
(5),
(8);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ulesrend`
--

CREATE TABLE `ulesrend` (
  `id` int(10) UNSIGNED NOT NULL,
  `nev` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `sor` tinyint(3) UNSIGNED NOT NULL,
  `oszlop` tinyint(3) UNSIGNED NOT NULL,
  `jelszo` varchar(32) CHARACTER SET latin1 NOT NULL,
  `felhasznalonev` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `ulesrend`
--

INSERT INTO `ulesrend` (`id`, `nev`, `sor`, `oszlop`, `jelszo`, `felhasznalonev`) VALUES
(1, 'Kulhanek László István', 1, 1, '', 'username'),
(2, 'Molnár Gergő Máté', 2, 1, '', ''),
(3, 'Bakcsányi Dominik', 2, 2, '', ''),
(4, 'Füstös Loránt', 2, 3, '', ''),
(5, 'Orosz Zsolt', 2, 4, '', ''),
(6, 'Harsányi László Ferenc', 2, 5, '', ''),
(7, '', 2, 6, '', ''),
(8, 'Kereszturi Kevin', 3, 1, '', ''),
(9, 'Juhász Levente', 3, 2, '', ''),
(10, 'Szabó László', 3, 3, '', ''),
(11, 'Sütő Dániel', 3, 4, '', ''),
(12, 'Détári Klaudia', 3, 5, '', ''),
(13, '', 3, 6, '', ''),
(14, 'Fazekas Miklós Adrián', 4, 1, '', ''),
(15, '', 4, 2, '', ''),
(16, 'Gombos János', 4, 3, '', ''),
(17, 'Bicsák József', 4, 4, 'e10adc3949ba59abbe56e057f20f883e', 'bicsi');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `adminok`
--
ALTER TABLE `adminok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `hianyzok`
--
ALTER TABLE `hianyzok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `ulesrend`
--
ALTER TABLE `ulesrend`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `ulesrend`
--
ALTER TABLE `ulesrend`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `adminok`
--
ALTER TABLE `adminok`
  ADD CONSTRAINT `ibfk_tanulo_admin` FOREIGN KEY (`id`) REFERENCES `ulesrend` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `hianyzok`
--
ALTER TABLE `hianyzok`
  ADD CONSTRAINT `ibfk_tanulo_id` FOREIGN KEY (`id`) REFERENCES `ulesrend` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
