-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.14-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para sistema
CREATE DATABASE IF NOT EXISTS `sistema` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `sistema`;

-- Copiando estrutura para tabela sistema.cursos
CREATE TABLE IF NOT EXISTS `cursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `grau` varchar(50) DEFAULT NULL,
  `codigo` varchar(50) DEFAULT NULL,
  `ato_auto` varchar(50) DEFAULT NULL,
  `ato_rec` varchar(50) DEFAULT NULL,
  `ato_ren` varchar(50) DEFAULT NULL,
  `obs` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sistema.cursos: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` (`id`, `nome`, `grau`, `codigo`, `ato_auto`, `ato_rec`, `ato_ren`, `obs`) VALUES
	(1, 'Curso1', 'Grau1', 'Cod1', 'Ato1', 'Ato12', 'Ato13, Ato14, Ato 26', 'Ob2');
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;

-- Copiando estrutura para tabela sistema.instituicao
CREATE TABLE IF NOT EXISTS `instituicao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `endereco` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `mec` varchar(50) DEFAULT NULL,
  `mantenedora` varchar(50) DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_instituicao_usuarios` (`usuario`),
  CONSTRAINT `FK_instituicao_usuarios` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sistema.instituicao: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `instituicao` DISABLE KEYS */;
INSERT INTO `instituicao` (`id`, `nome`, `endereco`, `cidade`, `estado`, `mec`, `mantenedora`, `usuario`) VALUES
	(4, 'UNIME', 'Avenida Paralela', 'Salvador', 'Bahia', '91229-0', 'UFBA', 2);
/*!40000 ALTER TABLE `instituicao` ENABLE KEYS */;

-- Copiando estrutura para tabela sistema.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` enum('diretor','funcionario','dirigente','superintendente','coordenador') NOT NULL DEFAULT 'funcionario',
  `nome` varchar(50) NOT NULL DEFAULT '',
  `sobrenome` varchar(50) NOT NULL DEFAULT '',
  `cpf` varchar(15) NOT NULL DEFAULT '',
  `telefone` varchar(11) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `senha` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sistema.usuarios: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `role`, `nome`, `sobrenome`, `cpf`, `telefone`, `email`, `senha`) VALUES
	(2, 'funcionario', 'guest', 'Teste', '354.423', '719988', 'example@example', '123'),
	(3, 'diretor', 'Diretor1', 'Diretor2', '888.999', '718899', 'diretor@mail', 'senha1122');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Copiando estrutura para tabela sistema.validadora
CREATE TABLE IF NOT EXISTS `validadora` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `endereco` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `mec` varchar(50) DEFAULT NULL,
  `mantenedora` varchar(50) DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `instituicao` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Index 2` (`usuario`) USING BTREE,
  KEY `Index 3` (`instituicao`) USING BTREE,
  CONSTRAINT `FK_validadora_instituicao` FOREIGN KEY (`instituicao`) REFERENCES `instituicao` (`id`),
  CONSTRAINT `FK_validadora_usuarios` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sistema.validadora: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `validadora` DISABLE KEYS */;
INSERT INTO `validadora` (`id`, `nome`, `endereco`, `cidade`, `estado`, `mec`, `mantenedora`, `usuario`, `instituicao`) VALUES
	(1, 'Valid1', 'Endr2', 'Cidad2', 'Estad2', 'MEC2', 'Mant2', 2, 4);
/*!40000 ALTER TABLE `validadora` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
