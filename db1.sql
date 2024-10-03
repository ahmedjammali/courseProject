-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : jeu. 03 oct. 2024 à 11:21
-- Version du serveur : 8.4.2
-- Version de PHP : 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db1`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `course_id` int NOT NULL,
  `user_id` int NOT NULL,
  `comment_text` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `course_id`, `user_id`, `comment_text`, `created_at`) VALUES
(1, 1, 7, 'This course is perfect for beginners! I now understand the basics of HTML, CSS, and JavaScript.', '2024-10-02 10:15:00'),
(3, 2, 10, 'Deep dive into machine learning. The instructor provided excellent insights on complex algorithms.', '2024-10-02 12:30:00'),
(4, 2, 5, 'The real-world applications discussed made the course even more valuable.', '2024-10-02 13:45:00'),
(5, 3, 9, 'A must-take course for anyone interested in cybersecurity. It covers all the fundamental concepts.', '2024-10-02 14:00:00'),
(7, 4, 5, 'This course provided a comprehensive introduction to AI and machine learning. The instructor was great.', '2024-10-02 16:00:00'),
(9, 5, 10, 'Great course! I now have a solid understanding of UI/UX design principles.', '2024-10-02 17:00:00'),
(24, 2, 3, 'this course is great ', '2024-10-03 08:25:36'),
(25, 1, 3, 'thsi course was great', '2024-10-03 09:40:08'),
(26, 1, 20, 'this course is great', '2024-10-03 10:07:43');

-- --------------------------------------------------------

--
-- Structure de la table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `formation` varchar(255) NOT NULL,
  `submitted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `nom`, `prenom`, `email`, `tel`, `formation`, `submitted_at`) VALUES
(1, 'ahmed', 'jammali', 'ahmedjammali2002@gmail.com', '25766248', 'ai', '2024-10-02 11:43:11');

-- --------------------------------------------------------

--
-- Structure de la table `courses`
--

CREATE TABLE `courses` (
  `id` int NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_description` text,
  `instructor_id` int DEFAULT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_description`, `instructor_id`, `path`) VALUES
(1, 'Introduction to Web Development', 'Dive into the world of web development by learning the foundational technologies that power the internet. Master HTML, CSS, and JavaScript to build visually stunning websites, responsive designs, and user-friendly interfaces. This course covers the essential tools and frameworks used by developers to create modern, interactive websites. By the end of the course, you\'ll have built your own fully functional website from scratch.', 15, 'imgs/course1.jpeg'),
(2, 'Advanced Data Science', 'Explore the advanced concepts of data science, including machine learning algorithms, big data processing, and data visualization techniques. Learn how to analyze complex datasets and derive actionable insights using Python, R, and specialized libraries. Topics include neural networks, deep learning, and predictive modeling to help you become a proficient data scientist.', 15, 'imgs/course1.jpeg'),
(3, 'Cybersecurity Basics', 'Understand the fundamentals of cybersecurity and how to protect against cyber threats and attacks. This course covers the key concepts, tools, and strategies for securing systems, networks, and data. You\'ll learn about encryption, firewalls, incident response, and vulnerability management to safeguard sensitive information from hackers and malware.', 15, 'imgs/course1.jpeg'),
(4, 'AI and Machine Learning', 'Learn how to build AI systems and understand machine learning models. This course delves into the principles of artificial intelligence, including supervised and unsupervised learning, natural language processing, and AI ethics. You will gain hands-on experience with popular AI frameworks like TensorFlow and PyTorch.', 15, 'imgs/course3.jpeg'),
(5, 'UI/UX Design Fundamentals', 'Understand the principles of UI and UX design for web and mobile apps. In this course, you\'ll explore the user-centered design process, wireframing, prototyping, and usability testing. You\'ll also learn the best practices for creating intuitive and engaging user interfaces that offer a seamless user experience.', 15, 'imgs/course3.jpeg'),
(6, 'Full Stack Web Development', 'Become proficient in both front-end and back-end web development. This full-stack course teaches you how to build dynamic websites using a variety of technologies, including HTML, CSS, JavaScript, Node.js, and databases. You will learn to create web applications from scratch and manage server-side processes efficiently.', 15, 'imgs/course3.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `prenom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','instructor','admin') NOT NULL DEFAULT 'user',
  `spécialité` varchar(255) DEFAULT NULL,
  `years_of_experience` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `email`, `created_at`, `prenom`, `password`, `role`, `spécialité`, `years_of_experience`) VALUES
