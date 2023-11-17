use scripttribyte;

create table turnos(
	idturno int not null auto_increment primary key,
    horainicio time not null,
    horafinal time not null,
    created_at timestamp,
    updated_at datetime,
    deleted_at datetime
);

create table categorias(
	tipo char not null primary key
);

create table departamentos(
	iddepartamento int not null primary key auto_increment,
    nombre varchar(20) not null
);

create table almacenes(
	idalmacen int not null auto_increment primary key,
    capacidad int not null,
    direccion varchar(40) not null,
    iddepartamento int not null,
    created_at timestamp,
    updated_at datetime,
    deleted_at datetime,
    
    foreign key (iddepartamento) references departamentos(iddepartamento)
);

create table estanterias(
	identificador int not null auto_increment primary key,
    peso double not null,
    apiladomaximo int not null,
    idalmacen int not null,
    created_at timestamp,
    updated_at datetime,
    deleted_at datetime,
    
    foreign key (idalmacen) references almacenes(idalmacen)
);

create table usuarios(
	docdeidentidad int(8) not null primary key,
    nombre varchar(255) not null,
    apellido varchar(20) not null,
    telefono int(10) not null,
    direccion varchar(40) not null,
    created_at timestamp,
    updated_at datetime,
    deleted_at datetime
);

create table user_usuario(
	id bigint(20) unsigned not null primary key,
    docdeidentidad int(8) not null unique,
    created_at timestamp,
    updated_at datetime,
    deleted_at datetime,
    foreign key (id) references users(id),
    foreign key (docdeidentidad) references usuarios(docdeidentidad)
);

create table choferes(
	docdeidentidad int(8) not null primary key,
    created_at timestamp,
    updated_at datetime,
    deleted_at datetime,
    
    foreign key (docdeidentidad) references usuarios(docdeidentidad)
);

create table gerentes(
	docdeidentidad int(8) not null primary key,
    idalmacen int not null,
    idturno int not null,
    created_at timestamp,
    updated_at datetime,
    deleted_at datetime,
    
    foreign key (docdeidentidad) references usuarios(docdeidentidad),
    foreign key (idalmacen) references almacenes(idalmacen),
    foreign key (idturno) references turnos(idturno)
);

create table administradores(
	docdeidentidad int(8) not null primary key,
    created_at timestamp,
    updated_at datetime,
    deleted_at datetime,
    
    foreign key (docdeidentidad) references usuarios(docdeidentidad)
);

create table cargadores(
	docdeidentidad int(8) not null primary key,
    carnettransporte int not null,
    idalmacen int not null,
    idturno int not null,
    created_at timestamp,
    updated_at datetime,
    deleted_at datetime,
    
    foreign key (docdeidentidad) references usuarios(docdeidentidad),
    foreign key (idalmacen) references almacenes(idalmacen),
    foreign key (idturno) references turnos(idturno)
);

create table licencias(
	idlicencia char(8) not null primary key,
    validodesde date not null,
    validohasta date not null,
    docdeidentidad int(8) not null,
    categoria char not null,
    created_at timestamp,
    updated_at datetime,
    deleted_at datetime,
    
    foreign key (docdeidentidad) references choferes(docdeidentidad),
    foreign key (categoria) references categorias(tipo)
);

create table modelos(
	idmodelo int not null primary key auto_increment,
    nombre varchar(255) not null,
    anio year not null,
    created_at timestamp,
    updated_at datetime,
    deleted_at datetime
);

create table vehiculos(
	idvehiculo int not null primary key auto_increment,
    matricula char(8) not null unique,
    capacidad int not null,
    pesomaximo int not null,
    modelo int not null,
    created_at timestamp,
    updated_at datetime,
    deleted_at datetime,
    
    foreign key (modelo) references modelos(idmodelo)
);

create table maneja(
	docdeidentidad int(8) not null primary key,
    idvehiculo int not null unique,
    created_at timestamp,
    updated_at datetime,
    deleted_at datetime,
    
    foreign key (docdeidentidad) references choferes(docdeidentidad),
    foreign key (idvehiculo) references vehiculos(idvehiculo)
);

create table tipoarticulo(
	idtipoarticulo int not null auto_increment primary key,
    tipo char not null unique,
	nombre varchar(50) not null,
    created_at timestamp,
    updated_at datetime,
    deleted_at datetime
);

create table articulos(
	idarticulo int not null auto_increment primary key,
    nombre varchar(50) not null,
    aniocreacion int not null,
    created_at timestamp,
    updated_at datetime,
    deleted_at datetime
);

create table codigodebulto(
	codigo int not null primary key auto_increment,
    tipo char not null unique,
    maximoapilado int not null,
    created_at timestamp,
    updated_at datetime,
    deleted_at datetime
);

create table paquetes(
	idpaquete int not null auto_increment primary key,
    cantidadarticulos int not null,
    peso int not null,
    created_at timestamp,
    updated_at datetime,
    deleted_at datetime
);

