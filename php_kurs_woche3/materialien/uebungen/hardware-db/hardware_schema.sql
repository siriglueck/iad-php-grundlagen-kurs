-- Hardware DB – Schema & Seed
CREATE DATABASE IF NOT EXISTS hardware
  DEFAULT CHARACTER SET utf8mb4
  DEFAULT COLLATE utf8mb4_general_ci;
USE hardware;

DROP TABLE IF EXISTS fp;
CREATE TABLE fp (
  hersteller VARCHAR(25) NULL,
  typ VARCHAR(25) NULL,
  gb INT(11) NULL,
  preis DOUBLE NULL,
  artnummer VARCHAR(15) PRIMARY KEY DEFAULT 'kein(e)',
  prod DATE NULL
) ENGINE=InnoDB;

-- Seed

INSERT INTO fp(hersteller, typ, gb, preis, artnummer, prod) VALUES
('IBM Corporation', 'DJNA 372200', 240, 230, 'HDA-140', '2008-06-15'),
('Seagate', '310232A', 60, 122, 'HDA-144', '2008-11-15'),
('Quantum', 'Fireball Plus', 80, 128, 'HDA-163', '2008-03-15'),
('Fujitsu', 'MPE 3136', 160, 149, 'HDA-171', '2008-09-01'),
('Quantum', 'Fireball CX', 40, 112, 'HDA-208', '2008-10-01');

