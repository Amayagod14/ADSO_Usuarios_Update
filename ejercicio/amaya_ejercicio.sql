create schema amaya;
use amaya;

CREATE TABLE tb_usuarios (
    documento INT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    contrasena VARCHAR(100) NOT NULL,
    fecha_nac DATE,
    foto VARCHAR(2000) NULL
);
select * from tb_usuarios;
