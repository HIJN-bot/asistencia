-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2024 at 07:24 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
 /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
 /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 /*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qr_ats`
--

-- --------------------------------------------------------
-- Tabla: admin
-- --------------------------------------------------------

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `admin` (`id`, `name`, `email`, `pass`) VALUES
(1, 'Administrador', 'admin@qr.com', 'pass');

-- --------------------------------------------------------
-- Tabla: attendance
-- --------------------------------------------------------

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `s_name` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `section` varchar(5) NOT NULL,
  `rollno` varchar(5) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- (Sin datos por ahora)

-- --------------------------------------------------------
-- Tabla: student
-- --------------------------------------------------------

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `roll_no` varchar(5) NOT NULL,
  `section` varchar(5) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `student` (`id`, `name`, `email`, `roll_no`, `section`, `password`) VALUES
(1, 'Alumno 1', 'alumno1@gmail.com', '01', 'A', 'pass'),
(2, 'Alumno 2', 'alumno2@gmail.com', '02', 'A', 'pass'),
(3, 'Alumno 3', 'alumno3@gmail.com', '03', 'B', 'pass'),
(4, 'Alumno 4', 'alumno4@gmail.com', '04', 'B', 'pass'),
(5, 'Alumno 5', 'alumno5@gmail.com', '05', 'C', 'pass');

-- --------------------------------------------------------
-- Tabla: teacher
-- --------------------------------------------------------

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `teacher` (`id`, `name`, `email`, `subject`, `password`) VALUES
(1, 'Maestro 1', 'maestro1@gmail.com', 'Matemáticas', 'pass'),
(2, 'Maestro 2', 'maestro2@gmail.com', 'Lengua Castellana', 'pass'),
(3, 'Maestro 3', 'maestro3@gmail.com', 'Ciencias Naturales', 'pass'),
(4, 'Maestro 4', 'maestro4@gmail.com', 'Educación Física', 'pass'),
(5, 'Maestro 5', 'maestro5@gmail.com', 'Tecnología', 'pass');

-- --------------------------------------------------------
-- Índices
-- --------------------------------------------------------

ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

-- --------------------------------------------------------
-- AUTO_INCREMENT
-- --------------------------------------------------------

ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
 /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
 /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
