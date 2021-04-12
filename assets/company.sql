-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Apr 2021 pada 19.13
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `department`
--

CREATE TABLE `department` (
  `Dname` varchar(20) DEFAULT NULL,
  `Dnumber` int(20) NOT NULL,
  `Mgr_ssn` int(20) DEFAULT NULL,
  `Mgr_start_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `department`
--

INSERT INTO `department` (`Dname`, `Dnumber`, `Mgr_ssn`, `Mgr_start_date`) VALUES
('Administration', 4, 987654321, '1995-01-01'),
('Research', 5, 333445555, '1988-05-22');

--
-- Trigger `department`
--
DELIMITER $$
CREATE TRIGGER `del_employee` AFTER DELETE ON `department` FOR EACH ROW BEGIN
	DELETE FROM employee WHERE dno = old.dnumber;
	DELETE FROM dept_location WHERE dnumber = old.dnumber;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dependent`
--

CREATE TABLE `dependent` (
  `Essn` int(20) NOT NULL,
  `Dependent_name` varchar(20) NOT NULL,
  `Sex` varchar(1) DEFAULT NULL,
  `Bdate` date DEFAULT NULL,
  `Relationship` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dependent`
--

INSERT INTO `dependent` (`Essn`, `Dependent_name`, `Sex`, `Bdate`, `Relationship`) VALUES
(333445555, 'Alice', 'F', '1986-04-05', 'Daughter'),
(333445555, 'Joy', 'F', '1958-05-03', 'Spouse'),
(333445555, 'Theodore', 'M', '1983-10-25', 'Son'),
(987654321, 'Abner', 'M', '1942-02-28', 'Spouse');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dept_location`
--

CREATE TABLE `dept_location` (
  `Dnumber` int(5) NOT NULL,
  `Dlocation` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dept_location`
--

INSERT INTO `dept_location` (`Dnumber`, `Dlocation`) VALUES
(4, 'Staff'),
(5, 'Bella'),
(5, 'Houst'),
(5, 'Sugar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `employee`
--

CREATE TABLE `employee` (
  `Fname` varchar(20) DEFAULT NULL,
  `Minit` varchar(1) DEFAULT NULL,
  `Lname` varchar(20) DEFAULT NULL,
  `Ssn` int(20) NOT NULL,
  `Bdate` date DEFAULT NULL,
  `Address` varchar(20) DEFAULT NULL,
  `Sex` varchar(1) DEFAULT NULL,
  `Salary` int(20) DEFAULT NULL,
  `Super_ssn` int(20) DEFAULT NULL,
  `Dno` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `employee`
--

INSERT INTO `employee` (`Fname`, `Minit`, `Lname`, `Ssn`, `Bdate`, `Address`, `Sex`, `Salary`, `Super_ssn`, `Dno`) VALUES
('Franklin', 'T', 'Wong', 333445555, '1955-12-08', '638 Voss, Houston, T', 'M', 40000, 888665555, 5),
('joyoe', 'A', 'English', 453453453, '1972-07-31', '5631 rice, Houston, ', 'F', 25000, 333445555, 5),
('Jennifer', 'S', 'Wallace', 987654321, '1941-06-20', '291 Berry, Bellaire,', 'F', 43000, 888665555, 4),
('Ahmad', 'V', 'Jabbar', 987987987, '1969-03-29', '980 Dallas, Houston,', 'M', 25000, 987654321, 4),
('Alicia', 'J', 'Zelaya', 999887777, '1968-01-19', '3321 Xastle, Spring,', 'F', 25000, 987654321, 4);

--
-- Trigger `employee`
--
DELIMITER $$
CREATE TRIGGER `del_dependent` AFTER DELETE ON `employee` FOR EACH ROW BEGIN
	DELETE FROM dependent WHERE essn = old.ssn;
	DELETE FROM works_on WHERE essn = old.ssn;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `del_emplo` AFTER DELETE ON `employee` FOR EACH ROW BEGIN  
    UPDATE department SET department.`Mgr_ssn`=NULL, department.`Mgr_start_date`=NULL WHERE department.`Mgr_ssn`=old.Ssn;  
    DELETE wo,p
    FROM works_on AS wo
    INNER JOIN project AS p
    ON wo.Pno=p.Pnumber 
    WHERE wo.Essn = old.Ssn;
    
    DELETE FROM dependent WHERE dependent.`Essn`=old.ssn;
    UPDATE employee SET employee.`Super_ssn`=NULL WHERE employee.`Ssn`=old.ssn;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `project`
--

CREATE TABLE `project` (
  `Pname` varchar(20) DEFAULT NULL,
  `Pnumber` int(5) NOT NULL,
  `Plocation` varchar(20) DEFAULT NULL,
  `Dnum` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `project`
--

INSERT INTO `project` (`Pname`, `Pnumber`, `Plocation`, `Dnum`) VALUES
('ProdictY', 2, 'Sugarland', 5),
('ProductZ', 3, 'Houston', 5),
('Computerization', 10, 'Stafford', 4),
('Reorganization', 20, 'Houston', 1),
('Newbenefits', 30, 'Stafford', 4);

--
-- Trigger `project`
--
DELIMITER $$
CREATE TRIGGER `del_project` AFTER DELETE ON `project` FOR EACH ROW BEGIN
	DELETE FROM works_on WHERE pno = old.pnumber;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `works_on`
--

CREATE TABLE `works_on` (
  `Essn` int(20) NOT NULL,
  `Pno` int(5) NOT NULL,
  `Hours` decimal(2,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `works_on`
--

INSERT INTO `works_on` (`Essn`, `Pno`, `Hours`) VALUES
(333445555, 2, '9.9'),
(333445555, 3, '9.9'),
(333445555, 10, '9.9'),
(333445555, 20, '9.9'),
(453453453, 2, '9.9'),
(987654321, 20, '9.9'),
(987654321, 30, '9.9'),
(987987987, 10, '9.9'),
(987987987, 30, '5.0'),
(999887777, 10, '9.9'),
(999887777, 30, '9.9');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Dnumber`);

--
-- Indeks untuk tabel `dependent`
--
ALTER TABLE `dependent`
  ADD PRIMARY KEY (`Essn`,`Dependent_name`);

--
-- Indeks untuk tabel `dept_location`
--
ALTER TABLE `dept_location`
  ADD PRIMARY KEY (`Dnumber`,`Dlocation`);

--
-- Indeks untuk tabel `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Ssn`),
  ADD KEY `employee_ibfk_1` (`Dno`);

--
-- Indeks untuk tabel `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`Pnumber`),
  ADD KEY `project_ibfk_1` (`Dnum`);

--
-- Indeks untuk tabel `works_on`
--
ALTER TABLE `works_on`
  ADD PRIMARY KEY (`Essn`,`Pno`),
  ADD KEY `works_on_ibfk_2` (`Pno`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dependent`
--
ALTER TABLE `dependent`
  ADD CONSTRAINT `dependent_ibfk_1` FOREIGN KEY (`Essn`) REFERENCES `employee` (`Ssn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dept_location`
--
ALTER TABLE `dept_location`
  ADD CONSTRAINT `dept_location_ibfk_1` FOREIGN KEY (`Dnumber`) REFERENCES `department` (`Dnumber`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`Dno`) REFERENCES `department` (`Dnumber`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `works_on`
--
ALTER TABLE `works_on`
  ADD CONSTRAINT `works_on_ibfk_1` FOREIGN KEY (`Essn`) REFERENCES `employee` (`Ssn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `works_on_ibfk_2` FOREIGN KEY (`Pno`) REFERENCES `project` (`Pnumber`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
