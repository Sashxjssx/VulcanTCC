-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2024 at 09:58 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jogo_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `biblioteca`
--

CREATE TABLE `biblioteca` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `jogo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `biblioteca`
--

INSERT INTO `biblioteca` (`id`, `usuario_id`, `jogo_id`) VALUES
(10, 2, 1),
(7, 2, 7),
(14, 4, 1),
(16, 4, 7),
(18, 4, 8),
(27, 6, 1),
(28, 6, 6),
(29, 6, 7),
(30, 6, 8),
(36, 6, 11),
(34, 6, 12),
(35, 6, 13),
(37, 6, 16),
(33, 6, 18),
(32, 6, 19),
(39, 7, 1),
(40, 7, 6),
(41, 7, 7),
(42, 7, 8),
(43, 7, 11),
(44, 7, 12),
(45, 7, 13),
(46, 7, 14),
(47, 7, 15),
(48, 7, 16),
(49, 7, 17),
(50, 7, 18),
(51, 7, 19),
(52, 7, 20),
(55, 8, 1),
(56, 8, 8),
(70, 16, 1),
(63, 16, 7),
(61, 16, 8),
(65, 16, 11),
(60, 16, 14),
(57, 16, 15),
(58, 16, 16),
(59, 16, 17),
(64, 16, 18),
(66, 16, 20),
(72, 17, 11),
(74, 17, 12),
(73, 17, 15),
(71, 17, 17),
(75, 17, 20);

-- --------------------------------------------------------

--
-- Table structure for table `carrinho`
--

CREATE TABLE `carrinho` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `jogo_id` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `jogo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `compras`
--

INSERT INTO `compras` (`id`, `usuario_id`, `jogo_id`) VALUES
(15, 2, 7),
(18, 2, 1),
(22, 4, 1),
(24, 4, 7),
(26, 4, 7),
(28, 4, 8),
(29, 4, 8),
(37, 6, 1),
(38, 6, 6),
(39, 6, 7),
(40, 6, 8),
(42, 6, 19),
(43, 6, 18),
(44, 6, 12),
(45, 6, 13),
(46, 6, 11),
(47, 6, 16),
(49, 7, 1),
(50, 7, 6),
(51, 7, 7),
(52, 7, 8),
(53, 7, 11),
(54, 7, 12),
(55, 7, 13),
(56, 7, 14),
(57, 7, 15),
(58, 7, 16),
(59, 7, 17),
(60, 7, 18),
(61, 7, 19),
(62, 7, 20),
(63, 7, 15),
(64, 7, 8),
(66, 7, 15),
(67, 8, 1),
(68, 8, 8),
(69, 16, 15),
(70, 16, 16),
(71, 16, 17),
(72, 16, 14),
(73, 16, 8),
(75, 16, 7),
(76, 16, 18),
(77, 16, 11),
(78, 16, 20),
(82, 16, 1),
(83, 17, 17),
(84, 17, 11),
(85, 17, 15),
(86, 17, 12),
(87, 17, 20),
(88, 16, 8),
(89, 16, 17);

-- --------------------------------------------------------

--
-- Table structure for table `jogos`
--

CREATE TABLE `jogos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `imagem_banner` varchar(255) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jogos`
--

