-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3309
-- Gegenereerd op: 22 jan 2024 om 13:11
-- Serverversie: 10.4.28-MariaDB
-- PHP-versie: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stonkspizza`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestelling`
--

CREATE TABLE `bestelling` (
  `bestellingid` bigint(20) UNSIGNED NOT NULL,
  `datum` date NOT NULL,
  `klantid` bigint(20) UNSIGNED NOT NULL,
  `pizzaingredient` bigint(20) UNSIGNED NOT NULL,
  `maat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ingredient`
--

CREATE TABLE `ingredient` (
  `ingredientid` bigint(20) UNSIGNED NOT NULL,
  `naam` varchar(255) NOT NULL,
  `prijs` decimal(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `ingredient`
--

INSERT INTO `ingredient` (`ingredientid`, `naam`, `prijs`) VALUES
(1, 'Tomatensaus', 0.40),
(2, 'Kaas', 0.20),
(3, 'Champignon', 0.45),
(4, 'Ui', 0.25),
(5, 'Tomaat', 0.50),
(6, 'Shoarma', 0.80),
(7, 'Macaroni', 1.30);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `maat`
--

CREATE TABLE `maat` (
  `maatid` int(11) NOT NULL,
  `maat` varchar(255) NOT NULL,
  `prijsindex` decimal(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `maat`
--

INSERT INTO `maat` (`maatid`, `maat`, `prijsindex`) VALUES
(1, 'klein', 0.80),
(2, 'medium', 1.00),
(3, 'groot', 1.20);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pizza`
--

CREATE TABLE `pizza` (
  `pizzaid` bigint(20) UNSIGNED NOT NULL,
  `naam` varchar(255) NOT NULL,
  `prijs` decimal(18,2) NOT NULL,
  `afb` text NOT NULL,
  `pizzaingredient` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `pizza`
--

INSERT INTO `pizza` (`pizzaid`, `naam`, `prijs`, `afb`, `pizzaingredient`) VALUES
(3, 'Oklohoma beef', 7.99, 'oklohomabeef.png', 1),
(4, 'Gandolfini special', 9.50, 'gandolfinispecial.png', 2),
(5, 'Spicy Buffalo Chicken', 17.99, 'spicybuffalochicken.png', 3),
(6, 'Mac-n-cheese pizza', 6.99, 'macncheese.png', 4);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pizzaingredient`
--

CREATE TABLE `pizzaingredient` (
  `pizzaingredientid` bigint(20) UNSIGNED NOT NULL,
  `pizzaingredient` bigint(20) UNSIGNED NOT NULL,
  `ingredientid` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `pizzaingredient`
--

INSERT INTO `pizzaingredient` (`pizzaingredientid`, `pizzaingredient`, `ingredientid`) VALUES
(2, 1, 1),
(3, 1, 2),
(4, 1, 6),
(5, 2, 1),
(6, 2, 6),
(8, 3, 6),
(9, 3, 4),
(10, 4, 2),
(11, 4, 7);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `adres` varchar(255) NOT NULL,
  `woonplaats` varchar(255) NOT NULL,
  `telefoonnummer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `adres`, `woonplaats`, `telefoonnummer`) VALUES
(4, 'butterbeanman', 'butterbeanman@gmail.com', '$2y$12$rH4umr8LIM/eHG7SJQVM5.Coma9hYFm4YExGtD3pKqoilKMKVXE4.', 'butterbeanman', 'butterbeanman', 619721297);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bestelling`
--
ALTER TABLE `bestelling`
  ADD PRIMARY KEY (`bestellingid`),
  ADD KEY `bestelling_klantid_index` (`klantid`),
  ADD KEY `bestelling_pizzaingredientid_index` (`pizzaingredient`);

--
-- Indexen voor tabel `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`ingredientid`);

--
-- Indexen voor tabel `maat`
--
ALTER TABLE `maat`
  ADD PRIMARY KEY (`maatid`);

--
-- Indexen voor tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexen voor tabel `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`pizzaid`),
  ADD KEY `pizza_pizzaingredientid_index` (`pizzaingredient`);

--
-- Indexen voor tabel `pizzaingredient`
--
ALTER TABLE `pizzaingredient`
  ADD PRIMARY KEY (`pizzaingredientid`),
  ADD KEY `pizzaingredient_ingredientid_index` (`ingredientid`),
  ADD KEY `pizzaingredient` (`pizzaingredient`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bestelling`
--
ALTER TABLE `bestelling`
  MODIFY `bestellingid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `ingredientid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `maat`
--
ALTER TABLE `maat`
  MODIFY `maatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `pizza`
--
ALTER TABLE `pizza`
  MODIFY `pizzaid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `pizzaingredient`
--
ALTER TABLE `pizzaingredient`
  MODIFY `pizzaingredientid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `bestelling`
--
ALTER TABLE `bestelling`
  ADD CONSTRAINT `bestelling_ibfk_1` FOREIGN KEY (`klantid`) REFERENCES `users` (`id`);

--
-- Beperkingen voor tabel `pizzaingredient`
--
ALTER TABLE `pizzaingredient`
  ADD CONSTRAINT `pizzaingredient_ibfk_1` FOREIGN KEY (`pizzaingredient`) REFERENCES `pizza` (`pizzaingredient`),
  ADD CONSTRAINT `pizzaingredient_ibfk_2` FOREIGN KEY (`pizzaingredient`) REFERENCES `bestelling` (`pizzaingredient`),
  ADD CONSTRAINT `pizzaingredient_ingredientid_foreign` FOREIGN KEY (`ingredientid`) REFERENCES `ingredient` (`ingredientid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
