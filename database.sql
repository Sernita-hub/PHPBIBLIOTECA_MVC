-- ============================================================
-- BIBLIOTECA MVC — Schema SQL
-- Ejecutar en phpMyAdmin o MySQL antes de iniciar el sistema
-- ============================================================

CREATE DATABASE IF NOT EXISTS biblioteca CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE biblioteca;

-- Tabla de usuarios del sistema
CREATE TABLE IF NOT EXISTS usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    usuario    VARCHAR(100) NOT NULL UNIQUE,
    password   VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla de libros
CREATE TABLE IF NOT EXISTS libros (
    id_libro   INT AUTO_INCREMENT PRIMARY KEY,
    titulo     VARCHAR(255) NOT NULL,
    autor      VARCHAR(150),
    genero     VARCHAR(100),
    disponible TINYINT(1) DEFAULT 1
);

-- Tabla de socios
CREATE TABLE IF NOT EXISTS socios (
    id_socio  INT AUTO_INCREMENT PRIMARY KEY,
    nombre    VARCHAR(150) NOT NULL,
    correo    VARCHAR(150),
    telefono  VARCHAR(20)
);

-- Tabla de empleados
CREATE TABLE IF NOT EXISTS empleados (
    id_empleados INT AUTO_INCREMENT PRIMARY KEY,
    nombre       VARCHAR(150) NOT NULL,
    cargo        VARCHAR(100)
);

-- Tabla de préstamos
CREATE TABLE IF NOT EXISTS prestamos (
    id_prestamo      INT AUTO_INCREMENT PRIMARY KEY,
    id_libro         INT NOT NULL,
    id_socio         INT NOT NULL,
    id_empleado      INT NOT NULL,
    fecha_prestamo   DATE NOT NULL,
    fecha_devolucion DATE,
    FOREIGN KEY (id_libro)    REFERENCES libros(id_libro)    ON DELETE CASCADE,
    FOREIGN KEY (id_socio)    REFERENCES socios(id_socio)    ON DELETE CASCADE,
    FOREIGN KEY (id_empleado) REFERENCES empleados(id_empleados) ON DELETE CASCADE
);

-- Usuario de prueba (contraseña: 1234)
-- NOTA: en producción usar password_hash() en PHP
INSERT IGNORE INTO usuarios (usuario, password) VALUES ('admin', '1234');

-- Datos de ejemplo
INSERT IGNORE INTO libros (titulo, autor, genero, disponible) VALUES
    ('Cien años de soledad',  'Gabriel García Márquez', 'Novela',       1),
    ('El Quijote',             'Miguel de Cervantes',    'Clásico',      1),
    ('1984',                   'George Orwell',          'Distopía',     0),
    ('El Principito',          'Antoine de Saint-Exupéry','Fábula',      1);

INSERT IGNORE INTO socios (nombre, correo, telefono) VALUES
    ('Ana Martínez', 'ana@mail.com',    '310-555-0001'),
    ('Carlos López', 'carlos@mail.com', '320-555-0002');

INSERT IGNORE INTO empleados (nombre, cargo) VALUES
    ('Laura Pérez',  'Bibliotecaria'),
    ('Andrés Gómez', 'Auxiliar');
