-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Maio-2022 às 00:55
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ghost_gamer`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `accesses`
--

CREATE TABLE `accesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `pages` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `accesses`
--

INSERT INTO `accesses` (`id`, `users`, `views`, `pages`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 183, '2022-05-17 15:03:01', '2022-05-17 22:52:15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `cover` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `views` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '[post, video]',
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '[active, draft, trash]',
  `opening_at` datetime NOT NULL COMMENT 'data do lançamento do artigo',
  `deleted_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `category_id`, `title`, `uri`, `description`, `content`, `cover`, `video`, `views`, `type`, `status`, `opening_at`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'Sequência de Zelda: Breath of the Wild só chega em 2023, anuncia Nintendo', 'sequencia-de-zelda-breath-of-the-wild-so-chega-em-2023-anuncia-nintendo', 'A equipe responsável pelo game precisa de mais tempo para finalizar o projeto', '<h3>A equipe responsável pelo game precisa de mais tempo para finalizar o projeto</h3>\r\n<p>Em uma mensagem divulgada nesta terça-feira (29), o produtor da série Zelda, Eiji Aonuma, confirmou que a sequência de Breath of the Wild não vai mais ser lançada em 2022. Segundo ele, a equipe responsável pelo game decidiu estender seu processo de desenvolvimento e agora pretende lançá-lo em algum momento da primavera de 2023.</p>\r\n<p>Isso significa que o novo título da série deve chegar às lojas entre os dias 20 de março de 21 de junho do próximo ano. Aonuma se desculpou pela demora e explicou que o novo game vai se passar tanto no solo quanto em uma grande variedade de ilhas voadoras — no entanto, o produtor garantiu que a aventura não vai se limitar a isso.</p>\r\n<p><img style=\"width: 100%;\" src=\"http://127.0.0.1:8000/storage/post/content/2022/05/DMo5ICLi8pqJ2SCblrf9mOnZ948J8a2CmIvdZxdm.jpg\" alt=\"&quot;\" /></p>\r\n<h3>Nintendo quer tornar o game algo especial</h3>\r\n<p>“Para fazer da experiência desse game algo especial, todo o time de desenvolvimento está continuando a trabalhar de forma diligente, então por favor esperem mais um pouco”, pediu Aonuma. Até o momento, a Nintendo tem mantido muitos dos detalhes do jogo sob segredo, incluindo seu título oficial — que já virou alvo de diversos rumores.</p>\r\n<p>O novo capítulo da série Zelda tem a dura missão de dar sequência aos eventos de The Legend of Zelda: Breath of the Wild, que chegou em 2017 com versões para Nintendo Wii U e Nintendo Switch. O jogo representou uma grande mudança para a série, que deixou o formato linear para apostar em uma experiência de mundo aberto na qual os jogadores podiam cumprir missões na ordem que desejavam.</p>\r\n<p>Apesar do adiamento do game, 2022 ainda promete ser um ano marcado para grandes lançamentos do Switch. Ainda este ano a plataforma deve receber Splatoon 3, Pokémon Scalert e Violet e o grande RPG de mundo aberto exclusivo Xenoblade Chronicles 3. No primeiro trimestre, a plataforma recebeu sucessos como Pokémon Legends: Arceus e, nos últimos dias, teve a estreia de Kirby and the Forgotten Land.</p>', 'article/2022/05/XPFiXiKE0Rh5ifCrzlTbVQoVaeOWNqorJP4b8B6q.jpg', NULL, 2, 'post', 'active', '2022-05-17 17:46:00', NULL, '2022-05-17 14:46:50', '2022-05-17 22:50:10'),
(2, 1, 3, 'Mortal Kombat 11 ultrapassa marca de 12 milhões de unidades vendidas', 'mortal-kombat-11-ultrapassa-marca-de-12-milhoes-de-unidades-vendidas', 'Franquia já soma mais de 73 milhões de unidades vendidas em consoles e pcs', '<h3>Franquia já soma mais de 73 milhões de unidades vendidas em consoles e pcs</h3>\r\n<p> Mortal Kombat é um jogo de sucesso que atrai fãs pelo mundo todo, agora a Warner Bros. Games acaba de anunciar que a versão da franquia Mortal Kombat 11 ultrapassou a marca de 12 milhões de unidades vendidas mundialmente, somando as vendas da versão lançada originalmente e da versão Ultimate que foi lançada com todo o conteúdo adicional que saiu para o jogo. O jogo foi desenvolvido pela NetherRealm Studios com direção do co-criador da série, Ed Boon.</p>\r\n<p> <img style=\"width: 100%;\" src=\"http://127.0.0.1:8000/storage/post/content/2022/05/Yug2T6HpZ5eNy4Uy6He5O5vUW8iX1dlRmGMJPz0X.jpg\" alt=\"&quot;\" /></p>\r\n<p>É um número bem expressivo para a série, que teve seu primeiro jogo lançado em 1992 e desde então, já soma mais de 73 milhões de unidades vendidas para consoles e pcs. Além de fazer sucesso nos videogames, a franquia já teve também três filmes produzidos, com o mais recente sendo lançado em maio deste ano e que teve entre os atores Joe Taslim como Sub-Zero, Hiroyuki Sanada como Scorpion e Jessica McNamee na pele de Sonya Blade, Mortal Kombat também rendeu animações e séries desde a sua criação.</p>\r\n<p>Além das versões para consoles e computadores, a Warner Bros. Games lançou em 2015 o Mortal Kombat Mobile, jogo disponível para dispositivos móveis que conta com mais de 138 milhões de downloads realizados desde o seu lançamento, o que amplia a base de jogadores e fãs da franquia que jogam diariamente Mortal Kombat.</p>', 'article/2022/05/vkeuGAtJ7BjANkyDk0pfYs0nDwYwXOcx5y994joh.jpg', NULL, 1, 'post', 'active', '2022-05-18 11:46:00', NULL, '2022-05-17 14:46:50', '2022-05-17 19:22:12'),
(3, 1, 3, 'Spider-Man 2 está em desenvolvimento pela Insomniac Games', 'spider-man-2-esta-em-desenvolvimento-pela-insomniac-games', 'Nova aventura chegará exclusivamente aos consoles PlayStation 5 em 2023', '<h3> Nova aventura chegará exclusivamente aos consoles PlayStation 5 em 2023</h3>\r\n<p>Hoje (9), o PlayStation Showcase realizado pela Sony garantiu um excelente dia para os fãs da Marvel, a empresa anunciou que um novo jogo do Wolverine está sendo desenvolvido e para completar, anunciou nada mais nada menos que a sequência tão esperada de Marvel\'s Spider-Man, lançado originalmente para o PS4 que fez um enorme sucesso no console da empresa.</p>\r\n<p><img style=\"width: 100%;\" src=\"http://127.0.0.1:8000/storage/post/content/2022/05/IXMqxme5T401VJDtkHDKPLA3M6axD1VGt3zx8DVk.jpg\" alt=\"&quot;\" /></p>\r\n<p>Nessa nova aventura Peter Parker e Miles Morales irão se unir para derrotar novos vilões que estão tentando destruir a cidade, o trailer nos leva a conhecer o que deve ser a maior ameaça do próximo título, o Venom, que aparece ao fim da apresentação em um beco escuro e com palavras sorrateiras. Infelizmente o vídeo termina com a data de 2023, o que nos fará ter que esperar um pouco mais para colocar as mãos nessa continuação.</p>', 'article/2022/05/zLnRZMctQJkqJnDLIGj9e5IXVZ9IsT4w2FD52Pan.jpg', NULL, 7, 'post', 'active', '2022-05-17 11:46:00', NULL, '2022-05-17 14:46:50', '2022-05-17 19:05:30'),
(4, 1, 1, 'Remake de Demon’s Souls ainda esconde segredos não explorados', 'remake-de-demons-souls-ainda-esconde-segredos-nao-explorados', 'Modder afirma que o título tem pelo menos quatro itens desconhecidos pela comunidade', '<h2>Modder afirma que o título tem pelo menos quatro itens desconhecidos pela comunidade</h2>\r\n<p>Um dos jogos que marcaram a estreia do PlayStation 5 em 2020, o remake de Demon’s Souls respeitou bastante o material original, embora tenha trazido alguns itens inéditos para a experiência. Segundo Lance McDonald, modder com experiência na série da From Software, por mais que a comunidade tenha explorado o título, ele ainda guarda alguns segredos que não foram descobertos.</p>\r\n<p>Em seu Twitter, McDonald explicou que a Bluepoint Games adicionou vários itens novos ao trabalhar no jogo, sendo que quatro deles nunca foram descobertos até hoje. “Se algum dia tivermos um jailbreak do PlayStation 5, talvez eu consiga descobrir isso, mas, por enquanto, tudo que sei é que existem quatro itens não descobertos e quais são seus nomes”, afirmo</p>\r\n<p><img style=\"width: 100%;\" src=\"http://127.0.0.1:8000/storage/post/content/2022/05/o0181X3UhJG6x7gIUq9aF67rUlF6ZTjMZBpTQfJO.jpg\" alt=\"&quot;\" /></p>\r\n<p>A procura por mistérios e segredos escondidos no game começaram logo após seu lançamento — em novembro de 2020, a comunidade se viu intrigada pela presença de sons estranhos em áreas do game. Na época, a Sony desmentiu quaisquer rumores relacionados a isso, afirmando que eles se tratavam somente de um bug que não havia sido planejado pela equipe de desenvolvimento.</p>\r\n<p><img style=\"width: 100%;\" src=\"http://127.0.0.1:8000/storage/post/content/2022/05/9KCGmboyOMs6lKDeaigldAKEn6CRJoiBNA9waH3F.jpg\" alt=\"&quot;\" /></p>', 'article/2022/05/7C7J0DfQOIsRJBGWzoNJbNVIsB2iiMjEiyYJGgbs.jpg', NULL, 1, 'post', 'active', '2022-05-17 11:46:00', NULL, '2022-05-17 14:46:50', '2022-05-17 18:58:32'),
(5, 1, 3, 'Streamer finaliza os 12 Assassin’s Creed da série principal sem tomar nenhum dano', 'streamer-finaliza-os-12-assassins-creed-da-serie-principal-sem-tomar-nenhum-dano', 'Hayete Bahadori chegou a dedicar mais de 800 horas em um único game da série', '<h3>Hayete Bahadori chegou a dedicar mais de 800 horas em um único game da série</h3>\r\n<p>Passando por três gerações de console, a série Assassin’s Creed é conhecida por trazer aventuras que podem durar dezenas ou até mesmo centenas de horas. No entanto, isso não impediu que o streamer Hayete Bahadori de terminar todos os 12 jogos principais da franquia, fazendo isso sem em nenhum momento tomar dano.</p>\r\n<p>Enquanto a franquia não é conhecida por sua dificuldade, o feito é sem dúvida respeitável devido à quantidade de elementos imprevistos que podem surgir. Para tornar as coisas mais complicadas, o jogador fez questão de definir o desafio de cada jogo para o nível máximo oferecido pela Ubisoft em cada um deles.</p>\r\n<p><img style=\"width: 100%;\" src=\"http://127.0.0.1:8000/storage/post/content/2022/05/cGF7ZwHPaXhbR5KZJS2A08O0CRi1he1LEDavLEpA.jpg\" alt=\"&quot;\" /></p>\r\n<h4>Jogador elogia a precisão da série</h4>\r\n<p>Em uma entrevista ao Kotaku, o streamer afirmou que decidiu iniciar sua jornada de terminar jogos sem tomar nenhum dano em meio à pandemia do COVID-19. O primeiro jogo que ele finalizou sob tais condições foi Star Wars Jedi: Fallen Order, que ele considerou oferecer poucos desafios.</p>\r\n<p>Segundo Hayete, a escolha seguinte foi a série Assassin’s Creed, da qual ele já era um fã anteriormente. O jogador afirma que os títulos se encaixaram perfeitamente em seus objetivos por sua “furtividade, sutileza, precisão e várias possibilidades oferecidas a cada cenário”. Além de não tomar dano, o jogador definiu que precisava atingir 100% de sincronia em todas as missões e não podia se beneficiar de recomeços ou do carregamento de saves anteriores.</p>\r\n<p>Caso recebesse algum dano (fora aqueles que são forçados pela Ubisoft), o jogador teria que recomeçar totalmente um jogo para atingir seus objetivos. Ele estima que, entre tentativas, erros e planejamentos, dedicou pelo menos 100 horas a cada jogo de Assassin’s Creed — tempo que chegou a 250 horas em Assassin’s Creed IV: Black Flag e a mais de 800 horas em Assassin’s Creed Valhalla, dado o tamanho dos jogos e aos elementos de sorte presentes em cada um deles.</p>', 'article/2022/05/uOdJLopbweEFeLF6mrxDLleZdmRpZ55q4XTyBB7Y.jpg', NULL, 6, 'post', 'active', '2022-05-18 18:35:00', NULL, '2022-05-17 14:46:50', '2022-05-17 21:55:15'),
(6, 1, 3, 'PUBG: BATTLEGROUNDS: veja todas as novidades da atualização 16.1', 'pubg-battlegrounds-veja-todas-as-novidades-da-atualizacao-161', 'Será a primeira temporada ranqueada após o jogo se tornar free-to-play', '<h3>Será a primeira temporada ranqueada após o jogo se tornar free-to-play</h3>\r\n<p>A Krafton anunciou a atualização 16.1 para seu jogo PUBG: Battlegrounds, um dos pioneiros do estilo battle royale que se tornou free-to-play a pouco tempo e vem registrando enorme crescimento no número de jogadores.</p>\r\n<p>Entre as principais novidades para o novo patch, podemos citar a primeira temporada ranqueada que teremos início desde o jogo se tornou gratuito, além do balanceamento de algumas armas como a M416 e a Mk12. O rodizio dos mapas também será alterado nessa nova temporada.</p>\r\n<h3><span style=\"font-size: 1em;\"><img style=\"width: 100%;\" src=\"http://127.0.0.1:8000/storage/post/content/2022/05/zbI6UidMUwaMX8PE8ky1nRnLSjXhSirlIKd3isXT.jpg\" alt=\"&quot;\" /></span></h3>\r\n<p><span style=\"font-size: 1em;\">Temporada Ranqueada 16: Pela primeira vez após a transição para o modelo gratuito, o jogo lança uma nova Temporada Ranqueada, que possibilitará aos jogadores ganharem diversos emblemas, skins e placas de identificação conforme progridem. As recompensas da Temporada 15 já estão sendo entregues aos jogadores diretamente em seus inventários.<br /> <br />Mudanças no rodízio de mapas: Com o fim da Temporada de Inverno no PUBG, daremos adeus à Vikendi, por um tempo, ao mesmo tempo que Karakin volta às Partidas Normais. A disposição dos mapas para a Temporada 16 é:<br /> <br />Partidas Normais: Erangel / Miramar / Sanhok / Karakin / Taego<br />Modo Ranqueado: Erangel / Miramar / Taego<br /> <br />Rebalanceamento de armas: Tanto a M416 AR quanto a Mk12 DMR foram melhoradas, aumentando a utilidade de ambas para jogadores novos e experientes. Um resumo das mudanças está disponível abaixo:</span></p>\r\n<h5><span style=\"font-size: 1em;\">M416</span></h5>\r\n<ul>\r\n<li><span style=\"font-size: 1em;\">Aumento no dano: 40 ? 41</span></li>\r\n<li><span style=\"font-size: 1em;\">Aumento da velocidade de disparo: 780m/s ? 880m/s<br /></span></li>\r\n<li><span style=\"font-size: 1em;\">Aumento na distância da redução de dano: 50m ? 60m</span></li>\r\n</ul>\r\n<h5><span style=\"font-size: 1em;\">Mk12</span></h5>\r\n<ul>\r\n<li><span style=\"font-size: 1em;\">A Mk12 agora pode surgir em qualquer mapa disponível (Normais e Ranqueados)</span></li>\r\n<li><span style=\"font-size: 1em;\">Aumento na distância da redução de dano: 75m ? 90m</span></li>\r\n</ul>\r\n<ul>\r\n<li>Aumento no dano: 50 ? 51</li>\r\n</ul>\r\n<p><img style=\"width: 100%;\" src=\"http://127.0.0.1:8000/storage/post/content/2022/05/bB8qp8DyeMeozgGNm0u0DjVHFeQedRALmD0PhX1g.jpg\" alt=\"&quot;\" /></p>', 'article/2022/05/T4N5crQQBSej1zCT3UKOsnSxtiO7igpO1SbXPjVT.jpg', NULL, 3, 'post', 'active', '2022-05-17 11:46:00', NULL, '2022-05-17 14:46:50', '2022-05-17 18:44:12'),
(7, 1, 3, 'League of Legends e Valorant agora podem ser baixados também na Epic Games Store', 'league-of-legends-e-valorant-agora-podem-ser-baixados-tambem-na-epic-games-store', 'Teamfight Tactics e Legends of Runeterra são outros jogos da Riot Games que chegam ao launcher', '<h3><span style=\"font-size: 1em;\"> Teamfight Tactics e Legends of Runeterra são outros jogos da Riot Games que chegam ao launcher </span></h3>\r\n<p>A Epic Games e a Riot Games firmaram uma parceria que permitirá a partir de agora que os usuários encontrem os jogos da Riot Games diretamente na Epic Games Store, essa é mais uma ação que vem para facilitar que os jogadores encontrem os jogos da empresa e faz parte das comemorações para o lançado da série animada Arcane, que estreia em 6 de novembro na Netflix e que contará a origem das irmãs Jinx e Vi de League of Legends.</p>\r\n<p><img style=\"width: 100%;\" src=\"http://127.0.0.1:8000/storage/post/content/2022/05/uOUKAgUh1rAHPdVUzuWK240vUscqe6QWI0Qjv5c0.jpg\" alt=\"&quot;\" /></p>\r\n<p>A parceria entre Epic Games e Riot Games também trará a heroína Jinx de League of Legends para Fortnite, a partir de hoje os usuários poderão adquirir itens da personagem, que inclui traje, picareta, spray, acessório para as costas, música para o lobby e duas telas de carregamento.</p>\r\n<p>Além de parcerias nos games, a Riot Games vem anunciando ações com grandes lojistas do país no setor da moda, em uma delas serão lançadas três modelos de camisetas interativas com a temática de League of Legends pela Renner, em outra e mais recente, foi anunciado que a Havaianas e a Chilli Beans produzirão produtos exclusivos, também de League of Legends.</p>', 'article/2022/05/crzzSUIz7ZuJOBlM4I5Hc3bJMzURYmqSq6EfqH3Y.jpg', NULL, 2, 'post', 'active', '2022-05-17 11:46:00', NULL, '2022-05-17 14:46:51', '2022-05-17 18:30:18'),
(8, 1, 1, 'Battlefield V tem 10 vezes mais jogadores na Steam do que Battlefield 2042', 'battlefield-v-tem-10-vezes-mais-jogadores-na-steam-do-que-battlefield-2042', 'Game lançado em 2021 teve pico de apenas 2.584 jogadores simultâneos nas últimas 24 horas', '<h3>Game lançado em 2021 teve pico de apenas 2.584 jogadores simultâneos nas últimas 24 horas</h3>\r\n<p>Os problemas da Electronic Arts e da DICE com Battlefield 2042 ainda não acabaram. No mês passado por exemplo, o jogo teve menos de 1.000 jogadores simultâneos na Steam. Agora, de acordo com as informações da Eurogamer, o Battlefield V tem 10 vezes mais jogadores na plataforma do que o jogo lançado em 2021.</p>\r\n<p><img style=\"width: 100%;\" title=\"{title}\" src=\"http://127.0.0.1:8000/storage/post/content/2022/05/UzV1eB73HFKMkWlse1KRH0VaaLvCb9oPNMoCbw7v.jpg\" alt=\"{title}\" /></p>\r\n<p>Com a baixa adesão por parte dos jogadores desde o seu lançamento, os responsáveis pelo jogo ainda não conseguiram contornar a situação adversa, mesmo com aplicações de atualizações e cortes no preço.</p>\r\n<p>O game lançado em outubro do ano passado tem uma média baixa de jogadores simultâneos na Steam. O número máximo de jogadores que utilizaram o game nas últimas 24 horas foi de 2.584 jogadores.</p>\r\n<p>Em abril, Battlefield 2042 registou o seu valor mínimo de jogadores na Steam, tendo apenas 979 pessoas conectadas.</p>\r\n<p>Mesmo com o problema de não conseguir cativar sua comunidade, a Electronic Arts já revelou que vai disponibilizara atualização 4.0 com mais de 400 correções e que não vai desistir da franquia.</p>', 'article/2022/05/giyFiDTf76onTfSNDtfwtfF6Y6L0IGhIIWdlrTbG.jpg', NULL, 3, 'post', 'active', '2022-05-17 11:46:00', NULL, '2022-05-17 14:46:51', '2022-05-17 18:18:45'),
(9, 1, 3, 'Fall Guys chega ao Switch e Xbox e será gratuito para todos a partir de 21 de junho', 'fall-guys-chega-ao-switch-e-xbox-e-sera-gratuito-para-todos-a-partir-de-21-de-junho', 'Além de gratuito, o jogo será totalmente cross-play e com progressão compartilhada', '<h3>Além de gratuito, o jogo será totalmente cross-play e com progressão compartilhada</h3>\r\n<p> A Mediatonic acabou de anunciar ainda hoje (segunda-feira, 16) que o seu jogo Fall Guys será gratuito a partir do dia 21 de junho e finalmente vai chegar para o Nintendo Switch, consoles Xbox e em uma versão de PlayStation 5, além de gratuito na Epic Games Store no PC. O jogo será totalmente cross-play e com progressão compartilhada entre todas as plataformas, além de receber muitas novidades. </p>\r\n<p><img style=\"width: 100%;\" title=\"{title}\" src=\"http://127.0.0.1:8000/storage/post/content/2022/05/1dAZ5HjmiP3Ag9uhcwcp7geW3WGzc4faffwCDI8G.jpg\" alt=\"{title}\" /></p>\r\n<p>O evento do \"Grande Anúcio\" de Fall Guys é realmente grandioso e, além de partir de cara para a notícia que o game será free-to-play, a transmissão está carregada de informações interessantes sobre o game. Vale destacar que, além de ser gratuito e chegar em todas as plataformas, Fall Guys também vai receber uma grande atualização para adicionar novos conteúdos. </p>\r\n<p>Para quem quer saber como o jogo vai rodar no Nintendo Switch e no Xbox, a transmissão mostrou uma captura de gameplay real desses consoles. Além disso, foi divulgado que o Nintendo Switch vai rodar o game em 720p e 30fps no modo portátil e em 1080p e 30fps quando conectado à TV. Nos consoles Xbox, a configuração vai desde 1080p 30fps no Xbox One até um 4K em 60fps no Xbox Series X, veja a tabela abaixo. No PlayStation 5, o game também estará em 4K e 60 fps.</p>\r\n<p>Um diferencial muito interessante para os usuários de Xbox é que aqueles que forem assinantes do Xbox Game Pass Ultimate receberão um novo traje por mês pelos primeiros três meses após o lançamento da versão gratuita do game.</p>\r\n<p> <img style=\"width: 100%;\" title=\"{title}\" src=\"http://127.0.0.1:8000/storage/post/content/2022/05/nvSqaeqdbwpD2SuORdYBLtpyPgSK26afZTuGm0rB.jpg\" alt=\"{title}\" /></p>\r\n<p>Além disso tudo, Fall Guys também vai receber a sua \"maior atualização\" de gameplay já feita no jogo, com vários novos modos de jogo. Por fim, foi mostrado um pouco de um modo de construção de fases personalizadas para Fall Guys, mas essa modalidade ainda está em desenvolvimento e não tem previsão de quando vai chegar para todos.</p>\r\n<h3> </h3>', 'article/2022/05/JzlT75os8KDqN1e1QVov2lHtY1jZjDHzJSdZ1v1V.jpg', NULL, 2, 'post', 'active', '2022-05-17 11:46:00', NULL, '2022-05-17 14:46:51', '2022-05-17 17:02:28'),
(10, 1, 3, 'Um colosso da indústria: GTA V já vendeu 165 milhões de cópias', 'um-colosso-da-industria-gta-v-ja-vendeu-165-milhoes-de-copias', '\"Recorde\" é o sobrenome da franquia Grand Theft Auto', '<h3><span style=\"font-size: 1em;\">\"Recorde\" é o sobrenome da franquia Grand Theft Auto</span></h3>\r\n<p><span style=\"font-size: 1em;\">A Rockstar e sua dona, a Take-Two, tem rido à toa com a franquia Grand Theft Auto, especialmente com GTA V. Um dos títulos mais importantes da história, GTA V vendeu inacreditáveis 165 milhões de cópias até o momento, é o que diz o novo relatório financeiro da Take-Two referente ao fechamento do ano fiscal anterior. O jogo, como a própria Take-Two lembra, foi lançado em três gerações diferentes de consoles.</span></p>\r\n<p><span style=\"font-size: 1em;\">Segundo a dona da Rockstar, GTA V atingiu o lucro de 1 bilhão de dólares mais rápido do que qualquer lançamento de entretenimento na história. Dentro desse segmento, podemos considerar filmes, séries, livros, artes, músicas e essa lista pode ir mais longe. </span></p>\r\n<p><span style=\"font-size: 1em;\"><img style=\"width: 100%;\" title=\"{title}\" src=\"http://127.0.0.1:8000/storage/post/content/2022/05/OTEFfLBzSjAbLP5ADff927uGdVyxFStG0bpXVGtL.jpg\" alt=\"{title}\" /></span></p>\r\n<p>25 anos de história de uma franquia de sucesso<br />Diferente de Red Dead Redemption 2, que é o segundo jogo com maior faturamento em dólares em 5 anos no mercado americano, GTA V tem a primeira posição tanto em faturamento, quanto em unidades vendidas nos últimos 10 anos nos EUA. </p>\r\n<p>Em relação a toda a franquia, que começou em 1997, já são mais de 375 milhões de unidades vendidas entre diversos títulos da série principal e spin-off lançados nesses 25 anos de franquia. A Take-Two chama a franquia de \"uma das marcas mais bem-sucedidas, icônicas e sucesso de crítica em todo o entretenimento\" e \"pioneira no gênero mundo aberto\".</p>\r\n<p>O relatório da Take-Two destaca Grand Theft Auto Online, que começou gratuitamente como parte de GTA V, e foi lançado como standalone no dia 15 de março deste ano. O jogo, que está \"constantemente evoluindo\" conta com mais de 40 atualizações lançadas até o momento.</p>\r\n<p> <img style=\"width: 100%;\" title=\"{title}\" src=\"http://127.0.0.1:8000/storage/post/content/2022/05/DGxWFl6l2dj5eC1FFj2gYAMj8e0zyMH4UU4Eyf9w.jpg\" alt=\"{title}\" /></p>\r\n<p> </p>\r\n<p>De 2021 para este ano, a Take-Two aumentou seu quadro de funcionários em 963 pessoas, passando de 5.049 para 6.042 colaboradores para trabalharem no atual pipeline da empresa, que é o maior da história da Take-Two, como mostra seu relatório.</p>\r\n<p>Os novos títulos sob o guarda-chuva da Take-Two a chegarem são The Quarry (2K-10/06), Marvel\'s Midnight Sun (2K-segundo semestre de 2022) e Kerbal Space Program 2 (PC - primeiro semestre 2023). Os seguintes títulos estão prometidos para o atual ano fiscal: NBA 2K23, PGA Tour 2K23, WWE 2K23, GTA The Trilogy - Definitive Edition para celular e um novo Tales From The Borderlands.</p>\r\n<p>Está pensando em comprar algum produto online? Conheça a extensão Economize do Adrenaline para Google Chrome. Ela é gratuita e oferece a você comparativo de preços nas principais lojas e cupons para você comprar sempre com o melhor preço. Baixe agora.</p>', 'article/2022/05/FnxE4fTFqsIM0YuSgyBEkDfTtpTXNFcrxSsjUlJu.jpg', NULL, 2, 'post', 'active', '2022-05-17 11:46:00', NULL, '2022-05-17 14:46:51', '2022-05-17 16:22:25'),
(11, 1, 3, 'Take-Two diz estar atenta a jogadores que sentem que Red Dead Online foi abandonado', 'take-two-diz-estar-atenta-a-jogadores-que-sentem-que-red-dead-online-foi-abandonado', 'A empresa diz que a Rockstar ainda prepara diversas atualizações para o game', '<h3>A empresa diz que a Rockstar ainda prepara diversas atualizações para o game</h3>\r\n<p>Ao mesmo tempo em que Red Dead Redemption 2 continua fazendo sucesso e chegou às 44 milhões de cópias vendidas, seu modo online permanece sem receber grandes atualizações por parte da Rockstar Games. Em uma entrevista concedida à IGN, o CEO da Take-Two, Strauss Zelnick, afirma estar atento às frustrações expressadas por jogadores em diversas ocasiões.</p>\r\n<p>Segundo o executivo, a desenvolvedora do game tem diversas conversas internas relacionadas aos conteúdos que planeja para Red Dead Online. “A Rockstar Games fala muito sobre as atualizações que estão vindo, e estamos trabalhando em muita coisa na Rockstar</p>\r\n<p><img style=\"width: 100%;\" title=\"{title}\" src=\"http://127.0.0.1:8000/storage/post/content/2022/05/0CogXqWxpwVLZYgQhivTYbl937cY8lXzOwSshe39.jpg\" alt=\"{title}\" /></p>\r\n<h3> Suporte a Red Dead Online permanece incerto</h3>\r\n<p>Questionado sobre por quanto tempo a Rockstar Games pretende dar suporte oficial a Red Dead Online, Zelnick afirmou que isso seria feito a longo prazo. No entanto, pouco tempo depois a Take-Two entrou em contato com a IGN para afirmar que o CEO estava se referindo aos servidores do jogo, não necessariamente ao desenvolvimento de novos conteúdos.</p>\r\n<p>A falta de atualizações substanciais para o modo online de Red Dead Redemption 2 já gerou diversos protestos entre os jogadores, que tem visto a desenvolvedora focar seus esforços em dar suporte a GTA Online. Em janeiro deste ano, a comunidade dedicada ao jogo de faroeste se organizou com a hashtag #SaveRedDeadOnline com a intenção de chamar a atenção para o suposto “abandono” do modo online.</p>\r\n<h3><img style=\"width: 100%;\" title=\"{title}\" src=\"http://127.0.0.1:8000/storage/post/content/2022/05/NgZ4kXFqAj6k53YxYq72JMKhLBJkE5MxGJnQNgQh.png\" alt=\"{title}\" /></h3>\r\n<p>No momento, a Rockstar Games tem focado suas atualizações de Red Dead Online em eventos que garantem mais experiência e outros bônus a seus jogadores. A última atualização substancial do game aconteceu em dezembro de 2021, quando a desenvolvedora liberou o modo Às Armas Festivo, no qual os jogadores precisavam defender povoados de invasões.</p>', 'article/2022/05/ORU8c81pxESoWMQooVkmQjwXnNaLp4nLkvvZqwzM.png', NULL, 4, 'post', 'active', '2022-05-17 11:46:00', NULL, '2022-05-17 14:46:51', '2022-05-17 18:15:46'),
(12, 1, 2, 'Amazon admite que Lost Ark ainda tem um grande problema com bots e promete mudanças', 'amazon-admite-que-lost-ark-ainda-tem-um-grande-problema-com-bots-e-promete-mudancas', 'Esse tempora et similique consequatur nisi deserunt esse rem facere hic perspiciatis ut ad.', '<h3>Isso acontece mesmo após o banimento de milhões de contas</h3>\r\n<p>Jogo mais bem-sucedido da história da Amazon Games, Lost Ark tem atraído a atenção de milhares de jogadores que usam bots para obter recursos e ganhar níveis no jogo. Apesar das iniciativas dos desenvolvedores em banir milhões de contas, o problema continua persistente e frustrante, conforme admitiu a própria empresa em seu blog oficial.</p>\r\n<p>Segundo a Amazon Games, a questão permanece gerando dores de cabeça entre os jogadores mesmo após milhões de bots já terem sido banidos. “Desde que Lost Ark foi lançado, estivemos lutando uma guerra contra os bots se infiltrando em Arkesia”, afirmou a companhia, que reconheceu que o aspecto free to play do jogo dificulta combater a criação de novas contas falsas.</p>\r\n<h2><img style=\"width: 1374px;\" title=\"{title}\" src=\"http://127.0.0.1:8000/storage/post/content/2022/05/0VHqVUTlMv98jN8b7DsKX3Y3s7q3C9upaUFUosjv.jpg\" alt=\"{title}\" height=\"773\" /></h2>\r\n<p>Além de apostar em novas levas de banimentos no MMO, a empresa está trabalhando junto à desenvolvedora Smilegate para diminuir o impacto que os bots têm sobre os jogadores reais. Segundo ela, isso envolve modificar o sistema de recompensas de missões para assegurar que as contas falsas não vão ter métodos rápidos de acumular ouro, por exemplo.</p>\r\n<h3>Lost Ark vai ganhar novos sistemas anticheat</h3>\r\n<p>A Amazon Games também revelou que uma atualização de Lost Ark vai trazer ao jogo o sistema Easy Anticheat, que virá acompanhado por uma ferramenta nativa de detecção de atividades consideradas ilegais. O game também vai modificar seu sistema de chats, para assegurar que contas recém-criadas não vão poder ser usadas para fazer o spam de mensagens oferecendo a venda de ouro.</p>\r\n<p>Em sua mensagem, a companhia também descartou a possibilidade de usar sistemas de autenticação em duas etapas para impedir a atividade de bots. Segundo ela, soluções do tipo “exigiriam mudar substanciais de plataforma e arquitetura para serem implementadas em Lost Ark”.</p>', 'article/2022/05/laXtUTlc3xCcnM2bOMprphXdpdOmgkU76hcCjCZv.jpg', NULL, 10, 'post', 'active', '2022-05-03 11:46:00', NULL, '2022-05-17 14:46:51', '2022-05-17 22:37:14'),
(18, 1, NULL, 'Confira o trailer dublado de The Witcher 3: Wild Hunt', 'confira-o-trailer-dublado-de-the-witcher-3-wild-hunt', 'Apertem os cintos mobilenautas por que ás cenas que vocês verão a seguir são fortes e não é por que o vídeo é ‘pesado’ e sim por que ele é dublado, isso mesmo, o primeiro trailer dublado de The Witcher 3:Wild Hunt.', NULL, 'article/2022/05/2QPh0A4O2mS4Rci95VSo9dpLvZuiwW6iIUIP7uTL.jpg', 'https://www.youtube.com/embed/vuOPN4MpLaM', 1, 'video', 'active', '2022-05-17 11:46:00', NULL, '2022-05-17 14:46:51', '2022-05-17 22:49:08'),
(20, 1, NULL, 'Anitta será personagem de Free Fire e terá música exclusiva dentro do jogo', 'anitta-sera-personagem-de-free-fire-e-tera-musica-exclusiva-dentro-do-jogo', 'Cantora terá um evento temático dedicado a ela no jogo', NULL, 'article/2022/05/x2BF3OyZUUQ8y7DXx5eWc7Vqrec9eouxaV700438.jpg', 'https://www.youtube.com/embed/Fklm6GmYUeo', 3, 'video', 'active', '2022-05-17 11:46:00', NULL, '2022-05-17 14:46:51', '2022-05-17 22:50:26'),
(21, 1, NULL, 'Elden Ring ganha trailer de lançamento em português', 'elden-ring-ganha-trailer-de-lancamento-em-portugues', 'Com destaque para mecânicas e história', NULL, 'article/2022/05/8JRFwtxwdoqFFfqpJ0FoeJB3CKAnjMzQ06A1dUtn.jpg', 'https://www.youtube.com/embed/OT8if6DXOFQ', 1, 'video', 'active', '2022-05-17 11:46:00', NULL, '2022-05-17 14:46:51', '2022-05-17 22:49:16'),
(22, 1, NULL, 'Zelda Breath of the Wild 2: Os segredos do novo trailer', 'zelda-breath-of-the-wild-2-os-segredos-do-novo-trailer', 'Braço mecânico, ilhas no céu e muito mais do trailer apresentando na Nintendo Direct da E3 2021', NULL, 'article/2022/05/tIZWDHBiu4PtgbokDtUajzpb4j1PfLETH8Od3U77.jpg', 'https://www.youtube.com/embed/Pi-MRZBP91I', 3, 'video', 'active', '2022-05-17 11:46:00', NULL, '2022-05-17 14:46:51', '2022-05-17 22:49:19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '[post, video]',
  `uri` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id`, `title`, `type`, `uri`, `description`, `cover`, `created_at`, `updated_at`) VALUES
