<?php

require_once './config.php';

class discosModel{
    
    private $db;

    public function __construct(){
        $this->db = new PDO("mysql:host=".MYSQL_HOST.";dbname=".MYSQL_DB.";charset=utf8",MYSQL_USER,MYSQL_PASS);
        $this->deploy();
    }

    public function getDiscos(){
        $query = $this->db->prepare('SELECT discos.id, autor.nombre, genero.categoria, discos.titulo, discos.precio FROM discos INNER JOIN autor ON discos.autor_id = autor.id INNER JOIN genero ON discos.genero_id = genero.id' );
        $query->execute();
        $discos = $query->fetchAll(PDO::FETCH_OBJ);
        return $discos;
    }

    public function orderDiscosTitulo(){
        $query = $this->db->prepare('SELECT discos.id, autor.nombre, genero.categoria, discos.titulo, discos.precio FROM discos INNER JOIN autor ON discos.autor_id = autor.id INNER JOIN genero ON discos.genero_id = genero.id ORDER BY discos.titulo');
        $query->execute();
        $discos = $query->fetchAll(PDO::FETCH_OBJ);
        return $discos;
    }
    public function orderDiscosAutor(){
        $query = $this->db->prepare('SELECT discos.id, autor.nombre, genero.categoria, discos.titulo, discos.precio FROM discos INNER JOIN autor ON discos.autor_id = autor.id INNER JOIN genero ON discos.genero_id = genero.id ORDER BY autor.nombre');
        $query->execute();
        $discos = $query->fetchAll(PDO::FETCH_OBJ);
        return $discos;
    }
    public function orderDiscosPrecio(){
        $query = $this->db->prepare('SELECT discos.id, autor.nombre, genero.categoria, discos.titulo, discos.precio FROM discos INNER JOIN autor ON discos.autor_id = autor.id INNER JOIN genero ON discos.genero_id = genero.id ORDER BY discos.precio');
        $query->execute();
        $discos = $query->fetchAll(PDO::FETCH_OBJ);
        return $discos;
    }

    public function getDisco($id){
        $query = $this->db->prepare('SELECT discos.id, autor.nombre, genero.categoria, discos.titulo, discos.precio FROM discos INNER JOIN autor ON discos.autor_id = autor.id INNER JOIN genero ON discos.genero_id = genero.id  WHERE discos.id = ?');
        $query->execute([$id]);
        $discos = $query->fetch(PDO::FETCH_OBJ);
        return $discos;
    }

    public function modificarDisco($id){
        // Primero lo tengo que traer de la db y cargarlo a un form. Y desde ahi ejecutar el update
        $query = $this->db->prepare('SELECT discos.id, autor.nombre, genero.categoria, discos.titulo, discos.precio FROM discos INNER JOIN autor ON discos.autor_id = autor.id INNER JOIN genero ON discos.genero_id = genero.id  WHERE discos.id = ?');
        $query->execute([$id]);
        $disco = $query->fetch(PDO::FETCH_OBJ);

        return $disco;
    }

    public function insertDisco($autor,$genero,$titulo,$precio){
        
        $query = $this->db->prepare('INSERT INTO discos(autor_id,genero_id,titulo,precio) VALUES (?,?,?,?)');
        $query->execute([$autor,$genero,$titulo,$precio]);
    
    }

    public function deleteDisco($id){
        $query = $this->db->prepare('DELETE FROM discos WHERE id = ?');
        $query->execute([$id]);

    }

    public function getDiscosPorGen($genero){
        $query = $this->db->prepare('SELECT discos.id, autor.nombre, genero.categoria, discos.titulo, discos.precio FROM discos INNER JOIN autor ON discos.autor_id = autor.id INNER JOIN genero ON discos.genero_id = genero.id  WHERE genero_id = ?');
        $query->execute([$genero]);

        $discos = $query->fetchAll(PDO::FETCH_OBJ);

        return $discos;
    }

    public function getDiscosPorAutor($autor){
        $query = $this->db->prepare('SELECT discos.id, autor.nombre, genero.categoria, discos.titulo, discos.precio FROM discos INNER JOIN autor ON discos.autor_id = autor.id INNER JOIN genero ON discos.genero_id = genero.id  WHERE autor_id = ?');
        $query->execute([$autor]);

        $discos = $query->fetchAll(PDO::FETCH_OBJ);

        return $discos;
    }
    public function updateDisco($id,$autor,$genero,$titulo,$precio){
        $query = $this->db->prepare('UPDATE discos SET autor_id=?, genero_id= ?, titulo = ?, precio = ? WHERE id = ?');
        $query->execute([$autor,$genero,$titulo,$precio,$id]);
    }
    