create table articulo_paquete(
	idarticulo int not null primary key,
    idpaquete int not null,
    created_at timestamp,
    updated_at datetime,
    deleted_at datetime,
    
    foreign key (idarticulo) references articulos(idarticulo),
    foreign key (idpaquete) references paquetes(idpaquete)
);

create table destinos(
	iddestino int not null primary key auto_increment,
    direccion varchar(50) not null,
    iddepartamento int not null,
    created_at timestamp,
    updated_at datetime,
    deleted_at datetime,
    
    foreign key (iddepartamento) references departamentos(iddepartamento)
);

create table lotes(
	idlote int not null auto_increment primary key,
    cantidadpaquetes int not null,
    iddestino int not null,
    idalmacen int not null,
    created_at timestamp,
    updated_at datetime,
    deleted_at datetime,
    
    foreign key (iddestino) references destinos(iddestino),
    foreign key (idalmacen) references almacenes(idalmacen)
);

create table vehiculo_lote_destino(
    idlote int not null primary key,
    fechaestimada date not null,
    horaestimada time not null,
    docdeidentidad int(8) not null,
    created_at timestamp,
    updated_at datetime,
    deleted_at datetime,
    
    foreign key (idlote) references lotes(idlote),
    foreign key (docdeidentidad) references maneja(docdeidentidad)
);

create table estadoentrega(
	idlote int

 not null primary key,
	fechaentrega date not null,
    horaentrega time not null,
    created_at timestamp,
    updated_at datetime,
    deleted_at datetime,
    
    foreign key (idlote) references vehiculo_lote_destino(idlote)
);

create table paquete_lote(
	idpaquete int not null primary key,
    idlote int not null,
    created_at timestamp,
    updated_at datetime,
    deleted_at datetime,
    
    foreign key (idpaquete) references paquetes(idpaquete),
    foreign key (idlote) references lotes(idlote)
);

create table articulo_tipoarticulo(
	idrelacion int not null primary key auto_increment, /*por laravel*/
    idarticulo int not null,
    idtipo int not null,
    created_at timestamp,
    updated_at datetime,
    deleted_at datetime,
    
	unique (idarticulo, idtipo),
    foreign key (idarticulo) references articulos(idarticulo),
    foreign key (idtipo) references tipoarticulo(idtipoarticulo)
);

create table paquete_estanteria(
	idrelacion int not null primary key auto_increment, /*por laravel*/
    idpaquete int not null,
    idestanteria int not null,
    created_at timestamp,
    updated_at datetime,
    deleted_at datetime,
    
    unique (idpaquete, idestanteria),
	foreign key (idpaquete) references paquetes(idpaquete),
    foreign key (idestanteria) references estanterias(identificador)
);

create table paquete_codigodebulto(
	idrelacion int not null primary key auto_increment, /*por laravel*/
    idpaquete int not null,
    codigo int not null,
    created_at timestamp,
    updated_at datetime,
    deleted_at datetime,
    
    unique (idpaquete, codigo),
    foreign key (idpaquete) references paquetes(idpaquete),
    foreign key (codigo) references codigodebulto(codigo)
);

INSERT INTO categorias (tipo) VALUES ("A");
INSERT INTO categorias (tipo) VALUES ("B");
INSERT INTO categorias (tipo) VALUES ("C");
INSERT INTO categorias (tipo) VALUES ("D");
INSERT INTO categorias (tipo) VALUES ("E");
INSERT INTO categorias (tipo) VALUES ("F");
INSERT INTO categorias (tipo) VALUES ("G");
INSERT INTO categorias (tipo) VALUES ("H");

INSERT INTO departamentos (nombre) VALUES ("Montevideo");
INSERT INTO departamentos (nombre) VALUES ("Rivera");
INSERT INTO departamentos (nombre) VALUES ("Paysandu");
INSERT INTO departamentos (nombre) VALUES ("Florida");
INSERT INTO departamentos (nombre) VALUES ("Durazno");
INSERT INTO departamentos (nombre) VALUES ("Canelones");
INSERT INTO departamentos (nombre) VALUES ("Flores");
INSERT INTO departamentos (nombre) VALUES ("Maldonado");
INSERT INTO departamentos (nombre) VALUES ("Rocha");
INSERT INTO departamentos (nombre) VALUES ("Artigas");
INSERT INTO departamentos (nombre) VALUES ("Salto");
INSERT INTO departamentos (nombre) VALUES ("Treinta y Tres");
INSERT INTO departamentos (nombre) VALUES ("Soriano");
INSERT INTO departamentos (nombre) VALUES ("San José");
INSERT INTO departamentos (nombre) VALUES ("Tacuarembó");
INSERT INTO departamentos (nombre) VALUES ("Colonia");
INSERT INTO departamentos (nombre) VALUES ("Rio Negro");
INSERT INTO departamentos (nombre) VALUES ("Lavalleja");
INSERT INTO departamentos (nombre) VALUES ("Cerro Largo");