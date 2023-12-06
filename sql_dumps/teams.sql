-- -------------------------------------------------------------
-- TablePlus 5.6.6(520)
--
-- https://tableplus.com/
--
-- Database: nfl-game
-- Generation Time: 2023-12-06 18:33:07.2550
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


DROP TABLE IF EXISTS `teams`;
CREATE TABLE `teams` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_id` int NOT NULL,
  `logo_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `teams_name_unique` (`name`),
  UNIQUE KEY `teams_short_name_unique` (`short_name`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

INSERT INTO `teams` (`id`, `name`, `short_name`, `group`, `api_id`, `logo_url`, `created_at`, `updated_at`) VALUES
(1, 'Atlanta Falcons', 'ATL', 'NFC South', 1, 'https://a.espncdn.com/i/teamlogos/nfl/500/atl.png', '2023-12-06 16:04:08', '2023-12-06 16:04:08'),
(2, 'Buffalo Bills', 'BUF', 'AFC East', 2, 'https://a.espncdn.com/i/teamlogos/nfl/500/buf.png', '2023-12-06 16:04:09', '2023-12-06 16:04:09'),
(3, 'Chicago Bears', 'CHI', 'NFC North', 3, 'https://a.espncdn.com/i/teamlogos/nfl/500/chi.png', '2023-12-06 16:04:10', '2023-12-06 16:04:10'),
(4, 'Cincinnati Bengals', 'CIN', 'AFC North', 4, 'https://a.espncdn.com/i/teamlogos/nfl/500/cin.png', '2023-12-06 16:04:11', '2023-12-06 16:04:11'),
(5, 'Cleveland Browns', 'CLE', 'AFC North', 5, 'https://a.espncdn.com/i/teamlogos/nfl/500/cle.png', '2023-12-06 16:04:12', '2023-12-06 16:04:12'),
(6, 'Dallas Cowboys', 'DAL', 'NFC East', 6, 'https://a.espncdn.com/i/teamlogos/nfl/500/dal.png', '2023-12-06 16:04:13', '2023-12-06 16:04:13'),
(7, 'Denver Broncos', 'DEN', 'AFC West', 7, 'https://a.espncdn.com/i/teamlogos/nfl/500/den.png', '2023-12-06 16:04:14', '2023-12-06 16:04:14'),
(8, 'Detroit Lions', 'DET', 'NFC North', 8, 'https://a.espncdn.com/i/teamlogos/nfl/500/det.png', '2023-12-06 16:04:16', '2023-12-06 16:04:16'),
(9, 'Green Bay Packers', 'GB', 'NFC North', 9, 'https://a.espncdn.com/i/teamlogos/nfl/500/gb.png', '2023-12-06 16:04:17', '2023-12-06 16:04:17'),
(10, 'Tennessee Titans', 'TEN', 'AFC South', 10, 'https://a.espncdn.com/i/teamlogos/nfl/500/ten.png', '2023-12-06 16:04:18', '2023-12-06 16:04:18'),
(11, 'Indianapolis Colts', 'IND', 'AFC South', 11, 'https://a.espncdn.com/i/teamlogos/nfl/500/ind.png', '2023-12-06 16:04:19', '2023-12-06 16:04:19'),
(12, 'Kansas City Chiefs', 'KC', 'AFC West', 12, 'https://a.espncdn.com/i/teamlogos/nfl/500/kc.png', '2023-12-06 16:04:21', '2023-12-06 16:04:21'),
(13, 'Las Vegas Raiders', 'LV', 'AFC West', 13, 'https://a.espncdn.com/i/teamlogos/nfl/500/lv.png', '2023-12-06 16:04:22', '2023-12-06 16:04:22'),
(14, 'Los Angeles Rams', 'LAR', 'NFC West', 14, 'https://a.espncdn.com/i/teamlogos/nfl/500/lar.png', '2023-12-06 16:04:23', '2023-12-06 16:04:23'),
(15, 'Miami Dolphins', 'MIA', 'AFC East', 15, 'https://a.espncdn.com/i/teamlogos/nfl/500/mia.png', '2023-12-06 16:04:24', '2023-12-06 16:04:24'),
(16, 'Minnesota Vikings', 'MIN', 'NFC North', 16, 'https://a.espncdn.com/i/teamlogos/nfl/500/min.png', '2023-12-06 16:04:25', '2023-12-06 16:04:25'),
(17, 'New England Patriots', 'NE', 'AFC East', 17, 'https://a.espncdn.com/i/teamlogos/nfl/500/ne.png', '2023-12-06 16:04:26', '2023-12-06 16:04:26'),
(18, 'New Orleans Saints', 'NO', 'NFC South', 18, 'https://a.espncdn.com/i/teamlogos/nfl/500/no.png', '2023-12-06 16:04:27', '2023-12-06 16:04:27'),
(19, 'New York Giants', 'NYG', 'NFC East', 19, 'https://a.espncdn.com/i/teamlogos/nfl/500/nyg.png', '2023-12-06 16:04:28', '2023-12-06 16:04:28'),
(20, 'New York Jets', 'NYJ', 'AFC East', 20, 'https://a.espncdn.com/i/teamlogos/nfl/500/nyj.png', '2023-12-06 16:04:29', '2023-12-06 16:04:29'),
(21, 'Philadelphia Eagles', 'PHI', 'NFC East', 21, 'https://a.espncdn.com/i/teamlogos/nfl/500/phi.png', '2023-12-06 16:04:30', '2023-12-06 16:04:30'),
(22, 'Arizona Cardinals', 'ARI', 'NFC West', 22, 'https://a.espncdn.com/i/teamlogos/nfl/500/ari.png', '2023-12-06 16:04:31', '2023-12-06 16:04:31'),
(23, 'Pittsburgh Steelers', 'PIT', 'AFC North', 23, 'https://a.espncdn.com/i/teamlogos/nfl/500/pit.png', '2023-12-06 16:04:32', '2023-12-06 16:04:32'),
(24, 'Los Angeles Chargers', 'LAC', 'AFC West', 24, 'https://a.espncdn.com/i/teamlogos/nfl/500/lac.png', '2023-12-06 16:04:33', '2023-12-06 16:04:33'),
(25, 'San Francisco 49ers', 'SF', 'NFC West', 25, 'https://a.espncdn.com/i/teamlogos/nfl/500/sf.png', '2023-12-06 16:04:34', '2023-12-06 16:04:34'),
(26, 'Seattle Seahawks', 'SEA', 'NFC West', 26, 'https://a.espncdn.com/i/teamlogos/nfl/500/sea.png', '2023-12-06 16:04:35', '2023-12-06 16:04:35'),
(27, 'Tampa Bay Buccaneers', 'TB', 'NFC South', 27, 'https://a.espncdn.com/i/teamlogos/nfl/500/tb.png', '2023-12-06 16:04:37', '2023-12-06 16:04:37'),
(28, 'Washington Commanders', 'WSH', 'NFC East', 28, 'https://a.espncdn.com/i/teamlogos/nfl/500/wsh.png', '2023-12-06 16:04:38', '2023-12-06 16:04:38'),
(29, 'Carolina Panthers', 'CAR', 'NFC South', 29, 'https://a.espncdn.com/i/teamlogos/nfl/500/car.png', '2023-12-06 16:04:39', '2023-12-06 16:04:39'),
(30, 'Jacksonville Jaguars', 'JAX', 'AFC South', 30, 'https://a.espncdn.com/i/teamlogos/nfl/500/jax.png', '2023-12-06 16:04:40', '2023-12-06 16:04:40'),
(31, 'Baltimore Ravens', 'BAL', 'AFC North', 33, 'https://a.espncdn.com/i/teamlogos/nfl/500/bal.png', '2023-12-06 16:04:41', '2023-12-06 16:04:41'),
(32, 'Houston Texans', 'HOU', 'AFC South', 34, 'https://a.espncdn.com/i/teamlogos/nfl/500/hou.png', '2023-12-06 16:04:43', '2023-12-06 16:04:43');


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;