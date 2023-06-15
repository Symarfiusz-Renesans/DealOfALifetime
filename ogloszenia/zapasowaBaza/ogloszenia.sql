-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 15 Cze 2023, 20:29
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `ogloszenia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `contenttype`
--

CREATE TABLE `contenttype` (
  `id` int(11) NOT NULL,
  `contentType` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `contenttype`
--

INSERT INTO `contenttype` (`id`, `contentType`) VALUES
(1, 'Zycie Gwiazd'),
(2, 'Sport'),
(3, 'Filmy');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `news`
--

CREATE TABLE `news` (
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `imageSrc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `idNews` int(11) NOT NULL,
  `idContentType` int(11) NOT NULL,
  `addDate` date NOT NULL,
  `isPremium` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `news`
--

INSERT INTO `news` (`title`, `content`, `imageSrc`, `idNews`, `idContentType`, `addDate`, `isPremium`) VALUES
'619cd66c1c6c50.64032889.jpg', 12, 1, '0000-00-00', 0),
('Bayern Monachium przegrał z Eintrachtem Frankfurt.', 'Bayern Monachium w ramach siódmej kolejki Bundesligi podejmował u siebie Eintracht Frankfurt. Mistrzowie Niemiec byli faworytami tego spotkania, ale niespodziewanie doznali porażki. Niestety gdyby nie fatalny wieczór Roberta Lewandowskiego, wynik mógłby wyglądać inaczej. Polak zmarnował kilka sytuacji, ale też kapitalne zawody rozegrał bramkarz gości, Kevin Trapp.', '61a3c268249472.67469250.jpg', 13, 2, '0000-00-00', 0),
('Nolan tworzy nowy film!', 'Jak informowaliśmy na stronach Filmwebu, Christopher Nolan szykuje dla Universal Pictures nowy film. Teraz poznaliśmy jego szczegóły.\r\n\r\nProjekt nosi tytuł `Oppenheimer` i jak informowaliśmy wcześniej będzie poświęcony J. Robertowi Oppenheimerowi. Scenariusz bazować będzie na książce `Amerykański Prometeusz. Triumf i tragedia Roberta Oppenheimera`. Amerykańska premiera została wyznaczona na 21 lipca 2023 roku.\r\n\r\nZdjęcia do filmu rozpoczną się w przyszłym roku. Realizowane będą na taśmie filmowej przy użyciu kamer 65mm i kamer IMAX 65mm. Za zdjęcia odpowiadać będzie często współpracujący z Nolanem Hoyte Van Hoytema.\r\n\r\nNie jest on jedynym współpracownikiem reżysera, który ponownie będzie z nim pracował. Producentem jest bowiem Charles Roven, kompozytorem Ludwig Göransson, a montażystką Jennifer Lame.\r\n\r\nPotwierdziły się też spekulacje portalu Deadline o udziale w filmie Cilliana Murphy\'ego. Aktorowi przypadła tytułowa rola.\r\n\r\nRobert Oppenheimer był synem niemieckich Żydów, którzy wyemigrowali do Ameryki pod koniec XIX wieku. Był fizykiem i profesorem na Uniwersytecie Kalifornijskim w Berkeley. W czasie II wojny światowej kierował Projektem Manhattan, którego efektem było stworzenie pierwszej w pełni funkcjonalnej i kontrolowanej bomby atomowej. Z tego też powodu często nazywany jest ojcem bomby atomowej.', '61a3c7d0c50bf8.75908743.png', 14, 3, '0000-00-00', 0);
--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `contenttype`
--
ALTER TABLE `contenttype`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`idNews`),
  ADD KEY `idContentType` (`idContentType`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `contenttype`
--
ALTER TABLE `contenttype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `news`
--
ALTER TABLE `news`
  MODIFY `idNews` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`idContentType`) REFERENCES `contenttype` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