    function deploy() {
        // Chequear si hay tablas
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll(); // Nos devuelve todas las tablas de la db
        if(count($tables)==0) {
            // Si no hay crearlas
            $sql=<<<END
            
            SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
            START TRANSACTION;
            SET time_zone = "+00:00";


            /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
            /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
            /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
            /*!40101 SET NAMES utf8mb4 */;

            --
            -- Base de datos: `comercio_discos`
            --

            -- --------------------------------------------------------

            --
            -- Estructura de tabla para la tabla `autor`
            --

            CREATE TABLE `autor` (
            `id` int(10) NOT NULL,
            `nombre` varchar(250) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

            --
            -- Volcado de datos para la tabla `autor`
            --

            INSERT INTO `autor` (`id`, `nombre`) VALUES
            (1, 'Giusy Ferreri'),
            (2, 'Pink Floyd'),
            (3, 'Los Fundamentalistas del aire acondicionado'),
            (4, 'AC-DC'),
            (5, 'Led Zeppelin'),
            (6, 'Soda Stereo'),
            (7, 'Eric Clapton'),
            (8, 'Leo Mattioli'),
            (9, 'Mozart'),
            (10, 'Patricio Rey y sus redonditos de ricota'),
            (11, 'Rodrigo Bueno');

            -- --------------------------------------------------------

            --
            -- Estructura de tabla para la tabla `discos`
            --

            CREATE TABLE `discos` (
            `id` int(10) NOT NULL,
            `autor_id` int(10) NOT NULL,
            `genero_id` int(10) NOT NULL,
            `titulo` varchar(150) NOT NULL,
            `precio` double NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

            --
            -- Volcado de datos para la tabla `discos`
            --

            INSERT INTO `discos` (`id`, `autor_id`, `genero_id`, `titulo`, `precio`) VALUES
            (2, 2, 1, 'The Wall (Remastered)', 8750.25),
            (3, 7, 2, 'Crossroads', 10502),
            (4, 5, 1, 'Led Zeppelin I', 8500.25),
            (7, 8, 3, 'Aun sigue la Leccion', 7895.5),
            (10, 10, 1, 'Oktubre', 7850.25),
            (11, 2, 1, 'The dark side of the moon', 12500),
            (12, 2, 1, 'Wish you were here', 12525.25),
            (13, 10, 1, 'Gulp!', 7500),
            (14, 3, 1, 'Porco Rex', 11000),
            (15, 1, 7, 'Girotondo', 12500),
            (16, 1, 7, 'Cortometraggi', 15000),
            (17, 1, 7, 'Gaetana', 9500),
            (18, 11, 8, 'Lo mejor del amor', 14200.5),
            (19, 11, 8, 'Cuarteteando', 11000),
            (20, 11, 8, 'Soy Cordobes', 7850.25),
            (21, 9, 9, 'Las bodas de Figaro', 17000),
            (22, 9, 9, 'Don Giovanni', 15500);

            -- --------------------------------------------------------

            --
            -- Estructura de tabla para la tabla `genero`
            --

            CREATE TABLE `genero` (
            `id` int(10) NOT NULL,
            `categoria` varchar(250) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

            --
            -- Volcado de datos para la tabla `genero`
            --

            INSERT INTO `genero` (`id`, `categoria`) VALUES
            (1, 'Rock & Pop'),
            (2, 'Blues'),
            (3, 'Cumbia'),
            (7, 'Pop'),
            (8, 'Cuarteto'),
            (9, 'Clasica');

            -- --------------------------------------------------------

            --
            -- Estructura de tabla para la tabla `users`
            --

            CREATE TABLE `users` (
            `id` int(11) NOT NULL,
            `email` varchar(50) NOT NULL,
            `pass` varchar(100) NOT NULL,
            `nivel` varchar(15) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

            --
            -- Volcado de datos para la tabla `users`
            --

            INSERT INTO `users` (`id`, `email`, `pass`, `nivel`) VALUES
            (1, 'omar@email.com', '$2y$10\$Ok1SIqiVKjesOXh/uUHKge/F9LFvFTqhpu8hdnBfxZ7iRqItW1Dou', 'admin'),
            (2, 'matias@email.com', '$2y$10\$NqrD5XR954nuZPsfs8rRzeOBVAdBLfEVaYj2gHFVaNPpCOLJjxDC.', 'admin'),
            (3, 'guest@email.com', '$2y$10\$a2R1d1falFvRJc0hm0knWeZygzcgHnpXXQ2FtjWy59Ny5jJ8D9jhW', 'user'),
            (4, 'webadmin', '$2y$10\$b095X3XhrDjPwzbj3BgwiuN.1RyATcDddARL7yxi5.pBuLItt4w9K', 'admin');

            --
            -- Índices para tablas volcadas
            --

            --
            -- Indices de la tabla `autor`
            --
            ALTER TABLE `autor`
            ADD PRIMARY KEY (`id`);

            --
            -- Indices de la tabla `discos`
            --
            ALTER TABLE `discos`
            ADD PRIMARY KEY (`id`),
            ADD KEY `genero_id` (`genero_id`) USING BTREE,
            ADD KEY `autor_id` (`autor_id`) USING BTREE;

            --
            -- Indices de la tabla `genero`
            --
            ALTER TABLE `genero`
            ADD PRIMARY KEY (`id`);

            --
            -- Indices de la tabla `users`
            --
            ALTER TABLE `users`
            ADD PRIMARY KEY (`id`);

            --
            -- AUTO_INCREMENT de las tablas volcadas
            --

            --
            -- AUTO_INCREMENT de la tabla `autor`
            --
            ALTER TABLE `autor`
            MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

            --
            -- AUTO_INCREMENT de la tabla `discos`
            --
            ALTER TABLE `discos`
            MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

            --
            -- AUTO_INCREMENT de la tabla `genero`
            --
            ALTER TABLE `genero`
            MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

            --
            -- AUTO_INCREMENT de la tabla `users`
            --
            ALTER TABLE `users`
            MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

            --
            -- Restricciones para tablas volcadas
            --

            --
            -- Filtros para la tabla `discos`
            --
            ALTER TABLE `discos`
            ADD CONSTRAINT `discos_ibfk_2` FOREIGN KEY (`autor_id`) REFERENCES `autor` (`id`),
            ADD CONSTRAINT `discos_ibfk_3` FOREIGN KEY (`genero_id`) REFERENCES `genero` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
            COMMIT;

            /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
            /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
            /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

            END;
            $this->db->query($sql);
        }
    
    }
}

?>