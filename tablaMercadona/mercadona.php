<?php

$sql = "CREATE TABLE IF NOT EXISTS mercadona (
        id BIGINT unsigned AUTO_INCREMENT PRIMARY KEY, /
        direccion VARCHAR(150) NOT NULL,
        localidad VARCHAR(100) NOT NULL,
        fecha_apertura DATE NOT NULL,
        encargado VARCHAR(150) unique NOT NULL,
        telefono VARCHAR (12) NULL,
        ingreso_anual DECIMAL (10,3) default 0,
        CONSTRAINT uq_direccion_localidad UNIQUE (direccion, localidad)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";