INSERT INTO `jogos` (`id`, `nome`, `preco`, `imagem`, `imagem_banner`, `descricao`) VALUES
(1, 'God of War', 299.90, 'http://localhost/TCC/tccalpha/ASSETS/godofwar.png', 'http://localhost/TCC/tccalpha/ASSETS/godofwarbanner.jpg', 'Mergulhe em uma jornada épica de redenção e paternidade, nessa reinvenção inovadora da clássica série de ação e aventura. O jogo traz Kratos, o antigo deus da guerra, agora vivendo em um mundo de mitologia nórdica. Ao lado de seu filho Atreus, Kratos enfrenta desafios imensos, enquanto lida com seu passado sombrio e ensina o jovem a sobreviver em um reino hostil.'),
(6, 'Counter Strike', 0.00, 'http://localhost/TCC/tccalpha/ASSETS/counterstrike.jpg', 'http://localhost/TCC/tccalpha/ASSETS/counterstrikebanner.jpg', 'Prepare-se para uma overdose de ação tática e intensa, onde equipes de terroristas e contra-terroristas enfrentam-se em batalhas estratégicas, onde o trabalho em equipe, a comunicação e a precisão são cruciais. Seja plantando a bomba, desarmando-a ou cumprindo missões de resgate de reféns, cada partida exige planejamento e habilidade para superar o time adversário.'),
(7, 'Valorant', 0.00, 'http://localhost/TCC/tccalpha/ASSETS/valoranticon.png', 'http://localhost/TCC/tccalpha/ASSETS/valorantbanner.png', 'Inovando além da ação estratégica e trazendo habilidades únicas para cada agente, neste jogo competitivo, equipes de cinco jogadores lutam pelo controle de pontos estratégicos, seja platando a Spike ou desarmando-a, e utilizando sua precisão de tiro, para superar o time adversário, a chave para a vitória está em como cada jogador utiliza suas habilidades para trabalhar em conjunto e dominar o campo de batalha.'),
(8, 'Minecraft', 99.90, 'http://localhost/TCC/tccalpha/ASSETS/minecraft.png', 'http://localhost/TCC/tccalpha/ASSETS/minecraftbanner.jpeg', 'Explore, crie e sobreviva no mundo infinito do jogo sandbox mais popular de todos os tempos. Aqui, você tem total liberdade para construir o que sua imaginação permitir, explorar vastos mundos completamente diferentes e sobreviver em condições desafiadoras, conquistou milhões de jogadores ao redor do mundo com sua simplicidade e profundidade de gameplay, que garante diversão para todas as idades.'),
(11, 'Celeste', 19.90, 'http://localhost/TCC/tccalpha/ASSETS/celesteicon.png', 'http://localhost/TCC/tccalpha/ASSETS/celestebanner.jpg', 'Trazendo uma das experiências mais emocionantes e desafiadoras do mundo dos jogos, esse aclamado jogo de plataforma que combina mecânicas precisas de jogo com uma história profunda e tocante. Acompanhe Madeline em sua jornada para escalar a montanha Celeste, um desafio que vai além da simples subida física, explorando questões de saúde mental, superação e autoconhecimento.'),
(12, 'Cuphead', 49.90, 'http://localhost/TCC/tccalpha/ASSETS/cuphead.jpg', 'http://localhost/TCC/tccalpha/ASSETS/cupheadbanner.png', 'Este incrível jogo de plataforma e tiro que mistura ação frenética, com gráficos desenhados à mão na estética dos desenhos animados de 1930, e uma trilha sonora de jazz vibrante, transporta você para um mundo cheio de cor, humor e, claro, batalhas intensas contra chefões. Cuphead e seu irmão Mugman fazem um acordo com o Diabo em um cassino e acabam perdendo suas almas, e partem em uma aventura em busca de desfazer esse contrato, e voltarem a suas vidas normais.'),
(13, 'Dead Cells', 49.90, 'http://localhost/TCC/tccalpha/ASSETS/deadcells.png', 'http://localhost/TCC/tccalpha/ASSETS/deadcellsbanner.jpg', 'Enfrente os diversos desafios em um mundo em constante mudança, repleto de inimigos implacáveis e chefes poderosos. Nele, você assume o papel de um ser sem forma, que veio em missão à explorar um reino decadente e descobrir toda a verdade, enfrentando uma série de desafios mortais enquanto coleta itens e habilidades para se fortalecer, que fornecem a cada jogatina uma experiência única.'),
(14, 'Fortnite', 0.00, 'http://localhost/TCC/tccalpha/ASSETS/fortniteicon.png', 'http://localhost/TCC/tccalpha/ASSETS/fortnitebanner.jpg', 'Nesse intenso e estratégico battle royale, batalhe contra 100 outros jogadores em uma ilha que se altera com o passar do tempo, seu objetivo é ser o último jogador vivo, para isso você precisará estar com a mira em dia para batalhar, construir estruturas para se proteger e... fazer dancinhas? Experimente shows e eventos ao vivo, ilhas criadas por outros jogadores, modo versus zumbis, e muito mais.'),
(15, 'Forza Horizon', 299.90, 'http://localhost/TCC/tccalpha/ASSETS/forzahorizon.png', 'http://localhost/TCC/tccalpha/ASSETS/forzahorizonbanner.jpg', 'Meta o pé no acelerador por que o Festival Horizon desse ano acabou de chegar, aqui você participa de eventos de corrida fictícios que celebra a cultura automobilística e a liberdade de dirigir. Você está no papel de um corredor novato que chega ao festival e trabalha para se tornar o campeão do evento, competindo em uma variedade de desafios. Venha explorar o mundo aberto e rechear sua garagem com uma vasta gama de carros.'),
(16, 'Hotline Miami', 19.90, 'http://localhost/TCC/tccalpha/ASSETS/hotlinemiamicon.png', 'http://localhost/TCC/tccalpha/ASSETS/hotlinemiamibanner.jpg', 'Venha nessa aventura de ação intensa em uma trama sombria e frenética, ambientada em Miami nos anos 1980. Você assume o papel de um misterioso protagonista, conhecido apenas como \"Jacket\", que recebe chamadas enigmáticas com instruções para eliminar criminosos em série. Com uma jogabilidade de ação rápida e brutal, combinada com uma estética retrô e uma trilha sonora eletrônica pulsante, te oferece uma experiência desafiadora e imersiva.'),
(17, 'Mortal Kombat', 249.90, 'http://localhost/TCC/tccalpha/ASSETS/mortalkombat.jpg', 'http://localhost/TCC/tccalpha/ASSETS/mortalkombatbanner.jpg', 'Em um novo reinício da saga, você se vê imerso em uma luta épica entre guerreiros de diversos reinos, com combates intensos e uma história repleta de traições, vingança e reviravoltas. A jogabilidade oferece o famoso sistema de combate rápido e visceral, com fatalidades e movimentos especiais devastadores. Prepare-se para testar suas habilidades e desafiar seus amigos em batalhas mortais como nunca antes!'),
(18, 'Rocket League', 0.00, 'http://localhost/TCC/tccalpha/ASSETS/rocketleagueicon.png', 'http://localhost/TCC/tccalpha/ASSETS/rocketleaguebanner.jpg', 'Misturando a emoção do futebol com a velocidade e a adrenalina dos carros. Em uma arena futurista, você controla veículos turboalimentados e deve usar sua habilidade para chutar uma enorme bola para o gol adversário. Com jogabilidade dinâmica e fácil de aprender, mas difícil de dominar, oferece ação rápida e intensa, com modos variados, e uma incrível variedade e personalização de carros, oferece horas de diversão para todos os tipos de jogadores.'),
(19, 'Spider-Man', 149.90, 'http://localhost/TCC/tccalpha/ASSETS/spiderman.png', 'http://localhost/TCC/tccalpha/ASSETS/spidermanbanner.jpg', 'Levando você a uma nova aventura emocionante como o jovem herói Miles Morales, assumindo o manto de novo Spider-Man em Nova York. Em um mundo aberto deslumbrante, você enfrentará novos desafios enquanto aprende a controlar seus poderes únicos, como a invisibilidade e o senso-aranha. A história mistura ação intensa, reviravoltas emocionantes e um visual deslumbrante, com uma cidade repleta de vida, pessoas e detalhes.'),
(20, 'Terraria', 49.90, 'http://localhost/TCC/tccalpha/ASSETS/terraria.png', 'http://localhost/TCC/tccalpha/ASSETS/terrariabanner.jpg', 'Em um mundo vasto e gerado aleatoriamente, você pode minerar, construir, lutar contra monstros e explorar cavernas profundas em busca de tesouros raros, para se fortalecer e enfrentar os chefões que dominam esse mundo, e assim poder libertá-lo da corrupção que se espalha como uma doença. Com um sistema de crafting e construção profundos, te oferece uma jogabilidade quase infinita.');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `palavrapass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `bio`, `palavrapass`) VALUES
(2, 'top', 'top@gmail.com', '$2y$10$GG2o3bw1zuFAjZvYT.MCQOf50iW7bPJCPed5SBiH9CiDTQXpkqQbK', '', ''),
(3, 'gg', 'gg@gmail.com', '$2y$10$3.RYmzLG5ZHk3FCzsH.XEuxX90TmuU6WS/Xut9k6hRUY6WZDwcM6y', '', ''),
(4, 'alekkk', 'aleekk@gmail.com', '$2y$10$8xwNpRzZjwj.sKlH76ojPed.t.ydsXtJmtfLge7JG.VExt12DX4bq', '', ''),
(6, 'frann', 'fran@gmail.com', '$2y$10$gV9vHXCHVj8POe8H4bdB4uIlByxURZeo6RByyoy276/SFwo4FcPEm', '', ''),
(7, 'alex121213', 'alex@gmail.com121213', '$2y$10$oSdJykX9WynR3Oo1ExsXt.olm/onJdi8jyNZcyeWqo3qS3xTYVJ3.', 'okokokok1212121', ''),
(8, 'miguel', 'miguel@gmail.com', '$2y$10$44a/Jg81cJdIYouvA/NlI.vPIIE8ohRqZU/mzsizexEpUk3FCEHt6', 'asassasasa', 'chocolate'),
(9, 'as', 'as@gmail.com', '$2y$10$of22/qfjQVMwkaTQ/5S4oODzaA6WdqKWUL6.v5zqTLBdrcTBuVdNO', '', ''),
(11, 'alexalex', 'alex22@gmail.com', '$2y$10$WNODr68WBR1StAyirnp2j.3Q3A8ShwtxL0IYQt6p79J79LP9jcDK2', '', ''),
(12, 'alex22', 'alexalex22@gmail.com', '$2y$10$prsBaCuNL66uWs2mbIRE.uz/g2cBNGA.z0igd5kWWwGG4jzzlqvl2', '', ''),
(13, 'joao', 'joao@gmail.com', '$2y$10$UkuNqzHvxPZa8.tCD39m1uTLSYZPgpYsFzm0Nx72gon89py58Ug5q', 'eu gosto de zelda, sonic the headhog e valorant', 'por'),
(14, 'eumesmo', 'eumesmo@email.com', '$2y$10$8gCAehM.0ED0tRes2tEfdeVQdtbje9r.Pcmbw9ub29EwTSJchfkBu', 'Opa, eu curto jogar um jogos ai de vez em quando', ''),
(15, 'seila', 'seila@email.com', '$2y$10$xyveaUOMCQ6WhHUeIYmnh.kl8zhnnylOzxyOXEC.r/OysJ3eO0cEW', '', ''),
(16, 'Gabriel', 'gabriel@gmail.com', '$2y$10$icZ.iENaOmpbTaa9aTtwt.Ja9OuIAS7jUv1TaDgDHmvUGGZ2/XFva', 'Curto jogar alguma coisa aí de vez em quando', 'videogames'),
(17, 'Teste Concluído', 'mudandoemail@gmail.com', '$2y$10$AK2F1es/bhZGntf6ABuxl..DYIUEBMClaY7IQhjX.COMY3aVDUJwC', 'Curto jogar alguma coisa as vezes', 'palavra-chave'),
(18, 'Gabriel', 'meuemail@gmail.com', '$2y$10$NOVC7UP1mEUa1IeStfyYheFMmgCr/u1Ltt4sqZpCQOMBIMXPT7.uS', '', 'filho');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biblioteca`
--
ALTER TABLE `biblioteca`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario_id` (`usuario_id`,`jogo_id`),
  ADD KEY `jogo_id` (`jogo_id`);

--
-- Indexes for table `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `jogo_id` (`jogo_id`);

--
-- Indexes for table `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `jogo_id` (`jogo_id`);

--
-- Indexes for table `jogos`
--
ALTER TABLE `jogos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biblioteca`
--
ALTER TABLE `biblioteca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `jogos`
--
ALTER TABLE `jogos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `biblioteca`
--
ALTER TABLE `biblioteca`
  ADD CONSTRAINT `biblioteca_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `biblioteca_ibfk_2` FOREIGN KEY (`jogo_id`) REFERENCES `jogos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carrinho_ibfk_2` FOREIGN KEY (`jogo_id`) REFERENCES `jogos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`jogo_id`) REFERENCES `jogos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