(3, 'Jammali', 'ahmedjammali2002@gmail.com', '2024-10-01 14:45:50', 'ahmed', '$2y$10$6duOJUPVdPRt1hHwpWnH/eg/QMsLAtSZL/oLs.iuKvT9Pq/0nWDFe', 'user', NULL, NULL),
(5, 'takali', 'youssef@gmail.com', '2024-10-01 14:47:05', 'youssef', '$2y$10$0Qfx4ScSj10f4bRgPjplFefhnCrCFad3k0b651wY6aD6xjzN6AIxC', 'user', NULL, NULL),
(7, 'jammali', 'roua@gmail.com', '2024-10-01 17:02:50', 'roua', '$2y$10$K9Rhh8.52REjlnSKE59Hd.GmkUN.GWiJufq8H6kZA1l0RBGrZDJtu', 'user', NULL, NULL),
(9, 'Doe', 'john.doe@example.com', '2024-10-02 09:13:59', 'John', '$2y$10$NiTBFRCFPsl1v0sxLkZbtuH8FlRViVEhUnTmTDmUR3LV4r/HKi.DS', 'user', NULL, NULL),
(10, 'Smith', 'jane.smith@example.com', '2024-10-02 09:20:02', 'Jane', '$2y$10$agM44w9xuNNq8UG0/uV6gOuv/jE8FvUajekPihsGJcykdxskmAqfW', 'instructor', 'Web Development', 5),
(11, 'Brown', 'alice.brown@example.com', '2024-10-02 09:20:02', 'Alice', '$2y$10$zM6RPq22BNdXXRbDb21EneQlPmwyVFLWX.4UOaEl7BWDL9ZjMbiUi', 'admin', NULL, NULL),
(14, 'Miller', 'david.miller@example.com', '2024-10-02 09:29:14', 'David', '$2y$10$N3l6oAayH5v1cnKbIjoHPuTnWok78zY6wOorxhZI6Vf0GZyQHmF.u', 'instructor', 'Data Science', 4),
(15, 'nssir', 'aziz@gmail.com', '2024-10-02 09:52:08', 'aziz', '$2y$10$ng2BNo27MvICmCxNUCT2wuyaRjds5Kd/yKDsS/2nXFl0IG.clnCZG', 'instructor', 'Data Science', 4),
(16, 'Admin', 'admin@gmail.com', '2024-10-03 09:04:19', 'User', '$2y$10$Ww8wPXu.trgYlNkJtZvB0OabTjlk2XaidIwXXHYPfb6HIekhGZpFm', 'admin', NULL, NULL),
(17, 'fady ', 'fady@gamil.com', '2024-10-03 09:42:18', 'tarbelsi', '$2y$10$2bKgqjOdO5MHqJV3ltrrEuDXHMPSqrSkKFOtwAHhIyLNT4C6PLibe', 'instructor', 'mobile developer', 5),
(18, 'maram', 'maram@gmail.com', '2024-10-03 09:43:55', 'youssed', '$2y$10$MH1.HAUKQAVmPomoni8x5egauURSxmHF1Ll5Ib0rHbpWsTF7RGlja', 'instructor', 'mobile developer', 4),
(19, 'dali', 'dali@gmail.com', '2024-10-03 09:46:36', 'aoun', '$2y$10$OE/uNt2PAaBawWdVD0PDO.PTvRnFJfHtAiDRw1DL.r3U4tXnt6NIG', 'instructor', 'data science', 7),
(20, 'dridi', 'youssef1@gmail.com', '2024-10-03 10:07:10', 'youssef', '$2y$10$hrD4NPSYajnewGtpiJvZBOxhlLtkX0MXqAgaMDTnzDvxZE0fsFtKC', 'user', NULL, NULL),
(22, 'salem', 'abdou@gmail.com', '2024-10-03 10:32:44', 'abderrahim', '$2y$10$Y7qmZTR6bvw1pMyE2gYQXOx7I14b9s8.4Wco5iA1aOTdmnVeSLfs.', 'user', NULL, NULL),
(23, 'codex', 'salma@gmail.com', '2024-10-03 10:38:52', 'salma', '$2y$10$R08t4A0Q1vzlRcN5QjCSpeffSYTPcQCKGyH673CYWgONQYUaCl78i', 'instructor', 'web developper', 8),
(24, 'jammali', 'amal@gmail.com', '2024-10-03 10:42:07', 'amal ', '$2y$10$gUqQFlgvi9u25htPmK99c.JYVh5YxCK2vh2cHV4DMvVOcTOD4Irju', 'instructor', 'mobile developer', 2),
(25, 'mounir', 'instructor@gmail.com', '2024-10-03 11:08:22', 'jmayel', '$2y$10$SyXKVBHiJpLzpq6Tar4WkeUNlxrmF4JdxKlbXAx4FL7gg5VREHjRW', 'instructor', 'data science', 6);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
