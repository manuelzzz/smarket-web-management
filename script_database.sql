CREATE DATABASE IF NOT EXISTS `smarket`;

USE `smarket`;

CREATE TABLE IF NOT EXISTS `clients` (
    `NUM_PED` int PRIMARY KEY,
    `DATA` date NOT NULL,
    `COD_CLI` int NOT NULL,
    `CLIENTE` varchar(50) NOT NULL,
    `ENDERECO` varchar(75) NOT NULL,
    `RG` varchar(11) NOT NULL,
    `TOTAL_GERAL` float NOT NULL
);

CREATE TABLE IF NOT EXISTS `orders` (
    `NUM_PED` int REFERENCES `clients` (`NUM_PED`),
    `COD_PROD` int NOT NULL,
    `DESCRICAO` varchar(75) NOT NULL,
    `QUANT` int NOT NULL,
    `PRECO` float NOT NULL,
    `TOTAL` float as (`QUANT` * `PRECO`),
    `TOTAL_GERAL` float NOT NULL
);

INSERT INTO
    `clients`
VALUES
    (
        00002,
        STR_TO_DATE("05/09/11", "%d/%m/%y"),
        10,
        "MARLA",
        "RUA DOS CACTOS, 27",
        "1.159.719",
        303.80
    ),
    (
        00005,
        STR_TO_DATE("01/09/11", "%d/%m/%y"),
        12,
        "KEYLA",
        "RUA DO JUÁ, 34",
        "1.120.702",
        180.80
    );

INSERT INTO
    `orders` (
        NUM_PED,
        COD_PROD,
        DESCRICAO,
        QUANT,
        PRECO,
        TOTAL_GERAL
    )
VALUES
    (00002, 0010, "BISCOITO MARIA", 10, 1.30, 303.80),
    (00002, 0011, "CUZCUZ VITAMILHO", 18, 1.00, 303.80),
    (00002, 0014, "CHARQUE PONTA", 15, 7.00, 303.80),
    (00002, 0015, "ARROZ TIO JOÃO", 20, 2.00, 303.80),
    (00002, 0016, "FEIJAO KERO-KERO", 30, 3.50, 303.80),
    (00002, 0017, "FARINHA BREJEIRA", 12, 1.90, 303.80),
    (00005, 0010, "BISCOITO MARIA", 10, 1.30, 180.80),
    (00005, 0015, "ARROZ TIO JOÃO", 20, 2.00, 180.80),
    (00005, 0016, "FEIJAO KERO-KERO", 30, 3.50, 180.80),
    (00005, 0017, "FARINHA BREJEIRA", 12, 1.90, 180.80);

SELECT* FROM `clients`;
SELECT * FROM `orders`;