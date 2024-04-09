-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 21, 2023 at 09:48 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CharlieShop`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) NOT NULL,
  `cat_id` bigint(20) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `secondary_image` varchar(255) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_description` varchar(500) NOT NULL,
  `product_tag` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `product_name`, `product_image`, `secondary_image`, `product_price`, `product_description`, `product_tag`, `created_at`) VALUES
(1, 1, 'Pattern Cleansing Shampoo', 'cshampoo4.png', 'shampoo3.png', '17.00', 'When it\'s time for a deep clean, this cleansing shampoo revives the scalp without stripping away the natural oil of your hair.', 'clarifying', '2023-08-16 19:35:42'),
(2, 1, 'DGJ clarifying Shampoo', 'cshampoo5.png', 'cshampoo5.png', '13.50', 'DGJ Organics Clarifying Shampoo with Mandarin essential oils and Rose Extracts, is designed to gently remove everyday product build up and impurities. It will give your hair a fresh start and restore shine and vitality.', 'clarifying', '2023-08-16 19:35:42'),
(3, 1, 'Shea Moisture Shampoo', 'moisshampoo1.png', 'secondimage2.png', '12.00', 'This sulphate free shampoo helps to replenish and seal in moisture to dehydrated strands leaving hair smoother, stronger and healthy looking. The Argan Oil, Sea Kelp and Fair-Trade Shea Butter from Ghana are natural and effective ingredients that deliver intense moisturisation and nourishment.', 'moisturizing', '2023-08-16 19:35:42'),
(4, 1, 'Curlessence Moisturizing Shampoo', 'moisshampoo2.png', 'moisshampoo2.png\r\n', '14.00', 'Formulated with the hero ingredient, Jamaican Black Castor Oil, the shampoo works to seal cuticles and strengthen hair. Also made with Coconut Oil, the formula promotes scalp health and protects against breakage, softening the strands.', 'moisturizing', '2023-08-16 19:35:42'),
(5, 1, 'Pantene Moisturizing Shampoo', 'moisshampoo3.png', 'secondimage5.png', '9.00', 'With the blend of Pantene’s advanced Pro-Vitamin formula and Japanese Rice Oil essence, it helps your hair become moisturized and hydrated from the roots to the tips.', 'moisturizing', '2023-08-16 19:35:42'),
(6, 1, 'Aveeno Clarifying Shampoo', 'cshampoo1.png', 'cshampoo1.png', '7.50', 'Our scalp soothing blend is infused with apple cider vinegar botanical ingredients that gently clarifies congested hair and enhances vibrancy and shine. Hair is left lightly hydrated, healthy-looking and with a natural, glossy shine.', 'clarifying', '2023-08-16 19:35:42'),
(7, 1, 'Keracare Shampoo', 'moisshampoo4.png', 'moisshampoo4.png', '11.50', 'Tease out those tangles with this conditioning KeraCare Hydrating Detangling Shampoo. Its light formula not only cleans and cleanses hair, but it is also excellent for relaxing hair leaving it with a healthy looking appearance.', 'moisturizing', '2023-08-16 19:35:42'),
(8, 1, 'Redken Shampoo', 'cshampoo2.png', 'secondimage8.png', '20.00', 'Redken Hair Cleansing Cream is a clarifying shampoo for all hair types and textures that removes dry shampoo and product build up, hard water minerals, excess oil, and pollution residue in just one use.', 'clarifying', '2023-08-16 19:35:42'),
(9, 2, 'Shea Moisture Hair Masque', 'deepcond1.png', 'deepcond1.png', '13.00', 'Shea Moisture Manuka Honey & Mafura Oil Intensive Hydration Hair Masque (355ml) is an intense conditioning treatment for use on dry, brittle hair.', 'deep-conditioners', '2023-08-16 19:35:42'),
(10, 2, 'Shea Moisture Protein Power Treatment', 'deepcond2.png', 'deepcond2.png', '15.50', 'Certified organic Shea Butter, ultra-moisturizing Manuka Honey and Yogurt in a deep conditioning formula that fortifies weak strands, combating breakage and split ends to leave hair looking smooth and healthy. ', 'deep-conditioners', '2023-08-16 19:35:42'),
(11, 2, 'Soultanicals Deep Conditioner', 'deepcond5.png', 'secondimage11.png', '22.00', 'Chebe-Ginger Deep Conditioner is excellent for healthy hair growth & length retention! This pH balanced deep conditioner cleanses the scalp, moisturizes and nourishes the hair follicles to grow long.', 'deep-conditioners', '2023-08-16 19:35:42'),
(12, 2, 'Curl Company Leave In Conditioner', 'leaveincond1.png', 'leaveincond1.png', '19.00', 'Professionally formulated with CURLPLEX, a blend of Moringa Oil and Meadowfoam Seed Oil, your curls and coils will stay silky smooth and thirst free. \r\n\r\n', 'leave-in', '2023-08-16 19:35:42'),
(13, 2, 'Originals Olive Oil Deep Conditioner', 'deepcond3.png', 'deepcond3.png', '17.00', 'Africas Best Olive Oil Deep Conditioner helps rejuvenate and renew weak fragile hair, leaving the hair healthier looking with greater body, shine, elasticity and moisture. Formulated with the age old properties of extra virgin olive oil.', 'deep-conditioners', '2023-08-16 19:35:42'),
(14, 2, 'Bio Happy Leave In Conditioner', 'leaveincond5.png', 'leaveincond5.png', '25.50', 'The 2-phase conditioning spray is rich in hemp and oat extracts. It is specially formulated for fine hair, sensitive scalp types and frequently washed hair. The conditioner restructures and detangles the hair for increased hair manageability and shine.', 'leave-in', '2023-08-16 19:35:42'),
(15, 2, 'Argan Oil Deep Conditioner', 'deepcond4.png', 'deepcond4.png', '12.50', 'TCB Naturals Argan Oil Deep Conditioner Treatment combines nature and science to strengthen, repair and moisturize your hair, improving its condition and shine or amazingly healthy-looking hair.', 'deep-conditioners', '2023-08-16 19:35:42'),
(16, 2, 'Palmers Leave In Conditioner', 'leaveincond4.png', 'secondimage16.png', '13.00', 'Palmer\'s Coconut Oil Formula Leave-In Conditioner instantly detangles, putting an end to tugging and pulling at knotty, unruly hair.\r\nWith a few sprays hair has instant slip and silkiness for easier comb-through and styling.', 'leave-in', '2023-08-16 19:35:42'),
(17, 3, 'Shea Moisture Curling Smoothie', 'haircream1.png', 'haircream1.png', '9.00', 'Perfect for thick, curly hair, this smoothie is enriched with organic Shea Butter to tame flyaways and smooth frizz whilst Coconut Oil moisturises the hair & scalp for healthy growth.', 'curling-creams', '2023-08-16 19:35:42'),
(18, 3, 'Mielle Curl Smoothie', 'haircream2.png', 'haircream2.png', '15.00', 'Mielle Organics Moisturizing pomagranate and honey curl smoothie hydration and moisture for dry thirsty hair. Hydrating extract blend, filled with botanicals, certified organic ingredients. The Ultra moisturizing hair milk to fully add moisture and shine.\r\n\r\n', 'curling-creams', '2023-08-16 19:35:42'),
(19, 3, 'Africa Pride Curling Cream', 'haircream3.png', 'haircream3.png', '12.00', 'This versatile curling cream blends Shea Butter and Flax Seed Oil to provide deep moisture, lasting definition, and radiant shine; leaving coily and curly styles smooth and bouncy with soft hold.', 'curling-creams', '2023-08-16 19:35:42'),
(20, 3, 'Root 2tip Anti-Breakage Creme', 'haircream4.png', 'haircream4.png', '13.50', 'Rich, creamy and thick, Our Quench is like an indulgent Greek-style yoghurt, but for your dehydrated hair! Specially formulated for type 4 hair textures that are resistant to moisture and prone to single-strand knots and split ends.', 'all', '2023-08-16 19:35:42'),
(21, 3, 'Bread Hair-Cream', 'haircream5.png', 'haircream5.png', '11.00', 'An enhancing cream with conditioning and healing properties. Gives a semi-defined, soft-hold on your hair.', 'all', '2023-08-16 19:35:42'),
(22, 3, 'AS I AM Castor Oil Curling Creme', 'haircream6.png', 'haircream6.png', '19.00', 'This rich formula will provide longer lasting hold, minimize frizz, and maintain curl definition for days.', 'curling-creams', '2023-08-16 19:35:42'),
(23, 3, 'Maui Moisture Curl Smoothie', 'haircream7.png', 'haircream7.png', '7.50', 'Rich coconut oil is blended into this creamy curl smoothie along with papaya butter and plumeria extract.', 'curling-creams', '2023-08-16 19:35:42'),
(24, 3, 'Insight Elasti-Curl', 'haircream8.png', 'haircream8.png', '10.00', 'Styling cream for wavy and curly hair, with Anti-Frizz effect. ', 'curling-creams', '2023-08-16 19:35:42');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) NOT NULL,
  `cat_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `cat_name`, `created_at`) VALUES
(1, 'Shampoos', '2023-08-16 19:35:42'),
(2, 'Conditioners', '2023-08-16 19:35:42'),
(3, 'Hair Creams', '2023-08-16 19:35:42');

-- --------------------------------------------------------

--
-- Table structure for table `sale_history`
--

CREATE TABLE `sale_history` (
  `sale_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `product` varchar(150) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `transaction_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sale_history`
--

INSERT INTO `sale_history` (`sale_id`, `user_id`, `product`, `quantity`, `price`, `transaction_time`) VALUES
(3, 3, 'Africa Pride Curling Cream', 1, '12.00', '2023-08-21 19:39:52'),
(4, 3, 'Keracare Shampoo', 1, '12.00', '2023-08-21 19:41:25'),
(5, 3, 'Pantene Moisturizing Shampoo', 3, '9.00', '2023-08-21 19:41:25'),
(6, 3, 'Keracare Shampoo', 2, '11.50', '2023-08-21 19:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `created_at`) VALUES
(3, 'jerry123', 'jerry123@gmail.com', '$2y$10$/U/MrmD0TclH.thwgPcVo.Tq2q71vCesJaXkFFgIDi/Y1vrGG4zLa', '2023-08-20 23:24:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_history`
--
ALTER TABLE `sale_history`
  ADD PRIMARY KEY (`sale_id`),
  ADD KEY `user` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sale_history`
--
ALTER TABLE `sale_history`
  MODIFY `sale_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `product_categories` (`id`);

--
-- Constraints for table `sale_history`
--
ALTER TABLE `sale_history`
  ADD CONSTRAINT `sale_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
