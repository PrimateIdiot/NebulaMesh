-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2023 at 07:02 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cosmic`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `material_name` varchar(255) NOT NULL,
  `image_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `username`, `material_name`, `image_link`) VALUES
(1, 'Kirkorab', 'Laces', 'images/img1.png'),
(2, 'Lukies', 'Blue And White Floral Pattern Fabric', 'images/img2.png'),
(3, 'Primate', 'Fabric Pattern', 'images/img3.png'),
(4, 'Grzesiek', 'Rope', 'images/img4.png'),
(5, 'Zbysiek', 'Pencil Patterned Fabric Flannel', 'images/img5.png'),
(6, 'Mateusz', 'Patched Cloth', 'images/img6.png'),
(7, 'Jasio', 'Craft', 'images/img7.png'),
(8, 'Karol', 'Patchwork Blanket For Kids', 'images/img8.png'),
(9, 'Rozalja', 'Wattermelon Patterned Flannel Fabric', 'images/img9.png'),
(10, 'Franek', '', 'images/img10.png'),
(11, 'Konrad', '', 'images/img11.png'),
(12, 'Szymon', '', 'images/img12.png');

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `model_name` varchar(255) NOT NULL,
  `image_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `username`, `model_name`, `image_link`) VALUES
(1, 'SkyWalker87', 'Machine', 'images/img1.png'),
(2, 'GalacticBuilder', 'Glass', 'images/img2.png'),
(3, 'IslandExplorer', 'Island', 'images/img3.png'),
(4, 'DreamCrafter', 'Pillow', 'images/img4.png'),
(5, 'SpaceRoomDesigner', 'Room', 'images/img5.png'),
(6, 'HoppyAdventurer', 'Frog', 'images/img6.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `material` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `texture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `textures`
--

CREATE TABLE `textures` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `texture_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `textures`
--

INSERT INTO `textures` (`id`, `username`, `texture_name`, `description`, `image_link`) VALUES
(1, 'Andrzej', 'Fabric', 'A fabric material is a flexible, woven or knitted material made from fibers or yarns that are either natural or synthetic. Natural fibers used in fabric materials include cotton, wool, silk, and linen, while synthetic fibers include polyester,\r\n          ', 'images/img1.png'),
(2, 'Mateusz', 'Corroded Metal', 'Corroded metal refers to metal that has been chemically or electrochemically deteriorated due to exposure to oxygen, moisture, acids, or other corrosive substances.', 'images/img2.jpg'),
(3, 'Bob', 'Rubble Brick', 'Rubble brick, also known as rubble stone or rubble masonry, is a type of brickwork that uses irregularly shaped and unevenly sized stones or bricks to construct a wall or structure.', 'images/img3.jpg'),
(4, 'Charlie', 'Brick Wall', 'Brick Wall 🗿', 'images/img4.jpg'),
(5, 'David', 'Road', 'A road is a defined pathway or route on land that is designed, constructed, and maintained for the purpose of vehicular or pedestrian transportation.', 'images/img5.jpg'),
(6, 'Eva', 'Asphalt', 'Asphalt, also known as bitumen, is a black or gray, highly viscous and sticky, semi-solid or liquid petroleum-based material. It is used as a binding agent in the construction of roads, highways, pavements, and other infrastructure.', 'images/img6.jpg'),
(7, 'Frank', 'Wood', 'Wood is a natural material derived from the trunks, branches, and roots of trees, It is one of the most widely used and versatile materials in construction, furniture, paper, and many other applications', 'images/img7.jpg'),
(8, 'Grace', 'Diamond Plate', 'Diamond plate is a type of metal sheet that has a raised diamond pattern on its surface. It is typically made from aluminum or steel, and is commonly used in industrial for its durability, slip resistance, and decorative appearance.', 'images/img8.jpg'),
(9, 'Hank', 'Cucumber', 'Cucumber 👍', 'images/img9.jpg'),
(10, 'Ivy', 'Grass', 'Grass is a type of plant that belongs to the family Poaceae and is commonly found in many regions around the world. It is a herbaceous plant that typically grows in tufts or clumps, with long, narrow leaves and a fibrous root system.', 'images/img10.jpg'),
(11, 'Jack', 'Gravel', 'Gravel is a type of small, loose rock or stone that is commonly used in construction, landscaping, and road surfacing. It is typically made up of a mixture of various-sized rock fragments, ranging from pebbles to larger stones.', 'images/img11.jpg'),
(12, 'Karen', 'Moss', 'Moss is a small, non-vascular plant that belongs to the group of bryophytes. It is commonly found in moist and shaded environments, such as forests, woodlands, and damp areas of rocks, logs, and soil.', 'images/img12.jpg'),
(13, 'Leo', 'Tiles', 'Tiles are flat, often square or rectangular, pieces made of various materials, such as ceramic, porcelain, stone, glass, or metal, used for covering surfaces like floors, walls, roofs, and countertops.', 'images/img13.jpg'),
(14, 'Mia', 'Wicker', 'Wicker is a type of woven furniture or decorative item typically made from plant-based materials, such as rattan, cane, reed, or bamboo. It is known for its distinctive woven pattern, creating a natural and rustic appearance.', 'images/img14.jpg'),
(15, 'Noah', 'Ground', 'Ground is solid surface of the Earths crust that forms the foundation for the landscape we walk on. It is made up of various natural materials, such as soil, sand, rocks, clay, and vegetation.', 'images/img15.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `textures`
--
ALTER TABLE `textures`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `textures`
--
ALTER TABLE `textures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
