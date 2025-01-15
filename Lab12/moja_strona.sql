-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sty 14, 2025 at 01:28 AM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moja_strona`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `matka` int(11) NOT NULL DEFAULT 0,
  `nazwa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `matka`, `nazwa`) VALUES
(1, 0, 'komputery'),
(2, 0, 'tt'),
(3, 2, 'test'),
(4, 0, 'test'),
(5, 0, 'etetete'),
(6, 5, 'text'),
(7, 5, 'test'),
(8, 7, '7');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `page_list`
--

CREATE TABLE `page_list` (
  `id` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_content` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `page_list`
--

INSERT INTO `page_list` (`id`, `page_title`, `page_content`, `status`) VALUES
(1, 'strona_glowna', '<div class=\"recenzje\" style=\"margin-top:200px;\"><h1>KOMPUTER</h1><img src=\"img/test.jpeg\" class=\"zdjrec\">\r\n<table class=\"ocen\" border=\"1\">\r\n<tr>\r\n<th><span style=\"color: #FFFF00;\">żółtość</span></th>\r\n<th><span style=\"color: #AAAA00;\">czytnik płyt?</span></th>\r\n<th><span style=\"color: #AA99AA;\">ocena</span></th>\r\n</tr>\r\n<tr>\r\n<td>7/10</td>\r\n<td><i>poniekąd</i></td>\r\n<td>3,5</td>\r\n</tr>\r\n</table>\r\n</div>\r\n<div class=\"recenzje\"><h1>KOMPUTER</h1><img src=\"img/test2.jpg\" class=\"zdjrec\">\r\n<table class=\"ocen\" border=\"1\">\r\n<tr>\r\n<th><span style=\"color: #FFFF00;\">żółtość</span></th>\r\n<th><span style=\"color: #AAAA00;\">czytnik płyt?</span></th>\r\n<th><span style=\"color: #AA99AA;\">ocena</span></th>\r\n</tr>\r\n<tr>\r\n<td>4/10</td>\r\n<td>tak</td>\r\n<td>4</td>\r\n</tr>\r\n</table>\r\n</div>\r\n<div class=\"recenzje\"><h1>KOMPUTER</h1><img src=\"img/test3.jpg\" class=\"zdjrec\">\r\n<table class=\"ocen\" border=\"1\">\r\n<tr>\r\n<th><span style=\"color: #FFFF00;\">żółtość</span></th>\r\n<th><span style=\"color: #AAAA00;\">czytnik płyt?</span></th>\r\n<th><span style=\"color: #AA99AA;\">ocena</span></th>\r\n</tr>\r\n<tr>\r\n<td>0/10</td>\r\n<td><u>nie</u></td>\r\n<td>2</td>\r\n</tr>\r\n</table>\r\n</div>\r\n<div class=\"recenzje\"><h1>KOMPUTER</h1><img src=\"img/test4.jpg\" class=\"zdjrec\">\r\n<table class=\"ocen\" border=\"1\">\r\n<tr>\r\n<th><span style=\"color: #FFFF00;\">żółtość</span></th>\r\n<th><span style=\"color: #AAAA00;\">czytnik płyt?</span></th>\r\n<th><span style=\"color: #AA99AA;\">ocena</span></th>\r\n</tr>\r\n<tr>\r\n<td>0/10</td>\r\n<td>tak</td>\r\n<td>2,5</td>\r\n</tr>\r\n</table>\r\n</div>\r\n<div class=\"recenzje\"><h1>KOMPUTER</h1><img src=\"img/test5.jpg\" class=\"zdjrec\">\r\n<table class=\"ocen\" border=\"1\">\r\n<tr>\r\n<th><span style=\"color: #FFFF00;\">żółtość</span></th>\r\n<th><span style=\"color: #AAAA00;\">czytnik płyt?</span></th>\r\n<th><span style=\"color: #AA99AA;\">ocena</span></th>\r\n</tr>\r\n<tr>\r\n<td>0/10</td>\r\n<td><b>N/A</b></td>\r\n<td>2</td>\r\n</tr>\r\n</table>\r\n</div>\r\n<div class=\"galeria\">\r\n<h1 style=\"padding-top: 30px;\">\r\nGALERIA\r\n</h1>\r\n<img id=\"tt\" class=\"galeriaimg\" src=\"img/galeria1.jpg\">\r\n<img class=\"galeriaimg\" src=\"img/galeria2.jpg\">\r\n<img class=\"galeriaimg\" src=\"img/galeria3.jpg\">\r\n<img class=\"galeriaimg\" src=\"img/galeria4.jpg\">\r\n<img class=\"galeriaimg\" src=\"img/galeria5.jpg\">\r\n<img class=\"galeriaimg\" src=\"img/galeria6.jpg\">\r\n<img class=\"galeriaimg\" src=\"img/galeria7.jpg\">\r\n<img class=\"galeriaimg\" src=\"img/galeria8.jpg\">\r\n<img class=\"galeriaimg\" src=\"img/galeria9.jpg\">\r\n<img class=\"galeriaimg\" src=\"img/galeria10.jpg\">\r\n<p style=\"text-align: center;\">\r\n<b>zmień kolor tła!</b>\r\n</p>\r\n<script>\r\n$(\".galeriaimg\").on({\r\n \"mouseover\" : function(){\r\n $(this).animate({\r\n width: 300,\r\n height: 300\r\n }, 800);\r\n },\r\n \"mouseout\" : function() {\r\n $(this).animate({\r\n width: 150,\r\n height: 150\r\n }, 800);\r\n }\r\n});\r\n</script>\r\n<form method=\"POST\" name=\"background\" style=\"margin-left: 25%;\">\r\n <input type=\"button\" value=\"żółty\" onclick=\"changeh1(\'#FFF000\')\">\r\n <input type=\"button\" value=\"czarny\" onclick=\"changeBackground(\'#000000\')\">\r\n <input type=\"button\" value=\"biały\" onclick=\"changeBackground(\'#FFFFFF\')\">\r\n <input type=\"button\" value=\"zielony\" onclick=\"changeBackground(\'#00FF00\')\">\r\n <input type=\"button\" value=\"niebieski\" onclick=\"changeBackground(\'#0000FF\')\">\r\n <input type=\"button\" value=\"pomarańczowy\" onclick=\"changeBackground(\'#FF8000\')\">\r\n <input type=\"button\" value=\"szary\" onclick=\"changeBackground(\'#c0c0c0\')\">\r\n <input type=\"button\" value=\"czerwony\" onclick=\"changeBackground(\'#FF0000\')\">\r\n <input type=\"button\" value=\"domyślny\" onclick=\"changeBackground(\'#00FFFF\')\">\r\n</form>\r\n<p style=\"text-align: center;\">\r\n<b>zmień kolor sekcji!</b>\r\n</p>\r\n<form method=\"POST\" name=\"color\" style=\"margin-left: 25%;\">\r\n <input type=\"button\" value=\"żółty\" onclick=\"changerecenzje(\'#FFF000\')\">\r\n <input type=\"button\" value=\"czarny\" onclick=\"changerecenzje(\'#000000\')\">\r\n <input type=\"button\" value=\"biały\" onclick=\"changerecenzje(\'#FFFFFF\')\">\r\n <input type=\"button\" value=\"zielony\" onclick=\"changerecenzje(\'#00FF00\')\">\r\n <input type=\"button\" value=\"niebieski\" onclick=\"changerecenzje(\'#0000FF\')\">\r\n <input type=\"button\" value=\"pomarańczowy\" onclick=\"changerecenzje(\'#FF8000\')\">\r\n <input type=\"button\" value=\"szary\" onclick=\"changerecenzje(\'#c0c0c0\')\">\r\n <input type=\"button\" value=\"czerwony\" onclick=\"changerecenzje(\'#FF0000\')\">\r\n <input type=\"button\" value=\"domyślny\" onclick=\"changerecenzje(\'#00FFFF\')\">\r\n</form>\r\n</div>', 1),
(2, 'kontakt', '<div class=\"recenzje\" style=\"margin-top: 200px; height: 500px; text-align: left; text-align: center;\">', 1),
(3, 'tekst_oblewajacy', '<div class=\"recenzje\" style=\"margin-top: 250px; height: auto; text-align: left;\"><h1>SPLASH SCREEN (\"TEKST OBLEWAJĄCY\")</h1>\r\n<img src=\"img/splash-screen.jpg\" style=\"float: left;\">\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas eget sollicitudin ante, eu dictum ligula. Quisque eu pellentesque turpis. Cras nec metus elit. Quisque turpis nunc, sodales in dui vel, feugiat fringilla arcu. Mauris rutrum, justo sed vulputate sagittis, diam lectus mollis nisi, nec rutrum ipsum leo eu enim. Cras ullamcorper tempor eros quis congue. Fusce imperdiet urna at urna pharetra, vitae blandit diam condimentum. Donec porta vel mi vel accumsan. Vestibulum ultrices tellus ac rutrum hendrerit. Duis posuere lorem sodales diam mattis porta. Donec feugiat, mauris sed consequat maximus, velit sem tincidunt nisl, et pulvinar ante libero id elit.\r\n\r\nSuspendisse semper urna sed laoreet suscipit. Ut scelerisque elit non pulvinar tempus. Quisque at nulla id metus venenatis ullamcorper. Proin condimentum, dolor non mattis rutrum, lorem dolor efficitur libero, sit amet ornare nisi arcu vestibulum nisi. In lacus urna, tincidunt et velit non, efficitur lacinia arcu. Morbi imperdiet hendrerit nisi nec fringilla. Phasellus at efficitur felis. Donec in consequat sapien. Nulla blandit malesuada nulla sed mollis. Ut et posuere dolor. Aenean vel leo consectetur, condimentum ligula eu, accumsan magna. Sed ac ipsum vitae diam iaculis molestie. Proin vel turpis eget neque consectetur vehicula nec et enim. Curabitur diam elit, interdum et dui ac, pharetra malesuada erat. Sed a ex rutrum, facilisis nunc in, suscipit orci.\r\n\r\nDonec tellus ligula, placerat vehicula dolor vitae, rutrum tempor massa. Ut finibus ullamcorper dignissim. Pellentesque convallis vulputate elit id interdum. Pellentesque quis dui non augue ornare consequat. Aenean a mi id augue egestas rhoncus. Aliquam cursus tempus lorem in gravida. Suspendisse consectetur eros eu ligula posuere finibus. Fusce quis metus rhoncus, imperdiet ante nec, venenatis ligula. Proin maximus lacus in nibh suscipit tincidunt. Duis bibendum, neque in tristique elementum, nunc enim dictum enim, et vestibulum ante sapien sed eros. Integer semper justo eu elit porta tincidunt. Nullam faucibus tempus pulvinar. Sed quis malesuada mauris. Integer a egestas libero.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tristique mollis lacus, at rhoncus orci pretium a. Etiam sem leo, lacinia eu iaculis non, varius et ipsum. Integer porttitor a velit quis sagittis. Duis volutpat convallis diam, ut facilisis felis placerat sit amet. Nulla nulla elit, finibus id tincidunt sit amet, pellentesque nec arcu. Vestibulum sapien est, sodales at sapien eu, scelerisque commodo lorem. In ullamcorper enim ac ligula dignissim eleifend. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean quam metus, tincidunt scelerisque fermentum ac, cursus fermentum nisl. Fusce sed nisl sit amet nibh rutrum auctor. Duis porttitor luctus posuere. Nullam iaculis consequat libero.\r\n\r\nAenean egestas viverra ex, at mattis justo laoreet vel. Duis feugiat, nibh et cursus ultricies, elit sapien eleifend dui, sed finibus leo erat et mauris. Pellentesque sollicitudin finibus mauris vel tempor. Cras a auctor mi. Proin dolor lectus, eleifend nec massa eu, congue imperdiet elit. Donec vel enim ultrices, sagittis sem non, porta urna. Nullam finibus convallis massa ut laoreet. Vestibulum convallis leo pharetra, porta turpis eu, rhoncus purus. Suspendisse eu ex eget risus laoreet dapibus. Integer finibus scelerisque sem, ac pellentesque erat. Fusce sed velit sed sapien elementum iaculis tempus vel orci. Morbi at lectus fringilla, ornare enim vitae, aliquam ante. Vivamus cursus fringilla mi sed accumsan. Proin at sollicitudin magna. Proin bibendum ut metus eu consequat. Quisque eu rhoncus nulla. \r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas eget sollicitudin ante, eu dictum ligula. Quisque eu pellentesque turpis. Cras nec metus elit. Quisque turpis nunc, sodales in dui vel, feugiat fringilla arcu. Mauris rutrum, justo sed vulputate sagittis, diam lectus mollis nisi, nec rutrum ipsum leo eu enim. Cras ullamcorper tempor eros quis congue. Fusce imperdiet urna at urna pharetra, vitae blandit diam condimentum. Donec porta vel mi vel accumsan. Vestibulum ultrices tellus ac rutrum hendrerit. Duis posuere lorem sodales diam mattis porta. Donec feugiat, mauris sed consequat maximus, velit sem tincidunt nisl, et pulvinar ante libero id elit.\r\n\r\nSuspendisse semper urna sed laoreet suscipit. Ut scelerisque elit non pulvinar tempus. Quisque at nulla id metus venenatis ullamcorper. Proin condimentum, dolor non mattis rutrum, lorem dolor efficitur libero, sit amet ornare nisi arcu vestibulum nisi. In lacus urna, tincidunt et velit non, efficitur lacinia arcu. Morbi imperdiet hendrerit nisi nec fringilla. Phasellus at efficitur felis. Donec in consequat sapien. Nulla blandit malesuada nulla sed mollis. Ut et posuere dolor. Aenean vel leo consectetur, condimentum ligula eu, accumsan magna. Sed ac ipsum vitae diam iaculis molestie. Proin vel turpis eget neque consectetur vehicula nec et enim. Curabitur diam elit, interdum et dui ac, pharetra malesuada erat. Sed a ex rutrum, facilisis nunc in, suscipit orci.\r\n\r\nDonec tellus ligula, placerat vehicula dolor vitae, rutrum tempor massa. Ut finibus ullamcorper dignissim. Pellentesque convallis vulputate elit id interdum. Pellentesque quis dui non augue ornare consequat. Aenean a mi id augue egestas rhoncus. Aliquam cursus tempus lorem in gravida. Suspendisse consectetur eros eu ligula posuere finibus. Fusce quis metus rhoncus, imperdiet ante nec, venenatis ligula. Proin maximus lacus in nibh suscipit tincidunt. Duis bibendum, neque in tristique elementum, nunc enim dictum enim, et vestibulum ante sapien sed eros. Integer semper justo eu elit porta tincidunt. Nullam faucibus tempus pulvinar. Sed quis malesuada mauris. Integer a egestas libero.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tristique mollis lacus, at rhoncus orci pretium a. Etiam sem leo, lacinia eu iaculis non, varius et ipsum. Integer porttitor a velit quis sagittis. Duis volutpat convallis diam, ut facilisis felis placerat sit amet. Nulla nulla elit, finibus id tincidunt sit amet, pellentesque nec arcu. Vestibulum sapien est, sodales at sapien eu, scelerisque commodo lorem. In ullamcorper enim ac ligula dignissim eleifend. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean quam metus, tincidunt scelerisque fermentum ac, cursus fermentum nisl. Fusce sed nisl sit amet nibh rutrum auctor. Duis porttitor luctus posuere. Nullam iaculis consequat libero.\r\n\r\nAenean egestas viverra ex, at mattis justo laoreet vel. Duis feugiat, nibh et cursus ultricies, elit sapien eleifend dui, sed finibus leo erat et mauris. Pellentesque sollicitudin finibus mauris vel tempor. Cras a auctor mi. Proin dolor lectus, eleifend nec massa eu, congue imperdiet elit. Donec vel enim ultrices, sagittis sem non, porta urna. Nullam finibus convallis massa ut laoreet. Vestibulum convallis leo pharetra, porta turpis eu, rhoncus purus. Suspendisse eu ex eget risus laoreet dapibus. Integer finibus scelerisque sem, ac pellentesque erat. Fusce sed velit sed sapien elementum iaculis tempus vel orci. Morbi at lectus fringilla, ornare enim vitae, aliquam ante. Vivamus cursus fringilla mi sed accumsan. Proin at sollicitudin magna. Proin bibendum ut metus eu consequat. Quisque eu rhoncus nulla. \r\n</div>', 1),
(4, 'filmy', '<div class=\"recenzje\" style=\"margin-top: 200px; height: auto; text-align: left; text-align: center;\">\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/iWyEYLc4NGQ?si=5ffnKb82zBEFY8w6\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/bflZYG5DWPg?si=OBjh9T8rK2w3Azsx\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/NdbCqqor4Ns?si=vfJt44WFUpiCHJ-z\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>\r\n</div>', 1),
(5, 'sklep', '<div class=\"recenzje\" style=\"margin-top: 200px; height: auto; text-align: left; text-align: center;\">\r\n', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `tytul` varchar(255) NOT NULL,
  `opis` text NOT NULL,
  `data_utworzenia` date NOT NULL,
  `data_modyfikacji` date NOT NULL,
  `data_wygasniecia` date NOT NULL,
  `cena_netto` float NOT NULL,
  `podatek_vat` float NOT NULL,
  `ilosc_dostepnych_sztuk` int(11) NOT NULL,
  `status_dostepnosci` int(11) NOT NULL,
  `kategoria` varchar(255) NOT NULL,
  `gabaryt_produktu` float NOT NULL,
  `zdjecie` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `tytul`, `opis`, `data_utworzenia`, `data_modyfikacji`, `data_wygasniecia`, `cena_netto`, `podatek_vat`, `ilosc_dostepnych_sztuk`, `status_dostepnosci`, `kategoria`, `gabaryt_produktu`, `zdjecie`) VALUES
(1, 'temp', 'opis', '2025-01-01', '2025-01-01', '2025-01-01', 123, 123, 1, 1, 'kategoria', 23, '<img src=\"img/budowa2.jpg\" class=\"zdjrec\">'),
(2, 'te1mp', 'opis', '2025-01-01', '2025-01-01', '2025-01-01', 123, 123, 1, 1, 'xdddkategoria', 23, 'temp');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `page_list`
--
ALTER TABLE `page_list`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `page_list`
--
ALTER TABLE `page_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
