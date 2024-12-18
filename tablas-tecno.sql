CREATE TYPE rol AS ENUM ('cliente', 'cliente-canal', 'vendedor', 'administrador');
CREATE TYPE estado AS ENUM ('en_uso', 'suspendido', 'acabado');
CREATE TYPE renovacion AS ENUM ('no_le_toca', 'contactado', 'no_quiere', 'renovada');


CREATE TABLE Marca(
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL
);


CREATE TABLE Categoria (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL
);

CREATE TABLE Licencia (
	id SERIAL PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
	codigo VARCHAR(255) NOT NULL,
	precio money NOT NULL,
	precio_mayorista money NOT NULL,
	precio_renovacion money NOT NULL,
	trasladable bool NOT NULL,
	caducable bool NOT NULL,
	formateable bool NOT NULL,
	compra_asistida bool NOT NULL,
	compartida bool NOT NULL,
	marca_id int NOT NULL,
	categoria_id int NOT NULL, 
	 FOREIGN KEY (marca_id) REFERENCES Marca(id) ON DELETE NO ACTION ON UPDATE NO ACTION,
	 FOREIGN KEY (categoria_id) REFERENCES Categoria(id) ON DELETE NO ACTION ON UPDATE NO ACTION
);


CREATE TABLE Usuario (
    id SERIAL PRIMARY KEY,
    correo VARCHAR(255) NOT NULL UNIQUE,
    clave VARCHAR(255) NOT NULL,
    rol rol NOT NULL
);

CREATE TABLE Cliente (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    ci VARCHAR(255) UNIQUE,
    nit VARCHAR(255),
    correo VARCHAR(255) UNIQUE,
    empresa BOOLEAN NOT NULL DEFAULT FALSE,
    cod_pais1 VARCHAR(255),
    celular1 VARCHAR(255),
    cod_pais2 VARCHAR(255),
    celular2 VARCHAR(255),
    id_usuario INT,
    FOREIGN KEY (id_usuario) REFERENCES Usuario(id) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE TABLE Vendedor (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
	id_usuario INT,
	FOREIGN KEY (id_usuario) REFERENCES Usuario(id) ON DELETE NO ACTION ON UPDATE NO ACTION
);


CREATE TABLE Serie (
    id SERIAL PRIMARY KEY,
    serie VARCHAR(255) NOT NULL,
    cantidad_equipos INT NOT NULL,
    fecha_compra DATE NOT NULL,
    estado estado NOT NULL,
    precio_compra MONEY NOT NULL,
    duracion_cliente INTERVAL NOT NULL,
    plazo_vencimiento INTERVAL NOT NULL,
    licencia_id INT NOT NULL,
    FOREIGN KEY (licencia_id) REFERENCES Licencia(id) ON DELETE NO ACTION ON UPDATE NO ACTION
);


CREATE TABLE Activacion (
    id SERIAL PRIMARY KEY,
    detalle_nota VARCHAR(255) NOT NULL,
    cantidad_equipos INT NOT NULL,
    precio_parcial MONEY NOT NULL,
    renovacion renovacion NOT NULL,
    serie_id INT NOT NULL,
    notaventa_id INT NOT NULL,
	FOREIGN KEY (serie_id) REFERENCES Serie(id) ON DELETE NO ACTION ON UPDATE NO ACTION,
	FOREIGN KEY (notaventa_id) REFERENCES Serie(id) ON DELETE CASCADE ON UPDATE NO ACTION
		
);

CREATE TABLE NotaVenta (
    id SERIAL PRIMARY KEY,
    fecha DATE NOT NULL,
    monto_total MONEY NOT NULL,
    comision_pagada BOOL NOT NULL,
    cliente_id INT NOT NULL,
    vendedor_id INT NOT NULL,
    FOREIGN KEY (cliente_id) REFERENCES Cliente(id) ON DELETE NO ACTION ON UPDATE NO ACTION,
    FOREIGN KEY (vendedor_id) REFERENCES Vendedor(id) ON DELETE NO ACTION ON UPDATE NO ACTION
);


CREATE TABLE Comision (
    id SERIAL PRIMARY KEY, 
    porcentaje_comision DECIMAL(4,2) NOT NULL,
    vendedor_id INT NOT NULL,
	licencia_id INT NOT NULL,
    FOREIGN KEY (vendedor_id) REFERENCES Vendedor(id) ON DELETE CASCADE, 
    FOREIGN KEY (licencia_id) REFERENCES Licencia(id) ON DELETE CASCADE
);
