-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2022 at 03:44 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomm`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cat_slug` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `cat_slug`) VALUES
(1, 'White Rice', 'white_rice'),
(2, 'Black Rice', 'black_rice'),
(3, 'Brown Rice', 'brown_rice'),
(4, 'Red Rice', 'red_rice'),
(5, 'Special Rice and Substitution Rice', 'special_rice_substitution_rice');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `sales_id`, `product_id`, `quantity`) VALUES
(36, 29, 32, 2),
(37, 30, 29, 2),
(38, 31, 32, 1),
(39, 32, 43, 1),
(40, 33, 32, 1),
(41, 34, 32, 1),
(42, 35, 32, 1),
(43, 37, 32, 1),
(44, 38, 39, 4),
(45, 39, 32, 4),
(46, 40, 39, 1),
(47, 40, 44, 1),
(48, 41, 39, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(200) NOT NULL,
  `date_view` date NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `slug`, `price`, `photo`, `date_view`, `counter`) VALUES
(27, 1, 'Lipeno C4 Dinurado Rice - 25KG', '<p><strong>Dinorado special rice</strong> is a 100% Philippine rice type with a natural fragrant scent, white long grain, smooth, shiny, and silky appearance. It has a pleasant and fragrant scent when cooked. Dinorado rice is soft, slightly sticky, and chewy when cooked.</p>\r\n\r\n<p><strong>Dinorado </strong>rice can be consumed plain, fried, in paella, or in any other rice dish.</p>\r\n\r\n<p><strong>Dinorado</strong>, on the other hand, is a touch stickier than Sinandomeng. Dinorado Rice has a stronger aroma than Sinandomeng Rice, but not as strong as Jasmine Rice. Dinorado is excellent for congee and everyday rice. The most common rice variety for everyday meals is Sinandomeng.</p>\r\n', 'lipeno-c4-dinurado-rice-25kg', 1100, 'lipeno-c4-dinurado-rice-25kg.png', '2022-05-05', 1),
(28, 1, 'Lipeno Whole Grain Sinandomeng Rice - 25KG', '<p>Freshly milled and made entirely in the Philippines. It&#39;s made entirely of whole grains and has a natural aromatic scent.</p>\r\n\r\n<p>Long white grains with a smooth, lustrous, and silky look.</p>\r\n\r\n<p>When it comes to freshly milled white rice, it&#39;s recommended to eat it within 1-3 months of the milling date.</p>\r\n', 'lipeno-whole-grain-sinandomeng-rice-25kg', 1000, 'lipeno-whole-grain-sinandomeng-rice-25kg.png', '0000-00-00', 0),
(29, 1, 'Coco Pandan Premium Rice - 25KG', '<p><strong>Coco Pandan Premium Rice</strong> contains long grains and is fragrant. It has a soft, silky, and sticky texture when cooked. It has a very white appearance and retains its smell even after cooking. Even at room temperature, it maintains its quality. It&#39;s ideal for everyday use and consumption.</p>\r\n', 'coco-pandan-premium-rice-25kg', 1100, 'coco-pandan-premium-rice-25kg.png', '2022-05-05', 2),
(30, 1, 'Sweet Jasmine Rice - 25KG', '<p>The aroma of<strong> Sweet Jasmine Rice</strong> is floral, and the texture is smooth and sweet. Originally from Thailand, the rice is now farmed in Laos, Southern Vietnam, and Cambodia. It&#39;s also known as Thai fragrant rice or Thai Hom Mali rice, and it&#39;s popular all over the world.</p>\r\n', 'sweet-jasmine-rice-25kg', 1100, 'sweet-jasmine-rice-25kg.png', '0000-00-00', 0),
(31, 1, 'Maharlika Rice - 25KG', '<p>One of the top-selling rice is <strong>Maharlika special rice</strong>, which is also one of the greatest foods in the Philippines. It&#39;s ideal for any time of day when cooked, with a pleasant smell, a highly white appearance, and a savory taste. Fluffy, &quot;Maalsa&quot;-style, and delectable.</p>\r\n', 'maharlika-rice-25kg', 1250, 'maharlika-rice-25kg.png', '0000-00-00', 0),
(32, 1, 'Denorado Mindoro Rice - 25KG', '<p><strong>Denorado Mindoro Rice</strong> is a 100% Philippine rice type known for its natural fragrant aroma, white long grain, smooth, shiny, and silky appearance. It has a pleasant and fragrant scent when cooked. Denorado rice is soft, slightly sticky, and chewy when cooked.</p>\r\n', 'denorado-mindoro-rice-25kg', 1150, 'denorado-mindoro-rice-25kg.png', '2022-05-05', 13),
(33, 1, 'Super Angelica Rice - 25KG', '<p>Created to provide just the best taste to any dish you desire to match it with, as it is grown on the best paddy terraces, with constant rains and fresh cool air. Rice is the finest choice for your special dinners because of its smooth taste, aromatic perfume, and imported quality.</p>\r\n', 'super-angelica-rice-25kg', 1150, 'super-angelica-rice-25kg.png', '0000-00-00', 0),
(34, 1, 'Cagayan C-18 Rice - 25KG', '<p><strong>Cagayan&#39;s Well Milled Rice</strong> is prepared from 100% native palay harvested from the island of Cagayan. Stocks were transported directly from Tuguegarao City&#39;s rice mill.</p>\r\n', 'cagayan-c-18-rice-25kg', 1150, 'cagayan-c-18-rice-25kg.png', '0000-00-00', 0),
(35, 3, 'Dona Maria Jasponica Brown Rice - 5KG', '<p><strong>Dona Maria</strong> helps you get active while enjoying the aromatic nutty and chewy texture of its <strong>Jasponica Brown type</strong>, which is rich in minerals such as Fiber, Magnesium, Selenium, Vitamin B1, B3, and B6.</p>\r\n\r\n<p>The aroma of Jasmine rice is enticing, and the quality of Japanese rice is excellent.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'dona-maria-jasponica-brown-rice-5kg', 450, 'dona-maria-jasponica-brown-rice-5kg.png', '2022-05-05', 1),
(36, 3, 'Harvester’s Brown Rice - 5KG', '<p><strong>Harvester&#39;s Brown Rice</strong> is unpolished rice that is both healthy and nutritious. Dietary fiber, B vitamins, minerals, essential oils, antioxidants, and selenium are all abundant in the undamaged bran layer. Regular use of unpolished rice as part of a healthy diet and lifestyle has been linked to the prevention of various gastrointestinal and cardiovascular disorders. This rice is a superfood with a chewy texture and nutty flavor.</p>\r\n', 'harvester-s-brown-rice-5kg', 350, 'harvester-s-brown-rice-5kg.png', '0000-00-00', 0),
(37, 3, 'Dona Maria Miponica Brown Rice - 10KG', '<p>Rich in nutrients such as Fiber, Magnesium, Selenium, Vitamin B1, B3, and B6, Do&ntilde;a Maria helps you become fit while enjoying the aromatic nutty, and chewy texture of its Jasponica Brown variety.</p>\r\n', 'dona-maria-miponica-brown-rice-10kg', 450, 'dona-maria-miponica-brown-rice-10kg.png', '0000-00-00', 0),
(38, 3, 'Healthy Alternatives Organic Brown Rice - 2KG', '<p>This pesticide-free, all-natural healthy alternative is gathered naturally from upland rice terraces. Only the husk has been removed from indigenous rice. The bran is whole and full of fiber, minerals, and vitamin B.</p>\r\n', 'healthy-alternatives-organic-brown-rice-2kg', 390, 'healthy-alternatives-organic-brown-rice-2kg.png', '0000-00-00', 0),
(39, 2, 'Harvester’s Black Rice - 5KG', '<p>Antioxidants, vitamins, and fiber abound in black rice. Replace white rice with black rice to improve blood sugar control.</p>\r\n\r\n<p>And, best of all, it tastes fantastic!</p>\r\n', 'harvester-s-black-rice-5kg', 550, 'harvester-s-black-rice-5kg.png', '2022-05-06', 1),
(40, 2, 'Jordan Farm Black Rice - 5KG', '<p><strong>Jordan Farms Black Rice</strong> is a great way to eat healthy. Black rice is high in antioxidants, fiber, vitamin B, essential oils, minerals, and iron, as well as having a low glycemic index.</p>\r\n', 'jordan-farm-black-rice-5kg', 640, 'jordan-farm-black-rice-5kg.png', '0000-00-00', 0),
(41, 2, 'Healthy Alternative’s Black Rice - 5KG', '<p>This pesticide-free, all-natural healthy alternative is gathered naturally from upland rice terraces. Only the husk has been removed from indigenous rice. The bran is whole and full of fiber, minerals, and vitamin B.</p>\r\n\r\n<p>Please consume within 3 months after the manufacturing date to guarantee freshness.</p>\r\n', 'healthy-alternative-s-black-rice-5kg', 540, 'healthy-alternative-s-black-rice-5kg.png', '0000-00-00', 0),
(42, 2, 'Prime Emperor’s Organic Black Rice - 2KG', '<p><strong>Black rice</strong>, often known as &quot;forbidden rice&quot; or &quot;emperor&#39;s rice,&quot; is a type of rice that was once only available to the Emperor of China. At the period, black rice was thought to have supernatural properties that helped the Emperor live a long and healthy life.</p>\r\n', 'prime-emperor-s-organic-black-rice-2kg', 750, 'prime-emperor-s-organic-black-rice-2kg.png', '0000-00-00', 0),
(43, 4, 'Jordan Farms Red Rice -  2KG', '<p><strong>Jordan Farms Red rice</strong> is a great way to live a healthier life. It&#39;s high in fiber and high in manganese and zinc, both of which may aid speed up metabolism. The Glycemic index is lower. Beneficial to the bones.</p>\r\n', 'jordan-farms-red-rice-2kg', 480, 'jordan-farms-red-rice-2kg.png', '2022-05-05', 1),
(44, 4, 'Harvester’s Whole Grain Red Rice - 5KG', '<p>Harvester&#39;s Red Rice is a fantastic method to stay in shape and live a healthier lifestyle.</p>\r\n', 'harvester-s-whole-grain-red-rice-5kg', 435, 'harvester-s-whole-grain-red-rice-5kg.png', '2022-05-05', 1),
(45, 4, 'Prime Organic’s Unpolished Red Rice - 5KG', '<p>It has a lot of fiber and has a low sugar level, which is beneficial for diabetics. Because of the presence of anthocyanins, which are known to protect against lethal chronic diseases, unpolished rice is high in antioxidants. When we polish rice, we remove 15 percent of the protein, 85 percent of the fat, 90 percent of the calcium, and 75 percent of the phosphorus.</p>\r\n', 'prime-organic-s-unpolished-red-rice-5kg', 780, 'prime-organic-s-unpolished-red-rice.png', '0000-00-00', 0),
(46, 4, 'F&C (Farm & Cottages) High Fiber Red Rice - 5KG', '<p>A premium whole grain rice with excellent purity, good eating quality, and no fertilizers or dangerous chemical pesticides used in its production. Traditional rice types produce healthy red rice, which is sown and harvested using only natural and safe organic resources. Premium quality means healthier and safer food products for your whole family with Healthy Red Rice.</p>\r\n', 'f-c-farm-cottages-high-fiber-red-rice-5kg', 800, 'f-c-farm-cottages-high-fiber-red-rice.png', '0000-00-00', 0),
(47, 5, 'Earthly Choice Cauliflower Rice - 1KG', '<p>Rice is one of our favorite grains, but it has a lot of carbs for certain people. Our <strong>Cauliflower Rice</strong> is a low-carb alternative that provides plenty of nutrients without sacrificing flavor or variety. Simply microwave this shelf-stable bag for 90 seconds and enjoy.&nbsp; Cauliflower rice is better for you because it&#39;s Paleo and Keto friendly, with only 30mg of sodium and 5 grams of carbohydrates.</p>\r\n', 'earthly-choice-cauliflower-rice-1kg', 1000, 'earthly-choice-cauliflower-rice-1kg.png', '0000-00-00', 0),
(48, 5, 'Belle’s Organic Quinoa Rice - 1KG', '<p>Fiber and protein are abundant in this dish. It&#39;s a complete protein, meaning it contains all of the necessary amino acids. Quinoa offers a lot of protein for such a little seed: one cup cooked has 8 grams. Quinoa is naturally gluten-free, therefore it may aid with weight loss. The Glycemic index is low.</p>\r\n', 'belle-s-organic-quinoa-rice-1kg', 470, 'belle-s-organic-quinoa-rice-1kg.png', '0000-00-00', 0),
(49, 5, 'Belle’s Organic Tricolor Quinoa Rice - 1KG', '<p>The sweet, savory, and slightly nutty flavors of each seed come together in this blend of white, red, and black quinoa. They make an excellent substitute for taco meat or a whole grain addition to your favorite salad when combined. This ancient grain also provides all nine essential amino acids, as well as protein, iron, and fiber.</p>\r\n', 'belle-s-organic-tricolor-quinoa-rice-1kg', 520, 'belle-s-organic-tricolor-quinoa-rice-1kg.png', '0000-00-00', 0),
(50, 5, 'Jordan Farms Adlai Rice - 1KG', '<p>Jordan Farms Adlai is a nutrient-dense, lesser-known grain that can be used in place of rice! This gluten-free superfood, also known as Job&#39;s Tears or Chinese Pearl Barley, is also low-glycemic, making it a perfect, healthy carbohydrate option for anyone trying to control their blood glucose levels. It&#39;s a staple food that&#39;s high in dietary fiber, protein, and minerals like calcium, phosphorus, iron, niacin, riboflavin, and thiamine.</p>\r\n', 'jordan-farms-adlai-rice-1kg', 300, 'jordan-farms-adlai-rice.png', '2022-05-05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `OrderPaid` bit(1) NOT NULL DEFAULT b'0',
  `sales_date` date NOT NULL,
  `PaymentMethod` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `OrderAddress` varchar(200) NOT NULL,
  `Contact` int(11) NOT NULL,
  `OrderStatus` varchar(100) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `OrderPaid`, `sales_date`, `PaymentMethod`, `Email`, `OrderAddress`, `Contact`, `OrderStatus`) VALUES
(29, 20, b'0', '2022-05-05', 'GCASH', 'erinnesagmit@gmail.com', 'Batangas City', 936526761, 'Complete'),
(40, 20, b'0', '2022-05-05', 'GCASH', 'erinnesagmit@gmail.com', 'Batangas City', 936526761, 'Pending'),
(41, 20, b'0', '2022-05-06', 'GCASH', 'erinnesagmit@gmail.com', 'Batangas City', 936526761, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(1) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `activate_code` varchar(15) NOT NULL,
  `reset_code` varchar(15) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `firstname`, `lastname`, `address`, `contact_info`, `photo`, `status`, `activate_code`, `reset_code`, `created_on`) VALUES
(1, 'admin@admin.com', '$2y$10$8wY63GX/y9Bq780GBMpxCesV9n1H6WyCqcA2hNy2uhC59hEnOpNaS', 1, 'Admin', 'Jessie', '', '09182738449', 'profile.jpg', 1, '', '', '2022-04-01'),
(16, 'gultebako123@gmail.com', '$2y$10$oRXJr.HaBykgEGhANzWH2uoEc4YsTVMIz/f4tMExPqsN0gw2nQ01m', 0, 'Jessie Jhon', 'Yacap', '', '', '', 1, 'U6pqhVldYcGN', '', '2022-05-01'),
(19, 'gultebako1234@gmail.com', '$2y$10$T9kk9yVNQGKAWYJtzd5YKeWVyfykyYN09uuw/ibDE8tGPLYSmz.He', 0, 'Jessie Jhon', 'Yacap', '', '', '', 1, 'DUETHayutfQb', '', '2022-05-01'),
(20, 'erinnesagmit@gmail.com', '$2y$10$CQg87jSL9yBv7zD5BQ1DZOZWYMquGvdrgVRJMc722VbF8ipZE4Che', 0, 'Erinne', 'Sagmit', 'Batangas City', '0936526761', '', 1, 'F2e5WhNJEoRC', '', '2022-05-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