(1, 'Evento', 'post', 'evento', 'Rerum et officiis animi soluta omnis. Perspiciatis distinctio ipsa omnis expedita quibusdam. Dolorum id dolores quia et quos aut.', NULL, '2022-05-17 14:46:50', '2022-05-17 14:46:50'),
(2, 'Lost Ark', 'post', 'lost-ark', 'Todas noticias sobre Lost Ark', NULL, '2022-05-17 15:53:42', '2022-05-17 15:53:42'),
(3, 'Games', 'post', 'games', 'Todas noticias sobre Games', NULL, '2022-05-17 16:00:26', '2022-05-17 16:00:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `highlights`
--

CREATE TABLE `highlights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `highlights`
--

INSERT INTO `highlights` (`id`, `article_id`, `title`, `position`) VALUES
(1, 11, 'Pequeno', 'small'),
(2, 4, 'Pequeno', 'small'),
(3, 3, 'Pequeno', 'small'),
(4, 6, 'Pequeno', 'small'),
(5, 7, 'Pequeno(p)', 'small diff'),
(6, 9, 'Médio', 'medium'),
(7, 8, 'Grande', 'large');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(935, '2014_10_12_000000_create_users_table', 1),
(936, '2014_10_12_100000_create_password_resets_table', 1),
(937, '2019_08_19_000000_create_failed_jobs_table', 1),
(938, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(939, '2022_03_28_162359_create_categories_table', 1),
(940, '2022_03_28_163634_create_accesses_table', 1),
(941, '2022_03_28_163940_create_articles_table', 1),
(942, '2022_04_20_125805_create_slides_table', 1),
(943, '2022_04_22_204728_create_highlights_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) DEFAULT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `slides`
--

INSERT INTO `slides` (`id`, `article_id`, `order`) VALUES
(1, 4, 2),
(2, 8, 3),
(3, 12, 1),
(4, 1, 4),
(5, NULL, 5),
(6, NULL, 6),
(7, NULL, 7),
(8, NULL, 8),
(9, NULL, 9),
(10, NULL, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 to 10',
  `genre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'masculine, feminine',
  `datebirth` date DEFAULT NULL,
  `document` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `level`, `genre`, `datebirth`, `document`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Lauren', 'Fritsch', 'pizzagamer@gmail.com', '$2y$10$ilZFQM1NUsoUJuzRS0pbVeaaMaceZFi66cr6Xzbgd5ToZAIxlkgFa', '10', NULL, '1976-11-17', '17069076', 'media/profile/default.jpg', NULL, '2022-05-17 14:46:50', '2022-05-17 14:46:50');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `accesses`
--
ALTER TABLE `accesses`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_uri_unique` (`uri`),
  ADD KEY `articles_user_id_foreign` (`user_id`);

--
-- Índices para tabela `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices para tabela `highlights`
--
ALTER TABLE `highlights`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices para tabela `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `accesses`
--
ALTER TABLE `accesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `highlights`
--
ALTER TABLE `highlights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=944;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
